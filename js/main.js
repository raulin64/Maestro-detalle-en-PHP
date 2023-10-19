function format(input)
{
var num = input.value.replace(/\./g,'');
if(!isNaN(num)){
num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
num = num.split('').reverse().join('').replace(/^[\.]/,'');
input.value = num;
}
 
else{ alert('Solo se permiten numeros');
input.value = input.value.replace(/[^\d\.]*/g,'');
}
}

function filterFloat(evt,input){
	
	if(!isNaN(input.value)){
	}
 
else{ alert('Solo se permiten numeros');
input.value = input.value.replace(/[^\d\.]*/g,'');
}	

    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 46 || key == 0) {            
              return true;              
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
    
}
function ponerCeros(num) {

    if (num.value=="") {

        return;

    }

    while (num.value.length<15)

        num.value = '0'+num.value;

}
// para agregar un detalle mas, una fila
function agregarDetalle() {
	$("#table-detalle td").remove();
	var htmlTags =
		"<tr>" +
		'<td ><input type="text" name="ContribuyenteClave"     id="ContribuyenteClave" value='+ document.getElementById('nombre3').value+ ' class="form-control" disabled></td>' +
		'<td><input type="text" name="Ejercicio" id="Ejercicio"  value="2023" maxlength="4" onBlur="return filterFloat(event,this);" class="form-control"</td>' +
		'<td><input type="text" name="Tipo" id="Tipo" value="R" maxlength="1"     class="form-control"</td>' +
		'<td><input type="text" name="Numero" id="Numero" onBlur="ponerCeros(this)" maxlength="15"      class="form-control"</td>' +
		'<td><input type="text" step="any" name="ImportePrincipal"         id="ImportePrincipal" onBlur="return filterFloat(event,this);"  maxlength="10"    class="form-control"</td>' +
		'<td><button type="button" class="btn btn-danger btn-sm" onclick="removerDetal()">Delete</button></td>' +
		'<td><button type="button" class="btn btn-warning btn-sm" onclick="agregarDetal()">Agregar</button></td>' +
		"</tr>";
	$('#table-detalle').append(htmlTags);	
	//$("#table-detalle tbody").append(htmlTags);
	//$('#telefono[]').focus();
}
//funcion para agregar una fila
function agregarDetal() {
 // $("#table-detalle tr:last").remove();

 
 	//funcion para agregar detalle
$(function() {
			
			
		if (document.getElementById('ImportePrincipal').value == "")
		{
		 alert('rellene el formulario');
        return;
					  }
					  
		if (document.getElementById('Numero').value == "")
		{
		 alert('rellene el formulario');
        return;
					  }			  
		var mensaje;
		
		var opcion = confirm("Desea agregar el registro ?");
		
		
		if (opcion == true) {
			var val = $(this).val();
			var idetalle = document.getElementById('nombre3').value;
			var Ejercicio = document.getElementById('Ejercicio').value;
			var Tipo = document.getElementById('Tipo').value;
			var Numero = "'".document.getElementById('Numero').value;
			var ImportePrincipal = document.getElementById('ImportePrincipal').value;
			$.ajax({
				type: "POST",
				url: 'controller/ReciboController.php',
				data: {
					idx: idetalle,
					Ejerciciox: Ejercicio,
					Tipox: Tipo,
					Numerox: Numero,
					ImportePrincipalx: ImportePrincipal,
					action: 'insert'
				},
				beforeSend: function() {
					//antes de enviar
					$('#mensaje').html('procesando ...');
				},
				success: function(data) {
					$('#mensaje').html('Registro agregado con exito ...');
					$("#table-detalle tr:last").remove();
					if (!idetalle) {
						 return;
						}
						console.log(data);
				},
				error: function (jqXHR, thrownError) {
						

						if (jqXHR.status === 0) {

						alert('Not connect: Verify Network.');

					  } else if (jqXHR.status == 404) {

						alert('Requested page not found [404]');

					  } else if (jqXHR.status == 500) {

						alert('Internal Server Error [500].');

					  } else if (textStatus === 'parsererror') {

						alert('Requested JSON parse failed.');

					  } else if (textStatus === 'timeout') {

						alert('Time out error.');

					  } else if (textStatus === 'abort') {

						alert('Ajax request aborted.');

					  } else {

						alert('Uncaught Error: ' + jqXHR.responseText);

					  }


		}
			});

			$(this).closest("tr").remove();
		} else {
			mensaje = "Has clickado Cancelar";
		}
	
});
}
//funcion para elimnar una fila
function removerDetal() {
  $("#table-detalle tr:last").remove();
}
//funcion para elimnar una fila
function removerDetalle(id) {
	var idetalle = document.getElementById('nombre4').value;
	
	//funcion para borrar cliente
$(function() {
	//$(document).on("click", ".borrar", function (event) {
    //event.preventDefault();
		
		var mensaje;
		
		var opcion = confirm("Desea borrar el registro ?");
		
		
		if (opcion == true) {
			var val = $(this).val();
			var idetalle = document.getElementById('nombre4').value;
			$.ajax({
				type: "POST",
				url: 'controller/ReciboController.php',
				data: {
					idx: idetalle,
					action: 'del'
				},
				beforeSend: function() {
					//antes de enviar
					$('#mensaje').html('procesando ...');
				},
				success: function(data) {
					$('#mensaje').html('Registro borrado con exito ...');
					$("#table-detalle tr:last").remove();
					if (!idetalle) {
						 return;
						}
				},
				error: function() {
					//aquí lo que se ejecuta en caso de que falle
					alert("error borrando");

		}
			});

			$(this).closest("tr").remove();
		} else {
			mensaje = "Has clickado Cancelar";
		}
	
});
	
}



