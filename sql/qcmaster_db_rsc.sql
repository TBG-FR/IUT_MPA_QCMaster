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