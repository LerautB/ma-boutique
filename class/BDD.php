<?php
class BDD{
    private $host = 'localhost';
    private $database = 'maboutique';
    private $user = 'root';
    private $pwd = '';

    protected $co = false;

    public function __construct(){
        if(!$this->co){
            try{
                $this->co = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->pwd);
                $this->co->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }
    public function getCo(){
        return $this->co;
    }
}