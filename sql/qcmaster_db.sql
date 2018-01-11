/*==============================================================*/
/*         QCMaster : SQL Script for Database Creation          */
/*                     (SGBD :  MySQL 5.0)                      */
/*==============================================================*/


/*==============================================================*/
/* TABLES CLEANING                                              */
/*==============================================================*/
DROP TABLE IF EXISTS qcmaster_Answer;
DROP TABLE IF EXISTS qcmaster_Question;
DROP TABLE IF EXISTS qcmaster_QCM;
DROP TABLE IF EXISTS qcmaster_Teacher;
DROP TABLE IF EXISTS qcmaster_Student; 


/*==============================================================*/
/* TABLE CREATION : qcmaster_Student                                */
/*==============================================================*/
CREATE TABLE qcmaster_Student
(
    id          INT NOT NULL AUTO_INCREMENT,
    email       VARCHAR(150) NOT NULL,
    firstname   VARCHAR(75) NOT NULL,
    lastname    VARCHAR(100) NOT NULL,
    password    VARCHAR(150) NOT NULL,
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : qcmaster_Teacher                                */
/*==============================================================*/
CREATE TABLE qcmaster_Teacher
(
    id          INT NOT NULL AUTO_INCREMENT,
    email       VARCHAR(150) NOT NULL,
    firstname   VARCHAR(75) NOT NULL,
    lastname    VARCHAR(100) NOT NULL,
    password    VARCHAR(150) NOT NULL,
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : qcmaster_QCM                                */
/*==============================================================*/
CREATE TABLE qcmaster_QCM
(
    id          INT NOT NULL AUTO_INCREMENT,
    id_teacher  INT NOT NULL,
    title       VARCHAR(100) NOT NULL,
    topic       VARCHAR(100) NOT NULL,
    link        VARCHAR(100),
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : qcmaster_Question                           */
/*==============================================================*/
CREATE TABLE qcmaster_Question
(
    id          INT NOT NULL AUTO_INCREMENT,
    id_QCM      INT NOT NULL,
    title       VARCHAR(100) NOT NULL,
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : qcmaster_Answer                             */
/*==============================================================*/
CREATE TABLE qcmaster_Answer
(
    id          INT NOT NULL,/*AUTO_INCREMENT*/
    id_question INT NOT NULL,
    proposition VARCHAR(100) NOT NULL,
    correct     BOOLEAN,
    
    PRIMARY KEY (id,id_question)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* ADDING CONSTRAINTS (FOREIGN KEYS)                            */
/*==============================================================*/
alter TABLE qcmaster_QCM ADD CONSTRAINT FK_QCMTeacher foreign KEY (id_teacher)
      references qcmaster_Teacher (id) on delete restrict on update restrict;
	  
alter TABLE qcmaster_Question ADD CONSTRAINT FK_QuestionQCM foreign KEY (id_QCM)
      references qcmaster_QCM (id) on delete restrict on update restrict;
	  
alter TABLE qcmaster_Answer ADD CONSTRAINT FK_AnswerQuestion foreign KEY (id_question)
      references qcmaster_Question (id) on delete restrict on update restrict;
	  

/*==============================================================*/
/* INSERTING DEFAULT/TEST VALUES                                */
/*==============================================================*/

/* Let's create two Students here */
INSERT INTO qcmaster_Student (email, firstname, lastname, password) VALUES
('jojo.lacompote@miam.io','Jojo','LaCompote','LaCompote'),
('dyviax@shlag.com','Dyvia','Fleury','$hlag');

/* Let's create two Teachers here */
INSERT INTO qcmaster_Teacher (email, firstname, lastname, password) VALUES
('bruno.tellez@univ-lyon1.fr','Bruno','Tellez','BTe'), /*This Teacher will automatically get the ID 1*/
('hubert.delabath@oss117.fr','Hubert','Bonisseur de La Bath','OSS 117'); /*This Teacher will automatically get the ID 2*/

/* Let's create two QCM then, one for each Teacher */
INSERT INTO qcmaster_QCM (id_teacher, title, topic, link) VALUES
(1,'QCM sur le TouchDevelop','Informatique',NULL), /*This QCM will automatically get the ID 1*/
(2,'Les Meilleures Répliques d\'OSS 117','Films', NULL); /*This QCM will automatically get the ID 2*/

/* Let's make two Questions for each QCM */
INSERT INTO qcmaster_Question (id_QCM, title) VALUES
(1,'Qu\'est-ce que TouchDevelop ?'),
(1,'Par qui a été développé TouchDevelop ?'),
(2,'Comment est votre blanquette ? Les plats a base de viande, sont-ils de bonne qualité ?'),
(2,'Que recherche notre bon vieux Hubert à l\'ambassade Allemande ?');

/* Let's make 4 Answers for each Question */
INSERT INTO qcmaster_Answer (id, id_question, proposition, correct) VALUES
(1,1,'Un environnement de programmation',TRUE),
(2,1,'Un écran tactile',FALSE),
(3,1,'Un téléphone pour développeur',FALSE),
(4,1,'Le meilleur language de programmation au monde !',FALSE),

(1,2,'Microsoft',TRUE),
(2,2,'Oracle',FALSE),
(3,2,'Microsoft Research',TRUE),
(4,2,'Apple',FALSE),

(1,3,'Habile',FALSE),
(2,3,'On m\'a dit le plus grand bien de vos harengs pomme à l\'huile',FALSE),
(3,3,'La blanquette est bonne',TRUE),
(4,3,'Le patron vous en mettra un ramequin, vous vous ferez une idée.',FALSE),

(1,4,'Un costume',FALSE),
(2,4,'Heimrich le hippie',FALSE),
(3,4,'Sa secrétaire juive',FALSE),
(4,4,'L\'amicale des anciens nazis',TRUE);