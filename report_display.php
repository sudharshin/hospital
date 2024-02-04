<style>
     body
    {
        background-image:url('hp.png');
        background-repeat:no-repeat;
        background-size:cover;
    }
.result,.result td,.result th
{
border:2px solid black;
border-collapse:collapse;
padding:8px;
}
.result
{
width:500px;
margin:auto;
}
.result tr:nth-child(odd)
{
background-color:white;
}
.result tr:nth-child(even)
{
background-color:Cyan;
}
</style>
<?php
$link=mysqli_connect('localhost','root','','reports_details');
if(!$link)
{
die('connection error'.myssqli_connect_error());
}
$query="SELECT * FROM report";
$result=mysqli_query($link,$query);
$numrow=mysqli_num_rows($result);
if($numrow>0)
{
echo '<table class="result">';
echo '<tr>';
echo '<th>Delete</th>';
echo '<th>Update</th>';
echo '<th>Patient ID</th>';
echo '<th>Name</th>';
echo '<th>Age</th>';
echo '<th>Gender</th>';
echo '<th>Test_Name</th>';
echo '<th>Results</th>';
echo '</tr>';
while($row=mysqli_fetch_assoc($result))
{
$p_id=$row['p_id'];
echo '<tr>';
echo '<td><a href="report_delete.php?p_id='.$p_id.'" >Delete</a></td>';
echo '<td><a href="report_update.php?p_id='.$p_id.'">Update</a></td>';
echo '<td>'.$row['p_id'].'</td>';
echo '<td>'.$row['name'].'</td>';
echo '<td>'.$row['age'].'</td>';
echo '<td>'.$row['gender'].'</td>';
echo '<td>'.$row['test_name'].'</td>';
echo '<td>'.$row['result'].'</td>';
echo '</tr>';
}
echo '<tr><th colspan="8"><a href="report.html">Go Back To The Previous
Page</a></th></tr>';
echo '</table>';
}
else{
echo 'Record not found';
}