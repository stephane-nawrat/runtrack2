USE runtrack2_jour09;

-- Job16 : étage et salle avec la plus grande capacité
SELECT 
    s.nom AS "Biggest Room",
    s.capacite,
    e.nom AS etage
FROM salles s
JOIN etage e ON s.id_etage = e.id
ORDER BY s.capacite DESC
LIMIT 1;
