<?php

include 'connection.php';
$searchDate = $_REQUEST['date'];
 
$sql="SELECT Home, Away FROM tip WHERE date='".$searchDate."'";
$result=$connection->query($sql);

echo "<option value=''></option>";
if($result->num_rows > 0) {
    while($row=$result->fetch_assoc()) {
        echo "<option value='".$row['Home']."-".$row['Away']."'>".$row['Home']."-".$row['Away']."</option>";
    }   
}

$connection->close();
?>

