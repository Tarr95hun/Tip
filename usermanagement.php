<?php
echo "<table align='center' border='1' width='50%' ";     
    echo "<tr>";
        echo "<td align='center'>ID</td>";                        
        echo "<td align='center'>Username</td>";
        echo "<td align='center'>Email</td>";
        echo "<td align='center'>Admin</td>";
        echo "<td align='center'>VIP</td>";
        echo "<td align='center'>Vote</td>";
        echo "<td colspan='4' align='center'>Manage</td>"; 
    echo "</tr>";
    
    include 'connection.php';
    $sql = "SELECT * FROM users ORDER BY ID";
    $result = $connection->query($sql);
    if($result->num_rows > 0) {
        while($row=$result->fetch_assoc()) {
            echo "<tr>";
                echo "<td align='center'>".$row['ID']."</td>";                        
                echo "<td align='center'>".$row['Username']."</td>";
                echo "<td align='center'>".$row['Email']."</td>";
                echo "<td align='center'>".$row['Admin']."</td>";
                echo "<td align='center'>".$row['VIP']."</td>";
                echo "<td align='center'>".$row['Vote']."</td>";
                echo "<td align='center'><a href='index.php?m=admin&am=user&ch=admin&id=".$row['ID']."'><img src='img/confirm.png' class='imgus'  /></a></td>";
                echo "<td align='center'><a href='index.php?m=admin&am=user&ch=vipup&id=".$row['ID']."'><img src='img/up.png' class='imgus'  /></a></td>";
                echo "<td align='center'><a href='index.php?m=admin&am=user&ch=vipdown&id=".$row['ID']."'><img src='img/down.png' class='imgus'  /></a></td>";
                echo "<td align='center'><a href='index.php?m=admin&am=user&ch=delete&id=".$row['ID']."' onClick='return conf();'><img src='img/delete.png' class='imgus'  /></a></td>";
            echo "</tr>";
        }
    }
    $connection->close();
echo "</table>";

if(isset($_REQUEST['ch'])) {
    switch ($_REQUEST['ch']) {
        case "admin": include "usm_admin.php"; break;
        case "vipup": include "usm_vipup.php"; break;
        case "vipdown": include "usm_vipdown.php"; break;
        case "delete": include "usm_delete.php"; break;
    }
}

?>
<script type="text/javascript">
    function conf() {
        return confirm("Are u sure?");
    }
    
</script>

