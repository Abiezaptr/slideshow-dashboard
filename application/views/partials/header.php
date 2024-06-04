<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slideshow Dashboard</title>
    <!-- Menambahkan Bootstrap CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/ico.png') ?>">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        small,
        a,
        button,
        input,
        select,
        textarea {
            font-family: "Century Gothic", sans-serif !important;
        }

        .insight-container {
            position: relative;
            font-size: 15px;
        }

        .insight-container br {
            margin-bottom: 8px;
        }

        .loader {
            border: 4px dashed #f3f3f3;
            border-top: 4px dashed #3498db;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 2s linear infinite;
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            display: none;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .loren-ipsum {
            position: absolute;
            left: 0;
            top: 70%;
            margin-top: 5px;
            font-size: 15px;
        }

        #countdown {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 16px;
            color: maroon;
        }

        #pauseRunButtonContainer {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #pauseRunButton {
            width: 40px;
            height: 40px;
            font-size: 30px;
            color: gray;
        }

        .countdown-badge {
            width: 30px;
            height: 30px;
            border-radius: 13px;
            background-color: gray;
            color: white;
            font-size: 16px;
            text-align: center;
            line-height: 30px;
        }

        #slide-info {
            position: absolute;
            bottom: 10px;
            left: 30px;
            font-size: 14px;
            color: gray;
            font-weight: medium;
            z-index: 9999;
        }

        @media (min-width: 768px) {
            #countdown {
                left: auto;
                right: 10px;
            }
        }

        .carousel-control-prev,
        .carousel-control-next {
            top: auto;
            bottom: 20px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            margin-right: 10px;
            margin-left: 10px;
        }

        .carousel-control {
            justify-content: center;
        }

        .position-relative {
            position: relative;
        }

        .carousel-control-prev,
        .carousel-control-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 999;
        }

        .carousel-control-prev {
            left: 0;
        }

        .carousel-control-next {
            right: 0;
        }

        .image-container img {
            display: none;
        }

        .waves {
            position: absolute;
            bottom: 10;
            left: 0;
            width: 100%;
            height: 10px;
            background-image: linear-gradient(to right, transparent 20%, #c0392b 30%, #c0392b 70%, transparent 80%);
            background-size: 100% 20px;
            animation: wave-animation 2s infinite linear;
        }

        @keyframes wave-animation {
            0% {
                background-position-x: 0;
            }

            100% {
                background-position-x: 100%;
            }
        }
    </style>
</head>

<body>