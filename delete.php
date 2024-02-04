<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$link=mysqli_connect('localhost','root','','record');
if(!$link)
{
die('connection error'.myssqli_connect_error());
}
$query="DELETE FROM doctor_details WHERE id='$id'";
$result=mysqli_query($link,$query);
if($result)
{
header('location:display.php');
}
else
{
echo 'error while deleting the record';
}
}
else
{
echo 'record cannot be deleted';
}