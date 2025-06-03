
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
('Torres', 'Luis', '45671234', '931234567', 'Calle Sol 789'),
('Ramirez', 'Carla', '12398745', '987321654', 'Av. Los Álamos 555'),
('Fernandez', 'Mario', '78945612', '989898989', 'Calle Robles 321'),
('Salazar', 'Lucía', '45678912', '934567890', 'Jr. Amazonas 741'),
('Cabrera', 'Andrés', '65412378', '911122233', 'Av. Central 222'),
('Vargas', 'Elena', '87651234', '922334455', 'Pasaje Las Flores 909');


-- Insertar mascotas
INSERT INTO mascotas (idpropietario, tipo, nombre, raza, color, genero, fecha_nacimiento) VALUES
(1, 'Perro', 'Firulais', 'Labrador', 'Marrón', 'macho', '2020-06-15'),
(1, 'Gato', 'Matador', 'Siames', 'Chocolate', 'macho', '2021-08-20'),
(2, 'Perro', 'Rex', 'Pastor Alemán', 'Negro', 'macho', '2019-04-10'),
(2, 'Gato', 'Luna', 'Persa', 'Gris', 'hembra', '2022-02-12'),
(3, 'Ave', 'Piolín', 'Canario', 'Amarillo', 'macho', '2023-01-05'),
(3, 'Conejo', 'Nube', 'Mini Lop', 'Blanco', 'hembra', '2022-09-17'),
(4, 'Gato', 'Michi', 'Angora', 'Blanco', 'hembra', '2021-11-05'),
(4, 'Perro', 'Max', 'Golden Retriever', 'Dorado', 'macho', '2020-01-23'),
(5, 'Conejo', 'Tambor', 'Enano', 'Gris', 'macho', '2022-06-18'),
(5, 'Ave', 'Coco', 'Loro', 'Verde', 'macho', '2023-03-09'),
(6, 'Perro', 'Princesa', 'Poodle', 'Blanco', 'hembra', '2018-12-01'),
(6, 'Gato', 'Sombra', 'Bombay', 'Negro', 'hembra', '2020-09-13'),
(7, 'Perro', 'Rocky', 'Bulldog', 'Marrón', 'macho', '2019-05-25'),
(8, 'Ave', 'Chispa', 'Periquito', 'Azul', 'hembra', '2023-04-14'),
(8, 'Conejo', 'Copito', 'Cabeza de León', 'Blanco', 'macho', '2021-10-30'),
(8, 'Perro', 'Toby', 'Beagle', 'Tricolor', 'macho', '2017-03-08');



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