<?php 
$role_user = $this->request->getAttribute("identity") == null ?: $this->request->getAttribute("identity")->role;
?>	

<?php foreach ($etudiant as $etudiant): ?>	
<?php 
	$modaltrigger = $this->Profile->estDirecteur($role_user) ? 'data-bs-toggle="modal" data-bs-target="#viewModal" data-stagieire-id="'. h($etudiant->id_etudiant) .'"' : "";
?>		
<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3">
	<div class="card <?= !$etudiant->options_conf ? 'jaune' : 'blanc' ?>" <?= $modaltrigger ?>>
	<?php
		echo $this->Html->image("stagiaires/" .  $etudiant->photo_etu, [
			"alt" => "Photo de profil", 
			"class" => "rounded " ,
			"id" => "apercu",
		]); 
	?>
	  <div class="card-body">
		<h5 class="card-title"><?= h($etudiant->prenom_etu) ?></h5>
		<h6 class="card-title"><?= h($etudiant->nom_etu) ?></h6>
		<p class="card-text">
		<ul>
			<li><?= h($etudiant->email_etu) ?></li>
			<li><?= h($etudiant->tel_etu) ?></li>
			<li><?= h($etudiant->parcours_etu) ?></li>
		</ul>
		</p>
		<div class="d-flex justify-content-center action d-none">
		  
		  <?php if($this->Profile->estGestonnaire($role_user)): ?>
			  <div class="p-2 bg-info "><?= $this->Html->link(__d('etudiant','View'), ['action' => 'view', $etudiant->id_etudiant]) ?></div>
			  <div class="p-2 bg-primary"><?= $this->Html->link(__d('etudiant','Edit'), ['action' => 'edit', $etudiant->id_etudiant]) ?></div>		  
			  <div class="p-2 bg-danger"><?= $this->Form->postLink(__d('etudiant','Delete'), ['action' => 'delete', $etudiant->id_etudiant], ['confirm' => __d('etudiant','Are you sure you want to delete # {0}?', $etudiant->id_etudiant)]) ?></div>
		  <?php endif; ?>
		</div>

	  </div>
	</div>
</div>
<?php endforeach; ?>