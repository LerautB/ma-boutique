<?php
class ProduitManager extends BDD{
    public function findAll(){
        $sql = 'SELECT * FROM produits';
        $select = $this->co->prepare($sql);
        $select->execute();

        return $select->fetchAll();
    }
    public function findByCategorie($id_marque){
        $sql = 'SELECT * FROM produits WHERE categorie = :id';
        $select = $this->co->prepare($sql);
        $select->execute(['id'=>$id_marque]);

        return $select->fetchAll();
    }
    public function findOneById($id){
        $sql = 'SELECT * from produits WHERE id = :id';
        $select= $this->co->prepare($sql);
        $select->execute(['id' => $id]);
        return $select->fetch();
    }

    public function save($nom,$description,$quantite,$prix,$categorie){
        $sql = 'INSERT INTO produits (nom,description,quantite,prix,categorie) values (:n,:d,:q,:p,:c)';
        $select= $this->co->prepare($sql);
        $select->execute(['n' => $nom,'d' => $description, 'q' => $quantite, 'p' => $prix, 'c' => $categorie]);
        return $select->rowCount(); 
    }
    public function update($nom,$description,$quantite,$prix,$categorie, $id){
        $sql = 'UPDATE produits SET nom = :n,description=:d,quantite=:q,prix=:p,categorie=:c WHERE id = :id';
        $select= $this->co->prepare($sql);
        $select->execute(['n' => $nom,'d' => $description, 'q' => $quantite, 'p' => $prix, 'c' => $categorie,'id'=>$id]);
        return $select->rowCount(); 
    }
    public function delete(int $id){
        $sql = "DELETE FROM produits WHERE id = :id";
        $delete = $this->co->prepare($sql);
        $delete->execute(['id'=>$id]);
        return $delete->rowCount();
    }
}