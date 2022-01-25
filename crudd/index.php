<?php
require_once "controllers/templateController.php";
require_once "models/usersModel.php";



//calling func of a controller which returns template(view)
$temp_obj = new TemplateController();
$temp_obj -> templateCtrl();  