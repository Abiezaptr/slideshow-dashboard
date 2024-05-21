<!-- Countdown Timer -->
<div id="countdown"></div>

<!-- Button Pause and Run -->
<div id="pauseRunButtonContainer">
    <div id="pauseRunButton"><i class="fa-solid fa-circle-pause"></i></div>
</div>


<!-- Menambahkan Bootstrap JS (opsional) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        var remainingSeconds = 6; // Ubah waktu timer menjadi 6 detik
        var countdownInterval;
        var isPaused = false;

        function startCountdown() {
            var countdownElement = document.getElementById('countdown');
            var currentSeconds = remainingSeconds;

            countdownInterval = setInterval(function() {
                if (!isPaused) {
                    countdownElement.innerHTML = '<div class="countdown-badge">' + currentSeconds + '</div>';
                    currentSeconds--;

                    if (currentSeconds < 0) {
                        clearInterval(countdownInterval);
                        var currentSlideIndex = $('.carousel-item.active').index();
                        var totalSlides = $('.carousel-item').length;
                        var nextSlideIndex = (currentSlideIndex + 1) % totalSlides;

                        // Memastikan perubahan slide terjadi setelah countdown mencapai 0
                        setTimeout(function() {
                            if (!isPaused) { // Hanya pindah slide jika tidak di-pause
                                $('#carouselExampleControls').carousel(nextSlideIndex);
                                startCountdown(); // Mulai ulang countdown setelah pergantian slide
                            }
                        }, 1000);

                        remainingSeconds = 6; // Reset timer ke 6 detik setelah mencapai nol
                    }
                }
            }, 1000);
        }

        function updateSlideInfo(currentSlide, totalSlides) {
            var slideInfoElement = document.getElementById('slide-info');
            slideInfoElement.textContent = 'Slide ' + currentSlide + ' of ' + totalSlides;
        }

        $('#pauseRunButton').on('click', function() {
            isPaused = !isPaused; // Toggle isPaused
            var buttonIcon = isPaused ? '<i class="fa-solid fa-circle-play"></i>' : '<i class="fa-solid fa-circle-pause"></i>';
            $(this).html(buttonIcon);

            if (isPaused) {
                clearInterval(countdownInterval); // Hentikan countdown saat di-pause
                $('#countdown').hide(); // Sembunyikan countdown
            } else {
                $('#countdown').show(); // Tampilkan countdown
                startCountdown(); // Mulai ulang countdown saat di-unpause
            }
        });

        function reloadSlideData() {
            // Simulate page refresh with a loader
            location.reload(true);
        }

        $('#carouselExampleControls').on('slid.bs.carousel', function(event) {
            var totalSlides = $('.carousel-item').length;
            var currentSlide = $(this).find('.carousel-item.active').index() + 1;
            clearInterval(countdownInterval); // Selalu hentikan countdown saat slide berubah

            if (!isPaused) { // Mulai ulang countdown hanya jika tidak di-pause
                startCountdown();
            }

            updateSlideInfo(currentSlide, totalSlides);

            // Check if current slide is the first slide
            if (currentSlide === 1) {
                reloadSlideData(); // Reload data if it's the first slide
            }
        });

        startCountdown();
        updateSlideInfo(1, $('.carousel-item').length);
    });
</script>

<script>
    $(document).ready(function() {
        // Variable to track whether loader has been shown on first rotation or not
        var isFirstRotation = true;

        // Function to create and display loader
        function showLoader() {
            // Create loader elements
            var loaderHTML = '<div class="loader"></div>';

            // Append loader to image and insight containers
            $('.image-container').append(loaderHTML);
            $('.insight-container').append(loaderHTML);

            // Show loader
            // $('.loader').show();
            $('.image-container img').show();
        }

        // Function to check if loader should be shown on first rotation
        function checkFirstRotation() {
            // If it's the first rotation, show loader
            if (isFirstRotation) {
                showLoader();
                isFirstRotation = false; // Set isFirstRotation to false after showing loader
            }
        }

        // Call function to check if loader should be shown on first rotation
        checkFirstRotation();
    });
</script>

<script>
    // Evenet listener untuk mendeteksi slide dengan tombol panah
    $(document).keydown(function(e) {
        // periksa jika tombol panah kanan ditekan
        if (e.key === "ArrowRight") {
            // Panggil fungsi untuk menampilkan slide berikutnya
            $('#carouselExampleControls').carousel('next');
        } else if (e.key === "ArrowLeft") {
            // Panggil fungsi untuk menampilkan slide sebelumnya
            $('#carouselExampleControls').carousel('prev');
        }
    });
</script>

<script>
    $(document).ready(function() {
        var isCarouselPaused = false;
        var carouselInterval;

        function startCarousel() {
            carouselInterval = setInterval(function() {
                if (!isCarouselPaused) {
                    $('#carouselExampleControls').carousel('next');
                }
            }, 5000); // Ganti slide setiap 5 detik
        }

        function pauseCarousel() {
            clearInterval(carouselInterval);
        }

        // Event listener untuk tombol spasi
        $(document).keydown(function(e) {
            if (e.keyCode === 32) { // 32 adalah kode tombol spasi
                isCarouselPaused = !isCarouselPaused;
                if (isCarouselPaused) {
                    pauseCarousel(); // Jeda carousel saat spasi ditekan
                    $('#pauseRunButton').hide(); // Sembunyikan tombol jeda/putar
                    $('#countdown').hide(); // Sembunyikan countdown
                } else {
                    startCarousel(); // Lanjutkan carousel saat spasi ditekan kembali
                    $('#pauseRunButton').show(); // Tampilkan tombol jeda/putar
                    $('#countdown').show(); // Tampilkan countdown
                }
            }
        });
    });
</script>

</body>

</html>