create database veterinaria;
use veterinaria;

create table propietarios (
  idpropietario int auto_increment primary key,
  apellidos varchar(40) not null,
  nombres varchar(40) not null
)engine=InnoDB;

create table mascotas (
  idmascota int auto_increment primary key,
  idpropietario int not null,
  tipo enum('Perro', 'Gato') not null,
  nombre varchar(40) not null,
  color varchar(40) not null,
  genero enum('macho', 'hembra') not null,
  vive enum('si', 'no') not null DEFAULT 'si',
  constraint fk_idpropietario foreign key (idpropietario) references propietarios(idpropietario)
)engine=InnoDB;

INSERT INTO propietarios (apellidos, nombres) VALUES
('Perez', 'Juan'),
('Gomez', 'Ana');

INSERT INTO mascotas (idpropietario, tipo, nombre, color, genero) VALUES
(1, 'Perro', 'Firulais', 'Marron', 'macho'),
(1, 'Gato', 'Miau', 'Blanco', 'hembra'),
(2, 'Perro', 'Rex', 'Negro', 'macho'),
(2, 'Gato', 'Luna', 'Gris', 'hembra');


UPDATE mascotas set
 idpropietario = 1,
 tipo = 'Gato',
 nombre = 'Matador',
 color = 'Chocolate',
 genero = 'macho'
WHERE idmascota =2;
-- ELIMINAR
DROP DATABASE veterinaria;
SELECT * FROM mascotas;

SELECT 
  MA.idmascota,
  CONCAT(PR.apellidos,' ', PR.nombres) 'propietario'
  FROM mascotas MA 
  INNER JOIN propietarios PR ON ma.idpropietario = PR.idpropietario
  ORDER BY MA.nombre;
