<?php
class Admin extends CI_Controller
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
        $userObj = new utilisateur_model();

        $data['utilisateurs'] = $userObj->getAll();

        // Chargement de la vue
        $data['main_content'] = 'Admin/index';
        $data['menu']           = 'admin';
        $data['css_file'] = $this->load_css();
        $data['js_file'] = $this->load_js();
        $this->load->view('_templates/template', $data);
    }


    public function ajax_changeAdmin(){
        $utilisateurObj = new Utilisateur_model();

        $id_utilisateur = $this->input->post('id_utilisateur');
        $etat = $this->input->post('etat');

        if($etat == 0){
            $data = array(
                'admin' => 0,
            );
            $utilisateurObj->update($id_utilisateur, $data);
        }else{
            $data = array(
                'admin' => 1,
            );
            $utilisateurObj->update($id_utilisateur, $data);
        }
    }

    public function ajax_changeBan(){
        $utilisateurObj = new Utilisateur_model();

        $id_utilisateur = $this->input->post('id_utilisateur');
        $etat = $this->input->post('etat');

        if($etat == 0){
            $data = array(
                'ban' => 0,
            );
            $utilisateurObj->update($id_utilisateur, $data);
        }else{
            $data = array(
                'ban' => 1,
            );
            $utilisateurObj->update($id_utilisateur, $data);
        }
    }



    public function ajouter_cinema(){
        $cinemaObj = new Cinema_model();

        // Règles de validation du formulaire
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required');
        $this->form_validation->set_rules('cp', 'Code Postal', 'required');
        $this->form_validation->set_rules('ville', 'Ville', 'required');

        // Si le formulaire est correctement envoyé
        if ($this->form_validation->run() == TRUE)
        {
            $nom = $this->input->post('nom');
            $adresse = $this->input->post('adresse');
            $cp = $this->input->post('cp');
            $ville = $this->input->post('ville');

            //////////////////////////////////
            // Calcule les coordonnées GPS //
            //////////////////////////////////

            $gps = $adresse . ' ' . $cp . ' ' . $ville;
            $gps = str_replace(' ', '+', utf8_decode($gps));
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api-adresse.data.gouv.fr/search/?q=" . $gps);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $output = json_decode($output);

            //on recupere la latitude et la longitude de l'adresse entré
            $longitude = $output->features[0]->geometry->coordinates[0];
            $latitude = $output->features[0]->geometry->coordinates[1];
            $score_api = $output->features[0]->properties->score;

            $data = array(
                'nom_cinema'        => $nom,
                'adresse_cinema'    => $adresse,
                'cp_cinema'         => $cp,
                'ville_cinema'      => $ville,
                'score_api'         => $score_api,
                'latitude'          => $latitude,
                'longitude'         => $longitude,
            );

            $cinemaObj->insert($data);

            $data['insert'] = 1;
        }

        // Chargement de la vue
        $data['main_content'] = 'Admin/ajouter_cinema';
        $data['menu']           = 'admin';
        $data['css_file'] = $this->load_css();
        $data['js_file'] = $this->load_js();
        $this->load->view('_templates/template', $data);
    }

    private function load_css($css_file = 'css')
    {
        return $this->load->view('Admin/inc/'.$css_file,'',TRUE);
    }

    private function load_js($js_file = 'js',$data = array())
    {
        return $this->load->view('Admin/inc/'.$js_file,($data) ? $data :'',TRUE);
    }
}
