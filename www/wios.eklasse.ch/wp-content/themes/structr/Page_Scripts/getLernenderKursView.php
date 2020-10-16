<?php
 $KursID=$_POST['KursID'];


 

/*
 * Example PHP implementation used for the index.html example
 */
 include( "DataTablesEditor/DataTables.php" );
 
// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate,
    DataTables\Editor\ValidateOptions;




	

	// DataTables PHP library

	Editor::inst( $db, 'sv_LernenderKurs' )
    ->fields(
	Field::inst( 'SchuelerID' ),
        Field::inst( 'Vorname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Vorname muss angegeben werden' ) 
            ) ),
        Field::inst( 'Nachname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Nachname muss angegeben werden' )  
            ) ),
	   
        Field::inst( 'Klasse' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Klasse muss angegeben werden' )  
            ) ),
		 Field::inst( 'KursID' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Kurs muss angegeben werden' )  
            ) ),
		 Field::inst( 'Notenschnitt' )
           
             
        
       
    )
		->where( 'KursID',$KursID )
    ->process( $_POST )
    ->json();
	

	
	

