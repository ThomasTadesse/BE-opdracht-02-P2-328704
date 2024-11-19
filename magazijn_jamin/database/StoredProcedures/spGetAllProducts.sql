
	-- Step : 01.1
	/******************************************************************************
	-- Doel : Maak een nieuwe stored procedure aan heet spGetAllProducts.
	-- ****************************************************************************
	-- Versie     Datum          Auteur			Omschrijving
	-- ******     **********     *******		**************
	-- 01         11-11-2024     Thomas			Nieuw 
	*******************************************************************************/ 
    USE `magazijn-jamin`;
    DROP PROCEDURE IF EXISTS spGetAllProducts;
    
    DELIMITER //
    
	CREATE PROCEDURE spGetAllProducts()
BEGIN
    SELECT  PROD.Id         AS ProductId,
            PROD.Naam,
            PROD.Barcode,
            PROD.IsActief,
            PROD.Opmerking,
            PROD.DatumAangemaakt,
            PROD.DatumGewijzigd
    FROM    Product AS PROD
    ORDER BY PROD.Id DESC;
END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spGetAllProducts();

********************************************************/
