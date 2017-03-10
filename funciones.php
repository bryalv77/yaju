<?php
$pathImg = "http://localhost/sabados/Proyecto Final/imagenes/";
$maxReg = 20; //Número de registros por página
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yaju";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
function FechaCompacta($fecha){
            $fechaconformato=date("Y-m-d",$fecha);   
            return $fechaconformato; 
        }
function FechaCorta($fecha){
            $fechaconformato=date("d-m-Y",$fecha);
            $dia= substr($fechaconformato,0,2); 
            $mes= substr($fechaconformato,3,2);
            $año= substr($fechaconformato,6,4);
            if($mes=="01")
                $mesenletras="ene";
            else if($mes=="02")
                $mesenletras="feb";
            else if($mes=="03")
                $mesenletras="mar";
            else if($mes=="04")
                $mesenletras="abr";
            else if($mes=="05")
                $mesenletras="may";
            else if($mes=="06")
                $mesenletras="jun";
            else if($mes=="07")
                $mesenletras="jul";
            else if($mes=="08")
                $mesenletras="ago";
            else if($mes=="09")
                $mesenletras="sep";
            else if($mes=="10")
                $mesenletras="oct";
            else if($mes=="11")
                $mesenletras="nov";
            else if($mes=="12")
                $mesenletras="dic";
                        
            $cad=$cad.$dia." de ".$mesenletras." de ".$año;    
            return $cad;
        }

echo("<!DOCTYPE html>");
?>