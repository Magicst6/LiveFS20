<?php
 $KursID=$_POST['KID'];
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
	Field::inst( 'sv_LernendeModule.ID' ),
        Field::inst( 'sv_LernendeModule.Vorname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Vorname muss angegeben werden' ) 
            ) ),
        Field::inst( 'sv_LernendeModule.Name' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Nachname muss angegeben werden' )  
            ) ),
        Field::inst( 'sv_LernendeModule.User_ID' ),
        Field::inst( 'sv_LernendeModule.EMail' )
            ->validator( Validate::email( ValidateOptions::inst()
                ->message( 'Please enter an e-mail address' )   
            ) ),
	  Field::inst( 'sv_LernendeModule.Loginname' ),
      Field::inst( 'sv_LernendeModule.Modul1' ),
	  Field::inst( 'sv_LernendeModule.Modul2' ),  
	  Field::inst( 'sv_LernendeModule.Modul3' ),
	  Field::inst( 'sv_LernendeModule.Modul4' ),
	  Field::inst( 'sv_LernendeModule.Modul5' ),
	  Field::inst( 'sv_LernendeModule.Modul6' ), 
	  Field::inst( 'sv_LernendeModule.Modul7' ),
	  Field::inst( 'sv_LernendeModule.Modul8' ),
	  Field::inst( 'sv_LernendeModule.Modul9' ),
 Field::inst( 'sv_LernendeModule.Profil' )
       
    )
	 ->leftJoin( 'sv_LernenderKurs', 'sv_LernenderKurs.SchuelerID', '=', 'sv_LernendeModule.ID' )	
	->where( 'sv_LernenderKurs.KursID',$KursID )
    ->process( $_POST )
    ->json();


