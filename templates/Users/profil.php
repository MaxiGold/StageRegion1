<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
 	$this->Html->css('rhm-homepage', ['block' => true]);
?>
<div class="row nomarge profile text-center">
<?= $this->Form->create($user,  ['type' => 'file']) ?>
	<h3><?= __d('profil','Profil Information') ?></h3>
	<div class="row">
		<div class="col-4">
			
			<?php
				echo $this->Html->image("profils/" .  $this->request->getSession()->read('photoprofil'), [
					"alt" => "Photo de profil", 
					"class" => "rounded " ,
					"width" => "400px",
					"height" => "400px",
					"id" => "apercu",
				]); 
			?>
			
		</div>
		<div class="col-8 users form">				
			<fieldset class="row nomarge">
				<legend><?= __d('profil','User\'s Informations') ?></legend>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3">
					<?= $this->Form->control('name', ['label' => __d('profil','Nom')]); ?> 
				</div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3">
					<?= $this->Form->control('email', ['label' => __d('profil','Email')]); ?> 
				</div>
			</fieldset>
			<fieldset class="row nomarge">
				<legend><?= __d('profil','Other Informations') ?></legend>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3">
					<?= $this->Form->control('id_pers', ['options' => $personnel, 'empty' => true, 'label' => __d('profil','Personnel')]); ?>
				</div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3">
					<?= $this->Form->control('droit', ['disabled' => 'disabled', 'label' => __d('profil','User Right'), 'value' => __d('roles', h($user->role)) ]); ?> 
				</div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3">
					<?= $this->Form->control('photo', ['type' => 'file', 'label' => __d('profil','Photo de profil'), 'accept' => 'image/*' , 'capture' => 'capture']); ?> 
				</div>
			</fieldset>
			<br/>
			<fieldset class="row nomarge">
				<legend><?= __d('profil','Authentication Parameters') ?></legend>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3">
					<?= $this->Form->control('oldPass', ['type' => 'password', 'autocomplete' => 'one-time-code', 'label' => __d('profil','Old Password')]); ?> 
				</div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3">
					<?= $this->Form->control('newPass', ['type' => 'password', 'autocomplete' => 'one-time-code', 'label' => __d('profil','New Password')]); ?> 
				</div>
				<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3">
					<?= $this->Form->control('confirmPass', ['type' => 'password', 'autocomplete' => 'one-time-code', 'label' => __d('profil','Confirm New Password')]); ?> 
				</div>
									
			</fieldset>
			
		</div>
	</div>
	<div class="row nomarge">
		<div class="col-12">
			<?= $this->Form->button(__d('users','Valider')) ?>
		</div>
	</div>
<?= $this->Form->end() ?>
</div>


