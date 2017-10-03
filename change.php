<?php

echo "<form align='center' action='index.php?m=admin&am=change' method='post' name='selection'>";
    echo "<select id='date' name='date' onchange='get(this.value)'>";
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
    echo "<select id='match' name='match'>";
        echo "<option value=''></option>";
    echo "</select>";
    echo "<input type='submit' name='select' value='select'>";
echo "</form>";

if(isset($_REQUEST['select'])) {
    $position = strpos($_REQUEST['match'], '-');
    $home = substr($_REQUEST['match'], '0', $position);
    $away = substr($_REQUEST['match'], $position+1, strlen($_REQUEST['match']));
    $sql="SELECT * FROM tip WHERE Home='".$home."' AND Away='".$away."'";
    $result=$connection->query($sql);
    if($result->num_rows > 0) {
        $row=$result->fetch_assoc();
        echo "<form action='index.php?m=admin&am=change&id=".$row['ID']."' method='post' name='changeData'>";
            echo "<table align='center' border='1' width='50%'>"; 
                echo "<tr align='center'>";
                    echo "<td>Nation</td>";
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
                    echo "<input type='text' name='Nation' id='Nation' minlength='3' maxlength='3' value='".$row['Nation']."' required/></td>";
                echo "</tr>";
                echo "<tr align='center'>";
                    echo "<td>League</td>";
                    echo "<td><input type='text' name='League' value='".$row['League']."' required/></td>";
                echo "</tr>";
                echo "<tr align='center'>";
                    echo "<td>Time</td>";
        echo "<td><input type='text' name='Time' value='".$row['Time']."' required/></td>";
    echo "</tr>";
    echo "<tr align='center'>";
        echo "<td>Home</td>";
        echo "<td><input type='text' name='Home' value='".$row['Home']."' required/></td>";
    echo "</tr>";
    echo "<tr align='center'>";
        echo "<td>Away</td>";
        echo "<td><input type='text' name='Away' value='".$row['Away']."' required/></td>";
    echo "</tr>";
    echo "<tr align='center'>";
        echo "<td>1</td>";
        echo "<td><input type='number' step='0.01' name='Odds1' value='".$row['Odds1']."' required/></td>";
    echo "</tr>";
    echo "<tr align='center'>";
        echo "<td>X</td>";
        echo "<td><input type='number' step='0.01' name='OddsX' value='".$row['OddsX']."' required/></td>";
    echo "</tr>";
    echo "<tr align='center'>";
        echo "<td>2</td>";
        echo "<td><input type='number' step='0.01' name='Odds2' value='".$row['Odds2']."' required/></td>";
    echo "</tr>";
    echo "<tr align='center'>";
        echo "<td>Tip</td>";
        echo "<td><input type='text' name='Tip' value='".$row['Tip']."' required/></td>";
    echo "</tr>";
    echo "<tr align='center'>";
        echo "<td>Result</td>";
        echo "<td><input type='text' name='Result' value='".$row['Result']."'/></td>";
    echo "</tr>";
    echo "<tr align='center'>";
        echo "<td>Date</td>";
        echo "<td><input type='date' name='Date' value='".$row['Date']."' required/></td>";
    echo "</tr>";
    echo "<tr align='center'>";
       echo "<td>Vip</td>";
        echo "<td><input type='number' name='Vip' min='0' max='1' value='".$row['Vip']."' required/></td>";
    echo "</tr>";
    echo "<tr align='center'>";
        echo "<td>VipTip</td>";
        echo "<td><input type='text' name='VipTip' value='".$row['VipTip']."'/></td>";
    echo "</tr>";
    echo "<tr align='center'>";
        echo "<td>OK</td>";
        echo "<td><input type='number' name='OK' min='0' max='1' value='".$row['OK']."'/></td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td colspan='2' align='center'><input type='submit' name='change' value='Change'/></td>";
    echo "</tr>";
echo "</table>";
        echo "</form>";
    }
}
if(isset($_REQUEST['id'])) {
    $sql = "UPDATE tip SET Nation='".$_REQUEST['Nation']."', League='".$_REQUEST['League']."', Time='".$_REQUEST['Time']."', Home='".$_REQUEST['Home']."',"
            . " Away='".$_REQUEST['Away']."', Odds1=".$_REQUEST['Odds1'].", Odds1=".$_REQUEST['Odds1'].", Odds2=".$_REQUEST['Odds2'].","
            . " Tip='".$_REQUEST['Tip']."', Result='".$_REQUEST['Result']."', Date='".$_REQUEST['Date']."', Vip=".$_REQUEST['Vip'].","
            . " VipTip='".$_REQUEST['VipTip']."', OK=".$_REQUEST['OK']." WHERE ID=".$_REQUEST['id'];
    $connection->query($sql);
}

 ?>
<script type="text/javascript">
    function get(date) {

        var data = new XMLHttpRequest();
        data.open("POST", "makeDate.php");

        data.onreadystatechange = function () {
            if (data.readyState === 4 && data.status === 200) { //200 as kod az ok!
                document.getElementById('match').innerHTML = data.responseText;

            }
        }
        //if (date != "") {
            data.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            data.send('date=' + date);
        /*} else {
            data.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            data.send('date=*');
        }*/
    }
    function select(){
        document.getElementById("Nation").value = document.getElementById("nation").value;
    }
</script>

