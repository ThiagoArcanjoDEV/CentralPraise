CREATE DATABASE  IF NOT EXISTS `thiag803_centralpraise` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `thiag803_centralpraise`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 10.61.28.189    Database: thiag803_centralpraise
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acesso`
--

DROP TABLE IF EXISTS `acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acesso` (
  `acesso_id` int(5) NOT NULL AUTO_INCREMENT,
  `acesso_login` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `acesso_senha` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `acesso_igreja` enum('read','write') COLLATE latin1_general_ci NOT NULL DEFAULT 'read',
  `acesso_area` enum('read','write') COLLATE latin1_general_ci NOT NULL DEFAULT 'read',
  `acesso_membro` enum('read','write') COLLATE latin1_general_ci NOT NULL DEFAULT 'read',
  `acesso_equipe` enum('read','write') COLLATE latin1_general_ci NOT NULL DEFAULT 'read',
  `acesso_musica` enum('read','write') COLLATE latin1_general_ci NOT NULL DEFAULT 'read',
  `acesso_escala` enum('read','write') COLLATE latin1_general_ci NOT NULL DEFAULT 'read',
  `acesso_acesso` enum('read','write') COLLATE latin1_general_ci NOT NULL DEFAULT 'read',
  `membro` int(5) NOT NULL,
  PRIMARY KEY (`acesso_id`),
  KEY `fk_acesso_membro1` (`membro`),
  CONSTRAINT `fk_acesso_membro1` FOREIGN KEY (`membro`) REFERENCES `membro` (`membro_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acesso`
--

LOCK TABLES `acesso` WRITE;
/*!40000 ALTER TABLE `acesso` DISABLE KEYS */;
INSERT INTO `acesso` VALUES (1,'thiago','$2y$10$JDJ5JDEwJEFuUHBQTk81UObRvYBO4FqjDOoLtVqOPidnzzUgEMSd6','write','write','write','write','write','write','write',1),(2,'evandro','$2y$10$JDJ5JDEwJEdOV05uTS5VeO5Ac5OHGW1sM7Up1JoQQDy6HNlf/euDm','read','read','read','read','read','read','read',2);
/*!40000 ALTER TABLE `acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda` (
  `agenda_id` int(10) NOT NULL AUTO_INCREMENT,
  `agenda_data` datetime NOT NULL,
  `agenda_nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `agenda_obs` text COLLATE latin1_general_ci,
  PRIMARY KEY (`agenda_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (1,'2016-03-10 18:00:00','Reuniao de Cura',NULL);
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `area_id` int(5) NOT NULL AUTO_INCREMENT,
  `area_nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `area_icon` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'DIRIGENTE','dirigente'),(2,'SOM','som'),(3,'VOCAL','voz'),(4,'VIOLÃO','violao'),(5,'TECLADO','teclado'),(6,'BAIXO','baixo'),(7,'BATERIA','bateria'),(8,'GUITARRA','guitarra'),(9,'MULTIMÍDIA','multimidia'),(10,'ADMIN',NULL),(11,'DANÇA',NULL);
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cifra`
--

DROP TABLE IF EXISTS `cifra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cifra` (
  `cifra_id` int(10) NOT NULL AUTO_INCREMENT,
  `cifra_tom` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `cifra_padrao` tinyint(1) DEFAULT NULL,
  `cifra_texto` text COLLATE latin1_general_ci NOT NULL,
  `musica` int(10) NOT NULL,
  PRIMARY KEY (`cifra_id`),
  KEY `fk_cifra_musica` (`musica`),
  CONSTRAINT `fk_cifra_musica` FOREIGN KEY (`musica`) REFERENCES `musica` (`musica_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cifra`
--

LOCK TABLES `cifra` WRITE;
/*!40000 ALTER TABLE `cifra` DISABLE KEYS */;
INSERT INTO `cifra` VALUES (1,'B',NULL,'<?xml version=\'1.0\'?>\r <music>\r 	<line>\r 		<intro>B  F#  G#m  E</intro></line>\r 	<line>\r 		<chords>B</chords>\r 		<letter> Open our eyes  </letter>\r 	</line>\r 	<line>\r 		<chords>   F#                  G#m  </chords>\r 		<letter>To see the things that make Your heart cry   </letter>\r 	</line>\r 	<line>\r 		<chords>   E                   B   </chords>\r 		<letter>To be the church that You would desire   </letter>\r 	</line>\r 	<line>\r 		<chords>     F#          G#m  E   </chords>\r 		<letter>Your light to be seen   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter></letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>Break down our pride   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>And all the walls we\'ve built up inside   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>Our earthly crowns and all our desires   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>We lay at Your feet   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter></letter>\r 	</line>\r 	<line>\r 		<chords>    G#m   E   </chords>\r 		<letter>Let hope rise   </letter>\r 	</line>\r 	<line>\r 		<chords>B              F#   </chords>\r 		<letter> And darkness tremble   </letter>\r 	</line>\r 	<line>\r 		<chords>         G#m  E   </chords>\r 		<letter>In Your holy light   </letter>\r 	</line>\r 	<line>\r 		<chords>B           F#   </chords>\r 		<letter> That every eye will see   </letter>\r 	</line>\r 	<line>\r 		<chords>E         G#m   </chords>\r 		<letter>Jesus our  God   </letter>\r 	</line>\r 	<line>\r 		<chords>F#         C#m7           E     F#   </chords>\r 		<letter> Great and mighty to be praised   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter></letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>God of all days   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>Glorious in all of Your ways   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>The majesty the wonder and grace   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>In the light of Your Name   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter></letter>\r 	</line>\r 	<line>\r 		<chords>E  G#m  B  F#  F#7   </chords>\r 		<letter></letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter></letter>\r 	</line>\r 	<line>\r 		<chords>     E   </chords>\r 		<letter>With everything   </letter>\r 	</line>\r 	<line>\r 		<chords>     G#m   </chords>\r 		<letter>With everything   </letter>\r 	</line>\r 	<line>\r 		<chords>          B            F# F#7   </chords>\r 		<letter>We will shout for Your glory   </letter>\r 	</line>\r 	<line>\r 		<chords>     E   </chords>\r 		<letter>With everything   </letter>\r 	</line>\r 	<line>\r 		<chords>     G#m   </chords>\r 		<letter>With everything   </letter>\r 	</line>\r 	<line>\r 		<chords>          B              F# F#7   </chords>\r 		<letter>We will shout forth Your praise   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter></letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter></letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>Our hearts they cry   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>Be glorified   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>Be lifted high above all names   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>For You our King   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>With everything   </letter>\r 	</line>\r 	<line>\r 		<chords></chords>\r 		<letter>We will shout forth Your praise   </letter>\r 	</line>\r </music>',1),(2,'G',NULL,'<?xml version=\'1.0\'?> <music> <line> <intro>G D9/F# Em C</intro> </line> <line> <chords></chords> <letter>Primeiro Trecho:</letter> </line> <line></line> <line> <chords>G</chords> <letter>Não compreendo os Teus caminhos</letter> </line> <line> <chords> C</chords> <letter>Mas te darei a minha canção</letter> </line> <line> <chords>Am G</chords> <letter> Doces palavras te darei</letter> </line> <line> <chords> Bm</chords> <letter>Me sustentas em minha dor</letter> </line> <line> <chords> C</chords> <letter>E isso me leva mais perto de Ti</letter> </line> <line> <chords>Am G</chords> <letter> Mais perto dos Teus caminhos</letter> </line> <line></line> <line> <chords> D9/F# Em</chords> <letter>E ao redor de cada esquina</letter> </line> <line> <chords> D</chords> <letter>Em cima de cada montanha</letter> </line> <line> <chords> G D9/F#</chords> <letter>Eu não procuro por coroas</letter> </line> <line> <chords> Am</chords> <letter>Ou pelas águas das fontes</letter> </line> <line> <chords> Em</chords> <letter>Desesperado eu Te busco</letter> </line> <line> <chords> D</chords> <letter>Frenético acredito</letter> </line> <line> <chords> G D9/F#</chords> <letter>Que a visão da Tua face</letter> </line> <line> <chords> Am</chords> <letter>É tudo o que eu preciso</letter> </line> <line></line> <line> <letter>Eu Te direi</letter> </line> <line> <chords>G</chords> <letter> Que vai valer a pena</letter> </line> <line> <chords>D9/F# Em</chords> <letter> Vai valer a pena Senhor</letter> </line> <line> <chords> C</chords> <letter>Vai valer a pena mesmo</letter> </line> <line></line> <line> <chords>G D9/F#</chords> <letter> Vai valer a pena</letter> </line> <line> <chords> Em</chords> <letter>Vai valer a pena</letter> </line> <line> <chords> C Am G F9</chords> <letter>Vai valer a pena, mesmo</letter> </line> <line></line> <line> <letter>Segundo Trecho:</letter> </line> <line></line> <line> <chords> C</chords> <letter>Não compreendo os teus caminhos</letter> </line> <line> <chords> F9</chords> <letter>Mas te darei a minha canção</letter> </line> <line> <chords>Dm C</chords> <letter> Doces palavras te darei</letter> </line> <line> <chords> Em</chords> <letter>Me sustentas em minha dor</letter> </line> <line> <chords> F9</chords> <letter>E isso me leva mais perto de Ti</letter> </line> <line> <chords>Dm C</chords> <letter> Mais perto dos Teus caminhos</letter> </line> <line></line> <line> <chords> Am</chords> <letter>E ao redor de cada esquina</letter> </line> <line> <chords> G</chords> <letter>Em cima de cada montanha</letter> </line> <line> <chords> C G/B</chords> <letter>Eu não procuro por coroas</letter> </line> <line> <chords> Dm</chords> <letter>Ou pelas águas das fontes</letter> </line> <line> <chords> Am</chords> <letter>Desesperado eu te busco</letter> </line> <line> <chords> G</chords> <letter>Frenético acredito</letter> </line> <line> <chords> C G/B</chords> <letter>Que a visão da tua face</letter> </line> <line> <chords> Dm</chords> <letter>É tudo, tudo, tudo o que eu preciso</letter> </line> <line></line> <line> <letter>E te direi</letter> </line> <line> <chords>C G/B</chords> <letter> Que vai valer a pena</letter> </line> <line> <chords> Am</chords> <letter>Vai valer a pena</letter> </line> <line> <chords> F</chords> <letter>Vai valer a pena, mesmo eu sei</letter> </line> <line></line> <line> <chords>C G/B</chords> <letter> Sim vai valer a pena</letter> </line> <line> <chords> Am</chords> <letter>Vai valer a pena</letter> </line> <line> <chords> F</chords> <letter>Vai valer a pena dizer sim, dizer sim</letter> </line> <line></line> <line> <chords> C G/B</chords> <letter>Pois quando o grande dia chegar</letter> </line> <line> <chords> Am F9</chords> <letter>Pois quando o grande dia chegar</letter> </line> <line> <chords> C G/B</chords> <letter>Quando o grande dia chegar eu sei eu sei eu sei</letter> </line> <line> <chords> Am F9</chords> <letter>Eu cantarei, eu cantarei, eu cantarei Senhor</letter> </line> <line></line> <line> <chords>C G/B</chords> <letter> Senhor, valeu a pena</letter> </line> <line> <chords> Am</chords> <letter>Senhor, valeu a pena</letter> </line> <line> <chords> F9</chords> <letter>Senhor, valeu a pena mesmo</letter> </line> </music>',2),(3,'G',NULL,'<?xml version=\'1.0\'?> \n<music>\n	<line>\n		<intro>G  Em  D  C</intro>\n	</line>\n	<line></line>\n	<line>\n		<chords>G</chords>\n		<letter>Eu olho para cruz</letter>\n	</line>\n	<line>\n		<chords>                 D/F#</chords>\n		<letter>E para a cruz eu vou</letter>\n	</line>\n	<line>\n		<chords>                      Em</chords>\n		<letter>Do Seu sofrer participar</letter>\n	</line>\n	<line>\n		<chords>                   C</chords>\n		<letter>Da Sua obra vou cantar</letter>\n	</line>\n	<line></line>\n	<line>\n		<chords>           G</chords>\n		<letter>Meu Salvador</letter>\n	</line>\n	<line>\n		<chords>            D/F#</chords>\n		<letter>Na cruz mostrou</letter>\n	</line>\n	<line>\n		<chords>           Em</chords>\n		<letter>O amor do Pai</letter>\n	</line>\n	<line>\n		<chords>         C</chords>\n		<letter>O justo Deus</letter>\n	</line>\n	<line></line>\n	<line>\n		<chords>G</chords>\n		<letter>Pela cruz  me chamou</letter>\n	</line>\n	<line>\n		<chords>D/F#</chords>\n		<letter>Gentilmente me atraiu e eu</letter>\n	</line>\n	<line>\n		<chords>Em</chords>\n		<letter>Sem palavras me aproximo</letter>\n	</line>\n	<line>\n		<chords>C9</chords>\n		<letter>Quebrantado por Seu amor</letter>\n	</line>\n	<line></line>\n	<line>\n		<chords>G  D/F# Em C</chords>\n	</line>\n	<line></line>\n	<line>\n		<chords>           G</chords>\n		<letter>Imerecida vida</letter>\n	</line>\n	<line>\n		<chords>              D/F#</chords>\n		<letter>De graça recebi</letter>\n	</line>\n	<line>\n		<chords>          Em</chords>\n		<letter>Por Sua cruz</letter>\n	</line>\n	<line>\n		<chords>               C</chords>\n		<letter>Da morte me livrou</letter>\n	</line>\n	<line></line>\n	<line>\n		<chords>               G</chords>\n		<letter>Trouxe-me a vida</letter>\n	</line>\n	<line>\n		<chords>                D/F#</chords>\n		<letter>Eu estava condenado</letter>\n	</line>\n	<line>\n		<chords>                Em</chords>\n		<letter>Mas agora pela cruz</letter>\n	</line>\n	<line>\n		<chords>                C</chords>\n		<letter>Eu fui reconciliado</letter>\n	</line>\n	<line></line>\n	<line>\n		<chords>Am                     G/B C9</chords>\n		<letter>Impressionante é o Seu  amor</letter>\n	</line>\n	<line>\n		<chords>Am               G/B  C9</chords>\n		<letter>Me redimiu e me mostrou</letter>\n	</line>\n	<line>\n		<chords>               D</chords>\n		<letter>O quanto é fiel.</letter>\n	</line>\n</music>',3);
/*!40000 ALTER TABLE `cifra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipe` (
  `equipe_id` int(5) NOT NULL AUTO_INCREMENT,
  `equipe_nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `igreja` int(5) NOT NULL,
  PRIMARY KEY (`equipe_id`),
  KEY `fk_equipe_igreja1` (`igreja`),
  CONSTRAINT `fk_equipe_igreja1` FOREIGN KEY (`igreja`) REFERENCES `igreja` (`igreja_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipe`
--

LOCK TABLES `equipe` WRITE;
/*!40000 ALTER TABLE `equipe` DISABLE KEYS */;
INSERT INTO `equipe` VALUES (1,'Vivendo Jesus',1),(2,'Casa de Benção',1),(3,'SOM',1),(4,'Adoração',2),(5,'iJovem Azul',4);
/*!40000 ALTER TABLE `equipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escala`
--

DROP TABLE IF EXISTS `escala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escala` (
  `escala_id` int(10) NOT NULL AUTO_INCREMENT,
  `escala_obs` text COLLATE latin1_general_ci,
  `equipe` int(5) NOT NULL,
  `agenda` int(10) NOT NULL,
  PRIMARY KEY (`escala_id`),
  KEY `fk_escala_equipe` (`equipe`),
  KEY `fk_escala_agenda1` (`agenda`),
  CONSTRAINT `fk_escala_agenda1` FOREIGN KEY (`agenda`) REFERENCES `agenda` (`agenda_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_escala_equipe` FOREIGN KEY (`equipe`) REFERENCES `equipe` (`equipe_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escala`
--

LOCK TABLES `escala` WRITE;
/*!40000 ALTER TABLE `escala` DISABLE KEYS */;
INSERT INTO `escala` VALUES (1,'equipe 1',1,1);
/*!40000 ALTER TABLE `escala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escala_cifra`
--

DROP TABLE IF EXISTS `escala_cifra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escala_cifra` (
  `escala` int(10) NOT NULL,
  `cifra` int(10) NOT NULL,
  PRIMARY KEY (`escala`,`cifra`),
  KEY `fk_escala_cifra_escala1` (`escala`),
  KEY `fk_escala_cifra_cifra1` (`cifra`),
  CONSTRAINT `fk_escala_cifra_cifra1` FOREIGN KEY (`cifra`) REFERENCES `cifra` (`cifra_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_escala_cifra_escala1` FOREIGN KEY (`escala`) REFERENCES `escala` (`escala_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escala_cifra`
--

LOCK TABLES `escala_cifra` WRITE;
/*!40000 ALTER TABLE `escala_cifra` DISABLE KEYS */;
/*!40000 ALTER TABLE `escala_cifra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escala_membro_atuacao`
--

DROP TABLE IF EXISTS `escala_membro_atuacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escala_membro_atuacao` (
  `escala` int(10) NOT NULL,
  `membro_atuacao` int(10) NOT NULL,
  PRIMARY KEY (`escala`,`membro_atuacao`),
  KEY `fk_escala_membro_atuacao_escala1` (`escala`),
  KEY `fk_escala_membro_atuacao_membro_atuacao1` (`membro_atuacao`),
  CONSTRAINT `fk_escala_membro_atuacao_escala1` FOREIGN KEY (`escala`) REFERENCES `escala` (`escala_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_escala_membro_atuacao_membro_atuacao1` FOREIGN KEY (`membro_atuacao`) REFERENCES `membro_atuacao` (`membro_atuacao_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escala_membro_atuacao`
--

LOCK TABLES `escala_membro_atuacao` WRITE;
/*!40000 ALTER TABLE `escala_membro_atuacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `escala_membro_atuacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igreja`
--

DROP TABLE IF EXISTS `igreja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igreja` (
  `igreja_id` int(5) NOT NULL AUTO_INCREMENT,
  `igreja_nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `igreja_endereco` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`igreja_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igreja`
--

LOCK TABLES `igreja` WRITE;
/*!40000 ALTER TABLE `igreja` DISABLE KEYS */;
INSERT INTO `igreja` VALUES (1,'915 SUL','915 SUL'),(2,'CEILÂNDIA','CEILÂNDIA'),(3,'SOBRADINHO','SOBRADINHO'),(4,'GAMA','GAMA');
/*!40000 ALTER TABLE `igreja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membro`
--

DROP TABLE IF EXISTS `membro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membro` (
  `membro_id` int(5) NOT NULL AUTO_INCREMENT,
  `membro_nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `membro_tag` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `membro_tel` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `membro_cel` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `membro_email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`membro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membro`
--

LOCK TABLES `membro` WRITE;
/*!40000 ALTER TABLE `membro` DISABLE KEYS */;
INSERT INTO `membro` VALUES (1,'Thiago Augusto','THI','(61) 3355-5557','(61) 8154-5269','arcanjo.thiago@gmail.com'),(2,'Evandro Reis','EVR','','','evandroreis88@gmail.com'),(3,'Lucas Reis','LUC',NULL,NULL,'');
/*!40000 ALTER TABLE `membro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membro_atuacao`
--

DROP TABLE IF EXISTS `membro_atuacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membro_atuacao` (
  `membro_atuacao_id` int(10) NOT NULL AUTO_INCREMENT,
  `membro` int(5) NOT NULL,
  `equipe` int(5) NOT NULL,
  `area` int(5) NOT NULL,
  `membro_atuacao_ok` set('sim','nao') COLLATE latin1_general_ci NOT NULL DEFAULT 'sim',
  PRIMARY KEY (`membro_atuacao_id`),
  KEY `fk_membro` (`membro`),
  KEY `fk_area` (`area`),
  KEY `fk_equipe` (`equipe`),
  CONSTRAINT `fk_area` FOREIGN KEY (`area`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_equipe` FOREIGN KEY (`equipe`) REFERENCES `equipe` (`equipe_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_membro` FOREIGN KEY (`membro`) REFERENCES `membro` (`membro_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membro_atuacao`
--

LOCK TABLES `membro_atuacao` WRITE;
/*!40000 ALTER TABLE `membro_atuacao` DISABLE KEYS */;
INSERT INTO `membro_atuacao` VALUES (1,1,3,2,'sim'),(2,2,2,4,'sim'),(3,2,2,1,'sim'),(4,2,2,3,'sim'),(5,1,1,5,'sim'),(7,3,5,6,'sim'),(8,3,5,1,'sim'),(9,3,2,6,'sim');
/*!40000 ALTER TABLE `membro_atuacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musica`
--

DROP TABLE IF EXISTS `musica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musica` (
  `musica_id` int(10) NOT NULL AUTO_INCREMENT,
  `musica_autor` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `musica_nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`musica_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musica`
--

LOCK TABLES `musica` WRITE;
/*!40000 ALTER TABLE `musica` DISABLE KEYS */;
INSERT INTO `musica` VALUES (1,'Hillsong','With Everything'),(2,'Livres Para Adorar','Vai Valer a Pena'),(3,'Vineyard','Quebrantado');
/*!40000 ALTER TABLE `musica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticia`
--

DROP TABLE IF EXISTS `noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticia` (
  `noticia_id` int(5) NOT NULL AUTO_INCREMENT,
  `noticia_data` datetime NOT NULL,
  `noticia_desc` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `noticia_texto` text COLLATE latin1_general_ci,
  `membro` int(5) NOT NULL,
  PRIMARY KEY (`noticia_id`),
  KEY `fk_noticia_membro1` (`membro`),
  CONSTRAINT `fk_noticia_membro1` FOREIGN KEY (`membro`) REFERENCES `membro` (`membro_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia`
--

LOCK TABLES `noticia` WRITE;
/*!40000 ALTER TABLE `noticia` DISABLE KEYS */;
INSERT INTO `noticia` VALUES (1,'2016-02-05 10:00:00','Teste de Not&iacute;cia ','Teste TEste teste teste',1),(2,'2016-02-10 12:00:00','01 Teste novamente','Teste TEste teste teste',2);
/*!40000 ALTER TABLE `noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_Acessos`
--

DROP TABLE IF EXISTS `view_Acessos`;
/*!50001 DROP VIEW IF EXISTS `view_Acessos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_Acessos` AS SELECT 
 1 AS `acesso_id`,
 1 AS `acesso_login`,
 1 AS `acesso_igreja`,
 1 AS `acesso_area`,
 1 AS `acesso_membro`,
 1 AS `acesso_equipe`,
 1 AS `acesso_musica`,
 1 AS `acesso_escala`,
 1 AS `acesso_acesso`,
 1 AS `membro`,
 1 AS `membro_nome`,
 1 AS `membro_tag`,
 1 AS `membro_tel`,
 1 AS `membro_cel`,
 1 AS `membro_email`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_Equipes`
--

DROP TABLE IF EXISTS `view_Equipes`;
/*!50001 DROP VIEW IF EXISTS `view_Equipes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_Equipes` AS SELECT 
 1 AS `equipe_id`,
 1 AS `equipe_nome`,
 1 AS `igreja_nome`,
 1 AS `igreja_endereco`,
 1 AS `igreja`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_EscalaMusicas`
--

DROP TABLE IF EXISTS `view_EscalaMusicas`;
/*!50001 DROP VIEW IF EXISTS `view_EscalaMusicas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_EscalaMusicas` AS SELECT 
 1 AS `escala_id`,
 1 AS `escala_obs`,
 1 AS `agenda_data`,
 1 AS `agenda_obs`,
 1 AS `equipe_nome`,
 1 AS `igreja_nome`,
 1 AS `musica_nome`,
 1 AS `musica_autor`,
 1 AS `cifra_tom`,
 1 AS `cifra_texto`,
 1 AS `cifra`,
 1 AS `musica`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_Escalas`
--

DROP TABLE IF EXISTS `view_Escalas`;
/*!50001 DROP VIEW IF EXISTS `view_Escalas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_Escalas` AS SELECT 
 1 AS `escala_id`,
 1 AS `escala_obs`,
 1 AS `agenda`,
 1 AS `agenda_data`,
 1 AS `agenda_nome`,
 1 AS `agenda_obs`,
 1 AS `equipe`,
 1 AS `equipe_nome`,
 1 AS `igreja_nome`,
 1 AS `igreja`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_MembroAtuacao`
--

DROP TABLE IF EXISTS `view_MembroAtuacao`;
/*!50001 DROP VIEW IF EXISTS `view_MembroAtuacao`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_MembroAtuacao` AS SELECT 
 1 AS `membro_atuacao_id`,
 1 AS `membro_atuacao_ok`,
 1 AS `membro`,
 1 AS `membro_nome`,
 1 AS `membro_tag`,
 1 AS `area`,
 1 AS `area_nome`,
 1 AS `area_icon`,
 1 AS `equipe`,
 1 AS `equipe_nome`,
 1 AS `igreja`,
 1 AS `igreja_nome`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_Musicas`
--

DROP TABLE IF EXISTS `view_Musicas`;
/*!50001 DROP VIEW IF EXISTS `view_Musicas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_Musicas` AS SELECT 
 1 AS `musica_id`,
 1 AS `musica_nome`,
 1 AS `musica_autor`,
 1 AS `cifra_tom`,
 1 AS `cifra_padrao`,
 1 AS `cifra_texto`,
 1 AS `cifra`,
 1 AS `musica`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_Noticias`
--

DROP TABLE IF EXISTS `view_Noticias`;
/*!50001 DROP VIEW IF EXISTS `view_Noticias`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_Noticias` AS SELECT 
 1 AS `noticia_id`,
 1 AS `noticia_data`,
 1 AS `noticia_desc`,
 1 AS `noticia_texto`,
 1 AS `membro`,
 1 AS `membro_nome`,
 1 AS `membro_tag`,
 1 AS `membro_tel`,
 1 AS `membro_cel`,
 1 AS `membro_email`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_Acessos`
--

/*!50001 DROP VIEW IF EXISTS `view_Acessos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_Acessos` AS select `ac`.`acesso_id` AS `acesso_id`,`ac`.`acesso_login` AS `acesso_login`,`ac`.`acesso_igreja` AS `acesso_igreja`,`ac`.`acesso_area` AS `acesso_area`,`ac`.`acesso_membro` AS `acesso_membro`,`ac`.`acesso_equipe` AS `acesso_equipe`,`ac`.`acesso_musica` AS `acesso_musica`,`ac`.`acesso_escala` AS `acesso_escala`,`ac`.`acesso_acesso` AS `acesso_acesso`,`ac`.`membro` AS `membro`,`me`.`membro_nome` AS `membro_nome`,`me`.`membro_tag` AS `membro_tag`,`me`.`membro_tel` AS `membro_tel`,`me`.`membro_cel` AS `membro_cel`,`me`.`membro_email` AS `membro_email` from (`acesso` `ac` join `membro` `me` on((`me`.`membro_id` = `ac`.`membro`))) order by `me`.`membro_nome`,`ac`.`acesso_login` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_Equipes`
--

/*!50001 DROP VIEW IF EXISTS `view_Equipes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_Equipes` AS select `eq`.`equipe_id` AS `equipe_id`,`eq`.`equipe_nome` AS `equipe_nome`,`ig`.`igreja_nome` AS `igreja_nome`,`ig`.`igreja_endereco` AS `igreja_endereco`,`eq`.`igreja` AS `igreja` from (`equipe` `eq` join `igreja` `ig` on((`ig`.`igreja_id` = `eq`.`igreja`))) order by `ig`.`igreja_nome`,`eq`.`equipe_nome` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_EscalaMusicas`
--

/*!50001 DROP VIEW IF EXISTS `view_EscalaMusicas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`thiag803_admin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_EscalaMusicas` AS select `v_es`.`escala_id` AS `escala_id`,`v_es`.`escala_obs` AS `escala_obs`,`v_es`.`agenda_data` AS `agenda_data`,`v_es`.`agenda_obs` AS `agenda_obs`,`v_es`.`equipe_nome` AS `equipe_nome`,`v_es`.`igreja_nome` AS `igreja_nome`,`v_mu`.`musica_nome` AS `musica_nome`,`v_mu`.`musica_autor` AS `musica_autor`,`v_mu`.`cifra_tom` AS `cifra_tom`,`v_mu`.`cifra_texto` AS `cifra_texto`,`v_mu`.`cifra` AS `cifra`,`v_mu`.`musica` AS `musica` from ((`view_Escalas` `v_es` join `escala_cifra` `es_ci` on((`es_ci`.`escala` = `v_es`.`escala_id`))) join `view_Musicas` `v_mu` on((`v_mu`.`cifra` = `es_ci`.`cifra`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_Escalas`
--

/*!50001 DROP VIEW IF EXISTS `view_Escalas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`thiag803_admin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_Escalas` AS select `es`.`escala_id` AS `escala_id`,`es`.`escala_obs` AS `escala_obs`,`es`.`agenda` AS `agenda`,`ag`.`agenda_data` AS `agenda_data`,`ag`.`agenda_nome` AS `agenda_nome`,`ag`.`agenda_obs` AS `agenda_obs`,`es`.`equipe` AS `equipe`,`eq`.`equipe_nome` AS `equipe_nome`,`ig`.`igreja_nome` AS `igreja_nome`,`eq`.`igreja` AS `igreja` from (((`escala` `es` join `agenda` `ag` on((`ag`.`agenda_id` = `es`.`agenda`))) join `equipe` `eq` on((`eq`.`equipe_id` = `es`.`equipe`))) join `igreja` `ig` on((`ig`.`igreja_id` = `eq`.`igreja`))) order by `ag`.`agenda_data` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_MembroAtuacao`
--

/*!50001 DROP VIEW IF EXISTS `view_MembroAtuacao`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_MembroAtuacao` AS select `ma`.`membro_atuacao_id` AS `membro_atuacao_id`,`ma`.`membro_atuacao_ok` AS `membro_atuacao_ok`,`ma`.`membro` AS `membro`,`me`.`membro_nome` AS `membro_nome`,`me`.`membro_tag` AS `membro_tag`,`ma`.`area` AS `area`,`ar`.`area_nome` AS `area_nome`,`ar`.`area_icon` AS `area_icon`,`ma`.`equipe` AS `equipe`,`eq`.`equipe_nome` AS `equipe_nome`,`eq`.`igreja` AS `igreja`,`ig`.`igreja_nome` AS `igreja_nome` from ((((`membro_atuacao` `ma` join `membro` `me` on((`me`.`membro_id` = `ma`.`membro`))) join `area` `ar` on((`ar`.`area_id` = `ma`.`area`))) join `equipe` `eq` on((`eq`.`equipe_id` = `ma`.`equipe`))) join `igreja` `ig` on((`ig`.`igreja_id` = `eq`.`igreja`))) order by `me`.`membro_nome` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_Musicas`
--

/*!50001 DROP VIEW IF EXISTS `view_Musicas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`thiag803_admin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_Musicas` AS select `mu`.`musica_id` AS `musica_id`,`mu`.`musica_nome` AS `musica_nome`,`mu`.`musica_autor` AS `musica_autor`,`ci`.`cifra_tom` AS `cifra_tom`,`ci`.`cifra_padrao` AS `cifra_padrao`,`ci`.`cifra_texto` AS `cifra_texto`,`ci`.`cifra_id` AS `cifra`,`mu`.`musica_id` AS `musica` from (`musica` `mu` join `cifra` `ci` on((`ci`.`musica` = `mu`.`musica_id`))) order by `mu`.`musica_nome` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_Noticias`
--

/*!50001 DROP VIEW IF EXISTS `view_Noticias`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_Noticias` AS select `n`.`noticia_id` AS `noticia_id`,`n`.`noticia_data` AS `noticia_data`,`n`.`noticia_desc` AS `noticia_desc`,`n`.`noticia_texto` AS `noticia_texto`,`n`.`membro` AS `membro`,`m`.`membro_nome` AS `membro_nome`,`m`.`membro_tag` AS `membro_tag`,`m`.`membro_tel` AS `membro_tel`,`m`.`membro_cel` AS `membro_cel`,`m`.`membro_email` AS `membro_email` from (`noticia` `n` join `membro` `m` on((`n`.`membro` = `m`.`membro_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-10 15:38:26
