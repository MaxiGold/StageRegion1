<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personnel[]|\Cake\Collection\CollectionInterface $personnel
 */
?>
<div class="personnel index content">
    <?= $this->Html->link(__d('personnel','Nouveau Personnel'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __d('personnel','Personnel') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __d('personnel','ID') ?></th>
                    <th><?= __d('personnel','Département') ?></th>
                    <th><?= __d('personnel','Nom') ?></th>
                    <th><?= __d('personnel','Prénom') ?></th>
                    <th><?= __d('personnel','Email') ?></th>
                    <th class="actions"><?= __d('personnel','Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personnel as $personnel): ?>
                <tr>
                    <td><?= $this->Number->format($personnel->id_pers) ?></td>
                    <td><?= $personnel->has('departement') ? $this->Html->link($personnel->departement->nom_depart, ['controller' => 'Departement', 'action' => 'view', $personnel->departement->id_depart]) : '' ?></td>
                    <td><?= h($personnel->nom_pers) ?></td>
                    <td><?= h($personnel->prenom_pers) ?></td>
                    <td><?= h($personnel->email_pers) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__d('personnel','View'), ['action' => 'view', $personnel->id_pers]) ?>
                        <?= $this->Html->link(__d('personnel','Edit'), ['action' => 'edit', $personnel->id_pers]) ?>
                        <?= $this->Form->postLink(__d('personnel','Delete'), ['action' => 'delete', $personnel->id_pers], ['confirm' => __d('personnel','Are you sure you want to delete # {0}?', $personnel->id_pers)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
