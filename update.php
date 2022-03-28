<?php include "php/update.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSOLLA - Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
<body>
<?php include "php/header.php"; ?>
<div class="container-fluid main">
<h4 class="crud-heading"><span style='color: yellow;'>U</span>pdate</h4>

<form action="php/update.php" method="post">

<div class="form-group">
<label for="name">Name</label>
<input type="text"
       class="form-control" 
       id="name"
       name="name"
       value="<?=$row['name']?> ">    
</div>
<div class="form-group">
<label for="description">Description</label>
<input type="text"
       class="form-control" 
       id="description"
       name="description"
       value="<?=$row['description']?>" >    
</div>

<div class="form-group">
<label for="code">Code</label>
<input type="text"
       class="form-control" 
       id="code"
       name="code"
       value="<?=$row['code']?>" >    
</div>

<select name="status" class="form-select" id="status-select" required>
  <option selected  value="<?=$row['status']?>"><?=$row['status']?></option>
  <option value="ACTIVE">ACTIVE</option>
  <option value="INACTIVE">INACTIVE</option>  
</select>

<!-- For form initial ID value -->
<input type='text' name="id" value="<?=$row['UUID']?>" hidden>   
  
  <!-- Form Submit -->
  <button type="submit" class="btn btn-primary" name="update">Update</button>
  <!-- Cancel Update -->
  <a href="index.php?error=Update Cancelled" class="btn btn-danger">Cancel</a>
</form>
</div>
</body>
</html>