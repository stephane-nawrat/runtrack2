USE runtrack2_jour09;

-- Job06 : sélectionner les étudiants dont le prénom commence par "T"
SELECT * 
FROM etudiants 
WHERE prenom LIKE 'T%';
