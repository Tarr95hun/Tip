<?php
session_start();
echo "<link rel='stylesheet' href='style.css'>" ;
echo "<table align='right' width='19%'>";
    echo "<tr>";
        if(isset($_SESSION['username'])){
            echo "<td style='color: #00cc33; background-color: #333333;'>".$_SESSION['username']."</td>";
        }
        if((!isset($_SESSION['username'])) || ((isset($_SESSION['username'])) && ($_SESSION['username']==""))){
            echo "<td><a href='index.php?m=reg'>Register</a></td>";
            echo "<td><a href='index.php?m=login'>Login</a></td>";
        }
        else {
            include 'connection.php';
            $sql= "SELECT Admin FROM users WHERE Username='".$_SESSION['username']."'";
            $result=$connection->query($sql);
            if($result->num_rows > 0) {
                $row=$result->fetch_assoc();
                if($row['Admin'] == 1) {
                    echo "<td><a href='index.php?m=admin'>Admin</a></td>";
                }
            }
            echo "<td><a href='index.php?m=logout'>Logout</a></td>";
        }
    echo "</tr>";
 echo "</table>";
 echo "</br>";
 echo "</br>"; 
 echo "</br>"; 
 
//echo "<h1 align='left' fontsize='18'>Tipster</h1>";
//echo "<br/>";
/*
echo "<table width=100%>";
    echo "<tr>";
                echo "<td><a href='index.php?m=home'>Home</a></td>";
                echo "<td><a href='index.php?m=tip'>Tip</a></td>";
        if((isset($_SESSION['username']))&&($_SESSION['username']!="")) {
            echo "<td><a href='index.php?m=vote'>Daily Vote</a></td>";
            echo "<td><a href='index.php?m=vip'>VIP</a></td>";
        }
        else {
            echo "<td style='text-align: center;'>Daily Vote</td>";
            echo "<td style='text-align: center;'>VIP</td>";    
        }
    echo "</tr>";
echo "</table>";
*/ 
 
  $date = date('Y-m-d', time());
  $day1  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
  $day2  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));
  $day_1  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
  $day_2  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
  $day_3  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-3, date("Y")));
 
 echo "<ul>";
  echo "<li><a href='index.php?m=home'>Home</a></li>";
   echo "<li class='dropdown'>";
    echo "<a href='index.php?m=tip&date=0' class='dropbtn'>Tip</a>";
    echo "<div class='dropdown-content'>";
      echo "<a href='index.php?m=tip&date=2'>".$day2."</a>";
      echo "<a href='index.php?m=tip&date=1'>".$day1."</a>";
      echo "<a href='index.php?m=tip&date=0'>Today</a>";
      echo "<a href='index.php?m=tip&date=-1'>".$day_1."</a>";
      echo "<a href='index.php?m=tip&date=-2'>".$day_2."</a>";
      echo "<a href='index.php?m=tip&date=-3'>".$day_3."</a>";
      echo "<a href='index.php?m=tip&date=stat'>Statics</a>";
    echo "</div>";
    if((isset($_SESSION['username']))&&($_SESSION['username']!="")) {
            echo "<li><a href='index.php?m=vote'>Vote</a></li>";
            echo "<li><a href='index.php?m=vip'>VIP</a></li>";
        }
        else {
            echo "<li style='display: inline-block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;'>Daily Vote</li>";
            echo "<li style='display: inline-block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;'>VIP</li>";    
        }
  echo "</li>";
echo "</ul>";

if(isset($_REQUEST['m'])) {  //request---> post/get
    switch ($_REQUEST['m']) {
        case "reg": include "register.php"; break;
        case "login": include "login.php"; break;
        case "logout": include "logout.php"; break;
        case "admin": include "admin.php"; break;
        case "home": include "home.php"; break;
        case "tip": include "tip.php"; break;
        case "vote": include "vote.php"; break;
        case "vip": include "vip.php"; break;
        
    }
}


?>