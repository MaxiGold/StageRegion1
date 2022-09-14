<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stage[]|\Cake\Collection\CollectionInterface $stage
 */
?>
<div class="stage index content">
    <?= $this->Html->link(__d('stage','New Stage'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __d('stage','Stage') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __d('stage','ID') ?></th>
                    <th><?= __d('stage','Encadreur') ?></th>
                    <th><?= __d('stage','Thème') ?></th>
                    <th><?= __d('stage','Date du début') ?></th>
                    <th><?= __d('stage','Términé') ?></th>
                    <th class="actions"><?= __d('stage','Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stage as $stage): ?>
                <tr>
                    <td><?= $this->Number->format($stage->id_stage) ?></td>
                    <td><?= $stage->has('personnel') ? $this->Html->link($stage->personnel->nom_pers, ['controller' => 'Personnel', 'action' => 'view', $stage->personnel->id_pers]) : '' ?></td>
                    <td><?= h($stage->theme_stage) ?></td>
					<td><?= h(isset($stage->date_debut) ? $stage->date_debut->i18nFormat('yyyy-MM-dd') : null) ?></td>
                    <td><?= h($stage->finition_theme) ? __d('stage','Yes') : __d('stage','No') ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__d('stage','View'), ['action' => 'view', $stage->id_stage]) ?>
                        <?= $this->Html->link(__d('stage','Edit'), ['action' => 'edit', $stage->id_stage]) ?>
                        <?= $this->Form->postLink(__d('stage','Delete'), ['action' => 'delete', $stage->id_stage], ['confirm' => __d('stage','Are you sure you want to delete # {0}?', $stage->id_stage)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
