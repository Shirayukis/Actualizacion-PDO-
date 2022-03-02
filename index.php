<?php include('BDconect.php');?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Actualizar información</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },3000);

});
</script>
</head>

<body>

<!-- comienzo del container -->

<div class="container">
<?php
    
if(isset($_POST['actualizar'])){
///////////// Informacion enviada por el formulario /////////////
$datosSQL = array(
  $id=trim($_POST['id']),
  $email=trim($_POST['email']),
  $termino=trim($_POST['termino']),
  $definicion=trim($_POST['definicion']),
  $estatus=trim($_POST['estatus']),
  $fecha_reg = date('Y-m-d'),
);
///////// Fin informacion enviada por el formulario /// 

////////////// Actualizar la tabla /////////
$consulta = "UPDATE datos
SET `email`= :email, `termino` = :termino, `definicion` = :definicion, `estatus` = :estatus, `fecha_reg` = :fecha_reg
WHERE `Id` = :id";
$sql = $connect->prepare($consulta);
$sql->bindParam(':email',$email,PDO::PARAM_STR, 40);
$sql->bindParam(':termino',$termino,PDO::PARAM_STR, 25);
$sql->bindParam(':definicion',$definicion,PDO::PARAM_STR,150);
$sql->bindParam(':estatus',$estatus,PDO::PARAM_STR,25);
$sql->bindParam(':fecha_reg',$fecha_reg,PDO::PARAM_STR);
$sql->bindParam(':Id',$id,PDO::PARAM_INT);

$sql->execute($datosSQL);/*---------------------------------------------------------------------------------------------------*/

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo "<div class='content alert alert-primary' > 

  
Gracias: $count registro ha sido actualizado  </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pudo actulizar el registro  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>
  <h3 class="mt-5">Actualizar información</h3>
  <!--<hr>-->
  <div class="row">
<?php 
if (isset($_POST['editar'])){
$id = $_POST['Id'];
$sql= "SELECT * FROM datos WHERE Id = :id"; 
$stmt = $connect->prepare($sql);
$stmt->bindParam(':Id', $id, PDO::PARAM_INT); 
$stmt->execute($datosSQL);/*-------------------------------------------------------------------------------------------------*/
$obj = $stmt->fetchObject();
 
?>
    <div class="col-12 col-md-12"> 

<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input value="<?php echo $obj->id;?>" name="id" type="hidden">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombres">Email</label>
      <input value="<?php echo $obj->email;?>" name="nombres" type="text" class="form-control" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="edad">Termino</label>
      <input value="<?php echo $obj->termino;?>" name="apellidos" type="text" class="form-control" id="termino" placeholder="Termino">
    </div>
  </div>
<div class="form-row">  
    <div class="form-group col-md-6">
      <label for="profesion">Definicion</label>
      <input value="<?php echo $obj->definicion;?>" name="profesion" type="text" class="form-control" id="definicion" placeholder="Definicion">
    </div>

  <div class="form-group col-md-6">
    <label for="Estado">Estatus</label>
    <select required name="estado" class="form-control" id="estatus">
    <option value="<?php echo $obj->estatus;?>"><?php echo $obj->estado;?></option>        
    <!--<option value=""><< >></option>-->
    <option value="Capturado">Capturado</option>
    <option value="Publicado">Publicado</option>
    </select>
  </div>

</div>
<div class="form-group">
  <button name="actualizar" type="submit" class="btn btn-primary  btn-block">Actualizar Registro</button>
</div>
</form>
    </div>  
<?php }?>
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->

<h1></h1>

<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="thead-dark">
    <th width="18%">Email</th>
    <th width="22%">Termino</th>
    <th width="22%">Definicion</th>
    <th width="14%">Estatus</th>
    <th width="13%">Fecha registro</th>
    <th width="13%"></th>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM datos"; 
$query = $connect -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo "<tr>
<td>".$result -> email."</td>
<td>".$result -> termino."</td>
<td>".$result -> definicion."</td>
<td>".$result -> estatus."</td>
<td>".$result -> fecha_reg."</td>
<td>
<form method='POST' action='".$_SERVER['PHP_SELF']."'>
<input type='hidden' name='id' value='".$result -> id."'>
<button name='editar'>Editar</button>
</form>
</td>
</tr>";

   }
 }
?>
</tbody>
</table>
</div>
</form>
   </div>  
  </div>
       <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="dist/js/bootstrap.min.js"></script> 
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>