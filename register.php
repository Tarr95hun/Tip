<h1 align="center">Register</h1>
<br/>
<table align="center" border="1">
    <tr><td>
            <table align="center" border="0">
                <form action="index.php?m=reg" method="post" name="register_form">
                    <tr>
                        <td>Username:</td>
                        <td><input name="username" type="text" minlength="5" maxlength="20" required /></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input id="p1" name="password1" type="password" minlength="6" maxlength="30" required /></td>
                    </tr>
                    <tr>
                        <td>Password Verification:</td>
                        <td><input id="p2" name="password2" type="password" minlength="6" maxlength="30" required /></td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td><input name="email" type="email" minlength="10" maxlength="100" required /></td>
                    </tr>
                    <tr>   <!--colspan 2 oszlop egybe-->
                        <td colspan="2"><p align="center"><input name="register" type="submit" value="Register" onclick="checkPasswordEquality();"/></p></td>
                    </tr>
                </form>
            </table>
        </td></tr>
</table>

<?php
function rand_salt($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_REQUEST['register'])){
    if($_REQUEST['password1']!=$_REQUEST['password2']){
        echo "<script type='text/javascript'>window.alert('The Passwords doesent match!');</script>";  
    }
    else
    {
        include 'connection.php';
        $sql = "SELECT Username From users where Username='".$_REQUEST['username']."'";
        $result = $connection->query($sql);
        if(empty($result->num_rows) === FALSE){
            echo "<script type='text/javascript'>window.alert('Username already exists!');</script>";
        }
        else {
            $sql = "SELECT Email From users where Email='".$_REQUEST['email']."'";
            $result = $connection->query($sql);
            if(empty($result->num_rows) === FALSE){
            echo "<script type='text/javascript'>window.alert('E-mail already exists!');</script>";
            } 
            else {
                $salt=rand_salt();
                $psw = crypt($_REQUEST['password1'], $salt);
                $saltLength= strlen($_REQUEST['password1']);
                $sql = "INSERT INTO users (Username, Password, Email, Salt, Length, Admin, VIP, Vote) VALUES ('".$_REQUEST['username']."', '".$psw."', '".$_REQUEST['email']."', '".$salt."', ".$saltLength.", 0, 0, 0)";               
                //echo $sql;
                $connection->query($sql);
                echo "<form name='fw' action='index.php?m=login' method='post'></form>";
                echo "<script type='text/javascript'>document.fw.submit();</script>";
            }
        }
        $connection->close();
    }
}
?>



