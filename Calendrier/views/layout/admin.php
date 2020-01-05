<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"; integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/<?=WEBROOT2?>/<?=WEBROOT3?>/webroot/css/style.css" type="text/css" />
    <title>Agent Da</title>
  </head>
  <body>
<!-- Image and text -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">
  <i class="far fa-calendar-alt"></i> 
    AgenDa
  </a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/<?=WEBROOT2?>/<?=WEBROOT3?>/calendriers/adminIndex">Calendrier<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="/<?=WEBROOT2?>/<?=WEBROOT3?>/users/login">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Connexion</button>
    </form>
</nav>

    <div class="container bg-light">
      <?php
        echo $this->Session->flash();
      ?>
    </div>
    <div class="hero">
    <?php
        echo $content_for_layout;
    ?>
    </div>
       

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"; integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"; integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"; integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/900d9b94a2.js"; crossorigin="anonymous"></script>
    </body>
<!--footer starts from here-->
<br><br><br>

<footer>
<div class="container bottom_border">
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<center>
				<h5 class="headin5_amrc col_white_amrc pt2">Qui somme nous</h5>
				<!--headin5_amrc-->
				<p class="mb10">Nous sommes 2 étudiants en BTS SIO <br> au Pole La Chartreuse-Paradis</p>
				<p><i class="fa fa-location-arrow"></i> Pôle La Chartreuse <br> 9 rue du pont <br> 43700 BRIVES-CHARENSAC </p>
				<p><i class="fa fa-phone"></i>  04 71 09 83 09  </p>
				<a href="mailto:contact@pole-lachartreuse.fr" title="Nous contacter"><i class="fa fa fa-envelope"></i> contact@bro-bock.fr</a>
			</center>
		</div>

		<div class="col-xs-12 col-sm-4">
			<center>
				<br><br>
				<img src="/<?=WEBROOT2?>/<?=WEBROOT3?>/webroot/img/icon.png"/>
			</center>
		</div>

		<div class="col-xs-12 col-sm-4">
			<center>
				<h5 class="headin5_amrc col_white_amrc pt2">D'autres site de vente de bière</h5>
				<a href="https://www.saveur-biere.com/fr/">Saveur biere</a><br>
				<a href="https://www.beerwulf.com/fr-fr">Beerwulf</a><br>
				<a href="https://www.latelierdesbieres.fr/">L'atelier des biere</a><br>
				<a href="https://www.lantredebiere.com/">L'antre de biere</a><br>
				<a href="https://unepetitemousse.fr/">Une petite mousse</a><br>
				<a href="https://bieronomy.com/">Bieronomy</a>
			</center>
		</div>


		</div>

	<!--footer_ul2_amrc ends here-->
	</div>
</div>


<div class="container">
<br>
<p class="text-center">Copyright 2019-2020 | <a href="index.php?page=accueil">AgenDa</a></p>

<ul class="foote_bottom_ul_amrc">
<li><a href="http://facebook.com"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="http://twitter.com"><i class="fab fa-twitter"></i></a></li>
<li><a href="http://youtube.com"><i class="fab fa-youtube"></i></a></li>
<li><a href="http://instagram.com"><i class="fab fa-instagram"></i></a></li>
<br><br>
</ul>
</div>

</footer>
</html>