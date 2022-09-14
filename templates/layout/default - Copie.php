<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
 
 // die($this->request->getSession()->read('photo'));
$role_user = $this->request->getAttribute("identity") == null ?: $this->request->getAttribute("identity")->role;
$isConnected = $this->request->getAttribute("identity") != null;

$cakeDescription = 'RHM ';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min', 'datatables.min', 'fontawesome.min', 'regular.min', 'region', 'rhm-formulaire']) ?>
    <?= $this->Html->script(['bootstrap.bundle.min', 'jquery-3.6.0.min', 'datatables.min', 'fontawesome.min', 'regular.min']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
	<main class="main">
		<div class="row nomarge">
			<div class="col-5">
				<div class="logo">
					<a href="/"><?= $this->Html->image('logo-republic.png', ['alt'=>"logo de le republic"]); ?></a>
					<p class="republic">REPOBLIKAN'I MADAGASIKARA</p>
					<p class="devise">Fitiavana - Tanindrazana - Fandrosoana</p>
					<p class="bordure">____________</p>
				</div>
			</div>
			
			<?php echo $this->element('menubar', ['role_user' => $role_user, 'isConnected' => $isConnected, ]);  ?>	
			<?php echo $this->element('flash/message');  ?>	
		</div>
		
		<?php 
			$gestions = [
				'Users' => __d('global','Utilisateur'),
				'Departement' => __d('global','Départements'),
				'Personnel' => __d('global','Personnels'),
				'Etudiant' => __d('global','Stagiaires'),
				'PasserDemande' => __d('global','Demandes'),
				'Stage' => __d('global','Stages'),
				
			];	
			if(!$this->Profile->estAdmin($role_user)){
				unset($gestions['Users']);
			}
			if(!$this->Profile->estGestonnaire($role_user)){
				unset($gestions['Departement']);
				unset($gestions['Personnel']);
				unset($gestions['PasserDemande']);
			}
	
			if((array_key_exists($this->name, $gestions) || in_array( $this->request->getParam('action'), ['rh'])) && !in_array( $this->request->getParam('action'), ['login', 'profil'])): 
		?>
		<div class="row nomarge">
			<div class="col-3 menu-bar" id="menu-bar-lateral">
				<ul class="nav">
					<?php foreach($gestions as $controller => $label) : ?>
					<li class="menu-apropos">
						<?= $this->Html->link($label, ['controller' => $controller, "action" => "/"]); ?>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="col-8 container-gestion">
				<?= $this->fetch('content') ?>			
			</div>
		</div>
		<?php else: ?>
			<div class="">
				<?= $this->fetch('content') ?>
			</div>
		<?php endif; ?>
    </main>
	
	<?php echo $this->element('profil', compact('isConnected'));  ?>	
	
    <footer>
		<?php if($this->request->getParam('action') != 'login'): ?>
			<ul>
				<li> Copyright | 2022 - <?= date("Y") ?> </li>
				<li class="copyright"> &copy; </li>
				<li> <?= __d('global','All Rights Reserved') ?> </li>
			</ul>
		<?php endif; ?>
		<div class="dropdown">
			<?php
				$lang = $this->request->getSession()->check('lang') ? $this->request->getSession()->read('lang') : "fr_FR";
				echo $this->Html->image("flags/$lang.png", [
					"alt" => $lang, 
					"title" => __d('global','La langue utilisé est le Françcais'),
					"class" => "btn rounded-circle dropdown-toggle" ,
					"data-bs-toggle" => "dropdown",
				]); 
			?>
		  <ul class="dropdown-menu">
			<li><a class="dropdown-item" href="/locale/mg_MG"><?= $this->Html->image('flags/mg_MG.png', ['alt'=>"Langue Malgache"]); ?> Malagasy</a></li>
			<li><a class="dropdown-item" href="/locale/fr_FR"><?= $this->Html->image('flags/fr_FR.png', ['alt'=>"Langue Française"]); ?> Français</a></li>
			<li><a class="dropdown-item" href="/locale/en_US"><?= $this->Html->image('flags/en_US.png', ['alt'=>"Langue Anglaise"]); ?> English</a></li>
		  </ul>
		</div>
    </footer>
	<div class="modal" id="deleteModal">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-body">Modal body..</div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-form-name="" data-bs-dismiss="modal"><?= __("Back") ?></button>
			<button type="button" class="btn btn-danger" data-form-name="" data-bs-dismiss="modal"><?= __d('personnel','Delete') ?></button>
		  </div>
		</div>
	  </div>
	</div>
	<?= $this->Html->script(['scripts', 'datatables.langue.js']) ?>
	<?= $this->fetch('script') ?>
	<script>
	$(document).ready(function(){
		var maTable = $(".table").DataTable({
			language : datatableLangue.<?= $lang ?>,
		});
	});
</script>
</body>
</html>
