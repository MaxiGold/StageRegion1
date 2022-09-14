<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __d('users','Users') ?></h4>
            <?= $this->Html->link(__d('users','List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->email) ?></h3>
           
			<div class="row nomarge">
				<div class="col-sm-12 col-lg-4 ">
				<?php
						echo $this->Html->image("profils/" .  $user->photo, [
							"alt" => "Photo Profil", 
							"class" => "rounded " ,
							"width" => "200px",
							"height" => "200px",
							"id" => "apercu",
						]); 
				?>		
				</div>
				<div class="col-sm-12 col-lg-8 ">
					 <table>
						<tr>
							<th><?= __d('users','Personnel') ?></th>
							<td><?= $user->has('personnel') ? $this->Html->link($user->personnel->nom_pers, ['controller' => 'Personnel', 'action' => 'view', $user->personnel->id_pers]) : '' ?></td>
						</tr>
						<tr>
							<th><?= __d('users','Name') ?></th>
							<td><?= h($user->name) ?></td>
						</tr>
						<tr>
							<th><?= __d('users','Email') ?></th>
							<td><?= h($user->email) ?></td>
						</tr>
						<tr>
							<th><?= __d('users','Role') ?></th>
							<td><?= h($user->role) ?></td>
						</tr>
						<tr>
							<th><?= __d('users','Id') ?></th>
							<td><?= $this->Number->format($user->id) ?></td>
						</tr>
						<tr>
							<th><?= __d('users','Created') ?></th>
							<td><?= h($user->created) ?></td>
						</tr>
						<tr>
							<th><?= __d('users','Modified') ?></th>
							<td><?= h($user->modified) ?></td>
						</tr>
					</table>
				</div>
				
			</div>
        </div>
    </div>
</div>
