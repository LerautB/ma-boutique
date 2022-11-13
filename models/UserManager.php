<?php
class UserManager extends BDD{
    public function findAll(){
        $sql = 'SELECT * FROM utilisateur';
        $select = $this->co->prepare($sql);
        $select->execute();

        return $select->fetchAll();
    }

    public function findOneById($id){
        $sql = 'SELECT * from utilisateur WHERE id = :id';
        $select= $this->co->prepare($sql);
        $select->execute(['id' => $id]);
        return $select->fetch();
    }

    public function findOneByMail($mail){
        $sql = 'SELECT * from utilisateur WHERE mail = :m';
        $select= $this->co->prepare($sql);
        $select->execute(['m' => $mail]);
        return $select->fetch();
    }

    public function save($nom,$mail,$mdp){
        $sql = 'INSERT INTO utilisateur (nom,mail,mdp) values (:n,:m,:mdp)';
        $select= $this->co->prepare($sql);
        $select->execute(['n' => $nom,'m'=>$mail,'mdp' => $mdp]);
        return $select->rowCount(); 
    }
    public function update($nom,$mail,$statut, $id){
        $sql = 'UPDATE utilisateur SET nom = :n,mail = :m,statut = :statut WHERE id = :id';
        $select= $this->co->prepare($sql);
        $select->execute(['n' => $nom,'m'=>$mail,'statut' => $statut,'id'=>$id]);
        return $select->rowCount(); 
    }
    public function delete(int $id){
        $sql = "DELETE FROM utilisateur WHERE id = :id";
        $delete = $this->co->prepare($sql);
        $delete->execute(['id'=>$id]);
        return $delete->rowCount();
    }
}