<?php

class Category {
    private $pdo;
    private $id_categorie;
    private $name;
    private $description;

    public function __construct($pdo="") {
        $this->pdo = $pdo;
    }
    
    public function readCategories() {
        try {
            $qry = "SELECT * FROM categories";
            $stmt = $this->pdo->prepare($qry);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($data as $object){
                $object = new self();
                $object->setId($data['id_categorie']);
                $object->setName($data['categorie_name'])
                $object->setDescription($data['categorie_description']);
            }
        } catch(Exception $ex) {
            throw new Exception("Error in readCategories method: " . $ex->getMessage());
        }
    }
    

    public function readCategoriesByPage($start_from,$limit) {
        try {
            $sql = "SELECT * FROM your_table LIMIT :start_from, :limit";
            $stmt->bindParam(":start_from,", $start_from);
            $stmt->bindParam(":limit", $limit);
            $stmt = $this->pdo->prepare($qry);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $ex) {
            throw new Exception("Error in readCategories method: " . $ex->getMessage());
        }
    }
    
    


    public function delete() {
        try {
            $qry = "DELETE FROM categories WHERE id_categorie = :id_categorie";
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":id_categorie", $this->id_categorie);
            $stmt->execute();
        } catch(Exception $ex) {
            throw new Exception("Error in delete method: " . $ex->getMessage());
        }
    }
    
    

    public function update() {
        try {
            $qry = "UPDATE categories 
                    SET categorie_name = :name,
                        categorie_description = :description
                    WHERE id_categorie = :id_categorie";
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":id_categorie", $this->id_categorie);
            $stmt->execute();
        } catch(Exception $ex) {
            throw new Exception("Error in update method: " . $ex->getMessage());
        }
    }

    public function create() {
        try {
            $qry = "INSERT INTO categories (categorie_name, categorie_description)
                    VALUES (:name, :description)";
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":description", $this->description);
            $stmt->execute();
        } catch(Exception $ex) {
            throw new Exception("Error in create method: " . $ex->getMessage());
        }
    }

    // Getters
    public function getId() {
        return $this->id_categorie;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    // Setters
    public function setId($id) {
        $this->id_categorie = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }
}