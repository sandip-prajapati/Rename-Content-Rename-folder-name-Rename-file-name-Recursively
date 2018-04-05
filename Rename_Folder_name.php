<?php
$path = realpath('E:/xampp/htdocs/dirchangename');
function getDirectories($path)
{
    $newfoldername = "ABC"; // Write here you want to change in all file
    $oldfoldername = "XYZ"; // Write here you want to find and replace with $newfoldername in all file
    $iterator      = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
    $folders       = iterator_to_array($iterator, true);
    
    foreach ($folders as $name => $folder) {
        if (is_dir($folder)) {
            $url = explode(DIRECTORY_SEPARATOR, $folder);
            array_pop($url);
            $paths        = implode('/', $url);
            $old_dir_name = substr($folder, strrpos($folder, DIRECTORY_SEPARATOR) + 1);
            $new_dir_name = str_replace('sophosstests', 'dharmesh', $old_dir_name);
            if (!empty($new_dir_name)) {
                $newname = $paths . '/' . $new_dir_name;
                echo $folder . " renamed with " . $newname . "<br/>";
                
                sleep(1);
                @rename($folder, $newname);
            }
        }
    }
}
echo getDirectories($path);
?>
