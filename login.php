<?php
echo "<h1 align='center'>Login</h1>";
echo "<br/>";
echo "<table align='center' border='1'>";
	echo "<tr><td>";
		echo "<table align='center' border='0'>";
                    echo "<form action='index.php?m=login' method='post' name='login_form'>";
			echo "<tr>";
				echo "<td>Username:</td>";
				echo "<td><input name='username' type='text' minlength='5' maxlength='20' required/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Password:</td>";
				echo "<td><input name='password' type='password' minlength='6' maxlength='30' required/></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td colspan='2'><p align='center'><input name='login' type='submit' value='Login' /></p></td>";
			echo "</tr>";
			echo "</form>";
		echo "</table>";
	echo "</td></tr>";
echo "</table>";

if (isset($_REQUEST['login'])) {
    include 'connection.php';
    $sql = "Select Username from users where Username='" . $_REQUEST['username'] . "'";
    $result = $connection->query($sql);
    if (empty($result->num_rows) === FALSE) {
        $sql = "SELECT * FROM users WHERE Username='" . $_REQUEST['username'] . "'";
        $result=$connection->query($sql);
        $row=$result->fetch_assoc(); //osszevonja a megoldasokat, melyik hova tartozik, mostmar tomb
        $psw = crypt($_REQUEST['password'] , $row['Salt']);
        //var_dump($row,$psw,strlen($_REQUEST['password']));
        if (($psw == $row['Password']) && (strlen($_REQUEST['password']) == $row['Length'])) {
            $_SESSION['username'] = $_REQUEST['username'];
            echo "<form action='index.php?m=home' method='post' name='fw'></form>";
            echo "<script type='text/javascript'>document.fw.submit();</script>";
        }
        else {
            echo "<script type='text/javascript'>window.alert('Wrong Password');</script>";
        }   
    }
    else {
        echo "<script type='text/javascript'>window.alert('Username doesent exist!');</script>";
    }
}
?>

