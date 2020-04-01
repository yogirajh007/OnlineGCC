<?php
echo "file saved";
$data = $_POST['data'];
$file_code=fopen("testphp.c","w+")or die("Unable to open file!");
fwrite($file_code,$data);
fclose($file_code);
echo file saved;


?>


