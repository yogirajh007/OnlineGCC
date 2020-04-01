<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Result, Output, Warnings and Errors!</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.0/css/mdb.min.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="logo.png"/>
</head>

<body style="text-align: center;">
	<!--Navbar -->
  <div>
    <img src="logo.png" class="img-responsive" style="width: 150px; height: 150px;">
  </div>
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color" style="padding-left: 150px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="readytocomp.html">Compiler</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      
    </ul>
    
  </div>
</nav>

<!--/.Navbar -->
<h2>Code Submitted!</h2>
<div style="background-color: #c6bcbc; margin-left: 100px ;margin-right: 100px;">
<?php
$executionStartTime = microtime(true);
$data = $_POST["data"] ;
$input = $_POST["cusinput"];
$error = "error.txt";
$file_code=fopen("testphp.c","w+");
fwrite($file_code,$data);
fclose($file_code);
$file_code1=fopen("input.txt","w+");
fwrite($file_code1,$input);
fclose($file_code1);
exec("chmod 777 testphp.c");
exec("chmod 777 input.txt");
exec("gcc testphp.c -lm 2>error.txt");
$errordata = file_get_contents($error);
if(!strpos($errordata,"error"))
{	
	
	echo "<br><h3>Warning!!</h3><br><pre>$errordata</pre><br><br>";
	echo "</div><br><h2>OUTPUT:</h2>";
	exec("chmod 777 a.out");

$output = shell_exec("timeout 5s ./a.out <input.txt");
                echo "<textarea style=\"vertical-align: center\" rows=\"7\" cols=\"80\">$output</textarea>";

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
<!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>
  <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.0/js/mdb.min.js"></script>
</body>

</html>



