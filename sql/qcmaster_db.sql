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
    link        VARCHAR(100) NOT NULL,
    
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
    nbAnswers   INT,
    
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
    id          INT NOT NULL AUTO_INCREMENT,
    id_question INT NOT NULL,
    proposition VARCHAR(100) NOT NULL,
    correct     BOOLEAN,
    
    PRIMARY KEY (id)
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