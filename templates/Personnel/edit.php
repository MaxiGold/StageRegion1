<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personnel $personnel
 * @var string[]|\Cake\Collection\CollectionInterface $departement
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
        <div class="personnel form content">
            <?= $this->Form->create($personnel) ?>
            <fieldset class="row nomarge">
                <legend><?= __d('personnel','Edit Personnel') ?></legend>
				<div class="col-sm-12 col-lg-9 ">
               <?php
                    echo $this->Form->control('id_departement', ['options' => $departement, 'label' => __d('personnel','Département')]);
                    echo $this->Form->control('nom_pers', ['label' => __d('personnel','Nom')]);
                    echo $this->Form->control('prenom_pers', ['label' => __d('personnel','Prénom')]);
                    echo $this->Form->control('tel_pers', ['label' => __d('personnel','Téléphone')]);
                    echo $this->Form->control('adresse_pers', ['label' => __d('personnel','Adresse')]);
                    echo $this->Form->control('email_pers', ['label' => __d('personnel','Email')]);
                    echo $this->Form->control('pers_encad', ['label' => __d('personnel','Est Encadrant')]);
                ?>
				 </div>
            </fieldset>
            <?= $this->Form->button(__d('personnel','Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
