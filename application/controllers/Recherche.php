<?php
class Recherche extends CI_Controller
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

        // Chargement de la vue
        $data['main_content'] = 'Recherche/index';
        $data['menu']           = 'recherche';
        $data['css_file']		= $this->load_css();
        $data['js_file']		= $this->load_js();
        $this->load->view('_templates/template', $data);
    }

    public function ajax_getMovies(){
        $name = $this->input->post('name');

        //on recupere les details du film
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/search/movie?api_key=8c4a8b091b58321c8ace66e82747bcb9&language=fr-FR&query=".$name);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $film = json_decode($output);
        $movies = $film->results;

        $html = '';
        foreach ($movies as $item) {

            $html .= '<tr>';
                $html .= '<td>';
                    $html .= '<div class="row">';
                        $html .= '<div class="col-lg-3">';
                            $html .= '<img src="https://image.tmdb.org/t/p/w220_and_h330_face/'.$item->poster_path.'" style="height: 300px;width: 200px">';
                        $html .= '</div>';
                        $html .= '<div class="col-lg-9">';
                            $html .= '<a href="'.base_url('Accueil/afficher/'.$item->id).'"><h4 class="text-center mb-5 font-weight-bold">'.$item->title.'</h4></a>';

                                if(!empty($item->overview)) :
                                $html .= '<p class="mt-5">'.$item->overview.'</p>';
                                else :
                                $html.= '<p class="mt-5 text-center font-italic">Inconnu</p>';
                                endif;

                        $html .= '</div>';
                    $html .= '</div>';
                $html .= '</td>';
            $html .= '</tr>';

        }

        echo $html;
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