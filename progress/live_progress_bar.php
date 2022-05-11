<?php
session_start();

ini_set('max_execution_time', 0); // to fetch unlimited simple php script run execution time

if(empty($_SESSION['i'])){
    $_SESSION['i'] = 0;
}

$total = 100;
for($i=$_SESSION['i'];$i<$total;$i++)
{
    $_SESSION['i'] = $i;
    $total_percentage = intval($i/$total * 100)."%";   
	
    sleep(1); // Here simple jquery ajax call your time taking methods like sending data bulk products etc.

    echo '<script>
    parent.document.getElementById("live_progress_bar").innerHTML="<div style=\"width:'.$total_percentage.';background:linear-gradient(to bottom, rgba(125,126,125,1) 0%,rgba(14,14,14,1) 100%); ;height:35px;\"> </div>";
    parent.document.getElementById("preview_details").innerHTML="<div style=\"text-align:center; font-weight:bold\">'.$total_percentage.' is processed.</div>";</script>';

    ob_flush(); 
    flush(); 
}
echo '<script>parent.document.getElementById("preview_details").innerHTML="<div style=\"text-align:center; font-weight:bold\">Good Luck : Process completed</div>"</script>';

session_destroy(); 