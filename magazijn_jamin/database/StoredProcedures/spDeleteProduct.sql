
	 -- Step : 01.1
	/******************************************************************************
	-- Doel : Maak een nieuwe stored procedure aan heet spDeleteProduct.
	-- ****************************************************************************
	-- Versie     Datum          Auteur			Omschrijving
	-- ******     **********     *******		**************
	-- 01         11-11-2024     Thomas			Nieuw 
	*******************************************************************************/ 
	USE  `magazijn-jamin`;
    DROP PROCEDURE IF EXISTS spDeleteProduct;
    
    DELIMITER //
        
	CREATE PROCEDURE spDeleteProductById(
    IN Id INT UNSIGNED
)
BEGIN
    DELETE  
    FROM    Product AS PROD
    WHERE   PROD.Id = Id;
END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spDeleteProductById(2);

********************************************************/