<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{

    echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
<html>

<head>
    <h1>login page</h1>
</head>

<body>
    <form>
        <label for="email"><b> Email</b></label>
        <input type="text" name="email" id="email" required>
        <label for="email"><b> Password</b></label>
        <input type="Password" name="Password" id="Password" required>
      
        <button type="submit">login</button>

    </form>
</body>

</html>