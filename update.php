<?php
if(isset($_GET['id']))
{
?>
<?php
$link=mysqli_connect('localhost','root','','record');
if(!$link)
{
die('connection error'.myssqli_connect_error());
}
$id=$_GET['id'];
$query="SELECT name,gender,years_of_experience,specialization,age FROM doctor_details WHERE
id='$id'";
$result=mysqli_query($link,$query);
$numrow=mysqli_num_rows($result);
if($numrow==1)
{
$row=mysqli_fetch_assoc($result);
?>
<form action="insert.php" method="post">
<input type="hidden" name="id" value="<?=$id?>">
NAME:<input type="text" name="name" value="<?=$row['name']?>"><br><br>
GENDER:<input type="text" name="gender" value="<?=$row['gender']?>"><br><br>
YEARS OF EXPERIENCE:<input type="text" name="yrs_of_exp"
value="<?=$row['years_of_experience']?>"><br><br>
AGE:<input type="text" name="age" value="<?=$row['age']?>"><br><br>
SPECIALIZATION:<input type="text" name="specialization"
value="<?=$row['specialization']?>"><br><br>
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