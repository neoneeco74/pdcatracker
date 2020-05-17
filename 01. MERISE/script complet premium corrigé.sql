#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: groupes_users
#------------------------------------------------------------

CREATE TABLE groupes_users(
        id_groupe    Int  Auto_increment  NOT NULL ,
        nom          Varchar (255) NOT NULL ,
        autorisation Int
	,CONSTRAINT groupes_users_PK PRIMARY KEY (id_groupe)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: services
#------------------------------------------------------------

CREATE TABLE services(
        id_service   Int  Auto_increment  NOT NULL ,
        nom          Varchar (255) NOT NULL ,
        autorisation Int
	,CONSTRAINT services_PK PRIMARY KEY (id_service)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user    Int  Auto_increment  NOT NULL ,
        prenom     Varchar (255) NOT NULL ,
        nom        Varchar (255) NOT NULL ,
        login      Varchar (255) NOT NULL ,
        password   Varchar (255) NOT NULL ,
        email      Varchar (255) NOT NULL ,
        date_ajout Datetime NOT NULL ,
        id_groupe  Int  ,
        id_service Int
	,CONSTRAINT users_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: categories_production
#------------------------------------------------------------

CREATE TABLE categories_production(
        id_categorie Int  Auto_increment  NOT NULL ,
        nom          Varchar (255) NOT NULL
	,CONSTRAINT categories_production_PK PRIMARY KEY (id_categorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: unites_production
#------------------------------------------------------------

CREATE TABLE unites_production(
        id_unite     Int  Auto_increment  NOT NULL ,
        nom          Varchar (255) NOT NULL ,
        type         Varchar (255) NOT NULL ,
        date_ajout   Datetime NOT NULL ,
        etat         Int ,
        id_categorie Int 
	,CONSTRAINT unites_production_PK PRIMARY KEY (id_unite)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: produits
#------------------------------------------------------------

CREATE TABLE produits(
        id_produit  Int  Auto_increment  NOT NULL ,
        ref_produit Varchar (255) NOT NULL ,
        nom         Varchar (255) NOT NULL
	,CONSTRAINT produits_PK PRIMARY KEY (id_produit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pdcas
#------------------------------------------------------------

CREATE TABLE pdcas(
        id_pdca             Int  Auto_increment  NOT NULL ,
        date_envoi          Datetime NOT NULL ,
        date_pdca           Datetime ,
        titre               Varchar (255) NOT NULL ,
        ref_produit         Varchar (255) NOT NULL ,
        statut              Int NOT NULL ,
        liste_unites        Varchar (255) ,
        liste_destinataires Varchar (255) ,
        id_user             Int  ,
        id_description      Int  ,
        id_produit          Int 
	,CONSTRAINT pdcas_PK PRIMARY KEY (id_pdca)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: descriptions_pdcas
#------------------------------------------------------------

CREATE TABLE descriptions_pdcas(
        id_description      Int  Auto_increment  NOT NULL ,
        qui                 Varchar (255) ,
        quoi                Varchar (255) ,
        quand               Varchar (255) ,
        ou                  Varchar (255) ,
        comment_attr        Varchar (255) ,
        pourquoi            Varchar (255) ,
        nb_defauts          Int ,
        protege_client      Text ,
        cause_origine       Text ,
        reproductible       Varchar (255) ,
        action_cause_racine Text ,
        amelioration        Varchar (255) ,
        date_redemarrage    Datetime ,
        duree_arret         Varchar (255) ,
        pilote              Varchar (255) ,
        visa_superviseur    Varchar (255) ,
        visa_resp_prod      Varchar (255) ,
        visa_directeur      Varchar (255) ,
        id_pdca             Int 
	,CONSTRAINT descriptions_pdcas_PK PRIMARY KEY (id_description)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fichiers
#------------------------------------------------------------

CREATE TABLE fichiers(
        id_fichier     Int  Auto_increment  NOT NULL ,
        nom            Varchar (255) ,
        id_pdca        Int ,
        id_commentaire Int
	,CONSTRAINT fichiers_PK PRIMARY KEY (id_fichier)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: documents_8d
#------------------------------------------------------------

CREATE TABLE documents_8d(
        id_document Int NOT NULL ,
        statut      Varchar (255) ,
        id_pdca     Int 
	,CONSTRAINT documents_8d_PK PRIMARY KEY (id_document)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commentaires
#------------------------------------------------------------

CREATE TABLE commentaires(
        id_commentaire Int  Auto_increment  NOT NULL ,
        message        Text NOT NULL ,
        date_ajout     Datetime ,
        id_pdca        Int  ,
        id_user        Int 
	,CONSTRAINT commentaires_PK PRIMARY KEY (id_commentaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: concerner
#------------------------------------------------------------

CREATE TABLE concerner(
        id_unite Int  ,
        id_pdca  Int 
	,CONSTRAINT concerner_PK PRIMARY KEY (id_unite,id_pdca)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: destiner
#------------------------------------------------------------

CREATE TABLE destiner(
        id_pdca Int  ,
        id_user Int 
	,CONSTRAINT destiner_PK PRIMARY KEY (id_pdca,id_user)
)ENGINE=InnoDB;




ALTER TABLE users
	ADD CONSTRAINT users_groupes_users0_FK
	FOREIGN KEY (id_groupe)
	REFERENCES groupes_users(id_groupe)
	ON DELETE SET NULL;

ALTER TABLE users
	ADD CONSTRAINT users_services1_FK
	FOREIGN KEY (id_service)
	REFERENCES services(id_service)
	ON DELETE SET NULL;



ALTER TABLE unites_production
	ADD CONSTRAINT unites_production_categories_production0_FK
	FOREIGN KEY (id_categorie)
	REFERENCES categories_production(id_categorie)
	ON DELETE SET NULL;



ALTER TABLE pdcas
	ADD CONSTRAINT pdcas_users0_FK
	FOREIGN KEY (id_user)
	REFERENCES users(id_user)
	ON DELETE SET NULL;

ALTER TABLE pdcas
	ADD CONSTRAINT pdcas_descriptions_pdcas1_FK
	FOREIGN KEY (id_description)
	REFERENCES descriptions_pdcas(id_description)
	ON DELETE SET NULL;

ALTER TABLE pdcas
	ADD CONSTRAINT pdcas_produits2_FK
	FOREIGN KEY (id_produit)
	REFERENCES produits(id_produit)
	ON DELETE SET NULL;

ALTER TABLE pdcas 
	ADD CONSTRAINT pdcas_descriptions_pdcas0_AK 
	UNIQUE (id_description);




ALTER TABLE descriptions_pdcas
	ADD CONSTRAINT descriptions_pdcas_pdcas0_FK
	FOREIGN KEY (id_pdca)
	REFERENCES pdcas(id_pdca)
	ON DELETE CASCADE;

ALTER TABLE descriptions_pdcas 
	ADD CONSTRAINT descriptions_pdcas_pdcas0_AK 
	UNIQUE (id_pdca);




ALTER TABLE fichiers
	ADD CONSTRAINT fichiers_pdcas0_FK
	FOREIGN KEY (id_pdca)
	REFERENCES pdcas(id_pdca)
	ON DELETE CASCADE;

ALTER TABLE fichiers
	ADD CONSTRAINT fichiers_commentaires1_FK
	FOREIGN KEY (id_commentaire)
	REFERENCES commentaires(id_commentaire)
	ON DELETE CASCADE;




ALTER TABLE documents_8d
	ADD CONSTRAINT documents_8d_pdcas0_FK
	FOREIGN KEY (id_pdca)
	REFERENCES pdcas(id_pdca)
	ON DELETE CASCADE;

ALTER TABLE documents_8d 
	ADD CONSTRAINT documents_8d_pdcas0_AK 
	UNIQUE (id_pdca);
	
	
	

ALTER TABLE commentaires
	ADD CONSTRAINT commentaires_pdcas0_FK
	FOREIGN KEY (id_pdca)
	REFERENCES pdcas(id_pdca)
	ON DELETE CASCADE;

ALTER TABLE commentaires
	ADD CONSTRAINT commentaires_users1_FK
	FOREIGN KEY (id_user)
	REFERENCES users(id_user)
	ON DELETE CASCADE;



ALTER TABLE concerner
	ADD CONSTRAINT concerner_unites_production0_FK
	FOREIGN KEY (id_unite)
	REFERENCES unites_production(id_unite)
	ON DELETE CASCADE;

ALTER TABLE concerner
	ADD CONSTRAINT concerner_pdcas1_FK
	FOREIGN KEY (id_pdca)
	REFERENCES pdcas(id_pdca)
	ON DELETE CASCADE;



ALTER TABLE destiner
	ADD CONSTRAINT destiner_pdcas0_FK
	FOREIGN KEY (id_pdca)
	REFERENCES pdcas(id_pdca)
	ON DELETE CASCADE;

ALTER TABLE destiner
	ADD CONSTRAINT destiner_users1_FK
	FOREIGN KEY (id_user)
	REFERENCES users(id_user)
	ON DELETE CASCADE;