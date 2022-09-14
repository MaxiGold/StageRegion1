<?php
	$this->assign('title', "Accueil");
	$this->Html->css('rhm-homepage', ['block' => true]);
?>

<div class="container-fluid" id="container2">
	<div class="container-fluid" id="content3">
		<?= $this->Html->image('logo-region.png', ['alt' => "Icône DAGR", 'id' => "logo1"]); ?>
		<p class="h6">Région Haute Matsiatra</p>
		<p>Fianarantsoa, une ville où les habitants sont sociables, aimables !<br/>Peu importe d'où vous venez, où vous allez, les Fianarois vous<br/>accueillerons dans le bon humeur et la joie !</p>
	</div>
	<div class="container-fluid" id="content4"></div>
</div>

<div class="container-fluid" id="container3">
	<?php foreach($departements as $departement) : ?>
	<a href="<?= $this->Url->build(['controller' => 'Etudiant']) . "?dept=" . $departement->nom_depart ?>" id="departement" class="departement-link">
		<?= $this->Html->image('departements/'.$departement->logo_depart, ['alt' => "Icône " . $departement->nom_depart, "class" => "rounded-circle	"]); ?>
		<p id="text"><strong><?= $departement->nom_depart; ?></strong></p>
		<p id="text"><?= $departement->fonction_depart; ?></p>
	</a>
	<?php endforeach; ?>
</div>