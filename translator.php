<?php
/**
 * Created by PhpStorm.
 * User: adyopo
 * Date: 13.03.2019
 * Time: 23:16
 */

$directory = new \RecursiveDirectoryIterator('./app/', \FilesystemIterator::FOLLOW_SYMLINKS);
$filter = new \RecursiveCallbackFilterIterator($directory, function ($current, $key, $iterator) {
    // Skip hidden files and directories.
    if ($current->getFilename()[0] === '.') {
        return FALSE;
    }
    if ($current->isDir()) {
        // Only recurse into intended subdirectories.
        return $current->getFilename() === 'wanted_dirname';
    }
    else {
        // Only consume files of interest.
        return strpos($current->getFilename(), 'wanted_filename') === 0;
    }
});
$iterator = new \RecursiveIteratorIterator($filter);
$files = array();
foreach ($iterator as $info) {
    $files[] = $info->getPathname();
}
var_dump($files);