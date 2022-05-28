                  



<!-- Get Notification Message -->
<?php

session_start();
include '../../includes/conn.php';
$select_notif = "SELECT * FROM requests";
$select_notif_result = mysqli_query($conn, $select_notif);

if ($select_notif_result -> num_rows > 0) {
   while ($notif_row = $select_notif_result->fetch_assoc()) {
    $id = $notif_row['id'];

     ?>
    <button type="button" value="logout" tabindex="0" class="dropdown-item-notif">
      <br>
      <div class="notif_head">
         <?php echo $notif_row['name'];?> 
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

                       echo '<p style="font-weight: 100!important; padding-top:1em;">'. TimeAgo($date, date("Y-m-d H:i:s")). '</p>';
                       ?> 
      </div> 
      <?php echo $notif_row['type'];?><br><br>
      <p style="font-weight: 100!important"><?php echo $notif_row['description'];?></p>
                                    
   </button>
<?php }
} else {
      echo "<div style='display:flex;justify-content:center;align-items:center;background-color:#fff;color:#000;height:100px;'><p>No Notification Yet</p></div>";
         }?>
</div>