-- Suppression des tables si elles existent (pour tests)
DROP TABLE IF EXISTS evaluation;
DROP TABLE IF EXISTS notification;
DROP TABLE IF EXISTS retard;
DROP TABLE IF EXISTS reservation;
DROP TABLE IF EXISTS emprunt;
DROP TABLE IF EXISTS demande_emprunt;
DROP TABLE IF EXISTS livre;
DROP TABLE IF EXISTS categorie;
DROP TABLE IF EXISTS etudiant;
DROP TABLE IF EXISTS admin;

-- Table categories
CREATE TABLE categorie (
  id_categorie INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table livres
CREATE TABLE livre (
  id_livre INT AUTO_INCREMENT PRIMARY KEY,
  isbn VARCHAR(20) UNIQUE,
  titre VARCHAR(255) NOT NULL,
  auteur VARCHAR(255),
  annee_publication YEAR,
  description TEXT,
  image_couverture VARCHAR(500),
  nombre_exemplaires INT NOT NULL DEFAULT 1,
  nombre_disponibles INT NOT NULL DEFAULT 1,
  id_categorie INT,
  FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table etudiants
CREATE TABLE etudiant (
  id_etudiant INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  prenom VARCHAR(100),
  email VARCHAR(255) NOT NULL UNIQUE,
  mot_de_passe VARCHAR(255) NOT NULL,
  numero_etudiant VARCHAR(50) NOT NULL UNIQUE,
  telephone VARCHAR(20),
  statut ENUM('actif','bloque') DEFAULT 'actif',
  date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
  nombre_retards INT DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table admins
CREATE TABLE admin (
  id_admin INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100),
  prenom VARCHAR(100),
  email VARCHAR(255) UNIQUE,
  mot_de_passe VARCHAR(255),
  date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table demande d'emprunt (workflow: en_attente -> validee/refusee)
CREATE TABLE demande_emprunt (
  id_demande INT AUTO_INCREMENT PRIMARY KEY,
  id_etudiant INT NOT NULL,
  id_livre INT NOT NULL,
  date_demande DATETIME DEFAULT CURRENT_TIMESTAMP,
  statut ENUM('en_attente','refusee','validee') DEFAULT 'en_attente',
  FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant),
  FOREIGN KEY (id_livre) REFERENCES livre(id_livre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table emprunt (après validation)
CREATE TABLE emprunt (
  id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
  id_demande INT,
  id_etudiant INT NOT NULL,
  id_livre INT NOT NULL,
  date_emprunt DATETIME NOT NULL,
  date_retour_prevue DATE NOT NULL,
  date_retour_effective DATETIME,
  statut ENUM('en_cours', 'retourne', 'perdu') DEFAULT 'en_cours',
  prolonge BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (id_demande) REFERENCES demande_emprunt(id_demande),
  FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant) ON DELETE CASCADE,
  FOREIGN KEY (id_livre) REFERENCES livre(id_livre) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table reservation
CREATE TABLE reservation (
  id_reservation INT AUTO_INCREMENT PRIMARY KEY,
  id_etudiant INT NOT NULL,
  id_livre INT NOT NULL,
  date_reservation DATETIME DEFAULT CURRENT_TIMESTAMP,
  statut ENUM('en_attente','annulee','honoree') DEFAULT 'en_attente',
  date_notification DATETIME,
  FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant),
  FOREIGN KEY (id_livre) REFERENCES livre(id_livre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table retard
CREATE TABLE retard (
    id_retard INT AUTO_INCREMENT PRIMARY KEY,
    id_emprunt INT NOT NULL,
    nb_jours_retard INT NOT NULL,
    date_notification DATETIME DEFAULT CURRENT_TIMESTAMP,
    montant_amende DECIMAL(10,2) DEFAULT 0,
    FOREIGN KEY (id_emprunt) REFERENCES emprunt(id_emprunt) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table notifications
CREATE TABLE notification (
  id_notification INT AUTO_INCREMENT PRIMARY KEY,
  id_etudiant INT NOT NULL,
  id_admin INT,
  type ENUM('rappel_retour', 'alerte_retard', 'livre_disponible', 'compte_bloque', 'information') NOT NULL,
  message TEXT NOT NULL,
  date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP,
  lu BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant) ON DELETE CASCADE,
  FOREIGN KEY (id_admin) REFERENCES admin(id_admin)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table evaluation des livres par les étudiants
CREATE TABLE evaluation (
    id_evaluation INT AUTO_INCREMENT PRIMARY KEY,
    id_etudiant INT NOT NULL,
    id_livre INT NOT NULL,
    note TINYINT NOT NULL CHECK(note BETWEEN 1 AND 5),
    commentaire TEXT,
    date_evaluation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_etudiant) REFERENCES etudiant(id_etudiant) ON DELETE CASCADE,
    FOREIGN KEY (id_livre) REFERENCES livre(id_livre) ON DELETE CASCADE,
    UNIQUE KEY (id_etudiant, id_livre) -- un étudiant note un livre une seule fois
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Index pour améliorer les performances
CREATE INDEX idx_livre_categorie ON livre(id_categorie);
CREATE INDEX idx_emprunt_etudiant ON emprunt(id_etudiant);
CREATE INDEX idx_emprunt_livre ON emprunt(id_livre);
CREATE INDEX idx_emprunt_statut ON emprunt(statut);
CREATE INDEX idx_demande_statut ON demande_emprunt(statut);
CREATE INDEX idx_evaluation_livre ON evaluation(id_livre);
CREATE INDEX idx_evaluation_etudiant ON evaluation(id_etudiant);