const video = document.getElementById("video");
const video1 = document.getElementById("video1");

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
        video1.srcObject = stream;

    })
    .catch((error) => {
        console.error(error);
    });
}

function getLabeledFaceDescriptions() {
const labels = ["Vadim"];
return Promise.all(
        labels.map(async (label) => {
            const descriptions = [];
            const img = await faceapi.fetchImage(img_user);
            console.log(img);
            const detections = await faceapi
            .detectSingleFace(img)
            .withFaceLandmarks()
            .withFaceDescriptor();
            console.log(detections);
            descriptions.push(detections.descriptor);
            return new faceapi.LabeledFaceDescriptors(label, descriptions);
        })
    );
}

video1.addEventListener("play", async () => {
    const labeledFaceDescriptors = await getLabeledFaceDescriptions();
    const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors);

    const canvas = faceapi.createCanvasFromMedia(video1);
    document.body.append(canvas);

    const displaySize = { width: video1.width, height: video1.height };
    faceapi.matchDimensions(canvas, displaySize);

    setInterval(async () => {
        const detections = await faceapi
        .detectAllFaces(video1)
        .withFaceLandmarks()
        .withFaceDescriptors();

        const resizedDetections = faceapi.resizeResults(detections, displaySize);

        canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

        const results = resizedDetections.map((d) => {
            return faceMatcher.findBestMatch(d.descriptor);
        });
        results.forEach((result, i) => {
            const box = resizedDetections[i].detection.box;
            const drawBox = new faceapi.draw.DrawBox(box, {
                label: result,
            });
            drawBox.draw(canvas);
        });
    }, 1000);
});         