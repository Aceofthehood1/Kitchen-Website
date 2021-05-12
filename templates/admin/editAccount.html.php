<?php
require 'adminNav.html.php';
?>
<h2 style="text-align:center; margin-top: 10px">Create Admin Account</h2>
	<form action="" method="post" style="padding: 40px">
            <h1 style="color:red;" ><?=$error['message'] ?? NULL ?></h1>
			<label>Enter name</label>
			<input type="text" name="admin[name]" value="<?=$admin->name ?? NULL ?>"/>
            <label>Enter username</label>
			<input type="text" name="admin[username]" value="<?=$admin->username ?? NULL ?>"/>
			<label>Enter password</label>
			<input type="password" name="admin[password]"/>
			<!-- Doesnt show password value when editing password so the user can just reneter it.-->
			<input style="margin-bottom: 12px;" type="submit" name="submit" value="Add account" />
	</form>
