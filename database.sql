CREATE DATABASE IF NOT EXISTS videogames_db;
USE videogames_db;

-- TABLA DE USUARIOS
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE,
    email VARCHAR(100),
    password VARCHAR(150),
    avatar VARCHAR(150),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- TABLA DE COMENTARIOS
CREATE TABLE IF NOT EXISTS comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    comentario VARCHAR(255),
    likes INT DEFAULT 0,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- TABLA DE PUNTUACIONES
CREATE TABLE IF NOT EXISTS puntuaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    juego VARCHAR(100),
    puntuacion INT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(id_usuario) REFERENCES usuarios(id)
);
