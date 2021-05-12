<?php
foreach($offers as $offer){ ?>
	<h1><?=$offer->date_entered?></h1>
	<h2 style="text-align: center; margin-top:5px;"><?=$offer->title?></h2>
	<p style="text-align: center;"><?=$offer->description?></p>
<?php 
}
?>