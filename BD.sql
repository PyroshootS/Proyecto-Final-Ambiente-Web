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
    usuario varchar (30) NOT NULL ,
    passwor VARCHAR(30) not null,
    activo BOOLEAN not null,
    PRIMARY KEY (usuario)
)
Engine = InnoDB;

-- Crear la tabla proyectos
CREATE TABLE proyectos (
    id_proyecto int (30) not null,
    nombre_proyecto VARCHAR(40) not null,
    fecha_inicio date not null,
    fecha_final date,
    PRIMARY KEY (id_proyecto)
)
Engine = InnoDB;

-- Crear la tabla empleados
CREATE TABLE empleados (
    id_empleado INT (30) NOT NULL,
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
    id_tareas int (30) not null,
    titulo VARCHAR(40) not null,
    horas int(30) not null,
    proyecto_id int (30) not null,
    empleado_id INT (30) NOT NULL,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos(id_proyecto),
    FOREIGN KEY (empleado_id) REFERENCES empleados(id_empleado),
    PRIMARY KEY (id_tareas)
)
Engine = InnoDB;

CREATE TABLE ProyectosAsignados (
id_proyecto int (30) not null,
id_empleado INT (30) NOT NULL,
FOREIGN KEY (id_proyecto) REFERENCES proyectos(id_proyecto),
FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleado),
PRIMARY KEY (id_proyecto)
)
Engine = InnoDB;