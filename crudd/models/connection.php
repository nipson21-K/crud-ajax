<?php

class Connection{
    public static function connect()
    {
        $dsn= "mysql:host=localhost;dbname=cosmic"; //setting dsn which takes host & db name
        $user='root'; //user
        $password=''; //password
      
        try{
            $pdo=new PDO($dsn, $user, $password);  //PDO
            return $pdo;
        }
        catch(PDOException $e)
        {
          echo $e->getMessage();
        } 
    }
}

?>