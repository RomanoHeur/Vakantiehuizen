DROP DATABASE IF EXISTS vakantiehuizen;
CREATE DATABASE vakantiehuizen;
USE vakantiehuizen;

-- Tabellen maken
CREATE TABLE teksten (
id INT AUTO_INCREMENT,
pagina VARCHAR(255),
titel VARCHAR(255),
tekst VARCHAR(255),
PRIMARY KEY (id) 
);

CREATE TABLE huizen (
id INT AUTO_INCREMENT,
huis VARCHAR(255),
personen INT,
prijs FLOAT,
omschrijving TEXT,
PRIMARY KEY(id)
);

CREATE TABLE afbeeldingen(
    id INT AUTO_INCREMENT,
    huis_id INT,
    afbeelding VARCHAR(255),
    PRIMARY KEY(id),
    FOREIGN KEY (huis_id) REFERENCES huizen(id)
);

CREATE TABLE contact (
id INT AUTO_INCREMENT,
voornaam VARCHAR(255),
achternaam VARCHAR(255),
email VARCHAR(255),
telefoon INT(50),
beschrijving VARCHAR(255),
datum_verzonden DATETIME NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE users (
gebruikersnaam varchar(255),
wachtwoord varchar(255),
PRIMARY KEY(gebruikersnaam)
);

-- inserts
-- pagina

-- Voeg de huizen toe
INSERT INTO huizen (id, huis, personen, prijs, omschrijving) VALUES (1, "Zandkreek", 8, 95.00, "Mooie zonnige plek, perfecte camping voor families om even uit te rusten");
INSERT INTO huizen (id, huis, personen, prijs, omschrijving) VALUES (2, "Oosterschelde", 12, 120.00, "Hele mooie plek aan het water, dus het is perfect om even af te koelen");
INSERT INTO huizen (id, huis, personen, prijs, omschrijving) VALUES (3, "Grevelingen", 10, 110.50, "Mooie en ruime plek, ook een mooi natuurgebied met een meer om te zwemmen" );
INSERT INTO huizen (id, huis, personen, prijs, omschrijving) VALUES (4, "Westerschelde", 16, 135.95, "Super perfecte plek voor veel mensen, mooi in de buurt van een strand");

-- Afbeeldingen
INSERT INTO afbeeldingen (huis_id, afbeelding) VALUES
(1, 'Zandkreek1.png'),
(2, 'Oosterschelde1.jpg'),
(3, 'Grevelingen1.jpg'),
(4, 'Westerschelde1.jpg');

-- De inlogpagina van admin

insert into users (gebruikersnaam, wachtwoord) values ("Admin", "$2y$10$FC063KMRj2XbdFQOHgn8ducZvLHxxGUMN23q2G7o2UOBt90ZFOyEq");
select * from users;