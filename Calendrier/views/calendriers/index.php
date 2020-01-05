<h1><?=$titre?></h1>
<body>
<?php
    //echo "<PRE>";
    //print_r($heure);
	//echo "</PRE>";
	date_default_timezone_set('Europe/Paris');
?>
	<div class="container">
		<div class="row">
			</br>
			<div class="col-sm-5">
			<?php
				echo  "Aujourd'hui nous somme le ".date("d/m/Y")." de la semaine ".date("W");
			?>
			</div>
			<div class="col-sm-1.5">
			<p><b>Semaine : </b></p>
			</div>
			<div class="col-sm-2">
			<form method="POST" action="/<?=WEBROOT2?>/<?=WEBROOT3?>/calendriers">
			<div class="form-group">
					<select class="form-control" name='id'>
						<?php
							foreach ($semaine as $s) {
								if (isset($_POST["id"]))
								{	
									if ($s->IDSEMAINE == $_POST["id"])
									{
									echo "<option name='id' value='".$s->IDSEMAINE."' selected>".$s->IDSEMAINE."</option>";
										} else {
									echo "<option name='id' value='$s->IDSEMAINE'>$s->IDSEMAINE</option>";
									}
								} else {
									if ($s->IDSEMAINE < 1)
									{
									echo "<option name='id' value='".$s->IDSEMAINE."' selected>".$s->IDSEMAINE."</option>";
										} else {
									echo "<option name='id' value='$s->IDSEMAINE'>$s->IDSEMAINE</option>";
									}
								}
								
							}
						?>
					</select>
				</div>
			</div>
			<div class="col-sm-2">
			<button type="submit" class="btn btn-primary">Valider</button>
			</div>
			</form>
			<table class="table table-bordered">
			  <thead>
				<tr>
					<th>H</th>
					<?php
					foreach ($jtableau as $j){
						echo '<th>'.$j->JTABLEAU.'</th>';			
					}
					?>
				</tr>				
			  </thead>
			  <tbody>
					<?php
					// Affichage des heures
					foreach ($heure as $h){
						echo '<tr>';
						echo '<th>'.$h->IDHEURE.'</th>';
						// Foreach qui affiche les données
						foreach ($jtableau as $j){
							$i = 0;
							foreach ($ligneagenda as $a){
								if ($a->IDJOURSEMAINE == $j->ID && $a->IDHEURE == $h->IDHEURE) 
								{
									echo '<td class="bg-primary">'.$a->LIBELLE.'</td>';
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
<br><br>
