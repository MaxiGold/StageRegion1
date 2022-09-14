<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $personnel
 */
 $roles = [
	'' => '', 
	'ROLE_PERSONNEL' => env('ROLE_PERSONNEL'),
	'ROLE_GESTIONNAIRE' => env('ROLE_GESTIONNAIRE'), 
	'ROLE_DIRECTION' => env('ROLE_DIRECTION'), 
	'ROLE_DIRECTION_GENERALE' => env('ROLE_DIRECTION_GENERALE'), 
	'ROLE_GOUVERNEUR' => env('ROLE_GOUVERNEUR'), 
	'ROLE_ADMINISTRATION' => env('ROLE_ADMINISTRATION')
];
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __d('users','Users') ?></h4>
            <?= $this->Html->link(__d('users','List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset class="row nomarge">
                <legend><?= __d('users','Edit User') ?></legend>
				<div class="col-sm-12 col-lg-9 ">
                <?php
                    echo $this->Form->control('id_pers', ['options' => $personnel, 'empty' => true, 'label' => __d('users','Personnel')]);
                    echo $this->Form->control('name', ['label' => __d('users','Nom')]);
                    echo $this->Form->control('email', ['label' => __d('users','Email')]);
                    echo $this->Form->control('password', ['label' => __d('users','Mot de passe'), 'autocomplete' => 'one-time-code']);
                    echo $this->Form->control('role', ['options' =>  $roles, 'label' => __d('users','Rôle')]);
                ?>
				 </div>
            </fieldset>
            <?= $this->Form->button(__d('users','Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
