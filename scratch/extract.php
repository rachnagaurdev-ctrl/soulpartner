<?php
$files = [
    'resources/views/sections/category-list.blade.php',
    'resources/views/sections/home-category.blade.php',
    'resources/views/sections/banner.blade.php',
    'resources/views/sections/home-banner.blade.php'
];

$cssFile = 'public/assets/css/style.css';
$jsFile = 'public/assets/js/script.js';

foreach ($files as $file) {
    if (!file_exists($file)) continue;
    $content = file_get_contents($file);

    // Extract CSS
    if (preg_match_all('/<style.*?>(.*?)<\/style>/is', $content, $matches)) {
        foreach ($matches[1] as $css) {
            file_put_contents($cssFile, "\n/* --- Extracted from $file --- */\n" . trim($css) . "\n", FILE_APPEND);
        }
        $content = preg_replace('/<style.*?>.*?<\/style>/is', '', $content);
    }

    // Extract JS
    if (preg_match_all('/<script.*?>(.*?)<\/script>/is', $content, $matches)) {
        foreach ($matches[1] as $js) {
            if (trim($js)) {
                file_put_contents($jsFile, "\n/* --- Extracted from $file --- */\n" . trim($js) . "\n", FILE_APPEND);
            }
        }
        $content = preg_replace('/<script.*?>.*?<\/script>/is', '', $content);
    }

    file_put_contents($file, $content);
    echo "Processed $file\n";
}
