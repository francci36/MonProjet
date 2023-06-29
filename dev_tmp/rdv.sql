CREATE TABLE utilisateurs (
    utilisateur_id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    telephone VARCHAR(50) NOT NULL,
    type_compte VARCHAR(50) NOT NULL
);

CREATE TABLE rendez_vous (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATETIME NOT NULL,
    heure_debut TIME NOT NULL,
    heure_fin TIME NOT NULL,
    utilisateur_id INT NOT NULL,
    FOREIGN KEY (utilisateurs_id) REFERENCES utilisateur(utilisateurs_id)
);

INSERT INTO utilisateur (nom, prenom, email, telephone, type_compte)
VALUES ('Jean', 'Dupont', 'jean.dupont@example.com', '555-1234', 'client');

INSERT INTO rendez_vous (date, heure_debut, heure_fin, utilisateur_id)
VALUES ('2023-06-26', '14:30:00', '15:00:00', 1);
