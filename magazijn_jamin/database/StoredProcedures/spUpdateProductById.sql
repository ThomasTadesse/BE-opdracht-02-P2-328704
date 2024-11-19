
	 -- Step : 01.1
	/******************************************************************************
	-- Doel : Maak een nieuwe stored procedure aan heet spUpdateProductById.
	-- ****************************************************************************
	-- Versie     Datum          Auteur			Omschrijving
	-- ******     **********     *******		**************
	-- 01         11-11-2024     Thomas			Nieuw 
	*******************************************************************************/ 
	USE `magazijn-jamin`;
    DROP PROCEDURE IF EXISTS spUpdateProductById;
    
    DELIMITER //
        
CREATE PROCEDURE spUpdateProductById(
    IN Id           INT UNSIGNED,
    IN Naam         VARCHAR(255),
    IN Barcode VARCHAR(255),
    IN IsActief     BIT(1),
    IN Opmerking    VARCHAR(255),
    IN DatumAangemaakt DATETIME(6),
    IN DatumGewijzigd DATETIME(6)
)
BEGIN
    UPDATE  Product AS  PROD
    SET     PROD.Naam = Naam,
            PROD.Barcode = Barcode,
            PROD.IsActief = IsActief,
            PROD.Opmerking = Opmerking,
            PROD.DatumAangemaakt = DatumAangemaakt,
            PROD.DatumGewijzigd = DatumGewijzigd
    WHERE   PROD.Id = Id;
END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spUpdateProductById(1, 'Venco', 'Bert van Linge', 'L1029384719', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25');

********************************************************/