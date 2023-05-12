CREATE TABLE utilisateur (
    utilisateur_id INT PRIMARY KEY AUTO_INCREMENT,
    utilisateur_name VARCHAR(50) NOT NULL;
    utilisateur_lastName VARCHAR(50) NOT NULL,
    utilisateur_email VARCHAR(50) NOT NULL,
    utilisateur_telephone VARCHAR(50) NOT NULL,
    type_compte VARCHAR(50) NOT NULL
);

CREATE TABLE rendez_vous (
    rendez_vous_id INT PRIMARY KEY AUTO_INCREMENT,
    date_heure_rendez_vous DATETIME NOT NULL,
    etat_rendez_vous VARCHAR(50) NOT NULL,
    utilisateur_id INT NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(utilisateur_id)
);

INSERT INTO utilisateur (utilisateur_name, utilisateur_lastName, utilisateur_email, utilisateur_telephone, type_compte)
VALUES ('Jean', 'Dupont', 'jean.dupont@example.com', '555-1234', 'client');

INSERT INTO rendez_vous (date_heure_rendez_vous, etat_rendez_vous, utilisateur_id)
VALUES ('2023-06-26 14:30:00', 'en cours', 1);
