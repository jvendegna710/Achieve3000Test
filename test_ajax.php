<?php
if (!empty($_POST['color'])){ //this is for Quiz and Quiz Results
    $color = $_POST['color'];     
    $sql = "SELECT SUM(VOTES) AS VTOTAL  FROM VOTES WHERE COLOR = ".$_POST['color'];
    $result = $db->ExecSQL($sql,$user);    
    $returnArray = array("vtotal"=>$result[0]['VTOTAL']);
    
     
}else $returnArray=array("vtotal"=>'FAILED AJAX CALL');
// encoding array to json format
echo json_encode($returnArray);
/** */
?>