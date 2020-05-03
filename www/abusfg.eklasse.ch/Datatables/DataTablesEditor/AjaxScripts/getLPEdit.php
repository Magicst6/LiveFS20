<?php


/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
include( "../DataTables.php" );
 
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
Editor::inst( $db, 'Lernprodukte' )
    ->fields(
	Field::inst( 'ID' ),
        Field::inst( 'Vorname' ),
        Field::inst( 'Nachname' ),
        Field::inst( 'URL' ),
        Field::inst( 'TEXT' ),
        Field::inst( 'Kommentar' ),  
        Field::inst( 'EMAIL' ),
	
	  Field::inst( 'User_ID' ),
	  Field::inst( 'Loginname' ),
	Field::inst( 'Beschreibung' ),
	
	
	 Field::inst( 'Datum' )
	   ->validator( Validate::dateFormat( 'Y.m.d H:i' ) )
            ->getFormatter( Format::datetime( 'Y-m-d H:i:s', 'Y.m.d H:i' ) )
    ->setFormatter( Format::datetime( 'Y.m.d H:i', 'Y-m-d H:i:s' ) ),	
	
	Field::inst( 'Datei' )
            ->setFormatter( Format::ifEmpty( null ) )
            ->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/Lernprodukte/uploads/Korrekturen/__ID____NAME__' )
                ->db( 'files', 'id', array(
                    'filename'    => Upload::DB_FILE_NAME,
                    'filesize'    => Upload::DB_FILE_SIZE,
                    'web_path'    => Upload::DB_WEB_PATH,
                    'system_path' => Upload::DB_SYSTEM_PATH
                ) )
                ->validator( Validate::fileSize( 5000000, 'Die Datei muss kleiner als 5MB sein' ) )
                ->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg', 'gif','pdf','doc','docx' ), "Datei hochladen" ) )
            )
    
    )
	
    ->process( $_POST )
    ->json();