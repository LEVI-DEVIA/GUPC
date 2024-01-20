<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Progressus - Free business bootstrap template by GetTemplate</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="assets/js/bootstrap.min.js"></script>


	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.html"><img src="images/GUPC-removebg-preview (1).png" alt="logo"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="#">Acceuil</a></li>	
					<li><a href="about.html">A Propos </a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Documents <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a class="active" href="sidebar-left.html">Liste des procédures du guichet unique du permis de construire (GUPC)</a></li>
							<li><a class="active" href="sidebar-right.html">Pièces à fournir et cout pour l’obtention d’un ACD</a></li>
						</ul>
					</li>
					<li><a href="contact.html">Contact</a></li>
					<li><a class="btn" href="{{ route('/login/user') }}">Connexion</a></li>
					@guest
						<!-- Afficher le bouton de connexion uniquement si l'utilisateur n'est pas connecté -->
						<!--<li><a class="btn" href="{{ route('/login/user') }}">Connexion</a></li>-->
					@else
						<!-- Afficher le nom de l'utilisateur s'il est connecté -->
						<!-- <li><a href="#">{{ Auth::user()->name }}</a></li>-->
					@endguest
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">GUICHET UNIQUE DE PERMIS DE CONSTRUIRE </h1>
				<p class="tagline">Penser à obtenir un permis de construire avant de bâtir, c'est comme planter les fondations solides de votre rêve architectural <a href="http://www.gettemplate.com/?utm_source=progressus&amp;utm_medium=template&amp;utm_campaign=progressus"></a></p>
				@guest
        			<!-- Afficher le lien vers la page de connexion pour les utilisateurs non connectés -->
					<p><a href="{{ route('/login/user') }}" class="btn btn-action btn-lg" role="button">Obtenez un permis de construire</a></p>
				@else
					<!-- Afficher le lien vers la page de demande de permis pour les utilisateurs connectés -->
					<p><a href="{{ route('dmpermis') }}" class="btn btn-action btn-lg" role="button">Obtenez un permis de construire</a></p>
				@endguest
			</div>
		</div>
	</header>
	<!-- /Header -->
