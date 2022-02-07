<?php 


session_start();


$conn = mysqli_connect(
    'localhost', /*nombre del dominio*/ 
    'root',/*usuario*/
    '',/*password*/
    'datacrud'/**nombre de la db */
);
 

?>