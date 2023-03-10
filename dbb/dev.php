<?php
include("connect.php");

$db= $conn;
$tableName="longlat_copy2";
$columns= ['name', 'longitude', 'latitude', 'value'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY name DESC";
$result = $db->query($query);

if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}



// $db= $conn;
// $tableName="datapotensi";
// $columns= ['SITEID','SITENAME', 'LONGITUDE', 'LATITUDE', 'TOWER_TYPE', 'BAND_COVERAGE', 'TOWER_HEIGHT'];
// $fetchData = fetch_data($db, $tableName, $columns);

// function fetch_data($db, $tableName, $columns){
//  if(empty($db)){
//   $msg= "Database connection error";
//  }elseif (empty($columns) || !is_array($columns)) {
//   $msg="columns Name must be defined in an indexed array";
//  }elseif(empty($tableName)){
//    $msg= "Table Name is empty";
// }else{

// $columnName = implode(", ", $columns);
// $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY SITENAME DESC";
// $result = $db->query($query);

// if($result== true){ 
//  if ($result->num_rows > 0) {
//     $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
//     $msg= $row;
//  } else {
//     $msg= "No Data Found"; 
//  }
// }else{
//   $msg= mysqli_error($db);
// }
// }
// return $msg;
// }



// if(is_array($fetchData)){      
//    foreach($fetchData as $data){
//       echo $data['longitude'];
//       echo $data['latitude'];
//    }
// }



?>