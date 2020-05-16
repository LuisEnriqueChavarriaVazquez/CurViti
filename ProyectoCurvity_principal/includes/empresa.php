<?php
include 'db.php';

class Emp extends DB{
    private $nombre;
    private $username;


    public function userExists($user, $pass){
        $query = $this->connect()->prepare('SELECT * FROM empresa WHERE Email = :user AND Contra = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM empresa WHERE Email = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['Nombre'];
            $this->username = $currentUser['Email'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>