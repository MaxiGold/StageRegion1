<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etudiant $etudiant
 */
 $role_user = $this->request->getAttribute("identity") == null ?: $this->request->getAttribute("identity")->role;
?>
<div class="modal-body">
	<div class="modal-header">
        <h4 class="modal-title"><?= __d('etudiant','Detail sur le stagiaire') ?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
	<div class="row">
		<div class="column-responsive">
			<div class="etudiant view detail content">
				<h3> <?= h($etudiant->nom_etu) ?>  <?= h($etudiant->prenom_etu) ?></h3>
				<div class="row nomarge">
					<div class="col-sm-12 col-lg-4">
						<div class="photo-profil">
						<?php
							echo $this->Html->image("stagiaires/" .  $etudiant->photo_etu, [
								"alt" => "Photo de profil", 
								"class" => "rounded " ,
								"width" => "300px",
								"height" => "300px",
								"id" => "apercu",
							]); 
						?>
						</div>
					</div>
					<div class="col-sm-12 col-lg-7 offset-1">
						<table>
							<tr>
								<th><?= __d('etudiant','Email') ?></th>
								<td class="between"> : </td>
								<td><?= h($etudiant->email_etu) ?></td>
							</tr>
						
							<tr>
								<th><?= __d('etudiant','CIN') ?></th>
								<td class="between"> : </td>
								<td><?= h($etudiant->cin_etu) ?></td>
							</tr>
							<tr>
								<th><?= __d('etudiant','Téléphone') ?></th>
								<td class="between"> : </td>
								<td><?= h($etudiant->tel_etu) ?></td>
							</tr>
							
							<tr>
								<th><?= __d('etudiant','Adresse') ?></th>
								<td class="between"> : </td>
								<td><?= h($etudiant->adresse_etu) ?></td>
							</tr>
				
							<tr>
								<th><?= __d('etudiant','Sexe') ?></th>
								<td class="between"> : </td>
								<td><?= h($etudiant->sexe_etu) ?></td>
							</tr>
							<tr>
								<th><?= __d('etudiant','Nationalité') ?></th>
								<td class="between"> : </td>
								<td><?= h($etudiant->nationalite_etu) ?></td>
							</tr>
						
							<tr>
								<th><?= __d('etudiant','Date de naissance') ?></th>
								<td class="between"> : </td>
								<td><?= h($etudiant->date_naiss) ?></td>
							</tr>
							<tr>
								<th><?= __d('etudiant','Etablissement d\'origine') ?></th>
								<td class="between"> : </td>
								<td><?= h($etudiant->etabli_etu) ?></td>
							</tr>
							<tr>
								<th><?= __d('etudiant','Filières & Parcours') ?></th>
								<td class="between"> : </td>
								<td><?= h($etudiant->parcours_etu) ?></td>
							</tr>
							<tr>
								<th><?= __d('etudiant','Niveau') ?></th>
								<td class="between"> : </td>
								<td><?= h($etudiant->niveau_etu) ?></td>
							</tr>
							
							<tr>
								<th><?= __d('etudiant','Encadreur') ?></th>
								<td class="between"> : </td>
								<td><?= $etudiant->has('personnel') ? $this->Html->link($etudiant->personnel->nom_pers, ['controller' => 'Personnel', 'action' => 'view', $etudiant->personnel->id_pers]) : '' ?></td>
							</tr>
							<tr>
								<th><?= __d('etudiant','Thème') ?></th>
								<td class="between"> : </td>
								<td><?= $etudiant->has('stage') ? $this->Html->link($etudiant->stage->theme_stage, ['controller' => 'Stage', 'action' => 'view', $etudiant->stage->id_stage]) : '' ?></td>
							</tr>
							<tr>
								<th><?= __d('etudiant','Note') ?></th>
								<td class="between"> : </td>
								<td><?= $etudiant->has('stage') ? $etudiant->stage->note_stage : '' ?></td>
							</tr>
							<tr>
								<th><?= __d('etudiant','Date de confirmation') ?></th>
								<td class="between"> : </td>
								<td><?= h($etudiant->date_conf) ?></td>
							</tr>
							<tr>
								<th><?= __d('etudiant','Est Confirmé') ?></th>
								<td class="between"> : </td>
								<td><?= $etudiant->options_conf ? __d('etudiant','Yes') : __d('etudiant','No'); ?></td>
							</tr>			
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-form-name="" data-bs-dismiss="modal"><?= __("Back") ?></button>
	<?php if(!$etudiant->options_conf && $this->Profile->estDirigeant($role_user)): ?>
	<?= $this->Form->create($etudiant, ['type' => 'file']) ?>  
		<button type="submit" class="btn btn-success" data-form-name="" data-bs-dismiss="modal"><?= __d('etudiant','Confirmer la demande') ?></button>
	<?= $this->Form->end() ?>
	<?php endif; ?>	
</div>
