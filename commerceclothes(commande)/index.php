<?php
	session_start();
?>
<html>
	<head>
		<title>Espace Administration</title>
		<link href="View/Style/style.css" rel="stylesheet" type="text/css" />
		<link href="View/Style/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="View/Style/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Espace Admin</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="?controler=Home">Home</a>
              </li>
              <li class="">
                <a href="?controler=Produit">Produits</a>
              </li>
              <li class="">
                <a href="?controler=Client">Client</a>
              </li>
              <li class="">
                <a href="?controler=Commande">Commande</a>
              </li>
              
              
            </ul>
          </div>
        </div>
      </div>
    </div>
		
			
				<div id="main" class="container">
					<br/>
					<?php
						//Connexion au serveur de base de données
						mysql_connect('localhost', 'root', '');
						mysql_select_db('ecommerce');
						/*Traitement de la Requete*/ 
						$controler = 'Home';
						$action = 'index';
						$id = '';
						if(!empty($_GET['controler'])){
							$controler = $_GET['controler'];
							if(!empty($_GET['action'])){
								$action = $_GET['action'];
								if(!empty($_GET['id']))
									$id = $_GET['id'];
							}
						}
						//On inclut le fichier de conrtoleur spécifier s'il existe
						if(is_file('Controller/'.$controler.'.Controller.php')){
							include 'Controller/'.$controler.'.Controller.php';
							$class = $controler."Controller";
							$objet = new $class();
							$objet->$action($id);
						}
						//Fermeture de connexion avec Serveur de DB
						mysql_close();
					?>
					
				</div>
			
			<div class="row-fluid">
				<p class="pull-right"><a href="#">Back to top</a></p>
				Shop Clothing 2013
			</div>
		
	</body>
</html>