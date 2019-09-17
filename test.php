<?php
include_once("../database.php.inc");
global $db;
$query="SELECT * FROM JUDGMENTS_TE_TEST2";
$results = $db->ExecSQL($query);
$table = '';
if($results){
    foreach($results as $r){
        $table .= "<tr><td><a href='javascript:votes(this)' class='colorlist' id='".$r['COLOR']."' onclick='votes(this)'>".$r['COLOR']."</a></td><td><div id='votes_".$r['COLOR']."' class='votestotal' ></div></td></tr>";
    }
}else{
    $table='';
}

?>
<!DOCTYPE HTML>
<HEAD>
<TITLE>TEST</TITLE>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>

function votes(colorclicked) {
    var color = colorclicked.id;
    var colorvotes = 0;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText != ''){
                colorvotes = this.responseText;
            }        
            document.getElementById('votes_'+color).innerHTML = parseInt(colorvotes);
        }
    };
    xhttp.open("GET", "test_ajax.php?color=" + color, true);
    xhttp.send();
}
                    
   
function totalvotescounted(){
    var colorvote = document.getElementsByClassName("votestotal");
    var i;
    var votecount = 0;
    for (i = 0; i < colorvote.length; i++) {
        if(colorvote[i].innerHTML != ''){
            votecount += parseInt(colorvote[i].innerHTML);
        }        
    }
    if (votecount == null){
        votecount = 0;
    }
    document.getElementById('total').innerHTML = votecount;
}
</script>
</HEAD>
<BODY>
    <div class='container'>
    <h1 style='margin-top:1rem; text-align:center;'>COLORS</h1>
        <table class='table table-striped table-bordered'>
            <tr><th>COLOR</th><th>VOTES</th></tr>
            <?php echo $table; ?>
            <tr><td><a href='javascript:totalvotescounted();'>TOTAL</a></td><td><div id='total'></div></td></tr>
        </table>
    </div>
</BODY>
</HTML>
