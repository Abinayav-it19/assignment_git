<?php  include('connection.php');
?>
<!DOCTYPE html>
<html>

<head>
    <h1>Registration page</h1>
</head>
<body>
    <div >
    <form>
    <?php
session_start();
error_reporting(0);
include('connection.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="Insert into register values($email,$password)";
$query= $dbh -> prepare($sql);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{

echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
} else{

    echo "<script>alert('Invalid Details');</script>";

}

}

?>
        
        <label for="email"><b> Email</b></label>
        <input type="text" name="email" id="email" required>
        <label for="password"><b> Password</b></label>
        <input type="password" name="password" id="password" required>
        
        <button type="submit" value="submit"><a href="/loginpage.php"></a>Register</button>

    </form>
</div>
</body>

</html>