-- Insertion des catégories
INSERT INTO categorie (nom) VALUES
('Informatique'),
('Mathématiques'),
('Physique'),
('Littérature'),
('Histoire'),
('Sciences'),
('Économie'),
('Philosophie');

-- Insertion d'un administrateur
INSERT INTO admin (nom, prenom, email, mot_de_passe) VALUES

('Admin', 'Système', 'admin@bibliotheque.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),  -- admin123
('Support', 'Tech', 'support@bibliotheque.com', '$2y$10$7bQ1GUDyZxG7lY2Pn5GxaeAi6hJSwPj9HJuG/Cp4P8vQC/zhygSSe'), -- support123
('Manager', 'Service', 'manager@bibliotheque.com', '$2y$10$P/DhB3TRNFcY9VfQdEI1oO8A0HU6pA5vjxVQhl3vAeSugdq4jSDIG'); -- manager123

-- Insertion d'étudiants de test
INSERT INTO etudiant (numero_etudiant, nom, prenom, email, mot_de_passe, telephone, statut) VALUES
('ET2024001', 'Alami', 'Youssef', 'youssef.alami@ensam.ma', '$2y$10$7hKBvqGNvS58PFhXkdbDxuPoJFbwLuKKDpo3eX2rWdvgNmvEQA3bW', '0612345678', 'actif'), -- pass1y
('ET2024002', 'Benali', 'Fatima', 'fatima.benali@ensam.ma', '$2y$10$gXagzC7iNFQlr20FfkXcNe0SyGFFyuG6ePnM9AcjMyBtKhb8aan96', '0623456789', 'actif'), -- pass2f
('ET2024003', 'Chaoui', 'Mohammed', 'mohammed.chaoui@ensam.ma', '$2y$10$jzVXfMQJwp7Ygo7fK27DRuuk48Rw1/olHPzLj/1iWZd.GawhzN9TC', '0634567890', 'actif'), -- pass3m
('ET2024004', 'Driss', 'Sara', 'sara.driss@ensam.ma', '$2y$10$6Oz3RWvX36LKxwveQpjBJ.6eQ5./oxAQEwz3uPvRmfwVsPSQeIo8C', '0645678901', 'actif'), -- pass4s
('ET2024005', 'El Idrissi', 'Karim', 'karim.elidrissi@ensam.ma', '$2y$10$HgDJNQBLSDKPavav5FODUeO5HNv3qX6n8jjrcJf9vZm3pHqCmV9sK', '0656789012', 'actif'); -- pass5k


-- Insertion de livres de test
INSERT INTO livre (isbn, titre, auteur, annee_publication, id_categorie, nombre_exemplaires, nombre_disponibles, description) VALUES
-- Informatique
('9780132350884', 'Clean Code', 'Robert C. Martin', 2008, 1, 3, 3, 'Guide pratique des bonnes pratiques de programmation pour écrire du code propre et maintenable'),
('9780201633610', 'Design Patterns', 'Gang of Four', 1994, 1, 2, 2, 'Catalogue des patrons de conception logicielle réutilisables'),
('9780132107006', 'UML 2.0', 'Martin Fowler', 2003, 1, 2, 2, 'Guide complet du langage de modélisation unifié'),
('9781449355739', 'Learning Python', 'Mark Lutz', 2013, 1, 4, 4, 'Introduction complète à la programmation Python'),
('9780596517748', 'JavaScript: The Good Parts', 'Douglas Crockford', 2008, 1, 2, 2, 'Les bonnes pratiques de JavaScript'),

-- Mathématiques
('9782100547876', 'Mathématiques L1', 'Jean-Pierre Ramis', 2010, 2, 5, 5, 'Cours complet de mathématiques niveau licence 1'),
('9782804163891', 'Analyse Mathématique', 'Jean-Marie Monier', 2015, 2, 3, 3, 'Cours et exercices corrigés d\'analyse'),
('9782100738724', 'Algèbre Linéaire', 'François Liret', 2016, 2, 4, 4, 'Introduction à l\'algèbre linéaire avec applications'),

-- Physique
('9782804163907', 'Physique Générale', 'Douglas C. Giancoli', 2015, 3, 4, 4, 'Manuel complet de physique universitaire'),
('9782100712991', 'Mécanique Quantique', 'Claude Cohen-Tannoudji', 2018, 3, 2, 2, 'Introduction à la mécanique quantique'),
('9782804176921', 'Thermodynamique', 'José-Philippe Pérez', 2017, 3, 3, 3, 'Cours de thermodynamique avec exercices'),

-- Littérature
('9782070368228', 'L\'Étranger', 'Albert Camus', 1942, 4, 3, 3, 'Roman philosophique sur l\'absurde de la condition humaine'),
('9782253006329', 'Le Petit Prince', 'Antoine de Saint-Exupéry', 1943, 4, 4, 4, 'Conte philosophique et poétique pour tous les âges'),
('9782070360024', '1984', 'George Orwell', 1949, 4, 2, 2, 'Roman dystopique sur le totalitarisme'),
('9782253933427', 'Les Misérables', 'Victor Hugo', 1862, 4, 3, 3, 'Chef-d\'œuvre de la littérature française'),
('9782253004226', 'Le Comte de Monte-Cristo', 'Alexandre Dumas', 1844, 4, 2, 2, 'Roman d\'aventures et de vengeance'),

-- Histoire
('9782070349913', 'Histoire de France', 'Ernest Lavisse', 2000, 5, 3, 3, 'Histoire complète de la France'),
('9782253061960', 'La Chute de l\'Empire Romain', 'Edward Gibbon', 2012, 5, 2, 2, 'Analyse de la fin de l\'Empire romain'),

-- Sciences
('9782100790265', 'Biologie Cellulaire', 'Bruce Alberts', 2019, 6, 4, 4, 'Introduction à la biologie cellulaire et moléculaire'),
('9782804194857', 'Chimie Organique', 'Paula Bruice', 2016, 6, 3, 3, 'Cours de chimie organique avec exercices'),

-- Économie
('9782130819035', 'Principes d\'Économie', 'N. Gregory Mankiw', 2019, 7, 3, 3, 'Introduction aux principes fondamentaux de l\'économie'),
('9782080420015', 'Le Capital au XXIe siècle', 'Thomas Piketty', 2013, 7, 2, 2, 'Analyse des inégalités économiques');