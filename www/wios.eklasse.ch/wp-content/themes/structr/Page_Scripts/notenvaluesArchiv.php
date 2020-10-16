<?

$Schueler=$_POST['SchID'];
$Kursname=$_POST['KID'];
$semester=$_POST['sem'];


$UserID=$_POST['UID'];
					
				date_default_timezone_set('CET');	
					$Zeit= date("Y-m-d H:i:s");

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
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	
		Field::inst( 'Zeit' )
	->setValue($Zeit),
	
	
	Field::inst( 'User_ID' )
	->setValue($UserID)
	
   
       
    )
	  
	->where( 'SchuelerID', $Schueler)
    ->where( 'KursID', $Kursname)
	->process( $_POST )
    ->json();
 