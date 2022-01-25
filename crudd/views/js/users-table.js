 
$(document).ready(function(){
   
    showAllUsers();   //calling function
    
     /*================================
    =        READ USERS Ajax         =
    =================================*/
    function showAllUsers()
    {
        $.ajax({
            url:"controllers/usersController.php",
            type:"POST",
            data:{action:"view"},
            success:function(response){
                $("#showUser").html(response);
                // $("table").DataTable({   //PAGINATION
                //     order: [0, 'desc'] 
                // }); 
            }
        });
    }



  /*================================
    =      Insert USERS Ajax         =
    =================================*/
    $("#insertUser").click(function(e){
        if($("#form-data")[0].checkValidity())
        {
            e.preventDefault();
            $.ajax({
                url:"controllers/usersController.php",
                type:"POST",
                data:$('#form-data').serialize()+"&action=insert",  //serialize() method gets all the input field values in array & sending  extra String
                success:function(response){
                   Swal.fire({
                       title:'user added successfully!',
                       type:'success'
                   });
                   $('#form-data')[0].reset();
                   showAllUsers();
                
                   
                }
            });
        }
    });

    
  /*================================
    =      Edit USERS Ajax         =
    =================================*/
    $("body").on("click", ".editBtn", function(e){
        e.preventDefault();
        edit_id = $(this).attr('id');

        $.ajax({
            url:"controllers/usersController.php",
            type:"POST",
            data:{edit_id:edit_id},
            success:function(response){
                console.log('response');
                try{
                data=JSON.parse(response);
                }
                catch(error) {
                    console.log('Error happened here!')
                }
                $("#eid").val(data.user_id);
                $("#eemail").val(data.email);
                $("#ename").val(data.full_name);
                $("#epassword").val(data.password);
                $("#ephone").val(data.phone);
                $("#erole").val(data.role);
            }
        })
    });

    
  /*================================
    =      Update USERS Ajax         =
    =================================*/
    $("#insertUser").click(function(e){
        if($("#edit-form-data")[0].checkValidity())
        {
            e.preventDefault();
            $.ajax({
                url:"controllers/usersController.php",
                type:"POST",
                data:$('#edit-form-data').serialize()+"&action=update",  //serialize() method gets all the input field values in array & sending  extra String
                success:function(response){
                   Swal.fire({
                       title:'user updated successfully!',
                       type:'success'
                   });
                   $('#editModal').modal('hide');
                   $('#edit-form-data')[0].reset();
                   showAllUsers();
                }
            });
        }
    });

         
  /*================================
    =      Delete USERS Ajax         =
    =================================*/
    $("body").on("click", ".delbtn", function(e){
        e.preventDefault();
        var tr=$(this).closest('tr');
        del_id=$(this).attr('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url:"ation.php",
                    type:"POST",
                    data:{del_id:del_id},
                    success:function(response){
                        true.css('background-color', '#ff666666');
                        Swal.fire(
                            "deleted",
                            "suer deleted successfully",
                            "success"
                        )
                        showAllUsers();
                    }
                });
            }
        });
    });
    

 

});    