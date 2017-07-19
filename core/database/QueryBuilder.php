<?php

class QueryBuilder {
    
    protected $pdoConnection;
    
    public function __construct($pdo) {
        $this->pdoConnection = $pdo;
    }
    
    public function selectAll($table) {
        $stmt = $this->pdoConnection->prepare("SELECT * FROM {$table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertUser($table, $nome, $cognome , $email) {
        $stmt = $this->pdoConnection->prepare("INSERT INTO {$table} (nome, cognome, email) VALUES (?,?,?) ");
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $cognome);
        $stmt->bindParam(3, $email);
        if ($stmt->execute()) return true;
        return false;
    }
    
    public function insertPost($table, $titolo,$sottotitolo,$contenuto,$anchorPointId) {
        $stmt = $this->pdoConnection->prepare("INSERT INTO {$table} (titolo, sottotitolo, contenuto,anchor_point) VALUES (?,?,?,?)");
        $stmt->bindParam(1, $titolo);  
        $stmt->bindParam(2, $sottotitolo);
        $stmt->bindParam(3, $contenuto);
        $stmt->bindParam(4, $anchorPointId);
        
        if ($stmt->execute()) return true;
        return false;        
    }
    
    public function deletePostsById($id) {
        $stmt = $this->pdoConnection->prepare("DELETE FROM posts WHERE id = {$id}");
        if ($stmt->execute()) return true;
        return false;
    }
    
    public function login($email, $password) {
        $stmt = $this->pdoConnection->prepare("SELECT * FROM utenti WHERE email='{$email}' AND password='{$password}'");
        if ($stmt->execute()) return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    public function checkDisponibilita($checkin, $checkout, $tipo_camera){
        $query = "SELECT c.* FROM camere c
        WHERE tipo = '{$tipo_camera}'
        AND NOT EXISTS
        (SELECT * FROM prenotazioni p WHERE p.camera = c.numero
        AND (p.periodoDal < {$checkin} and {$checkout} < p.periodoAl)
        );";
        $stmt = $this->pdoConnection->prepare($query);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
    }
    
    public function getPrezzoForOneDay($checkin, $checkout, $tipo_camera) {
        $result = $checkin->format('Y-m-d H:i:s');
//        $checkin = date("Y-m-d", strtotime($checkin) );
//        $checkout = date("Y-m-d", strtotime($checkout) );
        $query = "SELECT prezzo FROM prezzi WHERE '{$result}' BETWEEN periodoDal AND periodoAl AND tipoCamera = '{$tipo_camera}' ";
//        print_r($query);
        $stmt = $this->pdoConnection->prepare($query);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
    }
    
    
    public function insertRoom($numero, $piano, $tipologia) {
        $stmt = $this->pdoConnection->prepare("INSERT INTO camere VALUES (?,?,?)");
        $stmt->bindParam(1, $numero);
        $stmt->bindParam(2, $piano);
        $stmt->bindParam(3, $tipologia);
//        $stmt->bindParam(4, $optionals);
        if ($stmt->execute()) return true;
        return false;
    }
    
    public function getAnchorText() {
        $query = 'SELECT * FROM anchor_point JOIN posts ON anchor_point.id = posts.anchor_point';
        $stmt = $this->pdoConnection->prepare($query);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
    }
    
    public function getAllDetailsOfRooms() {
        $query = 'SELECT * FROM camere JOIN tipo_camera ON camere.id_tipologia = tipo_camera.id';
        $stmt = $this->pdoConnection->prepare($query);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }

    }
    

    
    public function selectOnlyTypesOfRoom(){
       $query ='SELECT DISTINCT tipo_camera.nome_camera FROM tipo_camera';
       $stmt = $this->pdoConnection->prepare($query);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
    }
    
    public function selectAttributiCamereDistinct() {
        $query ='SELECT DISTINCT  tipo_camera.id_attributi,tipo_camera.nome_camera, attributi_camere.descrizione, attributi_camere.descrizione_home,attributi_camere.img_home FROM tipo_camera JOIN attributi_camere ON attributi_camere.id = tipo_camera.id_attributi';
        $stmt = $this->pdoConnection->prepare($query);
        if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
    }
    public function insertAttributi($descrizione, $descrizione_breve, $img_path) {
        $stmt = $this->pdoConnection->prepare("INSERT INTO attributi_camere (descrizione,descrizione_home,img_home) VALUES (?,?,?)");
        $stmt->bindParam(1, $descrizione);
        $stmt->bindParam(2, $descrizione_breve);
        $stmt->bindParam(3, $img_path);
//        $stmt->bindParam(4, $optionals);
        if ($stmt->execute()) return true;
        return false;
    }
    
    public function updateAttributi($descrizione, $descrizione_breve, $img_path, $id_attributo){
        $stmt = $this->pdoConnection->prepare("UPDATE attributi_camere SET descrizione = :descrizione, descrizione_home = :descrizione_breve, img_home = :img_path WHERE id = :id");
        $stmt->bindParam(":descrizione", $descrizione);
        $stmt->bindParam(":descrizione_breve", $descrizione_breve);
        $stmt->bindParam(":img_path", $img_path);
        $stmt->bindParam(":id", $id_attributo);
        if ($stmt->execute()) return true;
        return false;
    }
    
    public function getCamereDati() {
       $query ='SELECT * FROM camere JOIN tipo_camera ON camere.id_tipologia=tipo_camera.id JOIN attributi_camere ON tipo_camera.id_attributi = attributi_camere.id';
       $stmt = $this->pdoConnection->prepare($query);
       if($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }
    }
    
}
