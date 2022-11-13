<?php
    class CategorieManager extends BDD{
        public function findAll(){
            $sql = 'SELECT * FROM categories';
            $select = $this->co->prepare($sql);
            $select->execute();
    
            return $select->fetchAll();
        }
        public function findByCategorie($id_marque){
            $sql = 'SELECT * FROM categories WHERE marque = :id';
            $select = $this->co->prepare($sql);
            $select->execute(['id'=>$id_marque]);

            return $select->fetchAll();
        }
        public function findOneById($id){
            $sql = 'SELECT * from categories WHERE id = :id';
            $select= $this->co->prepare($sql);
            $select->execute(['id' => $id]);
            return $select->fetch();
        }
        public function save($nom){
            $sql = 'INSERT INTO categories (nom) values (:n)';
            $select= $this->co->prepare($sql);
            $select->execute(['n' => $nom]);
            return $select->rowCount(); 
        }
        public function update($nom, $id){
            $sql = 'UPDATE categories SET nom = :n WHERE id = :id';
            $select= $this->co->prepare($sql);
            $select->execute(['n' => $nom,'id'=>$id]);
            return $select->rowCount(); 
        }
        public function delete(int $id){
            $sql = "DELETE FROM categories WHERE id = :id";
            $delete = $this->co->prepare($sql);
            $delete->execute(['id'=>$id]);
            return $delete->rowCount();
        }
    }