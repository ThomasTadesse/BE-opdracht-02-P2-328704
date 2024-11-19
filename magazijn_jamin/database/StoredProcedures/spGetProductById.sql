
	-- Step : 01.1
	/******************************************************************************
	-- Doel : Maak een nieuwe stored procedure aan heet spSelectProductById.
	-- ****************************************************************************
	-- Versie     Datum          Auteur			Omschrijving
	-- ******     **********     *******		**************
	-- 01         11-11-2024     Thomas			Nieuw 
	*******************************************************************************/ 
    USE `magazijn-jamin`;
    DROP PROCEDURE IF EXISTS spSelectProductById;
    
    DELIMITER //
    
	CREATE PROCEDURE spSelectProductById(
    IN Id INT UNSIGNED
)
BEGIN

    SELECT  PROD.Id,
            PROD.Naam,
            PROD.Barcode,
            PROD.IsActief,
            PROD.Opmerking,
            PROD.DatumAangemaakt,
            PROD.DatumGewijzigd
    FROM    Product AS PROD
    WHERE   PROD.Id = Id;

END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spSelectProductById(2);

********************************************************/