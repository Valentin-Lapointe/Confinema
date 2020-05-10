<?PHP

class Utilisateur_film_model extends CI_Model
{

    var $id                 = "id";
    var $id_utilisateur     = "id_utilisateur";
    var $id_film            = "id_film";


    public $table = 'utilisateur_film';

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function get($id)
    {
        $this->db->where($this->id_film, $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    function getByUser($id_user)
    {
        $this->db->where($this->id_utilisateur, $id_user);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    function delete($id_user, $id_film)
    {
        // Suppression de la base de données
        $this->db->where($this->id_utilisateur, $id_user);
        $this->db->where($this->id_film, $id_film);
        $this->db->delete($this->table);
    }


}