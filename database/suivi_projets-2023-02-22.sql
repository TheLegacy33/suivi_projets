-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: suivi_projets
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.10.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `suivi_projets`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `suivi_projets` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `suivi_projets`;

--
-- Table structure for table `apprenant`
--

DROP TABLE IF EXISTS `apprenant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apprenant` (
  `id_apprenant` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `id_promo` int NOT NULL,
  `id_personne` int DEFAULT NULL,
  PRIMARY KEY (`id_apprenant`),
  KEY `apprenant_promo_FK` (`id_promo`),
  KEY `FK_APP_PERS` (`id_personne`),
  CONSTRAINT `apprenant_promo_FK` FOREIGN KEY (`id_promo`) REFERENCES `promotion` (`id_promo`),
  CONSTRAINT `FK_APP_PERS` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apprenant`
--

LOCK TABLES `apprenant` WRITE;
/*!40000 ALTER TABLE `apprenant` DISABLE KEYS */;
INSERT INTO `apprenant` VALUES (1,'AGBANGLA','Claude','claude.agbangla@3wa.io',1,1),(2,'ALTABER','Thibault','thibault.altaber@3wa.io',1,2),(3,'ATTALI','Joanna','joanna.attali@3wa.io',1,3),(4,'BALLET','Bryan','bryan.ballet@3wa.io',1,4),(5,'DAVID','Benoit','benoit.david@3wa.io',1,5),(6,'DURAND','Mickael','mickael.durand@3wa.io',1,6),(7,'EMONTS','Sandie','sandie.emonts@3wa.io',1,7),(8,'GUINARD','Julia','julia.guinard@3wa.io',1,8),(9,'HUGON','Maurane','maurane.hugon@3wa.io',1,9),(10,'LIMLAHI','Fawsy','fawsy.limlahi@3wa.io',1,10),(11,'LOORIUS','Olivier','olivier.loorius@3wa.io',1,11),(12,'MARZOUK','Anissa','anissa.marzouk@3wa.io',1,12),(13,'TARTARY','Yoan','yoan.tartary@3wa.io',1,13),(14,'VIANA','Ludivine','ludivine.viana@3wa.io',1,14);
/*!40000 ALTER TABLE `apprenant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bloc_competence`
--

DROP TABLE IF EXISTS `bloc_competence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bloc_competence` (
  `id_bloc` int NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `libelle` varchar(250) NOT NULL,
  `mode_evaluation` text NOT NULL,
  `id_referentiel` int NOT NULL,
  PRIMARY KEY (`id_bloc`),
  KEY `bloc_competence_rerentiel_FK` (`id_referentiel`),
  CONSTRAINT `bloc_competence_rerentiel_FK` FOREIGN KEY (`id_referentiel`) REFERENCES `referentiel` (`id_referentiel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloc_competence`
--

LOCK TABLES `bloc_competence` WRITE;
/*!40000 ALTER TABLE `bloc_competence` DISABLE KEYS */;
INSERT INTO `bloc_competence` VALUES (1,'RNCP34393BC01','D??couper, assembler et programmer les pages d\'un site web ou d\'une application','Evaluation sur un cas pratique donnant lieu ?? rapport ??crit, portant sur la r??alisation d???un site web ou d???une application.',1),(2,'RNCP34393BC02','Int??grer les contenus et les effets graphiques d\'un site web ou d\'une application','Evaluation individuelle sur exercices pratiques en temps limit?? r??alis??s sur ordinateur, portant sur l???int??gration de contenus (textes, sons, images, vid??os).',1),(3,'RNCP34393BC03','Conformer le site web ou l\'application aux normes d\'acc??s et de r??f??rencement','Evaluation individuelle sur exercices pratiques en temps limit?? r??alis??s sur ordinateur, portant sur les normes d???acc??s, les balises et la compatibilit?? avec les navigateurs du march??.',1),(4,'RNCP34393BC04','Programmer l\'interaction entre l\'utilisateur et le site web ou l\'application','Evaluation individuelle sur exercices pratiques en temps limit?? r??alis??s sur ordinateur, portant sur la programmation de l???interface utilisateur.',1),(5,'RNCP34393BC05','Stocker et r??cup??rer les informations utilisateurs dans une base de donn??es','Evaluation individuelle sur exercices pratiques en temps limit?? r??alis??s sur ordinateur, portant sur la construction et l???exploitation d???une base de donn??es.',1);
/*!40000 ALTER TABLE `bloc_competence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commentaire` (
  `id_commentaire` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(250) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  `id_intervenant` int NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `commentaire_intervenant_FK` (`id_intervenant`),
  CONSTRAINT `commentaire_intervenant_FK` FOREIGN KEY (`id_intervenant`) REFERENCES `intervenant` (`id_intervenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentaire`
--

LOCK TABLES `commentaire` WRITE;
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `commentaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competence`
--

DROP TABLE IF EXISTS `competence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competence` (
  `id_competence` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL,
  `detail` text,
  `eliminatoire` tinyint(1) NOT NULL DEFAULT '0',
  `id_bloc` int NOT NULL,
  PRIMARY KEY (`id_competence`),
  KEY `competence_bloc_competence_FK` (`id_bloc`),
  CONSTRAINT `competence_bloc_competence_FK` FOREIGN KEY (`id_bloc`) REFERENCES `bloc_competence` (`id_bloc`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competence`
--

LOCK TABLES `competence` WRITE;
/*!40000 ALTER TABLE `competence` DISABLE KEYS */;
INSERT INTO `competence` VALUES (1,'Analyser la maquette graphique du site web ou de l???application ?? r??aliser afin d???inscrire l???ensemble des pages dans un sch??ma d??taillant le contenu de chacune d???entre elles.',NULL,0,1),(2,'Pr??ciser le sch??ma de navigation en vue d???assurer la meilleure ergonomie de l???application, et dresser la liste exhaustive des effets graphiques demand??s par les concepteurs de l???application web.',NULL,0,1),(3,'Ma??triser la syntaxe des langages HTML5 ou CSS et l???utilisation des balises, afin d???assurer une programmation robuste.',NULL,0,1),(4,'Importer les polices de caract??res en coh??rence avec les maquettes graphiques.',NULL,0,2),(5,'A??rer et mettre en valeur le texte au travers d?????l??ments typographiques, afin d???apporter le maximum de clart?? pour les utilisateurs.',NULL,0,2),(6,'Coder en HTML5 en distinguant contenus et forme, afin d???obtenir les effets recherch??s par les concepteurs de l???application.',NULL,0,2),(7,'Programmer les effets graphiques en langage CSS, en vue d???optimiser l???exp??rience utilisateur.',NULL,0,2),(8,'R??aliser l???animation, la transition et la transformation 2D. en utilisant les fonctions avanc??es de CSS3.',NULL,0,2),(9,'Coder en HTML5/CSS pour mettre l???application en conformit?? avec les recommandations W3C. (World Wide Web Consortium)',NULL,0,3),(10,'Recenser les probl??mes ??ventuels d???accessibilit?? selon les diff??rents types d???utilisateurs en vue de proposer des am??liorations.',NULL,0,3),(11,'Traduire les principes du r??f??rencement dans le code HTML5 des pages de l???application ou du site, afin d???optimiser le r??sultat sur diff??rents moteurs de recherche.',NULL,0,3),(12,'Tester la compatibilit?? de l???application avec les navigateurs Firefox, Internet Explorer, Google Chrome, Safari, Opera, etc. en vue de recenser les anomalies de contenus, de forme et d???effets graphiques.',NULL,0,3),(13,'Utiliser MediaQueries pour la modulation des r??gles CSS et recenser les difficult??s d???acc??s et de rendu utilisateur en fonction des diff??rents terminaux, en vue de proposer des am??liorations.',NULL,0,3),(14,'G??rer les sessions en langage PHP, valider et filtrer les donn??es saisies en fonction des r??gles et contraintes de s??curit??, en vue de m??moriser les donn??es ou les actions d???un utilisateur de mani??re persistante.',NULL,0,4),(15,'Cr??er des objets simples en langage JavaScript, contenant des m??thodes et des propri??t??s, en vue de r??cup??rer les donn??es de formulaires.',NULL,0,4),(16,'Manipuler une page en langage HTML gr??ce au DOM en vue d???optimiser l???exp??rience utilisateur.',NULL,0,4),(17,'Utiliser jQuery pour simplifier l\'??criture du code en langage JavaScript.',NULL,0,4),(18,'Mod??liser une base de donn??es adapt??e ?? l???application r??alis??e, en utilisant les m??thodologies Merise et UML.',NULL,0,5),(19,'Identifier toutes les donn??es g??r??es par l???application en vue de d??finir la structure de la base de donn??es.',NULL,0,5),(20,'Exporter et importer les donn??es d???une base de donn??es en utilisant le langage SQL.',NULL,0,5),(21,'Filtrer, trier, regrouper et calculer sur les donn??es d???une table afin d???assurer la mise ?? jour de la base de donn??es.',NULL,0,5);
/*!40000 ALTER TABLE `competence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concerner`
--

DROP TABLE IF EXISTS `concerner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `concerner` (
  `id_fonctionnalite` int NOT NULL,
  `id_commentaire` int NOT NULL,
  `id_projet` int NOT NULL,
  PRIMARY KEY (`id_fonctionnalite`,`id_commentaire`,`id_projet`),
  KEY `concerner_commentaire0_FK` (`id_commentaire`),
  KEY `concerner_projet1_FK` (`id_projet`),
  CONSTRAINT `concerner_commentaire0_FK` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaire` (`id_commentaire`),
  CONSTRAINT `concerner_fonctionnalite_FK` FOREIGN KEY (`id_fonctionnalite`) REFERENCES `fonctionnalite` (`id_fonctionnalite`),
  CONSTRAINT `concerner_projet1_FK` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concerner`
--

LOCK TABLES `concerner` WRITE;
/*!40000 ALTER TABLE `concerner` DISABLE KEYS */;
/*!40000 ALTER TABLE `concerner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exploiter`
--

DROP TABLE IF EXISTS `exploiter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exploiter` (
  `id_technologie` int NOT NULL,
  `id_projet` int NOT NULL,
  PRIMARY KEY (`id_technologie`,`id_projet`),
  KEY `exploiter_projet0_FK` (`id_projet`),
  CONSTRAINT `exploiter_projet0_FK` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`),
  CONSTRAINT `exploiter_technologie_FK` FOREIGN KEY (`id_technologie`) REFERENCES `technologie` (`id_technologie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exploiter`
--

LOCK TABLES `exploiter` WRITE;
/*!40000 ALTER TABLE `exploiter` DISABLE KEYS */;
INSERT INTO `exploiter` VALUES (1,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(16,1),(19,1),(20,1),(1,2),(3,2),(4,2),(5,2),(6,2),(7,2),(8,2),(16,2),(19,2),(20,2),(1,3),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(10,3),(16,3),(19,3),(20,3),(1,4),(3,4),(4,4),(5,4),(6,4),(7,4),(8,4),(16,4),(17,4),(19,4),(20,4),(1,5),(3,5),(4,5),(5,5),(6,5),(7,5),(8,5),(16,5),(19,5),(20,5),(1,6),(3,6),(4,6),(5,6),(6,6),(7,6),(8,6),(16,6),(19,6),(20,6),(1,7),(3,7),(4,7),(5,7),(6,7),(7,7),(8,7),(16,7),(19,7),(20,7),(1,8),(3,8),(4,8),(5,8),(6,8),(7,8),(8,8),(16,8),(17,8),(19,8),(20,8),(1,9),(3,9),(4,9),(5,9),(6,9),(7,9),(8,9),(16,9),(19,9),(20,9),(1,10),(3,10),(4,10),(5,10),(6,10),(7,10),(8,10),(16,10),(19,10),(20,10),(1,11),(3,11),(4,11),(5,11),(6,11),(7,11),(8,11),(16,11),(1,12),(3,12),(4,12),(5,12),(6,12),(7,12),(8,12),(10,12),(16,12),(17,12),(19,12),(20,12),(1,13),(3,13),(4,13),(5,13),(6,13),(7,13),(8,13),(16,13),(19,13),(20,13),(3,15),(4,15),(5,15),(6,15),(7,15),(8,15),(16,15);
/*!40000 ALTER TABLE `exploiter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fonctionnalite`
--

DROP TABLE IF EXISTS `fonctionnalite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fonctionnalite` (
  `id_fonctionnalite` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL,
  `details` text NOT NULL,
  `id_projet` int NOT NULL,
  PRIMARY KEY (`id_fonctionnalite`),
  KEY `fonctionnalite_projet_FK` (`id_projet`),
  CONSTRAINT `fonctionnalite_projet_FK` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fonctionnalite`
--

LOCK TABLES `fonctionnalite` WRITE;
/*!40000 ALTER TABLE `fonctionnalite` DISABLE KEYS */;
INSERT INTO `fonctionnalite` VALUES (1,'Inscription des participants','Gestion des inscriptions des participants incluant :\nInformations administratives n??cessaires\nPr??f??rences\n\n',4),(2,'Enregistrement des ??quipes de 2 participants','Gestion de la constitution des ??quipes',4),(3,'Gestion d\'??quipes masculines / f??minines','Gestion des ??quipes par cat??gories / genres',4),(4,'Gestion des cat??gories d\'??quipes','Gestion des cat??gories d\'??quipes ',4),(5,'Consitution des poules avec gestion des pr??f??rences des participants','Attribution des poules et affectation des ??quipes / participants',4),(6,'Planificiation des matchs','Gestion des planning de tournoi et des matchs en fonction des pr??f??rences des participants',4),(7,'Authentification','Syst??me d\'authentification',4),(12,'Gestion des utilisateurs','Inscription, connexion et profil des utilisateurs',1),(13,'Gestion des r??ves','Saisie et consultation des r??ves par utilisateur',1),(14,'Syst??me de votes','Impl??mentation d\'un syst??me de vote pour que les utilisateurs puissent voter pour le r??ve d\'un autre utilisateur',1),(15,'Salon de discussion','Mise en place d\'un salon de discussion pour ??changer entre utilisateurs',1),(16,'Correspondance / Matching des r??ves par classification ','Mise en place d\'un algorithme de matching entre les r??ves des utilisateurs.\r\nUtilisation ??ventuelle de mot-cl??s et de crit??res de correspondance',1),(17,'Authentification / Fiche utilisateur','Gestion de l\'authentification des utilisateurs \r\nGestion des informations personnelles des utilisateurs',2),(18,'Commentaires et notation de films','Gestion des commentaires et votes pour des films',2),(19,'Visualtisation des fiches films','Listing et d??tails des films',2),(20,'Gestion de playlist','Mise en place de playlists(favoris, ?? voir, pour une soir??e, ...)',2),(21,'Recherche et tri','Possibilit?? de rechercher des films et de trier les donn??es',2),(22,'Utilisation d\'une API publique','Exploitation des donn??es en provenance d\'une API publique pour consulter et rechercher la liste des films',2),(23,'Gestion des animaus de compagnie','Gestion des donn??es compl??tes des animaux de compagnie \r\nPhotos de profil\r\nCarnet v??t??rinaire\r\nVaccinations ...',3),(24,'Gestion des v??t??rinaires','Gestion des v??t??rinaires avec donn??es de localisation',3),(25,'Agendas / RDV / Rappels','Gestion des agendas, planification des rendez-vous et rappels des RDV',3),(26,'Fiche v??t??rinaire','Gestion des informations utiles aux donn??es m??dicales et v??t??rinaires de chaque animal',3),(27,'Graphe d\'??volution du poids','Suivi et visualisation sous forme de graphique de l\'??volution du poids de l\'animal',3),(28,'Rappel automatique des vaccins','Mise en place d\'un syst??me de rappel automatique des vaccins obligatoires pour les animaux',3),(29,'Authentification obligatoire','Gestion de l\'authentification obligatoire des utilisateurs, patients, v??t??rinaires, ...',3),(30,'Authentification obligatoire agent / client','Mise en place d\'un syst??me d\'authnetification pour les agents / clients / prestataires',12),(31,'Gestion des clients','Mise ne place de la gestion des fiches cient',12),(32,'Gestion des documents','Stockage, partage et eploitation des documents par les agentes / clients / prestataires',12),(33,'Notification de mise en ligne de nouveaux documents','Mise en place d\'un syst??me de notification lors de la mise en ligne',12),(34,'Pr??sentation d\'un humoriste','Mise en place d\'une page de pr??sentation g??n??rale d\'un humoriste',6),(35,'Inscription + commentaires','Mise en place d\'un syst??me d\'inscription pour les visiteurs et de commentaires  ',6),(36,'Mise en ligne de sketches','Gestion de la mise en ligne de sketches par l\'humoriste',6),(37,'Mise en ligne de chroniques','Gestion de la publication de chroniques par l\'humoriste',6),(38,'Mise en lige de tourn??e','Gestion de la mise en ligne de tourn??es par l\'humoriste',6),(39,'Billeterie','Possibilit?? de r??server un spectacle par une redirection directe sur la page de la fnac',6),(40,'Authentification','Mise en place d\'un syst??me d\'authentification, inscription',9),(41,'Gestion des questionnaires ','Mise en place d\'un syst??me de parcours, gestion et mise en ligne des questionnaires',9),(42,'Gestion des le??ons','Mise en place du parcours p??dagogique et du contenu des le??ons / th??matiques ',9),(43,'Validations par QCM et questions diverses ','Impl??mentation de QCM avec r??ponses corrig??es',9),(44,'Authentification','Mise en place d\'un syst??me d\'authentification / inscription',11),(45,'Gestion artistes / concerts','Mise en place d\'un syst??me de gestion des artistes / groupes / concerts',11),(46,'Agenda','Mise en place de la gestion de plannification et mise en ligne des agendas de concerts',11),(47,'Billeterie','Mise en place d\'un syst??me de r??servation de billets en partenariat avec la Fnac',11),(48,'Espace membre','Mise en place de l\'espace membre pour profil / commentaires / partages',11),(49,'Pr??sentation de l\'art','Mise en ligne de la pr??sentation de l\'art Huichol',15),(50,'Publication des oeuvres','Gestion de la publication des informations sur les oeuvres r??alis??es par les Chamans',15),(51,'Inscription profil sportif','Gestion du profil du sportif (inscription, connexion, espace priv??)',8),(52,'Suivi de programmes / avancement dans les exercices ','Mise en ligne de programmes de coaching et suivi de l\'avancement dans le programme\r\nAccompagnement sur la r??alisation des exercices',8),(53,'Suivi des calories / poids','Mise en place d\'un syst??me de suivi de l\'??volution des calories / poids p??riodique',8),(54,'Gestion des exercices / instructions / vid??os','Publication du contenu des exercices\r\nInstructions ?? suivre sur les exercices \r\nLiens avec les vid??os des coachs sur les explications n??cessaires ?? la bonne r??alisation des exercices ',8),(55,'Inscription des utilisateurs','Mise en place d\'un syst??me d\'enregistrement et d\'inscription des utilisateurs',5),(56,'Espace priv??','Gestion des donn??es personnelles pour le profil / affinit??s',5),(57,'Gestion des jeux','Mise en place de la gestion des jeux (r??cup??ration possible par API)',5),(58,'Gestion des plateformes','Mise en place d\'un syst??me de gestion des plateformes disponibles (consoles, PC, ...)',5),(59,'Gestion des sessions','Mise en place d\'un syst??me de gestion des sessions planifi??es et suivi des sessions',5),(60,'Dashboard historique de jeux','Mise en place d\'un dashboard de suivi et d\'historique des parties et sessions',5),(61,'Pr??sentaton des r??alisations par cat??gorie','Mise en place de la pr??sentation des r??alisation avec classement par cat??gorie',10),(62,'Demande de devis','Mise en place d\'un formulaire de demande de devis personnalis??',10),(63,'Gestion des boutiques ','Mise en place d\'un syst??me de gestion des boutiques avec localisation et contact',10),(64,'Gestion des r??alisations','Mise en place d\'un syst??me de saisie et enregistrement des r??alisations ',10),(65,'Gestion des livres','Mise en place d\'un syst??me de gestion des livres dans la biblioth??que avec les genres et informations sp??cifiques (auteurs, ??diteurs, ...)',13),(66,'Gestion des auteurs','Mise en place d\'un syst??me de gestion des auteurs ',13),(67,'Commentaires et notations','Syst??le de gestion des commentaires et de notations sur les livres et les oeuvres',13),(68,'Recherche et publication avec partage','Mise en place de la recherche par cat??gories, livre\r\nPartage et publication des informations li??s ?? une oeuvre',13),(69,'Gestion des listes de lectures','Mise en place d\'un syst??me de gestion des listes de lecture (A Lire, Lu, Favoris, ...)',13),(70,'Formulaire de contact','Mise en place d\'un formulaire de contact',7),(71,'Questionnaire de qualifaction','Mise en place d\'un syst??me de questionnaire ?? remplir par les visiteurs pour qualifier les rendez-vous ?? prendre par la th??rapeute',7),(72,'Planning et Prise de rendez-vous','Organisation et planification des rendez-vous par la th??rapeute',7),(73,'Tutos / Conseils / Vid??os','Mise en ligne de tutos / conseils / vid??os sous la forme d\'un blog',7),(74,'Authentification','Mise en place d\'un syst??me d\'autentification et inscription utilisateur / th??rapeute',7);
/*!40000 ALTER TABLE `fonctionnalite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervenant`
--

DROP TABLE IF EXISTS `intervenant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervenant` (
  `id_intervenant` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `id_personne` int DEFAULT NULL,
  PRIMARY KEY (`id_intervenant`),
  KEY `FK_INT_PERS` (`id_personne`),
  CONSTRAINT `FK_INT_PERS` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervenant`
--

LOCK TABLES `intervenant` WRITE;
/*!40000 ALTER TABLE `intervenant` DISABLE KEYS */;
INSERT INTO `intervenant` VALUES (1,'GILLET','Michel','michel@avalone-fr.com',15),(2,'GODET','Keven','hello@keven.fr',16),(3,'ZOURGANI','Atif Micka??l','atif.developpeur@gmail.com',17),(4,'D\'ARROS','Thibaud','thibaud.arros@gmail.com',18);
/*!40000 ALTER TABLE `intervenant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obtenir`
--

DROP TABLE IF EXISTS `obtenir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obtenir` (
  `id_apprenant` int NOT NULL,
  `id_titre` int NOT NULL,
  `date_obtention` date NOT NULL,
  PRIMARY KEY (`id_apprenant`,`id_titre`,`date_obtention`),
  KEY `FK_OBT_TIT` (`id_titre`),
  CONSTRAINT `FK_OBT_APP` FOREIGN KEY (`id_apprenant`) REFERENCES `apprenant` (`id_apprenant`),
  CONSTRAINT `FK_OBT_TIT` FOREIGN KEY (`id_titre`) REFERENCES `titre` (`id_titre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obtenir`
--

LOCK TABLES `obtenir` WRITE;
/*!40000 ALTER TABLE `obtenir` DISABLE KEYS */;
/*!40000 ALTER TABLE `obtenir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personne` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne`
--

LOCK TABLES `personne` WRITE;
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` VALUES (1,'c.agbangla',''),(2,'t.altaber',''),(3,'j.attali',''),(4,'b.ballet',''),(5,'b.david',''),(6,'m.durand',''),(7,'s.emonts',''),(8,'j.guinard',''),(9,'m.hugon',''),(10,'f.limlahi',''),(11,'o.loorius',''),(12,'a.marzouk',''),(13,'y.tartary',''),(14,'l.viana',''),(15,'m.gillet','$2y$10$BWUZrnDBENpf4FF.nUaLLegGe7LzN.fT30M3JrjiH5jDtS4iz0giC'),(16,'k.godet',''),(17,'a.zourgani',''),(18,'t.darros','');
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projet`
--

DROP TABLE IF EXISTS `projet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projet` (
  `id_projet` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) DEFAULT NULL,
  `presentation` text NOT NULL,
  `specificites` text,
  `evolutions` text,
  `date_debut` date NOT NULL,
  `id_apprenant` int NOT NULL,
  PRIMARY KEY (`id_projet`),
  KEY `projet_apprenant_FK` (`id_apprenant`),
  CONSTRAINT `projet_apprenant_FK` FOREIGN KEY (`id_apprenant`) REFERENCES `apprenant` (`id_apprenant`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projet`
--

LOCK TABLES `projet` WRITE;
/*!40000 ALTER TABLE `projet` DISABLE KEYS */;
INSERT INTO `projet` VALUES (1,'Plateforme de rencontre match par les r??ves','L\'objectif du projet est de proposer un site  de rencontre sur lequel la correspondance des profils et les r??ves des personnes seront des crit??res d\'affinit?? entre les personnes inscrites.',NULL,'Organisation de rencontres (Lieux, Horaires, ...)','2023-02-02',12),(2,'Plateforme r??f??rence sur le cin??ma','L\'objectif est de proposer un site permettant de chercher et consulter tous les films possibles et de cr??er si besoin une playliste, marquer des films vu, ?? voir ou en favoris et de commenter ces films ','Utilisation d\'une API externe pour le listing des films pr??sent??s','Propositions de films par int??r??ts, API Allocin?? pour le cin??ma, API IMBD / TheMovieDB','2023-02-02',5),(3,'Gestion de carnet de sant?? v??t??rinaire','L\'objectif est de proposer un espace \"Carnet de sant??\" pour les v??t??rinaires et animaux de compagnie','Utilisation d\'une API Externe de g??olocalisation et d\'une API pour les races','Int??grer d\'autres cat??gories d\'animaux que chiens et chats, assistance ?? la recherche de v??t??rinaires','2023-02-02',4),(4,'Tournois de pelote basque','L\'objectif est de r??aliser une plateforme de suivi et gestion des tournois de pelote basque incluant consitution des ??quipes et suivi des r??sultats','Mise en oeuvre de proc??dures stock??es sous MySQL\r\nLogique prioris??e en BDD','Historisation des matchs et statistiques','2023-02-02',1),(5,'Plateforme d\'organisation de sessions de jeux en ligne','L\'objectif est de proposer une plateforme de mise en place de sessions de jeux vid??os avec la possibilit?? pour les utilisateurs de choisir de rejoindre une partie ou d\'en h??berger une.',NULL,'Organisation de tournois','2023-02-02',10),(6,'Site d\'un humoriste','L\'objectif du projet est de proposer un site de pr??sentation d\'un humoriste, de ses sketches et ses tourn??es, avec possibilit?? de r??server des billets en ligne et de demander des devis pour l\'organisation d\'un ??v??nement dont l\'artiste sera l\'animateur',NULL,'Planification de tourn??es','2023-02-02',3),(7,'Site vitrine Th??rapeute','L\'objectif est de proposer un site de pr??sentation et d\'information en lien avec un th??rapeute ',NULL,NULL,'2023-02-02',14),(8,'Plateforme coaching sportif','L\'objectif est de proposer une plateforme de suivi de programme sportif, avec mise en place de programme, d\'exercices et de cycles ainsi qu\'un dashboard sur l\'??volution du poids, des calories, ...','','Contact / Messagerie / Chat','2023-02-02',9),(9,'OpenClassroom de l\'??laboration du vin','L\'objectif est de proposer une plateforme d\'apprentissage dans le m??tier du vin, le??ons, tutos, exercices et ateliers',NULL,'R??compenses par module de le??on, partenariats','2023-02-02',6),(10,'Vitrine patisserie','L\'objectif est pr??senter les r??alisation d\'une patisserie avec d??tails, commentaire et demande de devis',NULL,'Ateliers et tutos','2023-02-02',11),(11,'Gestion salle de concerts','L\'objectif est de proposer une plateforme de gestion et d\'organisation de concerts, avec d??tails sur les artistes, la planification des concerts, la billeterie.',NULL,'Demande de devis artiste, blog sur les concerts','2023-02-02',7),(12,'Platefrome GED agences immobili??res','L\'objectif est de proposer une mise en relation et un ??change des documents entre locataires, agence et prestataires.',NULL,'Messagerie, Agenda, Outils externes li??s','2023-02-02',2),(13,'Plateforme biblioth??que','L\'objectif est de proposer une mise en ligne des livres disponibles dans sa bilbioth??que, avec interactions avec des utilisateurs, livrs favoris, livres ?? lire, livres lus, ...',NULL,'Ouverture ?? une communaut?? avec propositions de livres ?? lire, lien avec une API des livres en vedette, assistant de saisie des infos par scan de l\'ISBN et recherche dans API','2023-02-02',13),(15,'Site d\'information l\'art Huichol','Site de pr??sentation de l\'art Huichol int??grant la publication d\'oeuvres r??alis??es par les Chamans','','','2023-02-16',8);
/*!40000 ALTER TABLE `projet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotion` (
  `id_promo` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `id_titre` int NOT NULL,
  PRIMARY KEY (`id_promo`),
  KEY `promotion_FK` (`id_titre`),
  CONSTRAINT `promotion_FK` FOREIGN KEY (`id_titre`) REFERENCES `titre` (`id_titre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotion`
--

LOCK TABLES `promotion` WRITE;
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
INSERT INTO `promotion` VALUES (1,'BDX08','2022-10-10','2023-04-14',1);
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referentiel`
--

DROP TABLE IF EXISTS `referentiel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `referentiel` (
  `id_referentiel` int NOT NULL AUTO_INCREMENT,
  `num_rncp` varchar(50) NOT NULL,
  `libelle` varchar(250) NOT NULL,
  `details` text NOT NULL,
  `date_validite` date NOT NULL,
  `objectifs` text,
  `activites_visees` text,
  `competences_attestees` text,
  `modalite_evaluation` text,
  PRIMARY KEY (`id_referentiel`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referentiel`
--

LOCK TABLES `referentiel` WRITE;
/*!40000 ALTER TABLE `referentiel` DISABLE KEYS */;
INSERT INTO `referentiel` VALUES (1,'RNCP34393','D??veloppeur int??grateur en r??alisation d\'applications web','Certification remplac??e par : RNCP37273 - D??veloppeur web full stack<br>Nomenclature du niveau de qualification : Niveau 5<br>Code(s) NSF :<br><br>326t : Programmation, mise en place de logiciels<br><br>Formacode(s) : <br><br>    46261 : Site internet pour mobile<br>    31088 : Programmation<br>    30867 : Langage javascript<br>    30805 : Langage PHP<br>    71910 : framework symfony','2023-01-27','La certification de D??veloppeur int??grateur en r??alisation d???applications web est destin??e aux futurs techniciens sp??cialistes de la programmation. Elle atteste de leur capacit?? ?? r??aliser des applications, ?? se conformer aux normes d???accessibilit?? et de r??f??rencement en vigueur, ainsi qu????? optimiser le confort de navigation de l???utilisateur. \n\nCette certification pr??sente deux caract??ristiques essentielles : \n\n- Elle recouvre les comp??tences n??cessaires ?? la r??alisation (programmation des pages et int??gration des ??l??ments multim??dia) \n\n- Elle est d??livr??e ?? l???issue d???une formation intensive et tr??s pratique qui constitue une v??ritable possibilit?? de reconversion sur le march?? de l???emploi.   \n\nEn comparaison avec des certifications existantes, qui allient comp??tences conceptuelles et techniques, cette certification est centr??e sur les comp??tences techniques de la production, r??pondant ainsi aux besoins principaux des entreprises du num??rique et de leurs clients.  ','Les activit??s du D??veloppeur int??grateur en r??alisation d???applications Web s???ordonnent en cinq ensembles :  <br><br>La programmation et l???assemblage des pages en langages HTML5 (structure) et CSS (styles).<br>L???int??gration des contenus (textes, images, vid??os, sons) dans le code HTML5 et des effets graphiques en langage JavaScript<br>La mise en conformit?? au regard des normes d???accessibilit?? et de r??f??rencement (Norme W3C) et la v??rification de la compatibilit?? avec les diff??rents navigateurs du march??  (Firefox, Internet Explorer, Google Chrome, Safari, Opera, etc.)<br>La programmation de l???interaction entre l???utilisateur et l???application (r??ponse du  serveur aux instructions de l???utilisateur) ??? Langages PHP et JavaScript.<br>Le stockage et la r??cup??ration des informations dans une base de donn??es (m??thodologies Merise et UML) ??? Langage SQL.<br><br>Sauf exception dans de petites structures ou en auto-entrepreneur, le D??veloppeur int??grateur en r??alisation d???applications Web ne participe pas ?? l???analyse strat??gique et ?? la conception.  ','Analyser la maquette graphique du site web ou de l???application ?? r??aliser afin d???inscrire l???ensemble des pages dans un sch??ma d??taillant le contenu de chacune d???entre elles.<br>Pr??ciser le sch??ma de navigation en vue d???assurer la meilleure ergonomie de l???application, et dresser la liste exhaustive des effets graphiques demand??s par les concepteurs de l???application web.<br>Ma??triser la syntaxe des langages HTML5 ou CSS et l???utilisation des balises, afin d???assurer une programmation robuste.<br>Importer les polices de caract??res en coh??rence avec les maquettes graphiques.<br>A??rer et mettre en valeur le texte au travers d?????l??ments typographiques, afin d???apporter le maximum de clart?? pour les utilisateurs.<br>Coder en HTML5 en distinguant contenus et forme, afin d???obtenir les effets recherch??s par les concepteurs de l???application.<br>Programmer les effets graphiques en langage CSS, en vue d???optimiser l???exp??rience utilisateur.<br>R??aliser l???animation, la transition et la transformation 2D. en utilisant les fonctions avanc??es de CSS3.<br>Coder en HTML5/CSS pour mettre l???application en conformit?? avec les recommandations W3C. (World Wide Web Consortium)<br>Recenser les probl??mes ??ventuels d???accessibilit?? selon les diff??rents types d???utilisateurs en vue de proposer des am??liorations.<br><br>Traduire les principes du r??f??rencement dans le code HTML5 des pages de l???application ou du site, afin d???optimiser le r??sultat sur diff??rents moteurs de recherche.<br>Tester la compatibilit?? de l???application avec les navigateurs Firefox, Internet Explorer, Google Chrome, Safari, Opera, etc. en vue de recenser les anomalies de contenus, de forme et d???effets graphiques.<br><br>Utiliser MediaQueries pour la modulation des r??gles CSS et recenser les difficult??s d???acc??s et de rendu utilisateur en fonction des diff??rents terminaux, en vue de proposer des am??liorations.<br>G??rer les sessions en langage PHP, valider et filtrer les donn??es saisies en fonction des r??gles et contraintes de s??curit??, en vue de m??moriser les donn??es ou les actions d???un utilisateur de mani??re persistante.<br>Cr??er des objets simples en langage JavaScript, contenant des m??thodes et des propri??t??s, en vue de r??cup??rer les donn??es de formulaires.<br>Manipuler une page en langage HTML gr??ce au DOM en vue d???optimiser l???exp??rience utilisateur.<br>Utiliser jQuery pour simplifier l\'??criture du code en langage JavaScript. \nMod??liser une base de donn??es adapt??e ?? l???application r??alis??e, en utilisant les m??thodologies Merise et UML.<br>Identifier toutes les donn??es g??r??es par l???application en vue de d??finir la structure de la base de donn??es.<br>Exporter et importer les donn??es d???une base de donn??es en utilisant le langage SQL.<br>Filtrer, trier, regrouper et calculer sur les donn??es d???une table afin d???assurer la mise ?? jour de la base de donn??es. ','Evaluation sur un cas pratique donnant lieu ?? rapport ??crit, portant sur la r??alisation d???un site web ou d???une application.<br>Evaluation individuelle sur exercices pratiques en temps limit?? r??alis??s sur ordinateur.\n');
/*!40000 ALTER TABLE `referentiel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suivi`
--

DROP TABLE IF EXISTS `suivi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suivi` (
  `id_suivi` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `commentaire` longtext NOT NULL,
  `id_intervenant` int NOT NULL,
  `id_projet` int NOT NULL,
  PRIMARY KEY (`id_suivi`),
  KEY `suivi_intervenant_FK` (`id_intervenant`),
  KEY `suivi_projet0_FK` (`id_projet`),
  CONSTRAINT `suivi_intervenant_FK` FOREIGN KEY (`id_intervenant`) REFERENCES `intervenant` (`id_intervenant`),
  CONSTRAINT `suivi_projet0_FK` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suivi`
--

LOCK TABLES `suivi` WRITE;
/*!40000 ALTER TABLE `suivi` DISABLE KEYS */;
INSERT INTO `suivi` VALUES (1,'2023-02-02','Base de donn??e finalis??e en grande partie\r\nEcriture en cours de l\'algorithme de consitution des poules et rencontres\r\nConstruction en cours du formulaire d\'inscription\r\n',1,4),(2,'2023-02-02','Base de donn??es en cours de r??alisation\r\nMaquette ?? r??aliser',1,1),(3,'2023-02-02','Base de donn??es ?? r??aliser\r\nMaquette ?? r??aliser',1,2),(4,'2023-02-02','Base de donn??es r??alis??e\r\nMAquette en cours de r??alisation',1,3),(5,'2023-02-22','Base de donn??es finalis??e \r\nReste ?? terminer : Proc??dures stock??es \r\nMaquette termin??e\r\nMod??les de page HTML ok \r\nRete ?? inclure le moteur (PHP - BDD)',1,4),(6,'2023-02-02','Base de donn??es ?? r??aliser\r\nMaquette ?? r??aliser',1,12),(7,'2023-02-02','Base de donn??es ?? r??aliser\r\nMaquettes en cours de r??alisation',1,6),(8,'2023-02-22','Base de donn??es termin??e\r\nMaquettes termin??es \r\nMise en place du MVC et CRUD pour les sketches, les chroniques et les tourn??es \r\nReste ?? faire les commentaires \r\nReste ?? faire authentification',1,6),(9,'2023-02-22','Base de donn??es termin??e\r\nMaquettes termin??es\r\nMise en page termin??e\r\nAuthentification termin??e\r\nReste le CRUD sur les animaux / v??t??rinaires',1,3),(10,'2023-02-22','Base de donn??es termin??e\r\nMaquettes termin??es\r\nExploitation de l\'API de TheMovieDB termin??e pour le listing et la recherche\r\nMise en page et pr??sentation des films OK\r\nAuthentification en cours \r\nReste ?? faire la page de d??atils d\'un film \r\nReste ?? faire la gestion des playlists : Favoris, A Voir, ...',1,2),(11,'2023-02-02','Base de donn??es en cours de r??alisation\r\nMaquettes en cours de r??alisation',1,9),(12,'2023-02-22','Base de donn??es termin??e en grande partie\r\nMaquettes termin??es\r\nMise en page termin??e\r\nAuthentification ?? terminer\r\nCRUD des questions ok\r\nMise en ligne des le??ons et des contenus p??dagogiques / questionnaires et sous-th??mes',1,9),(13,'2023-02-02','Base de donn??es ?? r??aliser\r\nMaquettes ?? r??aliser',1,11),(14,'2023-02-16','Mise en place des maquettes \r\nMise en place de la structure et de la charte graphique',1,15),(15,'2023-02-02','Base de donn??es ?? r??aliser\r\nMaquette ?? r??aliser',1,8),(16,'2023-02-22','Base de donn??es finalis??e\r\nMaquettes finalis??es\r\nAuthentification r??alis??e (reste la s??cu du mot de passe hach??)\r\nMise en ligne des programmes / exercices\r\nImpl??mentation JS de Chart.JS pour le graphe des poids \r\nreste ?? faire : Ressources ?? int??grer\r\nreste ?? faire : page contact\r\nCharte graphique ?? terminer',1,8),(17,'2023-02-02','Base de donn??es ?? r??aliser\r\nMaquette ?? r??aliser',1,5),(18,'2023-02-22','Authentification termin??e\r\ngestion des sessions termin??e\r\ncharte graphique ok\r\nreste ?? faire : gestion des utilisateurs, des jeux et des plateformes\r\n',1,5),(19,'2023-02-02','Base de donn??es ?? r??aliser\r\nMaquette ?? r??aliser',1,10),(20,'2023-02-22','Base de donn??es termin??e\r\nmaquette ok\r\nMise en place du design g??n??ral / charte graphique\r\nArchitecture MVC en cours \r\nPr??sentation des r??alisations en cours ',1,10),(21,'2023-02-22','Base de donn??es termin??e\r\nMaquette termin??e\r\nInscription / connexion ok\r\nProfil utilisateur ok \r\nreste ?? faire : saisie des r??ves\r\nreste ?? faire : recherche et consultation des fiches utilisateurs\r\nSquelettes ok reste CSS',1,1),(22,'2023-02-02','Base de donn??es en cours\r\nMaquette ?? r??aliser',1,13),(23,'2023-02-22','Base de donn??es termin??e\r\nMaquette termin??e\r\nEnregistrement et modification des livres ok\r\nGestion de la recherche en cours\r\nreste ?? faire : listes de lecture',1,13),(24,'2023-02-02','Base de donn??es ?? r??aliser\r\nMAquette ?? r??aliser',1,7),(25,'2023-02-22','Base de donn??es termin??e\r\nMaquette ok\r\nArchitecture MVC en place\r\nAuthentification en cours\r\nMise en page et charte graphique en cours \r\nreste ?? faire : pr??sentation de la th??rapeute \r\nreste ?? faire : contenu des conseils / vid??os ',1,7),(26,'2023-02-22','Base de donn??es ok\r\nmaquette ok\r\npage d\'accueil agent ok\r\nCRUD client ok\r\nStockage du document en cours \r\nreste ?? faire : gestion des incidents\r\nreste ?? faire : acc??s client\r\nreste ?? faire : authentification ',1,12);
/*!40000 ALTER TABLE `suivi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technologie`
--

DROP TABLE IF EXISTS `technologie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `technologie` (
  `id_technologie` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`id_technologie`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technologie`
--

LOCK TABLES `technologie` WRITE;
/*!40000 ALTER TABLE `technologie` DISABLE KEYS */;
INSERT INTO `technologie` VALUES (1,'Merise'),(2,'UML'),(3,'SQL'),(4,'HTML 5'),(5,'CSS 3'),(6,'JavaScript'),(7,'PHP'),(8,'MySQL'),(9,'Angular'),(10,'JQuery'),(11,'React.JS'),(12,'React Native'),(13,'Symfony'),(14,'Vue.JS'),(15,'Bootstrap'),(16,'Responsive'),(17,'SASS'),(18,'Node.JS'),(19,'MVC'),(20,'POO');
/*!40000 ALTER TABLE `technologie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `titre`
--

DROP TABLE IF EXISTS `titre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `titre` (
  `id_titre` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `id_referentiel` int NOT NULL,
  PRIMARY KEY (`id_titre`),
  KEY `titre_rerentiel_FK` (`id_referentiel`),
  CONSTRAINT `titre_rerentiel_FK` FOREIGN KEY (`id_referentiel`) REFERENCES `referentiel` (`id_referentiel`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `titre`
--

LOCK TABLES `titre` WRITE;
/*!40000 ALTER TABLE `titre` DISABLE KEYS */;
INSERT INTO `titre` VALUES (1,'D??veloppeur int??grateur en r??alisation d\'applications web',1);
/*!40000 ALTER TABLE `titre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valider`
--

DROP TABLE IF EXISTS `valider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `valider` (
  `id_competence` int NOT NULL,
  `id_fonctionnalite` int NOT NULL,
  PRIMARY KEY (`id_competence`,`id_fonctionnalite`),
  KEY `valider_fonctionnalite0_FK` (`id_fonctionnalite`),
  CONSTRAINT `valider_competence_FK` FOREIGN KEY (`id_competence`) REFERENCES `competence` (`id_competence`),
  CONSTRAINT `valider_fonctionnalite0_FK` FOREIGN KEY (`id_fonctionnalite`) REFERENCES `fonctionnalite` (`id_fonctionnalite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valider`
--

LOCK TABLES `valider` WRITE;
/*!40000 ALTER TABLE `valider` DISABLE KEYS */;
/*!40000 ALTER TABLE `valider` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-22 16:19:28
