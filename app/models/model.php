<?php
function dbConnect(){
    try{
        return new PDO('mysql:host=localhost;dbname=composer;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch(Exception $e){
        die($e->getMessage());  

    }
}