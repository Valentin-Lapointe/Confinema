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
        $data['menu']           = 'profil';
        $data['css_file']		= $this->load_css();
        $data['js_file']		= $this->load_js();
        $this->load->view('_templates/template',$data);
    }

    public function change_password(){

        $utilisateurObj = new Utilisateur_model();

        $this->form_validation->set_rules('last_password', 'Ancien mot de passe', 'required');
        $this->form_validation->set_rules('new_password', 'Nouveau mot de passe', 'required');
        $this->form_validation->set_rules('confirm_new_password', 'Confimation nouveau mot de passe', 'required');

        // Si le formulaire est correctement envoyé
        if ($this->form_validation->run() == TRUE)
        {
            $last_password = $this->input->post('last_password');
            $new_password = $this->input->post('new_password');
            $confirm_new_password = $this->input->post('confirm_new_password');

            if($new_password == $confirm_new_password)
            {

                $inf = $utilisateurObj->change_password($this->session->userdata('id'), $last_password, $new_password);

                if($inf == TRUE) :

                $data['insert'] = 1;

                else :

                $data['error'] = 1;

                endif;

            }else{
                $data['verify'] = 1;
            }

        }

        // Chargement de la vue
        $data['main_content']   = 'Profil/change_password';
        $data['menu']           = 'profil';
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