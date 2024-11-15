
	-- Step : 01.1
	/******************************************************************************
	-- Doel : Maak een nieuwe stored procedure aan heet spGetSollicitaties.
	-- ****************************************************************************
	-- Versie     Datum          Auteur			Omschrijving
	-- ******     **********     *******		**************
	-- 01         24-11-2022     JamilM			Nieuw 
	*******************************************************************************/ 
    USE Sollicitatie;
    DROP PROCEDURE IF EXISTS spGetSollicitaties;
    
    DELIMITER //
    
	CREATE PROCEDURE spGetSollicitaties()
	BEGIN
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
        END;
         
		START TRANSACTION;	
			SELECT	 	 SOLL.Id									AS Id
						,SOLL.Voornaam								AS Voornaam
						,SOLL.Achternaam							AS Achternaam
						,SOLL.Sollicitantnummer						AS Sollicitantnummer
						,BEDR.Bedrijfnaam							AS Bedrijfnaam
						,BEDR.Bedrijfcode							AS Bedrijfcode
						,BEDR.Straat								AS Straat
						,BEDR.Huisnummer							AS Huisnummer
						,BEDR.Toevoeging							AS Toevoeging
						,BEDR.Postcode								AS Postcode
						,BEDR.Plaats								AS Plaats
						,SOGE.Gespreksdatum							AS Gespreksdatum	
						-- ,CONVERT(TIME(0), [SOGE].[Gesprekstijd])	AS Gesprekstijd
						,SOGE.Gesprekstijd							AS Gesprekstijd
						,SOGE.IsActief								AS IsActief
						,SOGE.Opmerking								AS Opmerking		
	
			FROM	 	Sollicitant AS SOLL
	
			INNER JOIN 	Sollicitatiegesprek AS SOGE
					ON 	SOGE.SollicitantId = SOLL.Id
	
			INNER JOIN 	Bedrijf AS BEDR
					ON 	BEDR.Id = SOGE.BedrijfId;
			
			COMMIT;	
                
	END //
    DELIMITER ;
	
/*****************************************Debug SP*****************************************
    
	CALL spGetSollicitaties()
	
********************************************************************************************/
    
 

   
   
   