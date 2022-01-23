CREATE DATABASE colores;
use colores;

CREATE TABLE color
(
id INT PRIMARY KEY auto_increment,
nombre_color VARCHAR(45),
descripcion VARCHAR(60)
);


INSERT INTO color (nombre_color,descripcion) values ('primary','Esto es un color azul'),('warning','esto es un color amarillo para bootstrap');