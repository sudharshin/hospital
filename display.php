<style>
    body
    {
        background-image:url('hp.png');
        background-repeat:no-repeat;
        background-size:cover;
    }
.dbresult,.dbresult td,.dbresult th{
border:1px solid black;
border-collapse:collapse;
padding:8px;
}
.dbresult
{
width:500px;
margin:auto;
}
.dbresult tr:nth-child(odd)
{
background-color:white;
}
.dbresult tr:nth-child(even)
{
background-color:Cyan;
}
</style>
<?php
$link=mysqli_connect('localhost','root','','record');
if(!$link)
{
die('connection error'.myssqli_connect_error());
}
$query="SELECT * FROM doctor_details";
$result=mysqli_query($link,$query);
$numrow=mysqli_num_rows($result);
if($numrow>0)
{
echo '<table class="dbresult">';
echo '<tr>><th colspan="8"><a href="form.html">GO BACK</a></th></tr>';
echo '<tr>';
echo '<th>delete</th>';
echo '<th>update</th>';
echo '<th>name</th>';
echo '<th>id</th>';
echo '<th>gender</th>';
echo '<th>years_of_experience</th>';
echo '<th>age</th>';
echo '<th>specialization</th>';
echo '</tr>';
while($row=mysqli_fetch_assoc($result))
{
$id=$row['id'];
echo '<tr>';
echo '<td><a href="delete.php?id='.$id.'" >delete</a></td>';
echo '<td><a href="update.php?id='.$id.'">update</a></td>';
echo '<td>' . $row['name'] . '</td>';
echo '<td>' . $row['id'] . '</td>';
echo '<td>' . $row['gender'] . '</td>';
echo '<td>' . $row['years_of_experience'] . '</td>';
echo '<td>' .$row['age'] . '</td>';
echo '<td>' . $row['specialization'] . '</td>';
echo '</tr>';
}
echo '</table>';
}
else{
echo 'record not found';
}
?>