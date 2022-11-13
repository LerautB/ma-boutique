<?php
    class UserController extends UserManager{
        public function getUsers(){
            // Mise en tempon de tous de qui se trouve entre le start et le clean
            ob_start();
            $users = $this->findAll();
            require 'views/user/list_user.php';
            $view = ob_get_clean();
            return $view;
        }
        public function isValid($post){
            if(!empty($post['name']) && strlen($post['name']) > 0 && is_string($post['name'])){
                if(!empty($post['mail']) && strlen($post['mail']) > 0 && is_string($post['mail']) && filter_var($post["mail"], FILTER_VALIDATE_EMAIL)){
                    if(!empty($post['mdp']) && strlen($post['mdp']) > 0 && is_string($post['mdp']))
                    {
                        return true;
                    }else{
                        echo '<p> Error : password</p>';
                        return false;
                    }
                }else{
                    echo '<p>Error : Mail</p>';
                    return false;
                }
                
            }else{
                return false;
            }
        }

        public function createUser(){
            ob_start();
            require 'views/user/form_user.php';
            $view = ob_get_clean();
            return $view;
        }

        public function modifUser($id){
            ob_start();
            $user = $this->findOneById($id);
            require 'views/user/form_user.php';
            $view = ob_get_clean();
            return $view;
        }
        public function saveUser($post){
            if($this->isValid($post)){
                $mdp = password_hash($post['mdp'], PASSWORD_BCRYPT);
                if($this->save($post['name'],$post['mail'],$mdp) > 0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        public function updateUser($post,$id){
            if($this->isValid($post)){
                if($this->update($post['name'],$post['mail'],$post['statut'],$id) > 0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        public function deleteUser($id){
            if($this->delete($id) > 0){
                return true;
            }else{
                return false;
            }
        }
        public function loginForm(){
            ob_start();
            require 'views/user/login_form.php';
            $view = ob_get_clean();
            return $view;
        }
        public function setConnection($post){
            $_SESSION['active'] = true;
            if(!empty($post['statut']) && $post['statut'] == true){
                $_SESSION['admin'] = true;
            }else{
                $_SESSION['admin'] = false;
            }
            return true;
        }
        public function verifyConnection($post){
            if(!empty($post['mail'])){
                $user = $this->findOneByMail($post['mail']);
            }
            
            if(!empty($user)){
                if(password_verify($post['mdp'], $user['mdp'])){
                    if($this->setConnection($user)){
                        return true;
                    }else{
                        echo '<p>Failed to connect</p>';
                        return false;
                    }
                }else{
                    echo '<p>wrong password</p>';
                    return false;
                }
            }else{
                echo '<p>user not found</p>';
                return false;
            }
        }
        public function disconnectUser(){
            session_destroy();
            return true;
        }
    }