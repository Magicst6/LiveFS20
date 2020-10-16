<?

$Schueler=$_POST['SchID'];
$Kursname=$_POST['KID'];
$semester=$_POST['sem'];


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
Editor::inst( $db, $semester.'_AbwesenheitenKompakt' )
    ->fields(
	
       
        Field::inst( 'Kursname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Kursname benötigt' )  
            ) ),
        Field::inst( 'SchuelerID' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'SchuelerID benötigt' )   ) ),
         Field::inst( 'Datum' )
	  ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
	
	
	   
       	
	 Field::inst( 'Kommentar' ),
	
	 Field::inst( 'KommentVerw' ),
       

	 Field::inst( 'Abwesenheitsdauer' ),
	
	 Field::inst( 'Klasse' ),
	
	 Field::inst( 'Lehrer' )
	
	
	
	 
     
     
     
	
	
	
   
       
    )
	  
	->where( 'SchuelerID', $Schueler)
    ->where( 'Kursname', $Kursname)
	->process( $_POST )
    ->json();
 