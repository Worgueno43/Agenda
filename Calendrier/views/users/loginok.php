<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Bienvenue</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<form method="POST" action="/<?=WEBROOT2?>/<?=WEBROOT3?>/users/logout">
			<?php echo "Bonjour ".$_SESSION['User']->NOM;?>
			<?php
				echo "<br>";
				if ($_SESSION['User']->FONCTION === "Gerant")
				{
					echo "Bonjour monsieur le Gérant";
				} else {
					echo "Bonjour monsieur le Salarie";
				}
				echo "<br>";
			?>
			  <button type="submit" class="btn btn-primary">Se déconnecter</button>
			</form>
		</div>
	</div>
</div>