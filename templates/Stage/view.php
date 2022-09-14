<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stage $stage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
           <h3><?= __d('stage','Stage') ?></h3>
			<?= $this->Html->link(__d('stage','List Stage'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stage view content">
            <h3><?= h($stage->theme_stage) ?></h3>
            <table>
                <tr>
                    <th><?= __d('stage','Encadreur') ?></th>
                    <td><?= $stage->has('personnel') ? $this->Html->link($stage->personnel->nom_pers, ['controller' => 'Personnel', 'action' => 'view', $stage->personnel->id_pers]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __d('stage','Thème') ?></th>
                    <td><?= h($stage->theme_stage) ?></td>
                </tr>
                <tr>
                    <th><?= __d('stage','Note') ?></th>
                    <td><?= h($stage->note_stage) ?></td>
                </tr>
                <tr>
                    <th><?= __d('stage','Id') ?></th>
                    <td><?= $this->Number->format($stage->id_stage) ?></td>
                </tr>
                <tr>
                    <th><?= __d('stage','Date du début') ?></th>
                    <td><?= h($stage->date_debut) ?></td>
                </tr>
                <tr>
                    <th><?= __d('stage','Date de fin') ?></th>
                    <td><?= h($stage->date_fin) ?></td>
                </tr>
                <tr>
                    <th><?= __d('stage','Términé') ?></th>
                    <td><?= $stage->finition_theme ? __d('stage','Yes') : __d('stage','No'); ?></td>
                </tr>
                <tr>
                    <th><?= __d('stage','Rapport de stage reçu') ?></th>
                    <td><?= $stage->remis_livre ? __d('stage','Yes') : __d('stage','No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
