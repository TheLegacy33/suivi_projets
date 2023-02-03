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

DROP DATABASE suivi_projets;
CREATE DATABASE suivi_projets;
USE suivi_projets;

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
  `email` varchar(250) CHARACTER SET utf8mb4  NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `obtenu` tinyint(1) NOT NULL DEFAULT '0',
  `date_obtention` date DEFAULT NULL,
  `id_titre` int NOT NULL,
  `id_promo` int NOT NULL,
  PRIMARY KEY (`id_apprenant`),
  KEY `apprenant_titre_FK` (`id_titre`),
  KEY `apprenant_promo_FK` (`id_promo`),
  CONSTRAINT `apprenant_promo_FK` FOREIGN KEY (`id_promo`) REFERENCES `promotion` (`id_promo`),
  CONSTRAINT `apprenant_titre_FK` FOREIGN KEY (`id_titre`) REFERENCES `titre` (`id_titre`)
) ENGINE=InnoDB AUTO_INCREMENT=15;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apprenant`
--

LOCK TABLES `apprenant` WRITE;
/*!40000 ALTER TABLE `apprenant` DISABLE KEYS */;
INSERT INTO `apprenant` VALUES (1,'AGBANGLA','Claude','claude.agbangla@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(2,'ALTABER','Thibault','thibault.altaber@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(3,'ATTALI','Joanna','joanna.attali@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(4,'BALLET','Bryan','bryan.ballet@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(5,'DAVID','Benoit','benoit.david@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(6,'DURAND','Mickael','mickael.durand@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(7,'EMONTS','Sandie','sandie.emonts@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(8,'GUINARD','Julia','julia.guinard@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(9,'HUGON','Maurane','maurane.hugon@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(10,'LIMLAHI','Fawsy','fawsy.limlahi@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(11,'LOORIUS','Olivier','olivier.loorius@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(12,'MARZOUK','Anissa','anissa.marzouk@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(13,'TARTARY','Yoan','yoan.tartary@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1),(14,'VIANA','Ludivine','ludivine.viana@3wa.io','2022-10-10','2023-04-14',0,NULL,1,1);
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
  CONSTRAINT `bloc_competence_rerentiel_FK` FOREIGN KEY (`id_referentiel`) REFERENCES `rerentiel` (`id_referentiel`)
) ENGINE=InnoDB AUTO_INCREMENT=6;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloc_competence`
--

