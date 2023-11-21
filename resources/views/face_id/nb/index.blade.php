<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        canvas {
            position: absolute;
        }

        #video {
            right: 0;
            bottom: 0;
            min-width: 65%;
            min-height: 100%;
        }

        #video1 {
            position: absolute;
        }

        #block {
            position: fixed;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 65%;
            padding: 100%;
        }

    </style>
    <script defer src="{{ asset('face-api-0-22.min.js') }}"></script>
    <script defer>

        let img_user = '{{ asset($user->img_path) }}';

    </script>

    <script defer src="{{ asset('script_nb.js') }}"></script>
</head>
<body>
    <video id="video" width="800" height="800" autoplay></video>

    <div id='block'>

    </div>

    <video id="video1" width="800" height="800" autoplay></video>
    
</body>
</html>