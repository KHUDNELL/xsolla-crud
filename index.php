<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSOLLA | CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body> 
<?php include "php/header.php"; ?>  
<?php include "php/read.php"; ?>

<div class="container-fluid main">

<!-- Search Form -->
<form action="search_results.php" method="post">
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="search_term" placeholder="Search for Entry" required>
    <button class="btn btn-outline-secondary" type="submit" id="search" name="search">Search</button>
  </div>
</form>

<h4 class="crud-heading"><span style='color: yellow;'>R</span>EAD</h4>

<!-- Error Alert -->
<?php if(isset($_GET['error'])) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_GET['error']; ?>
        </div>
<?php } ?>

<!-- Success Alert -->
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
        <th scope="col">STATUS</th>
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
      
        <td><a href="update.php?id=<?=$rows['UUID']?>" class="btn btn-dark controls"><span style="color: yellow;">U</span>pdate</a></td>
        <td><a href="php/delete.php?id=<?=$rows['UUID']?>" class="btn btn-danger controls"><span style="color: yellow;">D</span>elete</a></td>
      </tr>
<?php } ?>    

    </tbody>
  </table>

 <?php } ?>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><span style="color: yellow;">C</span>REATE</button>

  <!-- Filter Buttons -->
  <div class="float-end">
    <a href="index.php?show=all" style="width: 100px;" class="btn btn-outline-secondary">All</a>
    <a href="index.php?show=active" style="width: 100px;" class="btn btn-outline-secondary">Active</a>
    <a href="index.php?show=inactive" style="width: 100px;" class="btn btn-outline-secondary">Inactive</a>
  </div>
  </div>

  <!-- Modal for Create Operation -->
  <div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="crud-heading"><span style="color: yellow;">C</span>REATE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
  <form action="php/create.php" method="post">          
      <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
      </div>
  
      <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <input type="text" class="form-control" id="description" name="description" required>
      </div>
      <div class="mb-3">
      <label class="form-label" for="code">Code</label>
      <input type="text" class="form-control" id="code" name="code" required>
    
      <label class="form-label" for="status">Status</label>

      <select name="status" class="form-select" required>
        <option selected disabled value="">Select</option>
        <option value="ACTIVE">ACTIVE</option>
        <option value="INACTIVE">INACTIVE</option>  
      </select>    
      </div>
  
      <button type="submit" class="btn btn-primary" name="create">Submit</button>
  </form>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
  </div>
  </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>