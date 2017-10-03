<?php
echo "<table align='center' width='19%'>";
    echo "<tr>";
            echo "<td><a href='index.php?m=admin&am=user'>User Managment</a></td>";
            echo "<td><a href='index.php?m=admin&am=add'>Insert</a></td>";
            echo "<td><a href='index.php?m=admin&am=del'>Delete</a></td>";
            echo "<td><a href='index.php?m=admin&am=change'>Change</a></td>";
    echo "</tr>";
 echo "</table>";
 echo "</br>";
 
 if(isset($_REQUEST['am'])) {  //request---> post/get
    switch ($_REQUEST['am']) {
        case "user": include "usermanagement.php"; break;
        case "add": include "add.php"; break;
        case "del": include "delete.php"; break;
        case "change": include "change.php"; break;
        case "rowDelete": include "rowDelete.php"; break;
        case "rowOK": include "rowOK.php"; break;
    }
}
?>

