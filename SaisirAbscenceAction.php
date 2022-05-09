<?php // Fonction PHP QUI retourne tous les dates a partir d'une semaine donnée.....
function get_lundi_vendredi_from_week($week,$year,$format="d/m/Y") {
    $firstDayInYear=date("N",mktime(0,0,0,1,1,$year));
    if ($firstDayInYear<5)
    $shift=-($firstDayInYear-1)*86400;
    else
    $shift=(8-$firstDayInYear)*86400;
    if ($week>1) $weekInSeconds=($week-1)*604800; else $weekInSeconds=0;
    $timestamp=mktime(0,0,0,1,1,$year)+$weekInSeconds+$shift;
    $timestampT=mktime(0,0,0,1,2,$year)+$weekInSeconds+$shift;
    $timestampW=mktime(0,0,0,1,3,$year)+$weekInSeconds+$shift;
    $timestampTH=mktime(0,0,0,1,4,$year)+$weekInSeconds+$shift;
    $timestamp_vendredi=mktime(0,0,0,1,5,$year)+$weekInSeconds+$shift;
    $timestampS=mktime(0,0,0,1,6,$year)+$weekInSeconds+$shift;
    $timestampSU=mktime(0,0,0,1,7,$year)+$weekInSeconds+$shift;
    return array(date($format,$timestamp),date($format,$timestampT),date($format,$timestampW),date($format,$timestampTH),date($format,$timestamp_vendredi),date($format,$timestampS),date($format,$timestampSU));
    }
    // Sélectionner les etudiants d'un grouve bien précis !......
require('connexion.php');
    $getAlletudiants = $pdo->query('SELECT * FROM etudiant ORDER BY cin DESC');
    $numberOfEtud="";
    if(isset($_POST['groupe'])){
    
        $eetudiant = $_POST['groupe'];
        $getAlletudiants = $pdo->query('SELECT * FROM  etudiant  WHERE (classe  LIKE "%'.$eetudiant.'%")  ORDER BY cin DESC ' );
        $getAlletudiantss = $pdo->query('SELECT * FROM  etudiant  WHERE (classe  LIKE "%'.$eetudiant.'%")  ORDER BY cin DESC ' );
        $numberOfEtud=count($getAlletudiantss->fetchall());
        $tab = array('INFO3-A', 'INFO3-B','INFO2-A','INFO2-B', 'INFO2-C','INFO2-D','INFO2-E','INFO1-A','INFO1-E','INFO1-B','INFO1-C','INFO1-D');
    };
    // Sélectionner les date  d'une semaine bien précise a partir du input type WEEK !......
    $sem="2022W-20";
    if(isset($_POST['semaine'])){
      $sem=$_POST['semaine'];  
    }
    $y0="$sem[0]" ;
    $y1="$sem[1]" ;
    $y2="$sem[2]" ;
    $y3="$sem[3]" ;
    $d1="$sem[6]" ;
    $d2="$sem[7]" ;
    $y=intval("$y0$y1$y2$y3");
    $d=intval("$d1$d2");
?>