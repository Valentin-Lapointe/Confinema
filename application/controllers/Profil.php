<?php
class Profil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('id')) {
            redirect('connexion');
        }
    }

    public function index(){

        $utilisateurObj = new utilisateur_model();

        $data['utilisateur'] = $utilisateurObj->get($this->session->userdata('id'));

        // Chargement de la vue
        $data['main_content']   = 'Profil/index';
        $data['css_file']		= $this->load_css();
        $data['js_file']		= $this->load_js();
        $this->load->view('_templates/template',$data);
    }


    private function load_css($css_file = 'css')
    {
        return $this->load->view('Profil/inc/'.$css_file,'',TRUE);
    }

    private function load_js($js_file = 'js',$data = array())
    {
        return $this->load->view('Profil/inc/'.$js_file,($data) ? $data :'',TRUE);
    }

}