<?php
    class ProduitController extends ProduitManager{
        public function getProduits(){
            // Mise en tempon de tous de qui se trouve entre le start et le clean
            ob_start();
            $marques = $this->findAll();
            require 'views/marques/list_marque.php';
            $view = ob_get_clean();
            return $view;
        }
        public function getProduitByCategorie($id_categorie){
            // Mise en tampon de tous de qui se trouve entre le start et le clean
            $catManager = new CategorieManager();
            ob_start();
            $cat = $catManager->findOneById($id_categorie);
            $produits = $this->findByCategorie($id_categorie);
            require 'views/produit/list_by_categorie.php';
            $vue = ob_get_clean();
            return $vue;
        }
        public function isValid($post){
            if(!empty($post['name']) && strlen($post['name']) > 0 && is_string($post['name']))
            {
                if(!empty($post['prix']) && strlen($post['prix']) > 0 && is_string($post['prix']))
                {
                    if(!empty($post['name']) && strlen($post['name']) > 0 && is_string($post['name']))
                    {
                        return true;
                    }else{
                        echo "c";
                        return false;
                    }
                }else{
                    echo "a";
                    return false;
                }
            }else{
                echo "b";
                return false;
            }
        }
        public function createProduit(){
            ob_start();
            require 'views/produit/form_produit.php';
            $view = ob_get_clean();
            return $view;
        }

        public function modifProduit($id){
            ob_start();
            $produit = $this->findOneById($id);
            require 'views/produit/form_produit.php';
            $view = ob_get_clean();
            return $view;
        }
        public function saveProduit($post){
            var_dump($post);
            if($this->isValid($post)){
                if($this->save($post['name'],$post['description'],$post['quantite'],$post['prix'],$post['categorie']) > 0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        public function updateProduit($post,$id){
            var_dump($post);
            var_dump($id);
            if($this->isValid($post)){
                if($this->update($post['name'],$post['description'],$post['quantite'],$post['prix'],$post['categorie'],$id) > 0){
                    return true;
                }else{
                    return "b";
                }
            }else{
                return "a";
            }
        }
        public function deleteProduit($id){
            if($this->delete($id) > 0){
                return true;
            }else{
                return false;
            }
        }
    }