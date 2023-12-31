<?php 
require_once("includes/config.php");
// code   username availablity
if(!empty($_POST["username"])) {
	$uname= $_POST["username"];
	$stmt=$con->prepare("select AdminuserName from tbladmin where AdminuserName='?'");
	$stmt->execute(array($uname)); 
	$row=$stmt->rowCount();
	if($row>0){
		echo "<span style='color:red'> Username already exists. Try with another username</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		echo "<span style='color:green'> Username available for Registration .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
?>
