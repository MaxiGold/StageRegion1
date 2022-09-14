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
	<div class="modal" id="deleteModal">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-body">Suppression..</div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-form-name="" data-bs-dismiss="modal"><?= __("Back") ?></button>
			<button type="button" class="btn btn-danger" data-form-name="" data-bs-dismiss="modal"><?= __d('personnel','Delete') ?></button>
		  </div>
		</div>
	  </div>
	</div>
	<div class="modal" id="viewModal">
	  <div class="modal-dialog modal-lg">
		
		<div class="modal-content">Chargement..</div>
	  </div>
	</div>
</footer>