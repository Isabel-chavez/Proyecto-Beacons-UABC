/**
 * solicitudBecas.js   Isabel Chavez
 */

/*
 * FUNCIONES JQUERY *
 * 
 */
jQuery(function($) {


	
		$('.error').hide();

		
		$("#btnGuardar").click(function(e){
		    e.preventDefault();
		
            // console.log("vamos a validar el form");
            var bandera=validar_formulario();
			console.log("bandera: "+bandera);

			if(bandera=="true"){
				console.log("vamos a guardar el nodo");
				guardarDatosNodo();
		
			}
			
			
		});

	/*
        $( document ).ready(function() {
            $("#fechaInstalacion").datepicker();
        });
   */

/*	  $("#success-alert").hide();
      $("#myWish").click(function showAlert() {
      $("#success-alert").alert();
         window.setTimeout(function () { 
         $("#success-alert").alert('close'); 
      }, 2000);             
   });    
*/

	$("#fechaInstalacion").datepicker({autoclose: true,
			todayHighlight: true,
			todayBtn: "linked",
			language: "es",
			format: 'dd/mm/yyyy'
		   }
		);


		function validar_formulario()
		{
			
            var name = $("#nombreNodo").val();
            var latitud = $("#latitud").val();
            var longitud= $("#longitud").val();
            var finsta= $("#fechaInstalacion").val();
            var numPersonas= $("#numPerson").val();

            var band="true";

		   //Validamos el campo nombre, simplemente miramos que no esté vacío
		    if (name == "") {
			  $("label#name_error").show();
			  $("input#name").focus();
			  band="false";
		    }else{
		      $("label#name_error").hide();
			  $("input#name").focus();
			  band="true";	
		    }

		     if (latitud == "") {
			  $("label#lat_error").show();
			  $("input#name").focus();
			  band="false";
		    }else{
		      $("label#lat_error").hide();
			  $("input#name").focus();
			  band="true";	

		    }

		     if (longitud == "") {
			  $("label#lon_error").show();
			  $("input#name").focus();
			 
			  band="false";
		    }else{
		      $("label#lon_error").hide();
			  $("input#name").focus();
			   console.log("'-5.2'", isCommaDecimalNumber('-5.22'));
			  band="true";
		    }
		      
		     if (finsta == "") {
			  $("label#finsta_error").show();
			  $("input#name").focus();
			  band="false";
		    }else{
		      $("label#finsta_error").hide();
			  $("input#name").focus();
			  band="true";

		    }

		     if (numPersonas== "") {
		      $("label#noesentero_error").hide();	
			  $("label#numpersonas_error").show();
			
			  $("input#name").focus();
			  band="false";
		    }else{
			  	$("label#numpersonas_error").hide();
			    $("input#name").focus();
			    band="true";	
			  }

/*		    
			  var res=validarEntero(numPersonas);
			  if (res=="false")
			  {
			  	//console.log("no es numero");
			  	$("label#numpersonas_error").hide();
                $("label#noesentero_error").show();
			    $("input#noesentero").focus();
			    band="false";		  	
			  }
		    
*/
            
		    
		     return band;

		}


        function validarEntero(valor){
        //intento convertir a entero.
        //si era un entero no le afecta, si no lo era lo intenta convertir
        var valor = parseInt(valor)
        var resultado="true";
        //Compruebo si es un valor numérico
        if (isNaN(valor)) {
            //entonces (no es numero) devuelvo el valor cadena vacia
            return resultado="false";
        }else{
            //En caso contrario (Si era un número) devuelvo el valor
            return resultado;
            }
        }

		function isCommaDecimalNumber(value) {
         return /^-?(?:\d+(?:,\d*)?)$/.test(value);
        }
		

		function guardarDatosNodo(){
			
		    var fechaInsta= $("#fechaInstalacion").val();  
		    console.log("fechaInsta"+fechaInsta); 
		    // alert("fecha Instalacion:: "+fechaInsta);
			var fechaFormat=cambiarFormatoFecha(fechaInsta); 
            console.log("fechaFormateada"+fechaFormat); 
			// alert("fecha formateada"+fechaFormat);
            $("#fechaFormateada").val(fechaFormat);


	        var myForm = $('#form-registro-nodo');
	        var datosFormulario = myForm.serialize();

	      
    	   $.ajax({
			type: "POST",
			url: "app/Modelos/guardar_nodo.php",
			data: datosFormulario,
			success: function(result) {
		    	
		      	if(result==1){
		     		// alert("Los datos fueron alamcenados correctamente::: "+result);
		     		alert("Los datos fueron alamcenados correctamente");
		     		// $("#success-alert").show();
		       		// console.log("se guardaron exitosamente los datos");   
		    	 }else{
		     		alert("Los datos NO fueron almacenados correctamente= "+result);
		    		 }
		      
		    },
		   
		   });
    	

		}

       // fecha   dd/m/yyyy
	   function cambiarFormatoFecha(fecha) { 
	   alert("cambiaremos formato fecha"+fecha); 

	   console.log("fecha"+fecha); 

	    var info = fecha.split('/');
					
		return info[2] + '-' + info[1] + '-' + info[0];  // yyyy/mm/dd												
				
				
	    }
	 
		
		
			
	});


 