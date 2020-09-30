</head><!DOCTYPE html>
include '../services/connection.php' 
<html lang="en">
<head>
<title>Nuestro Proyecto Re-Read</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/styles.css">

</head>
<body>

<div class="logo">
  <h1>Re-Read</h1>
</div> 
<div class="header">
  <h1>Re-Read</h1>
  <p>En Re-Read podrás encontrar libros de segunda mano en perfecto estado. También vender los tuyos. Porque siempre hay libros leídos y libros por leer. Por eso Re-compramos y Re-vendemos para que nunca te quedes sin ninguno de los dos.</p>
</div>

<div class="column left">
  <div class="topnav">
    <a href="../index.php">Re-Read</a>
    <a href="libros.php">Libros</a>
    <a href="./ebooks.php">eBooks</a>
  </div>
    <h3>Todos los libros tienen el mismo precio</h3>
    <p>Libros casi nuevos a un precio casi imposible.</p>
    <!--Imágenes con precio de los libros-->
    <div class="alineacionImg">
      <img src="../img/1-libro-3€.gif" alt="Imagen 1">
    </div>
    <div class="alineacionImg">
      <img src="../img/2-libros-5€.gif" alt="Imagen 2">
    </div>
    <div class="alineacionImg">
      <img src="../img/5-libros-10€.gif" alt="Imagen 3">

    </div>
    <h3>¿Te cambias de piso? ¿Tienes que vaciar la casa? ¿O sencillamente necesitas algo más de espacio?</h3>
    <p>En Re-Read compramos tus libros para darles una segunda vida. Los compramos todos al mismo precio: 0,20 euros.
       Siempre hay libros leídos y libros por leer.
       Por eso Re-compramos y Re-vendemos para que nunca te quedes sin ninguno de los dos.
    </p>
    

  </div>

  
    <!--Columna de la derecha--> 
    <div class="column right">
    <h2> Top Ventas</h2>
    <?php
    include '../services/connection.php'; 
    $result=mysqli_query($conn, "SELECT  Books.Title FROM books WHERE Top ='1'");

    if(!empty($result) && mysqli_num_rows($result) > 0 ){
        //Datos de salida de cada fila=row
        while ($row = mysqli_fetch_array($result)){
          echo "<p>".$row['Title']."</>"; 
        }

      }else{
        echo "0 resultados"; 
      }
    ?>
</div>

</body>
</html>
