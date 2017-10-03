<?php
if (isset($_REQUEST['id'])) {
    $del = $_REQUEST['id'];
    include 'connection.php';

    $sql = "DELETE FROM tip WHERE ID='".$del."'";
    $connection->query($sql);
    $connection->close();
    
    echo "<form action='index.php?m=admin&am=del&date=".$_REQUEST['date']."' name='fw' method='post'></form>";
    echo "<script type='text/javascript'>document.fw.submit();</script>";
}

