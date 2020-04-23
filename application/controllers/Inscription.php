<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        // Règles de validation du formulaire
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');
        $this->form_validation->set_rules('password_verify', 'Confirmation mot de passe', 'required');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required');
        $this->form_validation->set_rules('cp', 'Code Postal', 'required');
        $this->form_validation->set_rules('ville', 'Ville', 'required');

        // Si le formulaire est correctement envoyé
        if ($this->form_validation->run() == TRUE)
        {
            $password = $this->input->post('password');
            $password_verify = $this->input->post('password_verify');

            if($password == $password_verify){

                $utilsateurObj = new Utilisateur_model();

                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'prenom' => $this->input->post('prenom'),
                    'nom' => $this->input->post('nom'),
                    'adresse' => $this->input->post('adresse'),
                    'cp' => $this->input->post('cp'),
                    'ville' => $this->input->post('ville'),
                );

                $utilsateurObj->insert($data);

                $data['insert'] = 1;

                redirect('Connexion', 'refresh');

            }else{
                $data['verify'] = 1;
            }

        }else{
            $data['error'] = 1;
        }

        // Chargement de la vue
        $data['main_content'] = 'Inscription/index';
        $this->load->view('_templates/template',$data);
    }
}