LOCK TABLES `bloc_competence` WRITE;
/*!40000 ALTER TABLE `bloc_competence` DISABLE KEYS */;
INSERT INTO `bloc_competence` VALUES (1,'RNCP34393BC01','Découper, assembler et programmer les pages d\'un site web ou d\'une application','Evaluation sur un cas pratique donnant lieu à rapport écrit, portant sur la réalisation d’un site web ou d’une application.',1),(2,'RNCP34393BC02','Intégrer les contenus et les effets graphiques d\'un site web ou d\'une application','Evaluation individuelle sur exercices pratiques en temps limité réalisés sur ordinateur, portant sur l’intégration de contenus (textes, sons, images, vidéos).',1),(3,'RNCP34393BC03','Conformer le site web ou l\'application aux normes d\'accès et de référencement','Evaluation individuelle sur exercices pratiques en temps limité réalisés sur ordinateur, portant sur les normes d’accès, les balises et la compatibilité avec les navigateurs du marché.',1),(4,'RNCP34393BC04','Programmer l\'interaction entre l\'utilisateur et le site web ou l\'application','Evaluation individuelle sur exercices pratiques en temps limité réalisés sur ordinateur, portant sur la programmation de l’interface utilisateur.',1),(5,'RNCP34393BC05','Stocker et récupérer les informations utilisateurs dans une base de données','Evaluation individuelle sur exercices pratiques en temps limité réalisés sur ordinateur, portant sur la construction et l’exploitation d’une base de données.',1);
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
) ENGINE=InnoDB;
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
  `detail` text CHARACTER SET utf8mb4 ,
  `eliminatoire` tinyint(1) NOT NULL DEFAULT '0',
  `id_bloc` int NOT NULL,
  PRIMARY KEY (`id_competence`),
  KEY `competence_bloc_competence_FK` (`id_bloc`),
  CONSTRAINT `competence_bloc_competence_FK` FOREIGN KEY (`id_bloc`) REFERENCES `bloc_competence` (`id_bloc`)
) ENGINE=InnoDB AUTO_INCREMENT=22;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competence`
--

LOCK TABLES `competence` WRITE;
/*!40000 ALTER TABLE `competence` DISABLE KEYS */;
INSERT INTO `competence` VALUES (1,'Analyser la maquette graphique du site web ou de l’application à réaliser afin d’inscrire l’ensemble des pages dans un schéma détaillant le contenu de chacune d’entre elles.',NULL,0,1),(2,'Préciser le schéma de navigation en vue d’assurer la meilleure ergonomie de l’application, et dresser la liste exhaustive des effets graphiques demandés par les concepteurs de l’application web.',NULL,0,1),(3,'Maîtriser la syntaxe des langages HTML5 ou CSS et l’utilisation des balises, afin d’assurer une programmation robuste.',NULL,0,1),(4,'Importer les polices de caractères en cohérence avec les maquettes graphiques.',NULL,0,2),(5,'Aérer et mettre en valeur le texte au travers d’éléments typographiques, afin d’apporter le maximum de clarté pour les utilisateurs.',NULL,0,2),(6,'Coder en HTML5 en distinguant contenus et forme, afin d’obtenir les effets recherchés par les concepteurs de l’application.',NULL,0,2),(7,'Programmer les effets graphiques en langage CSS, en vue d’optimiser l’expérience utilisateur.',NULL,0,2),(8,'Réaliser l’animation, la transition et la transformation 2D. en utilisant les fonctions avancées de CSS3.',NULL,0,2),(9,'Coder en HTML5/CSS pour mettre l’application en conformité avec les recommandations W3C. (World Wide Web Consortium)',NULL,0,3),(10,'Recenser les problèmes éventuels d’accessibilité selon les différents types d’utilisateurs en vue de proposer des améliorations.',NULL,0,3),(11,'Traduire les principes du référencement dans le code HTML5 des pages de l’application ou du site, afin d’optimiser le résultat sur différents moteurs de recherche.',NULL,0,3),(12,'Tester la compatibilité de l’application avec les navigateurs Firefox, Internet Explorer, Google Chrome, Safari, Opera, etc. en vue de recenser les anomalies de contenus, de forme et d’effets graphiques.',NULL,0,3),(13,'Utiliser MediaQueries pour la modulation des règles CSS et recenser les difficultés d’accès et de rendu utilisateur en fonction des différents terminaux, en vue de proposer des améliorations.',NULL,0,3),(14,'Gérer les sessions en langage PHP, valider et filtrer les données saisies en fonction des règles et contraintes de sécurité, en vue de mémoriser les données ou les actions d’un utilisateur de manière persistante.',NULL,0,4),(15,'Créer des objets simples en langage JavaScript, contenant des méthodes et des propriétés, en vue de récupérer les données de formulaires.',NULL,0,4),(16,'Manipuler une page en langage HTML grâce au DOM en vue d’optimiser l’expérience utilisateur.',NULL,0,4),(17,'Utiliser jQuery pour simplifier l\'écriture du code en langage JavaScript.',NULL,0,4),(18,'Modéliser une base de données adaptée à l’application réalisée, en utilisant les méthodologies Merise et UML.',NULL,0,5),(19,'Identifier toutes les données gérées par l’application en vue de définir la structure de la base de données.',NULL,0,5),(20,'Exporter et importer les données d’une base de données en utilisant le langage SQL.',NULL,0,5),(21,'Filtrer, trier, regrouper et calculer sur les données d’une table afin d’assurer la mise à jour de la base de données.',NULL,0,5);
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
) ENGINE=InnoDB;
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
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exploiter`
--

