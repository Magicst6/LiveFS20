<?php // include $_SERVER['DOCUMENT_ROOT']."/wp-config.php";



/*
Plugin Name:  Lernprodukte
Version: 1.0
Description: Manage pupils Uploads.
Author: Stefan Heim
Author URI: 
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: Lernprodukte
*/

	
	
	
	$isheader=0;
	

	add_shortcode( 'TextUser', 'TextUser' );
add_shortcode( 'meineLP', 'meineLP' );
add_shortcode( 'UploadUser', 'UploadUser' );
add_shortcode( 'TabLehrer', 'TabLehrer' );
add_shortcode( 'TabLehrerPlain', 'TabLehrerPlain' );
add_shortcode( 'UploadLehrer', 'UploadLehrer' );
add_shortcode( 'TabLehrerPlainAll', 'TabLehrerPlainAll' );

function LP_init(){


   

	
 function meineLP() {

		  ob_start();
	 if (!$isheader) include( 'header.php' );
    include( 'LPInhaltUserPlain.php' );
    return ob_get_clean();
		 $isheader=1;
	 
 }
	

 
	function UploadUser() {
	
		 ob_start();
		if (!$isheader) include( 'header.php' );
    include( 'LPInhaltUserDatei.php' );
    return ob_get_clean();
		$isheader=1;
		
	}
	
	function TextUser() {
	
		 ob_start();
		if (!$isheader) include( 'header.php' );
    include( 'LPInhaltUserText.php' );
    return ob_get_clean();
		$isheader=1;
		
	}
	
		function TabLehrer() {
	
		 ob_start();
			if (!$isheader) include( 'header.php' );
			
    include( 'LPInhalt.php' );
    return ob_get_clean();
		$isheader=1;
	}
		function TabLehrerPlain() {
	
		 ob_start();
			if (!$isheader) include( 'header.php' );
			
    include( 'LPInhaltPlain.php' );
    return ob_get_clean();
		$isheader=1;
	}
	
	function TabLehrerPlainAll() {
	
		 ob_start();
			if (!$isheader) include( 'header.php' );
			
    include( 'LPInhaltPlainAll.php' );
    return ob_get_clean();
		$isheader=1;
	}
	 
	function UploadLehrer() {
	
		 ob_start();
			if (!$isheader) include( 'header.php' );
			
    include( 'UploadLehrer.php' );
    return ob_get_clean();
		$isheader=1;
	}
		
	
}
add_action('init', 'LP_init');



