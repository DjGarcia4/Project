CREATE DATABASE IF NOT EXISTS sistema_planilla;
use sistema_planilla;

-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: sistema_planilla
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bitacora` (
  `idBitacora` int NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` int NOT NULL,
  `idTabla` int NOT NULL,
  `accion` varchar(45) NOT NULL,
  `horaFecha_accion` datetime NOT NULL,
  PRIMARY KEY (`idBitacora`),
  KEY `FK_bitacora_Usuarios` (`Usuario_idUsuario`),
  KEY `FK_bitacora_Tablas` (`idTabla`),
  CONSTRAINT `FK_bitacora_Tablas` FOREIGN KEY (`idTabla`) REFERENCES `tablas` (`idTabla`),
  CONSTRAINT `FK_bitacora_Usuarios` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargos` (
  `idCargo` int NOT NULL AUTO_INCREMENT,
  `DescripcionCargo` varchar(45) NOT NULL,
  `Salario` int NOT NULL,
  `Departamentos_idDepartamentos` int NOT NULL,
  `Estados_idEstado` int NOT NULL,
  PRIMARY KEY (`idCargo`),
  KEY `fk_Cargos_Departamentos1_idx` (`Departamentos_idDepartamentos`),
  CONSTRAINT `fk_Cargos_Departamentos1` FOREIGN KEY (`Departamentos_idDepartamentos`) REFERENCES `departamentos` (`idDepartamentos`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'VENDEDOR',8000,1,1),(2,'JEFE DE BODEGA',5000,2,1),(3,'RECEPCIONISTA',8000,3,1),(4,'ASESOR FINANCIERO',10000,4,1),(5,'EXPEDITOR',8000,5,1),(6,'DIRECTOR DE RECURSOS HUMANOS',21000,6,1),(7,'GERENTE GENERAL',65000,7,1),(8,'AUDITOR DE SISTEMAS',15000,8,1),(9,'DIRECTOR DE PLANTA',28000,9,1),(10,'SUPERVISOR DE VENTAS',20000,1,1),(11,'CARGUERO',8000,2,1),(12,'SUPERVISOR DE ATENCION AL CLIENTE',18000,3,1),(13,'ASESOR FISCAL',15000,4,1),(14,'DESARROLLADOR DE PROVEEDORES',24000,5,1),(15,'TECNICO DE SELECCION DE PERSONAL',23000,6,1),(16,'SUBGERENTE ADMINISTRATIVO',45000,7,1),(17,'ADMINISTRADOR DE BASE DE DATOS',20000,8,1),(18,'SUPERVISOR DE PLANTA',22000,9,1),(19,'GERENTE DE VENTAS',36000,1,1),(20,'DESPACHADOR',10000,2,1),(21,'TELEVENDEDOR',18000,3,1),(22,'ANALISTA',15000,4,1),(23,'LIDER DE COMPRAS',20000,5,1),(24,'RECLUTADOR',15000,6,1),(25,'ANALISTA DE CALIDAD',12000,7,1),(26,'DESARROLLADOR',15000,8,1),(27,'OPERARIOS',22000,9,1);
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ciudades` (
  `idCiudades` int NOT NULL AUTO_INCREMENT,
  `DescripcionCiudad` varchar(45) NOT NULL,
  `Estados_idEstado` int NOT NULL,
  PRIMARY KEY (`idCiudades`),
  UNIQUE KEY `DescripcionCiudad` (`DescripcionCiudad`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES (1,'TEGUCIGALPA',1),(2,'CHOLUTECA',1),(3,'SAN PEDRO SULA',1),(4,'COMAYAGUA',1),(5,'LA CEIBA',1),(6,'EL PROGRESO',1),(7,'CHOLOMA',1),(8,'TELA',1),(9,'DANLI',1),(10,'SANTA ROSA DE COPAN',1),(11,'SIGUATEPEQUE',1),(12,'OLANCHITO',1),(13,'LA PAZ',1);
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamentos` (
  `idDepartamentos` int NOT NULL AUTO_INCREMENT,
  `DescripcionDepto` varchar(45) NOT NULL,
  `Estados_idEstado` int NOT NULL,
  PRIMARY KEY (`idDepartamentos`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'VENTAS',1),(2,'BODEGA',1),(3,'ATENCION AL CLIENTE',1),(4,'FINANCIERO',1),(5,'COMPRAS',1),(6,'RECURSOS HUMANOS',1),(7,'ADMINISTRATIVO',1),(8,'IT',1),(9,'PRODUCCION',1);
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleplanillas`
--

DROP TABLE IF EXISTS `detalleplanillas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalleplanillas` (
  `Planillas_idPlanilla` int NOT NULL,
  `Empleados_idEmpleados` int NOT NULL,
  `Salario_Base` decimal(20,6) NOT NULL,
  `IHSS` decimal(20,6) NOT NULL,
  `RAP` decimal(20,6) NOT NULL,
  `ISR` decimal(20,6) NOT NULL,
  `Total_Deducciones` decimal(20,6) NOT NULL,
  `14vo` decimal(20,6) NOT NULL,
  `13vo` decimal(20,6) NOT NULL,
  `Total_Bonificaciones` decimal(20,6) NOT NULL,
  `Sueldo_Neto` decimal(20,6) NOT NULL,
  PRIMARY KEY (`Planillas_idPlanilla`,`Empleados_idEmpleados`),
  KEY `fk_DetallePlanillas_Empleados1` (`Empleados_idEmpleados`),
  CONSTRAINT `fk_DetallePlanillas_Empleados1` FOREIGN KEY (`Empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`),
  CONSTRAINT `fk_DetallePlanillas_Planillas` FOREIGN KEY (`Planillas_idPlanilla`) REFERENCES `planillas` (`idPlanillas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleplanillas`
--

LOCK TABLES `detalleplanillas` WRITE;
/*!40000 ALTER TABLE `detalleplanillas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleplanillas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleados` (
  `idEmpleados` int NOT NULL AUTO_INCREMENT,
  `Empresas_idEmpresas` int NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `PrimerNombre` varchar(45) NOT NULL,
  `SegundoNombre` varchar(45) NOT NULL,
  `PrimerApellido` varchar(45) NOT NULL,
  `SegundoApellido` varchar(45) DEFAULT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `FechaIngreso` date NOT NULL,
  `CuentaBancaria` varchar(45) NOT NULL,
  `Sexos_idSexo` int NOT NULL,
  `Cargos_idCargos` int NOT NULL,
  `Estados_idEstado` int NOT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Ciudades_idCiudades` int NOT NULL,
  PRIMARY KEY (`idEmpleados`),
  UNIQUE KEY `CuentaBancaria_UNIQUE` (`CuentaBancaria`),
  KEY `fk_Empleados_Sexos1_idx` (`Sexos_idSexo`),
  KEY `fk_Empleados_Estados1_idx` (`Estados_idEstado`),
  KEY `fk_Empleados_Ciudades1_idx` (`Ciudades_idCiudades`),
  KEY `fk_Empleados_Cargos1_idx` (`Cargos_idCargos`),
  KEY `fk_Empleados_Empresas1_idx` (`Empresas_idEmpresas`),
  CONSTRAINT `fk_Empleados_Cargos1` FOREIGN KEY (`Cargos_idCargos`) REFERENCES `cargos` (`idCargo`),
  CONSTRAINT `fk_Empleados_Ciudades1` FOREIGN KEY (`Ciudades_idCiudades`) REFERENCES `ciudades` (`idCiudades`),
  CONSTRAINT `fk_Empleados_Empresas1` FOREIGN KEY (`Empresas_idEmpresas`) REFERENCES `empresas` (`idEmpresa`),
  CONSTRAINT `fk_Empleados_Estados1` FOREIGN KEY (`Estados_idEstado`) REFERENCES `estados` (`idEstado`),
  CONSTRAINT `fk_Empleados_Sexos1` FOREIGN KEY (`Sexos_idSexo`) REFERENCES `sexos` (`idSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,1,'0601200000109','ONAN','JASSEL','AGUILERA','ORDOÑEZ','89949308','EDIFICIO ROSANELO, APARTAMENTO-25','1999-07-20','2018-01-01','3411407208210422',1,1,1,'hasselaguilera@gmail.com',2),(2,1,'0606199900479','DELSIS','MARIA','LOPEZ','MONDRAGON','99769248','B. LA ESPERANZA, DEL CAMPO 3RA CASA','1999-01-31','2020-05-15','1651864165151802',2,10,1,'',2),(5,1,'0610198619004','MARVIN','FRANCISCO','AGUILERA','','56151656','B. LA LIBERTAD, UNA CUADRA DE INBAC','1986-11-01','2015-02-01','1547986235210419',1,7,1,'',1),(6,1,'0608199002016','IRENE','CECILIA','FLORES','MEZA','88153521','EDIFICIO BUENAVISTA, APARTAMENTO-14','1984-04-25','2005-06-08','5018473020298217',2,11,1,'',3),(7,1,'0609200005079','EMERSON','FERNANDO','ZAPATA','RIVAS','99401110','B. LOS MANGOS, AL LADO DE ESCUELA LA ALEGRIA','2002-06-03','2021-10-20','9951515613821904',1,25,1,'emerson.zapatarivas@gmail.com',1),(8,2,'0601199551409','CLAUDIA','MARIA','CARDENAS','MEGIA','98165468','B. LOS MANGLES-MEDIA CUADRA DE LA GASOLINERA','1989-12-04','2010-04-24','6415651651632024',2,20,2,'',5),(9,1,'0801200123122','DENIS','JARED','GARCIA','MALDONADO','87854736','COL. LOS ALMENDROS, ESQUINA OPUESTA A BANCO','2001-12-04','2022-03-05','5154896155121165',1,22,1,'denisjared286@gmail.com',1),(10,2,'0801200120175','DULCE','YAQUELIN','CHIRINOS','SANCHEZ','99861858','B. EL ESTRUENDO, CONTINUO A CARWASH','2001-05-20','2022-03-21','9846153258163130',2,14,1,'yaquelinchirinos2018@gmail.com',12),(11,2,'1201199800386','DIEGO','ISMAEL','MOLINA','FLORES','88038874','COL. EL CARRETO, FRENTE A PULPERIA ROSITA','1998-05-04','2019-09-28','6446518946546647',1,15,1,'dm6223860@gmail.com',13);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas` (
  `idEmpresa` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Estados_idEstado` int NOT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'DULCES WILLY WONKA',1),(2,'ARMAS COD',1);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estados` (
  `idEstado` int NOT NULL AUTO_INCREMENT,
  `DescripcionEsstado` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'ACTIVO'),(2,'INACTIVO');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planillas`
--

DROP TABLE IF EXISTS `planillas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `planillas` (
  `idPlanillas` int NOT NULL AUTO_INCREMENT,
  `NumeroPlanilla` varchar(50) DEFAULT NULL,
  `Empresas_idEmpresas` int NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `FechaFin` datetime NOT NULL,
  PRIMARY KEY (`idPlanillas`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planillas`
--

LOCK TABLES `planillas` WRITE;
/*!40000 ALTER TABLE `planillas` DISABLE KEYS */;
/*!40000 ALTER TABLE `planillas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registros`
--

DROP TABLE IF EXISTS `registros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_Planilla` int NOT NULL,
  `Nombre_Planilla` varchar(75) NOT NULL,
  `url` varchar(75) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Registros_planillas` (`id_Planilla`),
  CONSTRAINT `fk_Registros_planillas` FOREIGN KEY (`id_Planilla`) REFERENCES `planillas` (`idPlanillas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros`
--

LOCK TABLES `registros` WRITE;
/*!40000 ALTER TABLE `registros` DISABLE KEYS */;
/*!40000 ALTER TABLE `registros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexos`
--

DROP TABLE IF EXISTS `sexos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sexos` (
  `idSexo` int NOT NULL AUTO_INCREMENT,
  `DescripcionSexo` varchar(45) NOT NULL,
  PRIMARY KEY (`idSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexos`
--

LOCK TABLES `sexos` WRITE;
/*!40000 ALTER TABLE `sexos` DISABLE KEYS */;
INSERT INTO `sexos` VALUES (1,'MASCULINO'),(2,'FEMENINO');
/*!40000 ALTER TABLE `sexos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tablas`
--

DROP TABLE IF EXISTS `tablas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tablas` (
  `idTabla` int NOT NULL AUTO_INCREMENT,
  `nombreTabla` varchar(45) NOT NULL,
  PRIMARY KEY (`idTabla`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tablas`
--

LOCK TABLES `tablas` WRITE;
/*!40000 ALTER TABLE `tablas` DISABLE KEYS */;
INSERT INTO `tablas` VALUES (1,'bitacora'),(2,'cargos'),(3,'ciudades'),(4,'departamentos'),(5,'detalleplanillas'),(6,'empleados'),(7,'empresas'),(8,'estados'),(9,'planillas'),(10,'registros'),(11,'sexos'),(12,'tablas'),(13,'usuarios');
/*!40000 ALTER TABLE `tablas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(45) NOT NULL,
  `Contrasenia` varchar(45) NOT NULL,
  `Empleados_idEmpleados` int NOT NULL,
  `Empresas_idEmpresas` int NOT NULL,
  `Estados_idEstado` int NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `Empleados_idEmpleados_UNIQUE` (`Empleados_idEmpleados`),
  KEY `fk_Usuarios_Empresas` (`Empresas_idEmpresas`),
  CONSTRAINT `fk_Usuarios_Empleados1` FOREIGN KEY (`Empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`),
  CONSTRAINT `fk_Usuarios_Empresas` FOREIGN KEY (`Empresas_idEmpresas`) REFERENCES `empresas` (`idEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'OJAO','34e59dad2b30ac27a3a3d1f12cd17b24',1,1,1),(2,'EFZR','f0df1c72013be81ea26d7ddc1f31578a',7,1,1),(3,'DJGM','5e96854d2575b403b3926c90438b76d4',9,1,1),(4,'DYCS','381e7667ed77207ac390559d1a53491b',10,2,1),(5,'DIMF','ce9aafe84ea8c5dc017a34a35c16ff17',11,2,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sistema_planilla'
--

--
-- Dumping routines for database 'sistema_planilla'
--
/*!50003 DROP PROCEDURE IF EXISTS `plan_det` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `plan_det`(planX varchar (50), emp int, fecha datetime)
Begin
	DECLARE x int default 0;
	DECLARE i int default 1;
	DECLARE j int default 0;
	DECLARE ID int default 0;
	DECLARE IngresoAnual DEC (10, 2) default 0.0;
	DECLARE ihss DEC (10, 2) default 0.0;
	DECLARE rap DEC (10, 2) default 0.0;
	DECLARE salary DEC (10, 2) default 0.0;
	DECLARE netSalary DEC (10, 2) default 0.0;
	DECLARE isr DEC (10, 2) default 0.0;
	DECLARE dedTot DEC (10, 2) default 0.0;
	DECLARE bonTot DEC (10, 2) default 0.0;
	DECLARE catorciavo DEC (10, 2) default 0.0;
	DECLARE treciavo DEC (10, 2) default 0.0;
	DECLARE FechaIngreso int default 0;
	DECLARE FechaPlanilla int default 0;
	SET x = (
			SELECT COUNT(*)
			FROM sistema_planilla.empleados
			where Empresas_idEmpresas = emp
				and empleados.Estados_idEstado = 1
		);
	while i <= x DO #Obtencion de Datos
	set salary = (
			SELECT Salario
			FROM sistema_planilla.empleados
				inner join sistema_planilla.cargos on sistema_planilla.cargos.idCargo = sistema_planilla.empleados.Cargos_idCargos
			where Empresas_idEmpresas = emp
				and empleados.Estados_idEstado = 1
			order by idEmpleados
			LIMIT j, 1
		);
	set ID = (
			SELECT idEmpleados
			FROM sistema_planilla.empleados
				inner join sistema_planilla.cargos on sistema_planilla.cargos.idCargo = sistema_planilla.empleados.Cargos_idCargos
			where Empresas_idEmpresas = emp
				and empleados.Estados_idEstado = 1
			order by idEmpleados
			LIMIT j, 1
		);
	set FechaIngreso = (
			SELECT TIMESTAMPDIFF(month, empleados.FechaIngreso, fecha)
			FROM sistema_planilla.empleados
			where Empresas_idEmpresas = emp
				and empleados.Estados_idEstado = 1
			order by idEmpleados
			LIMIT j, 1
		);
	set FechaPlanilla = (
			SELECT month(FechaInicio)
			FROM sistema_planilla.planillas
			where idPlanillas = planX
		);
	#Calculo de Datos independiente
	#Calculo de IHSS Seguro De prevision Social
	IF salary <= 9849.70 then
	set ihss = (salary * 0.025) * 2;
	else
	set ihss = (9849.70 * 0.025) * 2;
	end if;
	#Calculo de RAP Seguro De prevision 
	set rap = salary * 0.015;
	#Calculo de Impuesto sobre la renta
	set IngresoAnual = (salary * 12) - ((rap * 12) + (ihss * 12));
	if IngresoAnual > 642817.64 then
	set isr = (
			((276411.57 - 181274.56) * 0.15) + ((642817.64 - 276411.57) * 0.20) + ((IngresoAnual - 642817.64) * 0.25)
		) / 12;
	elseif IngresoAnual > 276411.58
	AND IngresoAnual < 642817.64 then
	set isr = (
			((276411.57 - 181274.56) * 0.15) + ((IngresoAnual - 276411.58) * 0.20)
		) / 12;
	elseif IngresoAnual > 181274.57
	AND IngresoAnual < 276411.58 then
	set isr = ((IngresoAnual - 181274.57) * 0.15) / 12;
	else
	set isr = 0;
	end if;
	#Calculo de Deduccion Total
	set dedTot = isr + rap + ihss;
	set netSalary = salary - dedTot;
	IF FechaIngreso >= 2 THEN IF FechaPlanilla = 6 THEN
	set treciavo = salary + netSalary;
	elseif FechaPlanilla = 12 THEN
	set catorciavo = salary + netSalary;
	END IF;
	else
	set treciavo = 0;
	set catorciavo = 0;
	end if;
	set bonTot = catorciavo + treciavo;
	set i = i + 1;
	set j = j + 1;
	insert into `detalleplanillas`
	values (
			planX,
			ID,
			salary,
			ihss,
			rap,
			isr,
			dedTot,
			catorciavo,
			treciavo,
			bonTot,
			netSalary
		);
	end while;
	SET i = 0;
End ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-18 12:52:57
