<?php
$path = realpath('E:/xampp/htdocs/dirchangename');
function getFiles($path)
{
    $newstring = "ABC"; // Write here you want to change in all file
    $oldstring = "XYZ"; // Write here you want to find and replace with $newstring in all file
    $filearray = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::LEAVES_ONLY);
    foreach ($filearray as $name => $file) {
        //echo $file->getFilename(),"\r\n";
        $filename = str_replace($newstring, $oldstring, $file->getFilename());
        $newname  = $file->getPath() . DIRECTORY_SEPARATOR . $filename;
        rename($name, $newname);
    }
}
echo getFiles($path);
?>
