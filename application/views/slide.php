<div class="container-fluid">
    <!-- Informasi urutan slide -->
    <div id="slide-info">Slide 1 of 3</div>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="10000">
        <!-- <div class="carousel-inner">
            <?php
            $upload_folder = 'uploads/';
            $files = scandir($upload_folder);
            $files = array_diff($files, array('.', '..'));
            $first_rotation_counter = 0;

            function formatInsight($content)
            {
                $content = preg_replace('/(\d+\.\s)/', '<span class="text-primary">$1</span>', $content);

                $patterns = [
                    '/(\b\d{1,3}(?:,\d{3})*(?:\.\d+)?\b)/' => '<strong>$1</strong>',
                    '/(€\s?\d+(?:,\d{3})*(?:\.\d+)?)/' => '<strong>$1</strong>',
                    '/(\$\d+(?:,\d{3})*(?:\.\d+)?(?:\s*million|\s*billion|\s*thousand)*)/i' => '<strong>$1</strong>',
                    '/(Rp\s?\d+(?:,\d{3})*(?:\.\d+)?)/' => '<strong>$1</strong>',
                    '/(\b\d+(?:\.\d+)?\s*K\b)/i' => '<strong>$1</strong>',
                    '/(\b\d+(?:\.\d+)?\s*(?:million|billion|thousand)\b)/i' => '<strong>$1</strong>',
                    '/\(ΔEOM Trend - PM\)/' => '(End of Month Trend vs Previous Month)',
                    '/\(MTD\)/' => '(Month-to-Date)',
                    '/\(PM\)/' => '(Previous Month)',
                    '/\(PW\)/' => '(Previous Week)',
                    '/decrease \(or ([\-+]?\d+\.\d+%)\)/' => 'decrease $1',
                    '/increase \(or ([\-+]?\d+\.\d+%)\)/' => 'increase $1',
                ];

                $region = [
                    'JAKARTA', 'SURABAYA', 'BANDUNG', 'BEKASI', 'MEDAN', 'TANGERANG', 'DEPOK', 'SEMARANG', 'PALEMBANG', 'MAKASSAR',
                    'SOUTH TANGERANG', 'BATAM', 'PEKANBARU', 'BOGOR', 'BANDAR LAMPUNG', 'PADANG', 'MALANG', 'DENPASAR', 'SAMARINDA', 'TASIKMALAYA',
                    'PONTIANAK', 'BANJARMASIN', 'BALIKPAPAN', 'JAMBI', 'CIMAHI', 'SOLO', 'MANADO', 'YOGYAKARTA', 'CILEGON', 'AMBON',
                    'MATARAM', 'JAYAPURA', 'KENDARI', 'KUPANG', 'PALU', 'TERNATE', 'MANOKWARI', 'SORONG',
                    'SUMBAGUT', 'SUMBAGTENG', 'WESTERN JABOTABEK', 'CENTRAL JABOTABEK', 'EASTERN JABOTABEK',
                    'JABAR', 'JATENG-DIY', 'JATIM', 'BALINUSRA', 'KALIMANTAN', 'SULAWESI', 'MALUKU', 'PAPUA', 'PUMA'
                ];

                $citiesAndRegionsPattern = '/\b(' . implode('|', array_map('preg_quote', $region)) . ')\b/i';
                $patterns[$citiesAndRegionsPattern] = '<strong>' . strtoupper('$1') . '</strong>';

                $months = [
                    'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC',
                    'JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER'
                ];

                $monthsPattern = '/\b(' . implode('|', array_map('preg_quote', $months)) . ')\b/i';
                $patterns[$monthsPattern] = '<strong>$1</strong>';

                $yearPattern = '/\b(\d{4})(?=\b)/';
                $patterns[$yearPattern] = '<strong>$1</strong>';
                $yearPatternNoSuffix = '/(\d{4})(?![\d])/';
                $patterns[$yearPatternNoSuffix] = '<strong>$1</strong>';

                foreach ($patterns as $pattern => $replacement) {
                    $content = preg_replace($pattern, $replacement, $content);
                }

                return $content;
            }

            foreach ($files as $index => $file) {
                if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
                    $image_path = $upload_folder . $file;
                    $text_file_path = $upload_folder . pathinfo($file, PATHINFO_FILENAME) . '_ok.txt';

                    if (file_exists($text_file_path) && is_readable($text_file_path)) {
                        $active_class = $first_rotation_counter == 0 ? 'active' : '';
                        $first_rotation_counter++;
            ?>
                        <div class="carousel-item <?= $active_class ?>">
                            <div class="row">
                                <div class="col-md-8 p-4 position-relative">
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
                                </div>
                                <div class="image-container mb-4">
                                    <img src="<?= base_url($image_path) ?>" alt="Gambar <?= $index + 1 ?>" class="img-fluid" style="width: 100%; object-fit: cover;">
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div> -->

        <div class="carousel-inner">
            <?php
            $upload_folder = 'uploads/';
            $files = scandir($upload_folder);
            $files = array_diff($files, array('.', '..'));
            $first_rotation_counter = 0;

            foreach ($files as $index => $file) {
                if (preg_match('/_OK\.(jpg|jpeg|png)$/i', $file)) {
                    $image_path = $upload_folder . $file;
                    $active_class = $first_rotation_counter == 0 ? 'active' : '';
                    $first_rotation_counter++;
            ?>
                    <div class="carousel-item <?= $active_class ?>">
                        <div class="row">
                            <div class="col-md-8 p-4 position-relative">
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
                            </div>
                            <div class="image-container mb-4">
                                <img src="<?= base_url($image_path) ?>" alt="Gambar <?= $index + 1 ?>" class="img-fluid" style="width: 100%; object-fit: cover;">
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