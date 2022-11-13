<?php
    class CategorieController extends CategorieManager{
        public function getCategories(){
            // Mise en tempon de tous de qui se trouve entre le start et le clean
            ob_start();
            $categories = $this->findAll();
            require 'views/categorie/list_categorie.php';
            $view = ob_get_clean();
            return $view;
        }
        public function isValid($post){
            if(!empty($post['name']) && strlen($post['name']) > 0 && is_string($post['name'])){
                return true;
            }else{
                return false;
            }
        }
        public function createCategorie(){
            ob_start();
            require 'views/categorie/form_categorie.php';
            $view = ob_get_clean();
            return $view;
        }

        public function modifCategorie($id){
            ob_start();
            $categorie = $this->findOneById($id);
            require 'views/categorie/form_categorie.php';
            $view = ob_get_clean();
            return $view;
        }
        public function saveCategorie($post){
            if($this->isValid($post))
            {
                    if($this->save($post['name']) > 0){
                        return true;
                    }else{
                        return false;
                    }
            }else{
                return false;
            }
        }
        public function updateCategorie($post,$id){
            if($this->isValid($post)){
                if($this->update($post['name'],$id) > 0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        public function deleteCategorie($id){
            if($this->delete($id) > 0){
                return true;
            }else{
                return false;
            }
        }
    }
