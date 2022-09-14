<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PasserDemande[]|\Cake\Collection\CollectionInterface $passerDemande
 */
?>
<div class="passerDemande index content">
    <?= $this->Html->link(__d('demande','New Passer Demande'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __d('demande','Passer Demande') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __d('demande','ID') ?></th>
                    <th><?= __d('demande','Stagiaire') ?></th>
                    <th><?= __d('demande','Encadreur') ?></th>
                    <th><?= __d('demande','Date de récéption') ?></th>
                    <th class="actions"><?= __d('demande','Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($passerDemande as $passerDemande): ?>
                <tr>
                    <td><?= $this->Number->format($passerDemande->id_passe) ?></td>
                    <td><?= $passerDemande->has('etudiant') ? $this->Html->link($passerDemande->etudiant->nom_etu, ['controller' => 'Etudiant', 'action' => 'view', $passerDemande->etudiant->id_etudiant]) : '' ?></td>
                    <td><?= $passerDemande->has('personnel') ? $this->Html->link($passerDemande->personnel->nom_pers, ['controller' => 'Personnel', 'action' => 'view', $passerDemande->personnel->id_pers]) : '' ?></td>
					<td><?= h(isset($passerDemande->date_recept) ? $passerDemande->date_recept->i18nFormat('yyyy-MM-dd') : null) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__d('demande','View'), ['action' => 'view', $passerDemande->id_passe]) ?>
                        <?= $this->Html->link(__d('demande','Edit'), ['action' => 'edit', $passerDemande->id_passe]) ?>
                        <?= $this->Form->postLink(__d('demande','Delete'), ['action' => 'delete', $passerDemande->id_passe], ['confirm' => __d('demande','Are you sure you want to delete # {0}?', $passerDemande->id_passe)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
