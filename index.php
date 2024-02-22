<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="login">
		<h1>Login</h1>
    <form action="login.php" method="post" class="row g-3 needs-validation" novalidate>
			<label for="username">
				<i class="fas fa-user"></i>
			</label>
      <input type="text" name="username" class="form-control" id="username" required>
			<label for="password">
				<i class="fas fa-lock"></i>
			</label>
      <input type="password" name="password" class="form-control" id="password" required>
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
</body>
</html>