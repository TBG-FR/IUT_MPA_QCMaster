DROP TABLE IF EXISTS qcmaster_Test;

CREATE TABLE qcmaster_Test
(
    id      INT NOT NULL AUTO_INCREMENT,
    FName   VARCHAR(100),
    LName   VARCHAR(100),
    Age     INT,
    Gender  VARCHAR(100),
    
    PRIMARY KEY (id)
)
ENGINE=InnoDB
CHARACTER SET utf8
COLLATE utf8_bin
AUTO_INCREMENT=0;