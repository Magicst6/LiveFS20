<?php
 $sem=$_POST['sem'];

$K='sv_Kurse';
$L='sv_Lehrpersonen';

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
Editor::inst( $db, 'sv_Kurse_View' )
    ->readTable('sv_Kurse_View') 
	->fields(
	
        Field::inst( 'sv_Kurse_View.ID' ),
        Field::inst( 'sv_Kurse_View.Klasse' ),
        Field::inst( 'sv_Kurse_View.Kursname' ),
        Field::inst( 'sv_Kurse_View.KursID' ),
	
       
           
	 Field::inst( 'sv_Kurse_View.Startdatum' )
	  ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	 Field::inst( 'sv_Kurse_View.Enddatum' )
	  ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	
       
    
      
	
	  Field::inst( 'sv_Kurse_View.Stundenplan' ),
	  Field::inst( 'sv_Kurse_View.Profil' ),
	  Field::inst( 'sv_Lehrpersonen.Nachname' )
	  
	)
	
	->leftJoin( 'sv_Lehrpersonen', 'sv_Lehrpersonen.ID', '=', 'sv_Kurse_View.Lehrperson' )
    ->process( $_POST )
    ->json();