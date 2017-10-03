<?php
//#TODO refactor substr(.., .., length)
function checkResult($tip, $result) {
    $pos = strpos($result, "(");
    $pos2 = strpos($result, ")")-1;
    $fulltime = substr($result, 0, $pos);
    $halftime = substr($result, $pos+1, $pos2);
    $halftime2 = substr($halftime, 0, strlen($halftime)-1);
    
    /* 1 x 2 
     * 1x 12 x2 
     * 1/1 1/2 1/x 
     * x/1 x/x x/2 
     * 2/1 2/x 2/2 
     * GG TG3- TG3+ 
     * CS
     * 
     */
    
    $home = substr($fulltime, 0, strpos($fulltime, "-"));
    $away = substr($fulltime, strpos($fulltime, "-")+1, strlen($fulltime)-1 );
    $halftimehome = substr($halftime2, 0, strpos($halftime2, "-"));
    $halftimeaway = substr($halftime2, strpos($halftime2, "-")+1, strlen($halftime2)-1 );
    
    switch($tip) {
        case '1': if($home>$away) { return TRUE; } break;
        case 'X': if($home==$away) { return TRUE; } break;
        case '2': if($home<$away) { return TRUE; } break;
        case '1X': if($home>=$away) { return TRUE; } break;
        case '12': if($home!=$away) { return TRUE; } break;
        case 'X2': if($home<=$away) { return TRUE; } break;
        case '1/1': if($home>$away&&$halftimehome>$halftimeaway) { return TRUE; } break;
        case '1/2': if($home<$away&&$halftimehome>$halftimeaway) { return TRUE; } break;
        case '1/X': if($home==$away&&$halftimehome>$halftimeaway) { return TRUE; } break;
        case 'X/1': if($home>$away&&$halftimehome==$halftimeaway) { return TRUE; } break;
        case 'X/X': if($home==$away&&$halftimehome==$halftimeaway) { return TRUE; } break;
        case 'X/2': if($home<$away&&$halftimehome==$halftimeaway) { return TRUE; } break;
        case '2/1': if($home>$away&&$halftimehome<$halftimeaway) { return TRUE; } break;
        case '2/X': if($home==$away&&$halftimehome<$halftimeaway) { return TRUE; } break;
        case '2/2': if($home<$away&&$halftimehome<$halftimeaway) { return TRUE; } break;
        case 'GG': if($home>1&&$away>1) { return TRUE; } break;
    }
    if(substr($tip, 0, 2)== "TG") {
            $goal = substr($tip, 2, 1);
            $sign = substr($tip, 3, 1);
            if($sign=="+") {
                if($goal > $home+$away) { /// 3+ (4-20) 3- (0-2)
                    return TRUE;
                }
            }
            else {
                if($goal < $home+$away) {
                    return TRUE;
                }
            }
    }
    
     if(substr($tip, 0, 2)== "CS") {
         $resultmatch = substr($tip,2,5); //cs1:2
         $resulthome = substr($resultmatch,0,1);
         $resultaway = substr($resultmatch,2,1);
         if($resulthome>$resultaway) return TRUE;
     }
    return FALSE;
} 

function checkVip($date){
    include 'connection.php';
    $sql="SELECT Vip FROM tip WHERE Date='".$date."'";
    $result=$connection->query($sql);
    $is=0;
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            if($row['Vip'] == 1){
                $is=1;
            }
        }
    }
    $connection->close();
    return $is;
}

function countResult($date) {
    include 'connection.php';
    $sql="SELECT COUNT(*) AS count FROM tip WHERE Date='".$date."'";
    $result=$connection->query($sql);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        $connection->close();
        return $row['count'];
    }
    $connection->close();
    return -1; //errpr
}

function isFinishedMatches($date) {
    include 'connection.php';
    $sql="SELECT Result FROM tip WHERE Date='".$date."'";
    $result=$connection->query($sql);
    $is=0;
    $count=0;
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            if($row['Result'] != ""){
                $count++; 
            }
        }
    }
    $connection->close();
    if($count == countResult($date)) {
        $is=1;
    }
    return $is;    
}

function checkUserStatus($uName) {
    include 'connection.php';
    $sql="SELECT VIP FROM users WHERE Username='".$uName."'";
    $result=$connection->query($sql);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        $connection->close();
        return $row['VIP']; 
    }
    $connection->close();
    return -1;    
}    


echo "</br>";

echo "<table align='center' border='1' width=100%>";//

echo "<td colspan='3' align='center' width='15%' height='10px' style='font-size: 50; background-color: #00cc33;'></td>";//
echo "<tr>";//
echo "<td align='center' width='15%'><img src='img/Zidane.jpg' width='134%'/></td>";//

