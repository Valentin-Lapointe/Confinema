<?php
class Contact extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('id')) {
            redirect('connexion');
        }
    }

    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('sujet', 'Sujet', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        // Si le formulaire est correctement envoyé
        if ($this->form_validation->run() == TRUE)
        {
            // On charge la librairie
            $this->load->library('email');

            $this->email->from('no-reply@confinema.fr', 'Confinema');
            $this->email->to($this->input->post('email'));
            $this->email->subject($this->input->post('sujet'));
            $this->email->message($this->input->post('message'));
            $this->email->send();
        }

        // Chargement de la vue
        $data['main_content']   = 'Contact/index';
        $data['menu']           = 'contact';
        $data['css_file']		= $this->load_css();
        $data['js_file']		= $this->load_js();
        $this->load->view('_templates/template',$data);
    }


    private function load_css($css_file = 'css')
    {
        return $this->load->view('Accueil/inc/'.$css_file,'',TRUE);
    }

    private function load_js($js_file = 'js',$data = array())
    {
        return $this->load->view('Accueil/inc/'.$js_file,($data) ? $data :'',TRUE);
    }

}