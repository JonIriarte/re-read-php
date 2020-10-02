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
<!--Nuevo desarrollo: formulario para filtrar autor-->
<div class="formulario">
  <form action="ebooks.php" method="POST">
    <label for="fautor">Autor</label>
    <input type="text" id="fautor" name="fautor" placeholder="Introduce el autor...">

    <label for="country">País</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select> 
  
    <input type="submit" value="Buscar">
  </form>

</div>
<?php
  include '../services/connection.php'; 

    if(isset($_POST['fautor'])){

      //Filtro para los Ebooks que se mostrarán en la página
      $query="SELECT Books.Description, Books.img, Books.Title 
      FROM Books INNER JOIN BooksAuthors ON Id=BooksAuthors.BookId
      INNER JOIN Authors ON Authors.Id = BooksAuthors.AuthorId
      WHERE Authors.Name LIKE '%{$_POST['fautor']}%'";
    echo $query; 
      $result=mysqli_query($conn, $query); 
  
    }else{

      //Mostrar todos los eBooks de la DB
      //Conexión con la BBDD
    
      $result=mysqli_query($conn, "SELECT Books.Description, Books.img, Books.Title FROM books WHERE eBook !='0'"); 
    
    }
    if(!empty($result) && mysqli_num_rows($result) > 0 ){
      //Datos de salida de cada fila
      $i=0; 
      
      while($row = mysqli_fetch_array($result)){
        $i++; 
        echo "<div class='ebook'>"; 
        //Añadimos la imagen a la página con la etiqueta IMG de HTML
        echo "<img src=../img/".$row['img']." alt='".$row['Title']."'>"; 
        //Añadimos el título a la página con la etiqueta h2 de HTML
        echo "<div class='desc'>".$row['Description']." </div>"; 
        echo "</div>"; 
        if ($i%3==0) {
          echo "<div style=clear:both;'></div>"; 
        }
      }

    }else{
      echo "0 resultados"; 
    }
  ?>

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
</div>

</body>
</html>
