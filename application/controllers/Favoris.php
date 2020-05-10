<?php
class Favoris extends CI_Controller
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
        $utilisateurFilmObj = new Utilisateur_film_model();

        //on recuperer l'id de tous les film que l'tilisateur aime
        $favoris = $utilisateurFilmObj->getByUser($this->session->userdata('id'));

        $film_favoris = array();

        //pour chaque film on va recuperer ses données
        foreach ($favoris as $item)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/".$item->id_film."?api_key=8c4a8b091b58321c8ace66e82747bcb9&language=fr-FR");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $film = json_decode($output);

            $data = array(
                'id'            => $film->id,
                'title'         => $film->title,
                'poster_path'   => $film->poster_path,
                'overview'      => $film->overview,
            );

            array_push($film_favoris, $data);

        }

        $data['film_favoris'] = $film_favoris;

        // Chargement de la vue
        $data['main_content']   = 'Favoris/index';
        $data['menu']           = 'favoris';
        $data['css_file']		= $this->load_css();
        $data['js_file']		= $this->load_js();
        $this->load->view('_templates/template', $data);
    }

    public function ajax_addMovie(){

        $utilisateurFilmObj = new Utilisateur_film_model();

        $id_user = $this->session->userdata('id');
        $id_film = $this->input->post('id_film');

        $data = array(
            'id_utilisateur' => $id_user,
            'id_film' => $id_film,
        );

        $utilisateurFilmObj->insert($data);
    }

    public function ajax_removeMovie(){

        $utilisateurFilmObj = new Utilisateur_film_model();

        $id_user = $this->session->userdata('id');
        $id_film = $this->input->post('id_film');

        $utilisateurFilmObj->delete($id_user, $id_film);
    }



    private function load_css($css_file = 'css')
    {
        return $this->load->view('Recherche/inc/'.$css_file,'',TRUE);
    }

    private function load_js($js_file = 'js',$data = array())
    {
        return $this->load->view('Recherche/inc/'.$js_file,($data) ? $data :'',TRUE);
    }
}