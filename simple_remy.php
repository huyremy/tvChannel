<?php
// simple_remy.php

function simple_remy_begin() {
    ob_start();
}

function simple_remy_end() {
    $html = ob_get_clean();
    $compressed = gzcompress($html, 9);
    $encoded = base64_encode($compressed);

    echo '<script src="huyremy.js?v=21"></script>';
    echo "<script>console.log('remy loaded');</script>";
}
?>