class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Lernprodukte DB', 
            'manage_options', 
            'my-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'my_option_name' );
        ?>
        <div class="wrap">
            <h1>Lernprodukte Einstellungen</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );
                do_settings_sections( 'my-setting-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }
	
	/*    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'my_option_name' );
        ?>
        <div class="wrap">
            <h1>Lernprodukte Einstellungen</h1>
            <form method="post" action="options.php">
        
				<?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );
                do_settings_sections( 'my-setting-admin' );
				
       
		submit_button();
            ?>
			  Sie müssen die Datenbank vorher manuell bei Ihrem Hoster erstellt haben. <br> Mit dem Button "Datenbank neu erstellen" erzeugen Sie die leere Tabellenstruktur, die für die das Plugin Lernprodukte nötig ist. Sollten Sie die Datenbank bereits verwendet haben und diese Tabellen sind bereits in ihr vorhanden, dann ignorieren Sie den Button unten.<br>
				
				<br><br>
			
			</form>
			<form method="post">
    <input type="submit" name="test" id="test" value="Datenbank neu erstellen" /><br/>
</form>

<?php

function testfun()
{
	
	$db1 = get_option( 'my_option_name' );

define('DB_HOSTEKLSET', $db1['DB_HOST']);

define('DB_NAME_EKLSET', $db1['DB_NAME']);


define('DB_USER_EKLSET', $db1['DB_USER']);


define('DB_PASSWORD_EKLSET', $db1['DB_PASS']);
	
	$dbname=$db1['DB_NAME'];
	
$con = @mysqli_connect(DB_HOSTEKLSET, DB_USER_EKLSET, DB_PASSWORD_EKLSET);

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
//echo 'Connected to MySQL';
$verbunden=mysqli_select_db($con, DB_NAME_EKLSET);
if($verbunden){
	
if((DB_HOSTEKLSET==$DBHOST) and (DB_NAME_EKLSET==$DBNAME) and (DB_USER_EKLSET==$DBUSER) and  (DB_PASSWORD_EKLSET==$DBPASS))
	{ echo "Sie dürfen die Wordpress-Datenbank nicht als EKlasse Datenbank verwenden!"; }
	else{
$mysql_host = $db1['DB_HOST'];
$mysql_database = $db1['DB_NAME'];
$mysql_user = $db1['DB_USER'];
$mysql_password = $db1['DB_PASS'];
# MySQL with PDO_MYSQL  
$db2 = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);


	
	
$query = file_get_contents("lpdb.sql");
//echo $query;
$stmt = $db2->prepare($query);

if ($stmt->execute())
     echo "Success";
else 
     echo "Fail";
		
/*		sleep(3);
		$query1 =" CREATE TABLE `Lernprodukte_View` (
`ID` int(11)
,`Beschreibung` varchar(256)
,`TEXT` mediumtext
,`Loginname` varchar(256)
,`Datum` datetime
,`Kommentar` mediumtext
,`URL` varchar(255)
,`Datei` varchar(256)
,`Vorname` varchar(255)
,`Nachname` varchar(255)
,`EMAIL` varchar(255)
,`User_ID` int(11)
,`Bewertung` varchar(255)
);";
//echo $query;

if (!mysqli_query($con,$query1)) {
  echo("Error description: " . mysqli_error($con));
  }
$querydrop="DROP TABLE IF EXISTS `Lernprodukte_View`";
if (!mysqli_query($con,$querydrop)) {
  echo("Error description: " . mysqli_error($con));
  }
		$queryView="CREATE ALGORITHM=UNDEFINED DEFINER=`heimmart`@`10.0.24.%` SQL SECURITY DEFINER VIEW `Lernprodukte_View`  AS SELECT `Lernprodukte`.`ID` AS `ID`, `Lernprodukte`.`Beschreibung` AS `Beschreibung`, `Lernprodukte`.`TEXT` AS `TEXT`, `Lernprodukte`.`Loginname` AS `Loginname`, `Lernprodukte`.`Datum` AS `Datum`, `Lernprodukte`.`Kommentar` AS `Kommentar`, `Lernprodukte`.`URL` AS `URL`, `Lernprodukte`.`Datei` AS `Datei`, `Lernprodukte`.`Vorname` AS `Vorname`, `Lernprodukte`.`Nachname` AS `Nachname`, `Lernprodukte`.`EMAIL` AS `EMAIL`, `Lernprodukte`.`User_ID` AS `User_ID`, `Lernprodukte`.`Bewertung` AS `Bewertung` FROM `Lernprodukte` ORDER BY `Lernprodukte`.`Datum` DESC LIMIT 0, 400 ;";
if (!mysqli_query($con,$queryView)) {
  echo("Error description: " . mysqli_error($con));
  }	
	}
 
	
	}
else
{
	
}


	
}
		
if(array_key_exists('test',$_POST)){
   testfun();
}

?>
			<div>
					
		
<?	
	
	}
	/*
    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'my_option_group', // Option group
            'my_option_name' // Option name
           // array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Lernprodukte Plugin DB Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  

        add_settings_field(
            'DB_HOST', // ID
            'DB Host', // Title 
            array( $this, 'DB_HOST_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'DB_USER', 
            'DB User', 
            array( $this, 'DB_USER_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); 
		add_settings_field(
            'DB_PASS', // ID
            'DB Passwort', // Title 
            array( $this, 'DB_PASS_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'DB_NAME', 
            'DB Name', 
            array( $this, 'DB_NAME_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );      
    }
	

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['id_number'] ) )
            $new_input['id_number'] = absint( $input['id_number'] );

        if( isset( $input['tite'] ) )
            $new_input['tite'] =  sanitize_text_field( $input['tite'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Bitte die Datenbank-Verbindung der Lernprodukte-Datenbank hier eintragen:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function DB_HOST_callback()
    {
        printf(
            '<input type="text" id="DB_HOST" name="my_option_name[DB_HOST]" value="%s" />',
            isset( $this->options['DB_HOST'] ) ? esc_attr( $this->options['DB_HOST']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function DB_USER_callback()
    {
        printf(
            '<input type="text" id="DB_USER" name="my_option_name[DB_USER]" value="%s" />',
            isset( $this->options['DB_USER'] ) ? esc_attr( $this->options['DB_USER']) : ''
        );
    }
	  public function DB_PASS_callback()
    {
        printf(
            '<input type="text" id="DB_PASS" name="my_option_name[DB_PASS]" value="%s" />',
            isset( $this->options['DB_PASS'] ) ? esc_attr( $this->options['DB_PASS']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function DB_NAME_callback()
    {
        printf(
            '<input type="text" id="DB_NAME" name="my_option_name[DB_NAME]" value="%s" />',
            isset( $this->options['DB_NAME'] ) ? esc_attr( $this->options['DB_NAME']) : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new MySettingsPage();

?>


