<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/beans/DogBreed.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/petzynga/svc/impl/DogBreedsSvcImpl.php';
  header("Content-Type: text/plain; charset=utf-8");

  $url=$_SERVER['PHP_SELF'];
   
  $arr=explode("/", $url);
  $ultimo=array_pop($arr);

if ($ultimo=='selecciona'){
		//parametros de paginación
		$desde=$_REQUEST['start'];
		$cuantos=$_REQUEST['limit'];
		$nombreOParte=$_REQUEST['nombreOParte'];
		$initial=$_REQUEST['initial'];
		
		$svc = new DogBreedsSvcImpl();
		$beans=$svc->selecciona($nombreOParte, $desde, $cuantos);
		$cuenta=$svc->seleccionaCuenta($nombreOParte);
		
		$datos=array();
		foreach ($beans as $bean){
		  $arrBean=array();
		  $arrBean['dogBreedId']=$bean->getId();
		  $arrBean['dogBreedName']=$bean->getNombre();
		  $arrBean['dogSizeId']=$bean->getSizeId();
		  $arrBean['dogSizeName']=$bean->getSizeName();
		  $arrBean['dogPurposeId']=$bean->getPurposeId();
		  $arrBean['dogPurposeName']=$bean->getPurposeName();
		  $arrBean['dogSheddingAmountId']=$bean->getSheddingAmountId();
		  $arrBean['dogSheddingAmountName']=$bean->getSheddingAmountName();
		  $arrBean['dogSheddingFrequencyId']=$bean->getSheddingFrequencyId();
		  $arrBean['dogSheddingFrequencyName']=$bean->getSheddingFrequencyName();
		  $arrBean['mainFeatures']=$bean->getMainFeatures();
		  $arrBean['colors']=$bean->getColors();
		  $arrBean['sizeMin']=$bean->getSizeMin();
		  $arrBean['sizeMax']=$bean->getSizeMax();
		  $arrBean['weightMin']=$bean->getWeightMin();
		  $arrBean['weightMax']=$bean->getWeightMax();
		  $arrBean['foodAmount']=$bean->getFoodAmount();
		  $arrBean['friendlyRank']=$bean->getFriendlyRank();
		  $arrBean['friendlyText']=$bean->getFriendlyText();
		  $arrBean['activeRank']=$bean->getActiveRank();
		  $arrBean['activeText']=$bean->getActiveText();
		  $arrBean['healthyRank']=$bean->getHealthyRank();
		  $arrBean['healthyText']=$bean->getHealthyText();
		  $arrBean['trainingRank']=$bean->getTrainingRank();
		  $arrBean['trainingText']=$bean->getTrainingText();
		  $arrBean['guardianRank']=$bean->getGuardianRank();
		  $arrBean['guardianText']=$bean->getGuardianText();
		  $arrBean['groomingRank']=$bean->getGroomingRank();
		  $arrBean['groomingText']=$bean->getGroomingText();
		  $arrBean['pictureUrl']=$bean->getPictureUrl();
		  $arrBean['videoUrl']=$bean->getVideoUrl();
		  $arrBean['habilitada']=$bean->getHabilitada();
		  $datos[]=$arrBean;
		}  
		$resultado=array();
		$resultado['total']=$cuenta;
		$resultado['data']=$datos;
		echo json_encode($resultado) ;

   } else if ($ultimo=='inserta'){
	   	$bean=new DogBreed(); 
		$svc = new DogBreedsSvcImpl();
		$bean->setNombre($_REQUEST['dogBreedName']);
		$bean->setSizeId($_REQUEST['dogSizeId']);
		$bean->setPurposeId($_REQUEST['dogPurposeId']);
		$bean->setSheddingAmountId($_REQUEST['dogSheddingAmountId']);
		$bean->setSheddingFrequencyId($_REQUEST['dogSheddingFrequencyId']);
		$bean->setMainFeatures($_REQUEST['mainFeatures']);
	    $bean->setColors($_REQUEST['colors']);
	    $bean->setSizeMin($_REQUEST['sizeMin']);
	    $bean->setSizeMax($_REQUEST['sizeMax']);
	    $bean->setWeightMin($_REQUEST['weightMin']);
	    $bean->setWeightMax($_REQUEST['weightMax']);
	    $bean->setFoodAmount($_REQUEST['foodAmount']);
	    $bean->setFriendlyRank($_REQUEST['friendlyRank']);
	    $bean->setFriendlyText($_REQUEST['friendlyText']);
	    $bean->setActiveRank($_REQUEST['activeRank']);
	    $bean->setActiveText($_REQUEST['activeText']);
	    $bean->setHealthyRank($_REQUEST['healthyRank']);
	    $bean->setHealthyText($_REQUEST['healthyText']);
	    $bean->setTrainingRank($_REQUEST['trainingRank']);
	    $bean->setTrainingText($_REQUEST['trainingText']);
	    $bean->setGuardianRank($_REQUEST['guardianRank']);
	    $bean->setGuardianText($_REQUEST['guardianText']);
	    $bean->setGroomingRank($_REQUEST['groomingRank']);
	    $bean->setGroomingText($_REQUEST['groomingText']);
	    $bean->setPictureUrl($_REQUEST['pictureUrl']);
	    $bean->setVideoUrl($_REQUEST['videoUrl']);
		$exito=$svc->inserta($bean);
		echo json_encode($exito) ;
 
  } else if ($ultimo=='actualiza'){
		$bean=new DogBreed();
		$bean->setId($_REQUEST['dogBreedId']);
		$bean->setNombre($_REQUEST['dogBreedName']);
		$bean->setSizeId($_REQUEST['dogSizeId']);
		$bean->setPurposeId($_REQUEST['dogPurposeId']);
		$bean->setSheddingAmountId($_REQUEST['dogSheddingAmountId']);
		$bean->setSheddingFrequencyId($_REQUEST['dogSheddingFrequencyId']);
		$bean->setMainFeatures($_REQUEST['mainFeatures']);
	    $bean->setColors($_REQUEST['colors']);
	    $bean->setSizeMin($_REQUEST['sizeMin']);
	    $bean->setSizeMax($_REQUEST['sizeMax']);
	    $bean->setWeightMin($_REQUEST['weightMin']);
	    $bean->setWeightMax($_REQUEST['weightMax']);
	    $bean->setFoodAmount($_REQUEST['foodAmount']);
	    $bean->setFriendlyRank($_REQUEST['friendlyRank']);
	    $bean->setFriendlyText($_REQUEST['friendlyText']);
	    $bean->setActiveRank($_REQUEST['activeRank']);
	    $bean->setActiveText($_REQUEST['activeText']);
	    $bean->setHealthyRank($_REQUEST['healthyRank']);
	    $bean->setHealthyText($_REQUEST['healthyText']);
	    $bean->setTrainingRank($_REQUEST['trainingRank']);
	    $bean->setTrainingText($_REQUEST['trainingText']);
	    $bean->setGuardianRank($_REQUEST['guardianRank']);
	    $bean->setGuardianText($_REQUEST['guardianText']);
	    $bean->setGroomingRank($_REQUEST['groomingRank']);
	    $bean->setGroomingText($_REQUEST['groomingText']);
	    $bean->setPictureUrl($_REQUEST['pictureUrl']);
	    $bean->setVideoUrl($_REQUEST['videoUrl']);
	    $bean->setHabilitada(1);
		$svc = new DogBreedsSvcImpl();
		$exito=$svc->actualiza($bean);
		echo json_encode($exito) ;	
  
  } else if ($ultimo=='borra'){
	$svc = new DogBreedsSvcImpl();
	$exito=$svc->borra($_REQUEST['id']);
	echo json_encode($exito) ;	

  } else if ($ultimo=='inhabilita'){
	$svc = new DogBreedsSvcImpl();
	$exito=$svc->inhabilita($_REQUEST['id']);
	echo json_encode($exito) ;	
  }

?>