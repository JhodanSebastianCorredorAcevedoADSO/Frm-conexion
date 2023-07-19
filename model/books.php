<?php 

class books{

    protected $db;

    
    private $user_id; // Propiedad privada
    private $firs_name; // Propiedad privada
    private $last_name; // Contador privada 
    private $cedula; // Contador privada
    private $email; // Propiedad privada 
    private $id; // Propiedad privada 

    public function getid() // Método para obtener el valor
    {
        return $this->id;
    }
    public function getfirs_name() // Método para obtener
    {
        return $this->firs_name;
    }

    public function getlast_name()
    {
        return $this->last_name;
    }

    public function getcedula()
    {
        return $this->cedula;
    }

    public function getemail()
    {
        return $this->email;
    }


    // -----------------------------------------------------------------


    public function setid($id)
    {
        $this->id = $id;
    }

    public function setfirs_name($firs_name)
    {
        $this->firs_name = $firs_name;
    }

    public function setlast_name($last_name)
    {
        $this->last_name = $last_name;
    }

    public function setcedula($cedula)
    {
        $this->cedula = $cedula;
    }

    public function setemail($email)
    {
        $this->email = $email;
    }



    public function __construct(
        PDO $connection
    ){
        $this -> db = $connection;
    }

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

    function store(){
        $sql = "NSERT INTO books (user_id, firs_name, last_name, cedula, email) VALUES (:user_id, :firs_name, :last_name, :cedula, :email)";
        $stm = $this -> db -> prepare ($sql);
        $stm -> bindValue(':user_id', $this -> user_id);
        $stm -> bindValue(':firs_name', $this -> firs_name);
        $stm -> bindValue(':last_name', $this -> last_name);
        $stm -> bindValue(':cedula', $this -> cedula);
        $stm -> bindValue(':email', $this -> email);
    }

}