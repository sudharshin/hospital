<?php
if(isset($_GET['ip_id']))
{
?>
<?php
$link=mysqli_connect('localhost','root','','inpatient_record');
if(!$link)
{
die('connection error'.myssqli_connect_error());
}
$ip_id=$_GET['ip_id'];
$query="SELECT date_of_admit,date_of_discharge,room_no,lab_no FROM inpatient WHERE
ip_id='$ip_id'";
$result=mysqli_query($link,$query);
$numrow=mysqli_num_rows($result);
if($numrow==1)
{
$row=mysqli_fetch_assoc($result);
?>
<form action="ip_insert.php" method="post">
<input type="hidden" name="ip_id" value="<?=$ip_id?>">
DATE OF ADMIT:<input type="date" name="admit" value="<?=$row['date_of_admit']?>"><br><br>
DATE OF DISCHARGE:<input type="date" name="discharge" value="<?=$row['date_of_discharge']?>"><br><br>
ROOM NO:<input type="text" name="rno" value="<?=$row['room_no']?>"><br><br>
LAB NO:<input type="text" name="lno"
value="<?=$row['lab_no']?>"><br><br>
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