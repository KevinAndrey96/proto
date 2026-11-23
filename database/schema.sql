-- Promotional Campaign, Sweepstakes & Promo Code Validation Database
-- Auto-seeded on container initialization

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- -----------------------------------------------------
-- Table: Users
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Users` (
  `Id_User` int(11) NOT NULL AUTO_INCREMENT,
  `Document` varchar(50) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT '',
  `Pass` varchar(255) NOT NULL,
  `Role` varchar(50) DEFAULT 'admin',
  `Created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_User`),
  UNIQUE KEY `uq_document` (`Document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `Users` (`Id_User`, `Document`, `Name`, `Email`, `Pass`, `Role`) VALUES
(1, 'admin', 'Administrador Promocion', 'admin@promocion.local', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin'),
(2, 'operador', 'Operador Punto de Venta', 'operador@promocion.local', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'staff')
ON DUPLICATE KEY UPDATE `Name` = VALUES(`Name`);

-- -----------------------------------------------------
-- Table: Participants
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Participants` (
  `Id_Participant` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT '',
  `Telefono` varchar(50) DEFAULT '',
  `Acompanante` varchar(255) DEFAULT '',
  `Visita` datetime DEFAULT CURRENT_TIMESTAMP,
  `Codigo` varchar(50) DEFAULT 'NO',
  `OPC` varchar(100) DEFAULT '',
  `Estado_civil` varchar(50) DEFAULT '',
  `Edad` varchar(10) DEFAULT '',
  `Ocupacion` varchar(100) DEFAULT '',
  `Barrio` varchar(100) DEFAULT '',
  `Compras` varchar(255) DEFAULT '',
  `Observaciones` text DEFAULT NULL,
  PRIMARY KEY (`Id_Participant`)
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `Participants` (`Id_Participant`, `Nombre`, `Email`, `Telefono`, `Acompanante`, `Visita`, `Codigo`, `OPC`, `Estado_civil`, `Edad`, `Ocupacion`, `Barrio`, `Compras`, `Observaciones`) VALUES
(1001, 'Carlos Mendoza', 'carlos@demo.local', '3001234567', 'Maria Perez', NOW(), 'NO', 'Administrador Promocion', 'Casado', '32', 'Ingeniero', 'Chapinero', 'Electrodomesticos', 'Cliente frecuente tienda centro'),
(1002, 'Andrea Gomez', 'andrea@demo.local', '3109876543', 'Pedro Lopez', NOW(), 'NO', 'Operador Punto de Venta', 'Soltera', '28', 'Disenadora', 'Poblado', 'Tecnologia', 'Participante primera visita')
ON DUPLICATE KEY UPDATE `Nombre` = VALUES(`Nombre`);

SET FOREIGN_KEY_CHECKS = 1;
