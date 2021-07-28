CREATE DATABASE cinema;
USE cinema;

/* CREATION DE LA TABLE FILM */
CREATE TABLE film
(
	id INT PRIMARY KEY NOT NULL auto_increment,
	titre VARCHAR(50),
    annee DATE,
    image VARCHAR(50)
);

/* AJOUT DE FILM */
INSERT INTO film (titre, annee, image)
VALUES 
("L'Etrange Noël de Mr JACK", "1993-12-24", "/images/noel.jpg"),
("Cobra", "1986-06-10", "/images/cobra.jpg"),
("Interstellar", "2014-11-07", "images/interstellar.jpg");

/* EDITER LE FILM */
UPDATE film SET titre = "Interstelar" WHERE id = 3;

/* SELECTIONS */
SELECT * FROM film;
SELECT * FROM film WHERE YEAR(annee)= 1993;
SELECT * FROM film WHERE YEAR(annee)>= 1993;
SELECT * FROM film ORDER BY annee DESC;

/* SUPPRIMER UN FILM */
DELETE FROM film WHERE id = 2;