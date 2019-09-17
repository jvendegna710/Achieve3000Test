<?php
include_once("../database.php.inc");
global $db;

if (!empty($_GET['color'])){ 
    $color = $_GET['color'];     
    $sql = "SELECT SUM(VOTES) AS VTOTAL  FROM JUDGMENTS_TE_TEST3 WHERE COLOR ='{$color}'";
    $result = $db->ExecSQL($sql);    
    $vtotal= $result[0]['VTOTAL'];   
     
}else {$vtotal='ERROR: FAILED AJAX CALL';}
echo $vtotal;
?>
