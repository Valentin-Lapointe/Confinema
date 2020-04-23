<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller {

    public function index(){
        $utilisateurObj 	= new Utilisateur_model();

        $data = array();

        // Règles de validation du formulaire
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Mot de passe', 'required');

        // Si le formulaire est correctement envoyé
        if ($this->form_validation->run() == TRUE)
        {
            // On vérifie les infos de l'utilisateur
            $user = $utilisateurObj->validate($this->input->post('email'), $this->input->post('password'));

            // Si les informations de connexion sont corrects
            if($user)
            {
                // Informations stockées en session
                $data = array(
                    'id'			    => $user->id_utilisateur,
                    'email'			    => $user->email,
                );
                $this->session->set_userdata($data);

                // Redirection vers la page d'accueil
                redirect('Accueil', 'refresh');
            }
            // Si les informations de connexion sont incorrectes
            else
            {
                // Redirection vers la page de connexion
                $data['message'] = "Email ou mot de passe incorrect !";
            }
        }

        // Chargement de la vue
        $data['main_content'] = 'Connexion/index';
        $this->load->view('_templates/template',$data);
    }

}
?>