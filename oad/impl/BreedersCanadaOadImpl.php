<?php 

require_once $GLOBALS['pathCms'] . '/oad/AOD.php';
require_once $GLOBALS['pathCms'] . '/oad/BreedersCanadaOad.php';
require_once $GLOBALS['pathCms'] . '/beans/BreederCanada.php';
//require_once('FirePHPCore/fb.php4'); 

   class BreedersCanadaOadImpl extends AOD implements BreedersCanadaOad { 

      public function obtiene($id){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  SHJ.ID,     \n"; 
         $sql.="  SHJ.NUMBER,     \n";
         $sql.="  SHJ.NAME,     \n"; 
         $sql.="  SHJ.ZIP_CODE,     \n"; 
         $sql.="  SHJ.URL,     \n"; 
         $sql.="  SHJ.URL_ENCODED,     \n";
         $sql.="  SHJ.LOGO_URL,     \n"; 
         $sql.="  SHJ.EMAIL,     \n"; 
         $sql.="  SHJ.PHONE,     \n"; 
         $sql.="  SHJ.DESCRIPTION,     \n"; 
         $sql.="  SHJ.STREET_ADDRESS,    \n"; 
         $sql.="  SHJ.PO_BOX,    \n";
         $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_1,    \n";
         $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_2,    \n";
         $sql.="  SHJ.COLLOQUIAL_AREA,    \n";
         $sql.="  SHJ.LOCALITY,    \n";
         $sql.="  SHJ.SUBLOCALITY_LEVEL_1,    \n";
         $sql.="  0 AS DISTANCE_KM, \n";
         $sql.="  SHJ.LATITUDE,     \n";
         $sql.="  SHJ.LONGITUDE     \n";
         $sql.="FROM  \n"; 
         $sql.="  BREEDERS_CANADA  SHJ \n"; 
         $sql.="  INNER JOIN CANADA_ZIPS ZIU ON SHJ.ZIP_CODE=ZIU.ZIP_CODE  \n";
         $sql.="WHERE  \n"; 
         $sql.="  SHJ.ID='" . $id . "' \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $bean=new BreederCanada();  
         $stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox, 
         		$adminArea1, $adminArea2, $collArea,  $locality, $subLocality1, 
         		$distance, $latitud, $longitud); 
         if ($stm->fetch()) { 
            $bean->setId($id);
            $bean->setNumber($number);
            $bean->setName($name);
            $bean->setZip($zip);
            $bean->setUrl($url);
            $bean->setUrlEncoded($urlEncoded);
            $bean->setLogoUrl($logoUrl);
            $bean->setEmail($email);
            $bean->setPhone($phone);
            $bean->setDescription($description);
            $bean->setStreetAddress($streetAddress);
            $bean->setPoBox($poBox);
            $bean->setAdminArea1($adminArea1);
            $bean->setAdminArea2($adminArea2);
            $bean->setCollArea($collArea);
            $bean->setLocality($locality);
            $bean->setSubLocality1($subLocality1);
            $bean->setDistancia(0);
            $bean->setLatitude($latitud);
            $bean->setLongitude($longitud);
         } 
         $this->cierra($conexion, $stm); 
         return $bean; 
      } 
      
      public function obtienePorNumero($number){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  SHJ.ID,     \n";
      	$sql.="  SHJ.NUMBER,     \n";
      	$sql.="  SHJ.NAME,     \n";
      	$sql.="  SHJ.ZIP_CODE,     \n";
      	$sql.="  SHJ.URL,     \n";
      	$sql.="  SHJ.URL_ENCODED,     \n";
      	$sql.="  SHJ.LOGO_URL,     \n";
      	$sql.="  SHJ.EMAIL,     \n";
      	$sql.="  SHJ.PHONE,     \n";
      	$sql.="  SHJ.DESCRIPTION,     \n";
      	$sql.="  SHJ.STREET_ADDRESS,    \n";
      	$sql.="  SHJ.PO_BOX,    \n";
        $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_1,    \n";
        $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_2,    \n";
        $sql.="  SHJ.COLLOQUIAL_AREA,    \n";
        $sql.="  SHJ.LOCALITY,    \n";
        $sql.="  SHJ.SUBLOCALITY_LEVEL_1,    \n";
      	$sql.="  0 AS DISTANCE_KM, \n";
      	$sql.="  SHJ.LATITUDE,    \n";
      	$sql.="  SHJ.LONGITUDE    \n";
        $sql.="FROM  \n"; 
        $sql.="  BREEDERS_CANADA  SHJ \n"; 
      	$sql.="WHERE  \n";
      	$sql.="  SHJ.NUMBER='" . $number . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new BreederCanada();
      	$stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox, 
      			$adminArea1, $adminArea2, $collArea,  $locality, $subLocality1, 
      			$distance, $latitud, $longitud); 
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setNumber($number);
      		$bean->setName($name);
      		$bean->setZip($zip);
      		$bean->setUrl($url);
      		$bean->setUrlEncoded($urlEncoded);
      		$bean->setLogoUrl($logoUrl);
      		$bean->setEmail($email);
      		$bean->setPhone($phone);
      		$bean->setDescription($description);
      		$bean->setStreetAddress($streetAddress);
      		$bean->setPoBox($poBox);
            $bean->setAdminArea1($adminArea1);
            $bean->setAdminArea2($adminArea2);
            $bean->setCollArea($collArea);
            $bean->setLocality($locality);
            $bean->setSubLocality1($subLocality1);
      		$bean->setDistancia(0);
      		$bean->setLatitude($latitud);
      		$bean->setLongitude($longitud);
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }   

      public function obtienePorUrlEncoded($urlEncoded){
      	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  SHJ.ID,     \n";
      	$sql.="  SHJ.NUMBER,     \n";
      	$sql.="  SHJ.NAME,     \n";
      	$sql.="  SHJ.ZIP_CODE,     \n";
      	$sql.="  SHJ.URL,     \n";
      	$sql.="  SHJ.URL_ENCODED,     \n";
      	$sql.="  SHJ.LOGO_URL,     \n";
      	$sql.="  SHJ.EMAIL,     \n";
      	$sql.="  SHJ.PHONE,     \n";
      	$sql.="  SHJ.DESCRIPTION,     \n";
      	$sql.="  SHJ.STREET_ADDRESS,    \n";
      	$sql.="  SHJ.PO_BOX,    \n";
        $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_1,    \n";
        $sql.="  SHJ.ADMINISTRATIVE_AREA_LEVEL_2,    \n";
        $sql.="  SHJ.COLLOQUIAL_AREA,    \n";
        $sql.="  SHJ.LOCALITY,    \n";
        $sql.="  SHJ.SUBLOCALITY_LEVEL_1,    \n";
      	$sql.="  0 AS DISTANCE_KM, \n";
      	$sql.="  SHJ.LATITUDE,    \n";
      	$sql.="  SHJ.LONGITUDE    \n";
      	$sql.="FROM  \n";
      	$sql.="  BREEDERS_CANADA  SHJ \n";
      	$sql.="WHERE  \n";
      	$sql.="  SHJ.URL_ENCODED='" . $urlEncoded . "' \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$bean=new BreederCanada();
      	$stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox, 
      			$adminArea1, $adminArea2, $collArea,  $locality, $subLocality1, 
      			$distance, $latitud, $longitud);
      	if ($stm->fetch()) {
      		$bean->setId($id);
      		$bean->setNumber($number);
      		$bean->setName($name);
      		$bean->setZip($zip);
      		$bean->setUrl($url);
      		$bean->setUrlEncoded($urlEncoded);
      		$bean->setLogoUrl($logoUrl);
      		$bean->setEmail($email);
      		$bean->setPhone($phone);
      		$bean->setDescription($description);
      		$bean->setStreetAddress($streetAddress);
      		$bean->setPoBox($poBox);
            $bean->setAdminArea1($adminArea1);
            $bean->setAdminArea2($adminArea2);
            $bean->setCollArea($collArea);
            $bean->setLocality($locality);
            $bean->setSubLocality1($subLocality1);
      		$bean->setDistancia(0);
      		$bean->setLatitude($latitud);
      		$bean->setLongitude($longitud);
      	}
      	$this->cierra($conexion, $stm);
      	return $bean;
      }      


      public function inserta($bean){ 
         $conexion=$this->conectarse(); 
         $sql="INSERT INTO BREEDERS_CANADA (   \n"; 
         $sql.="  ID,     \n"; 
         $sql.="  NAME,     \n"; 
         $sql.="  ZIP_CODE,     \n"; 
         $sql.="  URL,     \n"; 
         $sql.="  URL_ENCODED,     \n";
         $sql.="  LOGO_URL,     \n"; 
         $sql.="  EMAIL,     \n"; 
         $sql.="  PHONE,     \n"; 
         $sql.="  DESCRIPTION,     \n"; 
         $sql.="  STREET_ADDRESS,     \n"; 
         $sql.="  PO_BOX,     \n";
         $sql.="  LATITUDE,     \n";
         $sql.="  LONGITUDE,     \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_1,     \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_2,     \n";
         $sql.="  COLLOQUIAL_AREA,     \n";
         $sql.="  LOCALITY,     \n";
         $sql.="  SUBLOCALITY_LEVEL_1     \n";
         $sql.=") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)    \n"; 
         $nuevoId=$this->idUnico(); 
         $bean->setId($nuevoId); 
         $stm=$this->preparar($conexion, $sql); 
         $stm->bind_param("ssssssssssdddsssss",$bean->getId(), $bean->getName(), $bean->getZip(), $bean->getUrl(), $bean->getUrlEncoded(), $bean->getLogoUrl(), 
         		$bean->getEmail(), $bean->getPhone(), $bean->getDescription(), $bean->getStreetAddress(), $bean->getPoBox(), $bean->getLatitude(), $bean->getLongitude(),
         		$bean->getAdminArea1(), $bean->getAdminArea2(), $bean->getCollArea(), $bean->getLocality(), $bean->getSubLocality1()
         ); 
         return $this->ejecutaYCierra($conexion, $stm, $nuevoId); 
      } 


      public function borra($id){ 
         $conexion=$this->conectarse(); 
         $sql="DELETE FROM BREEDERS_CANADA   \n"; 
         $sql.="WHERE ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("s", $id);  
         return $this->ejecutaYCierra($conexion, $stm); 
      } 


      public function actualiza($bean){ 
         $conexion=$this->conectarse(); 
         $sql="UPDATE BREEDERS_CANADA SET   \n"; 
         $sql.="  NAME=?,     \n"; 
         $sql.="  ZIP_CODE=?,     \n"; 
         $sql.="  URL=?,     \n"; 
         $sql.="  URL_ENCODED=?,     \n";
         $sql.="  LOGO_URL=?,     \n"; 
         $sql.="  EMAIL=?,     \n"; 
         $sql.="  PHONE=?,     \n"; 
         $sql.="  DESCRIPTION=?,     \n"; 
         $sql.="  STREET_ADDRESS=?,     \n"; 
         $sql.="  PO_BOX=?,     \n";
         $sql.="  LATITUDE=?,     \n";
         $sql.="  LONGITUDE=?,    \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_1=?,     \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_2=?,     \n";
         $sql.="  COLLOQUIAL_AREA=?,     \n";
         $sql.="  LOCALITY=?,     \n";
         $sql.="  SUBLOCALITY_LEVEL_1=?     \n";         
         $sql.="WHERE ID=?   \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->bind_param("sssssssssdddssssss", $bean->getName(), $bean->getZip(), $bean->getUrl(), $bean->getUrlEncoded(), 
         		$bean->getLogoUrl(), $bean->getEmail(), $bean->getPhone(), $bean->getDescription(), $bean->getStreetAddress(), 
         		$bean->getPoBox(), $bean->getLatitude(), $bean->getLongitude(), 
         		$bean->getAdminArea1(), $bean->getAdminArea2(), $bean->getCollArea(), $bean->getLocality(), $bean->getSubLocality1(),
         		$bean->getId() ); 
         return $this->ejecutaYCierra($conexion, $stm); 
      } 

      
      public function selTodos($nombre, $prefectureName, $localityName, $latitude, $longitude, $distance, $specialBreedId, $desde, $cuantos){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT  \n"; 
         $sql.="  SHJ.ID,     \n"; 
         $sql.="  SHJ.NUMBER,     \n";
         $sql.="  SHJ.NAME,     \n"; 
         $sql.="  SHJ.ZIP_CODE,     \n"; 
         $sql.="  SHJ.URL,     \n"; 
         $sql.="  SHJ.URL_ENCODED,     \n";
         $sql.="  SHJ.LOGO_URL,     \n"; 
         $sql.="  SHJ.EMAIL,     \n"; 
         $sql.="  SHJ.PHONE,     \n"; 
         $sql.="  SHJ.DESCRIPTION,     \n"; 
         $sql.="  SHJ.STREET_ADDRESS,    \n"; 
         $sql.="  SHJ.PO_BOX,    \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_1,     \n";
         $sql.="  ADMINISTRATIVE_AREA_LEVEL_2,     \n";
         $sql.="  COLLOQUIAL_AREA,     \n";
         $sql.="  LOCALITY,     \n";
         $sql.="  SUBLOCALITY_LEVEL_1,     \n";
         $sql.="  DISTANCE_PYT(" . $latitude . "," . $longitude . ", SHJ.LATITUDE, SHJ.LONGITUDE) AS DISTANCE_KM, \n";
         $sql.="  SHJ.LATITUDE,    \n";
         $sql.="  SHJ.LONGITUDE    \n";
         $sql.="FROM  \n"; 
         $sql.="  BREEDERS_CANADA  SHJ \n"; 
         $sql.="WHERE  1=1  \n";
         if (!(empty($nombre))){
         	$sql.="  AND SHJ.NAME LIKE '%" . $nombre . "%'  \n";
         }
         if (!(empty($prefectureName))){
         	$sql.="  AND ADMINISTRATIVE_AREA_LEVEL_1 ='" . $prefectureName . "'  \n";
         }
         if (!(empty($localityName))){
         	$sql.="  AND LOCALITY ='" . $localityName . "'  \n";
         }
         if (!(empty($distance))){
         	  $sql.="  AND GETDISTANCE(" . $latitude . "," . $longitude . ", SHJ.LATITUDE, SHJ.LONGITUDE) <=" . $distance . " \n";         	
         }   
         if (!(empty($specialBreedId))){
         	$sql.="  AND SHJ.ID IN (SELECT DBS.BREEDER_ID FROM DOG_BREEDS_BY_BREEDER DBS WHERE DBS.DOG_BREED_ID='" . $specialBreedId . "' ) \n";
         }
         if (!(empty($longitude))){ // la longitud y latitud no son cero, hay que ordenar por la distancia calculada
         	$sql.="ORDER BY  \n";
         	$sql.="  DISTANCE_KM  \n";
         }else { 
         	$sql.="ORDER BY  \n";
         	$sql.="  SHJ.NAME  \n";
         }         
         $sql.="LIMIT " . $desde . ", " . $cuantos . "  \n"; 
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $stm->bind_result($id, $number, $name, $zip, $url, $urlEncoded, $logoUrl, $email, $phone, $description, $streetAddress, $poBox,
         		  $adminArea1, $adminArea2, $collArea,  $locality, $subLocality1, 
         		  $distance, $latitud, $longitud); 
         $filas = array(); 
         while ($stm->fetch()) { 
            $bean=new BreederCanada();  
            $bean->setId($id);
            $bean->setNumber($number);
            $bean->setName($name);
            $bean->setZip($zip);
            $bean->setUrl($url);
            $bean->setUrlEncoded($urlEncoded);
            $bean->setLogoUrl($logoUrl);
            $bean->setEmail($email);
            $bean->setPhone($phone);
            $bean->setDescription($description);
            $bean->setStreetAddress($streetAddress);
            $bean->setPoBox($poBox);
            $bean->setAdminArea1($adminArea1);
            $bean->setAdminArea2($adminArea2);
            $bean->setCollArea($collArea);
            $bean->setLocality($locality);
            $bean->setSubLocality1($subLocality1);
            $bean->setDistancia($distance);
            $bean->setLatitude($latitud);
            $bean->setLongitude($longitud);  
            $filas[$id]=$bean; 
         } 
         $this->cierra($conexion, $stm); 
         return $filas; 
      } 
      
      public function selProvinciasDeBreeders(){
            	$conexion=$this->conectarse();
      	$sql="SELECT  \n";
      	$sql.="  ADMINISTRATIVE_AREA_LEVEL_1,  \n";
      	$sql.="  COUNT(*)  \n";
      	$sql.="FROM  \n";
      	$sql.="  BREEDERS_CANADA   \n";
      	$sql.="GROUP BY  1 \n";
      	$sql.="ORDER BY  1 \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->bind_result($name, $amount);
      	$filas = array();
      	while ($stm->fetch()) {
      		$filas[]=array('name' => $name, 'amount' => $amount);
      	}
      	$this->cierra($conexion, $stm);
      	return $filas;
      } 


      public function selTodosCuenta($nombre, $prefectureName, $localityName, $latitude, $longitude, $distance, $specialBreedId){ 
         $conexion=$this->conectarse(); 
         $sql="SELECT COUNT(*) FROM BREEDERS_CANADA SHJ "; 
         $sql.="WHERE  1=1  \n";
         if (!(empty($nombre))){
         	$sql.="  AND SHJ.NAME LIKE '%" . $nombre . "%'  \n";
         }
         if (!(empty($prefectureName))){
         	$sql.="  AND ADMINISTRATIVE_AREA_LEVEL_1 ='" . $prefectureName . "'  \n";
         }
         if (!(empty($localityName))){
         	$sql.="  AND LOCALITY ='" . $localityName . "'  \n";
         }
         if (!(empty($latitude)) && !(empty($longitude)) && !(empty($distance))){
         	  $sql.="  AND DISTANCE_PYT(" . $latitude . "," . $longitude . ", SHJ.LATITUDE, SHJ.LONGITUDE) <=" . $distance . " \n";         	
         } 
         if (!(empty($specialBreedId))){
         	$sql.="  AND SHJ.ID IN (SELECT DBS.BREEDER_ID FROM DOG_BREEDS_BY_BREEDER DBS WHERE DBS.DOG_BREED_ID='" . $specialBreedId . "' ) \n";
         }         
         $stm=$this->preparar($conexion, $sql);  
         $stm->execute();  
         $cuenta=null; 
         $stm->bind_result($cuenta); 
         $stm->fetch();  
         $this->cierra($conexion, $stm); 
         return $cuenta; 
      } 
      
      public function vinculaDogBreedABreeder($breederId, $dogBreedId){
      	$conexion=$this->conectarse();
      	$sql="INSERT INTO DOG_BREEDS_BY_BREEDER (   \n";
      	$sql.="  DOG_BREED_ID,     \n";
      	$sql.="  BREEDER_ID     \n";
      	$sql.=")VALUES (?, ?)    \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->bind_param("ss", $dogBreedId, $breederId);
      	$stm->execute();
      	$stm->close();
      	$conexion->close();
      	$res=array();
      	$res['success']=true;
      	return $res;
      }
      
      public function desvinculaDogBreedDeBreeder($breederId, $dogBreedId){
      	$conexion=$this->conectarse();
      	$sql="DELETE FROM DOG_BREEDS_BY_BREEDER    \n";
      	$sql.="WHERE      \n";
      	$sql.="  BREEDER_ID ='" . $breederId  . "'     \n";
      	$sql.="  AND DOG_BREED_ID ='" . $dogBreedId  . "'     \n";
      	$stm=$this->preparar($conexion, $sql);
      	$stm->execute();
      	$stm->close();
      	$conexion->close();
      	$res=array();
      	$res['success']=true;
      	return $res;
      }      

   } 
?>