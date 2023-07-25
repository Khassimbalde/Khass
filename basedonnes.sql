CREATE DATABASE gestion_patients;
USE gestion_patients;

CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    date_naissance DATE NOT NULL,
    adresse VARCHAR(100) NOT NULL
);

CREATE TABLE rendez_vous (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    date_heure DATETIME NOT NULL,
    motif VARCHAR(255) NOT NULL,
    FOREIGN KEY (patient_id) REFERENCES patients(id)
);
