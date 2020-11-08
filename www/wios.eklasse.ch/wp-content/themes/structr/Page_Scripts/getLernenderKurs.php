<?php
 $Klasse=$_POST['klasse'];
/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
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
 

if ($Klasse==""){
// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'sv_LernenderKurs' )
    ->fields(
	Field::inst( 'ID' ),
        Field::inst( 'Vorname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Vorname muss angegeben werden' ) 
            ) ),
        Field::inst( 'Nachname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Nachname muss angegeben werden' )  
            ) ),
        Field::inst( 'SchuelerID' ),
        Field::inst( 'KursID' ),
     
        Field::inst( 'Klasse' ),
	    Field::inst( 'Profil' ),
	 Field::inst( 'Notenschnitt' )
       
    )
    ->process( $_POST )
    ->json();
	
}
	else{
		// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'sv_LernenderKurs' )
    ->fields(
	Field::inst( 'ID' ),
        Field::inst( 'Vorname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Vorname muss angegeben werden' ) 
            ) ),
        Field::inst( 'Nachname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Nachname muss angegeben werden' )  
            ) ),
        Field::inst( 'SchuelerID' ),
        Field::inst( 'KursID' ),
     
        Field::inst( 'Klasse' ),
	    Field::inst( 'Profil' ),
	 Field::inst( 'Notenschnitt' )
       
    )
	->where( 'Klasse',$Klasse )
    ->process( $_POST )
    ->json();
	
	}