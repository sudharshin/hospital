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
$link=mysqli_connect('localhost','root','','outpatient_record');
if(!$link)
{
die('connection error'.myssqli_connect_error());
}
$query="SELECT * FROM outpatient";
$result=mysqli_query($link,$query);
$numrow=mysqli_num_rows($result);
if($numrow>0)
{
echo '<table class="dbresult">';
echo '<tr>><th colspan="7"><a href="op_form.html">GO BACK</a></th></tr>';
echo '<tr>';
echo '<th>delete</th>';
echo '<th>update</th>';
echo '<th>name</th>';
echo '<th>id</th>';
echo '<th>datetime</th>';
echo '<th>age</th>';
echo '<th>gender</th>';
echo '</tr>';
while($row=mysqli_fetch_assoc($result))
{
$op_id=$row['op_id'];
echo '<tr>';
echo '<td><a href="op_delete.php?op_id='.$op_id.'" >delete</a></td>';
echo '<td><a href="op_update.php?op_id='.$op_id.'">update</a></td>';
echo '<td>' . $row['name'] . '</td>';
echo '<td>' . $row['op_id'] . '</td>';
echo '<td>' . $row['date_time'] . '</td>';
echo '<td>' .$row['age'] . '</td>';
echo '<td>' . $row['gender'] . '</td>';
echo '</tr>';
}
echo '</table>';
}
else{
echo 'record not found';
}