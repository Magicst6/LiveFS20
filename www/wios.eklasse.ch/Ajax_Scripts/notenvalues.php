<?php
 
/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
include( "/DataTablesEditor/DataTables.php" );
 
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
Editor::inst( $db, 'sv_LernenderKurs' )
    ->fields(
        Field::inst( 'Vorname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Vorname benötigt' ) 
            ) ),
        Field::inst( 'Nachname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Nachname benötigt' )  
            ) ),
        Field::inst( 'SchuelerID' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'SchuelerID benötigt' )   ) ),
        Field::inst( 'Name1' ),
        Field::inst( 'Name2' ),
        Field::inst( 'Name3' ),
	 Field::inst( 'Name4' ),
        Field::inst( 'Name5' ),
        Field::inst( 'Name6' ),
	 Field::inst( 'Name7' ),
        Field::inst( 'Name8' ),
        Field::inst( 'Name9' ),
	
	
	    Field::inst( 'Gewichtung1' ),
        Field::inst( 'Gewichtung2' ),
        Field::inst( 'Gewichtung3' ),
	    
	     Field::inst( 'Gewichtung4' ),
        Field::inst( 'Gewichtung5' ),
        Field::inst( 'Gewichtung6' ),
	 
	     Field::inst( 'Gewichtung7' ),
        Field::inst( 'Gewichtung8' ),
        Field::inst( 'Gewichtung9' ),
	
	 Field::inst( 'Note1' ),
        Field::inst( 'Note2' ),
        Field::inst( 'Note3' ),
	
	 Field::inst( 'Note4' ),
        Field::inst( 'Note5' ),
        Field::inst( 'Note6' ),
	  
	Field::inst( 'Note7' ),
        Field::inst( 'Note8' ),
        Field::inst( 'Note9' ),
	
	
	 Field::inst( 'Datum1' )
	   ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
        Field::inst( 'Datum2' )
	   ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
        Field::inst( 'Datum3' )
	   ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	
	Field::inst( 'Datum4' )
	   ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
        Field::inst( 'Datum5' )
	   ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
        Field::inst( 'Datum6' )
	   ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	
	Field::inst( 'Datum7' )
	   ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
        Field::inst( 'Datum8' )
	   ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
        Field::inst( 'Datum9' )
	   ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) )
	
	
       
    )
    ->process( $_POST )
    ->json();
 