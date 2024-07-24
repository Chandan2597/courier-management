<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');

?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>
<?php include 'header.php' ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="mainNav">
<a class="navbar-brand" href="" style="font-family:'Cinzel', serif; font-size:25px ">Courier Management System - Log-in Page</a>
	</nav>
  <br><br><br>
<body class="hold-transition login-page">
<div class="login-box">
<div class="segment" style="margin-right:10px;">
  <div class="login-logo">
    <img src="img/login.jpg"/>
  </div>
  <div class="card">
    <div class="card"> 
    <div class="card-body login-card-body">
      <form action="" id="login-form">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" required placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          end_load();
        }
      }
    })
  })
  })
</script>
<?php include 'footer.php' ?>

</body>
</html>
