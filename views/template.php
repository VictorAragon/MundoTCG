<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Loja 2.0</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/jquery-ui.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/jquery-ui.structure.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/jquery-ui.theme.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" type="text/css" />
	</head>
	<body>
		<nav class="navbar topnav">
			<div class="container">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo BASE_URL; ?>"><?php $this->lang->get("HOME"); ?></a></li>
					<li><a href="<?php echo BASE_URL; ?>contact"><?php $this->lang->get("CONTACT"); ?></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php $this->lang->get("LANGUAGE"); ?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo BASE_URL; ?>lang/set/en">English</a></li>
							<li><a href="<?php echo BASE_URL; ?>lang/set/pt-br">Português</a></li>
							<li><a href="<?php echo BASE_URL; ?>lang/set/es">Espanhol</a></li>
						</ul>
					</li>
					<li><a href="<?php echo BASE_URL; ?>login"><?php $this->lang->get("LOGIN"); ?></a></li>
				</ul>
			</div>
		</nav>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-sm-2 logo">
						<a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/logo.png" /></a>
					</div>
					<div class="col-sm-7">
						<div class="head_help">(11) 9999-9999</div>
						<div class="head_email">contato@<span>loja2.com.br</span></div>
						
						<div class="search_area">
							<form method="GET">
								<input type="text" name="s" required placeholder="<?php $this->lang->get("SEARCHFORCARD"); ?>" />
								<select name="category">
									<option value=""><?php $this->lang->get("ALLCATEGORIES"); ?></option>
								</select>
								<input type="submit" value="" />
						    </form>
						</div>
					</div>
					<div class="col-sm-3">
						<a href="<?php echo BASE_URL; ?>cart">
							<div class="cartarea">
								<div class="carticon">
									<div class="cartqt">9</div>
								</div>
								<div class="carttotal">
									<?php $this->lang->get("CART"); ?>:<br/>
									<span>R$ 999,99</span>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</header>
		<div class="categoryarea">
			<nav class="navbar">
				<div class="container">
					<ul class="nav navbar-nav">
						<li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php $this->lang->get("SELECTCATEGORIES"); ?>
					        <span class="caret"></span></a>
					        <ul class="dropdown-menu">
								<?php
								foreach($viewData["categories"] AS $cat){ ?>
									<li>
										<a href="<?php echo BASE_URL."categories/enter/".$cat["id"]; ?>">
											<?php echo $cat["name"];?>
										</a>
									</li>
									<?php
									if(count($cat["subs"]) > 0){
										$this->loadView("menu_subcategories", array(
										"subs" => $cat["subs"], 
										"level" => 1
										));
									}
								}
								?>
					        </ul>
					      </li>
						  <?php if(isset($viewData["categoryFilter"])){ 
							foreach ($viewData["categoryFilter"] AS $cf){ ?>
						  		<li><a href="<?php BASE_URL; ?>categories/enter/<?php echo $cf['id'];?>"><?php echo $cf["name"];?></a></li>
						  		<?php 
							}
						  } ?>
					</ul>
				</div>
			</nav>
		</div>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<aside>
				  			<h1><?php $this->lang->get("FILTER"); ?></h1>
							<div class="filterarea">
								<div class="filterBox">
									<div class="filterTitle"><?php $this->lang->get("TYPES"); ?></div>
									<div class="filterContent">...</div>
								</div>

								<div class="filterBox">
									<div class="filterTitle"><?php $this->lang->get("BRANDS"); ?></div>
									<div class="filterContent">...</div>
								</div>

								<div class="filterBox">
									<div class="filterTitle"><?php $this->lang->get("PRICE"); ?></div>
									<div class="filterContent">
										<input type="text" id="amount" readonly style="border:0; font-weight:bold;">
										<div id="slider-range"></div>
									</div>
								</div>
								
								<div class="filterBox">
									<div class="filterTitle"><?php $this->lang->get("RATING"); ?></div>
									<div class="filterContent">...</div>
								</div>

								<div class="filterBox">
									<div class="filterTitle"><?php $this->lang->get("OPTIONS"); ?></div>
									<div class="filterContent">...</div>
								</div>
							</div>
							<div class="widget">
								<h1>Featured Products</h1>
								<div class="widget_body">
									...
								</div>
							</div>
				  		</aside>
				  	</div>
				  	<div class="col-sm-9"><?php $this->loadViewInTemplate($viewName, $viewData); ?></div>
				</div>
	    	</div>
	    </section>
	    <footer>
	    	<div class="container">
	    		<div class="row">
				  <div class="col-sm-4">
				  	<div class="widget">
			  			<h1>Featured Products</h1>
			  			<div class="widget_body">
			  				...
			  			</div>
			  		</div>
				  </div>
				  <div class="col-sm-4">
				  	<div class="widget">
			  			<h1>On-Sale Products</h1>
			  			<div class="widget_body">
			  				...
			  			</div>
			  		</div>
				  </div>
				  <div class="col-sm-4">
				  	<div class="widget">
			  			<h1>Top Rated Products</h1>
			  			<div class="widget_body">
			  				...
			  			</div>
			  		</div>
				  </div>
				</div>
	    	</div>
	    	<div class="subarea">
	    		<div class="container">
	    			<div class="row">
						<div class="col-xs-12 col-sm-8 col-sm-offset-2 no-padding">
							<form method="POST">
                                <input class="subemail" name="email" placeholder="Subscribe to our newsletter">
                                <input type="submit" value="Subscribe" />
                            </form>
						</div>
					</div>
	    		</div>
	    	</div>
	    	<div class="links">
	    		<div class="container">
	    			<div class="row">
						<div class="col-sm-4">
							<a href="<?php echo BASE_URL; ?>"><img width="150" src="<?php echo BASE_URL; ?>assets/images/logo.png" /></a><br/><br/>
							<strong>Slogan da Loja Virtual</strong><br/><br/>
							Endereço da Loja Virtual
						</div>
						<div class="col-sm-8 linkgroups">
							<div class="row">
								<div class="col-sm-4">
									<h3>Categorias</h3>
									<ul>
										<li><a href="#">Categoria X</a></li>
										<li><a href="#">Categoria X</a></li>
										<li><a href="#">Categoria X</a></li>
										<li><a href="#">Categoria X</a></li>
										<li><a href="#">Categoria X</a></li>
										<li><a href="#">Categoria X</a></li>
									</ul>
								</div>
								<div class="col-sm-4">
									<h3>Information</h3>
									<ul>
										<li><a href="#">Menu 1</a></li>
										<li><a href="#">Menu 2</a></li>
										<li><a href="#">Menu 3</a></li>
										<li><a href="#">Menu 4</a></li>
										<li><a href="#">Menu 5</a></li>
										<li><a href="#">Menu 6</a></li>
									</ul>
								</div>
								<div class="col-sm-4">
									<h3>Information</h3>
									<ul>
										<li><a href="#">Menu 1</a></li>
										<li><a href="#">Menu 2</a></li>
										<li><a href="#">Menu 3</a></li>
										<li><a href="#">Menu 4</a></li>
										<li><a href="#">Menu 5</a></li>
										<li><a href="#">Menu 6</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
	    		</div>
	    	</div>
	    	<div class="copyright">
	    		<div class="container">
	    			<div class="row">
						<div class="col-sm-6">© <span>Loja 2.0</span> - Todos os direitos reservados.</div>
						<div class="col-sm-6">
							<div class="payments">
								<img src="<?php echo BASE_URL; ?>assets/images/visa.png" />
								<img src="<?php echo BASE_URL; ?>assets/images/visa.png" />
								<img src="<?php echo BASE_URL; ?>assets/images/visa.png" />
								<img src="<?php echo BASE_URL; ?>assets/images/visa.png" />
							</div>
						</div>
					</div>
	    		</div>
	    	</div>
	    </footer>
		<script type="text/javascript">
			var BASE_URL = '<?php echo BASE_URL; ?>';
			var maxSlider = '<?php echo $viewData["maxSlider"]; ?>';
		</script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>