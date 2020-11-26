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
			// console.log("bandera: "+bandera);

			if(bandera=="true"){
				console.log("vamos a guardar el nodo");
				guardarDatosNodo();
		
			}
			
			
		});

	  $("#success-alert").hide();
      $("#myWish").click(function showAlert() {
      $("#success-alert").alert();
         window.setTimeout(function () { 
         $("#success-alert").alert('close'); 
      }, 2000);             
   });    

	/*	$("#fechaInstalacion").datepicker({autoclose: true,
			todayHighlight: true,
			todayBtn: "linked",
			language: "es",
			format: 'dd-mm-yyyy'
		   }
		);*/

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
		    }

		     if (latitud == "") {
			  $("label#lat_error").show();
			  $("input#name").focus();
			  band="false";
		    }

		     if (longitud == "") {
			  $("label#lon_error").show();
			  $("input#name").focus();
			  band="false";
		    }
		      
		     if (finsta == "") {
			  $("label#finsta_error").show();
			  $("input#name").focus();
			  band="false";
		    }

		     if (numPersonas== "") {
			  $("label#numpersonas_error").show();
			  $("input#name").focus();
			  band="false";
		    }

            
		    
		     return band;

		}
		

		function guardarDatosNodo(){
			
		    var fechaInsta= $("#fechaInstalacion").val();    // alert("fecha"+fechaInsta);
			var fechaFormat=cambiarFormatoFecha(fechaInsta); // alert("fecha formateada"+fechaFormat);
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
	    var info = fecha.split('/');
					
		return info[2] + '-' + info[1] + '-' + info[0];  // yyyy/mm/dd												
				
				
	    }
	 
		
		
			
	});


 