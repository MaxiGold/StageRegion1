<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PasserDemande $passerDemande
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __d('demande','Passer Demande') ?></h4>
            <?= $this->Html->link(__d('demande','List Passer Demande'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="passerDemande view content">
            <h3><?= h($passerDemande->id_passe) ?></h3>
            <table>
                <tr>
                    <th><?= __d('demande','Stagiaire') ?></th>
                    <td><?= $passerDemande->has('etudiant') ? $this->Html->link($passerDemande->etudiant->nom_etu, ['controller' => 'Etudiant', 'action' => 'view', $passerDemande->etudiant->id_etudiant]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __d('demande','Encadreur') ?></th>
                    <td><?= $passerDemande->has('personnel') ? $this->Html->link($passerDemande->personnel->nom_pers, ['controller' => 'Personnel', 'action' => 'view', $passerDemande->personnel->id_pers]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __d('demande','ID') ?></th>
                    <td><?= $this->Number->format($passerDemande->id_passe) ?></td>
                </tr>
                <tr>
                    <th><?= __d('demande','Date de récéption') ?></th>
                    <td><?= h($passerDemande->date_recept) ?></td>
                </tr>
                <tr>
                    <th><?= __d('demande','CV') ?></th>
                    <td><?= $passerDemande->cv_etu ? __d('demande','Yes') : __d('demande','No'); ?></td>
                </tr>
                <tr>
                    <th><?= __d('demande','Lettre de motivation') ?></th>
                    <td><?= $passerDemande->motiv_etu ? __d('demande','Yes') : __d('demande','No'); ?></td>
                </tr>
                <tr>
                    <th><?= __d('demande','Lettre de permission') ?></th>
                    <td><?= $passerDemande->permis_etu ? __d('demande','Yes') : __d('demande','No'); ?></td>
                </tr>
                <tr>
                    <th><?= __d('demande','Observation sur le stagiaire') ?></th>
                    <td><?= $passerDemande->observ_etu ? __d('demande','Yes') : __d('demande','No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
