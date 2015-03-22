$(document).ready(function(){
	$("input").addClass('radius5');
	$("textarea").addClass('radius5');
	$("fieldset").addClass('radius5');
	$("sidebar li").addClass('radius5');
	
	//accordion
	$('#accordion a.item').click(function() {
		$('#accordion li').children('ul').slideUp('medium');
		$('#accordion li').each(function(){
			$(this).removeClass('active');
		});
		$(this).siblings('ul').slideDown('medium');
		$(this).parent().addClass('active');
		return false;
	});
	
	//validate do login
	$('.loginform').validate({
		rules:{
			usuario:{required: true, minlength: 3},
			senha:{required: true, rangelength: [5,10]}
		}
	});
	
	//validate do formulario de cadastro
	$('#formcad').validate({
		rules:{
			nome:{required: true, minlength: 5},
			email:{required: true, email: true},
			login:{required: true, minlength: 5},
			senha:{required: true, rangelength: [5,10]},
			senhaconf:{required: true, equalTo: "#senha"}
		}
	});
	
	//Data_Tables
	$("#listausers").dataTable({        
		"sSrollY": "400px",
		"bPaginate": false,
		"aaSorting": [[0, "asc"]],
		language: {
            "zeroRecords": "Desculpe - nada encontrado!",
            "info": "Mostrando página(s): _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum resultado encontrado!",
            "infoFiltered": "(filtrado _MAX_ registros no total)",
            "sSearch": "Perquisar:"
        }
	});
						
});
