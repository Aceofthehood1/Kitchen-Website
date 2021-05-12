<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title><?=$title?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening times:</h3>
				<p>Sun-Thu: 12:00-22:00</p>
				<p>Fri-Sat: 12:00-23:30</p>
			</aside>
			<h1>Kate's Kitchen</h1>
		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li>Menu
				<ul>
				<?php 
				foreach($layoutVars['categories'] as $category){ ?>
					<li><a href="/menu/category?id=<?=$category->id?>"><?=$category->name?></a></li>
				<?php 
				} 
				?>
				   <li><a href="/menu/FAQs">FAQs</a></li>
				</ul>
			</li>
			<li><a href="/kitchen/aboutUs">About Us</a></li>
		</ul>

	</nav>
<img src="../images/randombanner.php"/>
<main class="<?=$layoutVars['class'] ?? 'home' ?>">
<?=$output?>
</main>
	<footer>
		&copy; Kate's Kitchen <?php echo date('Y') ?>
	</footer>
</body>
</html>
