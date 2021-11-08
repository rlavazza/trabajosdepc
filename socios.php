<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Listado socio</title>
</head>
<body>
<?PHP
      $datosCA = array();
      $datosCA["nombre"]= "Roxana";
      $datosCA["apellido"]= "Lavazza";
      $datosCA["edad"]=49;
      $datosCA["email"]="rlavazza@gmail.com";
      $datosCA["dni"]= 22353226;
       
      $datosCB = array();
      $datosCB["nombre"]= "Facundo";
      $datosCB["apellido"]= "Lopez";
      $datosCB["edad"]= 36;
      $datosCB["email"]="faculopeza@gmail.com";
      $datosCB["dni"]= 34525682;

      $datosCC = array();
      $datosCC["nombre"]= "Agustina";
      $datosCC["apellido"]= "Porto";
      $datosCC["edad"]= 20;
      $datosCC["email"]="agus@gmail.com";
      $datosCC["dni"]=  41228350;
      
      $datosCD = array();
      $datosCD["nombre"]= "Matilda";
      $datosCD["apellido"]= "Suarez";
      $datosCD["edad"]= 28;
      $datosCD["email"]="matusuarez@gmail.com";
      $datosCD["dni"]= 36259774 ;

      $datosCE = array();
      $datosCE["nombre"]= "Mateo";
      $datosCE["apellido"]= "Fernandez";
      $datosCE["edad"]= 42;
      $datosCE["email"]="fernamateo@gmail.com";
      $datosCE["dni"]= 30998221;

      $datosCF = array();
      $datosCF["nombre"]= "Florencia";
      $datosCF["apellido"]= "Souto";
      $datosCF["edad"]= 54;
      $datosCF["email"]="fsouto@gmail.com";
      $datosCF["dni"]= 18526369;
  
    $registro[0]=$datosCA;
    $registro[1]=$datosCB;
    $registro[2]=$datosCC;
    $registro[3]=$datosCD;
    $registro[4]=$datosCE;
    $registro[5]=$datosCF;
   
    ?>

<div class="container mt-5">
 <div class="row text-center">
<div class="col-12 col-sm-3 border"><h2>Nombre y apellido</h2></div>
<div class="col-12 col-sm-1 border"><h2>Edad</h2></div>
<div class="col-12 col-sm-2 border"><h2>DNI</h2></div>
<div class="col-12 col-sm-4 border"><h2>Email</h2></div>
</div>

  <?php for ($i=0; $i <count ($registro); $i++){  ?>
        <div class="row">
        <div class="col-12 col-sm-3 border"><?php echo $registro[$i]["nombre"]. " " .$registro[$i]["apellido"] ?> </div>
        <div class="col-12 col-sm-1 text-center border"><?php echo $registro[$i]["edad"]?> </div>
        <div class="col-12 col-sm-2 text-center border"><?php echo $registro[$i]["dni"]?> </div>
        <div class="col-12 col-sm-4 text-center border"><?php echo $registro[$i]["email"] ?> </div>
        </div>
        <?php  
          } 
        ?> 
    </div>
      
</body>
</html>
