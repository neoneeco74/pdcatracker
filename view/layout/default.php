<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
        <link href="<?php echo BASE_URL ?>webroot/img/favicon.ico" rel="icon" type="image/x-icon">
		<title>PDCA Tracker</title>
		<!-- Bootstrap CSS 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
		
		<link rel="stylesheet" href="<?php echo BASE_URL ?>webroot/css/bootstrap.css">

		<!-- MON CSS -->
		<link rel="stylesheet" href="<?php echo BASE_URL ?>webroot/css/mycss.css" >
		<!--<link rel="stylesheet" href="../webroot/css/mycss.css" >-->
        <link rel="stylesheet" href="<?php echo BASE_URL ?>webroot/css/bootstrap-multiselect.css" type="text/css"/>

	</head>
	
	<body>

        <div class="mycss-entete">
			<div class="container mycss-container-entete">
				<div id="mycss-logo">
					<a href="<?php echo BASE_URL ?>"></a>
                </div>
                
				<?php if(isset($_SESSION['auth'])) { ?>
					<div class="mycss-logo-bloc-info btn btn-secondary">
						<span class="mycss-logo-bloc-info2"><?php echo $_SESSION['auth']['prenom']." ".$_SESSION['auth']['nom']; ?><br>
                        Service: [<?php echo $this->request('Account','getUserService')?>] Groupe: [<?php echo $this->request('Account','getUserGroupe') ?>]</span>
                    </div>
				<?php } ?>
								
			</div>

		</div>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
            <div class="container">
			
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
<?php 
			if(!empty($_SESSION['auth'])) { 
?>	
				
					<ul class="nav navbar-nav mr-auto">
						<li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>home">Afficher PDCA <span class="sr-only">(current)</span></a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>add/">Ajouter </span></a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>description/">Description </span></a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>account/">Mon compte </span></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>contact/">Contact </span></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>deconnexion/">Deconnexion </span></a></li>
                    </ul>
<?php 
			} 
			if(empty($_SESSION['auth'])) {					
?>	
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>contact/"">Contact </span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
							
						<li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>inscription/"">Inscription </span></a></li>	
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>connexion/"">Connexion </span></a></li>
                    </ul>
<?php 
			} 
?>
						
				</div>
            </div>
		</nav>
        
        <div class="container-global">

            <?php echo $content_for_layout;

 
            ?>

        </div>










        <!-- FOOTER -->
        <div class="footer">  
            <div class="container-fluid footer1">
				<div class="row">
                </div>
            </div>
            <div class="py-3">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<p class="mt-2 mb-0">© 2020 Kongsberg - by Nicolas Olagnon</p>
					</div>
                </div>
            </div>
            </div>
        </div> 
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS 
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        -->

        <script type="text/javascript" src="<?php echo BASE_URL ?>webroot/js/jquery-3.5.1.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?php echo BASE_URL ?>webroot/js/bootstrap.js"></script>
		<!--<script type="text/javascript" src="/webroot/js/bootstrap-multiselect.js"></script> -->		
		
		

        <script type="text/javascript" src="<?php echo BASE_URL ?>webroot/js/bootstrap-multiselect.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL ?>webroot/js/index.js"></script>

  </body>
</html>	