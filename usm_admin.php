<?php
include 'connection.php';

$sql="UPDATE users SET Admin=1 WHERE ID=".$_REQUEST['id'];
$connection->query($sql);

$connection->close();

echo "<form action='index.php?m=admin&am=user' method='post' name='fw'></form>";

?>
<script type="text/javascript">
    document.fw.submit();
</script>

