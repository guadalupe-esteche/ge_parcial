--
-- Base de datos: `ge_parcial`
--

CREATE DATABASE ge_parcial;
USE ge_parcial;
-- --------------------------------------------------------
-- Tabla para usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para publicaciones del blog
CREATE TABLE publicaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    contenido TEXT NOT NULL,
    fecha_publicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    autor_id INT,
    FOREIGN KEY (autor_id) REFERENCES usuarios(id)
);

-- Tabla para comentarios
CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenido TEXT NOT NULL,
    fecha_comentario TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    publicacion_id INT,
    autor_id INT,
    FOREIGN KEY (publicacion_id) REFERENCES publicaciones(id),
    FOREIGN KEY (autor_id) REFERENCES usuarios(id)
);
select * from usuarios;