function saveCabeceraDetalle() {
	if (
		$("#nombre").val().length < 1 ||
		$("#apellido").val().length < 1 ||
		$("#cedula").val().length < 1
	) {
		$("#mensaje").show();
		$("#mensaje").html(
			"Ingrese datos, todos los campos del cliente son obligatorios ..."
		);
		$("#mensaje").fadeOut(4000);
		return false; // equals to exit or break
	}

	$("#formCab").submit();
}

//ver detalle del cliente
function verDetalle(id) {
	var root = 'https://jsonplaceholder.typicode.com';



	$.ajax({
		url: "controller/ReciboController.php",
		type: "POST",
		data: {
			id: id,
			action: "getById"
		},
		async: false,
		beforeSend: function() {
			$("#mensaje").html("Procesando peticion...");
		},
		error: function() {
			//aquí lo que se ejecuta en caso de que falle
			alert("error");

		}
	}).then(function(data) {
		//ejecutaEnSuccess(data);


		$("#mensaje").html("");
		data = JSON.parse(data);

		var pag = 1;
		var totales = data.length;
		if (totales >= 8) { 
			var xPag = 8;
		} 
		else { 
            var xPag = totales;
		}
		if (totales == 0) alert( 'No hay registros' );
		 
		var nPag = Math.ceil(totales / xPag);
		var offset = (pag - 1) * xPag;
		var hasta = pag * xPag;
		mostrarLista(data, offset, hasta);

		mostrarBotones(nPag);



		$(document).ready(function() {
			
			$("#table-detalle tbody tr").mouseover(function() {
				 $(this).addClass("tr_hover");
			});

		 
			$("#table-detalle tbody tr").mouseout(function() {
				 $(this).removeClass("tr_hover");
			});
			
					   $("tr").click(function () {    
			$("tr").each(function(){
			$(this).removeClass('selected');

			});
 
			$(this).addClass("unselected");
			
			if ($(this).hasClass('selected')) {
				$(this).removeClass('selected');
				$(this).addClass('unselected');
			} 
			else if ($(this).hasClass('unselected')) {
				$(this).removeClass('unselected');
				$(this).addClass('selected');
				
				// $(this).parents('tr').addClass("selected");
				//$(this).attr("bgcolor","#dddddd");
		        //$("th").css({'color':'red','font-size':'1.3em','background':'yellow'});
	  
			//$(this).parent().addClass("unselected");
    }  
		
         });
		 
		  $("td").click(function () {    
	    //alert("Bien!!!, la RecibosID seleccionada es: " +  $(this).text());
	    //alert("Bien!!!, la RecibosID seleccionada es: " + $(this).val());
		//$("#nombre3").val($(this).text());
	
		
            var valores="";
			var RecibosID="";
			var i = 0;
			
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find("td").each(function(){
				i++;
				
				if( i == 1){
                 RecibosID=$(this).html();
				 $("#nombre4").val(RecibosID);
                }
                valores+=$(this).html()+"\n";
            });
		  
         });
			
		$('input').on('blur', function() {
        var field = $(this);
        var validationField = field.parent().find('.validation');
        var value = field.val();
		var field = field.attr('name');
		var idetalle = document.getElementById('nombre4').value;
		if (!idetalle) {
			return;
		}
		//alert (idetalle);
		$.ajax({
            type: "POST",
            url: "controller/ReciboController.php", 
			data: {
			idx: idetalle,
			dataup: value,
			fieldup: field,
			action: "update"
			
		},
		
		error: function(data) {
			
            console.log(data);
      
			//aquí lo que se ejecuta en caso de que falle
			alert("error update");

		},
            success: function(data) {
				
                validationField.hide().empty();

                setTimeout(function() {
                    validationField.append('<i class="fa fa-check"></i>');
				    validationField.show();
                }, 500); 
				console.log('my message' + data);
            }
        });
		console.log('%cAprende con Programación y más 🔥'+ data, 'color: #1cfff9; background: #bd4147; font-size: 1.3em; padding: 0.25em 0.5em; margin: 1em; font-family: Helvetica; border: 2px solid white; border-radius: 0.6em; font-weight: bold; text-shadow: 1px 1px 1px #000121; font-style: italic;');
		console.table(data);
	});		
			// Activar el primer botón
			$('#botones button:first-child').addClass('active');

			// Poner oyentes a cada botón
			var losBotones = document.querySelectorAll('#botones button');
			for (var i = 0; i < losBotones.length; i++) {
				losBotones[i].addEventListener('click', function() {
					quitarActivo();
					var indice = parseInt(this.textContent);
					
					if (this.textContent == "Final")
					indice = losBotones.length -2;
					if (this.textContent == "Inicio")
					indice = 1;

					var o = (indice - 1) * xPag;



					var paginador = Math.ceil(totales / xPag);
					var saldo = totales % xPag;

					var h;


					if (paginador === indice) {
						h = (indice * xPag) - saldo;
					} else {
						h = indice * xPag;
					}

					mostrarLista(data, o, h);
					$(this).addClass('active');
				});
				$("#detalleModal").modal("show");
			}

		});

	})

	function ejecutaEnSuccess(nuevoUsuario) {
		//alert(JSON.stringify(nuevoUsuario))
		$("#table-detalle").text(JSON.stringify(nuevoUsuario))
	}

	function mostrarLista(data, desde, hasta) {
		var lista = '';
		$("#mensaje").html("");
		$("#table-detalle td").remove();
		
		 for(var i = desde; i < hasta; i++){

                var fila = '';
				
				fila += "<tbody>";
                fila += "<tr >";
				
                fila += "<td>"+data[i].RecibosID+"</td>";
                fila += "<td>"+data[i].Ejercicio+"</td>";
                fila += "<td>"+data[i].Tipo+"</td>";
				fila += "<td>"+data[i].Numero+"</td>";
				fila += "<td>"+data[i].ImportePrincipal+"</td>";
			
                fila += "</tr>";
				fila += "</tbody>";
                lista += fila;
            }
			
			$('#table-detalle').append(lista);
			
			/*
		data.forEach(function(dat, index) {
			$("#table-detalle").append(
				'<tr class="table"><td>' +
				dat.RecibosID +
				"</td><td>" +
				dat.Ejercicio +
				"</td><td>" +
				dat.Tipo +
				"</td><td>" +
				dat.Numero +
				"</td><td>&euro; " +
				dat.ImportePrincipal +
				'</td><td><button class="btn btn-danger btn-sm">Borrar</button></td> </tr>'
			);
		});
*/


	}

	function mostrarBotones(t) {
		var botones = '';
			botones += "<button type='button' " +
				"class='btn btn-info'>" + ("Inicio") +
				"</button>&nbsp;";
		$("#botones button").remove();

		for (var i = 0; i < t; i++) {
			var cada = '';
			cada = "<button type='button' " +
				"class='btn btn-info'>" + (i + 1) +
				"</button>";
			botones += cada;
		}
             botones += "&nbsp;<button type='button' " +
				"class='btn btn-info'>" + ("Final") +
				"</button>";
		$('#botones').append(botones);
	}

	function quitarActivo() {
		var losBotones = document.querySelectorAll('#botones button');
		for (var i = 0; i < losBotones.length; i++) {
			$(losBotones[i]).removeClass('active');
		}
	}
}

