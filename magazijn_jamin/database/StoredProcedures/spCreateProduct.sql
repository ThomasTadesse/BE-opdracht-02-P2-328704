	/******************************************************************************
	-- Doel : Maak een nieuwe stored procedure aan die heet spCreateProduct.
	-- ****************************************************************************
	-- Versie     Datum          Auteur			Omschrijving
	-- ******     **********     *******		**************
	-- 01         11-11-2024     Thomas			Nieuw 
	*******************************************************************************/ 
	USE `magazijn-jamin`;
    DROP PROCEDURE IF EXISTS spCreateProduct;
    
    DELIMITER //
        
CREATE PROCEDURE spCreateProduct(
    IN Naam         VARCHAR(255),
    IN Barcode      VARCHAR(13),
    IN IsActief     BIT(1),
    IN Opmerking    VARCHAR(255),
    IN DatumAangemaakt DATETIME(6),
    IN DatumGewijzigd DATETIME(6)
)
BEGIN

    INSERT INTO Product (
        Naam,
        Barcode,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    ) VALUES (
        Naam,
        Barcode,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    );

END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spCreateProduct('Test', '1234567890123', 1, 'Test', '2024-09-26 12:44:25', '2024-09-26 12:44:25');

********************************************************/