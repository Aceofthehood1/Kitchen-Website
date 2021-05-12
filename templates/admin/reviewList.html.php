<?php
require 'adminNav.html.php';
?>
<h2>Review</h2>
	<table>
		<thead>
		<tr>
		<th>Name</th>
		<th style="width: 5%">&nbsp;</th>
		<th style="width: 5%">&nbsp;</th>
		</tr>
<?php 
	foreach ($reviews as $review) { 
?>
	    <tr>
		<td><?=$review->name?></td>
        <td><?=$review->text?></td>
		<td><form method="post" action="/admin/deleteReview">
		<input type="hidden" name="id" value="<?=$review->id?>" />
		<input type="submit" name="submit" value="Delete" />
		</form></td>
		</tr>
<?php
	}
?>
	    </thead>
	</table>