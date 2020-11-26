<?php
/*
*
*/

class ControladorNodo{

   var $dir_vista;
   var $usr;
   function ControladorNodo()
    {

		global $modelos;
   
	}

    function ejecuta_accion($params,$datos)
    {

		$pag= $params['pag'];  
		$this->dir_vistas="Pages/";
		require_once("conf.php");
        $modelo=$conf["modelo"]; 

		switch($pag)
        {
		
		
		   case "1": 
		             
					 
		             $pagina="observatorio"; 
		             break;
		   
		              
		   case "2": 
		         
                        
					 $pagina="datos_tiempo_real";
				     break;
						 
		   
						 
								 					 			 
				 						 					 
						 
		  default :break;
					 
					 
		}
			   
		@require_once($this->dir_vistas."$pagina.php");
			
			
	} 
	
}		

?>