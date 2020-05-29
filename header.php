<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>IK DEMY - Formation</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	  
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/vendors/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/vendors/fontello.css" >

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/js/vendors/owl.carousel/assets/owl.carousel.min.css">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/js/vendors/owl.carousel/assets/owl.theme.default.min.css">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/js/vendors/fancybox/jquery.fancybox.css" />

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/vendors/animate.css">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/styles.css" />	

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/orange.css" />

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/media-queries.css" />	
    
<?php wp_head(); ?>
	
</head>

<body>
	
	<div id="layout">
		<!-- begin Header -->
		<header>
			<nav class="navbar navbar-fixed-top" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.html#"><img src="<?php echo get_template_directory_uri();?>/img/logo.jpg"></a>
					</div>
					
					<div class="collapse navbar-collapse">
						
						<ul class="nav navbar-nav navbar-right login-navbar ">
							<li class="login-button">
								<button type="button">Login</button>
								<div class="login-content login-content-login">
									<div>
										<div class="login-forms">
											<i class="icon-cancel">Close the dialog</i>
											<h2>Login</h2>
											<form>
												<p><label>Email</label><input type="text"></p>
												<p><label>Password</label><input type="password"></p>
												<p><button>Login</button></p>
											</form>
										</div>
									</div>
								</div>
							</li>
							<li class="login-button">
								<button type="button">singup</button>
								<div class="login-content login-content-singup">
									<div>
										<div class="login-forms">
											<i class="icon-cancel">Close the dialog</i>
											<h2>Sign Up</h2>
											<form>
												<p><label>Email</label><input type="text"></p>
												<p><label>Password</label><input type="password"></p>
												<p><label>Repeat Password</label><input type="password"></p>
												<p><button>Sign Up</button></p>
											</form>
										</div>
									</div>
								</div>
							</li>
						</ul>

						  <?php
							wp_nav_menu( array(
							    'menu'              => 'top-menu',
							    'theme_location'    => 'primary',
							    'depth'             => 2,
							    'menu_class'        => 'nav navbar-nav navbar-right menu-effect',
							    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							    'walker'            => new WP_Bootstrap_Navwalker(),
							) ); ?>

					</div><!--/.nav-collapse -->
				</div>
			</nav>
		</header>
		<!-- end Header -->