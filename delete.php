<?php
echo "<form align='center' action='index.php?m=admin&am=del' method='post' name='selection'>";
echo "<select name='date'>";
echo "<option value=''></option>";
include 'connection.php';
$sql="SELECT DISTINCT Date From tip ORDER BY Date DESC";
$result=$connection->query($sql);
if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
        echo "<option value='".$row['Date']."'>".$row['Date']."</option>";
    }
}
echo "</select>";
echo "<input type='submit' name='select' value='select'>";
echo "</form>";

if(isset($_REQUEST['select']) || isset($_REQUEST['date'])) {
    $sql="SELECT * FROM tip WHERE Date='".$_REQUEST['date']."'";
    echo "<table align='center' border='1'";     
                        echo "<tr>";
                                echo "<td rowspan='2' align='center'>NAT</td>";                        
                                echo "<td rowspan='2' align='center'>League</td>";
                                echo "<td rowspan='2' align='center'>Time</td>";
                                echo "<td rowspan='2' align='center'>Match</td>";
                                echo "<td colspan='3' align='center'>ODDS</td>";
                                echo "<td rowspan='2' align='center'>TIP</td>";
                                echo "<td rowspan='2' align='center'>Result</td>";
                                echo "<td rowspan='2' align='center'>Vip</td>";
                                echo "<td rowspan='2' align='center'>VipTip</td>";
                                echo "<td rowspan='2' align='center'>OK</td>";
                                echo "<td rowspan='2' align='center'>Delete</td>";
                        echo "</tr>";
                        echo "<tr align='center'>"; 				
                                echo "<td>1</td>";
                                echo "<td>X</td>";
                                echo "<td>2</td>";
                        echo "</tr>";
                        
        $result=$connection->query($sql);
        while($row=$result->fetch_assoc()) {
            echo "</tr>";
                        echo "<tr align='center'>"; 				
                                echo "<td>".$row['Nation']."</td>";
                                echo "<td>".$row['League']."</td>";
                                echo "<td>".$row['Time']."</td>";
                                echo "<td>".$row['Home']."-".$row['Away']."</td>";
                                echo "<td>".$row['Odds1']."</td>";
                                echo "<td>".$row['OddsX']."</td>";
                                echo "<td>".$row['Odds2']."</td>";
                                echo "<td>".$row['Tip']."</td>";
                                if($row['Result']!='') {
                                echo "<td>".$row['Result']."</td>";
                                }else {
                                    echo "<td>"."-"."</td>";
                                }
                                echo "<td>".$row['Vip']."</td>";
                                if($row['VipTip']!='') {
                                echo "<td>".$row['VipTip']."</td>";
                                }else {
                                    echo "<td>"."-"."</td>";
                                }
                                echo "<td><a href='index.php?m=admin&am=rowOK&id=".$row['ID']."&date=".$_REQUEST['date']."'><img src='img/confirm.png' class='imgus'  /></a></td>";
                                echo "<td><a href='index.php?m=admin&am=rowDelete&id=".$row['ID']."&date=".$_REQUEST['date']."' onClick='return conf();'><img src='img/delete.png' class='imgus'  /></a></td>";
                        echo "</tr>";
        }
    echo "</table>"; 
}
?>
<script type="text/javascript">
    function conf() {
        return confirm("Are u sure?");
    }
    
</script>

