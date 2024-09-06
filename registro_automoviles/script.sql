CREATE DATABASE gestion_automoviles;

USE gestion_automoviles;

CREATE TABLE automoviles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    anio INT NOT NULL,
    color VARCHAR(30) NOT NULL,
    placa VARCHAR(20) NOT NULL
);

INSERT INTO automoviles (marca, modelo, anio, color, placa) VALUES
("Toyota", "Agya", "2015", "Gris", "ABC123"),
('Toyota', 'Corolla', 2022, 'Blanco', 'ABC123'),
('Honda', 'Civic', 2021, 'Negro', 'XYZ789'),
('Ford', 'Focus', 2020, 'Rojo', 'LMN456'),
('Chevrolet', 'Malibu', 2023, 'Azul', 'QWE123'),
('Nissan', 'Altima', 2019, 'Gris', 'RTY456'),
('Hyundai', 'Elantra', 2022, 'Verde', 'UIO789'),
('Volkswagen', 'Jetta', 2021, 'Amarillo', 'PQR123'),
('BMW', 'Serie 3', 2020, 'Marrón', 'STU456'),
('Audi', 'A4', 2023, 'Plata', 'VWX789'),
('Mercedes-Benz', 'C-Class', 2019, 'Beige', 'YZA123');

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
           OR placa LIKE CONCAT('%', input, '%');
    END IF;
END //

DELIMITER ;

