<!DOCTYPE html>
<html>
<head>
	<title>ONE STOP TUT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
//paste this code under the head tag or in a separate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });</script>
<style type="text/css">

body{
   background: url(images/frontoffice.jpg) no-repeat center center fixed; 
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   }

.sidebar{color:blue;text-align: center;font-style: italic;}
.col-sm-4{margin-top: 120px;}
.col-sm-8{text-align: center;margin-top:270px;}
p{color: white;font-size:8vh;}
.inputs{border:2px solid blue;border-radius: 8px;width:45vh;padding:8px 8px;margin:8px;box-sizing: border-box;color:blue;}
.inputs:hover{z-index:120;box-shadow: 5px 5px 5px skyblue;}
label{color:white;}
#mybtn:hover{box-shadow: 5px 5px 5px skyblue;}

 .modal-header, h4, .close {
      background-color: blue;
      border-radius: 40px;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-content{border-radius: 60px;background:linear-gradient(to bottom,skyblue,white);}
  .modcnt{color:black;}
  .no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(images/preloader_3.gif) center no-repeat #fff;
}
</style>



</head>


<body>

<?php

$user_name="ABHI";
$host_name="localhost";
$admin_password="123";
mysql_connect($host_name,$user_name,$admin_password);
mysql_select_db("seconddb");


if(isset($_POST['logname'])&&isset($_POST['logpass']))
{$logname=$_POST['logname'];
$logpass=$_POST['logpass'];

	if(!empty($_POST['logname'])&&!empty($_POST['logpass']))
	{
	$queryl="SELECT * FROM `logintb` WHERE `name` = '$logname' AND `password` = '$logpass' ";
	$queryl_run=mysql_query($queryl);
	if(mysql_num_rows($queryl_run)==1)
	{ session_start();
		$_SESSION['check']='login';
		$_SESSION['welcomeuser']=$logname;
		header("location:mainpage.php");

	}
	else
	{echo '<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-

label="close">&times;</a>
    <strong>LOGIN ERROR!</strong><br>enter a valid  username and password or you can create a new account
  </div>';}	
	}
	else
		{echo '<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-

label="close">&times;</a>
    <strong>LOGIN ERROR!</strong><br>you can not leave anyfield empty youy must supply username and password
  </div>';}
}



if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['rpass']))
	{
$name=$_POST['name'];
$mail=$_POST['email'];
$password=$_POST['pass'];
$rpassword=$_POST['rpass'];
if($password!=$rpassword)
	echo "<em style=\"color:red\" class='result' >*password do not match</em>";
else
{
   
 $query="SELECT * FROM `logintb` WHERE `name` = '$name' ";
 $query_run=mysql_query($query);
 if(mysql_num_rows($query_run)==1)
 	{echo "<em style='color:red' class='result' >*user name already exist</em>";}
 else
 	{echo "<em style='color:red' class='result' >*Your form has been submitted now LOGIN</em>";

$queryi="INSERT INTO `logintb` (`id`, `name`, `email`, `password`) VALUES (NULL, '".$name."', '".$mail."', '".$password."')";
$queryi_run=mysql_query($queryi);




}


}
}






?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-8"><p>ONESTOPTUT</p><button class="btn btn-primary btn-lg" id="mybtn" data-toggle="modal" data-target="#myModal">CLICK HERE TO LOG IN</button></div>
<div class="col-sm-4 sidebar">
 <h1 style="color:white">SIGN IN</h1>
 <hr>
 <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
 <label>NAME:</label><br><input type="text" name="name" value=""  data-toggle="popover"  data-trigger="hover" data-placement="left" class="inputs" data-content="Enter a username"></input><br>
 <label>Email:</label><br><input type="text" name="email" value=""  data-toggle="popover" data-trigger="hover" data-placement="left" class="inputs" data-content="Enter a valid email address"></input><br>
 <label>Password:</label><br><input type="password" name="pass" value="" data-toggle="popover" data-trigger="hover" data-placement="left" class="inputs" data-content="password of max length 10" ></input><br>
 <label>Retype Password:</label><br><input type="password" name="rpass" value=""  data-toggle="popover" data-trigger="hover" data-placement="left" class="inputs" data-content="retype the same password you created"></input><br>
 <input type="submit" name="submit" value="submit form" class="btn btn-primary btn-lg inputs " data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Click here to submit form" style="color:white"></input><br>
 </form>
<div class="result"></div>
</div>
</div>
</div>


<!-- Modal -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock "></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="POST" action="">
            <div class="form-group">
              <label for="usrname" class="modcnt"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email" name="logname">
            </div>
            <div class="form-group">
              <label for="psw" class="modcnt"><span class="glyphicon glyphicon-eye-open" ></span> Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="logpass">
            </div>
              <button type="submit" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
      </div>
      
    </div>
  </div> 
<script >
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
	
	
</script>
</body>
<div class="se-pre-con"></div>
</html>