<?php
 require_once "../models/usersModel.php";

 $um_obj=new UsersModel(); ///object creation of UsersModel to call its different functions
   /*================================
    =        READ USERS Controller    =
    =================================*/
    if(isset($_POST['action']) && $_POST['action'] == "view")
        {
           $output='';
           $data=$um_obj->readUsers(); //calling readUsers model to get all datas
      
            if($um_obj->totalRowCount() > 0)
            {
                $output.='<table class="table table-striped table-sm table-bordered">
                          <thead>
                            <tr class="text-center">
                                <th> ID</th>
                                <th> Email</th>
                                <th> Full name</th>
                                <th> Password</th>
                                <th> Phone</th>
                                <th> Role</th>
                                <th> Action</th>
                            <tr>
                         </thead>
                         <tbody>';
                foreach($data as $row){
                  $output.='<tr class="text-center text-secondary">
                                <td>'.$row['user_id'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['full_name'].'</td>
                                <td>'.$row['password'].'</td>
                                <td>'.$row['phone'].'</td>
                                <td>'.$row['role'].'</td>
                                <td>
                                <a href="#" title="View details" class="text-success infoBtn" id="'.$row['user_id'].'"> <i
                                        class="fas fa-info-circle fa-lg"></i> </a>
                                &nbsp; &nbsp;
                                <a href="#" title="Edit" class="text-primary editBtn" data-toggle="modal" data-target="#editModal" id="'.$row['user_id'].'"> <i class="fas fa-edit fa-lg"></i>
                                </a>
                                &nbsp; &nbsp;
                                <a href="#" title="Delete" class="text-danger delBtn" id="'.$row['user_id'].'"> <i
                                        class="fas fa-trash-alt fa-lg"></i> </a>
                                </td>
                            </tr>';
                } 
                $output.='</tbody></table>';
                echo $output; 
             }
             else{
             echo '<h3 class="text-center text-secondary mt-5"> No any user present in the database! </h3>';
             }

        }
    
          /*================================
    =        Insert users Controller    =
    =================================*/
    if(isset($_POST['action']) && $_POST['action'] == "insert")
    {
      //fetching all the form datas entered by user
      $email=$_POST['email'];
      $fname=$_POST['fname'];
      $password=$_POST['password'];
      $phone=$_POST['phone'];
      $role=$_POST['role']; 

      //creating obj & calling func which generates unique id n assigning it to $id
      $unique_id_obj = new UniqueIdController();
      $id = $unique_id_obj->generateUniqueId();  
      
      if($um_obj->insertUsers($id, $email, $fname, $password, $phone, $role))
      {
        return true;
      }
      else{
        return false;
      }
       
    }

           /*================================
    =        Display fatas 9on update form Controller    =
    =================================*/
    if(isset($_POST['edit_id']))
    {
      $id=$_POST['edit_id'];
      $row=$um_obj->getuserById($id);
      echo json_encode($row);
    }

       /*================================
    =       Update users Controller    =
    =================================*/
    if(isset($_POST['action']) && $_POST['action']=="update")
    {
      $id=$_POST['eid'];
      $email=$_POST['eemail'];
      $name=$_POST['efname'];
      $password=$_POST['epassword'];
      $phone=$_POST['ephone'];
      $role=$_POST['erole'];

      $um_obj->updateUsers($id, $email, $name, $password, $phone, $role); 

    }


    if(isset($_POST['del_id']))
    {
      $id=$_POST['del_id'];
      $um_obj->delete($id);
    }





?>