LOCK TABLES `exploiter` WRITE;
/*!40000 ALTER TABLE `exploiter` DISABLE KEYS */;
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
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fonctionnalite`
--

LOCK TABLES `fonctionnalite` WRITE;
/*!40000 ALTER TABLE `fonctionnalite` DISABLE KEYS */;
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
  PRIMARY KEY (`id_intervenant`)
) ENGINE=InnoDB AUTO_INCREMENT=5;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervenant`
--

LOCK TABLES `intervenant` WRITE;
/*!40000 ALTER TABLE `intervenant` DISABLE KEYS */;
INSERT INTO `intervenant` VALUES (1,'GILLET','Michel','michel@avalone-fr.com'),(2,'GODET','Keven','hello@keven.fr'),(3,'ZOURGANI','Atif Mickaël','atif.developpeur@gmail.com'),(4,'D\'ARROS','Thibaud','thibaud.arros@gmail.com');
/*!40000 ALTER TABLE `intervenant` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projet`
--

LOCK TABLES `projet` WRITE;
/*!40000 ALTER TABLE `projet` DISABLE KEYS */;
INSERT INTO `projet` VALUES (1,'Plateforme de rencontre match par les rêves','L\'objectif du projet est de proposer un site  de rencontre sur lequel la correspondance des profils et les rêves des personnes seront des critères d\'affinité entre les personnes inscrites.',NULL,'Organisation de rencontres (Lieux, Horaires, ...)','2023-02-02',12),(2,'Plateforme référence sur le cinéma','L\'objectif est de proposer un site permettant de chercher et consulter tous les films possibles et de créer si besoin une playliste, marquer des films vu, à voir ou en favoris et de commenter ces films ','Utilisation d\'une API externe pour le listing des films présentés','Propositions de films par intérêts, API Allociné pour le cinéma, API IMBD / TheMovieDB','2023-02-02',5),(3,'	Gestion de carnet de santé vétérinaire','L\'objectif est de proposer un espace \"Carnet de santé\" pour les vétérinaires et animaux de compagnie','Utilisation d\'une API Externe de géolocalisation et d\'une API pour les races','Intégrer d\'autres catégories d\'animaux que chiens et chats, assistance à la recherche de vétérinaires','2023-02-02',4),(4,'Plateforme de suivi et gestion des tournois de pelote basque','L\'objectif est de proposer un site permettant d\'organiser des tourois de pelote basque avec accès ouvert et restreint.',NULL,'Historisation des matchs et statistiques','2023-02-02',1),(5,'Plateforme d\'organisation de sessions de jeux en ligne','L\'objectif est de proposer une plateforme de mise en place de sessions de jeux vidéos avec la possibilité pour les utilisateurs de choisir de rejoindre une partie ou d\'en héberger une.',NULL,'Organisation de tournois','2023-02-02',10),(6,'Site d\'un humoriste','L\'objectif du projet est de proposer un site de présentation d\'un humoriste, de ses sketches et ses tournées, avec possibilité de réserver des billets en ligne et de demander des devis pour l\'organisation d\'un événement dont l\'artiste sera l\'animateur',NULL,'Planification de tournées','2023-02-02',3),(7,'Site vitrine Thérapeute','L\'objectif est de proposer un site de présentation et d\'information en lien avec un thérapeute ',NULL,NULL,'2023-02-02',14),(8,'Plateforme coaching sportif','L\'objectif est de proposer une plateforme de suivi de programme sportif, avec mise en place de programme, d\'exercices et de cycles ainsi qu\'un dashboard sur l\'évolution du poids, des calories, ...',NULL,NULL,'2023-02-02',9),(9,'OpenClassroom de l\'élaboration du vin','L\'objectif est de proposer une plateforme d\'apprentissage dans le métier du vin, leçons, tutos, exercices et ateliers',NULL,'Récompenses par module de leçon, partenariats','2023-02-02',6),(10,'Vitrine patisserie','L\'objectif est présenter les réalisation d\'une patisserie avec détails, commentaire et demande de devis',NULL,'Ateliers et tutos','2023-02-02',11),(11,'Gestion salle de concerts','L\'objectif est de proposer une plateforme de gestion et d\'organisation de concerts, avec détails sur les artistes, la planification des concerts, la billeterie.',NULL,'Demande de devis artiste, blog sur les concerts','2023-02-02',7),(12,'Platefrome GED agences immobilières','L\'objectif est de proposer une mise en relation et un échange des documents entre locataires, agence et prestataires.',NULL,'Messagerie, Agenda, Outils externes liés','2023-02-02',2),(13,'Plateforme bibliothèque','L\'objectif est de proposer une mise en ligne des livres disponibles dans sa bilbiothèque, avec interactions avec des utilisateurs, livrs favoris, livres à lire, livres lus, ...',NULL,'Ouverture à une communauté avec propositions de livres à lire, lien avec une API des livres en vedette, assistant de saisie des infos par scan de l\'ISBN et recherche dans API','2023-02-02',13);
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
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB AUTO_INCREMENT=2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotion`
--

LOCK TABLES `promotion` WRITE;
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
INSERT INTO `promotion` VALUES (1,'BDX08');
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rerentiel`
--

