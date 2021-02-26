<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login page.......</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
 </head>
 <body>

  <div class="navbar navbar-dark bg-dark">
  <div class="container">
    <a href="#" class="navbar-brand">Crud Application</a>
    
  </div>
</div>

    <form method="POST" name='createUser' action="<?php echo base_url().'index.php/user/check_login';?>">

  <div class="form-group">
    <div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-6">
        <div class="form-group">
    <label for="email">Email address:</label>
    <input type="text" name="email" value="<?php echo set_value('email')?>" class="form-control">
     <?php echo form_error('email'); ?>
  </div>
</div>
  </div>
</div>
  <div class="form-group">
    <div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-6">
    <label for="password">Password:</label>
    <input type="password" name="password" value="<?php echo set_value('password')?>" class="form-control">
    <?php echo form_error('password'); ?>
  </div>
</div>
</div>
</div>
<div class="container">
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>   
    
</body>
</html>