<?php
$executionStartTime = microtime(true);
$data = $_POST["data"] ;
$input = $_POST["cusinput"];
$error = "error.txt";
$file_code=fopen("testphp1.cpp","w+");
fwrite($file_code,$data);
fclose($file_code);
$file_code1=fopen("input.txt","w+");
fwrite($file_code1,$input);
fclose($file_code1);
exec("chmod 777 testphp1.cpp");
exec("chmod 777 input.txt");
exec("g++ testphp1.cpp -lm 2>error.txt");
$errordata = file_get_contents($error);
if(!strpos($errordata,"error"))
{ 
  if(!empty($errordata)) 
  {
	  echo "<br><h3>Warning!!</h3><br><pre>$errordata</pre><br><br>";
  }
  exec("chmod 777 a.out");

$output = shell_exec("timeout 2s ./a.out <input.txt");
                echo "<textarea style=\"vertical-align: center\" rows=\"10\" cols=\"60\">$output</textarea>";

$endtime = microtime(true);
$rtf= $endtime - $executionStartTime; 
$sec = sprintf('%0.2f',$rtf);
echo "<pre>Compiled And Executed In: $sec s</pre>";
  
}
else
{
  echo "<br><br><h3>Errors!!</h3><br><pre>$errordata</pre><br><br>";
  echo "</div><br><h2>Compilation failed!!</h2>";
}
?>
