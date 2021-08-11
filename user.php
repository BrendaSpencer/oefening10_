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
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            throw new OngeldigEmailadresException();
        }
        $this->email = $email;
    }
    public function setWachtwoord($wachtwoord, $herhaalWachtwoord){
        if($wachtwoord !== $herhaalWachtwoord){
            throw new WachtwoordenKomenNietOvereenException();
        }
        $this->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
    }

    public function emailReedsInGebruik(){
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);

        $stmt= $dbh->prepare("select * FROM users WHERE email = :email");
        $stmt->bindValue(":email", $this->email);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        $dbh = null;

        return $rowCount;
    }

    public function register(){
        $rowCount = $this->emailReedsInGebruik();
        if($rowCount > 0){
            throw new GebruikerBestaatAlException();
        }
        $dbh = new PDO(BConfig::$DB_CONNSTRING, DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("insert into users (email, wachtwoord) values (:email, :wachtwoord)");
        $stmt->bindValue(":email" , $this->email);
        $stmt->bindValue(":wachtwoord" , $this->wachtwoord);
        $stmt->execute();
        $laatsteNieuweId = $dbh->lastInsertId();
        $dbh = null;
        $this->id =$laatsteNieuweId;
        return $this;
        
    }

}