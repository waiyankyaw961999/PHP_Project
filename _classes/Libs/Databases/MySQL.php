<?php
namespace Libs\Databases;

use PDO;
use PDOException;

class MySQL
{
    private $pipeName;
    private $username;
    private $password;
    private $localhost;
    private $dbname;
    private $db;

    public function __construct($pipeName='/opt/lampp/var/mysql/mysql.sock',$localhost='localhost',$dbname='user_manage',$username='root',$password='')
    {
        $this->pipeName = $pipeName;
        $this->username = $username;
        $this->dbname = $dbname;
        $this->localhost = $localhost;
        $this->password = $password;
    }
    public function connect()
    {
        try
        {

            $this->db = new PDO('mysql:unix_socket='.$this->pipeName.';dbname='.$this->dbname,$this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        return $this->db;
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
    
}
