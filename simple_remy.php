<?php 
function simple_remy_begin() {
    ob_start();  
}

function simple_remy_end() {
    $html = ob_get_clean();  
    $compressed = gzcompress($html, 9);  
    $encoded = base64_encode($compressed);
    
    $js = <<<JS
<script>
		
(function(){
    var d = "$encoded";
    var s = atob(d);
    var len = s.length;
    var bytes = new Uint8Array(len);
    for (var i = 0; i < len; i++) {
        bytes[i] = s.charCodeAt(i);
    }
    var decompressed = remy.inflate(bytes, {to: 'string'});
    document.open();
    document.write(decompressed);
    document.close();
})();
</script>
JS;
    echo '<script src="huyremy.js?v=21"></script>';
    echo $js;
} ?>
