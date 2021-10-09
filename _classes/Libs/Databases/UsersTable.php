<?php

namespace Libs\Databases;
use PDOException;
use Libs\Databases\MySQL;

class UsersTable
{
    private $db = null;

    public function __construct(MYSQL $db)
    {
        $this->db=$db->connect();
    }

    public function insert($data)
    {
        try 
        {
            $query = " INSERT INTO users (name,phone,email,password,address,roles_id,photo,created_at)
            VALUES (:name,:phone,:email,:password,:address,:roles_id,:photo,NOW())";

            $statement = $this->db->prepare($query);
            $statement->execute($data);
        return $this->db->lastInsertId();    
        }
        catch (PDOException $e)
        {
            return $e->getMessage()();
        }

    }


    public function getAll()
    {
        try
        {
            $query = "SELECT users.*,roles.name as role,roles.value FROM users LEFT JOIN roles ON users.roles_id = roles.id";

            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
        
    }

    public function findID($id)
    {
        try
        {
            $query = "SELECT * FROM users WHERE id=$id";

            $statement = $this->db->prepare($query);
            $statement->execute([':id'=>$id]);
            return $statement->fetch();
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }        

    }
        public function find_Email_Password($email,$password)
    {
        try
        {
            $query = "SELECT users.*,roles.name AS role, roles.value FROM users LEFT JOIN roles ON users.roles_id = roles.id
            WHERE users.email = :email AND users.password = :password";

            $statement = $this->db->prepare($query);
            $statement->execute([':email'=>$email,
                                 ':password'=>$password]);
            return $statement->fetch();
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }        

    }
    

    public function suspend($id)

    {
        try
        {
            $query = "UPDATE users SET `suspended`=1 WHERE id= :id";
            $statement = $this->db->prepare($query);
            return $statement->execute([':id'=>$id]); 
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public function unsuspend($id)

    {
        try
        {
            $query = "UPDATE `users` SET `suspended`=0 WHERE id= :id";
            $statement = $this->db->prepare($query);
            return $statement->execute([':id'=>$id]); 
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try
        {
            $query = "DELETE FROM users WHERE id=:id";
            $statment = $this->db->prepare($query);
            return $statment->execute([':id'=>$id]);
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public function changerole($id,$role)
    {   try
        {
            $query = "UPDATE `users` SET `roles_id`=:role,`updated_at`=NOW() WHERE id=:id";

            $statement = $this->db->prepare($query);
            return $statement->execute([':id'=>$id,':role'=>$role]);
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
}

