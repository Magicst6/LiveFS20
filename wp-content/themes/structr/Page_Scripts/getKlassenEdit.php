<?php
 $Klasse=$_POST['klasse'];
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

if ($Klasse==""){
	// DataTables PHP library

 
// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'sv_Lernende' )
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
	   
        Field::inst( 'Klasse' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Klasse muss angegeben werden' )  
            ) ),
        Field::inst( 'User_ID' ),
        Field::inst( 'EMail' )
            ->validator( Validate::email( ValidateOptions::inst()
                ->message( 'Please enter an e-mail address' )   
            ) ),
        Field::inst( 'Loginname' ),
 Field::inst( 'Profil' )
       
    )
    ->process( $_POST )
    ->json();


}
else{
	Editor::inst( $db, 'sv_Lernende' )
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
	   
        Field::inst( 'Klasse' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Klasse muss angegeben werden' )  
            ) ),
        Field::inst( 'User_ID' ),
        Field::inst( 'EMail' )
            ->validator( Validate::email( ValidateOptions::inst()
                ->message( 'Please enter an e-mail address' )   
            ) ),
        Field::inst( 'Loginname' ),
 Field::inst( 'Profil' )
       
    )
		->where( 'Klasse',$Klasse )
    ->process( $_POST )
    ->json();

}