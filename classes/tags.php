<?php

class Tag {
    private $pdo;
    private $id_tag;
    private $name;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public static function readTags($pdo) {
        try {
            $qry = "SELECT * FROM tags";
            $stmt = $pdo->prepare($qry);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $ex) {
            throw new Exception("Error in readTags method: " . $ex->getMessage());
        }
    }


    public static function findTag($pdo, $id) {
        try {
            $qry = "SELECT * FROM tags WHERE id_tag = :id_tag";
            $stmt = $pdo->prepare($qry);
            $stmt->bindParam(":id_tag", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $ex) {
            throw new Exception("Error in findTag method: " . $ex->getMessage());
        }
    }

    public function delete() {
        try {
            $qry = "DELETE FROM tags WHERE id_tag = :id_tag";
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":id_tag", $this->id_tag);
            $stmt->execute();
        } catch(Exception $ex) {
            throw new Exception("Error in delete method: " . $ex->getMessage());
        }
    }   

    public function update() {
        try {
            $qry = "UPDATE tags 
                    SET tag_name = :name
                    WHERE id_tag = :id_tag";
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":id_tag", $this->id_tag);
            $stmt->execute();
        } catch(Exception $ex) {
            throw new Exception("Error in update method: " . $ex->getMessage());
        }
    }

    public function create() {
        try {
            $qry = "INSERT INTO tags tag_name
                    VALUES :name";
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":name", $this->name);
            $stmt->execute();
        } catch(Exception $ex) {
            throw new Exception("Error in create method: " . $ex->getMessage());
        }
    }

    // Getters
    public function getId() {
        return $this->id_tag;
    }

    public function getName() {
        return $this->name;
    }


    // Setters
    public function setId($id) {
        $this->id_tag = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }
}