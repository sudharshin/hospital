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
$link=mysqli_connect('localhost','root','','inpatient_record');
if(!$link)
{
die('connection error'.myssqli_connect_error());
}
$query="SELECT * FROM inpatient";
$result=mysqli_query($link,$query);
$numrow=mysqli_num_rows($result);
if($numrow>0)
{
echo '<table class="dbresult">';
echo '<tr>><th colspan="7"><a href="ip_form.html">GO BACK</a></th></tr>';
echo '<tr>';
echo '<th>delete</th>';
echo '<th>update</th>';
echo '<th>ip_id</th>';
echo '<th>date_of_admit</th>';
echo '<th>date_of_discharge</th>';
echo '<th>room_no</th>';
echo '<th>lab_no</th>';
echo '</tr>';
while($row=mysqli_fetch_assoc($result))
{
$ip_id=$row['ip_id'];
echo '<tr>';
echo '<td><a href="ip_delete.php?ip_id='.$ip_id.'" >delete</a></td>';
echo '<td><a href="ip_update.php?ip_id='.$ip_id.'">update</a></td>';
echo '<td>' . $row['ip_id'] . '</td>';
echo '<td>' . $row['date_of_admit'] . '</td>';
echo '<td>' . $row['date_of_discharge'] . '</td>';
echo '<td>' .$row['room_no'] . '</td>';
echo '<td>' . $row['lab_no'] . '</td>';
echo '</tr>';
}
echo '</table>';
}
else{
echo 'record not found';
}