echo "<td>";//
echo "<table align='center' border='1' width='100%' ";     
    echo "<tr>";
        echo "<td rowspan='2' align='center'>NAT</td>";                        
        echo "<td rowspan='2' align='center'>League</td>";
        echo "<td rowspan='2' align='center'>Time</td>";
        echo "<td rowspan='2' align='center'>Match</td>";
        echo "<td colspan='3' align='center'>ODDS</td>";
        echo "<td rowspan='2' align='center'>TIP</td>";
        echo "<td rowspan='2' align='center'>Result</td>";
        $date = date('Y-m-d', time());
        $stat = 0;
        switch($_REQUEST['date']){
            case "2": $selectedDate  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")+2, date("Y"))); break;
            case "1": $selectedDate  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"))); break;
            case "0": $selectedDate  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")+0, date("Y"))); break;
            case "-1": $selectedDate  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"))); break;
            case "-2": $selectedDate  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-2, date("Y"))); break;
            case "-3": $selectedDate  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-3, date("Y"))); break;
            case "stat": $stat=1; include 'stat.php'; break;
        }
        if(checkVip($selectedDate)==1) {
            if(checkUserStatus($_SESSION['username']) == 1){
                echo "<td rowspan='2' align='center'>VIP</td>";
            }
            else {
                if(isFinishedMatches($selectedDate) == 1){
                    echo "<td rowspan='2' align='center'>VIP</td>";
                }
            }
        }
        
    echo "</tr>";
    echo "<tr align='center'>";
        echo "<td>1</td>";
        echo "<td>X</td>";
        echo "<td>2</td>";
    echo "</tr>"; 
    
    
    
    if($stat == 0){
        include 'connection.php';
        $sql="SELECT * FROM tip WHERE Date='".$selectedDate."' ORDER BY Nation, League, Time, Home";
        $result=$connection->query($sql);
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                echo "<tr align='center'>"; 				
                    echo "<td><img src='nation/".$row['Nation'].".png' title='".$row['Nation']."'/></td>";
                    echo "<td>".$row['League']."</td>";
                    $cleantime=substr($row['Time'],0,5);
                    echo "<td>".$cleantime."</td>";
                    echo "<td>".$row['Home']."-".$row['Away']."</td>";
                    echo "<td>".$row['Odds1']."</td>";
                    echo "<td>".$row['OddsX']."</td>";
                    echo "<td>".$row['Odds2']."</td>";

                    $resultOK=checkResult($row['Tip'], $row['Result']);
                    $vipTipOK= checkResult($row['VipTip'], $row['Result']);
                    if($row['Result'] == "") {
                        echo "<td>".$row['Tip']."</td>"; //style='color:yellow'
                        
                    }
                    else if($resultOK == 0) {
                        echo "<td style='background-color: red;'>".$row['Tip']."</td>";
                    } 
                    else {
                        echo "<td style='background-color: green;'>".$row['Tip']."</td>";     
                    }
                    
                    if($row['Result'] == "") {
                        echo "<td>-</td>"; 
                        
                    }
                    else {
                        if(checkUserStatus($_SESSION['username']) == 1) {
                            if($resultOK == 1 && $vipTipOK == 1){
                                echo "<td style='background-color: green;'>".$row['Result']."</td>";
                            }
                            else if($resultOK == 0 && $row['VipTip'] != "" && $vipTipOK ==0){
                                echo "<td style='background-color: red;'>".$row['Result']."</td>";  
                            }
                            else {
                                echo "<td>".$row['Result']."</td>";
                            }
                        }
                        else {
                            echo "<td>".$row['Result']."</td>";
                        }
                    }
                    
                    if(checkVip($selectedDate)==1){
                        if(checkUserStatus($_SESSION['username']) == 1) {
                            if($row['VipTip'] != "" ) {
                                if($row['Result'] != "") {
                                    if($vipTipOK==1){
                                        echo "<td style='background-color: green;'>".$row['VipTip']."</td>";
                                    }
                                    else {
                                        echo "<td style='background-color: red;'>".$row['VipTip']."</td>";
                                    }
                                }
                                else {
                                    echo "<td>".$row['VipTip']."</td>";
                                }
                            }
                            else {
                                echo "<td>-</td>"; 
                            }
                        }
                        else {
                            if(isFinishedMatches($selectedDate) == 1) {
                                if($row['VipTip'] != "") {
                                    if($vipTipOK==1){
                                        echo "<td style='background-color: green;'>".$row['VipTip']."</td>";
                                    }
                                    else {
                                        echo "<td style='background-color: red;'>".$row['VipTip']."</td>";
                                    }
                                }
                                else {
                                    echo "<td>-</td>";
                                }
                            }
                        }
                    }
                    
                    
                echo "</tr>"; 
            }
            
        }
        $connection->close();
    }
echo "</table>";
echo "</td>";//

echo "<td align='center' width='15%'><img src='img/Ronaldinho.jpg' width='115%'/></td>";//
echo "</tr>";//
echo "<td colspan='3' align='center' width='15%' height='10px' style='font-size: 50; background-color: #00cc33;'></td>";
echo "</table>";//
?>

