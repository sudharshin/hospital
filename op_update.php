<?php
if(isset($_GET['op_id']))
{
?>
<?php
$link=mysqli_connect('localhost','root','','outpatient_record');
if(!$link)
{
die('connection error'.myssqli_connect_error());
}
$op_id=$_GET['op_id'];
$query="SELECT name,date_time,age,gender FROM outpatient WHERE
op_id='$op_id'";
$result=mysqli_query($link,$query);
$numrow=mysqli_num_rows($result);
if($numrow==1)
{
$row=mysqli_fetch_assoc($result);
?>
<form action="op_insert.php" method="post">
<input type="hidden" name="op_id" value="<?=$op_id?>">
NAME:<input type="text" name="name" value="<?=$row['name']?>"><br><br>
DATETIME:<input type="datetime-local" name="date_time" value="<?=$row['date_time']?>"><br><br>
AGE:<input type="text" name="age" value="<?=$row['age']?>"><br><br>
GENDER:<input type="text" name="gender" value="<?=$row['gender']?>"><br><br>
<input type="submit" name="submitval" value="update">
</form>
<?php }
else{
echo 'record not found';
}
}
else{
echo 'id does not exist';
}
?>