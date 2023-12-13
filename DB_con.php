<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'job');
class DB_con
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}
 
// for username availblty
public function usernameavailblty($uname) {
$result =mysqli_query($this->dbh,"SELECT username FROM users WHERE username='$username'");
return $result;
 
}
// Function for registration
	public function registration($username,$email,$password,$role)
	{
	$ret=mysqli_query($this->dbh,"insert into users(username,email,password,Password) values('$fname','$uname','$uemail','$pasword')");
	return $ret;
	}
// Function for signin
public function signin($uname,$pasword)
	{
	$result=mysqli_query($this->dbh,"select id,FullName from tblusers where Username='$uname' and Password='$pasword'");
	return $result;
	}
}
?>