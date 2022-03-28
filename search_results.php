<?php include "php/search.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSOLLA - Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
 <?php include "php/header.php"; ?> 
<div class="container-fluid main">

<h4 class="crud-heading">SEARCH RESULTS</h4>

<?php if(isset($_GET['success'])) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_GET['success']; ?>
    </div>
<?php } ?>

<?php if(mysqli_num_rows($result)) { ?>
    <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">CODE</th>
      <th scope="col" class="text-center">STATUS</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
<?php 
    while($rows = mysqli_fetch_assoc($result)) {     
?>  
    <tr>
      <th scope="row"><?= $rows['UUID'] ?></th>
      <td><?= $rows['name'] ?></td>
      <td style="width: 50%; max-width: 400px;"><?= $rows['description'] ?></td>
      <td><?= $rows['code'] ?></td>
      
<?php         
    if(strcasecmp($rows['status'], 'active') === 0) { ?>
      <td class="status active"><?= strtoupper($rows['status']) ?></td>
<?php } else { ?>
      <td style="min-width: 105px;text-align: center;"><?= strtoupper($rows['status']) ?></td>        
<?php } ?>      
      <td><a href="update.php?id=<?=$rows['UUID']?>" class="btn btn-dark controls">Update</a></td>
      <td><a href="php/delete.php?id=<?=$rows['UUID']?>" class="btn btn-danger controls">Delete</a></td>
    </tr>
<?php } ?>
    </tbody>
    </table>
<?php } else {
  echo 'NO RESULTS FOUND';
}
?>  
  <a href="index.php" class="btn btn-success controls mt-1">Back</a>
  </div>
</body>
</html>