-- crear la db
CREATE DATABASE IF NOT EXISTS crud_app;
-- seleccionar la db
USE crud_app;
-- crear una tabla
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
);

