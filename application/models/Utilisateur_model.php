<?PHP

class Utilisateur_model extends CI_Model {

    var $id_utilisateur = "id_utilisateur";
    var $admin          = "admin";
    var $email          = "email";
    var $password       = "password";
    var $prenom         = "prenom";
    var $nom            = "nom";
    var $adresse        = "adresse";
    var $cp             = "cp";
    var $ville          = "ville";
    var $date_creation  = "date_creation";

    public $table = 'utilisateur';

    function validate($login,$password)
    {
        $this->db->where($this->email, $login);
        $this->db->where($this->password, $password);
        $query = $this->db->get($this->table);

        if($query->num_rows() == 1)
        {
            $data = $query->row();
            return $data;
        }
        else
        {
            return FALSE;
        }
    }

    function get($id)
    {
        $this->db->where($this->id_utilisateur, $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($id,$data)
    {
        $this->db->where($this->id_utilisateur, $id);
        $this->db->update($this->table,$data);
    }
    function delete($id)
    {
        // Suppression de la base de données
        $this->db->where($this->id_utilisateur, $id);
        $this->db->delete($this->table);
    }

}