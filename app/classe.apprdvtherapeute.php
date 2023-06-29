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


 // cette méthode retourne l'agenda
    public function get_Agenda() : RT_Agenda
    {
        if(static::$oAgenda == null )  {

            
            $this->load_from_session('agenda');

            if(static::$oAgenda == null )
                static::$oAgenda = new RT_Agenda();
        }


        return static::$oAgenda;
    }

// cette méthode retoure l'utilisateur connecté (RT_User)
    public function get_UserConnected( /*&$o*/ ) : RT_User
    {
        if(static::$oUserConnected == null ) {

            $this->load_from_session('user_connected');

            if(static::$oUserConnected == null ) {
                static::$oUserConnected = new RT_User();
            }
        }
        $o = static::$oUserConnected;
        return $o;
    }

    // cette méthode sert à charger les données à partir de la session
    public function load_from_session( $object_name = '' )
    {
        // verifie si la clé existe dans la session
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
    
    // cette méthode sert à sauvegarder les données dans la session
    public function save_to_session() {
      
        // on initialise clé app_rdv_therapeute à true
        $_SESSION['app_rdv_therapeute'] = true;
        $_SESSION['user_connected'] = serialize($this->get_UserConnected() );
        $_SESSION['user_connected-email'] = serialize(  $this->get_UserConnected()->getEmail() );
        $_SESSION['agenda'] = serialize( $this->get_Agenda() /*$this->oAgenda*/ );
    }

    // cette méthode sert à récupérer l'instance de l'objet en cours
    public static function instance() {
        
        // si l'instance n'existe pas, on la crée
        if( !isset(static::$instance) ) {
            static::$instance = new self();

            static::$instance->load_from_session();
        }
        return static::$instance;
    }
    public static $instance;
}








//
/// INSTANCIE L'APPLICATION
global $oAppRDV;
$oAppRDV =  RT_AppRDVTherapeute::instance();


