#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE suivi_projets;
CREATE DATABASE suivi_projets;
USE suivi_projets;
#------------------------------------------------------------
# Table: technologie
#------------------------------------------------------------

CREATE TABLE technologie(
        id_technologie Int  Auto_increment  NOT NULL ,
        libelle        Varchar (250) NOT NULL
	,CONSTRAINT technologie_PK PRIMARY KEY (id_technologie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: intervenant
#------------------------------------------------------------

CREATE TABLE intervenant(
        id_intervenant Int  Auto_increment  NOT NULL ,
        nom            Varchar (50) NOT NULL ,
        prenom         Varchar (50) NOT NULL ,
        email          Varchar (250)
	,CONSTRAINT intervenant_PK PRIMARY KEY (id_intervenant)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commentaire
#------------------------------------------------------------

CREATE TABLE commentaire(
        id_commentaire Int  Auto_increment  NOT NULL ,
        titre          Varchar (250) NOT NULL ,
        contenu        Text NOT NULL ,
        date           Date NOT NULL ,
        id_intervenant Int NOT NULL
	,CONSTRAINT commentaire_PK PRIMARY KEY (id_commentaire)

	,CONSTRAINT commentaire_intervenant_FK FOREIGN KEY (id_intervenant) REFERENCES intervenant(id_intervenant)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: rerentiel
#------------------------------------------------------------

CREATE TABLE rerentiel(
        id_referentiel        Int  Auto_increment  NOT NULL ,
        num_rncp              Varchar (50) NOT NULL ,
        libelle               Varchar (250) NOT NULL ,
        details               Text NOT NULL ,
        date_validite         Date NOT NULL ,
        objectifs             Text ,
        activites_visees      Text ,
        competences_attestees Text ,
        modalite_evaluation   Text
	,CONSTRAINT rerentiel_PK PRIMARY KEY (id_referentiel)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: titre
#------------------------------------------------------------

CREATE TABLE titre(
        id_titre       Int  Auto_increment  NOT NULL ,
        nom            Varchar (250) NOT NULL ,
        id_referentiel Int NOT NULL
	,CONSTRAINT titre_PK PRIMARY KEY (id_titre)

	,CONSTRAINT titre_rerentiel_FK FOREIGN KEY (id_referentiel) REFERENCES referentiel (id_referentiel)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: promotion
#------------------------------------------------------------

CREATE TABLE promotion(
        id_promo       Int  Auto_increment  NOT NULL ,
        nom            Varchar (250) NOT NULL
	,CONSTRAINT promo_PK PRIMARY KEY (id_promo)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: apprenant
#------------------------------------------------------------

CREATE TABLE apprenant(
        id_apprenant   Int  Auto_increment  NOT NULL ,
        nom            Varchar (50) NOT NULL ,
        prenom         Varchar (50) NOT NULL ,
        email          Varchar (250) ,
        date_debut     Date NOT NULL ,
        date_fin       Date NOT NULL ,
        obtenu         Bool DEFAULT 0,
        date_obtention Date DEFAULT NULL ,
        id_titre       Int NOT NULL,
        id_promo       Int NOT NULL
	,CONSTRAINT apprenant_PK PRIMARY KEY (id_apprenant)

	,CONSTRAINT apprenant_titre_FK FOREIGN KEY (id_titre) REFERENCES titre(id_titre)
	,CONSTRAINT apprenant_promo_FK FOREIGN KEY (id_promo) REFERENCES promotion(id_promo)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: projet
#------------------------------------------------------------

CREATE TABLE projet(
        id_projet    Int  Auto_increment  NOT NULL ,
        nom          Varchar (250) ,
        presentation Text NOT NULL ,
        specificites Text ,
        evolutions   Text ,
        date_debut   Date NOT NULL ,
        id_apprenant Int NOT NULL
	,CONSTRAINT projet_PK PRIMARY KEY (id_projet)

	,CONSTRAINT projet_apprenant_FK FOREIGN KEY (id_apprenant) REFERENCES apprenant(id_apprenant)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: suivi
#------------------------------------------------------------

CREATE TABLE suivi(
        id_suivi       Int  Auto_increment  NOT NULL ,
        date           Date NOT NULL ,
        commentaire    Longtext NOT NULL ,
        id_intervenant Int NOT NULL ,
        id_projet      Int NOT NULL
	,CONSTRAINT suivi_PK PRIMARY KEY (id_suivi)

	,CONSTRAINT suivi_intervenant_FK FOREIGN KEY (id_intervenant) REFERENCES intervenant(id_intervenant)
	,CONSTRAINT suivi_projet0_FK FOREIGN KEY (id_projet) REFERENCES projet(id_projet)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fonctionnalite
#------------------------------------------------------------

CREATE TABLE fonctionnalite(
        id_fonctionnalite Int  Auto_increment  NOT NULL ,
        libelle           Varchar (250) NOT NULL ,
        details           Text NOT NULL ,
        id_projet         Int NOT NULL
	,CONSTRAINT fonctionnalite_PK PRIMARY KEY (id_fonctionnalite)

	,CONSTRAINT fonctionnalite_projet_FK FOREIGN KEY (id_projet) REFERENCES projet(id_projet)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: bloc_competence
#------------------------------------------------------------

CREATE TABLE bloc_competence(
        id_bloc         Int  Auto_increment  NOT NULL ,
        code            Varchar (50) NOT NULL ,
        libelle         Varchar (250) NOT NULL ,
        mode_evaluation Text NOT NULL ,
        id_referentiel  Int NOT NULL
	,CONSTRAINT bloc_competence_PK PRIMARY KEY (id_bloc)

	,CONSTRAINT bloc_competence_rerentiel_FK FOREIGN KEY (id_referentiel) REFERENCES referentiel (id_referentiel)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: competence
#------------------------------------------------------------

CREATE TABLE competence(
        id_competence Int  Auto_increment  NOT NULL ,
        libelle       Varchar (250) NOT NULL ,
        detail        Text DEFAULT NULL ,
        eliminatoire Bool DEFAULT 0 ,
        id_bloc            Int NOT NULL
	,CONSTRAINT competence_PK PRIMARY KEY (id_competence)

	,CONSTRAINT competence_bloc_competence_FK FOREIGN KEY (id_bloc) REFERENCES bloc_competence(id_bloc)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: exploiter
#------------------------------------------------------------

CREATE TABLE exploiter(
        id_technologie Int NOT NULL ,
        id_projet      Int NOT NULL
	,CONSTRAINT exploiter_PK PRIMARY KEY (id_technologie,id_projet)

	,CONSTRAINT exploiter_technologie_FK FOREIGN KEY (id_technologie) REFERENCES technologie(id_technologie)
	,CONSTRAINT exploiter_projet0_FK FOREIGN KEY (id_projet) REFERENCES projet(id_projet)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: concerner
#------------------------------------------------------------

CREATE TABLE concerner(
        id_fonctionnalite Int NOT NULL ,
        id_commentaire    Int NOT NULL ,
        id_projet         Int NOT NULL
	,CONSTRAINT concerner_PK PRIMARY KEY (id_fonctionnalite,id_commentaire,id_projet)

	,CONSTRAINT concerner_fonctionnalite_FK FOREIGN KEY (id_fonctionnalite) REFERENCES fonctionnalite(id_fonctionnalite)
	,CONSTRAINT concerner_commentaire0_FK FOREIGN KEY (id_commentaire) REFERENCES commentaire(id_commentaire)
	,CONSTRAINT concerner_projet1_FK FOREIGN KEY (id_projet) REFERENCES projet(id_projet)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: valider
#------------------------------------------------------------

CREATE TABLE valider(
        id_competence     Int NOT NULL ,
        id_fonctionnalite Int NOT NULL
	,CONSTRAINT valider_PK PRIMARY KEY (id_competence,id_fonctionnalite)

	,CONSTRAINT valider_competence_FK FOREIGN KEY (id_competence) REFERENCES competence(id_competence)
	,CONSTRAINT valider_fonctionnalite0_FK FOREIGN KEY (id_fonctionnalite) REFERENCES fonctionnalite(id_fonctionnalite)
)ENGINE=InnoDB;

