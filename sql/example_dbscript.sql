/*==============================================================*/
/*   PHP_Pictures_Project : SQL Script for Database Creation    */
/*                     (SGBD :  MySQL 5.0)                      */
/*==============================================================*/


/*==============================================================*/
/* TABLES CLEANING                                              */
/*==============================================================*/
DROP TABLE IF EXISTS phpproj_PictureKeyword;
DROP TABLE IF EXISTS phpproj_GalleryPicture;
DROP TABLE IF EXISTS phpproj_Keyword;
DROP TABLE IF EXISTS phpproj_Picture;
DROP TABLE IF EXISTS phpproj_Gallery;
DROP TABLE IF EXISTS phpproj_User;


/*==============================================================*/
/* TABLE CREATION : phpproj_Gallery                             */
/*==============================================================*/
CREATE TABLE phpproj_Gallery
(
    id          INT NOT NULL AUTO_INCREMENT,
    title       VARCHAR(100) NOT NULL,
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin
AUTO_INCREMENT=3;


/*==============================================================*/
/* TABLE CREATION : phpproj_GalleryPicture                      */
/*==============================================================*/
CREATE TABLE phpproj_GalleryPicture
(
    pic_id      INT NOT NULL,
    gal_id      INT NOT NULL,
    
    PRIMARY KEY (pic_id, gal_id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : phpproj_Keyword                             */
/*==============================================================*/
CREATE TABLE phpproj_Keyword
(
    id          INT NOT NULL AUTO_INCREMENT,
    name        VARCHAR(100) NOT NULL,
    active      BOOL NOT NULL,
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : phpproj_Picture                             */
/*==============================================================*/
CREATE TABLE phpproj_Picture
(
    id                      INT NOT NULL AUTO_INCREMENT,
    title                   VARCHAR(255) NOT NULL,
    description             VARCHAR(510),
    date                    VARCHAR(100),
    public                  BOOL NOT NULL,
    path			        VARCHAR(255) NOT NULL,
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : phpproj_PictureKeyword                      */
/*==============================================================*/
CREATE TABLE phpproj_PictureKeyword
(
    pic_id      INT NOT NULL,
    key_id      INT NOT NULL,
    
    PRIMARY KEY (pic_id, key_id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin;


/*==============================================================*/
/* TABLE CREATION : phpproj_User                                */
/*==============================================================*/
CREATE TABLE phpproj_User
(
    id          INT NOT NULL AUTO_INCREMENT,
    username    VARCHAR(30) NOT NULL,
    password    VARCHAR(255) NOT NULL,
    admin       BOOL NOT NULL DEFAULT 0,
    firstname   VARCHAR(50),
    lastname    VARCHAR(75),
    address     VARCHAR(255),
    zip         INT(6),
    city        VARCHAR(100),
    email       VARCHAR(200) NOT NULL,
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin
AUTO_INCREMENT=3;


/*==============================================================*/
/* ADDING CONSTRAINTS (FOREIGN KEYS)                            */
/*==============================================================*/
alter TABLE phpproj_Gallery ADD CONSTRAINT FK_UserGallery foreign KEY (id)
      references phpproj_User (id) on delete restrict on update restrict;
alter TABLE phpproj_GalleryPicture ADD CONSTRAINT FK_GalleryPictureG foreign KEY (gal_id)
      references phpproj_Gallery (id) on delete restrict on update restrict;
alter TABLE phpproj_GalleryPicture ADD CONSTRAINT FK_GalleryPictureP foreign KEY (pic_id)
      references phpproj_Picture (id) on delete restrict on update restrict;
alter TABLE phpproj_PictureKeyword ADD CONSTRAINT FK_PictureKeywordK foreign KEY (key_id)
      references phpproj_Keyword (id) on delete restrict on update restrict;
alter TABLE phpproj_PictureKeyword ADD CONSTRAINT FK_PictureKeywordP foreign KEY (pic_id)
      references phpproj_Picture (id) on delete restrict on update restrict;


/*==============================================================*/
/* ADDING TRIGGER (PRIVATE GALLERY FOR EACH USER)               */
/*==============================================================*/

DROP TRIGGER IF EXISTS USER_OWN_GALLERY;

DELIMITER $

CREATE TRIGGER USER_OWN_GALLERY
AFTER INSERT ON phpproj_User FOR EACH ROW

BEGIN

    DECLARE id_g int;
    DECLARE title_g varchar(150);
	
    SET id_g := NEW.id;
    SET title_g := CONCAT(NEW.username,'\'s Gallery');
    
    INSERT INTO phpproj_Gallery VALUES (id_g,title_g);

END;

$
DELIMITER ;


/*==============================================================*/
/* INSERTING DEFAULT/TEST VALUES                                */
/*==============================================================*/

INSERT INTO phpproj_User (id, username, password, email, admin) VALUES

/*(0,'NA','NA','na@na.com','0'), #This value should not exist, ids start from 3, and user with id=2 is the Admin */
/*(1,'NA','NA','na@na.com','0'), #This value should not exist, ids start from 3, and user with id=2 is the Admin */

/*(2,'Admin','Admin','1'); #This is the same entry, without hashed password */
(2,'Admin','$2y$10$WmJrNnMyaSEhP3ZzK190TOrcnj44qc3XtgS961U6tmc2.WFc.ibtC','admin@phpprojpictures.fr','1'); #This is the same entry, with hashed password

/* ==> THE TRIGGER DOES IT AUTOMATICALLY
INSERT INTO phpproj_Gallery (id, title) VALUES
('2','Admin Gallery');
*/

/* Homepage Pictures (Carousel) */
INSERT INTO phpproj_Picture VALUES
(-1,'Homepage Picture #1', 'A beautiful sky at night, somewhere in a lost field in France','25/01/2005',0,'home_pictures/sky_grass_stars_night.jpg'),
(-2,'Homepage Picture #2', 'Electric and foggy atmosphere in Indonesia','25/01/2005',0,'home_pictures/sky_lake_fog_steam_ominous_darkness_reflection_trees.jpg'),
(-3,'Homepage Picture #3', 'A flaming sunset... one of the best I\'ve ever seen !','25/01/2005',0,'home_pictures/sky_lake_trees_sunset.jpg'),
(-4,'Homepage Picture #4', 'Blue sky and wonderful river in Georgie','25/01/2005',0,'home_pictures/sky_nature_river_landscape.jpg');

/* ===== ===== Tests d'Insertion ===== ===== */

INSERT INTO phpproj_User (username, password, firstname, lastname, address, zip, city, email) VALUES

/*('OSS 117','OSS117'),*/
('OSS 117','$2y$10$WmJrNnMyaSEhP3ZzK190TOScGHQ6QVpxRDR9O8spBsDqqdrlbMduy','Hubert','Bonisseur de La Bath','5, rue du nid d\'espions','1954','Le Caire','cebonvieuxhubert@gmail.com'),

/*('Jojo','LaCompote');*/
('Jojo','$2y$10$WmJrNnMyaSEhP3ZzK190TO6ZngeZdGcIttAQ7Jaf3UZv4MLv9DMWa','Jojo','DuRU','13 Rue Peter Fink','01000','Bourg-en-Bresse','jojo-labonnecompote@univ-lyon1.fr');

/* ==> THE TRIGGER DOES IT AUTOMATICALLY
INSERT INTO phpproj_Gallery (title) VALUES
('OSS117''s Gallery'),
('Jojo''s Gallery');
*/

/* Let's say we have those two pictures */
INSERT INTO phpproj_Picture (id, title, description, date, public, path) VALUES
(1, 'Calm Ocean', 'Beautiful picture the ocean', '18/10/2017', '1', 'calm_ocean.jpg'),
(2, 'Mountain Eagle', 'Flying eagle, shot in the mountains', '27/05/2005', '1', 'majestuous_eagle.jpg'),
(3, 'Pig', 'Hidden Picture', '01/11/2017', '0', 'pig.jpg'),
(4, 'Wolpack', 'A pack of wolves, in Europe', '01/11/2017', '1', 'wolfpack.jpg');

/* Let's say User #4 (Jojo) bought them */
INSERT INTO phpproj_GalleryPicture (pic_id, gal_id) VALUES
(1, 4),
(2, 4);

/* Let's create some Keywords */
INSERT INTO phpproj_Keyword VALUES
(1,'animal',1),
(2,'landscape',1),
(3,'water',1);

/* Let's add them to the pictures */
INSERT INTO phpproj_PictureKeyword VALUES
(1,2),
(1,3),
(2,1),
(2,2),
(3,1),
(4,1);