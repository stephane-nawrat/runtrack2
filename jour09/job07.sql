USE runtrack2_jour09;

-- Job07 : étudiants de plus de 18 ans
SELECT * 
FROM etudiants 
WHERE naissance <= DATE_SUB(CURDATE(), INTERVAL 18 YEAR);
