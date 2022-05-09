<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
     <form action="login3.php" method="post">
     	<h2>LOGIN</h2>

     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
          <div class="inputbox-content">
     	<input type="text" name="uname" placeholder="User Name">
          <label for="input">ID</label>
          <span class="underline"></span>
          </div>
     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="registration.php" class="ca">Create an account</a>
     </form>
</body>
</html>