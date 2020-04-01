<?php
echo "file saved";
$data = $_POST['data'];
$file_code=fopen("testphp.c","w+");
fwrite($file_code,$data);
fclose($file_code);
echo file saved;


?>


