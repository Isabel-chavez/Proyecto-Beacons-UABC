/**
 * funciones_beacons.js   Isabel Chavez     28 Noviembre 2020
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
			// console.log("bandera validar formulario: "+bandera);

			if(bandera=="true"){
				console.log("vamos a guardar el nodo");
				guardarDatosNodo();
					
			}
			
			
		});


       /*
       * Se valida el formulario antes de enviar a grabar en la base de datos
       */

		function validar_formulario()
		{
			
            var name = $("#nombreNodo").val();
            var latitud = $("#latitud").val();
            var longitud= $("#longitud").val();
            var finsta= $("#fechaInstalacion").val();
            var numPersonas= $("#numPerson").val();

            var band1="";
            var band2="";
            var band3="";
            var band4="";
            var band5="";
            var resultado="";

		   //Validamos el campo nombre, simplemente miramos que no esté vacío
		    if (name == "") {
			  $("label#name_error").show();
			  $("input#name").focus();
			  band1="false";
		    }else{
		      $("label#name_error").hide();
			  $("input#name").focus();
			  band1="true";	
		    }

		     if (latitud == "") {
			  $("label#lat_error").show();
			  $("input#name").focus();
			  band2="false";
		    }

		    if(latitud!= ""){
		    
			   var res=validateDecimal(latitud); // console.log("latitud es decimal..?"+res);
		     	if(res=="false"){
			  		console.log("res:"+res);
			  	   $("label#lat_error").show();	
			       $("input#name").focus();
			       band2="false";
			    
			    }else{
			       $("label#lat_error").hide();	
			       $("input#name").focus();
			       band2="true";
			       
			    }

		    }

		     if (longitud == "") {
			  $("label#lon_error").show();
			  $("input#name").focus();
			 
			  band3="false";
		    }else{
		        var res=validateDecimal(longitud); // console.log("longitud es decimal..?"+res);
		     	if(res=="false"){
			  		console.log("res:"+res);
			  	   $("label#lon_error").show();
			  	   $("input#name").focus();
			       band3="false";
			    
			    }else{
			      
			       $("label#lon_error").hide();
			  	   $("input#name").focus();
			       band3="true";	
			    }
		    }
		      
		     if (finsta == "") {
			  $("label#finsta_error").show();
			  $("input#name").focus();
			  band4="false";
		    }else{
		      $("label#finsta_error").hide();
			  $("input#name").focus();
			  band4="true";

		    }

		     if (numPersonas== "") {
		      $("label#noesentero_error").hide();	
			  $("label#numpersonas_error").show();
		      $("input#name").focus();
			  band5="false";
		    }else{
			  	
			  	var res=validar_entero(numPersonas);   // console.log("es entero..?"+res);
			  	if(res=="false"){
			  		console.log("res:"+res);
			  	   $("label#numpersonas_error").hide();
			  	   $("label#noesentero_error").show();	
			       $("input#name").focus();
			       band5="false";
			    
			    }else{
			    	
			        band5="true";	
			        $("label#noesentero_error").hide();
			        $("input#name").focus();
			       }
			  }

            console.log("band1="+band1+" "+"band2="+band2+" "+"band3:"+band3+" "+"band4="+band4+" "+"band5:"+band5);
            if(band1=="true" && band2=="true" && band3=="true" && band4=="true" && band5=="true"){
            	resultado="true";
            	// alert("ES TRUE");

            }else{
            	// alert("ES FALSE");
            	resultado="false";
            }
		    
		     return resultado;

		}

      /*
      *  Se valida que el dato capturado sea un valor númerico
      */
      function validar_entero(numero){
      	
      	var dato_a_comprobar = "1234";
        var valoresAceptados = /^[0-9]+$/;
        var band="";
        if (numero.match(valoresAceptados)){
          //alert ("Es numérico");
          band="true";
        } else {
         //alert ("No es numérico");
          band="false";
          }
          return band;
       }

      /*
      *  Se valida que el dato capturado sea un valor decimal positivo o negativo
      */
       function validateDecimal(valor) {
       var re = /^-?\d*\.?\d*$/;
       // var otra_validacion=(^-?0\.[0-9]*[1-9]+[0-9]*$)|(^-?[1-9]+[0-9]*((\.[0-9]*[1-9]+[0-9]*$)|(\.[0-9]+)))|(^-?[1-9]+[0-9]*$)|(^0$){1}; 
       // var re = ^-?[0-9]\d*(\.\d+)?$\; 
       if (re.test(valor)) {
       	 // alert ("Es Decimal");
         band="true";
       } else {
       	 // alert ("No es Decimal");
         band="false";
       }
         return band;
      }
        
      
       /*
       *  Se envian los datos a la base de datos para ser almacenados
       */
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


       /*
         fecha: dd/mm/yyyy
       *  Se cambia el formato de la fecha porque en la base de datos se debe guardar como yyyy/mm/dd
       */
	   function cambiarFormatoFecha(fecha) { 
	   // alert("cambiaremos formato fecha"+fecha); 

	    console.log("fecha"+fecha); 

	    var info = fecha.split('/');
					
		return info[2] + '-' + info[1] + '-' + info[0];  // yyyy/mm/dd												
				
				
	    }
	 	
			
	});


 