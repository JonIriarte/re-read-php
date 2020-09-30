<?php
$host='localhost'; 
$user='root'; 
$pass=''; 
$db='reread'; 

//Conexión
$conn = mysqli_connect($host,$user,$pass,$db); 

//Comprobar conexión
if(!$conn){
echo 'Error. No se pudo conectar a MySql' . PHP.EOL; 
echo 'Error de depuración' . mysqli_connect_errno() . PHP.EOL; 
exit; 
}else{
mysqli_set_charset($conn,'utf8'); 

}
/*OOP
//Conexión
$conn= new mysqli('localhost', 'root', '', 'imagenes'); 
 
if($connn->connect_errno){
    die(''Error. No se pudo conectar a MySql: . $conn->connect_errno);
}else{
$conn->set_charset('utf8')

}
*/
?>