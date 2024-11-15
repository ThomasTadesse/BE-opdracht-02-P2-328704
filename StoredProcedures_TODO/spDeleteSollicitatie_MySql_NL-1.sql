
	 -- Step : 01.1
	/******************************************************************************
	-- Doel : Maak een nieuwe stored procedure aan heet spDeleteSollicitatie.
	-- ****************************************************************************
	-- Versie     Datum          Auteur			Omschrijving
	-- ******     **********     *******		**************
	-- 01         01-12-2022     JamilM			Nieuw 
	*******************************************************************************/ 
	USE Sollicitatie;
    DROP PROCEDURE IF EXISTS spDeleteSollicitatie;
    
    DELIMITER //
        
	CREATE PROCEDURE spDeleteSollicitatie
	(
		id	INT	UNSIGNED
	)
    BEGIN    
        -- Definieer een local variable
		DECLARE var_bedrijfId INT UNSIGNED DEFAULT 0;
        
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
        END;
        
        -- Stap_01		
		-- Haal de nieuwe Bedrijf Id op.
		SET var_bedrijfId = (SELECT BedrijfId FROM Sollicitatiegesprek WHERE SollicitantId = id);
        
		START TRANSACTION;					
			-- Stap_01
			-- Verwijder de geselecteerde rij van Sollicitatiegesprek tabel.
			DELETE	SOLL
			FROM 	Sollicitatiegesprek AS SOLL
			WHERE	SOLL.SollicitantId = id;
			
			
			-- Stap_02
			-- Verwijder de geselecteerde rij van Bedrijf tabel.
			DELETE  BEDF
			FROM 	Bedrijf AS BEDF
			WHERE	BEDF.Id = var_bedrijfId;
			
			-- Stap_03
			-- Verwijder de geselecteerde rij van Sollicitant tabel.
			DELETE	SLCT
			FROM 	Sollicitant AS SLCT
			WHERE	SLCT.Id = id;
            
        COMMIT;	
	END //
        
 /*****************************************Debug SP*****************************************
	CALL spDeleteSollicitatie(1)		
  ********************************************************************************************/