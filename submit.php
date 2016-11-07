<?php
$email=$_POST['email'];
$password=$_POST['password'];
$output_form=false;
$submitted=false;
if(empty($email) && empty($password)){
	echo "<div class=\"message\">You forgot the email and password</div>";
	$output_form=true;
}
if(empty($email) && !(empty($password))){
	echo "<div class=\"message\">You forgot the email</div>";
	$output_form=true;
}
if(!empty($email) && empty($password)){
	echo "<div class=\"message\">You forgot password</div>";
	$output_form=true;
}
if(!empty($email) && !empty($password)){
	$dbc=mysqli_connect('localhost','root','','appdata') or die('Connection to server FAILED');
	$query="INSERT INTO login_table (email,pass_word)"
	."VALUES('$email','$password')";
	$result = mysqli_query($dbc,$query) or die('Error querying database.');
	mysqli_close($dbc);
	echo "Your information is registered.";
}
?>
<?php
if($output_form){

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="design.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="impossible.css"/>

</head>                                                                            

<body ng-app="impossible-app" ng-controller="tabController">

<div class="all-content">


<div class="nav nav-tabs menu">
<div class="login" ng-class="{active:ravalue()===1}"><a href ng-click="selecttab(1)">Log In</a></div>
<div class="signup" ng-class="{active:ravalue()===2}"><a href ng-click="selecttab(2)">Sign Up</a></div>

</div>
<div ng-show="rvalue()===1">
<div class="fom">
<form method="post" action="submit.php">
<div class="email"><label>EMAIL</label><input type="email" name="email"/></div>
<div class="password"><label>PASSWORD</label><input type="password" name="password"/></div>
<div class= "check"><input type="checkbox" name="checkbox"/><label for="checkbox">Keep me logged</label></div>
<div class="logbutton"><input type="submit" value="LOG IN"/></div>
</form>
</div>
<div class="footer">
<a href="#">Forgot password?</a>
</div>
</div>
<div ng-show="rvalue()===2">
</div>
</div>

</body>
<script type="text/javascript" src="angular.min.js"></script>
<script type="text/javascript" src="app.js"></script>
</html>
<?php
}
?>