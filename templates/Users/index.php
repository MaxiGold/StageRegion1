<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__d('users','New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __d('users','Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __d('users','ID') ?></th>
                    <th><?= __d('users','Personnel') ?></th>
                    <th><?= __d('users','Email') ?></th>
                    <th><?= __d('users','Role') ?></th>
                    <th><?= __d('users','created') ?></th>
                    <th><?= __d('users','modified') ?></th>
                    <th class="actions"><?= __d('users','Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= $user->has('personnel') ? $this->Html->link($user->personnel->nom_pers, ['controller' => 'Personnel', 'action' => 'view', $user->personnel->id_pers]) : '' ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= __d('roles', h($user->role)) ?></td>
                    <td><?= h(isset($user->created) ? $user->created->i18nFormat('yyyy-MM-dd') : null) ?></td>
                    <td><?= h(isset($user->modified) ? $user->created->i18nFormat('yyyy-MM-dd') : null) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__d('users','View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__d('users','Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__d('users','Delete'), ['action' => 'delete', $user->id], ['confirm' => __d('users','Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
