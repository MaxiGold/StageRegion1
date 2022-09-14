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
$accessiblePages = $this->MenuLateral->getAccessiblePages($role_user);  
$stagiaireMenus = $this->MenuLateral->getStagiaireMenus($role_user);  
$isAccessiblePages = $this->MenuLateral->isAccessiblePages($accessiblePages, $this->name, $this->request->getParam('action')); 

?>
<main class="main">
<?php if($isAccessiblePages): ?>
	<div class="row nomarge">
		<div class="col-3 menu-bar menu-bar-lateral">
			<?php if($this->Profile->estGestonnaire($role_user)): ?>
			<ul class="nav">
				<?php foreach($accessiblePages as $controller => $label) : ?>
				<li>
					<?= $this->Html->link($label, ['controller' => $controller, "action" => "/"]); ?>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php elseif($this->Profile->estDirecteur($role_user)): ?>
			<ul class="nav filter">
				<?php foreach($stagiaireMenus as $url => $label) : ?>
				<li>
					<a href="<?= $url; ?>"><?= $label; ?></a>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
		<div class="col-8 container-gestion">
			<?= $this->fetch('content') ?>			
		</div>
	</div>
<?php else : ?>
		<?= $this->fetch('content') ?>			
<?php endif; ?>
 </main>