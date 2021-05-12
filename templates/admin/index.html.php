<h2>Log in</h2>
	<form action="" method="post" style="padding: 40px">
			<label>Enter username</label>
			<input type="text" name="admin[username]" />
			<label style="color:red;"><?= $error['username'] ?? NULL?> </label>
			<label>Enter Password</label>
			<input type="password" name="admin[password]" />
			<label style="color:red;"><?= $error['password'] ?? NULL?> </label>
			<input type="submit" name="submit" value="Log In" />
	</form>