<?php
  require_once '../config.php';
?>

<html>
<head>
    <title>Petzynga CMS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" type="text/css" href="extjs/resources/css/ext-all.css">
    <?php 
      if ($GLOBALS['debug']){
        echo "<script type='text/javascript' src='extjs/ext-all-dev.js'></script>";
      }else{
        echo "<script type='text/javascript' src='extjs/ext-all.js'></script>";
      }
      require_once '../configExt.php';
    ?>

    
    <link rel="stylesheet" type="text/css" href="resources/css/estiloCms.css">
    
    <script type="text/javascript" src="app/petcms4/combos/ComboRango1a5.js"></script>
     
    <script type="text/javascript" src="app/petcms4/combos/ComboDogSizes.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboDogPurposes.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboDogSheddingAmounts.js"></script>
    <script type="text/javascript" src="app/petcms4/combos/ComboDogSheddingFrequencies.js"></script>

    <script type="text/javascript" src="app/petcms4/util/subaFoto.js"></script>
     
     
    <script type="text/javascript" src="app/petcms4/abm/PanelFormCabeceraAbm.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/abm.js"></script>
     
    <!-- DogBreeds -->
    <script type="text/javascript" src="app/petcms4/abm/dogbreeds/FormDogBreeds.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/dogbreeds/BusquedaDogBreeds.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/dogbreeds/GrillaDogBreeds.js"></script>
    <script type="text/javascript" src="app/petcms4/abm/dogbreeds/PanelDogBreeds.js"></script>
     
    <!-- inicio -->
    <script type="text/javascript" src="app/petcms4/PanelMenuAcordeon.js"></script>
    <script type="text/javascript" src="app/petcms4/MenuAcordeon.js"></script>

    <script type="text/javascript" src="app.js"></script>
</head>
<body></body>
</html>