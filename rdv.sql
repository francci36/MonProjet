CREATE TABLE utilisateur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    type_compte VARCHAR(20) NOT NULL,
    inscription_date DATE
);
CREATE TABLE rendez-vous (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    etat VARCHAR(50) NOT NULL,
    utilisateur_id INT NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id)
);
INSERT INTO utilisateur (nom, prenom, email, telephone, password, type_compte, inscription_date)
VALUES ('Jean', 'Dupont', 'jean.dupont@example.com', '555-1234', 'monmotdepasse', 'client', '06-05-2022');

INSERT INTO rendez-vous (date, heure, etat, utilisateur_id)
VALUES ('06-05-2023', '14:30:00', 'en cours', 1);
