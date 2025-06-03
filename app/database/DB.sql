
CREATE DATABASE veterinaria;
USE veterinaria;

-- Tabla de propietarios
CREATE TABLE propietarios (
  idpropietario INT AUTO_INCREMENT PRIMARY KEY,
  apellidos VARCHAR(40) NOT NULL,
  nombres VARCHAR(40) NOT NULL,
  dni CHAR(8) NOT NULL,
  telefono VARCHAR(15),
  direccion VARCHAR(100)
) ENGINE=InnoDB;

-- Tabla de mascotas
CREATE TABLE mascotas (
  idmascota INT AUTO_INCREMENT PRIMARY KEY,
  idpropietario INT NOT NULL,
  tipo ENUM('Perro', 'Gato', 'Ave', 'Conejo') NOT NULL,
  nombre VARCHAR(40) NOT NULL,
  raza VARCHAR(40),
  color VARCHAR(40) NOT NULL,
  genero ENUM('macho', 'hembra') NOT NULL,
  fecha_nacimiento DATE,
  vive ENUM('si', 'no') NOT NULL DEFAULT 'si',
  CONSTRAINT fk_idpropietario FOREIGN KEY (idpropietario) REFERENCES propietarios(idpropietario)
) ENGINE=InnoDB;



-- Insertar propietarios
INSERT INTO propietarios (apellidos, nombres, dni, telefono, direccion) VALUES
('Perez', 'Juan', '12345678', '987654321', 'Av. Perú 123'),
('Gomez', 'Ana', '87654321', '912345678', 'Jr. Lima 456'),
('Torres', 'Luis', '45671234', '931234567', 'Calle Sol 789');

-- Insertar mascotas
INSERT INTO mascotas (idpropietario, tipo, nombre, raza, color, genero, fecha_nacimiento) VALUES
(1, 'Perro', 'Firulais', 'Labrador', 'Marrón', 'macho', '2020-06-15'),
(1, 'Gato', 'Matador', 'Siames', 'Chocolate', 'macho', '2021-08-20'),
(2, 'Perro', 'Rex', 'Pastor Alemán', 'Negro', 'macho', '2019-04-10'),
(2, 'Gato', 'Luna', 'Persa', 'Gris', 'hembra', '2022-02-12'),
(3, 'Ave', 'Piolín', 'Canario', 'Amarillo', 'macho', '2023-01-05'),
(3, 'Conejo', 'Nube', 'Mini Lop', 'Blanco', 'hembra', '2022-09-17');



SELECT 
  M.idmascota,
  M.nombre AS nombre_mascota,
  M.tipo,
  M.raza,
  M.color,
  M.genero,
  M.vive,
  DATE_FORMAT(M.fecha_nacimiento, '%d/%m/%Y') AS nacimiento,
  CONCAT(P.apellidos, ' ', P.nombres) AS propietario
FROM mascotas M
INNER JOIN propietarios P ON M.idpropietario = P.idpropietario
ORDER BY M.nombre;


DROP DATABASE veterinaria;