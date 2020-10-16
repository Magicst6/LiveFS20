<?
include 'db.php';
$ID=$_POST['KID'];

$semester=$_POST['sem'];
		

$Schueler=$_POST['SchID'];

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
Editor::inst( $db, $semester.'_Noten' )
    ->fields(
	
       
        Field::inst( 'KursID' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'KursID benötigt' )  
            ) ),
        Field::inst( 'SchuelerID' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'SchuelerID benötigt' )   ) ),
        Field::inst( 'Name' ),
      
	
	
	    Field::inst( 'Gewichtung' ),
       
	
	 Field::inst( 'Note' ),
     
	
	
	 Field::inst( 'Datum' )
	  ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) )
   
	
	
    

	  
	
	

       
    )
	  
	->where( 'SchuelerID', $Schueler)
    ->where( 'KursID', $ID)
	->process( $_POST )
    ->json();
 