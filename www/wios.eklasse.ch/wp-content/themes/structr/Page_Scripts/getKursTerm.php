<?php
 $sem=$_POST['sem'];

$KH='sv_Kurshistorie';

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
Editor::inst( $db, $KH )
    ->fields(
	
        Field::inst( 'ID' ),
        Field::inst( 'Stattgefunden' ),
        Field::inst( 'KursID' ),
        Field::inst( 'Lehrer' ),
           
	 Field::inst( 'Datum' )
	  ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	
       
    
      
	
	  Field::inst( 'Kommentar' ),
	  Field::inst( 'Lektionen' )
	  
	)
	
	
    ->process( $_POST )
    ->json();