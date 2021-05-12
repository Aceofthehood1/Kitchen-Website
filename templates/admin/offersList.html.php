<?php
require 'adminNav.html.php';
?>
<h2>Offers</h2>
    <a class="new" href="/admin/editOffers">Add new offers</a>
	<table>
		<thead>
		<tr>
		<th>Name</th>
		<th style="width: 5%">&nbsp;</th>
		<th style="width: 5%">&nbsp;</th>
		</tr>
<?php 
	foreach ($offers as $offer) { 
?>
	    <tr>
		<td><?=$offer->title?></td>
		<td><form method="post" action="/admin/deleteOffer">
		<input type="hidden" name="id" value="<?=$offer->id?>" />
		<input type="submit" name="submit" value="Delete" />
		</form></td>
		</tr>
<?php
	}
?>
	    </thead>
	</table>