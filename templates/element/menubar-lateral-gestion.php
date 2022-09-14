<?php if($isAccessiblePages): ?>
	<div class="row nomarge">
		<div class="col-3 menu-bar" id="menu-bar-lateral">
			<ul class="nav">
				<?php foreach($accessiblePages as $controller => $label) : ?>
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
<?php else : ?>
		<?= $this->fetch('content') ?>			
<?php endif; ?>