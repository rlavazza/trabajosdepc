<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Listado clientes</title>
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
   
    echo "<div class=\"container mt-5\">";
    echo "<div class=\"row\">";
    echo "<div class=\"col-12 col-sm-3 border\"><b>Nombre y apellido</b></div>";
    echo "<div class=\"col-12 col-sm-1 border text-center\"><b>Edad</b></div>";
    echo "<div class=\"col-12 col-sm-2 border text-center\"><b> DNI</b></div>";
    echo "<div class=\"col-12 col-sm-3 border text-center\"> <b>Email</b></div>";
    echo "</div>";

    for ($i=0; $i <count ($registro); $i++){
        echo "<div class=\"row\">";
        echo "<div class=\"col-12 col-sm-3 border\">".$registro[$i]["nombre"]. " " .$registro[$i]["apellido"]. "</div>";
        echo "<div class=\"col-12 col-sm-1 border text-center\">".$registro[$i]["edad"]. "</div>";
        echo "<div class=\"col-12 col-sm-2 border text-center\">".$registro[$i]["dni"]. "</div>";
        echo "<div class=\"col-12 col-sm-3 border text-center\">".$registro[$i]["email"]. "</div>";
        echo "</div>";
        
    }
    echo "</div>";

  ?>
    
</body>
</html>