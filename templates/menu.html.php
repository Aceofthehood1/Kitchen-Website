<section class="left">
		<ul>
		<?php 
				foreach($categories as $category){ ?>
					<li><a class="current" href="/menu/category?id=<?=$category->id?>"><?=$category->name?></a></li>
				<?php 
				} 
				?>
				<li><a href="/menu/FAQs">FAQs</a></li>
		</ul>
</section>
<?php 
	if(isset($menu[0])){ ?>
<section class="right">
		<h1><?=$menu[0]->getCategory()->name ?? NULL ?></h1>
		<ul class="listing">
<?php 
    		foreach ($menu as $menuItem) {
				if($menuItem->visible_id == 1){ //if the visble id in menu is one it means that its visibility is set to show
?>
				<li>
					<div class="details">
						<h3><?='£ '. $menuItem->price ?? NULL ?></h3>
						<h2><?=$menuItem->name ?? NULL ?></h2>
						<p><?=nl2br($menuItem->description ?? NULL )?></p>
						<h2>Reviews</h2>
						<?php foreach($review as $view) { 
							if($menuItem->id == $view->menu_id){
							?>
								<p><?=$view->name?></p>
								<strong><p>Rating: <?=$view->rating ?? NULL ?></p></strong>
								<p><?=$view->text?></p>
							<?php 
							}}
						?>
						<!--form to enter review-->
						<form method="post" action="/menu/category">
							<input type="hidden" name="review[menu_id]" value="<?=$menuItem->id ?? NULL ?>" />
							<label>Name</label>
							<input type="text" name="review[name]" />
							<label>Review</label>
							<input type="text" name="review[text]" />
							<label>Rating: (1-5)</label>
							<input type="text" name="review[rating]" />
							<input type="submit" name="submit" value="review" />
						</form>
					</div>
				</li>

<?php
	} }}else{ ?>
		<h1><?= $category->name ?></h1>
		<h1>There are no dishes in this menu</h1>
<?php 
	}
?>
		</ul>
</section>