<?


$Kursname=$_POST['KID'];


	 preg_match("/:(.*)/", $Schueler, $output_array);
    $Schueler=$output_array[1];

if ($_POST['SchIDnr']<>""){
	 $Schueler=$_POST['SchIDnr'];
}
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

if ($Kursname=="Alle"){
 
// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'sv_Pruefungen' )
    ->fields(
	
       Field::inst( 'Pruefungsname' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Pruefungsname benötigt' )   ) ),
        Field::inst( 'KursID' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'KursID benötigt' )  
            ) ),
	 Field::inst( 'Datum' )
	  ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	 Field::inst( 'Start' ),
	  
   
	 Field::inst( 'Ende' ),
	  
        Field::inst( 'Klasse' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Klasse benötigt' )   ) ),
        
       
	 Field::inst( 'Lehrperson' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Klasse benötigt' )   ) ),
	 Field::inst( 'LP_ID' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'LP_ID benötigt' )   ) ),
        Field::inst( 'Zimmer' ),
       
      
	
	
	    Field::inst( 'Gewichtung' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Gewichtung benötigt' )   ) ),
       
	
	 Field::inst( 'Kommentar' )
     
	
	
	
   
       
    )
	  
	
	->process( $_POST )
    ->json();
}
else{
	// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'sv_Pruefungen' )
    ->fields(
	
       Field::inst( 'Pruefungsname' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Pruefungsname benötigt' )   ) ),
        Field::inst( 'KursID' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'KursID benötigt' )  
            ) ),
	 Field::inst( 'Datum' )
	  ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	 Field::inst( 'Start' ),
	  
   
	 Field::inst( 'Ende' ),
	  
        Field::inst( 'Klasse' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Klasse benötigt' )   ) ),
        
       
	 Field::inst( 'Lehrperson' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Klasse benötigt' )   ) ),
	 Field::inst( 'LP_ID' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'LP_ID benötigt' )   ) ),
        Field::inst( 'Zimmer' ),
       
      
	
	
	    Field::inst( 'Gewichtung' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Gewichtung benötigt' )   ) ),
       
	
	 Field::inst( 'Kommentar' )
     
	
	
	
   
       
    )
	  
	->where( 'KursID', $Kursname)
	->process( $_POST )
    ->json();
	
}