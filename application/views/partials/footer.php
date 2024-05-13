<!-- Countdown Timer -->
<div id="countdown"></div>

<!-- Menambahkan Bootstrap JS (opsional) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        var remainingSeconds = 6; // Ubah waktu timer menjadi 6 detik
        var countdownInterval;

        function startCountdown() {
            var countdownElement = document.getElementById('countdown');
            var currentSeconds = remainingSeconds;

            countdownInterval = setInterval(function() {
                countdownElement.innerHTML = '<div class="countdown-badge">' + currentSeconds + '</div>';
                currentSeconds--;

                if (currentSeconds < 0) {
                    clearInterval(countdownInterval);
                    var currentSlideIndex = $('.carousel-item.active').index();
                    var totalSlides = $('.carousel-item').length;
                    var nextSlideIndex = (currentSlideIndex + 1) % totalSlides;

                    // Memastikan perubahan slide terjadi setelah countdown mencapai 0
                    setTimeout(function() {
                        $('#carouselExampleControls').carousel(nextSlideIndex);
                    }, 1000);

                    remainingSeconds = 6; // Reset timer ke 6 detik setelah mencapai nol
                }
            }, 1000);
        }

        function updateSlideInfo(currentSlide, totalSlides) {
            var slideInfoElement = document.getElementById('slide-info');
            slideInfoElement.textContent = 'Slide ' + currentSlide + ' of ' + totalSlides;
        }

        function reloadSlideData() {
            // Simulate page refresh with a loader
            location.reload(true);
        }

        $('#carouselExampleControls').on('slid.bs.carousel', function(event) {
            var totalSlides = $('.carousel-item').length;
            var currentSlide = $(this).find('.carousel-item.active').index() + 1;
            clearInterval(countdownInterval);
            startCountdown();
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



</body>

</html>