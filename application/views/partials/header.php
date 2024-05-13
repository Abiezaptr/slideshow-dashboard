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
            /* Posisi loader ke bawah */
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            /* Menempatkan loader di atas semua elemen */
            display: none;
            /* Defaultnya disembunyikan */
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
            /* Spasi antara Not earnings dan Loren ipsum */
        }

        #countdown {
            position: absolute;
            bottom: 20px;
            right: 10px;
            font-size: 16px;
            color: maroon;
        }

        .countdown-badge {
            width: 30px;
            height: 30px;
            border-radius: 15px;
            background-color: black;
            color: white;
            font-size: 16px;
            text-align: center;
            line-height: 30px;
        }

        /* Menambahkan gaya untuk informasi urutan slide */
        #slide-info {
            position: absolute;
            bottom: 20px;
            /* Mengatur posisi di pojok bawah halaman */
            left: 30px;
            /* Mengatur posisi di pojok kiri halaman */
            font-size: 16px;
            color: black;
            font-weight: medium;
        }

        /* Mengatur posisi countdown di pojok kanan halaman */
        @media (min-width: 768px) {
            #countdown {
                left: auto;
                right: 10px;
            }
        }

        /* Mengatur posisi tombol next dan prev ke bagian bawah */
        .carousel-control-prev,
        .carousel-control-next {
            top: auto;
            bottom: 20px;
            /* Ubah sesuai kebutuhan */
        }

        /* Mengatur agar tombol next dan prev berdekatan */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            margin-right: 10px;
            /* Atur jarak antara ikon */
            margin-left: 10px;
        }

        /* Mengatur agar tombol next dan prev berada di tengah secara horizontal */
        .carousel-control {
            justify-content: center;
        }

        /* Mengubah warna ikon next dan prev menjadi hitam */
        /* .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: black;
            border: none;
            color: black;
        } */

        /* Mengubah warna ikon next dan prev saat dihover */
        /* .carousel-control-prev:hover,
        .carousel-control-next:hover {
            color: white;
        } */

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


        .carousel-item {
            padding: 20px;
            /* Menambahkan padding di sekitar gambar */
        }

        /* CSS untuk menyembunyikan gambar saat dimuat dan hanya menampilkan loader */
        .image-container img {
            display: none;
        }
    </style>
</head>

<body>