<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/AOD.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/oad/SheltersUsaOad.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['dirAplicacion'] . '/beans/ShelterUsa.php';
//require_once('FirePHPCore/fb.php4'); 

   class SheltersUsaOadImpl extends AOD implements SheltersUsaOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  SHU.ID,     \n"; 
         $sql.="  SHU.NUMBER,     \n";
         $sql.="  SHU.NAME,     \n"; 
         $sql.="  SHU.ZIP_CODE,     \n"; 
         $sql.="  SHU.URL,     \n"; 
         $sql.="  SHU.LOGO_URL,     \n"; 
         $sql.="  SHU.EMAIL,     \n"; 
         $sql.="  SHU.PHONE,     \n"; 
         $sql.="  SHU.DESCRIPTION,     \n"; 
         $sql.="  SHU.STREET_ADDRESS,    \n"; 
         $sql.="  CIU.CITY_NAME,    \n";
         $sql.="  COU.COUNTY_NAME,    \n";
         $sql.="  STU.STATE_NAME,    \n";
         $sql.="  0 AS DISTANCE_KM \n";
         $sql.="FROM  \n"; 
         $sql.="  SHELTERS_USA  SHU \n"; 
         $sql.="  INNER JOIN USA_ZIPS ZIU ON SHU.ZIP_CODE=ZIU.ZIP_CODE  \n";
         $sql.="  INNER JOIN USA_CITIES CIU ON CIU.CITY_ID=ZIU.CITY_ID  \n";
         $sql.="  INNER JOIN USA_COUNTIES COU ON COU.COUNTY_ID=CIU.COUNTY_ID  \n";
         $sql.="  INNER JOIN USA_STATES STU ON COU.STATE_ID=STU.STATE_ID \n";
         $sql.="WHERE  \n"; 
         $sql.="  SHU.ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new ShelterUsa();  
         $stm->bind_result($id, $number, $name, $zip, $url, $logoUrl, $email, $phone, $description, $streetAddress, $city, $county, $state, $distance); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setNumber($number);
            $bean->setName($name);
            $bean->setZip($zip);
            $bean->setUrl($url);
            $bean->setLogoUrl($logoUrl);
            $bean->setEmail($email);
            $bean->setPhone($phone);
            $bean->setDescription($description);
            $bean->setStreetAddress($streetAddress);
            $bean->setCityName($city);
            $bean->setStateName($state);
            $bean->setDistancia(0);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 
      
      public function obtienePorNumero($number){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  SHU.ID,     \n";
      	$sql.="  SHU.NUMBER,     \n";
      	$sql.="  SHU.NAME,     \n";
      	$sql.="  SHU.ZIP_CODE,     \n";
      	$sql.="  SHU.URL,     \n";
      	$sql.="  SHU.LOGO_URL,     \n";
      	$sql.="  SHU.EMAIL,     \n";
      	$sql.="  SHU.PHONE,     \n";
      	$sql.="  SHU.DESCRIPTION,     \n";
      	$sql.="  SHU.STREET_ADDRESS,    \n";
      	$sql.="  CIU.CITY_NAME,    \n";
      	$sql.="  COU.COUNTY_NAME,    \n";
      	$sql.="  STU.STATE_NAME,    \n";
      	$sql.="  0 AS DISTANCE_KM \n";
      	$sql.="FROM  \n";
      	$sql.="  SHELTERS_USA  SHU \n";
      	$sql.="  INNER JOIN USA_ZIPS ZIU ON SHU.ZIP_CODE=ZIU.ZIP_CODE  \n";
      	$sql.="  INNER JOIN USA_CITIES CIU ON CIU.CITY_ID=ZIU.CITY_ID  \n";
      	$sql.="  INNER JOIN USA_COUNTIES COU ON COU.COUNTY_ID=CIU.COUNTY_ID  \n";
      	$sql.="  INNER JOIN USA_STATES STU ON COU.STATE_ID=STU.STATE_ID \n";
      	$sql.="WHERE  \n";
      	$sql.="  SHU.NUMBER='" . $number . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new ShelterUsa();
      	$stm->bind_result($id, $number, $name, $zip, $url, $logoUrl, $email, $phone, $description, $streetAddress, $city, $county, $state, $distance);
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setNumber($number);
      		$bean->setName($name);
      		$bean->setZip($zip);
      		$bean->setUrl($url);
      		$bean->setLogoUrl($logoUrl);
      		$bean->setEmail($email);
      		$bean->setPhone($phone);
      		$bean->setDescription($description);
      		$bean->setStreetAddress($streetAddress);
      		$bean->setCityName($city);
      		$bean->setStateName($state);
      		$bean->setDistancia(0);
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }      


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO SHELTERS_USA (   \n"; 
         $sql.="  ID,     \n"; 
         $sql.="  NAME,     \n"; 
         $sql.="  ZIP_CODE,     \n"; 
         $sql.="  URL,     \n"; 
         $sql.="  LOGO_URL,     \n"; 
         $sql.="  EMAIL,     \n"; 
         $sql.="  PHONE,     \n"; 
         $sql.="  DESCRIPTION,     \n"; 
         $sql.="  STREET_ADDRESS)    \n"; 
         $sql.="VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("sssssssss",$bean->getId(), $bean->getName(), $bean->getZip(), $bean->getUrl(), $bean->getLogoUrl(), $bean->getEmail(), $bean->getPhone(), $bean->getDescription(), $bean->getStreetAddress()); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM SHELTERS_USA   \n"; 
         $sql.="WHERE ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE SHELTERS_USA SET   \n"; 
         $sql.="  NAME=?,     \n"; 
         $sql.="  ZIP_CODE=?,     \n"; 
         $sql.="  URL=?,     \n"; 
         $sql.="  LOGO_URL=?,     \n"; 
         $sql.="  EMAIL=?,     \n"; 
         $sql.="  PHONE=?,     \n"; 
         $sql.="  DESCRIPTION=?,     \n"; 
         $sql.="  STREET_ADDRESS=?     \n"; 
         $sql.="WHERE ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("sssssssss", $bean->getName(), $bean->getZip(), $bean->getUrl(), $bean->getLogoUrl(), $bean->getEmail(), $bean->getPhone(), $bean->getDescription(), $bean->getStreetAddress(), $bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 

      
      public function selTodos($nombre, $stateId, $latitude, $longitude, $distance, $desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  SHU.ID,     \n"; 
         $sql.="  SHU.NUMBER,     \n";
         $sql.="  SHU.NAME,     \n"; 
         $sql.="  SHU.ZIP_CODE,     \n"; 
         $sql.="  SHU.URL,     \n"; 
         $sql.="  SHU.LOGO_URL,     \n"; 
         $sql.="  SHU.EMAIL,     \n"; 
         $sql.="  SHU.PHONE,     \n"; 
         $sql.="  SHU.DESCRIPTION,     \n"; 
         $sql.="  SHU.STREET_ADDRESS,    \n"; 
         $sql.="  CIU.CITY_NAME,    \n";
         $sql.="  COU.COUNTY_NAME,    \n";
         $sql.="  STU.STATE_NAME,    \n";
         $sql.="  GETDISTANCE(" . $latitude . "," . $longitude . ", ZIU.LATITUDE, ZIU.LONGITUDE) AS DISTANCE_KM \n";
         $sql.="FROM  \n"; 
         $sql.="  SHELTERS_USA  SHU \n"; 
         $sql.="  INNER JOIN USA_ZIPS ZIU ON SHU.ZIP_CODE=ZIU.ZIP_CODE  \n";
         $sql.="  INNER JOIN USA_CITIES CIU ON CIU.CITY_ID=ZIU.CITY_ID  \n";
         $sql.="  INNER JOIN USA_COUNTIES COU ON COU.COUNTY_ID=CIU.COUNTY_ID  \n";
         $sql.="  INNER JOIN USA_STATES STU ON COU.STATE_ID=STU.STATE_ID \n";
         $sql.="WHERE  1=1  \n";
         if (!(empty($nombre))){
         	$sql.="  AND SHU.NAME LIKE '%" . $nombre . "%'  \n";
         }
         if (!(empty($stateId))){
         	$sql.="  AND STU.STATE_ID ='" . $stateId . "'  \n";
         }
         if (!(empty($distance))){
         	  $sql.="  AND GETDISTANCE(" . $latitude . "," . $longitude . ", ZIU.LATITUDE, ZIU.LONGITUDE) <=" . $distance . " \n";         	
         }   
         if (!(empty($longitude))){ // la longitud y latitud no son cero, hay que ordenar por la distancia calculada
         	$sql.="ORDER BY  \n";
         	$sql.="  DISTANCE_KM  \n";
         }else if (!(empty($nombre))){ 
         	$sql.="ORDER BY  \n";
         	$sql.="  SHU.NAME  \n";
         }         
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         //fb($sql);
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $stm->bind_result($id, $number, $name, $zip, $url, $logoUrl, $email, $phone, $description, $streetAddress, $city, $county, $state, $distance); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new ShelterUsa();  
            $bean->setId($id);
            $bean->setNumber($number);
            $bean->setName($name);
            $bean->setZip($zip);
            $bean->setUrl($url);
            $bean->setLogoUrl($logoUrl);
            $bean->setEmail($email);
            $bean->setPhone($phone);
            $bean->setDescription($description);
            $bean->setStreetAddress($streetAddress);
            $bean->setCityName($city);
            $bean->setCountyName($county);
            $bean->setStateName($state);
            $bean->setDistancia($distance);
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 


      public function selTodosCuenta($nombre, $stateId, $latitude, $longitude, $distance){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM SHELTERS_USA SHU "; 
         $sql.="  INNER JOIN USA_ZIPS ZIU ON SHU.ZIP_CODE=ZIU.ZIP_CODE  \n";
         $sql.="  INNER JOIN USA_CITIES CIU ON CIU.CITY_ID=ZIU.CITY_ID  \n";
         $sql.="  INNER JOIN USA_COUNTIES COU ON COU.COUNTY_ID=CIU.COUNTY_ID  \n";
         $sql.="  INNER JOIN USA_STATES STU ON COU.STATE_ID=STU.STATE_ID \n";
         $sql.="WHERE  1=1  \n";
                   if (!(empty($nombre))){
         	$sql.="  AND SHU.NAME LIKE '%" . $nombre . "%'  \n";
         }
         if (!(empty($stateId))){
         	$sql.="  AND STU.STATE_ID ='" . $stateId . "'  \n";
         }    
         if (!(empty($latitude)) && !(empty($longitude)) && !(empty($distance))){
         	  $sql.="  AND GETDISTANCE(" . $latitude . "," . $longitude . ", ZIU.LATITUDE, ZIU.LONGITUDE) <=" . $distance . " \n";         	
         }              
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $cuenta=null; 
         $stm->bind_result($cuenta); 
         $stm->fetch();  
         $this->cierra($conexion, $stm); 
         return $cuenta; 
      } 

   } 
?>