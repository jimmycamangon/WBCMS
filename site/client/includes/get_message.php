                  



<!-- Get Notification Message -->
<?php

session_start();
include '../../includes/conn.php';
$id = $_SESSION['user_id'];
$select_notif = "SELECT * FROM notifications WHERE oauth_id = '$id' ORDER BY id";
$select_notif_result = mysqli_query($conn, $select_notif);

if ($select_notif_result -> num_rows > 0) {
   while ($notif_row = $select_notif_result->fetch_assoc()) {

     ?>
     <a href="#"><button type="button" value="logout" tabindex="0" class="dropdown-item-notif">
      <br>
      <div class="notif_head">
         <img class="card__thumb" src="../assets/img/SVG/admin-icon.png" alt="" style="width: 30px!important;height: 30px!important;"> Admin -
          <!-- Time Ago Function -->
         <?php 
         if(function_exists("TimeAgo")){
               } else {   //Creating Function
                  function TimeAgo ($oldTime, $newTime) {
                     $timeCalc = strtotime($newTime) - strtotime($oldTime);
                     if ($timeCalc >= (60*60*24*30*12*2)){
                           $timeCalc = intval($timeCalc/60/60/24/30/12) . " years ago";
                         }else if ($timeCalc >= (60*60*24*30*12)){
                           $timeCalc = intval($timeCalc/60/60/24/30/12) . " year ago";
                         }else if ($timeCalc >= (60*60*24*30*2)){
                           $timeCalc = intval($timeCalc/60/60/24/30) . " months ago";
                         }else if ($timeCalc >= (60*60*24*30)){
                           $timeCalc = intval($timeCalc/60/60/24/30) . " month ago";
                         }else if ($timeCalc >= (60*60*24*2)){
                           $timeCalc = intval($timeCalc/60/60/24) . " days ago";
                         }else if ($timeCalc >= (60*60*24)){
                           $timeCalc = " Yesterday";
                         }else if ($timeCalc >= (60*60*2)){
                           $timeCalc = intval($timeCalc/60/60) . " hours ago";
                         }else if ($timeCalc >= (60*60)){
                           $timeCalc = intval($timeCalc/60/60) . " hour ago";
                         }else if ($timeCalc >= 60*2){
                           $timeCalc = intval($timeCalc/60) . " minutes ago";
                         }else if ($timeCalc >= 60){
                           $timeCalc = intval($timeCalc/60) . " minute ago";
                         }else if ($timeCalc > 0){
                           $timeCalc .= " seconds ago";
                         }
                           return $timeCalc;
                         }
                       }
                       $date = $notif_row['created_at'];

                       echo '<p style="font-weight: 100!important">'. TimeAgo($date, date("Y-m-d H:i:s")). '</p>';
                       ?> 
      </div> 
      <?php echo $notif_row['subject'];?><br><br>
      <p style="font-weight: 100!important"><?php echo $notif_row['description'];?></p>
                                    
   </button></a>
<?php }
} else {
      echo "<div style='display:flex;justify-content:center;align-items:center;background-color:#fff;height:100px;'><p>No Notification Yet</p></div>";
         }?>
</div>