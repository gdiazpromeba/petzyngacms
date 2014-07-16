<?php 

   interface SheltersUsaSvc { 

      public function obtiene($id); 
      public function obtienePorNumero($numero);
      public function inserta($bean); 
      public function actualiza($bean); 
      public function borra($id); 
      public function selTodos($nombre, $stateId, $latitude, $longitude, $distance, $desde, $cuantos);
      public function selTodosCuenta($nombre, $stateId, $latitude, $longitude, $distance);
      public function zipContainers($zipCode); 
      
   } 

?>