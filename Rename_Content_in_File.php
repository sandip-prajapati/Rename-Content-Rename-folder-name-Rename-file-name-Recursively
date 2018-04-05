<?php
// Rename Content in File name
function getDirContents($dir, &$results = array())
{
    $string     = "ABC"; // Write here you want to change in all file
    $findstring = "XYZ"; // Write here you want to find and replace with $string in all file
    $files      = scandir($dir);
    
    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $path;
            // Override file operation
            @$file_contents = file_get_contents($path);
            $file_contents = str_replace($string, $findstring, $file_contents);
            @file_put_contents($path, $file_contents);
            
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
            // Override file operation
            @$file_contents = file_get_contents($path);
            $file_contents = str_replace($string, $findstring, $file_contents);
            @file_put_contents($path, $file_contents);
        }
    }
    return $results;
}
echo getDirContents('E:/xampp/htdocs/wordpress482/'); //Path goes here
?>