DROP TABLE IF EXISTS `rerentiel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rerentiel` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rerentiel`
--

LOCK TABLES `rerentiel` WRITE;
/*!40000 ALTER TABLE `rerentiel` DISABLE KEYS */;
INSERT INTO `rerentiel` VALUES (1,'RNCP34393','Développeur intégrateur en réalisation d\'applications web','Certification remplacée par : RNCP37273 - Développeur web full stack<br>Nomenclature du niveau de qualification : Niveau 5<br>Code(s) NSF :<br><br>326t : Programmation, mise en place de logiciels<br><br>Formacode(s) : <br><br>    46261 : Site internet pour mobile<br>    31088 : Programmation<br>    30867 : Langage javascript<br>    30805 : Langage PHP<br>    71910 : framework symfony','2023-01-27','La certification de Développeur intégrateur en réalisation d’applications web est destinée aux futurs techniciens spécialistes de la programmation. Elle atteste de leur capacité à réaliser des applications, à se conformer aux normes d’accessibilité et de référencement en vigueur, ainsi qu’à optimiser le confort de navigation de l’utilisateur. \n\nCette certification présente deux caractéristiques essentielles : \n\n- Elle recouvre les compétences nécessaires à la réalisation (programmation des pages et intégration des éléments multimédia) \n\n- Elle est délivrée à l’issue d’une formation intensive et très pratique qui constitue une véritable possibilité de reconversion sur le marché de l’emploi.   \n\nEn comparaison avec des certifications existantes, qui allient compétences conceptuelles et techniques, cette certification est centrée sur les compétences techniques de la production, répondant ainsi aux besoins principaux des entreprises du numérique et de leurs clients.  ','Les activités du Développeur intégrateur en réalisation d’applications Web s’ordonnent en cinq ensembles :  <br><br>La programmation et l’assemblage des pages en langages HTML5 (structure) et CSS (styles).<br>L’intégration des contenus (textes, images, vidéos, sons) dans le code HTML5 et des effets graphiques en langage JavaScript<br>La mise en conformité au regard des normes d’accessibilité et de référencement (Norme W3C) et la vérification de la compatibilité avec les différents navigateurs du marché  (Firefox, Internet Explorer, Google Chrome, Safari, Opera, etc.)<br>La programmation de l’interaction entre l’utilisateur et l’application (réponse du  serveur aux instructions de l’utilisateur) – Langages PHP et JavaScript.<br>Le stockage et la récupération des informations dans une base de données (méthodologies Merise et UML) – Langage SQL.<br><br>Sauf exception dans de petites structures ou en auto-entrepreneur, le Développeur intégrateur en réalisation d’applications Web ne participe pas à l’analyse stratégique et à la conception.  ','Analyser la maquette graphique du site web ou de l’application à réaliser afin d’inscrire l’ensemble des pages dans un schéma détaillant le contenu de chacune d’entre elles.<br>Préciser le schéma de navigation en vue d’assurer la meilleure ergonomie de l’application, et dresser la liste exhaustive des effets graphiques demandés par les concepteurs de l’application web.<br>Maîtriser la syntaxe des langages HTML5 ou CSS et l’utilisation des balises, afin d’assurer une programmation robuste.<br>Importer les polices de caractères en cohérence avec les maquettes graphiques.<br>Aérer et mettre en valeur le texte au travers d’éléments typographiques, afin d’apporter le maximum de clarté pour les utilisateurs.<br>Coder en HTML5 en distinguant contenus et forme, afin d’obtenir les effets recherchés par les concepteurs de l’application.<br>Programmer les effets graphiques en langage CSS, en vue d’optimiser l’expérience utilisateur.<br>Réaliser l’animation, la transition et la transformation 2D. en utilisant les fonctions avancées de CSS3.<br>Coder en HTML5/CSS pour mettre l’application en conformité avec les recommandations W3C. (World Wide Web Consortium)<br>Recenser les problèmes éventuels d’accessibilité selon les différents types d’utilisateurs en vue de proposer des améliorations.<br><br>Traduire les principes du référencement dans le code HTML5 des pages de l’application ou du site, afin d’optimiser le résultat sur différents moteurs de recherche.<br>Tester la compatibilité de l’application avec les navigateurs Firefox, Internet Explorer, Google Chrome, Safari, Opera, etc. en vue de recenser les anomalies de contenus, de forme et d’effets graphiques.<br><br>Utiliser MediaQueries pour la modulation des règles CSS et recenser les difficultés d’accès et de rendu utilisateur en fonction des différents terminaux, en vue de proposer des améliorations.<br>Gérer les sessions en langage PHP, valider et filtrer les données saisies en fonction des règles et contraintes de sécurité, en vue de mémoriser les données ou les actions d’un utilisateur de manière persistante.<br>Créer des objets simples en langage JavaScript, contenant des méthodes et des propriétés, en vue de récupérer les données de formulaires.<br>Manipuler une page en langage HTML grâce au DOM en vue d’optimiser l’expérience utilisateur.<br>Utiliser jQuery pour simplifier l\'écriture du code en langage JavaScript. \nModéliser une base de données adaptée à l’application réalisée, en utilisant les méthodologies Merise et UML.<br>Identifier toutes les données gérées par l’application en vue de définir la structure de la base de données.<br>Exporter et importer les données d’une base de données en utilisant le langage SQL.<br>Filtrer, trier, regrouper et calculer sur les données d’une table afin d’assurer la mise à jour de la base de données. ','Evaluation sur un cas pratique donnant lieu à rapport écrit, portant sur la réalisation d’un site web ou d’une application.<br>Evaluation individuelle sur exercices pratiques en temps limité réalisés sur ordinateur.\n');
/*!40000 ALTER TABLE `rerentiel` ENABLE KEYS */;
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
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suivi`
--

