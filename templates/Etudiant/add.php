<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etudiant $etudiant
 * @var \Cake\Collection\CollectionInterface|string[] $personnel
 * @var \Cake\Collection\CollectionInterface|string[] $stage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __d('etudiant','Etudiant') ?></h4>
            <?= $this->Html->link(__d('etudiant','List Etudiant'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="etudiant form content">
            <?= $this->Form->create($etudiant, ['type' => 'file']) ?>
            <fieldset class="row nomarge">
				<legend><?= __d('etudiant','Add Etudiant') ?></legend>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('id_pers', ['options' => $personnel, 'empty' => true, 'label' => __d('etudiant','Encadreur')]);?></div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('id_stage', ['options' => $stage, 'empty' => true, 'label' => __d('etudiant','Thème')]);?></div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('nom_etu', ['label' => __d('etudiant','Nom')]);?></div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('prenom_etu', ['label' => __d('etudiant','Prénom')]);?></div>
			</fieldset>
			<fieldset class="row nomarge">
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('etabli_etu', ['label' => __d('etudiant','Etablissement d\'origine')]);?></div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('parcours_etu', ['label' => __d('etudiant','Filières & Parcours')]);?></div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('niveau_etu', ['label' => __d('etudiant','Niveau')]);?></div>
			</fieldset>
			<fieldset class="row nomarge">
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('date_naiss', ['empty' => true, 'label' => __d('etudiant','Date de naissance')]);?></div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"> <?= $this->Form->control('cin_etu', ['type' => 'number', 'max-length'  => 12, 'label' => __d('etudiant','CIN')]);?></div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('tel_etu', ['type' => 'number', 'label' => __d('etudiant','Téléphone')]);?></div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('email_etu', ['type' => 'email', 'label' => __d('etudiant','Email')]);?></div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('adresse_etu', ['label' => __d('etudiant','Adresse')]);?></div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('sexe_etu', ['options' => ['Masculin' => 'Masculin', 'Féminin' => 'Féminin'], 'label' => __d('etudiant','Sexe')]);?></div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('nationalite_etu', ['options' => ['Malagasy' => 'Malagasy', 'Etranger' => 'Etranger'], 'label' => __d('etudiant','Nationalité')]);?></div>
			</fieldset>
			 <fieldset class="row nomarge">
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3"><?= $this->Form->control('image', ['type' => 'file', 'label' => __d('profil','Photo de Stagiaire'), 'accept' => 'image/*' , 'capture' => 'capture']); ?></div>
            </fieldset>
			<fieldset class="row nomarge">
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3">
					<?= $this->Form->button(__d('etudiant','Submit')) ?>
				</div>
			</fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
	$('select').val('');
});
</script>