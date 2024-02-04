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
.dbresult {
    width:500px;
    margin:auto;
}
.dbresult tr:nth-child(odd) {
    background-color:white;
}
.dbresult tr:nth-child(even) {
    background-color:Cyan;
}
</style>
<form method="POST">
    BILL_NO<input type="text" name="bill_no">
    <input type="submit" name="submitval" value="sub">
</form>
<?php
$link = mysqli_connect('localhost', 'root', '', 'billing');
if (!$link) {
    die('connection error' . mysqli_connect_error());
}
if (isset($_POST['submitval']) && $_POST['submitval'] == 'sub') {
    $bill_no = $_POST['bill_no'];
    $query = "SELECT * FROM ip_billing WHERE bill_no='$bill_no'";
    $result = mysqli_query($link, $query);
    $numrow = mysqli_num_rows($result);

    if ($numrow > 0) {
        echo '<table class="dbresult">';
        echo '<tr><th colspan="8"><a href="billing.html">GO BACK</a></th></tr>';
        echo '<tr>';
        echo '<th>ip_id</th>';
        echo '<th>ip_name</th>';
        echo '<th>bill_no</th>';
        echo '<th>no_of_days</th>';
        echo '<th>room_rent</th>';
        echo '<th>medical_expenses</th>';
        echo '<th>lab_charges</th>';
        echo '</tr>';

        while($row=mysqli_fetch_assoc($result))
        {
            $bill_no=$row['bill_no'];
            echo '<tr>';
            echo '<td>' . $row['ip_id'] . '</td>';
            echo '<td>' . $row['ip_name'] . '</td>';
            echo '<td>' . $row['bill_no'] . '</td>';
            if(isset($row['no_of_days'])) {
                echo '<td>' . $row['no_of_days'] . '</td>';
            } else {
                echo '<td>0</td>';
            }
            if(isset($row['room_rent'])) {
                echo '<td>' . $row['room_rent'] . '</td>';
            } else {
                echo '<td>0</td>';
            }
            if(isset($row['medical_expenses'])) {
                echo '<td>' . $row['medical_expenses'] . '</td>';
            } else {
                echo '<td>0</td>';
            }
            if(isset($row['lab_charges'])) {
                echo '<td>' . $row['lab_charges'] . '</td>';
            } else {
                echo '<td>0</td>';
            }
            echo '</tr>';
        
        echo '</table>';

        $no_of_days = $row['no_of_days'];
        $room_rent = $row['room_rent'];
        $medical_expenses = $row['medical_expenses'];
        $lab_charges = $row['lab_charges'];
        $total = ($no_of_days * $room_rent) + $medical_expenses + $lab_charges;

        echo "<hr>TOTAL BILL: $total<hr>";
        }
    } else {
        echo "No results found!";
    }
}