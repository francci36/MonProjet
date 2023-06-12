<?php
require_once('config.php');
require_once('classe.mother.php');








require_once('classe.rt_agenda.php');
require_once('classe.rt_rdv.php');
require_once('classe.rt_user.php');





class RT_AppRDVTherapeute extends RT_AppRDVTherapeute_Mother {
    


    public function __construct()
    {
        // Construire votre objet
    }

    
    public static $oUserConnected;
    public static $oAgenda;



    public function get_Agenda() : RT_Agenda
    {
        if(static::$oAgenda == null )  {

            
            $this->load_from_session('agenda');

            if(static::$oAgenda == null )
                static::$oAgenda = new RT_Agenda();
        }


        return static::$oAgenda;
    }


    public function get_UserConnected( /*&$o*/ ) : RT_User
    {
        if(static::$oUserConnected == null ) {

            $this->load_from_session('user_connected');

            if(static::$oUserConnected == null ) {
                static::$oUserConnected = new RT_User();
                static::$oUserConnected->valeur_test = "bonjour j'ai été initialisé";
            }
        }
        $o = static::$oUserConnected;
        return $o;
    }


    public function load_from_session( $object_name = '' )
    {

        // Charger les données de la session
        //session_start();
        if( isset($_SESSION['app_rdv_therapeute']) ) {


            switch($object_name) {
                case 'user_connected':
                    static::$oUserConnected = unserialize( $_SESSION['user_connected'] );
                    break;
                case 'agenda':
                    static::$oAgenda = unserialize( $_SESSION['agenda'] );
                    break;
                default:
                    static::$oUserConnected = unserialize( $_SESSION['user_connected'] );
                    static::$oAgenda = unserialize( $_SESSION['agenda'] );
                    break;
            }

        }
    }

    public function save_to_session() {
        // Sauvegarder les données dans la session
        //session_start();
        $_SESSION['app_rdv_therapeute'] = true;
        $_SESSION['user_connected'] = serialize($this->get_UserConnected() );
        $_SESSION['user_connected-email'] = serialize(  $this->get_UserConnected()->getEmail() );
        $_SESSION['agenda'] = serialize( $this->get_Agenda() /*$this->oAgenda*/ );
    }

    public static function instance() {
        
        // Retourner l'instance de l'objet
        if( !isset(static::$instance) ) {
            static::$instance = new self();

            static::$instance->load_from_session();
        }
        return static::$instance;
    }
    public static $instance;
}




 function load_from_session2()
{
    global $oAppRDV;

    // Charger les données de la session
    //session_start();
    if( isset($_SESSION['app_rdv_therapeute']) ) {

        $oAppRDV->load_from_session();

    }
}







//
/// INSTANCIE L'app
global $oAppRDV;
$oAppRDV =  RT_AppRDVTherapeute::instance();


