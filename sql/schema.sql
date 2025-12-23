CREATE DATABASE Paiement;
USE Paiement;
CREATE TABLE Client(
    id INT  AUTO_INCREMENT PRIMARY KEY ,
    nom VARCHAR(50) NOT NULL ,
    email VARCHAR(50) NOT NULL
);
CREATE TABLE Commendes (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    montant_totale FLOAT NOT NULL,
    statut VARCHAR(25),
    client_id INT NOT NULL,
    FOREIGN KEY (client_id) REFERENCES Client(id)
);
CREATE TABLE Paiments (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    montant FLOAT NOT NULL ,
    statut VARCHAR(25) NOT NULL ,
    date_paiment DATE NOT NULL,
    commande_id INT NOT NULL,
    FOREIGN KEY (commande_id) REFERENCES Commandes(id)
);
CREATE TABLE Virments (
    reference INT NOT NULL,
    fromName VARCHAR(50),
    paiement_id INT ,
    FOREIGN KEY (paiement_id) REFERENCES Paiement(id)
);
CREATE TABLE Paypal (
    numero INT NOT NULL,
    userName VARCHAR(50) NOT NULL,
    paiement_id INT ,
    FOREIGN KEY (paiement_id) REFERENCES Paiement(id)

);
CREATE TABLE CarteBancaire (
    dateExpiration DATE NOT NULL,
    nomBanc VARCHAR(50) NOT NULL,
    codeCvs INT NOT NULL,
    paiement_id INT ,
    FOREIGN KEY (paiement_id) REFERENCES Paiement(id)
);