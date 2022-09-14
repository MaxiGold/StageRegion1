<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etudiant[]|\Cake\Collection\CollectionInterface $etudiant
 */
$role_user = $this->request->getAttribute("identity") == null ?: $this->request->getAttribute("identity")->role;
$isConnected = $this->request->getAttribute("identity") != null;
 	$this->Html->css('rhm-etudiant', ['block' => true]);
?>
<div class="etudiant index content">
	<?php if($this->Profile->estGestonnaire($role_user)): ?>
    <?= $this->Html->link(__d('etudiant','New Etudiant'), ['action' => 'add'], ['class' => 'button float-right']) ?>
	<?php endif; ?>
    <h3><?= __d('etudiant','Etudiant') ?></h3>
	<fieldset class="recherche stagiaire">
		<div class="d-flex">
		  <div class="p-2 flex-fill">
			<label><?= __d('etudiant','Nationalité') ?></label>
			<select name="nationalite" id="nationalite">
				<option value=""></option>
				<option value="Malagasy">Malagasy</option>
				<option value="Etranger">Etranger</option>
			</select>
		  </div>
		  <div class="p-2 flex-fill">
			<?= $this->Form->control('ecole', ['options' => $ecoles, 'empty' => true, 'label' => __d('etudiant','Etablissement'), 'id' => "ecole"]);?>
		  </div>
		   <div class="p-2 flex-fill">
			<?= $this->Form->control('niveau', ['options' => $niveaux, 'empty' => true, 'label' => __d('etudiant','Niveau'), 'id' => "niveau"]);?>
		  </div>
		  <div class="p-2 flex-fill">
			<label><?= __d('etudiant','Sexe') ?></label>
			<select name="sexe" id="sexe" placeholder="">
				<option value=""></option>
				<option value="Masculin">Masculin</option>
				<option value="Féminin">Féminin</option>
			</select>
		  </div>
		</div>
		<div class=" zone-recherche">
			<input type="text" name="zone-recherche" id="zone-recherche" autocomplete='one-time-code' placeholder="<?= __d('etudiant','Faites votre recherche par : nom, prénom, email, téléphone, adresse') ?>">
			<label for="zone-recherche" class="icon"><i class="fas fa-search fa-2x" ></i></label>
		</div>
	</fieldset>
	<div class="row nomarge" id="list-stagiaire">
		<?php echo $this->element('ajax/stagiaire', ['etudiant' => $etudiant]);  ?>	
	</div>
</div>

<script>

const params = new URLSearchParams(window.location.search);
var token = <?= json_encode($this->request->getAttribute('csrfToken')) ?>;
var urlEtudiant = '<?=  env('WEB_FULL_PATH') . 'Etudiant' ;?>';
var filter = params.has('filter') ? params.get('filter') : "";
var linkHref = filter == "" ? "Etudiant" :  "Etudiant?filter=" + filter;

$(document).ready(function(){
	$("#nationalite, #ecole, #niveau, #sexe").on('change', function(){
		rechercher();
	});
	$("#zone-recherche").on('keyup', function(){
		rechercher();
	});
	
	$(".filter").find('a[href$="'+ linkHref +'"]').closest('li').addClass("active");		
});


$("#list-stagiaire").delegate('div.card', 'click', function(){
	<?php if($isConnected && $this->Profile->estGestonnaire($role_user)): ?>
		let cache = $(this).find(".action").hasClass('d-none');
		$('div.card').find(".action").addClass('d-none');
		if(cache)
			$(this).find(".action").removeClass('d-none');
	<?php else: ?>
		$(".modal-content").html("chagrement.....");
		$.ajax({
			url : urlEtudiant + "/detail/" + $(this).attr('data-stagieire-id'), 
			method : 'GET',
			data : {},
			headers : {'X-CSRF-Token' : token}, 
			success : function(result){
				$(".modal-content").html(result);
			}
		});
	<?php endif; ?>
});

var rechercher = function (){
	$.ajax({
		url : urlEtudiant + "/find", 
		method : 'POST',
		data : {
			'nationalite' : $('#nationalite').val(),
			'ecole' : $('#ecole').val(),
			'niveau' : $('#niveau').val(),
			'sexe' : $('#sexe').val(),
			'motcle' : $('#zone-recherche').val(),
			'filter' : filter,
		}, 
		headers : {'X-CSRF-Token' : token}, 
		success : function(result){
			$("#list-stagiaire").html(result);
		}
	});
};


</script>