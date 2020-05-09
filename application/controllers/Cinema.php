<?php
class Cinema extends CI_Controller
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


        $data['css_file'] = $this->load_css();
        $data['js_file'] = $this->load_js();

        $this->form_validation->set_rules('rayon', 'Rayon', 'required');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required');
        $this->form_validation->set_rules('cp', 'Code Postal', 'required');
        $this->form_validation->set_rules('ville', 'Ville', 'required');

        // Si le formulaire est correctement envoyé
        if ($this->form_validation->run() == TRUE)
        {

            $adresse = $this->input->post('adresse');
            $cp = $this->input->post('cp');
            $ville = $this->input->post('ville');
            $rayon = $this->input->post('rayon');

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

            // on enregistre l'adresse entré dans un tableau pour l'affchier plus tard avec un marqueur a part
            $centre = array(
                'adresse' => $adresse.' '.$cp.' '.$ville,
                'latitude' => $latitude,
                'longitude' => $longitude,
            );

            //on fait le calcul pour trouver les boulangeries potentiels dans le rayon donnée
            $query = $this->db->query('SELECT * FROM (SELECT *, (((acos(sin(( '.$latitude.' * pi() / 180))*sin(( `latitude` * pi() / 180)) + cos(('.$latitude.' * pi() /180 ))*cos(( `latitude` * pi() / 180)) * cos((( '.$longitude.' - `longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM cinema ) cinema WHERE distance <= '.$rayon);
            $cinemas = $query->result();


            //on envoie les information dans la cartographie
            $data['css_file']		= $this->load_css('carto_css');
            $data['js_file']		= $this->load_js('carto_js',array('cinemas'=>$cinemas,'centre' => $centre));


            $data['insert'] =array(
                'rayon' => $rayon,
                'adresse' => $adresse,
                'cp' => $cp,
                'ville' => $ville,
            );

        }

        $data['utilisateur'] = $userObj->get($this->session->userdata('id'));


        // Chargement de la vue
        $data['main_content'] = 'Cinema/index';
        $data['menu']           = 'cinema';
        $this->load->view('_templates/template', $data);
    }

    private function load_css($css_file = 'css')
    {
        return $this->load->view('Cinema/inc/'.$css_file,'',TRUE);
    }

    private function load_js($js_file = 'js',$data = array())
    {
        return $this->load->view('Cinema/inc/'.$js_file,($data) ? $data :'',TRUE);
    }

}