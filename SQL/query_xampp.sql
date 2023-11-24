CREATE DATABASE proyecto_ambiente;
-- Usar la base de datos
USE proyecto_ambiente;
-- Crear la tabla usuario
CREATE TABLE usuarios (
    usuario varchar (30) NOT NULL ,
    passwor VARCHAR(30) not null,
    activo BOOLEAN not null,
    PRIMARY KEY (usuario)
);
CREATE TABLE proyectos (
    id_proyecto int AUTO_INCREMENT not null,
    nombre_proyecto VARCHAR(40) not null,
    fecha_inicio date not null,
    fecha_final date,
    PRIMARY KEY (id_proyecto)
);
CREATE TABLE empleados (
    id_empleado INT AUTO_INCREMENT NOT NULL,
    nombre_empleado VARCHAR(30) not null,
    apellidos VARCHAR(40) not null,
    correo VARCHAR(100) not null,
    rol BOOLEAN not null,
    activo BOOLEAN not null,
    usuario varchar (30) not null,
	fecha_registro datetime not null default current_timestamp,
    FOREIGN KEY (usuario) REFERENCES usuarios(usuario),
    PRIMARY KEY (id_empleado)
);
CREATE TABLE tareas (
    id_tareas int AUTO_INCREMENT not null,
    titulo VARCHAR(40) not null,
    horas int not null,
    proyecto_id int not null,
    empleado_id INT NOT NULL,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos(id_proyecto),
    FOREIGN KEY (empleado_id) REFERENCES empleados(id_empleado),
    PRIMARY KEY (id_tareas)
);
CREATE TABLE ProyectosAsignados (
    id_asignacion int AUTO_INCREMENT not null, 
    id_proyecto int not null,
    id_empleado INT NOT NULL,
    FOREIGN KEY (id_proyecto) REFERENCES proyectos(id_proyecto),
    FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado),
    PRIMARY KEY (id_asignacion)
);


-- Tentativo a funcionar no ha sido probado 
INSERT INTO proyecto_ambiente.usuarios (usuario, passwor, activo) VALUES
('grupo3', '123456', 1),
('oscar', '654321', 1);