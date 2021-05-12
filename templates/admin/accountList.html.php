<?php
require 'adminNav.html.php';
?>
<h2>Admin Accounts</h2>
    <a class="new" href="/admin/editAccount">Add a new Admin Account</a>
	<table>
		<thead>
		<tr>
		<th>Name</th>
		<th style="width: 5%">&nbsp;</th>
		<th style="width: 5%">&nbsp;</th>
		</tr>
<?php 
	foreach ($admin as $user) { 
?>
	    <tr>
		<td><?=$user->name?></td>
		<td><form method="post" action="/admin/deleteAccount">
		<input type="hidden" name="id" value="<?=$user->id?>" />
		<input type="submit" name="submit" value="Delete" />
		</form></td>
		</tr>
<?php
	}
?>
	    </thead>
	</table>