
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
#notification_count
{
padding: 0px 3px 1px 5px;
background: #cc0000;
color: #ffffff;
font-weight: bold;
margin-left: 77px;
border-radius: 9px;

position: absolute;
font-size: 15px;
z-index: 1;
}
</style>
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
 
function addmsg(type, msg){
 
$('#notification_count').html(msg);
 
}
 
 function cutmsg(type, msg1){
 
$('#notification_count').html(msg1);
 
}


 function removeNotification(){
$.ajax({
type: "GET",
url: "remove.php",
 
async: true,
cache: false,
timeout:50000,
 
success: function(data){
cutmsg("new", data);
setTimeout(
waitForMsg,
1000
);
}
});
 }


function waitForMsg(){
 
$.ajax({
type: "GET",
url: "select.php",
 
async: true,
cache: false,
timeout:50000,
 
success: function(data){
addmsg("new", data);
setTimeout(
waitForMsg,
1000
);
},
error: function(XMLHttpRequest, textStatus, errorThrown){
addmsg("error", textStatus + " (" + errorThrown + ")");
setTimeout(
waitForMsg,
15000);
}
});
};
 
$(document).ready(function(){
 
waitForMsg();
 
});
 
</script>
</head>
<body>
<span id="notification_count"></span>
<a href="#" id="notificationLink" onclick = "removeNotification()"><i class="fa fa-bell" aria-hidden="true" style="position: relative;left: 60px;font-size: 30px;"></i></a>

</body>
</html>