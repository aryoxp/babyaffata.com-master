<?php
class extcontroller extends controller {

    private $scripts = array();
    private $styles = array();

    private $page_title = NULL;
    private $isAuthenticated = false;

    public $session = NULL;
    public $authenticatedUser = NULL;

    public function __construct(){

        parent::__construct();

        $this->page_title = $this->config->page_title;

    }

    public function head() {
        /*
        $navbar['user'] = $this->authenticatedUser;   //$this->session->get("user");
        $navbar['modules'] = $this->comsmodules;

        $navbar['userid'] = $this->authenticatedUser->username;
        $navbar['role']   = $this->authenticatedUser->role;
        */
        $mkat = new model_kategori();
        $head['kategoris'] = $mkat->getAllKategori();

        $this->view('header.php', $head);
    }

    public function foot() {
        $this->view('footer.php');
    }

    public function footblank() {
        $this->view('footer-nonjs.php');
    }

    public function add_style($stylepath) {
        if(file_exists( $this->config->assets_folder . "/" . $stylepath ))
            $this->styles[]	= $stylepath;
    }

    public function add_script($scriptpath) {
        if(file_exists( $this->config->assets_folder . "/" . $scriptpath ))
            $this->scripts[] = $scriptpath;
    }

    public function get_scripts() {
        return $this->scripts;
    }

    public function get_styles() {
        return $this->styles;
    }

    public function page_title($appended_string = NULL) {
        return $this->page_title . $appended_string;
    }

    public function no_privileges() {
        $this->view('error/noprivileges.php');
        exit;
    }

}