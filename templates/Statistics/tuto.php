<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
  	$this->Html->css('rhm-graphics', ['block' => true]);
	$this->Html->script(['d3.v7.min', 'graphics'], ['block' => true]);
?>

<div class="graphics index content">
    <div class="row nomarge">
		<div class="pieCategorie">

		</div>
		<div class="hello">
			<h4>Affichage de helloword</h4>
			<p> </p>
			<p> </p>
			<p> </p>
			<p> </p>
		</div>
		<div class="liste-ol">
			<h4>Seulement Un est affiché</h4>
			<p> </p>
		</div>
		<div class="liste-enter">
			<h4>Ajout dynamique avec enter et append</h4>
			<p> </p>
		</div>
		<div class="liste-style">
			<h4>Ajout dynamique avec style</h4>
			<p> </p>
		</div>
		<div class="liste-matrix">
			<h4>Affichage matrice dans un tableau</h4>
			<p> </p>
		</div>
		<div class="hello-exited">
			<h4>Affichage de helloword</h4>
			<p> </p>
			<p> </p>
			<p> </p>
		</div>
		<div class="datum">
			<h4>Affichage de Datum</h4>
			<p> </p>
			<p> </p>
			<p> </p>
		</div>	
		<div class="svg-rectangle">
			<h4>Affichage de Datum</h4>
			<svg height="210" width="400">
				<path d="M150 0 L75 200 L225 200 Z" />
			</svg>
		</div>	
		<div class="svg-graphics">
			<h4>Affichage de Graphics</h4>
			<svg width="300" height="200"> </svg>
		</div>
		<div class="svg-visualization">
			<h4>Affichage de Graphics avec text</h4>
			<svg width="300" height="200"> </svg>
		</div>		
	</div>
</div>

<?php $this->Html->scriptStart(['block' => true]); ?>

<?php $this->Html->scriptEnd(); ?>


<script>
$(document).ready(function(){
	
	var myData = ["Hello World!", "Hello D3", "Hello JavaScript"];

	var p = d3.select(".hello")
		.selectAll("p")
		.data(myData)
		.text(function (d, i) { return d; });

	myData = [1, 2, 3, 4, 5];
	var data = d3.select(".liste-ol")
		.selectAll("p")
		.data(myData)
		.text(function (d, i) { return d; });


	data = [4, 1, 6, 2, 8, 9];
	var enter = d3.select(".liste-enter")
		.selectAll("span")
		.data(data)
		.enter()
		.append("span")
		.text(function(d) { return d + " "; });

	data = [4, 1, 6, 2, 8, 9];
	var enter = d3.select(".liste-style")
		.selectAll("span")
		.data(data)
		.enter()
		.append("span")
		.style('color', function(d) { if (d % 2 === 0) { return "green"; } else { return "red"; } })
		.text(function(d) { return d + " "; });


	var matrix = [
			[1, 2, 3, 4],
			[5, 6, 7, 8],
			[9, 10, 11, 12],
			[13, 14, 15, 16]
		];
		
	var tr = d3.select(".liste-matrix")
		.append("table") 	// adds <table>
		.selectAll("tr") 	// selects all <tr>
		.data(matrix) 		// joins matrix array 
		.enter() 			// create placeholders for each row in the array
		.append("tr");		// create <tr> in each placeholder

	var td = tr.selectAll("td")
		.data(function (d) { console.log(d); return d; }) 	// joins inner array of each row
		.enter() 							// create placeholders for each element in an inner array
		.append("td") 						// creates <td> in each placeholder
		.text(function (d) { console.log(d); return d; }); 	// add value of each inner array as a text in <td>

	myData = ["Hello World!"];

	var p = d3.select(".hello-exited")
		.selectAll("p")
		.data(myData)
		.text(function (d, i) {return d;})
		.exit()
		.remove(); 

	d3.select(".datum")
		.select("p")
		.datum("The datum() function is used for static visualization which does not need updates")
		.text(function (d, i) {return d;});
		
		
		
	data = [2, 4, 8, 10, 19, 25];
	var svg = d3.select(".svg-graphics svg");
	width = svg.attr("width");
	height = svg.attr("height");
	radius = Math.min(width, height) / 2;
	g = svg.append("g").attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");
	var color = d3.scaleOrdinal(['#4daf4a','#377eb8','#ff7f00','#984ea3','#e41a1c']);
	
	// Generate the pie
	var pie = d3.pie();
	
	// Generate the arcs
	var arc = d3.arc()
		.innerRadius(0)
		.outerRadius(radius);
	
	//Generate groups
	var arcs = g.selectAll("arc")
		.data(pie(data))
		.enter()
		.append("g")
		.attr("class", "arc")
	
	//Draw arc paths
	arcs.append("path")
		.attr("fill", function(d, i) { return color(i); })
		.attr("d", arc);


	
	
	
	
	
	
	
	
	data = {
		"Chrome":73.70,
		"IE/Edg":4.90,
		"Firefox":15.40,
		"Safari":3.60,
		"Opera":1.00

	}
	
	var svg = d3.select(".svg-visualization svg"),
	width = svg.attr("width"),
	height = svg.attr("height"),
	radius = Math.min(width, height) / 2;

	var g = svg.append("g")
	.attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");
	var color = d3.scaleOrdinal(['#4daf4a','#377eb8','#ff7f00','#984ea3','#e41a1c']);
	var pie = d3.pie().value(function(d) {  return d.percent;  });
	var path = d3.arc()
		.outerRadius(radius - 10)
		.innerRadius(0);
		
	var label = d3.arc()
		.outerRadius(radius)
		.innerRadius(radius - 80);
	/*	
	d3.csv("file/browseruse.csv", function(error, data) {
		console.log(data);
		*/
		//if (error) {throw error; }
		
		var arc = g.selectAll(".arc")
			.data(pie(data))
			.enter().append("g")
			.attr("class", "arc");
			
		arc.append("path")
			.attr("d", path)
			.attr("fill", function(d) { return color(d.data.browser); });

		console.log(arc)

		arc.append("text")
			.attr("transform", function(d) {  return "translate(" + label.centroid(d) + ")";  })
			.text(function(d) { return d.data.browser; }); 
			
	/*	
			
	});
	*/
		svg.append("g")
		.attr("transform", "translate(" + (width / 2 - 120) + "," + 20 + ")")
		.append("text")
		.text("Browser use statistics - Jan 2017")
		.attr("class", "title")
			



});


</script>

