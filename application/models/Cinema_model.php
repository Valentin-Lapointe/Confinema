<?PHP

class Cinema_model extends CI_Model {

    var $id_cinema          = "id_cinema";
    var $nom_cinema         = "nom_cinema";
    var $adresse_cinema     = "adresse_cinema";
    var $cp_cinema          = "cp_cinema";
    var $ville_cinema       = "ville_cinema";
    var $score_api          = "score_api";
    var $latitude           = "latitude";
    var $longitude          = "longitude";

    public $table = 'cinema';

    function get($id)
    {
        $this->db->where($this->id_cinema, $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    function getAll()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($id,$data)
    {
        $this->db->where($this->id_cinema, $id);
        $this->db->update($this->table,$data);
    }
    function delete($id)
    {
        // Suppression de la base de données
        $this->db->where($this->id_cinema, $id);
        $this->db->delete($this->table);
    }

}