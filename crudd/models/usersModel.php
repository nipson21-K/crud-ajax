<?php
require_once 'connection.php';

class UsersModel
{
    /*================================
    =       ADD USERS Model     =
    =================================*/
    public static function insertUsers($id, $email, $full_name, $password, $phone, $role)
    {
       //sql query
       $sql="INSERT INTO users(user_id, email, full_name, password, phone, role) VALUES(:id, :email, :full_name, :password, :phone, :role)";
       
       //calling function of PDO
       $stmt=Connection::connect()->prepare($sql); //passing query to prepare function 
       $stmt->execute(['id'=>$id, 'email'=>$email, 'full_name'=>$full_name, 'password'=>$password, 'phone'=>$phone, 'role'=>$role]); //executing the query
       
       return true;
    }


    /*================================
    =        READ USERS Model         =
    =================================*/
    public static function readUsers()
    {
            $sql="SELECT * FROM users"; 
            $stmt=Connection::connect()->prepare($sql);
            $stmt->execute();

            //fetch all the datas from table
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);     
            
            foreach($result as $row)
            {
                $datas[]=$row;
            }

            return $datas;             
    }

    /*================================
    =      GET_USER_BY_ID Model     =
    =================================*/
    public static function getUserById($id)
    {
            $sql="SELECT * FROM users WHERE id = :id"; 
            $stmt=Connection::connect()->prepare($sql);
            $stmt->execute(['id'=>$id]); //defining the id

            //fetch all the datas from table
            $result = $stmt->fetch(PDO::FETCH_ASSOC);     
        
            return $result;             
    }

    /*================================
    =       UPDATE USERS Model        =
    =================================*/
    public static function updateUsers($id, $email, $full_name, $password, $phone, $role)
    {
       //sql query
       $sql="UPDATE users SET email=:email, full_name=:full_name, password=:password, phone=:phone, role=:role WHERE user_id=:user_id";
       //calling function of PDO
       $stmt=Connection::connect()->prepare($sql); //passing query to prepare function 

       $response=$stmt->execute(['email'=>$email, 'full_name'=>$full_name, 'password'=>$password, 'phone'=>$phone, 'role'=>$role, 'user_id'=>$id]); //executing the query
       return true;
    }


     /*================================
    =       DELETE USERS Model        =
    =================================*/
    public static function deleteUsers($id)
    {
        //sql query
        $sql="DELETE FROM users WHERE user_id=:user_id";
        //calling function of PDO
        $stmt=Connection::connect()->prepare($sql);

        $stmt->execute(['user_id'=>$id]);
        return true;
    }

      /*================================
    =      Total_Row_Count Model      =
    =================================*/
    public static function totalRowCount()
    {
        $sql="SELECT * FROM users";
        $stmt=Connection::connect()->prepare($sql);
        $stmt->execute(); //defining the id
        $t_rows=$stmt->rowCount();

        return $t_rows;
    }


}

 

/*================================
    =      function check     =
    =================================*/
// $um=new UsersModel();
// print_r($um->totalRowCount());
    
?>