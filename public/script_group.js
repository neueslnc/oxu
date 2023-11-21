const video = document.getElementById("video");

Promise.all([
    faceapi.nets.ssdMobilenetv1.loadFromUri("/models"),
    faceapi.nets.faceRecognitionNet.loadFromUri("/models"),
    faceapi.nets.faceLandmark68Net.loadFromUri("/models"),
]).then(startWebcam);

function startWebcam() {
    navigator.mediaDevices
        .getUserMedia({
            video: true,
            audio: false,
        })
        .then((stream) => {
            video.srcObject = stream;
        })
        .catch((error) => {
            console.error(error);
        });
}

function getLabeledFaceDescriptions() {

    let format_label = [];
    let format_img_user = [];

    try {
        for (const item of window.data) {
            format_label.push(item.fio);
            format_img_user.push(item.img_path);
        }
    }catch (e) {
        console.log(e);
    }

    const labels = format_label;
    return Promise.all(
        labels.map(async (label, i) => {
            const descriptions = [];
            // for (const item of format_img_user) {
                const img = await faceapi.fetchImage(format_img_user[i]);
                const detections = await faceapi
                    .detectSingleFace(img)
                    .withFaceLandmarks()
                    .withFaceDescriptor();
                descriptions.push(detections.descriptor);
            // }
            return new faceapi.LabeledFaceDescriptors(label, descriptions);
        })
    );
}

async function set_face_api_s(){
    const canvas = faceapi.createCanvasFromMedia(video);
    document.getElementById('video-area').append(canvas);

    const displaySize = { width: video.width, height: video.height };
    faceapi.matchDimensions(canvas, displaySize);

    const labeledFaceDescriptors = await getLabeledFaceDescriptions();

    const threshold = 0.45;

    if (window.faceMatcher){
        window.faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, threshold);
    }


    let interval = setInterval(async () => {

        const detections = await faceapi
            .detectAllFaces(video)
            .withFaceLandmarks()
            .withFaceDescriptors();

        const resizedDetections = faceapi.resizeResults(detections, displaySize);

        canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

        const results = resizedDetections.map((d) => {
            return window.faceMatcher.findBestMatch(d.descriptor);
        });

        let flag_print = true;

        for (const key of results) {
            if (!(window.deactive_student.find(item => item.fio == key._label  ))){
                if (key._label != "unknown" && key._label != "") {

                    let data_user = window.data.find((item) => item.fio == key._label);

                    if (data_user.debit_contract > 0) {
                        error_noti_face_id(msg = `Ученик обнаружен: ${key._label}. Допуск к экзамена отклонен. Причина: денежный долг.`)
                    } else if (data_user.mb_status > 0) {
                        error_noti_face_id(msg = `Ученик обнаружен: ${key._label}. Допуск к экзамена отклонен. Причина: стоит на NB.`)
                    } else {

                        // if (window.active) {
                        await succes_noti_face_id(`Ученик обнаружен: ${key._label}. Допуск к экзамену разрешен.`);
                        flag = await get_pc(data_user.id);

                        if (flag.status == 200) {
                            succes_noti_face_id(`ПК номер - ${window.pc.nomer}`);

                            $('#user_name').text(key._label)
                            $('#time').text(moment().format('HH:mm:ss'))
                            $('#date').text(moment().format('DD.MM.YYYY'))
                            $('#computer').text(flag.data.pc_nomer)

                            window.print();

                        } else {
                            error_noti_face_id(msg = flag.data.message)
                        }

                        // }
                    }

                } else {
                    key._label = "Неизвестен";
                    flag_print = false;
                }
            }
        }

        // if (flag_print){
            results.forEach((result, i) => {
                const box = resizedDetections[i].detection.box;
                const drawBox = new faceapi.draw.DrawBox(box, {
                    label: result,
                });
                drawBox.draw(canvas);
            });
        // }
    }, 1000);

    return interval;
}
video.addEventListener("play", async () => {
    window.interval = await set_face_api_s();
});
