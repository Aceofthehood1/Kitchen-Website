<p>Welcome to Kate's Kitchen, we're a family run restauraunt in Northampton. Take a look around our site to see our menu!</a></p>

		<h2>Take a look at our menu:</h2>
				<ul>
				<?php 
				foreach($categories as $category){ ?>
					<li><a href="/menu/category?id=<?=$category->id?>"><?=$category->name?></a></li>
				<?php 
				} 
				?>
				</ul>
			</li>

	</main>