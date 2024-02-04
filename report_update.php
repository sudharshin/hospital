<?php
if(isset($_GET['p_id']))
{
?>
<?php
$link=mysqli_connect('localhost','root','','reports_details');
if(!$link)
{
die('connection error'.myssqli_connect_error());
}
$p_id=$_GET['p_id'];
$query="SELECT name,age,gender,test_name,result FROM report WHERE p_id='$p_id'";
$result=mysqli_query($link,$query);
$numrow=mysqli_num_rows($result);
if($numrow==1)
{
$row=mysqli_fetch_assoc($result);
?>
<form action="report_insert.php" method="post">
<input type="hidden" name="p_id" value="<?=$p_id?>">
Name:<input type="text" name="name" value="<?=$row['name']?>"><br><br>
Age:<input type="text" name="age" value="<?=$row['age']?>"><br><br>
Gender:<input type="text" name="gender" value="<?=$row['gender']?>"><br><br>
Test_Name:<input type="text" name="tname" value="<?=$row['test_name']?>"><br><br>
Result:<input type="text" name="result" value="<?=$row['result']?>"><br><br>
<input type="submit" name="submitval" value="update">
</form>
<?php }
else{
echo 'Record not found';
}
}
else{
echo 'ID does not exist';
}
?>