
<?php if($this->request->getParam('action') != 'login'): ?>
<div class="col-7 menu-bar">
	<ul class="nav">
		<li class="menu-accueil">
			<?= $this->Html->link(__d('global', 'Accueil'), ['controller' => '/']); ?>
		</li>
		<li class="menu-apropos">
			<?= $this->Html->link(__d('global','A Propos'), ['controller' => 'Pages', 'action' => 'about']); ?>
		</li>
	
	<?php if($isConnected): ?>
		<li class="menu-ressource">
			<?= $this->Html->link(__d('global','Ressources Humaines'), ['controller' => 'rh']); ?>
		</li>
	<?php endif; ?>	

	<?php if($isConnected && $this->Profile->estSuperutilisateur($role_user)): ?>
		<li class="menu-statistique">
			<?= $this->Html->link(__d('global','Statistiques'), ['controller' => 'Statistics']); ?>
		</li>
	<?php endif; ?>	
	
	<?php if($isConnected): ?>
		<li class="dropdown">
			<?php
				echo $this->Html->image("profils/" . $this->request->getSession()->read('photoprofil'), [
					"alt" => "Photo de profil", 
					"title" => __d('global','Photo de profil'),
					"class" => "btn rounded-circle dropdown-toggle" ,
					"id" => "profilePhoto", 
					"data-bs-toggle" => "dropdown",
				]); 
			?>
		  <ul class="dropdown-menu">
			<li  class="dropdown-item" ><a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#profile"> <?= __d('global','Profil') ?></a></li>
			<li  class="dropdown-item" ><?= $this->Html->link(__d('global','Deconnexion'), ['controller' => 'Users','action' => 'logout', 'class' => 'dropdown-item']); ?></li>
		  </ul>
		</li>
	<?php else : ?>	
		<li  class="menu-login" >
			<?= $this->Html->link( __d('global','Connexion'), ['controller' => 'Users','action' => 'login']); ?>
		</li>
	<?php endif; ?>	
	</ul>
		
</div>
<?php endif; ?>	