const constraints = {
    audio: true,
    video: true,
};

navigator.mediaDevices.getUserMedia(constraints)
    .then(stream => {
        console.log(stream, stream.getVideoTracks(), stream.getAudioTracks());
        const video = document.querySelector('video');
        window.stream = stream; // make variable available to browser console
        video.srcObject = stream;
    })
    .catch(error => {
        console.log('something happened', error)
    })
// const constraints = {
//     video: {
//         cursor: 'cursor',
//         displaySurface: 'browser'
//     },
//     audio: true
// }
//
// navigator.mediaDevices.getDisplayMedia()
//     .then(stream => {
//         // const video = document.querySelector('video');
//         // window.stream = stream; // make variable available to browser console
//         // video.srcObject = stream;
//         console.log(stream);
//     });
// navigator.mediaDevices.enumerateDevices()
//     .then(devices => {
//         console.log(devices);
//     })
