<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD by me</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- data table CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.css" />
   
</head>

<body>

    <!--container open-->
    <div class="container">
        <!--container child 1-->
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center text-danger font-weight-normal my-3"> CRUD </h4>
            </div>
        </div>

        <!--container child 2-->
        <div class="row">
            <div class="col-lg-6">
                <h4 class="mt-2 text-primary"> Registered users </h4>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal"
                    data-target="#addModal"> <i class="fa fa-user-plus"></i>&nbsp;&nbsp;Add new user </button>
            </div>
        </div>
        <hr class="my-1">

        <!--container child 3 / user table-->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showUser">
                    

                </div>
            </div>
        </div>

    </div>
    <!--container close-->


    <!-- Modal: add new user -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add new user</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form method="POST" id="form-data">
                        <!-- email -->
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <!-- full name -->
                        <div class="form-group">
                            <input type="text" name="fname" class="form-control" placeholder="Full name" required>
                        </div>
                        <!-- password -->
                        <div class="form-group">
                            <input type="text" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <!-- phone -->
                        <div class="form-group">
                            <input type="int" name="phone" class="form-control" placeholder="Phone" required>
                        </div>
                        <!-- role -->
                        <div class="form-group">
                            <select name="role" class="form-control custom-select">
                                <option id="editRole" selected disabled>Role</option>
                                <option value="user">User</option>
                                <option value="editor">Editor</option>
                            </select>
                        </div>
                        <!-- submit -->
                        <div class="form-group">
                           <input type="submit" name="insert" id="insertUser" value="Add user" class="btn btn-danger btn-block">
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal : add new user | CLOSE-->



      <!-- Modal: edit new user -->
      <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit user</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body px-4">
                    <form method="POST" id="edit-form-data">
                        <!-- id/hidden -->
                        <input type="hidden" name="eid" id="eid">
                         <!-- email -->
                        <div class="form-group">
                            <input type="email" name="eemail" class="form-control" id="eemail" required>
                        </div>
                        <!-- full name -->
                        <div class="form-group">
                            <input type="text" name="efname" class="form-control" id="ename" required>
                        </div>
                        <!-- password -->
                        <div class="form-group">
                            <input type="text" name="epassword" class="form-control" id="epassword" required>
                        </div>
                        <!-- phone -->
                        <div class="form-group">
                            <input type="int" name="ephone" class="form-control" id="ephone" required>
                        </div>
                        <!-- role -->
                        <div class="form-group">
                            <select name="erole" class="form-control custom-select">
                                <option id="editRole" selected disabled>Role</option>
                                <option value="user">User</option>
                                <option value="editor">Editor</option>
                            </select>
                        </div>
                        <!-- submit -->
                        <div class="form-group">
                           <input type="submit" name="update" id="update" value="Edit user" class="btn btn-primary btn-block">
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal : add new user | CLOSE-->


    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- data table JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/datatables.min.js"></script>
    <!--sweet alert 2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--jquery/ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!--Custom: users-table.js | for pagination-->
    <script src="views/js/users-table.js" type="text/javascript"> </script>


   


</body>

</html>