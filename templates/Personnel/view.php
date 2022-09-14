<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personnel $personnel
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __d('personnel','Personnel') ?></h4>
            <?= $this->Html->link(__d('personnel','List Personnel'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="personnel view content">
            <h3><?= h($personnel->nom_pers) ?></h3>
            <table>
                <tr>
                    <th><?= __d('personnel','Departement') ?></th>
                    <td><?= $personnel->has('departement') ? $this->Html->link($personnel->departement->nom_depart, ['controller' => 'Departement', 'action' => 'view', $personnel->departement->id_depart]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __d('personnel','Nom') ?></th>
                    <td><?= h($personnel->nom_pers) ?></td>
                </tr>
                <tr>
                    <th><?= __d('personnel','Prénom') ?></th>
                    <td><?= h($personnel->prenom_pers) ?></td>
                </tr>
                <tr>
                    <th><?= __d('personnel','Téléphone') ?></th>
                    <td><?= h($personnel->tel_pers) ?></td>
                </tr>
                <tr>
                    <th><?= __d('personnel','Adresse') ?></th>
                    <td><?= h($personnel->adresse_pers) ?></td>
                </tr>
                <tr>
                    <th><?= __d('personnel','Email') ?></th>
                    <td><?= h($personnel->email_pers) ?></td>
                </tr>
                <tr>
                    <th><?= __d('personnel','Id') ?></th>
                    <td><?= $this->Number->format($personnel->id_pers) ?></td>
                </tr>
                <tr>
                    <th><?= __d('personnel','Est Encadrant') ?></th>
                    <td><?= $personnel->pers_encad ? __d('personnel','Yes') : __d('personnel','No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
