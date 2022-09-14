<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PasserDemande $passerDemande
 * @var \Cake\Collection\CollectionInterface|string[] $personnel
 * @var \Cake\Collection\CollectionInterface|string[] $etudiant
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
        <div class="passerDemande form content">
            <?= $this->Form->create($passerDemande) ?>
           <fieldset class="row nomarge">
                <legend><?= __d('demande','Add Passer Demande') ?></legend>
				<div class="col-sm-12 col-lg-7">
                <?php
                    echo $this->Form->control('id_etu', ['options' => $etudiant, 'label' => __d('demande','Stagiaire')]);
                    echo $this->Form->control('id_pers', ['options' => $personnel, 'label' => __d('demande','Encadreur')]);
                    echo $this->Form->control('date_recept', ['label' => __d('demande','Date de récéption')]);
                ?>
				</div>
				<div class="col-sm-12 col-lg-5">
				<legend><?= __d('demande','Pièce Jointe') ?></legend>
				<?php
                    echo $this->Form->control('cv_etu', ['label' => __d('demande','CV')]);
                    echo $this->Form->control('motiv_etu', ['label' => __d('demande','Lettre de motivation')]);
                    echo $this->Form->control('permis_etu', ['label' => __d('demande','Lettre de permission')]);
                    echo $this->Form->control('observ_etu', ['label' => __d('demande','Observation sur le stagiaire')]);
                ?>
				</div>
            </fieldset>
            <?= $this->Form->button(__d('demande','Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
	$('select').val('');
});
</script>