LOCK TABLES `suivi` WRITE;
/*!40000 ALTER TABLE `suivi` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=17;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technologie`
--

LOCK TABLES `technologie` WRITE;
/*!40000 ALTER TABLE `technologie` DISABLE KEYS */;
INSERT INTO `technologie` VALUES (1,'Merise'),(2,'UML'),(3,'SQL'),(4,'HTML 5'),(5,'CSS 3'),(6,'JavaScript'),(7,'PHP'),(8,'MySQL'),(9,'Angular'),(10,'JQuery'),(11,'React.JS'),(12,'React Native'),(13,'Symfony'),(14,'Vue.JS'),(15,'Bootstrap'),(16,'Responsive');
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
  CONSTRAINT `titre_rerentiel_FK` FOREIGN KEY (`id_referentiel`) REFERENCES `rerentiel` (`id_referentiel`)
) ENGINE=InnoDB AUTO_INCREMENT=2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `titre`
--

LOCK TABLES `titre` WRITE;
/*!40000 ALTER TABLE `titre` DISABLE KEYS */;
INSERT INTO `titre` VALUES (1,'Développeur intégrateur en réalisation d\'applications web',1);
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
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valider`
--

LOCK TABLES `valider` WRITE;
/*!40000 ALTER TABLE `valider` DISABLE KEYS */;
/*!40000 ALTER TABLE `valider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'suivi_projets'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-03 16:18:37
