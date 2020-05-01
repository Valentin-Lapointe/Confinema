<?php
class Accueil extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        if(!$this->session->has_userdata('id'))
        {
            redirect('connexion');
        }
    }

    public function index(){

        //on recupere les film les plus populaire
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/popular?api_key=8c4a8b091b58321c8ace66e82747bcb9&language=fr-FR");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $film = json_decode($output);
        $data['film_populaire'] = $film->results;

        //on recupere les film les mieux noté
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/top_rated?api_key=8c4a8b091b58321c8ace66e82747bcb9&language=fr-FR");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $film = json_decode($output);
        $data['film_mieux_note'] = $film->results;

        //on recupere les film les plus populaire
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/upcoming?api_key=8c4a8b091b58321c8ace66e82747bcb9&language=fr-FR");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $film = json_decode($output);
        $data['film_a_venir'] = $film->results;

        // Chargement de la vue
        $data['main_content'] = 'Accueil/index';
        $data['css_file']		= $this->load_css();
        $data['js_file']		= $this->load_js();
        $this->load->view('_templates/template',$data);

    }

    public function afficher($id_film){


        //on recupere les details du film
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/".$id_film."?api_key=8c4a8b091b58321c8ace66e82747bcb9&language=fr-FR");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $film = json_decode($output);
        $data['details'] = $film;

        // Chargement de la vue
        $data['main_content'] = 'Accueil/afficher';
        $data['css_file']		= $this->load_css();
        $data['js_file']		= $this->load_js();
        $this->load->view('_templates/template',$data);
    }


    private function load_css($css_file = 'css')
    {
        return $this->load->view('Accueil/inc/'.$css_file,'');
    }

    private function load_js($js_file = 'js')
    {
        return $this->load->view('Accueil/inc/'.$js_file,'');
    }
}
?>