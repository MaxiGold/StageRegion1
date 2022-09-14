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
    <div class="column-responsive column-80">
        <div class="departement view content">
            <h3><?= h($departement->nom_depart) ?></h3>
			<div class="row nomarge">
				<div class="col-sm-12 col-lg-4 ">
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
				<div class="col-sm-12 col-lg-8 ">
					<table>
						<tr>
							<th><?= __d('departement','ID') ?></th>
							<td><?= $this->Number->format($departement->id_depart) ?></td>
						</tr>
						<tr>
							<th><?= __d('departement','Nom') ?></th>
							<td><?= h($departement->nom_depart) ?></td>
						</tr>
						<tr>
							<th><?= __d('departement','Description') ?></th>
							<td><?= h($departement->fonction_depart) ?></td>
						</tr>
					</table>
				</div>
				
			</div>
        </div>
    </div>
</div>
