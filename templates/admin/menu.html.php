<?php
require 'adminNav.html.php';
?>
<h2>Menu</h2>
	<a class="new" href="/admin/editDish">Add new dish</a>
		<table>
		<thead>
		<tr>
		<th>Title</th>
		<th style="width: 15%">Price</th>
		<th style="width: 5%">&nbsp;</th>
		<th style="width: 15%">&nbsp;</th>
		<th style="width: 5%">&nbsp;</th>
		<th style="width: 5%">&nbsp;</th>
		</tr>
<?php
		if(count($menu)>0){
			foreach ($menu as $menuItem) {
				?>
                <tr>
				<td><?=$menuItem->name?></td>
				<td><?=$menuItem->price?></td>
				<td><a style="float: right" href="/admin/editDish?id=<?=$menuItem->id?>">Edit</a></td>
				<td><form method="post" action="/admin/deleteDish">
				<input type="hidden" name="id" value="<?=$menuItem->id?>" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>
				</tr>
            <?php
            }}else{ ?>
			     <h1>There are no dishes of this category</h1>	
			<?php 
			}
            ?>
			</thead>
			</table>
