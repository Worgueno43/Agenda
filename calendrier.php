<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"; integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
				
	<title>Calendrier</title>
	</head>
	
	<body>
	
	<div class="container">
		<div class="row">
			</br>
			
			<div class="col-sm-8">
				<h1>SEMAINE</h1>
			</div>
			<div class="col-sm-4">
			<?php
			// affichage des semaines
			$requeteSQL = "SELECT * FROM SEMAINE WHERE IDSEMAINE=".$_GET["id"];				
			$sth = $dbh->prepare($requeteSQL);
			$sth->execute();
			$semaine = $sth->fetchAll();
			?>
			<form method="POST" action="calendrier.php">
					<label for="exampleInputidSemaine1">Semaine : </label>
					<select class="form-control" name='Semaine'>
						<?php
						foreach ($semaine as $s) {
							echo "<option value='".$s["IDSEMAINE"]."' selected>".$s["IDSEMAINE"]."</option>";
						}
						?>
					</select>
				<?php
					//echo $s["IDSEMAINE"];
				?>
				<button type="submit" class="btn btn-primary">Valider</button>
				</div>
			</form>
			<table class="table table-bordered">
			
			  <thead>
				<tr>
					<th>H</th>
				<?php
					// Affichage des jours
					$requeteSQL1 = "SELECT * FROM JTABLEAU";				
					$sth = $dbh->prepare($requeteSQL1);
					$sth->execute();
					$jour = $sth->fetchAll();
				
					foreach ($jour as $j){
						echo '<th>'.$j["JTABLEAU"].'</th>';			
					}	
				?>

				</tr>				
			  </thead>
			  <tbody>
					<?php
					// Affichage des heures
					$requeteSQL2 = "SELECT * FROM HEURE";				
					$sth = $dbh->prepare($requeteSQL2);
					$sth->execute();
					$heure = $sth->fetchAll();
					$c=0;
					foreach ($heure as $h){
						echo '<tr>';
						echo '<th>'.$h["IDHEURE"].'</th>';
						// Foreach qui affiche les données
						foreach ($jour as $j){
							$i = 0;
							$requeteSQL2 = "SELECT * FROM ligneagenda INNER JOIN ACTION ON ACTION.idAction = ligneagenda.IDACTION WHERE ligneagenda.IDSEMAINE =".$s["IDSEMAINE"];				
							$sth = $dbh->prepare($requeteSQL2);
							$sth->execute();
							$agenda = $sth->fetchAll();
							foreach ($agenda as $a){
								if ($a["IDJOURSEMAINE"] == $j["ID"] && $a["IDHEURE"] == $h["IDHEURE"]) 
								{
									echo '<td class="bg-primary">'.$a["LIBELLE"].'</td>';
									$i++;
								} 
							}
							if ($i == 0)
							{
								echo '<td></td>';
							};
							
								
						}	
						echo '</tr>';
					}
					?>
				</tr>
			  </tbody>
			  </div>
			</table>
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"; integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"; integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"; integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>


<?php
					
					// foreach ($agenda as $a){
						// if (!empty($a)) {
							// echo '<td class="bg-primary">'.$a["LIBELLE"].'</td>';
						// } else {
							// echo '<td>...</td>';
						// }
						
						
					// }	
					?>
					
									<?php	
					// $requeteSQL = "SELECT * FROM ligneagenda INNER JOIN ACTION ON ACTION.idAction = ligneagenda.IDACTION WHERE 1=1";				
					// $sth = $dbh->prepare($requeteSQL);
					// $sth->execute();
					// $agenda = $sth->fetchAll();
				?>