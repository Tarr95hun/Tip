<form action="index.php?m=admin&am=add" method="post" name="addData">
<table align='center' border='1' width='50%'> 
    <tr align="center">
        <td>Nation</td>
        <?php
        echo "<td>";
                        echo "<select name='nation' id='nation' onChange='select();'>";
                            echo "<option value=''></option>";
                            include 'connection.php';
                            $sql="SELECT * FROM nation ORDER BY ID";
                            $result2=$connection->query($sql);
                            if($result2->num_rows > 0){
                                while($row2=$result2->fetch_assoc()){
                                    echo "<option value='".substr($row2['img'],0,3)."'>".$row2['nation']."</option>";    
                                }
                            }
                        echo "</select>";
                    echo "<input type='text' name='Nation' id='Nation' minlength='3' maxlength='3' required/></td>";
        ?>   
    </tr>
    <tr align="center">
        <td>League</td>
        <td><input type="text" name="League" required/></td>
    </tr>
    <tr align="center">
        <td>Time</td>
        <td><input type="text" name="Time" required/></td>
    </tr>
    <tr align="center">
        <td>Home</td>
        <td><input type="text" name="Home" required/></td>
    </tr>
    <tr align="center">
        <td>Away</td>
        <td><input type="text" name="Away" required/></td>
    </tr>
    <tr align="center">
        <td>1</td>
        <td><input type="number" step="0.01" name="Odds1" required/></td>
    </tr>
    <tr align="center">
        <td>X</td>
        <td><input type="number" step="0.01" name="OddsX" required/></td>
    </tr>
    <tr align="center">
        <td>2</td>
        <td><input type="number" step="0.01" name="Odds2" required/></td>
    </tr>
    <tr align="center">
        <td>Tip</td>
        <td><input type="text" name="Tip" required/></td>
    </tr>
    <tr align="center">
        <td>Result</td>
        <td><input type="text" name="Result"/></td>
    </tr>
    <tr align="center">
        <td>Date</td>
        <td><input type="date" name="Date" required/></td>
    </tr>
    <tr align="center">
        <td>Vip</td>
        <td><input type="number" name="Vip" min="0" max="1" value="0" required/></td>
    </tr>
    <tr align="center">
        <td>VipTip</td>
        <td><input type="text" name="VipTip"/></td>
    </tr>
     <tr align="center">
        <td>OK</td>
        <td><input type="number" name="OK" min="0" max="1" value="0" required/></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="add" value="Add"/></td>
    </tr>
</table>
</form>
<?php
if(isset($_REQUEST['add'])){
    include 'connection.php';
    //$time=date('h:i',$_REQUEST['Time']);
    $time=$_REQUEST['Time'];
    $date=$_REQUEST['Date'];
    $sql="INSERT INTO tip (Nation, League, Time, Home, Away, Odds1, OddsX, Odds2, Tip, Result, Date, Vip, VipTip, OK) VALUES "
            . "('".$_REQUEST['Nation']."', '".$_REQUEST['League']."', '".$time."', '".$_REQUEST['Home']."', '".$_REQUEST['Away']
            ."', ".$_REQUEST['Odds1'].", ".$_REQUEST['OddsX'].", ".$_REQUEST['Odds2'].", '".$_REQUEST['Tip']."', '"
            .$_REQUEST['Result']."', '".$date."', ".$_REQUEST['Vip'].", '".$_REQUEST['VipTip']."', 0)";
    $connection->query($sql);
    $connection->close();
}
?>

<script type="text/javascript">
function select(){
        document.getElementById("Nation").value = document.getElementById("nation").value;
    }    
</script>
    

