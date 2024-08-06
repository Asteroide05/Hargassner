<?php include("password_protect.php"); ?>
<?php 
require("header.php"); 
?>

    
<script type="text/javascript">
	requestData('call_ajax_light') // in header.php
</script>

<?php 
require_once("conf/settings.inc.php");

    $query0 = "SELECT * FROM tarif 
            ORDER BY saison ASC ";

	$query1 = "CREATE TABLE IF NOT EXISTS `tarif` (
		`saison` CHAR(9) NOT NULL COLLATE 'utf8_general_ci',
		`prix` DECIMAL(5,3) NOT NULL DEFAULT '0.000',
		PRIMARY KEY (`saison`) USING BTREE
		) COLLATE='utf8_general_ci'
		ENGINE=InnoDB";

	$query2 = "CREATE TABLE IF NOT EXISTS `prix_moyen` (
		`dateB` DATE NOT NULL,
		`prix` INT(5) NOT NULL,
		PRIMARY KEY (`dateB`) USING BTREE
		) COLLATE='utf8_general_ci'
		ENGINE=InnoDB";

	$conn = mysqli_connect ($hostname, $username, $password, $database); 
	if ($conn) {
		$req1 = mysqli_query($conn, $query1) ;
		$req2 = mysqli_query($conn, $query2) ;

		$req0 = mysqli_query($conn, $query0) ;
		
		if (mysqli_error($conn)) {
			echo mysqli_error($conn);
			echo '<BR>Start by adding a season with the button "add"<BR><BR><BR>';
		}
		mysqli_close($conn);

		while($data = mysqli_fetch_row($req0)){
			$obj_saison[] = [
						'saison'=> $data[0] ,
						'prix' => $data[1],
						];
		}
		$bouton_hidden = '';
		if($obj_saison){
			$nombre_saison = count($obj_saison);
		} else {
			$table_vide = 'commencez par créer une saison<BR>avec le bouton "ajouter"<BR>';
			$bouton_hidden = ' hidden'; // cache le bouton enregistrer si bdd vide
		}
		$tarif_hidden = '';
	}
	else {
		$nombre_saison = 0;
		$tarif_hidden = ' hidden'; // cache le cadre tarif si pas de BDD
		// die("Connection failed: " . mysqli_connect_error());
	}

?>

