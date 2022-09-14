<?php if($isConnected): ?>
<div class="offcanvas offcanvas-end" id="profile">
	<div class="offcanvas-header">
		<h4 class="offcanvas-title">Information Profil</h4>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
	</div>
	<div class="offcanvas-body text-center">
		<?= $this->Html->image('profils/' . $this->request->getSession()->read('Auth')->photo, ['alt'=>"Photo de profil", "width" =>"200px"]); ?>
		<div class="users form">
			</br>
			<p><?= __d('roles', $this->request->getSession()->read('Auth')->role); ?></p>
			<p><?= $this->request->getSession()->read('Auth')->name; ?></p>
			<p><?= $this->request->getSession()->read('Auth')->email; ?></p>
		</div>
		<?= $this->Html->link(__d('global','Modifier Profil'), ['controller' => 'Users','action' => 'profil', 'class' => 'dropdown-item']); ?>
	</div>
</div>
<?php endif; ?>	