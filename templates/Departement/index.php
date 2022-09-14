<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Departement[]|\Cake\Collection\CollectionInterface $departement
 */


?>
<div class="departement index content">
    <?= $this->Html->link(__d('departement','New Departement'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __d('departement','Departement') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= __d('departement','ID') ?></th>
                    <th><?= __d('departement','Nom') ?></th>
                    <th><?= __d('departement','Description') ?></th>
                    <th class="actions"><?= __d('departement','Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departement as $departement): ?>
                <tr>
                    <td><?= $this->Number->format($departement->id_depart) ?></td>
                    <td><?= h($departement->nom_depart) ?></td>
                    <td><?= h($departement->fonction_depart) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__d('departement','View'), ['action' => 'view', $departement->id_depart]) ?>
                        <?= $this->Html->link(__d('departement','Edit'), ['action' => 'edit', $departement->id_depart]) ?>
                        <?= $this->Form->postLink(__d('departement','Delete'), ['action' => 'delete', $departement->id_depart], ['confirm' => __d('departement','Are you sure you want to delete # {0}?', $departement->id_depart)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
	
</div>
<script>

</script>