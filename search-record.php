<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin:*');
/*header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization,X-Requested-Width');*/
$data=json_decode(file_get_contents("php://input"),true);
$name=$data['search'];
include "db-connection.php";
$sql=" SELECT * FROM data WHERE name LIKE '%{$name}%'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
echo json_encode(array('message' => "No record Found", 'status' => false));
}
?>