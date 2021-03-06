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
        $query = $this->db->get($this->table);
        $user = $query->row();

        if($user){
            if(password_verify($password, $user->password)){
                return $user;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }

    }

    function get($id)
    {
        $this->db->where($this->id_utilisateur, $id);
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
        $this->db->where($this->id_utilisateur, $id);
        $this->db->update($this->table,$data);
    }
    function delete($id)
    {
        // Suppression de la base de données
        $this->db->where($this->id_utilisateur, $id);
        $this->db->delete($this->table);
    }

    function change_password($id_utilisateur, $last_password, $new_password){

        $this->db->where($this->id_utilisateur, $id_utilisateur);
        $query = $this->db->get($this->table);
        $user = $query->row();

        if($user){
            if(password_verify($last_password, $user->password)){

                $data = array(
                    'password' => password_hash($new_password, PASSWORD_DEFAULT)
                );

                $this->db->where($this->id_utilisateur, $id_utilisateur);
                $this->db->update($this->table,$data);

                return TRUE;

            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }

    }

}