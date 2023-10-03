-- schéma relationnel
-- User(mail(1), prenom(NN), nom(NN), naissance(NN), sexe, poids, taille, mdp(NN))
-- Activite(idActi(1), user = @User(mail), dateActi(NN), description)
-- Data(heureDeb(NN UQ), heureFin(NN UQ), freq, lat, lon, alt, idActi = @Activite(idActi))


-- script de création de la base de données

DROP TABLE ACTIVITE;
DROP TABLE USER;
DROP TABLE DATA;

CREATE TABLE User
(
    mail VARCHAR(100)
        CONSTRAINT mail_pk PRIMARY KEY,
    firstName VARCHAR(50)
        CONSTRAINT fisrtName_nn NOT NULL,
    name VARCHAR(50)
        CONSTRAINT name_nn NOT NULL,
    born VARCHAR(255)
        CONSTRAINT born_nn NOT NULL,
    sexe VARCHAR(4) CHECK (sexe IN ('H', 'F', 'NONE')),
    weight FLOAT
        CONSTRAINT weight_ck CHECK (weight > 0),
    size FLOAT
        CONSTRAINT size_ck CHECK (size > 0),
    password VARCHAR(255)
        CONSTRAINT password_nn NOT NULL
);

CREATE TABLE Activite
(
    idActi INT
        CONSTRAINT idActi_pk PRIMARY KEY,
    mailForeign VARCHAR(100),
    dateActi VARCHAR(255),
    description VARCHAR(255),
        FOREIGN KEY (mailForeign) REFERENCES User(mail)
);

CREATE TABLE Data
(
    idData INT
        CONSTRAINT idData_pk PRIMARY KEY,
    heureDeb TIME
        CONSTRAINT heureDeb_nn NOT NULL,
    heureFin TIME
        CONSTRAINT heureFin_nn NOT NULL,
    freq INT,
    lat FLOAT,
    lon FLOAT,
    alt FLOAT,
    idActiForeign INT,
        FOREIGN KEY (idActiForeign) REFERENCES Activite(idActi),
        CONSTRAINT heureDeb_heureFin_ch CHECK (heureDeb < heureFin)
);