<div class="ensemble">
	<div class="boutons_radio">
		<form name="form1" method="post" action="reglage_write_setting.php" >
			<span><?php echo sett_title; ?></span>
			<div class="radio_chauffage">
				<input type="radio" name="zone_chauffage" value="zone1" <?php echo ($zone_chauffage == "zone1") ? 'checked' : '';?> > <?php echo sett_heat; ?> 1<BR>
				<input type="radio" name="zone_chauffage" value="zone2" <?php echo ($zone_chauffage == "zone2") ? 'checked' : '';?> > <?php echo sett_heat; ?> 2<BR>
				<input type="radio" name="zone_chauffage" value="zone3" <?php echo ($zone_chauffage == "zone3") ? 'checked' : '';?> > <?php echo sett_heat; ?> 3<BR>
			</div>
			<div class="radio_ECS">
				<input type="radio" name="zone_ecs" value="ballon1" <?php echo ($zone_ecs == "ballon1") ? 'checked' : '';?> > <?php echo text_temp_tank; ?> 1<BR>
				<input type="radio" name="zone_ecs" value="ballon2" <?php echo ($zone_ecs == "ballon2") ? 'checked' : '';?> > <?php echo text_temp_tank; ?> 2<BR>
				<input type="radio" name="zone_ecs" value="ballon3" <?php echo ($zone_ecs == "ballon3") ? 'checked' : '';?> > <?php echo text_temp_tank; ?> 3<BR>
			</div>
			<div class="radio_MODE">
				<input type="radio" name="zone_mode_chauffage" value="modeChauffageA" <?php echo ($zone_mode_chauffage == "modeChauffageA") ? 'checked' : '';?> > Zone FR35 A<BR>
				<input type="radio" name="zone_mode_chauffage" value="modeChauffage1" <?php echo ($zone_mode_chauffage == "modeChauffage1") ? 'checked' : '';?> > Zone FR35 1<BR>
				<input type="radio" name="zone_mode_chauffage" value="modeChauffage2" <?php echo ($zone_mode_chauffage == "modeChauffage2") ? 'checked' : '';?> > Zone FR35 2<BR>
				<input type="radio" name="zone_mode_chauffage" value="modeChauffage3" <?php echo ($zone_mode_chauffage == "modeChauffage3") ? 'checked' : '';?> > Zone FR35 3<BR>
				<input type="radio" name="zone_mode_chauffage" value="modeChauffage4" <?php echo ($zone_mode_chauffage == "modeChauffage4") ? 'checked' : '';?> > Zone FR35 4<BR>
				<input type="radio" name="zone_mode_chauffage" value="modeChauffage5" <?php echo ($zone_mode_chauffage == "modeChauffage5") ? 'checked' : '';?> > Zone FR35 5<BR>
				<input type="radio" name="zone_mode_chauffage" value="modeChauffage6" <?php echo ($zone_mode_chauffage == "modeChauffage6") ? 'checked' : '';?> > Zone FR35 6<BR>
			</div>
			<div class="radio_bouton">
				<input type="submit" value=" <?php echo sett_save; ?> ">
			</div>
		</form>
	</div>
	<div class="tarif<?php echo $tarif_hidden ;?>">
		<?php echo $table_vide ;?> 
		<form class="form_saison_tarif" name="form_tarif" method="post" action="reglage_ajout_tarif.php">
			<table class='TableTarif'>  
				<input name="nombre_saison" type="hidden" value="<?php echo $nombre_saison ;?>">
				<?php for ($i=0 ; $i < $nombre_saison ; $i++){ ?>
				<tr>
					<th>
						<?php echo $obj_saison[$i]['saison'];?> 
						<input name="saison<?php echo $i;?>" type="hidden" value="<?php echo $obj_saison[$i]['saison'];?>"> <!-- valeur invisible utilisé pour l'envoi dans le POST -->
					</th> 
					<th>
						<input name="prix<?php echo $i;?>" id="prix" type="text" value="<?php echo $obj_saison[$i]['prix'];?>" pattern="(([0-9]){1,1})((\.))([0-9]){1,3}" required >
					</th>
				</tr>    
				<?php } ?>
				
			</table>
			<div class="tarif_bouton<?php echo $bouton_hidden ;?>">
				<input type="submit" value=" <?php echo sett_save; ?> " >
			</div>
		</form>
		<div class="onglet" >
			<div class=tabs>
				<div id=tab1> <a href="#tab1"><?php echo sett_add; ?></a>
					<div>
						<form class="form_ajout_saison" method="post" action="reglage_ajout_saison.php">
							<datalist id="list_saison">
								<option value="2015/2016">
								<option value="2016/2017">
								<option value="2017/2018">
								<option value="2018/2019">
								<option value="2019/2020">
								<option value="2020/2021">
								<option value="2021/2022">
								<option value="2022/2023">
								<option value="2023/2024">
								<option value="2024/2025">
								<option value="2025/2026">
								<option value="2026/2027">
								<option value="2027/2028">
							</datalist>
							<label><BR><?php echo sett_addSeas; ?></label>
							<input placeholder="2015/2016" class="text_ajout_saison" name="saison" list="list_saison" type="text" pattern="(([0-9]){4,4})((\/))([0-9]){4,4}" required>
							<input type="submit" value="<?php echo sett_addSeas; ?>">
						</form>
					</div>
				</div>

				<div id=tab2> <a href="#tab2"><?php echo sett_del; ?></a>
					<div>
						<form name="form_delete" method="post" action="reglage_delete_saison.php">
							<table class='TableTarif'>  
								<?php for ($i=0 ; $i < $nombre_saison ; $i++){ ?>
								<tr>
									<th>
										<?php echo $obj_saison[$i]['saison'];?> 
									</th> 
									<td>
										<input type="radio" name="delete" value="<?php echo $obj_saison[$i]['saison'];?>">
									</td>
								</tr>    
								<?php } ?>
							</table>
							<input type="submit" value="<?php echo sett_del; ?>">
						</form>
					</div>
				</div>

				<div id=default2> <a href="#default2"><?php echo sett_info; ?></a>
					<div><BR><BR><?php echo sett_info2; ?><BR><BR><?php echo sett_info3; ?><BR><BR><?php echo sett_info4; ?></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require("footer.php");?>
