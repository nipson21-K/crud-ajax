<?php

require_once 'models/usersModel.php'; 

class UniqueIdController
{
    static public function fetchUsers()
    {
        //creating object of UsersModel
        $um_obj = new UsersModel(); 
       
        //calling method which returns all the database values by running query
        $all_datas = $um_obj->readUsers();
        
        //array creation (empty)
        $uid_arr = array(); 


        //foreach to loop through all the rows in database and assign all the ids to an array we created above
        foreach($all_datas as $row){
            array_push($uid_arr, $row["user_id"]);  //pushing all the ids to an array called $uid_arr
        }

        return $uid_arr; //array which has all the ids
    }

    
    /*==================================================================
    = generateUniqueId which returns generate uniq id with respect to DB=
    ===================================================================*/
    static public function generateUniqueId(){
        $uid_arr = array();   //creating an empty array 
        
        $random = new UniqueIdController();  //creating obj of this class to call the above fetchUsers function which returns all the user id from database.
        //total ids
        $id_arr = $random -> fetchUsers();   //calling fetchUsers func which returns all the user ids via the obj created above and storing all the ids in the array called $id_arr which we just created above
      
        //newly generated id 
        $uid = uniqid();  //generating a uniq id via inbuilt method uniqid()
        
        //foreach which loops through all the user id of database and checks one matcching with newly generated id and if matches with any then generted new one. In short gnerates new id until its different than that of database.
        foreach($id_arr as $uid_value)
        {
            if($uid == $uid_value){
                $uid = uniqid();
            }
        }

        return $uid;  //finally newly generated unique user id 
    }
}
?>
