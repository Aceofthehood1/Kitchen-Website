<?php
require 'adminNav.html.php';
?>
<h2>Edit Dish</h2>
<form action="/admin/editDish" method="POST">
	<input type="hidden" name="menu[id]" value="<?= $menu->id ?? NULL ?>" />
	<label>Name</label>
	    <input type="text" name="menu[name]" value="<?=$menu->name ?? NULL ?>" />
	<label>Description</label>
		<textarea name="menu[description]"><?= $menu->description ?? NULL ?></textarea>
	<label>Price</label>
		<input type="text" name="menu[price]" value="<?= $menu->price ?? NULL ?>" />
	<label>Category</label>
	<select name="menu[categoryId]">
<?php
		foreach($categoriesList as $category) { //loops through categories and has value of category id 
			if($category->id == $menu->categoryId){ ?>
				<option selected="selected" value="<?=$category->id?>"><?=$category->name?></option>
	<?php } 
	else{?>
			<option value="<?=$category->id?>"><?=$category->name?></option>
							<?php
							}
						}
				?>
				</select>
				<label> Visibility</label> 
				<select name="menu[visible_id]">
					<?php 
					foreach($visibility as $visible) {
					if($visible->id == $menu->visible_id){ ?>
						<option selected="selected" value="<?=$visible->id?>"><?=$visible->state?></option>
					<?php 
					}else{ ?>
							<option value="<?=$visible->id?>"><?=$visible->state?></option>
					<?php }
					}
					?>
				</select>
				<input type="submit" name="submit" value="Save" />
			</form>