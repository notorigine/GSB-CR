/* Testé sous MySQL 5.x */

drop table if exists realiser;
drop table if exists inviter;
drop table if exists constituer;
drop table if exists composant;
drop table if exists formuler;
drop table if exists interagir;
drop table if exists offrir;
drop table if exists posseder;
drop table if exists travailler;
drop table if exists prescrire;

drop table if exists dosage;
drop table if exists activite_compl;
drop table if exists ligne_fraisforfait;
drop table if exists fraisforfait;
drop table if exists fraishorsforfait;
drop table if exists fichefrais;
drop table if exists medicament;
drop table if exists presentation;
drop table if exists rapport_visite;
drop table if exists praticien;
drop table if exists specialite;
drop table if exists type_individu;
drop table if exists type_praticien;
drop table if exists visiteur;
drop table if exists region;
drop table if exists secteur;
drop table if exists famille;
drop table if exists labo;
drop table if exists etat;

/*==============================================================*/
/* Table : activite_compl                                     */
/*==============================================================*/
create table activite_compl 
(
   id_activite_compl  INTEGER            not null,
   date_activite      DATE,
   lieu_activite      VARCHAR(200),
   theme_activite     VARCHAR(100),
   motif_activite     VARCHAR(100),
   constraint PK_ACTIVITE_COMPL primary key (id_activite_compl)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : composant                                          */
/*==============================================================*/
create table composant 
(
   id_composant       INTEGER           not null,
   code_composant     CHAR(4),
   lib_composant      VARCHAR(100),
   constraint PK_COMPOSANT primary key (id_composant)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : constituer                                         */
/*==============================================================*/
create table constituer 
(
   id_composant       INTEGER            not null,
   id_medicament      INTEGER            not null,
   qte_composant      DECIMAL(11,2),
   constraint PK_CONSTITUER primary key (id_composant, id_medicament)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : dosage                                             */
/*==============================================================*/
create table dosage 
(
   id_dosage          INTEGER            not null,
   code_dosage        CHAR(10),
   qte_dosage         INTEGER,
   unite_dosage       CHAR(10),
   constraint PK_DOSAGE primary key (id_dosage)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : etat                                               */
/*==============================================================*/
create table etat 
(
   id_etat            INTEGER            not null,
   lib_etat           VARCHAR(120),
   constraint PK_ETAT primary key (id_etat)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : famille                                            */
/*==============================================================*/
create table famille 
(
   id_famille         INTEGER            not null,
   code_famille       CHAR(3),
   lib_famille        VARCHAR(100),
   constraint PK_FAMILLE primary key (id_famille)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : fichefrais                                         */
/*==============================================================*/
create table fichefrais 
(
   id_fiche_frais     INTEGER            not null,
   id_etat            INTEGER            not null,
   anneemois          CHAR(6)              not null,
   id_visiteur        INTEGER            not null,
   nb_justificatifs   INTEGER,
   date_modification  DATE,
   montant_valide     decimal(10,2),
   constraint PK_FICHEFRAIS primary key (id_fiche_frais)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : formuler                                           */
/*==============================================================*/
create table formuler 
(
   id_medicament      INTEGER            not null,
   id_presentation    INTEGER            not null,
   constraint PK_FORMULER primary key (id_medicament, id_presentation)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : fraisforfait                                       */
/*==============================================================*/
create table fraisforfait 
(
   id_fraisforfait    INTEGER            not null,
   lib_fraisforfait   VARCHAR(100),
   montant_frais_forfait decimal(5,2),
   constraint PK_FRAISFORFAIT primary key (id_fraisforfait)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : fraishorsforfait                                   */
/*==============================================================*/
create table fraishorsforfait 
(
   id_fraishorsforfait INTEGER            not null,
   id_fiche_frais     INTEGER            not null,
   date_fraishorsforfait DATE,
   montant_fraishorsforfait decimal(10,2),
   lib_fraishorsforfait VARCHAR(200),
   constraint PK_FRAISHORSFORFAIT primary key (id_fraishorsforfait)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : interagir                                          */
/*==============================================================*/
create table interagir 
(
   id_medicament      INTEGER            not null,
   med_id_medicament  INTEGER            not null,
   constraint PK_INTERAGIR primary key (id_medicament, med_id_medicament)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : inviter                                            */
/*==============================================================*/
create table inviter 
(
   id_activite_compl  INTEGER            not null,
   id_praticien       INTEGER            not null,
   specialiste        CHAR(1)              not null,
   constraint PK_INVITER primary key (id_activite_compl, id_praticien)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : labo                                               */
/*==============================================================*/
create table labo 
(
   id_labo            INTEGER            not null,
   code_labo          CHAR(2),
   nom_labo           VARCHAR(100),
   chef_vente         VARCHAR(100),
   constraint PK_LABO primary key (id_labo)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : ligne_fraisforfait                                 */
/*==============================================================*/
create table ligne_fraisforfait 
(
   id_fiche_frais     INTEGER            not null,
   id_fraisforfait    INTEGER            not null,
   quantite_ligne     INTEGER,
   constraint PK_LIGNE_FRAISFORFAIT primary key (id_fiche_frais, id_fraisforfait)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : medicament                                         */
/*==============================================================*/
create table medicament 
(
   id_medicament      INTEGER            not null,
   id_famille         INTEGER,
   depot_legal        VARCHAR(100),
   nom_commercial     VARCHAR(100),
   composition        CHAR(255),
   effets             VARCHAR(512),
   contre_indication  CHAR(255),
   prix_echantillon   DECIMAL(11,2),
   constraint PK_MEDICAMENT primary key (id_medicament)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : offrir                                             */
/*==============================================================*/
create table offrir 
(
   id_medicament      INTEGER            not null,
   id_rapport         INTEGER            not null,
   id_visiteur        INTEGER            not null,
   qte_offerte        INTEGER,
   constraint PK_OFFRIR primary key (id_medicament, id_rapport, id_visiteur)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : posseder                                           */
/*==============================================================*/
create table posseder 
(
   id_praticien       INTEGER            not null,
   id_specialite      INTEGER            not null,
   diplome            VARCHAR(100),
   coef_prescription  DECIMAL(11,2),
   constraint PK_POSSEDER primary key (id_praticien, id_specialite)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : praticien                                          */
/*==============================================================*/
create table praticien 
(
   id_praticien       INTEGER            not null,
   id_type_praticien  INTEGER,
   nom_praticien      VARCHAR(100),
   prenom_praticien   VARCHAR(100),
   adresse_praticien  VARCHAR(200),
   cp_praticien       CHAR(5),
   ville_praticien    VARCHAR(100),
   coef_notoriete     DECIMAL(11,2),
   constraint PK_PRATICIEN primary key (id_praticien)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : prescrire                                          */
/*==============================================================*/
create table prescrire 
(
   id_dosage          INTEGER            not null,
   id_medicament      INTEGER            not null,
   id_type_individu   INTEGER            not null,
   posologie          VARCHAR(100),
   constraint PK_PRESCRIRE primary key (id_dosage, id_medicament, id_type_individu)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : presentation                                       */
/*==============================================================*/
create table presentation 
(
   id_presentation    INTEGER            not null,
   code_presentation  CHAR(2),
   lib_presentation   VARCHAR(100),
   constraint PK_PRESENTATION primary key (id_presentation)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : rapport_visite                                     */
/*==============================================================*/
create table rapport_visite 
(
   id_rapport         INTEGER            not null auto_increment,
   id_praticien       INTEGER,
   id_visiteur        INTEGER            not null,
   date_rapport       DATE,
   bilan              VARCHAR(512),
   motif              VARCHAR(255),
   constraint PK_RAPPORT_VISITE primary key (id_rapport)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : realiser                                           */
/*==============================================================*/
create table realiser 
(
   id_activite_compl  INTEGER            not null,
   id_visiteur        INTEGER            not null,
   montant_ac         DECIMAL(11,2),
   constraint PK_REALISER primary key (id_activite_compl, id_visiteur)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : region                                             */
/*==============================================================*/
create table region 
(
   id_region          INTEGER            not null,
   id_secteur         INTEGER,
   code_region        CHAR(2),
   nom_region         VARCHAR(100),
   constraint PK_REGION primary key (id_region)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : secteur                                            */
/*==============================================================*/
create table secteur 
(
   id_secteur         INTEGER            not null,
   code_secteur       CHAR(2),
   lib_secteur        VARCHAR(100),
   constraint PK_SECTEUR primary key (id_secteur)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : specialite                                         */
/*==============================================================*/
create table specialite 
(
   id_specialite      INTEGER            not null,
   code_specialite    CHAR(5),
   lib_specialite     VARCHAR(100),
   constraint PK_SPECIALITE primary key (id_specialite)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : travailler                                         */
/*==============================================================*/
create table travailler 
(
   id_visiteur        INTEGER            not null,
   jjmmaa             DATE                 not null,
   id_region          INTEGER            not null,
   role_visiteur      VARCHAR(100),
   constraint PK_TRAVAILLER primary key (id_visiteur, jjmmaa, id_region)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : type_individu                                      */
/*==============================================================*/
create table type_individu 
(
   id_type_individu   INTEGER            not null,
   code_type_individu CHAR(5),
   lib_type_individu  VARCHAR(100),
   constraint PK_TYPE_INDIVIDU primary key (id_type_individu)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : type_praticien                                     */
/*==============================================================*/
create table type_praticien 
(
   id_type_praticien  INTEGER            not null,
   code_type_praticien CHAR(3),
   lib_type_praticien VARCHAR(100),
   lieu_type_praticien VARCHAR(200),
   constraint PK_TYPE_PRATICIEN primary key (id_type_praticien)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/*==============================================================*/
/* Table : visiteur                                           */
/*==============================================================*/
create table visiteur 
(
   id_visiteur        INTEGER            not null,
   id_labo            INTEGER,
   id_secteur         INTEGER,
   nom_visiteur       VARCHAR(100),
   prenom_visiteur    VARCHAR(100),
   adresse_visiteur   VARCHAR(200),
   cp_visiteur        CHAR(5),
   ville_visiteur     VARCHAR(100),
   date_embauche      DATE,
   login_visiteur     VARCHAR(50),
   pwd_visiteur       VARCHAR(50),
   constraint PK_VISITEUR primary key (id_visiteur)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;


alter table constituer
   add constraint FK_CONSTITUER_COMPOSANT foreign key (id_composant)
      references composant (id_composant);

alter table constituer
   add constraint FK_CONSTITUER_MEDICAMENT foreign key (id_medicament)
      references medicament (id_medicament);

alter table fichefrais
   add constraint FK_FICHEFRAIS_ETAT foreign key (id_etat)
      references etat (id_etat);

alter table fichefrais
   add constraint FK_FICHEFRAIS_VISITEUR foreign key (id_visiteur)
      references visiteur (id_visiteur);

alter table formuler
   add constraint FK_FORMULER_PRESENTATION foreign key (id_presentation)
      references presentation (id_presentation);

alter table formuler
   add constraint FK_FORMULER_MEDICAMENT foreign key (id_medicament)
      references medicament (id_medicament);

alter table fraishorsforfait
   add constraint FK_FRAISHORSFORFAIT_FICHEFRAIS foreign key (id_fiche_frais)
      references fichefrais (id_fiche_frais);

alter table interagir
   add constraint FK_INTERAGIR_MEDICAMENT foreign key (id_medicament)
      references medicament (id_medicament);

alter table interagir
   add constraint FK_INTERAGIR_MEDICAMENT_DEST foreign key (med_id_medicament)
      references medicament (id_medicament);

alter table inviter
   add constraint FK_INVITER_ACTIVITE_COMPL foreign key (id_activite_compl)
      references activite_compl (id_activite_compl);

alter table inviter
   add constraint FK_INVITER_PRATICIEN foreign key (id_praticien)
      references praticien (id_praticien);

alter table ligne_fraisforfait
   add constraint FK_LIGNE_FF_FICHEFRAIS foreign key (id_fiche_frais)
      references fichefrais (id_fiche_frais);

alter table ligne_fraisforfait
   add constraint FK_LIGNE_FF_FRAISFORFAIT foreign key (id_fraisforfait)
      references fraisforfait (id_fraisforfait);

alter table medicament
   add constraint FK_MEDICAMENT_FAMILLE foreign key (id_famille)
      references famille (id_famille);

alter table offrir
   add constraint FK_OFFRIR_RAPPORT_VISITE foreign key (id_rapport)
      references rapport_visite (id_rapport);

alter table offrir
   add constraint FK_OFFRIR_VISITEUR foreign key (id_visiteur)
      references visiteur (id_visiteur);

alter table offrir
   add constraint FK_OFFRIR_MEDICAMENT foreign key (id_medicament)
      references medicament (id_medicament);

alter table posseder
   add constraint FK_POSSEDER_PRATICIEN foreign key (id_praticien)
      references praticien (id_praticien);

alter table posseder
   add constraint FK_POSSEDER_SPECIALITE foreign key (id_specialite)
      references specialite (id_specialite);

alter table praticien
   add constraint FK_PRATICIEN_TYPE_PRATICIEN foreign key (id_type_praticien)
      references type_praticien (id_type_praticien);

alter table prescrire
   add constraint FK_PRESCRIRE_MEDICAMENT foreign key (id_medicament)
      references medicament (id_medicament);

alter table prescrire
   add constraint FK_PRESCRIRE_TYPE_INDIVIDU foreign key (id_type_individu)
      references type_individu (id_type_individu);

alter table prescrire
   add constraint FK_PRESCRIRE_DOSAGE foreign key (id_dosage)
      references dosage (id_dosage);

alter table rapport_visite
   add constraint FK_RAPPORT_VISITE_PRATICIEN foreign key (id_praticien)
      references praticien (id_praticien);

alter table rapport_visite
   add constraint FK_RAPPORT_VISITE_VISITEUR foreign key (id_visiteur)
      references visiteur (id_visiteur);

alter table realiser
   add constraint FK_REALISER_ACTIVITE_COMPL foreign key (id_activite_compl)
      references activite_compl (id_activite_compl);

alter table realiser
   add constraint FK_REALISER_VISITEUR foreign key (id_visiteur)
      references visiteur (id_visiteur);

alter table region
   add constraint FK_REGION_SECTEUR foreign key (id_secteur)
      references secteur (id_secteur);

alter table travailler
   add constraint FK_TRAVAILLER_REGION foreign key (id_region)
      references region (id_region);

alter table travailler
   add constraint FK_TRAVAILLER_VISITEUR foreign key (id_visiteur)
      references visiteur (id_visiteur);

alter table visiteur
   add constraint FK_VISITEUR_SECTEUR foreign key (id_secteur)
      references secteur (id_secteur);

alter table visiteur
   add constraint FK_VISITEUR_LABO foreign key (id_labo)
      references labo (id_labo);
