USE runtrack2_jour09;

-- Job05 : sélectionner prénom, nom et naissance des étudiantes
SELECT prenom, nom, naissance 
FROM etudiants 
WHERE sexe = 'Femme';
