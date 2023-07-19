<?php

// Indicamos que trabajaremos en directorio que estamos situados (__DIR__)
//Incluimos el fichero de configuración 
require_once('../config/config.php');

//Incluimos la clase conexion a la base de datos
require_once('../libs/database.php');

// Incluimos la clase usuario
require_once('../model/users.php');

// Incluimos la clase libro
require_once('../model/books.php');



//Creamos la instancia de la clase conexion a la base de datos
$database = new database();

//Llamamos el metodo conexion que es quien nos retorna la conexion a la base de datos
$connection = $database -> getConnection();

//Creamos la instancia del modelo usuario y pasamos la conexion a la base de datos
$usersModel = new users ($connection);

//Creamos la instancia del modelo libro y le pasamos la conexion a la base de datos
$booksModel = new books ($connection);



/**
 * Listamos todos los usuarios
 */
$users = $usersModel -> getAll();

/**
 * Listamos los libros
 */
$books = $booksModel -> getAll();

/**
 * Listamos los libros relacionados con un autor
 */
$booksUsers = $booksModel -> getRel(1);

/**
 * Listamos un libro filtrado por su identificador primario
 */
$books = $booksModel -> getById(1);


echo json_encode($users);
echo json_encode($books);