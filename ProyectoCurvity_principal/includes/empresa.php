<?php
include 'db.php';

class Emp extends DB{
    private $nombre;
    private $username;


    public function empExists($user, $pass){
        $query = $this->connect()->prepare('SELECT * FROM empresa WHERE Email = :user AND Contra = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setEmp($user){
        $query = $this->connect()->prepare('SELECT * FROM empresa WHERE Email = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentEmp) {
            $this->nombre = $currentEmp['Nombre'];
            $this->username = $currentEmp['Email'];
        }
    }

    public function getEmp(){
        return $this->nombre;
    }
}

?>