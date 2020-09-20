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
Editor::inst( $db, 'sv_Kurse' )
    ->fields(
	
        Field::inst( 'sv_Kurse.ID' ),
        Field::inst( 'sv_Kurse.Klasse' ),
        Field::inst( 'sv_Kurse.Kursname' ),
        Field::inst( 'sv_Kurse.KursID' ),
	Field::inst( 'sv_Kurse.Uhrzeit' ),
       
           
	 Field::inst( 'sv_Kurse.Startdatum' )
	  ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	 Field::inst( 'sv_Kurse.Enddatum' )
	  ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	
       
    
      
	
	  Field::inst( 'sv_Kurse.Tag' ),
	  Field::inst( 'sv_Kurse.Profil' ),
	  Field::inst( 'sv_Lehrpersonen.Nachname' )
	  
	)
	
	->leftJoin( 'sv_Lehrpersonen', 'sv_Lehrpersonen.ID', '=', 'sv_Kurse.Lehrperson' )
    ->process( $_POST )
    ->json();