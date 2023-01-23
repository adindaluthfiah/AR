<?php
include("dev.php");
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S.N</th>

         <th>Name</th>
         <th>Longitude</th>
         <th>Latitude</th>
         <th>Value</th>

    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['SITENAME']??''; ?></td>
      <td><?php echo $data['LONGITUDE']??''; ?></td>
      <td><?php echo $data['LATITUDE']??''; ?></td>
      <td><?php echo $data['SITEID']??''; ?></td>  
      <td><?php echo $data['BAND_COVERAGE']??''; ?></td>  
      <td><?php echo $data['TOWER_TYPE']??''; ?></td>  
      <td><?php echo $data['TOWER_HEIGHT']??''; ?></td>  
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>