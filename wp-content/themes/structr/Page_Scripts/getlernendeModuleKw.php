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
 
// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'sv_LernendeModule' )
    ->fields(
	Field::inst( 'ID' ),
        Field::inst( 'Vorname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Vorname muss angegeben werden' ) 
            ) ),
        Field::inst( 'Name' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Nachname muss angegeben werden' )  
            ) ),
        Field::inst( 'User_ID' ),
        Field::inst( 'EMail' )
            ->validator( Validate::email( ValidateOptions::inst()
                ->message( 'Please enter an e-mail address' )   
            ) ),
	  Field::inst( 'Loginname' ),
      Field::inst( 'Modul1' ),
	  Field::inst( 'Modul2' ),  
	  Field::inst( 'Modul3' ),
	  Field::inst( 'Modul4' ),
	  Field::inst( 'Modul5' ),
	  Field::inst( 'Modul6' ), 
	  Field::inst( 'Modul7' ),
	  Field::inst( 'Modul8' ),
	  Field::inst( 'Modul9' ),
 Field::inst( 'Profil' )
       
    )
    ->process( $_POST )
    ->json();


