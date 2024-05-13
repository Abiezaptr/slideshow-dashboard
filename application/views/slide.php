<div class="container-fluid">
    <!-- Informasi urutan slide -->
    <div id="slide-info"></div>

    <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="10000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-8 p-4">
                            <div class="image-container" id="image-container-1">
                                <img src="<?= base_url('uploads/crm.png') ?>" alt="Gambar 1" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-4 p-4">
                            <div class="insight-container" id="dashboard-one">
                                <?php
                                // Path to the text file
                                $file_path = 'uploads/crm_ok.txt';

                                // Check if the file exists and is readable
                                if (file_exists($file_path) && is_readable($file_path)) {
                                    // Read the contents of the file
                                    $file_content = file_get_contents($file_path);

                                    // Display the file content
                                    echo nl2br($file_content); // nl2br() is used to preserve line breaks
                                } else {
                                    echo 'File not found or unreadable.';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-8 p-4">
                            <div class="image-container">
                                <img src="<?= base_url('uploads/returns.png') ?>" alt="Gambar 3" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-4 p-4">
                            <div class="insight-container" id="dashboard-two">
                                <?php
                                // Path to the text file
                                $file_path = 'uploads/returns_ok.txt';

                                // Check if the file exists and is readable
                                if (file_exists($file_path) && is_readable($file_path)) {
                                    // Read the contents of the file
                                    $file_content = file_get_contents($file_path);

                                    // Display the file content
                                    echo nl2br($file_content); // nl2br() is used to preserve line breaks
                                } else {
                                    echo 'File not found or unreadable.';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-8 p-4">
                            <div class="image-container">
                                <img src="<?= base_url('uploads/overview.png') ?>" alt="Gambar 3" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-4 p-4">
                            <div class="insight-container" id="dashboard-three">
                                <?php
                                // Path to the text file
                                $file_path = 'uploads/overview_ok.txt';

                                // Check if the file exists and is readable
                                if (file_exists($file_path) && is_readable($file_path)) {
                                    // Read the contents of the file
                                    $file_content = file_get_contents($file_path);

                                    // Display the file content
                                    echo nl2br($file_content); // nl2br() is used to preserve line breaks
                                } else {
                                    echo 'File not found or unreadable.';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> -->

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="10000">
        <div class="carousel-inner">
            <?php
            // Path to the upload folder
            $upload_folder = 'uploads/';

            // Read contents of the upload folder
            $files = scandir($upload_folder);

            // Filter out '.' and '..' entries
            $files = array_diff($files, array('.', '..'));

            // Counter for first rotation
            $first_rotation_counter = 0;

            // Loop through files
            foreach ($files as $index => $file) {
                // Check if it's an image file
                if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
                    // Construct path to image file
                    $image_path = $upload_folder . $file;

                    // Construct path to text file (assuming text file has same name with "_ok.txt" extension)
                    $text_file_path = $upload_folder . pathinfo($file, PATHINFO_FILENAME) . '_ok.txt';

                    // Check if it's the first rotation
                    if ($first_rotation_counter == 0) {
                        // Add active class for first rotation
                        $active_class = 'active';
                    } else {
                        // Remove active class for subsequent rotations
                        $active_class = '';
                    }
                    // Increment first rotation counter
                    $first_rotation_counter++;
            ?>
                    <div class="carousel-item <?= $active_class ?>">
                        <!-- <div class="row">
                            <div class="col-md-8 p-4">
                                <div class="image-container">
                                    <img src="<?= base_url($image_path) ?>" alt="Gambar <?= $index + 1 ?>" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-4 p-4">
                                <div class="insight-container">
                                    <?php
                                    // Check if the text file exists and is readable
                                    if (file_exists($text_file_path) && is_readable($text_file_path)) {
                                        // Read the contents of the text file
                                        $file_content = file_get_contents($text_file_path);

                                        // Display the file content
                                        echo nl2br($file_content); // nl2br() is used to preserve line breaks
                                    } else {
                                        echo 'Insight not found or unreadable.';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <!-- <div class="col-md-8 p-4">
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <i class="fa-solid fa-chevron-left text-dark"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <div class="image-container">
                                    <img src="<?= base_url($image_path) ?>" alt="Gambar <?= $index + 1 ?>" class="img-fluid">
                                </div>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <i class="fa-solid fa-chevron-right text-dark"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div> -->

                            <div class="col-md-8 p-4">
                                <div class="row">
                                    <div class="col-md-1 mb-5 ml-4">
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <i class="fa-solid fa-chevron-left text-dark"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </div>

                                    <div class="col-md-1 mb-5">
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <i class="fa-solid fa-chevron-right text-dark"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="image-container">
                                    <img src="<?= base_url($image_path) ?>" alt="Gambar <?= $index + 1 ?>" class="img-fluid">
                                </div>

                            </div>
                            <div class="col-md-4 p-4 mt-5">
                                <div class="insight-container">
                                    <?php
                                    // Check if the text file exists and is readable
                                    if (file_exists($text_file_path) && is_readable($text_file_path)) {
                                        // Read the contents of the text file
                                        $file_content = file_get_contents($text_file_path);

                                        // Display the file content
                                        echo nl2br($file_content); // nl2br() is used to preserve line breaks
                                    } else {
                                        echo 'Insight not found or unreadable.';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>

</div>