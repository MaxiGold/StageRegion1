<?php
	$this->assign('title', "A propos");
	$this->Html->css('rhm-about', ['block' => true]);

?>
	<div class="container" id="container2">
		<div class="container" id="content3">
			<?= $this->Html->image('logo-region.png', ['alt' => "Photo", 'id' => "rhm"]); ?>
			<p id="titre">"Zay soa tao ro mavoatsa"</p>
			<div id="contenue">
				<p>La <b>Région Haute MATSIATRA</b> est l’une des 23 Régions de Madagascar, qui a été mise en place d’après la loi <b>2004-001 du 26 Juin 2014</b> relative aux régions et celle du décret <b>2007-531 du 11 juin 2007</b>.</p>
				<p>Elle est située dans le Sud de l’Île, délimitée par la Région Amoron’Imania au Nord, la Région Ihorombe au Sud, Vatovavy et Fitovavinany à l’Est et la Région Atsimo Andrefana et Menabe à l’Ouest.</p>
				<p>Son siège social se trouve à Tsianolondroa, au-près de l’Hôtel de ville de Fianarantsoa et à côté de la BOA. C’est pour cela qu’elle est dénommée Haute Matsiatra.</p>
				<p>La Région Haute Matsiatra est composée de sept (07) districts à savoir : <i>Ambalavao, Ambohimasoa, Fianarantsoa, Ikalamavony, Isandra, Lalangina, Vohibato</i>. Ces districts contiennent quatre-vingt-onze (91) Communes dont trois (03) urbaines et quatre-vingt-huit (88) rurales.</p>
				<p>Et sa superficie est environ 23.000km2</p>
			</div>
		</div>
	</div>
	<div id="container3" class="container">
		<div id="content4" class="container"><p style="color: white;"><strong>Contact Développeur</strong></p></div>
		<div id="content5" class="container">
			<div class="container" id="content7">
				<?= $this->Html->image('assets/creator-maxi.png', ['alt' => "Photo", 'id' => "profil"]); ?>
				<p id="desc"><strong>Maxi Rambao</strong></p>
				<p id="desc">Développeur Fullstack</p>
				
			</div>
			<div class="container" id="content8">
				<?= $this->Html->image('assets/creator-ralf.png', ['alt' => "Photo", 'id' => "profil"]); ?>
				<p id="desc"><strong>Ralf Lionel</strong></p>
				<p id="desc">Développeur Fullstack</p>
			</div>
		</div>
		<div id="content6" class="container">
			<div class="container" id="content9">
				<?= $this->Html->link( $this->Html->image('assets/contact-facebook.png', ['alt' => "contact-facebook", 'id' => "link"]),
					"http://www.facebook.com/maximillian", ['escape' => false, "target" => "_blank"]); ?>
				<?= $this->Html->link( $this->Html->image('assets/contact-instagram.png', ['alt' => "contact-instagram", 'id' => "link"]),
					"http://www.instagram.com/maximilian", ['escape' => false, "target" => "_blank"]); ?>
				<?= $this->Html->link( $this->Html->image('assets/contact-linkedin.png', ['alt' => "contact-linkedin", 'id' => "link"]),
					"http://www.linkedin.com/maximillian", ['escape' => false, "target" => "_blank"]); ?>	
			</div>
			<div class="container" id="content10">
				<?= $this->Html->link( $this->Html->image('assets/contact-facebook.png', ['alt' => "contact-facebook", 'id' => "link"]),
					"http://www.facebook.com/ralph", ['escape' => false, "target" => "_blank"]); ?>
				<?= $this->Html->link( $this->Html->image('assets/contact-instagram.png', ['alt' => "contact-instagram", 'id' => "link"]),
					"http://www.instagram.com/ralph", ['escape' => false, "target" => "_blank"]); ?>
				<?= $this->Html->link( $this->Html->image('assets/contact-linkedin.png', ['alt' => "contact-linkedin", 'id' => "link"]),
					"http://www.linkedin.com/ralph", ['escape' => false, "target" => "_blank"]); ?>	
			</div>
		</div>
	</div>
	<div class="d-none">
		
	</div>
