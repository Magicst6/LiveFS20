<?
include 'db.php';
$ID=$_POST['KID'];


		

$Schueler=$_POST['SchID'];

 $isEntry2 = "Select KursID From sv_Kurse where ID='$ID' ";
    $result2 = mysqli_query($con, $isEntry2);

    while ($value3 = mysqli_fetch_array($result2)) {
          $KursID=$value3['KursID'];
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
Editor::inst( $db, 'sv_Noten' )
    ->fields(
	
       
        Field::inst( 'sv_Noten.KursID' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'KursID benötigt' )  
            ) ),
        Field::inst( 'sv_Noten.SchuelerID' )
	 ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'SchülerID benötigt' )   ) ),
        Field::inst( 'sv_Noten.Name' ),
      
	
	
	    Field::inst( 'sv_Noten.Gewichtung' ),
       
	
	 Field::inst( 'sv_Noten.Note' ),
     
	
	
	 Field::inst( 'sv_Noten.Datum' )
	  ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) )
   
	
	
    

	  
	
	

       
    )
	  
	->where( 'sv_Noten.SchuelerID', $Schueler)
    ->where( 'sv_Noten.KursID', $KursID)
	->process( $_POST )
    ->json();
 