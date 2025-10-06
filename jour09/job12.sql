USE runtrack2_jour09;

-- Job12 : toutes les salles triées par capacité décroissante
SELECT * 
FROM salles 
ORDER BY capacite DESC;
