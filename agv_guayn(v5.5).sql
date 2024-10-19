-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2024 a las 04:09:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agv_guayn`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_habitaciones_disponibles_totales` (IN `p_IDHotel` INT)   BEGIN
    DECLARE total_disponibles INT;

    -- Calcular el total de habitaciones disponibles
    SELECT habitacionesDisponiblesSingle + habitacionesDisponiblesDouble + habitacionesDisponiblesFamily
    INTO total_disponibles
    FROM hotel
    WHERE IDHotel = p_IDHotel;

    -- Actualizar el campo habitacionesDisponiblesTotales
    UPDATE hotel
    SET habitacionesDisponiblesTotales = total_disponibles
    WHERE IDHotel = p_IDHotel;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_plazas_disponibles_totales` (IN `p_IDVuelo` INT)   BEGIN
    DECLARE total_disponibles INT;
    
    -- Calcular el total de plazas disponibles
    SELECT plazasDisponiblesPrimeraClase + plazasDisponiblesEjecutiva + plazasDisponiblesEconomica
    INTO total_disponibles	
    FROM vuelo
    WHERE IDVuelo = p_IDVuelo;
    
    -- Actualizar el campo plazasDisponiblesTotales
    UPDATE vuelo
    SET plazasDisponiblesTotales = total_disponibles
    WHERE IDVuelo = p_IDVuelo;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('danuel.unu@gmail.xom|127.0.0.1', 'i:1;', 1716842490),
('danuel.unu@gmail.xom|127.0.0.1:timer', 'i:1716842490;', 1716842490),
('franky.bach0@gmail.com|127.0.0.1', 'i:1;', 1714161912),
('franky.bach0@gmail.com|127.0.0.1:timer', 'i:1714161912;', 1714161912),
('katialara@gmail.com|127.0.0.1', 'i:1;', 1713577799),
('katialara@gmail.com|127.0.0.1:timer', 'i:1713577799;', 1713577799);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasevuelo`
--

