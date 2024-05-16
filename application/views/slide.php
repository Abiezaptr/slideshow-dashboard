<div class="container-fluid">
    <!-- Informasi urutan slide -->
    <div id="slide-info"></div>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="10000">
        <div class="carousel-inner">
            <?php
            $upload_folder = 'uploads/';

            $files = scandir($upload_folder);

            $files = array_diff($files, array('.', '..'));

            $first_rotation_counter = 0;

            function formatInsight($content)
            {
                // Menambahkan kelas text-primary hanya pada angka penanda awal
                $content = preg_replace('/(^|\s)(\d+\.\s)/', '$1<span class="text-primary">$2</span>', $content);

                // Menambahkan tag <strong> pada angka dan mata uang di dalam isi insight
                $patterns = [
                    // Angka penanda awal tetap text-primary
                    '/(^|\s)(\d+\.\s)/' => '$1<span class="text-primary">$2</span>',
                    // Bold numbers with commas or decimals
                    '/(\b\d{1,3}(?:,\d{3})*(?:\.\d+)?\b)/' => '<strong>$1</strong>',
                    // Bold amounts with euro sign
                    '/(€\s?\d+(?:,\d{3})*(?:\.\d+)?)/' => '<strong>$1</strong>',
                    // Bold amounts with dollar sign
                    '/(\$\d+(?:,\d{3})*(?:\.\d+)?(?:\s*million|\s*billion|\s*thousand)*)/i' => '<strong>$1</strong>',
                    // Bold amounts with Rp sign
                    '/(Rp\s?\d+(?:,\d{3})*(?:\.\d+)?)/' => '<strong>$1</strong>',
                    // Bold numbers with K suffix (e.g., 5K, 1.2K)
                    '/(\b\d+(?:\.\d+)?\s*K\b)/i' => '<strong>$1</strong>',
                    // Bold numbers with million, billion, thousand
                    '/(\b\d+(?:\.\d+)?\s*(?:million|billion|thousand)\b)/i' => '<strong>$1</strong>',
                    // Menghapus singkatan (tidak perlu pada kasus ini)
                    '/\(ΔEOM Trend - PM\)/' => '(End of Month Trend vs Previous Month)', // Simplify terms
                    '/\(MTD\)/' => '(Month-to-Date)',
                    '/\(PM\)/' => '(Previous Month)',
                    '/\(PW\)/' => '(Previous Week)',
                    '/decrease \(or ([\-+]?\d+\.\d+%)\)/' => 'decrease $1', // Simplify decrease statements
                    '/increase \(or ([\-+]?\d+\.\d+%)\)/' => 'increase $1', // Simplify increase statements
                ];

                foreach ($patterns as $pattern => $replacement) {
                    $content = preg_replace($pattern, $replacement, $content);
                }

                return $content;
            }

            foreach ($files as $index => $file) {
                if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
                    $image_path = $upload_folder . $file;
                    $text_file_path = $upload_folder . pathinfo($file, PATHINFO_FILENAME) . '_ok.txt';
                    $active_class = $first_rotation_counter == 0 ? 'active' : '';
                    $first_rotation_counter++;
            ?>
                    <div class="carousel-item <?= $active_class ?>">
                        <div class="row">
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
                                <div class="insight-container" style="white-space: pre-line;">
                                    <?php
                                    if (file_exists($text_file_path) && is_readable($text_file_path)) {
                                        $file_content = file_get_contents($text_file_path);
                                        echo formatInsight($file_content);
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