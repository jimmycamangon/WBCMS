<?php 
    session_start();
    include '../includes/session.php';
    include '../includes/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container" style="margin-top: 100px">
	<div class="row">
		<div class="col-md-9">
			<table class="table table-hover table-bordered">
				<tbody>
                    <tr>
                        <td>Image</td>
                        <td>   <img class="profile-picture" src="<?php echo $_SESSION['picture'];?>" style="position: relative;left: 90px;"/></td>
                    </tr>
					<tr>
						<td>ID</td>
						<td><?php echo $_SESSION['user_id'] ?></td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><?php echo $_SESSION['user_fname'] ?></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><?php echo $_SESSION['user_lname'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $_SESSION['email'] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<a href="../logout.php">Logout</a>
</body>
</html>