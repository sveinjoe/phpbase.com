<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="canonical" href="<?php echo $html->url; ?>" />
		<!-- Bootstrap CSS -->
		<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="/<?php echo getTemplateFileURI("css/style.css");?>" rel="stylesheet">
	
		<title><?php echo $html->title; ?></title>
		<meta name="keywords" content="<?php echo $html->meta_keywords; ?>" />
		<meta name="description" content="<?php echo $html->meta_description; ?>" />
		<meta name="robots" content="<?php echo $html->robots; ?>" />
	</head>
	<body>
		<div id="MainWrapper" class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><?php echo TPL_HEADER_MENU; ?></a>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li<?php echo ($html->page=="index") ? " class=\"active\"" : ""; ?>><a href="/"><?php echo TPL_HEADER_HOME; ?><span class="sr-only">(current)</span></a></li>
							<li<?php echo ($html->page=="category") ? " class=\"dropdown active\"" : " class=\"dropdown\""; ?>>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<?php echo TPL_HEADER_CATEGORIES;?> <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<?php echo CatetoriesLi(); ?>
								</ul>
							</li>
						</ul>
						<form action="<?php echo HrefLink("search");?>" method="GET" class="navbar-form navbar-left">
							<div class="form-group">
								<input type="text" name="q" class="form-control" placeholder="<?php echo TPL_HEADER_SEARCH;?>">
							</div>
							<button type="submit" class="btn btn-default"><?php echo TPL_HEADER_SUBMIT; ?></button>
						</form>
						<ul class="nav navbar-nav navbar-right">
							<li<?php echo ($html->page=="sitemap") ? " class=\"active\"" : ""; ?>><a href="<?php echo HrefLink("/sitemap"); ?>"><?php echo TPL_HEADER_SITEMAP;?></a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<?php echo TPL_HEADER_ACCOUNT;?> <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li<?php echo ($html->page=="login") ? " class=\"active\"" : ""; ?>><a href="<?php echo HrefLink("/login"); ?>"><?php echo TPL_HEADER_LOGIN;?></a></li>
									<li<?php echo ($html->page=="signup") ? " class=\"active\"" : ""; ?>><a href="<?php echo HrefLink("/signup"); ?>"><?php echo TPL_HEADER_REGISTER;?></a></li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
			
			<!--breadcrumb-->
			<div class="row" id="BreadCrumb">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<?php echo BreadCrumbLi(); ?>
					</ul>
				</div>
			</div>