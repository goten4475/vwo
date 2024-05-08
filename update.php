<?php
include_once ("conex.php");
#var_dump($_POST);

$id = mysqli_real_escape_string($conn,$_POST["f_id"]) ;
$action = mysqli_real_escape_string($conn,$_POST["f_action"]) ;



if($action == "activado"){
    $query = "UPDATE usuarios SET `status`= '1' WHERE `id`= '$id'";
}elseif($action == "eliminado"){
    #$query = "DELETE FROM usuarios WHERE `id`= '$id'";
    $query = "UPDATE usuarios SET `status`= '3' WHERE `id`= '$id'";
}

if(mysqli_query($conn,$query)){
    echo json_encode(array('success' => 1, 'value' => $action ));


}else{
    echo json_encode(array('success' => 2 , 'value' => "Error: ".mysqli_error($conn)));
}


