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
  const labels = [window.user_name];
  return Promise.all(
    labels.map(async (label) => {
      const descriptions = [];
      // for (let i = 1; i <= 2; i++) {
        const img = await faceapi.fetchImage(window.img_user);
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

video.addEventListener("play", async () => {

  const canvas = faceapi.createCanvasFromMedia(video);
  document.getElementById('video-area').append(canvas);

  const displaySize = { width: video.width, height: video.height };
  faceapi.matchDimensions(canvas, displaySize);

  setInterval(async () => {

    const labeledFaceDescriptors = await getLabeledFaceDescriptions();
    const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors);

    const detections = await faceapi
      .detectAllFaces(video)
      .withFaceLandmarks()
      .withFaceDescriptors();

    const resizedDetections = faceapi.resizeResults(detections, displaySize);

    canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

    const results = resizedDetections.map((d) => {
      return faceMatcher.findBestMatch(d.descriptor);
    });

    for (const key of results) {

      if(key._label != "unknown" && key._label != ""){

        if(window.data_user.debit_contract > 0){
          error_noti_face_id(msg=`Ученик обнаружен: ${ key._label }. Допуск к экзамена отклонен. Причина: денежный долг.`)
        }else if(window.data_user.mb_status > 0){
          error_noti_face_id(msg=`Ученик обнаружен: ${ key._label }. Допуск к экзамена отклонен. Причина: стоит на NB.`)
        }else{

          if (window.active) {
            await succes_noti_face_id(`Ученик обнаружен: ${ key._label}. Допуск к экзамену разрешен.`);
            flag = await get_pc();

            if (flag.status == 200) {
              succes_noti_face_id(`ПК номер - ${ window.pc.nomer }`);

              $('#user_name').text(key._label)
              $('#time').text(moment().format('HH:mm:ss'))
              $('#date').text(moment().format('DD.MM.YYYY'))
              $('#computer').text(flag.data.pc_nomer)

              window.print();

            }else{
              error_noti_face_id(msg=flag.data.message)
            }

          }
        }

      }else{
        key._label = "Неизвестен";
      }
    }

    results.forEach((result, i) => {

      if (window.active) {
        
        const box = resizedDetections[i].detection.box;
        const drawBox = new faceapi.draw.DrawBox(box, {
          label: result,
        });
        drawBox.draw(canvas);
      }

    });
  }, 1000);
});
