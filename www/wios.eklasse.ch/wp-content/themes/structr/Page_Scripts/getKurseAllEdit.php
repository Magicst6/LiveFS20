<?php
 
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
Editor::inst( $db, 'sv_KurseAll' )
    ->fields(
	
        Field::inst( 'ID' )
          ,
        Field::inst( 'Kursname' )
           ,
        Field::inst( 'KursID' ),
        Field::inst( 'Tag' ),
            
        Field::inst( 'Klasse' ),
	
	  Field::inst( 'Lehrperson' ),
	  Field::inst( 'LP_ID' ),
	  Field::inst( 'Zimmer' ),
	  Field::inst( 'Lektionen' ),
	 Field::inst( 'Farbe' ),
	
	
	 Field::inst( 'Datum' )
	  ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	
     Field::inst( 'Start' ),
	
	
	 Field::inst( 'Ende' )
	  
	
	
    )
    ->process( $_POST )
    ->json();