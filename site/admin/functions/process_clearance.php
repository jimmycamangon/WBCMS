    <?php
    include '../../includes/conn.php';
    session_start();

                    $oauth_id = $_GET['oauth_id'];

                            $process = "UPDATE clearance SET request_status = 'Processing' WHERE oauth_id = '$oauth_id'";
                            $process_result = $conn->query($process);

                            if ($process_result === TRUE) {
                               $_SESSION['success_message'] = "Clearance Processed Successfully";
                            header("Location: ../index.php");
                            } else {
                               echo 'Error';
                            }
?>