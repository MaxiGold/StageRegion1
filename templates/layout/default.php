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
$lang = $this->request->getSession()->check('lang') ? $this->request->getSession()->read('lang') : "fr_FR";

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
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(['bootstrap.min', 'datatables.min', 'fontawesome.min', 'regular.min', 'region', 'rhm-formulaire']);
		echo $this->Html->script(['bootstrap.bundle.min', 'jquery-3.6.0.min', 'datatables.min', 'fontawesome.min', 'fontawesome.regular.min', 'fontawesome.solid.min', 'datatables.langue']);
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body>
	<?php
		echo $this->element('header', compact('role_user', 'isConnected'));  
		echo $this->element('main');
		echo $this->element('footer', compact('lang'));
		echo $this->element('profil', compact('isConnected'));
		echo $this->Html->script(['scripts']);
		echo $this->fetch('script');	
	?>	
	
	<script>
	//var pageAcuelle = '<?= $this->name . "/" . $this->request->getParam('action') ?>';
	var pageAcuelle = '<?= Cake\Utility\Inflector::dasherize($this->name) . "/" . $this->request->getParam('action') ?>';
	$(document).ready(function(){
		var maTable = $(".table").DataTable({
			language : datatableLangue.<?= $lang ?>,
		});
	});
	</script>

</body>
</html>
