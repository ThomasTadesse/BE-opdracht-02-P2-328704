
	 -- Step : 01.1
	/******************************************************************************
	-- Doel : Maak een nieuwe stored procedure aan heet spCreateSollicitatie.
	-- ****************************************************************************
	-- Versie     Datum          Auteur			Omschrijving
	-- ******     **********     *******		**************
	-- 01         01-12-2022     JamilM			Nieuw 
	*******************************************************************************/ 
	USE Sollicitatie;
    DROP PROCEDURE IF EXISTS spCreateSollicitatie;
    
    DELIMITER //
        
	CREATE PROCEDURE spCreateSollicitatie
	(
		 voornaam				VARCHAR(50)
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
    
		-- Stap_01
        -- Definieer een local variable
        DECLARE sollicitantId 	INT UNSIGNED DEFAULT 0;
		DECLARE bedrijfId 		INT UNSIGNED DEFAULT 0;
        
    	DECLARE EXIT HANDLER FOR SQLEXCEPTION
    	BEGIN
        	ROLLBACK;
        	SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
    	END;
                
		START TRANSACTION;					
			-- Stap_02
			-- Voeg nieuwe rij toe aan Sollicitant tabel.
			INSERT INTO Sollicitant
			(
				 Voornaam			
				,Achternaam		
				,Sollicitantnummer	
				,IsActief			
				,Opmerking    	
				,DatumAangemaakt  
				,DatumGewijzigd	
			)
			VALUES
			(
				 voornaam
				,achternaam
				,sollicitantnummer	
				,1
				,'NULL'
				,SYSDATE(6)	
				,SYSDATE(6)	
			);
			
			-- Haal de nieuwe Sollicitant Id op.
            SET sollicitantId = LAST_INSERT_ID();

			-- Stap_03
			-- Voeg nieuwe rij toe aan Bedrijf tabel.
			INSERT INTO Bedrijf
			(
				 Bedrijfnaam	
				,Bedrijfcode	
				,Straat			
				,Huisnummer		
				,Toevoeging		
				,Postcode		
				,Plaats			
				,IsActief		
				,Opmerking   	
				,DatumAangemaakt
				,DatumGewijzigd		
			)
			VALUES
			(
				 bedrijfnaam
				,bedrijfcode
				,straat
				,huisnummer
				,toevoeging
				,postcode
				,plaats
				,1
				,'NULL'
				,SYSDATE(6)	
				,SYSDATE(6)	
			);
				
			-- Haal de nieuwe Bedrijf Id op.
			SET bedrijfId = LAST_INSERT_ID();

			-- Stap_04
			-- Voeg nieuwe rij toe aan Sollicitatiegesprek tabel.
			INSERT INTO Sollicitatiegesprek
			(
				 BedrijfId 		
				,SollicitantId
				,Gespreksdatum	
				,Gesprekstijd		
				,IsActief			
				,Opmerking    	
				,DatumAangemaakt  
				,DatumGewijzigd
			)
			VALUES
			(
				 bedrijfId
				,sollicitantId
				,gespreksdatum	
				,gesprekstijd
				,isActief	
				,opmerking	
				,SYSDATE(6)		
				,SYSDATE(6)	
			);
                
            COMMIT;	
	END //
        
 /*****************************************Debug SP*****************************************

	CALL spCreateSollicitatie(  'Hans'
                                ,'Odijk'
                                ,123456700
                                ,'MJsoft'
                                ,'MJsoft'
                                ,'Nigerdreef'
                                ,12
                                ,'1A'
                                ,'3333 AS'
                                ,'Maarssen'
                                ,'2022-11-30'
                                ,'22:22:00'
                                ,1
                                ,'NULL'
							 )		
   ********************************************************************************************/