CREATE DATABASE gestion_automoviles;

USE gestion_automoviles;

CREATE TABLE automoviles (
    placa VARCHAR(10) PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    anio INT NOT NULL,
    color VARCHAR(30) NOT NULL,
    tipo_vehiculo VARCHAR(20) NOT NULL
);

INSERT INTO automoviles (placa, marca, modelo, anio, color, tipo_vehiculo) VALUES
('ABC123', 'Toyota', 'Agya', 2015, 'Gris', 'Hatchback'),
('ABC124', 'Toyota', 'Corolla', 2022, 'Blanco', 'Sedan'),
('XYZ789', 'Honda', 'Civic', 2021, 'Negro', 'Sedan'),
('LMN456', 'Ford', 'Focus', 2020, 'Rojo', 'Hatchback'),
('QWE123', 'Chevrolet', 'Malibu', 2023, 'Azul', 'Sedan'),
('RTY456', 'Nissan', 'Altima', 2019, 'Gris', 'Sedan'),
('UIO789', 'Hyundai', 'Elantra', 2022, 'Verde', 'Sedan'),
('PQR123', 'Volkswagen', 'Jetta', 2021, 'Amarillo', 'Sedan'),
('STU456', 'BMW', 'Serie 3', 2020, 'Marrón', 'Sedan'),
('VWX789', 'Audi', 'A4', 2023, 'Plata', 'Sedan'),
('YZA123', 'Mercedes-Benz', 'C-Class', 2019, 'Beige', 'Sedan');

DELIMITER //

CREATE PROCEDURE BuscarAutomoviles (IN input VARCHAR(255))
BEGIN
    IF input = '' THEN
        -- Si el input está vacío, seleccionar todos los registros
        SELECT * FROM automoviles;
    ELSE
        -- Si el input no está vacío, aplicar el filtro de búsqueda
        SELECT * 
        FROM automoviles
        WHERE marca LIKE CONCAT('%', input, '%')
           OR modelo LIKE CONCAT('%', input, '%')
           OR anio LIKE CONCAT('%', input, '%')
           OR color LIKE CONCAT('%', input, '%')
           OR placa LIKE CONCAT('%', input, '%')
           OR tipo_vehiculo LIKE CONCAT('%', input, '%');
    END IF;
END //

DELIMITER ;

CREATE TABLE propietario (
    cedula VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    telefono VARCHAR(15) NOT NULL,  
    entidad VARCHAR(30) NOT NULL
);

CREATE TABLE propietario_automoviles (
    placa VARCHAR(10),
    cedula VARCHAR(20),
    fecha DATE NOT NULL,
    PRIMARY KEY (placa, cedula),
    FOREIGN KEY (placa) REFERENCES automoviles(placa) ON DELETE CASCADE,
    FOREIGN KEY (cedula) REFERENCES propietario(cedula) ON DELETE CASCADE
);
