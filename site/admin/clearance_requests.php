 <link rel="stylesheet" type="text/css" href="css/requests_card_design.css">

 <?php 
                include '../includes/conn.php';
                function make_query($conn)
                {
                $query = "SELECT clearance.oauth_id, clearance.sur_name, clearance.first_name, clearance.middle_name, clearance.middle_name, clearance.full_address, clearance.precint_number, clearance.purpose, clearance.request_status, clearance.created_at, requests.name, requests.type, requests.description FROM clearance INNER JOIN requests ON clearance.oauth_id = requests.oauth_id WHERE clearance.oauth_id = requests.oauth_id ORDER BY requests.id ASC";
                $result = mysqli_query($conn, $query);
                return $result;
                }



                function make_slides($conn)
                {
                $output = '';
                $count = 0;
                $result = make_query($conn);
                while($row = mysqli_fetch_array($result))
                {
                $output .= '
                <a href="clearance_view.php?oauth_id='.$row['oauth_id'].'" style="text-decoration:none;">
                <div class="update_page_card">
                    <div class="card__quote">
                         <h5>Status: '.$row["request_status"].'</h5>
                        <div class="card__foot">
                            '.$row["name"].'
                        </div>
                    </div>
                </div>
                </a>
               ';
               $count = $count + 1;

              }
              return $output;
                }
                ?>
                 <?php echo make_slides($conn); ?>


