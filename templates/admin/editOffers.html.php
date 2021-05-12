<?php
require 'adminNav.html.php';
?>
<h2>Add Offers</h2>
	<form action="" method="POST">
	<input type="hidden" name="offers[id]" value="<?=$offer->id ?? NULL ?>" />
		<label>Title</label>
		<input type="text" name="offer[title]"  value="<?=$offer->title ?? NULL?>"/>
        <label>Description</label>
        <textarea name="offer[description]"><?= $offer->description ?? NULL?></textarea>
		<input type="submit" name="submit" value="Save offer" />
    </form>