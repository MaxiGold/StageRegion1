<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Departement $departement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __d('departement','Departement') ?></h4>
            <?= $this->Html->link(__d('departement','List Departement'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive">
        <div class="departement form content">
            <?= $this->Form->create($departement, ['type' => 'file']) ?>
			<fieldset class="row nomarge">
                <legend><?= __d('departement','Edit Departement') ?></legend>
				<div class="col-sm-12 col-lg-9 ">
					<?php
						echo $this->Form->control('nom_depart', ['label' => __d('departement','Nom')]);
						echo $this->Form->control('fonction_depart', ['label' => __d('departement','Description')]);
						echo $this->Form->control('photo', ['type' => 'file', 'label' => __d('departement','Logo'), 'accept' => 'image/*' , 'capture' => 'capture']); 
					?>
				</div>
				<div class="col-sm-12 col-lg-3 ">
					<?php
						echo $this->Html->image("departements/" .  $departement->logo_depart, [
							"alt" => "Logo Departement", 
							"class" => "rounded " ,
							"width" => "200px",
							"height" => "200px",
							"id" => "apercu",
						]); 
					?>
				</div>
            </fieldset>
			<?= $this->Form->button(__d('departement','Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
