<?php
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    include 'connection.php';

    $sql = "UPDATE tip SET OK=1 WHERE ID='".$id."'";
    $connection->query($sql);
    $connection->close();
    
    echo "<form action='index.php?m=admin&am=del&date=".$_REQUEST['date']."' name='fw' method='post'></form>";
    echo "<script type='text/javascript'>document.fw.submit();</script>";
}
?>

