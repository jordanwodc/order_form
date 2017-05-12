<?php
$files = scandir('.');
foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) == 'php') {
        if (!(strpos($file, 'index') > -1)) {
            ?><a href="<?php echo $file ?>"><?php echo pathinfo($file, PATHINFO_FILENAME) ?></a></br><?php
        }
    }
}