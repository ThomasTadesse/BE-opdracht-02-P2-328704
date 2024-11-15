
	 -- Step : 01.1
	/******************************************************************************
	-- Doel : Maak een nieuwe stored procedure aan heet spUpdateSollicitatie.
	-- ****************************************************************************
	-- Versie     Datum          Auteur			Omschrijving
	-- ******     **********     *******		**************
	-- 01         01-12-2022     JamilM			Nieuw 
	*******************************************************************************/ 
	USE Sollicitatie;
    DROP PROCEDURE IF EXISTS spUpdateSollicitatie;
    
    DELIMITER //
        
	CREATE PROCEDURE spUpdateSollicitatie
	(
		 id						INT	UNSIGNED
		,voornaam				VARCHAR(50)
		,achternaam				VARCHAR(50)
		,sollicitantnummer		INT	UNSIGNED
		,bedrijfnaam			VARCHAR(50)
		,bedrijfcode			VARCHAR(10)
		,straat					VARCHAR(50) 
		,huisnummer				INT	UNSIGNED
		,toevoeging				VARCHAR(10) 
		,postcode				VARCHAR(10)
		,plaats					VARCHAR(50) 
		,gespreksdatum			DATE
		,gesprekstijd			TIME
		,isActief				BIT 
		,opmerking				VARCHAR(250) 
	)
    
    BEGIN
    	DECLARE EXIT HANDLER FOR SQLEXCEPTION
    	BEGIN
        	ROLLBACK;
        	SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
    	END;
        
		START TRANSACTION;	
			-- Stap_01
			-- Update Sollicitant tabel
			UPDATE 	 Sollicitant AS SOLL

			SET		 SOLL.Voornaam 			= voornaam
					,SOLL.Achternaam		= achternaam
					,SOLL.Sollicitantnummer	= sollicitantnummer
					,SOLL.DatumGewijzigd	= SYSDATE(6)		

			WHERE	SOLL.Id = id;

			-- Stap_02
			-- Update Bedrijf tabel
			UPDATE		 Bedrijf AS BEDR

			INNER JOIN	Sollicitatiegesprek AS SOGE
					ON	SOGE.BedrijfId = BEDR.Id

			INNER JOIN	Sollicitant AS SOLL
					ON	SOLL.Id = SOGE.SollicitantId
                    
            SET			 BEDR.Bedrijfnaam		= bedrijfnaam
						,BEDR.Bedrijfcode		= bedrijfcode
						,BEDR.Straat			= straat
						,BEDR.Huisnummer		= huisnummer
						,BEDR.Toevoeging		= toevoeging
						,BEDR.Postcode			= postcode
						,BEDR.Plaats			= plaats
						,BEDR.DatumGewijzigd	= SYSDATE(6)

			WHERE		SOLL.Id = id;

			-- Stap_03
			-- Update Sollicitatiegesprek tabel
			UPDATE		Sollicitatiegesprek AS SOGE
            
            INNER JOIN	Sollicitant AS SOLL
					ON	SOLL.Id = SOGE.SollicitantId

			SET			 SOGE.Gespreksdatum		= gespreksdatum
						,SOGE.Gesprekstijd		= gesprekstijd
						,SOGE.IsActief			= isActief
						,SOGE.Opmerking			= opmerking
						,SOGE.DatumGewijzigd	= SYSDATE(6)	

			WHERE		SOLL.Id = id;
                
            COMMIT;	
	END //
        
 /*****************************************Debug SP*****************************************

	CALL spUpdateSollicitatie(  1
                                ,'Mazin'
                                ,'Jamil'
                                ,123456788
                                ,'MboUtrecht'
                                ,'MUT'
                                ,'Street01'
                                ,90
                                ,'NULL'
                                ,'3333 AS'
                                ,'Maarssen'
                                ,'2022-11-30'
                                ,'22:22:00'
                                ,1
                                ,'NULL'
							 )		
   ********************************************************************************************/