<?php
class user {
    private $id;
    private $email;
    private $wachtwoord;

    public function __construct($cid = null, $cemail = null , $cwachtwoord = null){
        $this->id = $cid;
        $this->email = $cemail;
        $this->wachtwoord= $cwachtwoord;
    }

    public function getId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getWachtwoord(){
        return $this->wachtwoord;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setWachtwoord($wachtwoord){
        $this->wachtwoord = $wachtwoord;
    }
}