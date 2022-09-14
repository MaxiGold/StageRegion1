<header>
	<div class="row nomarge">
		<div class="col-5">
			<div class="logo">
				<a href="/"><?= $this->Html->image('logo-republic.png', ['alt'=>"logo de le republic"]); ?></a>
				<p class="republic">REPOBLIKAN'I MADAGASIKARA</p>
				<p class="devise">Fitiavana - Tanindrazana - Fandrosoana</p>
				<p class="bordure">____________</p>
			</div>
		</div>
		<?= $this->element('menubar', compact('role_user', 'isConnected'));  ?>	
		<?= $this->element('flash/message');  ?>	
	</div>
</header>