</head><!DOCTYPE html>

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
    <a href="./libros.php">Libros</a>
    <a href="./ebooks.php">eBooks</a>
  </div>
  <h3>Toda la actualidad en eBook</h3>
    <!--eBooks con descripción-->
   <!--
    <div class="ebook">
        <img src="../img/cell.jpeg" alt="eBook 1">
    </div>
    -->
   <?php
    //Conexión con la BBDD
    include '../services/connection.php'; 
    $result=mysqli_query($conn, "SELECT Books.Description, Books.Img, Books.Title FROM books WHERE eBook !='0'"); 

    if(!empty($result) && mysqli_num_rows($result) > 0 ){
      //Datos de salida de cada fila
      while ($row = mysqli_fetch_array($result)){
        echo "<div class='ebook'>"; 
        //Añadimos la imagen a la página con la etiqueta IMG de HTML
        echo "<img src=../img/".$row['img']." alt='".$row['Title']."'>"; 
        //Añadimos el título a la página con la etiqueta h2 de HTML
        //echo "<div class='desc'".$row['Title']." </div>; 
        echo "</div>"; 
      }

    }else{
      echo "0 resultados"; 
    }
   ?>

</div>
  
<div class="column right">
    <h2>Top Ventas</h2>
    <p>Cien años de soledad.</p>
    <p>Crónica de una muerte anunciada.</p>
    <p>El otoño del patriarca.</p>
    <p>El general en su laberinto.</p>
  </div>
</div>

</body>
</html>
