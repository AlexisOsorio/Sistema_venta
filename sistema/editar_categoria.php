<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombre'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $id_cate = $_GET['id'];
    $nombre = $_POST['nombre'];

    $sql_update = mysqli_query($conexion, "UPDATE categorias SET nombre = '$nombre' WHERE id_cate = $id_cate");
    $alert = '<p>Categpria Actualizada</p>';
  }
}

// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_categoria.php");
}
$id_cate = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM categorias WHERE id_cate = $id_cate");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_categoria.php");
} else {
  if ($data = mysqli_fetch_array($sql)) {
    $nombre = $data['nombre'];
  }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <form class="" action="" method="post">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id" value="<?php echo $id_cate; ?>">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" placeholder="Ingrese Categoria" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Categoria</button>
        <a href="lista_categoria.php" class="btn btn-danger">Regresar</a>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>