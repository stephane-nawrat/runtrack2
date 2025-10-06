USE runtrack2_jour09;

-- Job10 : superficie totale des étages
SELECT SUM(superficie) AS superficie_totale 
FROM etage;