CREATE TABLE `clasevuelo` (
  `IDClaseVuelo` smallint(6) NOT NULL,
  `descripcionClase` varchar(100) NOT NULL,
  `estado` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clasevuelo`
--

INSERT INTO `clasevuelo` (`IDClaseVuelo`, `descripcionClase`, `estado`) VALUES
(1, 'PRIMERA CLASE', 1),
(2, 'CLASE EJECUTIVA', 1),
(3, 'CLASE ECONÓMICA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `NIFCliente` bigint(20) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `telefono` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`NIFCliente`, `nombre`, `ciudad`, `telefono`, `email`, `estado`) VALUES
(1, 'JAVIER HERNÁNDEZ', 'COLIMA', '3121457892', 'paco_xx26@hotmail.com', 1),
(2, 'CARLOS RUÍZ', 'COLIMA', '312123152', 'paco_xxyy@hotmail.com', 1),
(3, 'OCTAVIO LOZANO', 'COLIMA', '3121241131', 'paco_xxyy@hotmail.com', 1),
(4, 'JUAN PEREZ', 'CIUDAD DE MEXICO', '5512345678', 'juan.perez@example.com', 1),
(5, 'LAURA MARTINEZ', 'MONTERREY', '8112345678', 'laura.mtz@example.com', 1),
(6, 'CARLOS HERNANDEZ', 'GUADALAJARA', '3312345678', 'carlos.hdz@example.com', 1),
(7, 'MANUEL TRUJILLO', 'COLIMA', '3122439308', 'paco_xx01@hotmail.com', 1),
(8, 'JAVIER RAMIREZ', 'COLIMA', '312151551', 'jiguel@hotmail.com', 1),
(9, 'FRANK SUAREZ', 'COLIMA', '3121441133', 'paco_xyzt@gmail.com', 1),
(10, 'KATIA LARA PADILLA', 'WEST HEAVEN', '5522883119', 'katialara@gmail.com', 1),
(11, 'ROBERTO', 'CULIACAN', '32127584', 'bach@gmai.com', 1),
(12, 'ENRIQUE', 'TOLUCA', '4214657891', 'enp.312@gmail.com', 1),
(13, 'DANIEL AVALOS', 'COLIMA', '3121093000', 'danuel.unu@gmail.com', 1),
(14, 'OCTAVIO NOEL', 'COLIMA', '3121115678', 'octan2@gmail.com', 1),
(15, 'NOE', 'COLIMA', '3121143781', 'norland114@gmail.com', 1),
(16, 'RAUL', 'VILLA DE ALVAREZ', '3121245678', 'rau78.01@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_reserv_vuelo_hotel`
--

CREATE TABLE `detail_reserv_vuelo_hotel` (
  `IDDetalleReservarVueloH` bigint(20) NOT NULL,
  `IDVuelo` bigint(20) DEFAULT NULL,
  `IDClaseVuelo` smallint(6) DEFAULT NULL,
  `IDHotel` smallint(6) DEFAULT NULL,
  `IDReservacion` bigint(20) DEFAULT NULL,
  `IDRegimenHospedaje` bigint(20) DEFAULT NULL,
  `fechahoraLlegada` datetime DEFAULT NULL,
  `fechahoraSalida` datetime DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fechaHoraRegimen` datetime DEFAULT NULL,
  `fechaHoraRegFin` datetime DEFAULT NULL,
  `tipoHabitacion` varchar(20) DEFAULT NULL,
  `numeroPersonas` int(11) DEFAULT NULL,
  `boletos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detail_reserv_vuelo_hotel`
--

INSERT INTO `detail_reserv_vuelo_hotel` (`IDDetalleReservarVueloH`, `IDVuelo`, `IDClaseVuelo`, `IDHotel`, `IDReservacion`, `IDRegimenHospedaje`, `fechahoraLlegada`, `fechahoraSalida`, `estado`, `fechaHoraRegimen`, `fechaHoraRegFin`, `tipoHabitacion`, `numeroPersonas`, `boletos`) VALUES
(1, 1, NULL, NULL, 1, NULL, '2024-04-15 14:30:00', '2024-04-15 13:00:00', 1, NULL, NULL, NULL, NULL, '[{\"clase\":\"2\",\"cantidad\":\"1\"}]'),
(2, NULL, NULL, 1, 2, 2, NULL, NULL, 1, '2024-04-12 08:11:00', '2024-04-14 23:45:00', 'double', 2, NULL),
(3, 3, NULL, 9, 3, 2, '2024-04-17 21:30:00', '2024-04-17 20:00:00', 1, '2024-05-17 21:30:00', '2024-05-24 10:45:00', 'family', 3, '[{\"clase\":\"1\",\"cantidad\":\"1\"},{\"clase\":\"1\",\"cantidad\":\"1\"},{\"clase\":\"1\",\"cantidad\":\"1\"}]'),
(4, 4, NULL, 2, 6, 1, '2024-04-17 06:56:00', '2024-04-16 06:56:00', 1, '2024-04-17 07:00:00', '2024-04-28 23:35:00', 'family', 5, '[{\"clase\":\"2\",\"cantidad\":\"1\"},{\"clase\":\"2\",\"cantidad\":\"1\"},{\"clase\":\"3\",\"cantidad\":\"1\"},{\"clase\":\"3\",\"cantidad\":\"1\"}]'),
(5, 1, NULL, NULL, 7, NULL, '2024-04-15 14:30:00', '2024-04-15 13:00:00', 1, NULL, NULL, NULL, NULL, '[{\"clase\":\"2\",\"cantidad\":\"1\"}]');

--
-- Disparadores `detail_reserv_vuelo_hotel`
--
DELIMITER $$
CREATE TRIGGER `actualizar_plazas_disponibles` AFTER INSERT ON `detail_reserv_vuelo_hotel` FOR EACH ROW BEGIN
    DECLARE boletos_count INT;
    DECLARE i INT DEFAULT 0;
    DECLARE clase VARCHAR(255);
    DECLARE cantidad INT;

    -- Contar el número de boletos en el JSON
    SET boletos_count = JSON_LENGTH(NEW.boletos);

    -- Recorrer cada boleto en el JSON
    WHILE i < boletos_count DO
        SET clase = JSON_UNQUOTE(JSON_EXTRACT(NEW.boletos, CONCAT('$[', i, '].clase')));
        SET cantidad = CAST(JSON_UNQUOTE(JSON_EXTRACT(NEW.boletos, CONCAT('$[', i, '].cantidad'))) AS UNSIGNED);

        -- Disminuir plazas según la clase de vuelo
        IF clase = '1' THEN -- Primera Clase
            UPDATE vuelo 
            SET plazasDisponiblesPrimeraClase = plazasDisponiblesPrimeraClase - cantidad 
            WHERE IDVuelo = NEW.IDVuelo;
        ELSEIF clase = '2' THEN -- Clase Ejecutiva
            UPDATE vuelo 
            SET plazasDisponiblesEjecutiva = plazasDisponiblesEjecutiva - cantidad 
            WHERE IDVuelo = NEW.IDVuelo;
        ELSEIF clase = '3' THEN -- Clase Económica
            UPDATE vuelo 
            SET plazasDisponiblesEconomica = plazasDisponiblesEconomica - cantidad 
            WHERE IDVuelo = NEW.IDVuelo;
        END IF;

        -- Incrementar el índice
        SET i = i + 1;
    END WHILE;

    -- Llamar al procedimiento para actualizar plazas disponibles totales
    CALL actualizar_plazas_disponibles_totales(NEW.IDVuelo);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `conteoHabitacion` AFTER INSERT ON `detail_reserv_vuelo_hotel` FOR EACH ROW BEGIN
    IF NEW.tipoHabitacion IS NOT NULL THEN
        CASE 
            WHEN NEW.tipoHabitacion = 'single' THEN
                UPDATE hotel 
                SET singleRooms = singleRooms - 1 
                WHERE IDHotel = NEW.IDHotel;
            WHEN NEW.tipoHabitacion = 'double' THEN
                UPDATE hotel 
                SET doubleRooms = doubleRooms - 1 
                WHERE IDHotel = NEW.IDHotel;
            WHEN NEW.tipoHabitacion = 'family' THEN
                UPDATE hotel 
                SET familyRooms = familyRooms - 1 
                WHERE IDHotel = NEW.IDHotel;
        END CASE;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `disminuir_habitaciones_disponibles` AFTER INSERT ON `detail_reserv_vuelo_hotel` FOR EACH ROW BEGIN
    DECLARE tipoHabitacion VARCHAR(255);

    SET tipoHabitacion = NEW.tipoHabitacion;

    IF tipoHabitacion = 'single' THEN
        UPDATE hotel 
        SET habitacionesDisponiblesSingle = habitacionesDisponiblesSingle - 1
        WHERE IDHotel = NEW.IDHotel;
    ELSEIF tipoHabitacion = 'double' THEN
        UPDATE hotel 
        SET habitacionesDisponiblesDouble = habitacionesDisponiblesDouble - 1
        WHERE IDHotel = NEW.IDHotel;
    ELSEIF tipoHabitacion = 'family' THEN
        UPDATE hotel 
        SET habitacionesDisponiblesFamily = habitacionesDisponiblesFamily - 1
        WHERE IDHotel = NEW.IDHotel;
    END IF;

    -- Llamar al procedimiento para actualizar el total de habitaciones disponibles
    CALL actualizar_habitaciones_disponibles_totales(NEW.IDHotel);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `disminuir_plazas_vuelo` AFTER INSERT ON `detail_reserv_vuelo_hotel` FOR EACH ROW BEGIN
    DECLARE boletos_count INT;
    DECLARE i INT DEFAULT 0;
    DECLARE clase VARCHAR(255);
    DECLARE cantidad INT;

    -- Contar el número de boletos en el JSON
    SET boletos_count = JSON_LENGTH(NEW.boletos);

    -- Log para depuración
    INSERT INTO trigger_log (message) VALUES (CONCAT('boletos_count: ', boletos_count));

    -- Recorrer cada boleto en el JSON
    WHILE i < boletos_count DO
        SET clase = JSON_UNQUOTE(JSON_EXTRACT(NEW.boletos, CONCAT('$[', i, '].clase')));
        SET cantidad = CAST(JSON_UNQUOTE(JSON_EXTRACT(NEW.boletos, CONCAT('$[', i, '].cantidad'))) AS UNSIGNED);

        -- Log para depuración
        INSERT INTO trigger_log (message) VALUES (CONCAT('clase: ', clase, ', cantidad: ', cantidad));

        -- Disminuir plazas según la clase de vuelo
        IF clase = '1' THEN -- Primera Clase
            UPDATE vuelo 
            SET plazasDisponiblesPrimeraClase = plazasDisponiblesPrimeraClase - cantidad 
            WHERE IDVuelo = NEW.IDVuelo;
            -- Log para depuración
            INSERT INTO trigger_log (message) VALUES (CONCAT('Updated Primera Clase, new plazasDisponiblesPrimeraClase: ', (SELECT plazasDisponiblesPrimeraClase FROM vuelo WHERE IDVuelo = NEW.IDVuelo)));
        ELSEIF clase = '2' THEN -- Clase Ejecutiva
            UPDATE vuelo 
            SET plazasDisponiblesEjecutiva = plazasDisponiblesEjecutiva - cantidad 
            WHERE IDVuelo = NEW.IDVuelo;
            -- Log para depuración
            INSERT INTO trigger_log (message) VALUES (CONCAT('Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: ', (SELECT plazasDisponiblesEjecutiva FROM vuelo WHERE IDVuelo = NEW.IDVuelo)));
        ELSEIF clase = '3' THEN -- Clase Económica
            UPDATE vuelo 
            SET plazasDisponiblesEconomica = plazasDisponiblesEconomica - cantidad 
            WHERE IDVuelo = NEW.IDVuelo;
            -- Log para depuración
            INSERT INTO trigger_log (message) VALUES (CONCAT('Updated Clase Económica, new plazasDisponiblesEconomica: ', (SELECT plazasDisponiblesEconomica FROM vuelo WHERE IDVuelo = NEW.IDVuelo)));
        END IF;

        -- Incrementar el índice
        SET i = i + 1;
    END WHILE;

    -- Llamar al procedimiento para actualizar plazas disponibles totales
    CALL actualizar_plazas_disponibles_totales(NEW.IDVuelo);

    INSERT INTO trigger_log (message) VALUES ('Trigger finished executing');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `IDHotel` smallint(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `numEstrellas` smallint(6) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `ciudad` varchar(62) NOT NULL,
  `telefono` varchar(18) NOT NULL,
  `singleRooms` int(11) NOT NULL DEFAULT 0,
  `doubleRooms` int(11) NOT NULL DEFAULT 0,
  `familyRooms` int(11) NOT NULL DEFAULT 0,
  `totalRooms` int(11) NOT NULL DEFAULT 0,
  `habitacionesDisponiblesSingle` int(11) DEFAULT 0,
  `habitacionesDisponiblesDouble` int(11) DEFAULT 0,
  `habitacionesDisponiblesFamily` int(11) DEFAULT 0,
  `habitacionesDisponiblesTotales` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`IDHotel`, `nombre`, `numEstrellas`, `estado`, `ciudad`, `telefono`, `singleRooms`, `doubleRooms`, `familyRooms`, `totalRooms`, `habitacionesDisponiblesSingle`, `habitacionesDisponiblesDouble`, `habitacionesDisponiblesFamily`, `habitacionesDisponiblesTotales`) VALUES
(1, 'HOTEL CONDESOR', 4, 1, 'CIUDAD DE MÉXICO', '+52 452 123 8745', 46, 48, 20, 114, 46, 48, 20, 114),
(2, 'HOTEL MONTERREY LUX', 5, 1, 'MONTERREY', '+52 412 310 128', 46, 52, 31, 129, 46, 52, 30, 128),
(3, 'HOTEL GUADALAJARA VALLE', 3, 1, 'GUADALAJARA', '+52 125 215 142', 33, 30, 27, 90, 33, 30, 27, 90),
(4, 'HOTEL NUEVA LUNA', 5, 1, 'COLIMA', '+52 312 310 1123', 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'HOTEL SOL NACIENTE', 4, 1, 'VILLA DE ÁLVAREZ', '+52 312 312 128', 28, 19, 24, 71, 28, 19, 24, 71),
(6, 'SUPERSTAR', 5, 1, 'MANZANILLO', '+52 311 125 1147', 46, 30, 22, 98, 46, 30, 22, 98),
(7, 'HAMPTON', 5, 1, 'WEST HAVEN-CONNECTICUT', '+1 800-HAMPTON', 100, 79, 44, 223, 100, 79, 44, 223),
(8, 'EL TRAPICHE', 4, 1, 'COLIMA', '+52 312 310 1527', 16, 26, 20, 62, 16, 26, 20, 62),
(9, 'EL NAVEGANTE', 4, 1, 'COLIMA', '+52 312 252 3125', 45, 61, 36, 142, 45, 61, 35, 141),
(10, 'NUEVA LUZ', 5, 1, 'LEÓN', '411344114', 32, 35, 36, 103, 32, 34, 36, 102),
(11, 'LUXURY', 5, 1, 'CALIFORNIA', '+1 418311211', 46, 40, 31, 117, 46, 40, 31, 117),
(12, 'SAN FRANCISCO VILLA', 4, 1, 'COLIMA', '+52 31231011', 30, 39, 28, 97, 30, 39, 28, 97),
(13, 'BUENAVISTA AZUL', 4, 1, 'VILLA DE ALVAREZ', '3121141679', 20, 25, 20, 65, 20, 25, 20, 65);

--
-- Disparadores `hotel`
--
DELIMITER $$
CREATE TRIGGER `update_total_rooms` BEFORE UPDATE ON `hotel` FOR EACH ROW BEGIN
    IF OLD.singleRooms <> NEW.singleRooms OR OLD.doubleRooms <> NEW.doubleRooms OR OLD.familyRooms <> NEW.familyRooms THEN
        SET NEW.totalRooms = NEW.singleRooms + NEW.doubleRooms + NEW.familyRooms;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_13_020831_add_nuevo_campo_to_vuelo_table', 2),
(5, '2024_04_22_232423_drop_nifcliente_column_from_detail_reserv_vuelo_hotel_table', 3),
(6, '2024_04_23_192557_drop_detail_vuelo_cliente_table', 4),
(7, '2024_04_25_184005_add_fecha_hora_reg_detail_reserv_vuelo_hotel', 5),
(8, '2024_04_25_184417_add_fecha_hora_reg_detail_reserv_vuelo_hotel', 6),
(9, '2024_05_20_232603_add_clase_asientos_to_vuelo_table', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regimen_hospedaje`
--

CREATE TABLE `regimen_hospedaje` (
  `IDRegimenH` bigint(20) NOT NULL,
  `descripcionRegimen` varchar(32) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `regimen_hospedaje`
--

INSERT INTO `regimen_hospedaje` (`IDRegimenH`, `descripcionRegimen`, `estado`) VALUES
(1, 'DESAYUNO INCLUIDO', 0),
(2, 'TODO INCLUIDO', 0),
(3, 'SOLO HABITACIÓN', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `IDReservacion` bigint(20) NOT NULL,
  `IDSucursal` smallint(6) NOT NULL,
  `NIFCliente` bigint(20) NOT NULL,
  `fechaReservacion` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `IDVuelo` bigint(20) DEFAULT NULL,
  `IDHotel` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`IDReservacion`, `IDSucursal`, `NIFCliente`, `fechaReservacion`, `estado`, `IDVuelo`, `IDHotel`) VALUES
(1, 6, 1, '2024-04-12 20:10:00', 1, 1, NULL),
(2, 2, 2, '2024-04-11 20:10:00', 1, NULL, 1),
(3, 3, 3, '2024-05-16 22:15:00', 1, NULL, NULL),
(6, 11, 4, '2024-04-15 23:35:00', 1, NULL, NULL),
(7, 6, 7, '2024-04-12 06:01:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hhluCtCLH5d1tPQJh6QAtJTwFKXDTirn4px5gQco', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS3NnUW5sVVlkanhRd0ZPY0U5VGxkYVI3ZTBoVk9mNmRPSHFuSXFXdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1717195916);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `IDSucursal` smallint(6) NOT NULL,
  `codigoSucursal` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ciudad` varchar(80) NOT NULL,
  `provincia` varchar(80) NOT NULL,
  `nombreSucursal` varchar(32) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `noExt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`IDSucursal`, `codigoSucursal`, `direccion`, `ciudad`, `provincia`, `nombreSucursal`, `estado`, `noExt`) VALUES
(1, 1001, 'PASEO DE LA REFORMA 250', 'CIUDAD DE MÉXICO', 'REFORMA', 'SUCURSAL REFORMA', 1, '148-D'),
(2, 1002, 'AV. CONSTITUCION #1558', 'MONTERREY', 'NUEVO LEON', 'SUCURSAL MONTERREY', 1, '2111'),
(3, 1003, 'AV. VALLARTA 5000', 'GUADALAJARA', 'JALISCO', 'SUCURSAL GUADALAJARA', 1, '1610-A'),
(4, 1004, 'JOSE ANTONIO DIAZ 310B', 'COLIMA', 'VILLA DE ALVAREZ', 'RELIEVE NUEVO', 1, '458C'),
(5, 1005, 'INSURGENTES SUR', 'CIUDAD DE MÉXICO', 'MIGUEL HIDALGO', 'CDMX', 1, '8888'),
(6, 1006, 'INSURGENTES NORTE', 'CIUDAD DE MÉXICO', 'MIGUEL HIDALGO', 'MÉXICO NORTE', 1, '1668B'),
(7, 1007, 'HEROICA VERACRUZ', 'VERACRUZ', 'VERACRUZ', 'EL MAR CRUZ', 1, '2018-B'),
(8, 1008, 'CALLE GENERAL JUAN ÁLVAREZ', 'CABOS SAN LUCAS', 'LA PAZ', 'SAN LUCAS', 1, '1311'),
(9, 1009, 'GENERAL DEL SUR', 'TIJUANA', 'TIJUANA', 'TIJUANA SUR', 0, '1867B'),
(10, 1010, 'PLAZA MIJARES, BARRIO HISTÓRICO', 'BAJA CALIFORNIA SUR', 'SAN JOSÉ DEL CABO', 'VIAJA CALIFORNIA', 1, '1028-E'),
(11, 1011, 'P.º MIGUEL DE LA MADRID HURTADO, REAL HACIENDA', 'COLIMA', 'COLIMA', 'COLIMA PLUS', 1, '271');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trigger_log`
--

CREATE TABLE `trigger_log` (
  `log_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trigger_log`
--

INSERT INTO `trigger_log` (`log_time`, `message`) VALUES
('2024-05-25 02:43:10', 'NEW.boletos: [{\"clase\":\"1\",\"cantidad\":\"1\"},{\"clase\":\"1\",\"cantidad\":\"1\"}]'),
('2024-05-25 02:43:10', 'boletos_count: 2'),
('2024-05-25 02:43:10', 'clase: 1, cantidad: 1'),
('2024-05-25 02:43:10', 'clase: 1, cantidad: 1'),
('2024-05-25 02:43:10', 'Trigger ejecutado'),
('2024-05-25 02:46:17', 'boletos_count: 2'),
('2024-05-25 02:46:17', 'clase: 1, cantidad: 1'),
('2024-05-25 02:46:17', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 7'),
('2024-05-25 02:46:17', 'clase: 1, cantidad: 1'),
('2024-05-25 02:46:17', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 6'),
('2024-05-25 02:46:17', 'Trigger finished executing'),
('2024-05-25 03:03:51', 'boletos_count: 2'),
('2024-05-25 03:03:51', 'clase: 1, cantidad: 1'),
('2024-05-25 03:03:51', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 5'),
('2024-05-25 03:03:51', 'clase: 1, cantidad: 1'),
('2024-05-25 03:03:51', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 4'),
('2024-05-25 03:03:51', 'Trigger finished executing'),
('2024-05-25 03:11:21', 'boletos_count: 2'),
('2024-05-25 03:11:21', 'clase: 1, cantidad: 1'),
('2024-05-25 03:11:21', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 3'),
('2024-05-25 03:11:21', 'clase: 1, cantidad: 1'),
('2024-05-25 03:11:21', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 2'),
('2024-05-25 03:11:21', 'Trigger finished executing'),
('2024-05-25 13:58:33', 'boletos_count: 2'),
('2024-05-25 13:58:33', 'clase: 2, cantidad: 1'),
('2024-05-25 13:58:33', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 43'),
('2024-05-25 13:58:33', 'clase: 3, cantidad: 1'),
('2024-05-25 13:58:33', 'Updated Clase Económica, new plazasDisponiblesEconomica: 78'),
('2024-05-25 13:58:33', 'Trigger finished executing'),
('2024-05-25 13:59:59', 'boletos_count: 3'),
('2024-05-25 13:59:59', 'clase: 1, cantidad: 1'),
('2024-05-25 13:59:59', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 43'),
('2024-05-25 13:59:59', 'clase: 2, cantidad: 1'),
('2024-05-25 13:59:59', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 41'),
('2024-05-25 13:59:59', 'clase: 3, cantidad: 1'),
('2024-05-25 13:59:59', 'Updated Clase Económica, new plazasDisponiblesEconomica: 76'),
('2024-05-25 13:59:59', 'Trigger finished executing'),
('2024-05-25 17:37:19', 'boletos_count: 2'),
('2024-05-25 17:37:19', 'clase: 2, cantidad: 1'),
('2024-05-25 17:37:19', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 49'),
('2024-05-25 17:37:19', 'clase: 2, cantidad: 1'),
('2024-05-25 17:37:19', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 48'),
('2024-05-25 17:37:19', 'Trigger finished executing'),
('2024-05-25 17:39:46', NULL),
('2024-05-25 17:39:46', 'Trigger finished executing'),
('2024-05-25 17:58:34', NULL),
('2024-05-25 17:58:34', 'Trigger finished executing'),
('2024-05-27 03:34:07', 'boletos_count: 2'),
('2024-05-27 03:34:07', 'clase: 2, cantidad: 1'),
('2024-05-27 03:34:07', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 49'),
('2024-05-27 03:34:07', 'clase: 3, cantidad: 1'),
('2024-05-27 03:34:07', 'Updated Clase Económica, new plazasDisponiblesEconomica: 74'),
('2024-05-27 03:34:07', 'Trigger finished executing'),
('2024-05-27 03:43:13', 'boletos_count: 3'),
('2024-05-27 03:43:13', 'clase: 1, cantidad: 1'),
('2024-05-27 03:43:13', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 44'),
('2024-05-27 03:43:13', 'clase: 1, cantidad: 1'),
('2024-05-27 03:43:13', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 43'),
('2024-05-27 03:43:13', 'clase: 1, cantidad: 1'),
('2024-05-27 03:43:13', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 42'),
('2024-05-27 03:43:13', 'Trigger finished executing'),
('2024-05-27 03:46:00', 'boletos_count: 3'),
('2024-05-27 03:46:00', 'clase: 1, cantidad: 1'),
('2024-05-27 03:46:00', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 24'),
('2024-05-27 03:46:00', 'clase: 1, cantidad: 1'),
('2024-05-27 03:46:00', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 23'),
('2024-05-27 03:46:00', 'clase: 1, cantidad: 1'),
('2024-05-27 03:46:00', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 22'),
('2024-05-27 03:46:00', 'Trigger finished executing'),
('2024-05-27 03:49:18', 'boletos_count: 3'),
('2024-05-27 03:49:18', 'clase: 1, cantidad: 1'),
('2024-05-27 03:49:18', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 44'),
('2024-05-27 03:49:18', 'clase: 1, cantidad: 1'),
('2024-05-27 03:49:18', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 43'),
('2024-05-27 03:49:18', 'clase: 1, cantidad: 1'),
('2024-05-27 03:49:18', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 42'),
('2024-05-27 03:49:18', 'Trigger finished executing'),
('2024-05-27 03:50:55', 'boletos_count: 1'),
('2024-05-27 03:50:55', 'clase: 1, cantidad: 1'),
('2024-05-27 03:50:55', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 24'),
('2024-05-27 03:50:55', 'Trigger finished executing'),
('2024-05-27 04:03:05', 'boletos_count: 1'),
('2024-05-27 04:03:05', 'clase: 1, cantidad: 1'),
('2024-05-27 04:03:05', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 34'),
('2024-05-27 04:03:05', 'Trigger finished executing'),
('2024-05-27 04:03:05', NULL),
('2024-05-27 04:03:05', 'Trigger finished executing'),
('2024-05-27 04:04:28', 'boletos_count: 2'),
('2024-05-27 04:04:28', 'clase: 2, cantidad: 1'),
('2024-05-27 04:04:28', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 45'),
('2024-05-27 04:04:28', 'clase: 3, cantidad: 1'),
('2024-05-27 04:04:28', 'Updated Clase Económica, new plazasDisponiblesEconomica: 64'),
('2024-05-27 04:04:28', 'Trigger finished executing'),
('2024-05-27 04:04:28', NULL),
('2024-05-27 04:04:28', 'Trigger finished executing'),
('2024-05-27 04:06:50', 'boletos_count: 2'),
('2024-05-27 04:06:50', 'clase: 1, cantidad: 1'),
('2024-05-27 04:06:50', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 38'),
('2024-05-27 04:06:50', 'clase: 2, cantidad: 1'),
('2024-05-27 04:06:50', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 54'),
('2024-05-27 04:06:50', 'Trigger finished executing'),
('2024-05-27 04:06:50', NULL),
('2024-05-27 04:06:50', 'Trigger finished executing'),
('2024-05-27 04:18:16', 'boletos_count: 1'),
('2024-05-27 04:18:16', 'clase: 1, cantidad: 1'),
('2024-05-27 04:18:16', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 36'),
('2024-05-27 04:18:16', 'Trigger finished executing'),
('2024-05-27 04:18:16', NULL),
('2024-05-27 04:18:16', 'Trigger finished executing'),
('2024-05-27 04:20:30', 'boletos_count: 4'),
('2024-05-27 04:20:30', 'clase: 1, cantidad: 1'),
('2024-05-27 04:20:30', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 49'),
('2024-05-27 04:20:30', 'clase: 1, cantidad: 1'),
('2024-05-27 04:20:30', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 48'),
('2024-05-27 04:20:30', 'clase: 2, cantidad: 1'),
('2024-05-27 04:20:30', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 59'),
('2024-05-27 04:20:30', 'clase: 2, cantidad: 1'),
('2024-05-27 04:20:30', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 58'),
('2024-05-27 04:20:30', 'Trigger finished executing'),
('2024-05-27 04:20:30', NULL),
('2024-05-27 04:20:30', 'Trigger finished executing'),
('2024-05-27 20:46:43', 'boletos_count: 5'),
('2024-05-27 20:46:43', 'clase: 1, cantidad: 1'),
('2024-05-27 20:46:43', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 0'),
('2024-05-27 20:46:43', 'clase: 1, cantidad: 1'),
('2024-05-27 20:46:43', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: -1'),
('2024-05-27 20:46:43', 'clase: 1, cantidad: 1'),
('2024-05-27 20:46:43', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: -2'),
('2024-05-27 20:46:43', 'clase: 1, cantidad: 1'),
('2024-05-27 20:46:43', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: -3'),
('2024-05-27 20:46:43', 'clase: 1, cantidad: 1'),
('2024-05-27 20:46:43', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: -4'),
('2024-05-27 20:46:43', 'Trigger finished executing'),
('2024-05-27 20:49:48', NULL),
('2024-05-27 20:49:48', 'Trigger finished executing'),
('2024-05-27 23:41:18', 'boletos_count: 2'),
('2024-05-27 23:41:18', 'clase: 1, cantidad: 1'),
('2024-05-27 23:41:18', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 0'),
('2024-05-27 23:41:18', 'clase: 2, cantidad: 1'),
('2024-05-27 23:41:18', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 1'),
('2024-05-27 23:41:18', 'Trigger finished executing'),
('2024-05-28 01:40:36', 'boletos_count: 1'),
('2024-05-28 01:40:36', 'clase: 2, cantidad: 1'),
('2024-05-28 01:40:36', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 1'),
('2024-05-28 01:40:36', 'Trigger finished executing'),
('2024-05-28 01:40:36', NULL),
('2024-05-28 01:40:36', 'Trigger finished executing'),
('2024-05-28 01:42:44', NULL),
('2024-05-28 01:42:44', 'Trigger finished executing'),
('2024-05-28 01:44:30', 'boletos_count: 2'),
('2024-05-28 01:44:30', 'clase: 1, cantidad: 1'),
('2024-05-28 01:44:30', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 22'),
('2024-05-28 01:44:30', 'clase: 1, cantidad: 1'),
('2024-05-28 01:44:30', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 21'),
('2024-05-28 01:44:30', 'Trigger finished executing'),
('2024-05-28 01:44:30', NULL),
('2024-05-28 01:44:30', 'Trigger finished executing'),
('2024-05-28 02:10:36', 'boletos_count: 1'),
('2024-05-28 02:10:36', 'clase: 2, cantidad: 1'),
('2024-05-28 02:10:36', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 14'),
('2024-05-28 02:10:36', 'Trigger finished executing'),
('2024-05-28 02:11:33', NULL),
('2024-05-28 02:11:33', 'Trigger finished executing'),
('2024-05-28 02:21:32', 'boletos_count: 3'),
('2024-05-28 02:21:32', 'clase: 3, cantidad: 1'),
('2024-05-28 02:21:32', 'Updated Clase Económica, new plazasDisponiblesEconomica: 74'),
('2024-05-28 02:21:32', 'clase: 3, cantidad: 1'),
('2024-05-28 02:21:32', 'Updated Clase Económica, new plazasDisponiblesEconomica: 73'),
('2024-05-28 02:21:32', 'clase: 3, cantidad: 1'),
('2024-05-28 02:21:32', 'Updated Clase Económica, new plazasDisponiblesEconomica: 72'),
('2024-05-28 02:21:32', 'Trigger finished executing'),
('2024-05-28 02:21:32', NULL),
('2024-05-28 02:21:32', 'Trigger finished executing'),
('2024-05-28 02:21:32', 'boletos_count: 3'),
('2024-05-28 02:21:32', 'clase: 3, cantidad: 1'),
('2024-05-28 02:21:32', 'Updated Clase Económica, new plazasDisponiblesEconomica: 71'),
('2024-05-28 02:21:32', 'clase: 3, cantidad: 1'),
('2024-05-28 02:21:32', 'Updated Clase Económica, new plazasDisponiblesEconomica: 70'),
('2024-05-28 02:21:32', 'clase: 3, cantidad: 1'),
('2024-05-28 02:21:32', 'Updated Clase Económica, new plazasDisponiblesEconomica: 69'),
('2024-05-28 02:21:32', 'Trigger finished executing'),
('2024-05-28 02:30:05', 'boletos_count: 1'),
('2024-05-28 02:30:05', 'clase: 2, cantidad: 1'),
('2024-05-28 02:30:05', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 0'),
('2024-05-28 02:30:05', 'Trigger finished executing'),
('2024-05-28 02:30:05', NULL),
('2024-05-28 02:30:05', 'Trigger finished executing'),
('2024-05-28 02:32:59', 'boletos_count: 3'),
('2024-05-28 02:32:59', 'clase: 3, cantidad: 1'),
('2024-05-28 02:32:59', 'Updated Clase Económica, new plazasDisponiblesEconomica: 65'),
('2024-05-28 02:32:59', 'clase: 3, cantidad: 1'),
('2024-05-28 02:32:59', 'Updated Clase Económica, new plazasDisponiblesEconomica: 64'),
('2024-05-28 02:32:59', 'clase: 3, cantidad: 1'),
('2024-05-28 02:32:59', 'Updated Clase Económica, new plazasDisponiblesEconomica: 63'),
('2024-05-28 02:32:59', 'Trigger finished executing'),
('2024-05-28 02:32:59', NULL),
('2024-05-28 02:32:59', 'Trigger finished executing'),
('2024-05-28 02:32:59', 'boletos_count: 3'),
('2024-05-28 02:32:59', 'clase: 3, cantidad: 1'),
('2024-05-28 02:32:59', 'Updated Clase Económica, new plazasDisponiblesEconomica: 62'),
('2024-05-28 02:32:59', 'clase: 3, cantidad: 1'),
('2024-05-28 02:32:59', 'Updated Clase Económica, new plazasDisponiblesEconomica: 61'),
('2024-05-28 02:32:59', 'clase: 3, cantidad: 1'),
('2024-05-28 02:32:59', 'Updated Clase Económica, new plazasDisponiblesEconomica: 60'),
('2024-05-28 02:32:59', 'Trigger finished executing'),
('2024-05-28 02:46:16', 'boletos_count: 1'),
('2024-05-28 02:46:16', 'clase: 3, cantidad: 1'),
('2024-05-28 02:46:16', 'Updated Clase Económica, new plazasDisponiblesEconomica: 0'),
('2024-05-28 02:46:16', 'Trigger finished executing'),
('2024-05-28 02:46:16', NULL),
('2024-05-28 02:46:16', 'Trigger finished executing'),
('2024-05-28 03:38:31', 'boletos_count: 2'),
('2024-05-28 03:38:31', 'clase: 1, cantidad: 1'),
('2024-05-28 03:38:31', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 38'),
('2024-05-28 03:38:31', 'clase: 1, cantidad: 1'),
('2024-05-28 03:38:31', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 37'),
('2024-05-28 03:38:31', 'Trigger finished executing'),
('2024-05-28 03:38:31', NULL),
('2024-05-28 03:38:31', 'Trigger finished executing'),
('2024-05-28 04:20:00', 'boletos_count: 2'),
('2024-05-28 04:20:00', 'clase: 2, cantidad: 1'),
('2024-05-28 04:20:00', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 49'),
('2024-05-28 04:20:00', 'clase: 2, cantidad: 1'),
('2024-05-28 04:20:00', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 48'),
('2024-05-28 04:20:00', 'Trigger finished executing'),
('2024-05-28 04:20:00', NULL),
('2024-05-28 04:20:00', 'Trigger finished executing'),
('2024-05-28 04:33:53', 'boletos_count: 2'),
('2024-05-28 04:33:53', 'clase: 2, cantidad: 1'),
('2024-05-28 04:33:53', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 62'),
('2024-05-28 04:33:53', 'clase: 2, cantidad: 1'),
('2024-05-28 04:33:53', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 61'),
('2024-05-28 04:33:53', 'Trigger finished executing'),
('2024-05-28 04:47:14', 'boletos_count: 3'),
('2024-05-28 04:47:14', 'clase: 1, cantidad: 1'),
('2024-05-28 04:47:14', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 29'),
('2024-05-28 04:47:14', 'clase: 1, cantidad: 1'),
('2024-05-28 04:47:14', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 28'),
('2024-05-28 04:47:14', 'clase: 1, cantidad: 1'),
('2024-05-28 04:47:14', 'Updated Primera Clase, new plazasDisponiblesPrimeraClase: 27'),
('2024-05-28 04:47:14', 'Trigger finished executing'),
('2024-05-28 05:35:54', 'boletos_count: 4'),
('2024-05-28 05:35:54', 'clase: 2, cantidad: 1'),
('2024-05-28 05:35:54', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 62'),
('2024-05-28 05:35:54', 'clase: 2, cantidad: 1'),
('2024-05-28 05:35:54', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 61'),
('2024-05-28 05:35:54', 'clase: 3, cantidad: 1'),
('2024-05-28 05:35:54', 'Updated Clase Económica, new plazasDisponiblesEconomica: 62'),
('2024-05-28 05:35:54', 'clase: 3, cantidad: 1'),
('2024-05-28 05:35:54', 'Updated Clase Económica, new plazasDisponiblesEconomica: 61'),
('2024-05-28 05:35:54', 'Trigger finished executing'),
('2024-05-28 12:01:51', 'boletos_count: 1'),
('2024-05-28 12:01:51', 'clase: 2, cantidad: 1'),
('2024-05-28 12:01:51', 'Updated Clase Ejecutiva, new plazasDisponiblesEjecutiva: 12'),
('2024-05-28 12:01:51', 'Trigger finished executing');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Francisco Javier', 'paco_0201@gmail.com', NULL, '$2y$12$R5n8ZUXiM7qz7/9jiCReqeZVbmzDMluXN/K9XSzhlp7YPVWrcza6O', NULL, '2024-04-19 10:10:23', '2024-04-19 10:10:23'),
(2, 'Francisco Javier', 'franky.bach123@gmail.com', NULL, '$2y$12$QFn/gUfS7E/wUiEMwkx1b.Z9y1Gl.3s0HcH0cy/ATg.dbfpK9fDd.', '2SxGFcSLOznJnY2u7JGS1GaRz5MZjYbnVBccvT4hoevEQaoeFYfnDmTbq2HZ', '2024-04-19 17:28:49', '2024-04-19 17:28:49'),
(3, 'Francisco Javier', 'pruebareg@outlook.com', NULL, '$2y$12$4HMdnUn/nomkdCyf1IISquLawUnks6c6jvccQ7LRW4bP5DhLy/iGK', NULL, '2024-04-19 20:31:55', '2024-04-19 20:31:55'),
(4, 'lissibf', 'lissibf@gmail.com', NULL, '$2y$12$WFr04vJIVpe6OKTDVRr.ruJNofj65QYwHGlHZedw3AvjswYFQGFJC', NULL, '2024-04-20 01:51:04', '2024-04-20 01:51:04'),
(5, 'Daniel Avalos', 'danuel.unu@gmail.com', NULL, '$2y$12$wxwvxdLwIl7guy9VwLjV0OvFTBaH6B6Ewf7KH2Z21dxeR.aXTxGSG', NULL, '2024-04-29 20:43:26', '2024-04-29 20:43:26'),
(6, 'Jose Alberto', 'jose.0123@gmail.com', NULL, '$2y$12$8i8PAZDGeZHBZQwAUIQfHuaVOHHreKJ.GSawaYJBA5d1DzA0B9EjK', NULL, '2024-04-30 02:19:09', '2024-04-30 02:19:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `IDVuelo` bigint(20) NOT NULL,
  `fechaHraSalida` datetime NOT NULL,
  `fechaHraLlegada` datetime NOT NULL,
  `origen` varchar(80) NOT NULL,
  `destino` varchar(80) NOT NULL,
  `plazasTotales` smallint(6) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `plazasPrimeraClase` int(11) NOT NULL DEFAULT 0,
  `plazasEjecutiva` int(11) NOT NULL DEFAULT 0,
  `plazasEconomica` int(11) NOT NULL DEFAULT 0,
  `plazasDisponiblesPrimeraClase` int(11) NOT NULL DEFAULT 0,
  `plazasDisponiblesEjecutiva` int(11) NOT NULL DEFAULT 0,
  `plazasDisponiblesEconomica` int(11) NOT NULL DEFAULT 0,
  `plazasDisponiblesTotales` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`IDVuelo`, `fechaHraSalida`, `fechaHraLlegada`, `origen`, `destino`, `plazasTotales`, `estado`, `plazasPrimeraClase`, `plazasEjecutiva`, `plazasEconomica`, `plazasDisponiblesPrimeraClase`, `plazasDisponiblesEjecutiva`, `plazasDisponiblesEconomica`, `plazasDisponiblesTotales`) VALUES
(1, '2024-04-15 07:00:00', '2024-04-15 08:30:00', 'CIUDAD DE MÉXICO', 'CANCÚN', 40, 1, 5, 15, 20, 5, 11, 20, 36),
(2, '2024-04-16 09:00:00', '2024-04-16 11:00:00', 'MONTERREY', 'CIUDAD DE MÉXICO', 170, 1, 45, 45, 80, 42, 40, 57, 139),
(3, '2024-04-17 14:00:00', '2024-04-17 15:30:00', 'GUADALAJARA', 'VERACRUZ', 160, 1, 35, 50, 75, 24, 48, 73, 145),
(4, '2024-04-16 00:56:00', '2024-04-17 00:56:00', 'COLIMA', 'MONTERREY', 160, 1, 30, 65, 65, 30, 59, 59, 148),
(5, '2024-04-17 00:57:00', '2024-04-18 00:57:00', 'COLIMA', 'TEXAS', 160, 1, 45, 65, 50, 37, 65, 50, 152),
(6, '2024-04-19 04:10:00', '2024-04-20 04:10:00', 'CDMX', 'LAS VEGAS', 155, 1, 25, 50, 80, 21, 50, 80, 151),
(7, '2024-04-21 16:01:00', '2024-04-21 21:01:00', 'NEW YORK-LA GUARDIA', 'CDMX', 210, 1, 50, 75, 85, 50, 75, 85, 210),
(8, '2024-04-30 08:39:00', '2024-05-02 08:39:00', 'SAN FRANCISCO', 'CANCÚN', 210, 1, 45, 75, 90, 45, 75, 90, 210),
(9, '2024-04-06 14:45:00', '2024-04-07 01:20:00', 'COLIMA', 'MONTERREY', 310, 1, 75, 95, 140, 75, 95, 140, 310),
(10, '2024-05-01 20:00:00', '2024-05-02 06:20:00', 'CDMX', 'CANADÁ', 185, 1, 40, 60, 85, 40, 60, 85, 185),
(11, '2024-05-20 18:03:00', '2024-05-21 16:03:00', 'MONTERREY', 'TEXAS', 170, 1, 35, 65, 70, 35, 65, 70, 170),
(12, '2024-05-20 23:40:00', '2024-05-21 06:40:00', 'OAXACA', 'BAJA CALIFORNIA SUR', 150, 1, 25, 55, 70, 19, 55, 70, 144),
(13, '2024-05-24 00:00:00', '2024-05-24 07:00:00', 'CIUDAD DE MÉXICO', 'CANCÚN', 170, 1, 50, 60, 60, 46, 56, 60, 162),
(14, '2024-05-26 22:00:00', '2024-05-27 02:30:00', 'COLIMA', 'TOLUCA', 150, 1, 35, 50, 65, 35, 44, 63, 142),
(15, '2024-05-28 12:45:00', '2024-05-28 23:50:00', 'CDMX', 'CALIFORNIA', 160, 1, 45, 55, 60, 35, 53, 60, 148),
(16, '2024-05-03 14:43:00', '2024-06-27 15:41:00', 'COLIMA', 'GUADALAJARA', 4, 1, 1, 2, 1, 1, 0, 0, 1),
(17, '2024-05-28 17:40:00', '2024-05-28 23:30:00', 'TOLUCA', 'COLIMA', 160, 1, 45, 50, 65, 45, 48, 65, 158),
(18, '2024-05-29 18:20:00', '2024-05-30 19:35:00', 'BAJA CALIFORNIA SUR', 'CANCUN', 155, 1, 45, 50, 60, 45, 50, 60, 155),
(19, '2024-05-28 06:45:00', '2024-05-29 02:02:00', 'LOS ANGELES', 'GUADALAJARA', 160, 1, 35, 55, 70, 35, 55, 70, 160),
(20, '2024-05-31 18:15:00', '2024-06-02 02:05:00', 'CDMX', 'TORONTO (CANADA)', 180, 1, 45, 65, 70, 45, 65, 70, 180),
(21, '2024-05-30 14:15:00', '2024-05-31 04:45:00', 'BOGOTA', 'CDMX', 160, 1, 40, 55, 65, 40, 55, 65, 160),
(22, '2024-05-31 08:10:00', '2024-05-31 19:50:00', 'CDMX', 'SANTIAGO DE CHILE', 180, 1, 50, 65, 65, 50, 59, 65, 174);

--
-- Disparadores `vuelo`
--
DELIMITER $$
CREATE TRIGGER `before_vuelo_insert` BEFORE INSERT ON `vuelo` FOR EACH ROW BEGIN
    SET NEW.plazasDisponiblesTotales = NEW.plazasDisponiblesPrimeraClase + NEW.plazasDisponiblesEjecutiva + NEW.plazasDisponiblesEconomica;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_vuelo_update` BEFORE UPDATE ON `vuelo` FOR EACH ROW BEGIN
    SET NEW.plazasDisponiblesTotales = NEW.plazasDisponiblesPrimeraClase + NEW.plazasDisponiblesEjecutiva + NEW.plazasDisponiblesEconomica;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `clasevuelo`
--
ALTER TABLE `clasevuelo`
  ADD PRIMARY KEY (`IDClaseVuelo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`NIFCliente`);

--
-- Indices de la tabla `detail_reserv_vuelo_hotel`
--
ALTER TABLE `detail_reserv_vuelo_hotel`
  ADD PRIMARY KEY (`IDDetalleReservarVueloH`),
  ADD KEY `IDVuelo` (`IDVuelo`),
  ADD KEY `IDHotel` (`IDHotel`),
  ADD KEY `IDReservacion` (`IDReservacion`),
  ADD KEY `IDRegimenHospedaje` (`IDRegimenHospedaje`),
  ADD KEY `IDClaseVuelo` (`IDDetalleReservarVueloH`),
  ADD KEY `detail_reserv_vuelo_hotel_ibfk_6` (`IDClaseVuelo`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`IDHotel`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `regimen_hospedaje`
--
ALTER TABLE `regimen_hospedaje`
  ADD PRIMARY KEY (`IDRegimenH`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`IDReservacion`),
  ADD KEY `IDSucursal` (`IDSucursal`),
  ADD KEY `NIFCliente` (`NIFCliente`),
  ADD KEY `IDVuelo` (`IDVuelo`),
  ADD KEY `IDHotel` (`IDHotel`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`IDSucursal`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`IDVuelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `NIFCliente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `detail_reserv_vuelo_hotel`
--
ALTER TABLE `detail_reserv_vuelo_hotel`
  MODIFY `IDDetalleReservarVueloH` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `IDHotel` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `regimen_hospedaje`
--
ALTER TABLE `regimen_hospedaje`
  MODIFY `IDRegimenH` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `IDReservacion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `IDSucursal` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `IDVuelo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detail_reserv_vuelo_hotel`
--
ALTER TABLE `detail_reserv_vuelo_hotel`
  ADD CONSTRAINT `detail_reserv_vuelo_hotel_ibfk_2` FOREIGN KEY (`IDVuelo`) REFERENCES `vuelo` (`IDVuelo`),
  ADD CONSTRAINT `detail_reserv_vuelo_hotel_ibfk_3` FOREIGN KEY (`IDHotel`) REFERENCES `hotel` (`IDHotel`),
  ADD CONSTRAINT `detail_reserv_vuelo_hotel_ibfk_4` FOREIGN KEY (`IDReservacion`) REFERENCES `reservacion` (`IDReservacion`),
  ADD CONSTRAINT `detail_reserv_vuelo_hotel_ibfk_5` FOREIGN KEY (`IDRegimenHospedaje`) REFERENCES `regimen_hospedaje` (`IDRegimenH`),
  ADD CONSTRAINT `detail_reserv_vuelo_hotel_ibfk_6` FOREIGN KEY (`IDClaseVuelo`) REFERENCES `clasevuelo` (`IDClaseVuelo`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`IDSucursal`) REFERENCES `sucursal` (`IDSucursal`),
  ADD CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY (`NIFCliente`) REFERENCES `cliente` (`NIFCliente`),
  ADD CONSTRAINT `reservacion_ibfk_3` FOREIGN KEY (`IDVuelo`) REFERENCES `vuelo` (`IDVuelo`),
  ADD CONSTRAINT `reservacion_ibfk_4` FOREIGN KEY (`IDHotel`) REFERENCES `hotel` (`IDHotel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
