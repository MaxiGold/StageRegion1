<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etudiant $etudiant
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __d('etudiant','Etudiant') ?></h4>
            <?= $this->Html->link(__d('etudiant','List Etudiant'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="etudiant view content">
            <h3><?= h($etudiant->nom_etu) ?></h3>
			<div class="row nomarge">
				<div class="col-sm-12 col-lg-4 ">
					<div class="photo-profil">
					<?php
						echo $this->Html->image("stagiaires/" .  $etudiant->photo_etu, [
							"alt" => "Photo de profil", 
							"class" => "rounded " ,
							"width" => "200px",
							"height" => "200px",
							"id" => "apercu",
						]); 

					?>
					</div>
				</div>
				<div class="col-sm-12 col-lg-8 ">
					<table>
						<tr>
							<th><?= __d('etudiant','Encadreur') ?></th>
							<td><?= $etudiant->has('personnel') ? $this->Html->link($etudiant->personnel->nom_pers, ['controller' => 'Personnel', 'action' => 'view', $etudiant->personnel->id_pers]) : '' ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Thème') ?></th>
							<td><?= $etudiant->has('stage') ? $this->Html->link($etudiant->stage->theme_stage, ['controller' => 'Stage', 'action' => 'view', $etudiant->stage->id_stage]) : '' ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Nom') ?></th>
							<td><?= h($etudiant->nom_etu) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Prénom') ?></th>
							<td><?= h($etudiant->prenom_etu) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','CIN') ?></th>
							<td><?= h($etudiant->cin_etu) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Téléphone') ?></th>
							<td><?= h($etudiant->tel_etu) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Email') ?></th>
							<td><?= h($etudiant->email_etu) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Adresse') ?></th>
							<td><?= h($etudiant->adresse_etu) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Sexe') ?></th>
							<td><?= h($etudiant->sexe_etu) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Nationalité') ?></th>
							<td><?= h($etudiant->nationalite_etu) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Etablissement d\'origine') ?></th>
							<td><?= h($etudiant->etabli_etu) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Filières & Parcours') ?></th>
							<td><?= h($etudiant->parcours_etu) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Niveau') ?></th>
							<td><?= h($etudiant->niveau_etu) ?></td>
						</tr>
			
						<tr>
							<th><?= __d('etudiant','Date de naissance') ?></th>
							<td><?= h($etudiant->date_naiss) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Date de confirmation') ?></th>
							<td><?= h($etudiant->date_conf) ?></td>
						</tr>
						<tr>
							<th><?= __d('etudiant','Est Confirmé') ?></th>
							<td><?= $etudiant->options_conf ? __d('etudiant','Yes') : __d('etudiant','No'); ?></td>
						</tr>
					</table>
				</div>
				
			</div>
        </div>
    </div>
</div>
