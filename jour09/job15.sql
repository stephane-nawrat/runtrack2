USE runtrack2_jour09;

-- Job15 : nom des salles et nom de leur étage
SELECT s.nom AS salle, e.nom AS etage
FROM salles s
JOIN etage e ON s.id_etage = e.id;
