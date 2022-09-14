<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
  	$this->Html->css('rhm-graphics', ['block' => true]);
	$this->Html->script(['chart', 'graphics'], ['block' => true]);
	
	$chartHMLabels = array_keys($chartPieHommesFemmes);
	$chartHMValeurs = array_values($chartPieHommesFemmes);
	
	$chartYLabels = array_keys($chartBarAnnees);
	$chartYValeurs = array_values($chartBarAnnees);
	
	$chartYHFLabels = array_keys($chartLineHommesFemmesAnnees['Masculin']);
	$chartYHValeurs = array_values($chartLineHommesFemmesAnnees['Masculin']);
	$chartYFValeurs = array_values($chartLineHommesFemmesAnnees['Féminin']);
	
	
	$nbr = array_sum($chartHMValeurs);
	$chartHMValeurs = array_map(function($i) use ($nbr){
		return round($i * 100 /$nbr, 2 );
	}, $chartHMValeurs);
	
?>
<div class="row nomarge">
	<div class="col-3 menu-bar menu-bar-lateral">
		
	</div>
	<div class="col-9 container-gestion">
		<div class="graphics index content">
			<h3><?= __d('graph','Statistiques') ?></h3>
			<div class="row nomarge">

				<div class="col-sm-12 col-lg-8 chart">
					<canvas id="chart-annees" style="width:100%;height:250px"></canvas>
				</div>
				<div class="col-sm-12 col-lg-4 chart">
					<table>
						<tr>
							<th><?= $chartRecap['nbrTotal'] ?></th>
							<td><?= __d('graph',' demandes de stages' ) ; ?></td>
						</tr>
						<tr>
							<th><?= $chartRecap['nbrFemmes'] +  $chartRecap['nbrHommes'] ?></th>
							<td><?= __d('graph',' demandes de stages accéptées' ) ; ?></td>
						</tr>
						<tr>
							<th><?= $chartRecap['nbrNonConfirme'] ?></th>
							<td><?= __d('graph',' demandes de stages rejétées' ) ; ?></td>
						</tr>
						<tr>
							<th><?= $chartRecap['nbrEtranger'] ?></th>
							<td><?= __d('graph',' stagiaires étrangés' ) ; ?></td>
						</tr>
						<tr>
							<th><?= $chartRecap['nbrHommes'] ?></th>
							<td><?= __d('graph',' stagiaires Hommes' ) ; ?></td>
						</tr>
						<tr>
							<th><?= $chartRecap['nbrFemmes'] ?></th>
							<td><?= __d('graph',' stagiaires Femmes' ) ; ?></td>
						</tr>
					</table>
				</div>
				<div class="col-sm-12 col-lg-8 chart">
					<canvas id="chart-line-annees" style="width:100%;height:250px"></canvas>
					<p>
						<span style="color:#353a6e; margin:0 10px;"> <i class="fas fa-male" ></i> <?= array_sum($chartYHValeurs) ?> Hommes </span>
						<span style="color:#fc66b0; margin:0 10px;"> <i class="fas fa-female" ></i> <?= array_sum($chartYFValeurs) ?> Femmes </span>
					</p>
				</div>
				<div class="col-sm-12 col-lg-4 chart">
					<canvas id="chart-homme-femme" style="width:100%;height:250px"></canvas>
					<p>
						<span style="color:#353a6e; margin:0 10px;"> <i class="fas fa-male" ></i> <?= $chartPieHommesFemmes['Masculin']?> Hommes </span>
						<span style="color:#fc66b0; margin:0 10px;"> <i class="fas fa-female" ></i> <?= $chartPieHommesFemmes['Féminin']?> Femmes </span>
					</p>
				</div>
				

			</div>
		</div>

	</div>
</div>

<?php $this->Html->scriptStart(['block' => true]); ?>

<?php $this->Html->scriptEnd(); ?>



<?php 

	
$this->Html->scriptStart(['block' => true]);

	echo "var colorName = " . json_encode($colorName) . ";\n";
	echo "\n";
	echo "var title = '" . __d('graph','Evolution Stagiaires ') . "';\n";
	echo "var titleHF = '" . __d('graph','Evolution annuelle') . "';\n";
	echo "var xValuesHF = " . json_encode($chartYLabels) . ";\n";
	echo "var yValuesHF = " . json_encode($chartYValeurs) . ";\n";
	echo "chartBarAnnees(xValuesHF, yValuesHF, title);\n";
	echo "\n";
	
	echo "\n";
	echo "var title = '" . __d('graph','Stagiaires Hommes & Femmes '). "';\n";
	echo "var xValuesHF = " . json_encode($chartYHFLabels) . ";\n";
	echo "var yValuesH = " . json_encode($chartYHValeurs) . ";\n";
	echo "var yValuesF = " . json_encode($chartYFValeurs) . ";\n";
	echo "charLineAnnees(xValuesHF, yValuesH, yValuesF, title);\n";
	echo "\n";
	
	echo "\n";
	echo "var title = '" . __d('graph','Stagiaires ') . date('Y') . "';\n";
	echo "var titleHF = '" . __d('graph','Homme/Femme') . "';\n";
	echo "var xValuesHF = " . json_encode($chartHMLabels) . ";\n";
	echo "var yValuesHF = " . json_encode($chartHMValeurs) . ";\n";
	echo "chartPieHommesFemmes('chart-homme-femme', xValuesHF, yValuesHF, title);\n";
	echo "\n";
	


	
$this->Html->scriptEnd();
?>
