<?php
//var_dump($content->get());
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $title; ?></title>
		<?php //echo Asset::css('bootstrap.css'); ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php echo Asset::css('style.css'); ?>
		
		<?php echo Asset::js('vue.js'); ?>
		<?php echo Asset::js('vue-resource.min.js'); ?>
	</head>
	<body>
		<section class="hero is-primary">
			<!-- Hero header: will stick at the top -->
			<div class="hero-head">
				<header class="nav">
					<div class="container">
						<div class="nav-left">
							<a class="nav-item">
								<span class="title">GWS</span>
							</a>
						</div>
						<span class="nav-toggle">
							<span></span>
							<span></span>
							<span></span>
						</span>
						<div class="nav-right nav-menu">
							<a class="nav-item is-active">
								Home
							</a>
							<a class="nav-item is-active">
								Home
							</a>
							<a class="nav-item">
								Examples
							</a>
							<a class="nav-item">
								Documentation
							</a>
							<span class="nav-item">
								<a class="button is-info is-inverted">
									<span class="icon">
										<i class="fa fa-github"></i>
									</span>
									<span>Download</span>
								</a>
							</span>
						</div>
					</div>
				</header>
			</div>

			<!-- Hero footer: will stick at the bottom -->
			<div class="hero-foot">
				<nav class="tabs is-boxed is-fullwidth">
					<div class="container">
						<ul>
							<li class="is-active"><?php echo Html::anchor('user', 'User'); ?></li>
							<li><a>Modifiers</a></li>
							<li><a>Modifiers</a></li>
							<li><a>Modifiers</a></li>
							<li><a>Modifiers</a></li>
							<li><a>Modifiers</a></li>
							<li><a>Modifiers</a></li>
							<li><a>Grid</a></li>
							<li><a>Elements</a></li>
							<li><a>Components</a></li>
							<li><a>Layout</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</section>
		<section class="section">
			<div class="container">
				<?php echo $content; ?>
			</div>
		</section>

		<footer class="footer">
			<div class="container">
				<div class="content has-text-centered is-primary">
					<p>
						<strong>GWS</strong> by <a href="#">Bui Huu Phuc</a>. The source code is licensed
						<a href="http://opensource.org/licenses/mit-license.php">MIT</a>.
					</p>
				</div>
			</div>
		</footer>
	</body>
</html>

<script>
	const data = <?php echo empty($content->get()) ? '{}' : Format::forge($content->get())->to_json(); ?>
</script>
<?php
//echo Asset::js('component/user_form.js');

$dir = strtolower(substr(Request::active()->controller, 11));
$file_name = strtolower(Request::active()->action);
echo Asset::js('app/' . $dir . '/' . $file_name . '.js');
?>
