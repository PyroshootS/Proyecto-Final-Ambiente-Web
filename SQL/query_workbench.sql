drop schema if exists proyecto_ambiente ;
drop user if exists usuario;
 
CREATE Schema proyecto_ambiente;
CREATE USER 'usuario'@'%' IDENTIFIED BY 'clave';
GRANT ALL PRIVILEGES ON proyecto_ambiente .* TO 'usuario'@'%';
FLUSH PRIVILEGES;
 
-- Usar la base de datos
USE proyecto_ambiente;
 
-- Crear la tabla usuario
CREATE TABLE usuarios (
    usuario varchar (60) NOT NULL ,
    passwor VARCHAR(30) not null,
    activo BOOLEAN not null,
    PRIMARY KEY (usuario)
)
Engine = InnoDB;
 
-- Crear la tabla proyectos
CREATE TABLE proyectos (
    id_proyecto int auto_increment not null,
    nombre_proyecto VARCHAR(40) not null,
    fecha_inicio date not null,
    fecha_final date,
    PRIMARY KEY (id_proyecto)
)
Engine = InnoDB;
 
-- Crear la tabla empleados
CREATE TABLE empleados (
    id_empleado INT auto_increment NOT NULL,
    nombre_empleado VARCHAR(30) not null,
    apellidos VARCHAR(40) not null,
    correo VARCHAR(100) not null,
    rol BOOLEAN not null,
    activo BOOLEAN not null,
    usuario varchar (30) not null,
	fecha_registro datetime not null default current_timestamp,
    FOREIGN KEY (usuario) REFERENCES usuarios(usuario),
    PRIMARY KEY (id_empleado)
)
Engine = InnoDB;
 
-- Crear la tabla tareas
CREATE TABLE tareas (
    id_tareas int auto_increment not null,
    titulo VARCHAR(40) not null,
    horas int  not null,
    proyecto_id int  not null,
    empleado_id INT NOT NULL,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos(id_proyecto),
    FOREIGN KEY (empleado_id) REFERENCES empleados(id_empleado),
    PRIMARY KEY (id_tareas)
)
Engine = InnoDB;
 
CREATE TABLE ProyectosAsignados (
id_asignacion int auto_increment not null, 
id_proyecto int  not null,
id_empleado INT  NOT NULL,
FOREIGN KEY (id_proyecto) REFERENCES proyectos(id_proyecto),
FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado),
PRIMARY KEY (id_asignacion)
)
Engine = InnoDB;

INSERT INTO proyecto_ambiente.usuarios (usuario, passwor, activo) VALUES
('grupo3@dominio.com', '123456', 1),
('oscar@dominio.com', '654321', 1);

-- Insertar un proyecto con fecha final especificada
INSERT INTO proyectos (nombre_proyecto, fecha_inicio, fecha_final)
VALUES ('Proyecto A', '2023-01-01', '2023-06-30');
-- Insertar otro proyecto sin fecha final
INSERT INTO proyectos (nombre_proyecto, fecha_inicio)
VALUES ('Proyecto B', '2023-03-15');
INSERT INTO proyectos (nombre_proyecto, fecha_inicio, fecha_final)
VALUES ('Proyecto C', '2023-05-10', '2023-12-31');

-- Insertar empleados
INSERT INTO empleados (nombre_empleado, apellidos, correo, rol, activo, usuario)
VALUES ('Juan', 'Pérez', 'juan@dominio.com', 1, 1, 'grupo3@dominio.com');

INSERT INTO empleados (nombre_empleado, apellidos, correo, rol, activo, usuario)
VALUES ('Ana', 'Gómez', 'ana@dominio.com', 0, 1, 'grupo3@dominio.com');

-- Insertar tareas
INSERT INTO tareas (titulo, horas, proyecto_id, empleado_id)
VALUES ('Tarea 1', 10, 1, 1);

INSERT INTO tareas (titulo, horas, proyecto_id, empleado_id)
VALUES ('Tarea 2', 8, 1, 2);

INSERT INTO tareas (titulo, horas, proyecto_id, empleado_id)
VALUES ('Tarea 3', 12, 2, 1);

INSERT INTO tareas (titulo, horas, proyecto_id, empleado_id)
VALUES ('Tarea 4', 6, 2, 2);

-- Insertar proyectos asignados
INSERT INTO ProyectosAsignados (id_proyecto, id_empleado)
VALUES (1, 1);

INSERT INTO ProyectosAsignados (id_proyecto, id_empleado)
VALUES (1, 2);

INSERT INTO ProyectosAsignados (id_proyecto, id_empleado)
VALUES (2, 1);

INSERT INTO ProyectosAsignados (id_proyecto, id_empleado)
VALUES (2, 2);




