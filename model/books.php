<?php 

class books{

    protected $db;

    // -----------------------------------------------------------------

    // public function __construct(
    //     PDO $connection
    // ){
    //     $this -> db = $connection;
    // }

    function getAll(){
        $stm = $this -> db -> prepare("SELECT * FROM books");
        $stm -> execute();
        return $stm -> fetchAll();
    }

    function getById($id){
        $stm = $this -> db -> prepare("SELECT + FROM books WHERE id = :id");
        $stm -> bindValue(":id", $id);
        $stm -> execute();
        return $stm -> fetch();
    }

    function getRel($id){
        $stm = $this -> db -> prepare("SELECT * FROM books INNER JOIN users ON books.user_id = WHERE users.id = :id");
        $stm -> bindValue(":id", $id);
        $stm -> execute();
        return $stm -> fetchAll();
    }

}