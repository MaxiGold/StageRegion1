$(document).ready(function(){
	
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl);
	});
	
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
	  return new bootstrap.Popover(popoverTriggerEl)
	})

	$('.table-responsive').find("table:first").addClass('table table-hover ');
	$('.container-gestion .view table').find("td").before('<td class="between"> : </td>');	
	
	$('#photo').on('change', function(){
		if(this.files && this.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#apercu').attr('src', e.target.result);
				$('#profilePhoto').attr('src', e.target.result);
			}	
			reader.readAsDataURL(this.files[0]);
		}
	});
	
	if($(".toast").text().trim() != ""){
		$(".toast").removeClass('d-none');
		var toastElList = [].slice.call(document.querySelectorAll('.toast'))
		var toastList = toastElList.map(function(toastEl) {
			return new bootstrap.Toast(toastEl);
		})
		toastList.forEach(toast => toast.show());
	}
	
	$('.container-gestion td.actions').find("a").each(function(){
		let href = $(this).attr('href');
		$(this).attr('title', $(this).text())
		if(href.includes('view')){
			$(this).html('<i class="far fa-eye"></i>');
		}
		else if(href.includes('edit')){
			$(this).html('<i class="far fa-edit"></i>');
		}
		else if(href.includes('#')){
			$(this).html('<i class="far fa-trash-alt"></i>');
			$(this).attr('data-bs-toggle', 'modal');
			$(this).attr('data-bs-target', '#deleteModal');
			$(this).click( function (){
				$('#deleteModal div.modal-body').text($(this).attr('data-confirm-message'));
				$('#deleteModal button').attr("data-form-name", $(this).closest('td').find('form').attr('name'));
			});
			$(this).removeAttr('onclick');
		}
	});
	
	$('#deleteModal button.btn-danger').click(function(){
		$(".container-gestion").find("form[name='" + $(this).attr('data-form-name') + "']").submit(); 
	});
	
	activeMenu();
	
	$('.menu-statistique a').html('<i class="far fa-chart-bar"></i> ' + $('.menu-statistique a').html());
	$('.menu-ressource a').html('<i class="fa fa-address-card"></i> ' + $('.menu-ressource a').html());
	$('.menu-login a').html('<i class="fa fa-sign-in-alt"></i> ' + $('.menu-login a').html());
	
	
});

var activeMenu = function(){
	switch(pageAcuelle){
		case 'pages/index' : $('.menu-bar ul.nav li.menu-accueil').addClass("active"); 
			break;
		case 'pages/about' : $('.menu-bar ul.nav li.menu-apropos').addClass("active");
			break;
		case 'statistics/index' : $('.menu-bar ul.nav li.menu-statistique').addClass("active"); 
			break;	
		default : $('.menu-bar ul.nav li.menu-ressource').addClass("active"); 
			break;
	}
	
	let controller = (pageAcuelle.split('/')[0]).toLowerCase();
	$('.menu-bar.menu-bar-lateral').find("a[href$='" + controller + "']").closest("li").addClass("active"); 
	//$('.menu-bar.menu-bar-lateral ul.nav li.menu-accueil').addClass("active"); 
}