//editar detalle del cliente
function editarDetalle(id) {
	var root = 'https://jsonplaceholder.typicode.com';



	$.ajax({
		url: "controller/ReciboController.php",
		type: "POST",
		data: {
			id: id,
			action: "getById"
		},
		async: false,
		beforeSend: function() {
			$("#mensaje").html("Procesando peticion...");
		},
		error: function() {
			//aquí lo que se ejecuta en caso de que falle
			alert("error");

		}
	}).then(function(data) {
		//ejecutaEnSuccess(data);


		$("#mensaje").html("");
		data = JSON.parse(data);

		var pag = 1;
		var totales = data.length;
		if (totales >= 8) { 
			var xPag = 8;
		} 
		else { 
            var xPag = totales;
		}
		if (totales == 0) alert( 'No hay registros' );
		 
		var nPag = Math.ceil(totales / xPag);
		var offset = (pag - 1) * xPag;
		var hasta = pag * xPag;
		mostrarLista(data, offset, hasta);

		mostrarBotones(nPag);



		$(document).ready(function() {
			
			$("#table-detalle tbody tr").mouseover(function() {
				 $(this).addClass("tr_hover");
			});

		 
			$("#table-detalle tbody tr").mouseout(function() {
				 $(this).removeClass("tr_hover");
			});
			
					   $("tr").click(function () {    
			$("tr").each(function(){
			$(this).removeClass('selected');

			});
 
			$(this).addClass("unselected");
			
			if ($(this).hasClass('selected')) {
				$(this).removeClass('selected');
				$(this).addClass('unselected');
			} 
			else if ($(this).hasClass('unselected')) {
				$(this).removeClass('unselected');
				$(this).addClass('selected');
				
				// $(this).parents('tr').addClass("selected");
				//$(this).attr("bgcolor","#dddddd");
		        //$("th").css({'color':'red','font-size':'1.3em','background':'yellow'});
	  
			//$(this).parent().addClass("unselected");
    }  
		
         });
		 
		  $("td").click(function () {    
	    //alert("Bien!!!, la RecibosID seleccionada es: " +  $(this).text());
	    //alert("Bien!!!, la RecibosID seleccionada es: " + $(this).val());
		//$("#nombre3").val($(this).text());
	
		
            var valores="";
			var RecibosID="";
			var i = 0;
			
            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find("td").each(function(){
				i++;
				
				if( i == 1){
                 RecibosID=$(this).html();
				 $("#nombre4").val(RecibosID);
                }
                valores+=$(this).html()+"\n";
            });
		  
         });
			
		$('input').on('blur', function() {
        var field = $(this);
        var validationField = field.parent().find('.validation');
        var value = field.val();
		var field = field.attr('name');
		var idetalle = document.getElementById('nombre4').value;
		if (!idetalle) {
			return;
		}
		//alert (idetalle);
		$.ajax({
            type: "POST",
            url: "controller/ReciboController.php", 
			data: {
			idx: idetalle,
			dataup: value,
			fieldup: field,
			action: "update"
			
		},
		
		error: function(data) {
			
            console.log(data);
      
			//aquí lo que se ejecuta en caso de que falle
			alert("error update");

		},
            success: function(data) {
				
                validationField.hide().empty();

                setTimeout(function() {
                    validationField.append('<i class="fa fa-check"></i>');
				    validationField.show();
                }, 500); 
				console.log('my message' + data);
            }
        });
		console.log('%cAprende con Programación y más 🔥'+ data, 'color: #1cfff9; background: #bd4147; font-size: 1.3em; padding: 0.25em 0.5em; margin: 1em; font-family: Helvetica; border: 2px solid white; border-radius: 0.6em; font-weight: bold; text-shadow: 1px 1px 1px #000121; font-style: italic;');
		console.table(data);
	});		
			// Activar el primer botón
			$('#botones button:first-child').addClass('active');

			// Poner oyentes a cada botón
			var losBotones = document.querySelectorAll('#botones button');
			for (var i = 0; i < losBotones.length; i++) {
				losBotones[i].addEventListener('click', function() {
					quitarActivo();
					var indice = parseInt(this.textContent);
					
					if (this.textContent == "Final")
					indice = losBotones.length -2;
					if (this.textContent == "Inicio")
					indice = 1;

					var o = (indice - 1) * xPag;



					var paginador = Math.ceil(totales / xPag);
					var saldo = totales % xPag;

					var h;


					if (paginador === indice) {
						h = (indice * xPag) - saldo;
					} else {
						h = indice * xPag;
					}

					mostrarLista(data, o, h);
					$(this).addClass('active');
				});
				$("#detalleModal").modal("show");
			}

		});

	})

	function ejecutaEnSuccess(nuevoUsuario) {
		//alert(JSON.stringify(nuevoUsuario))
		$("#table-detalle").text(JSON.stringify(nuevoUsuario))
	}

	function mostrarLista(data, desde, hasta) {
		var lista = '';
		$("#mensaje").html("");
		$("#table-detalle td").remove();
		
		 for(var i = desde; i < hasta; i++){

                var fila = '';
				
				fila += "<tbody>";
                fila += "<tr >";
				
                fila += "<td>"+data[i].RecibosID+"</td>";
				fila += "<td><input type='text' class='form-control' name='Ejercicio' id='Ejercicio' value="+data[i].Ejercicio+" maxlength='4'></td>";
				
                fila += "<td>"+data[i].Tipo+"</td>";
				fila += "<td><input type='text' class='form-control' name='Numero' id='Numero' value="+data[i].Numero+" maxlength='32'></td>";
				
				fila += "<td><input type='text' class='form-control' name='ImportePrincipal' id='ImportePrincipal' value="+data[i].ImportePrincipal+" maxlength='22'></td>"
                fila += "</tr>";
				fila += "</tbody>";
                lista += fila;
            }
			
			$('#table-detalle').append(lista);
			
			/*
		data.forEach(function(dat, index) {
			$("#table-detalle").append(
				'<tr class="table"><td>' +
				dat.RecibosID +
				"</td><td>" +
				dat.Ejercicio +
				"</td><td>" +
				dat.Tipo +
				"</td><td>" +
				dat.Numero +
				"</td><td>&euro; " +
				dat.ImportePrincipal +
				'</td><td><button class="btn btn-danger btn-sm">Borrar</button></td> </tr>'
			);
		});
*/


	}

	function mostrarBotones(t) {
		var botones = '';
			botones += "<button type='button' " +
				"class='btn btn-info'>" + ("Inicio") +
				"</button>&nbsp;";
		$("#botones button").remove();

		for (var i = 0; i < t; i++) {
			var cada = '';
			cada = "<button type='button' " +
				"class='btn btn-info'>" + (i + 1) +
				"</button>";
			botones += cada;
		}
             botones += "&nbsp;<button type='button' " +
				"class='btn btn-info'>" + ("Final") +
				"</button>";
		$('#botones').append(botones);
	}

	function quitarActivo() {
		var losBotones = document.querySelectorAll('#botones button');
		for (var i = 0; i < losBotones.length; i++) {
			$(losBotones[i]).removeClass('active');
		}
	}
}