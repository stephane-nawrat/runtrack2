USE runtrack2_jour09;

-- Job11 : somme des capacités des salles
SELECT SUM(capacite) AS capacite_totale 
FROM salles;
