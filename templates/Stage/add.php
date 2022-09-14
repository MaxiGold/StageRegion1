<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stage $stage
 * @var \Cake\Collection\CollectionInterface|string[] $personnel
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __d('stage','Stage') ?></h4>
            <?= $this->Html->link(__d('stage','List Stage'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stage form content">
            <?= $this->Form->create($stage) ?>
            <fieldset class="row nomarge">
                <legend><?= __d('stage','Add Stage') ?></legend>
				<div class="col-sm-12 col-lg-9 ">
                <?php
                    echo $this->Form->control('id_pers', ['options' => $personnel, 'empty' => true, 'label' => __d('stage','Encadreur')]);
                    echo $this->Form->control('theme_stage', ['label' => __d('stage','Thème')]);
                    echo $this->Form->control('date_debut', ['empty' => true, 'label' => __d('stage','Date du début')]);
                    echo $this->Form->control('date_fin', ['empty' => true, 'label' => __d('stage','Date de fin')]);
                    echo $this->Form->control('finition_theme', ['label' => __d('stage','Términé')]);
                    echo $this->Form->control('remis_livre', ['label' => __d('stage','Rapport de stage reçu')]);
                    echo $this->Form->control('note_stage', ['label' => __d('stage','Note')]);
                ?>
				 </div>
            </fieldset>
            <?= $this->Form->button(__d('stage','Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
