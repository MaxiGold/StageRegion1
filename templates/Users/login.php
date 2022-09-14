<?php
	$this->assign('title', "Connexion");
	$this->Html->css('rhm-login', ['block' => true]);
	
?>
	
<div class="row nomarge login-card">
	<div class="col-12 col-sm-9 col-md-6 col-lg-4  col-xxl-3">
		<div class="card">
			<div class="card-header">
				<img alt="Logo Haute Matsiatra" class="img-fluid rounded-circle" src="img/logo-region.png"/>
			</div>
			<div class="card-body">
				<?= $this->Form->create() ?>
				<fieldset>
					<?= $this->Flash->render() ?>	
					<?= $this->Form->control('email', ['required' => true, "label" => __d('users','Email'), "placeholder" => "Login..."]) ?>
					<?= $this->Form->control('password', ['required' => true, "label" => __d('users','Mot de passe'),  "placeholder" => "Password..."]) ?>
					<?= $this->Form->submit(__d('users','Se connecter')); ?>
				</fieldset>
				<?= $this->Form->end() ?>
			</div>
			<div class="card-footer">
				<img class="img-fluid" src="/assets/fleche.png"/>
				<?= $this->Html->link(__d('users','Se Retour'), ['controller' => '/']); ?>
			</div>
		</div> 
	</div>
</div>	

