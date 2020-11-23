<!DOCTYPE html>

<?php
//include('login.php'); // Includes Login Script
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();  
$ID = $_GET['id'];

	$servername = "localhost";
		$username = "DexterGCC";
		$password = "dexterSQL@123";
		$dbname = 'Userdata';
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error)
	       	{
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT code from Submissions where ID='$ID'";
	$result = $conn->query($sql);
		$conn->close();


//if(isset($_SESSION['uname']))
//{

//}
?>


<html>
    <head>
        <title>Compile and Execute your program...</title>
        <!-- Font Awesome -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.0/css/mdb.min.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="logo.png"/>
    </head>
    <body>
	<!--Login-->

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input id="uname" type="email" id="defaultForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input id="password" type="password" id="defaultForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button id = "loginbutton"class="btn btn-default">Login</button>
      </div>
    </div>
  </div>
</div>

<!--Loginends-->
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark primary-color">
            <div class="container">
                <!-- Collapse button -->
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Collapsible content -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <!-- Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
			<button id = "tata" class="btn btn-outline-white btn-sm" data-toggle="modal" data-target="#modalLoginForm"  type="button"><?php

if(isset($_SESSION['uname']))
{
	echo $_SESSION['uname']."</button>";
}
else
	echo "Login</button>";


?>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-white btn-sm" type="button">Live Share</button>
                        </li>
<li class="nav-item">
<button class="btn btn-outline-white btn-sm" type="button">History</button>
</li>
<?php

if(isset($_SESSION['uname']))
{
	echo '<li class="nav-item"><button id = "logout" class="btn btn-outline-white btn-sm" data-toggle="modal" data-target="#modalLoginForm"  type="button">';
	echo "Logout";
	echo '</button>';
}

?>
                        </li>

                    </ul>
                    <!-- Links -->
                </div>
                <!-- CTA -->
            </div>
        </nav>
        <!--/.Navbar-->
        <!--/.Navbar -->
        <div class="container">
		<div class = "row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group" >
                    <form action="" method="post" id="testform">
		    <h3>Code:</h3><textarea id = "code" name="data" data-editor="c_cpp" data-gutter="1" style="horizontal-align: center; " rows="10" cols="60"><?php

foreach($result as $row)
	echo $row['code'];

?></textarea>
			<br>
			<h3>Input:</h3>
                        <textarea name="cusinput" style="vertical-align: center" rows="4" cols="60"></textarea>
			<button type="button" id="post-btn">Compile!</button>
			<?php
if(isset($_SESSION['uname']))
{
 echo '<button type="button" id="save">Save</button>';
}

?>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-lg-6" id="result">
                <h3>Result:</h3>
                <div id= "res">
			<textarea name="res" style="vertical-align: center" rows="10" cols="60"></textarea>
		</div>
		<div id= "his">
			<?php
if(isset($_SESSION['uname']))
{
	$servername = "localhost";
		$username = "DexterGCC";
		$password = "dexterSQL@123";
		$dbname = 'Userdata';
		$uname = $_SESSION['uname'];
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error)
	       	{
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * from Submissions where user='$uname' ORDER BY Time DESC LIMIT 3";
	$result = $conn->query($sql);
		$conn->close();
		echo "<h3>History:</h3>";
		echo '<table class="table"><thead><tr><th scope="col">ID</th><th scope="col">Time</th></tr></thead><tbody>';
		foreach($result as $row)
		{
		echo "<tr><th><a href='view.php?id=".$row['ID']."'>".$row['ID']."</a></th><th>".$row['Time']."</th></tr>";
		}
		echo "</tbody></table>";
 //echo '<br><br><ul><li><b>Save code too see history</b></li></ul>';
}
else
	echo "<br><br><ul><li><b>You're not logged in. Login to save and view code.</b></li></ul>";

?>

		</div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $("#post-btn").click(function(){
        $('#res').html( "Compiling...")
    $.post("gpptest1.php", $("#testform").serialize(), function(data) {
        $("#res").html("");
    $('#res').append(data);
    });
    });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.9/ace.js"></script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.0/js/mdb.min.js"></script>
    <script>
    $(function() {
    $('textarea[data-editor]').each(function() {
    var textarea = $(this);
    var mode = textarea.data('editor');
    var editDiv = $('<div>', {
            position: 'absolute',
            width: textarea.width(),
            height: textarea.height(),
            'class': textarea.attr('class')
            }).insertBefore(textarea);
            textarea.css('display', 'none');
            var editor = ace.edit(editDiv[0]);
            editor.renderer.setShowGutter(textarea.data('gutter'));
            editor.getSession().setValue(textarea.val());
            editor.getSession().setMode("ace/mode/" + mode);
            editor.setTheme("ace/theme/idle_fingers");
            editor.getSession().on("change", function () {
            textarea.val(editor.getSession().getValue());
            });
            });
            });
	</script>
<script>
$(document).ready(function(){
      $('#loginbutton').click(function(){
           var username = $('#uname').val();
           var password = $('#password').val();
           if(username != '' && password != '')
           {
                $.ajax({
                     url:"action.php",
                     method:"POST",
                     data: {username:username, password:password},
                     success:function(data)
                     {
                          //alert(data);
                          if(data == 'No')
                          {
                               alert("Wrong Data");
                          }
                          else
			  {
				//alert(data);
                               $('#loginModal').hide();
                               location.reload();
                          }
                     }
                });
           }
           else
           {
                alert("Both Fields are required");
           }
      });
      $('#logout').click(function(){
           var action = "logout";
           $.ajax({
                url:"logout.php",
                method:"POST",
                data:{action:action},
                success:function()
                {
                     location.reload();
                }
           });
      });
$('#save').click(function(){
           var username = document.getElementById('tata').innerHTML;
	   var code = $('#code').val();
	   console.log(username);
           if(username != '' && code != '')
           {
                $.ajax({
                     url:"history.php",
                     method:"POST",
                     data: {username:username, code:code},
                     success:function(data)
                     {
			        $("#his").html("");
    $('#his').append(data);
		     
		     }
                });
           }
           else
           {
                alert("Both Fields are required");
           }
      });

 });
 </script>

    </body>
</html>
