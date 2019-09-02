<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aptech Abeokuta Fees Tracker | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/pnotify/pnotify.custom.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/custom.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url() ?>assets/backend/index2.html"><b>CHORAS-</b>TRACKER</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <form action="<?php echo base_url() ?>authe/valafclog/" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="email" autocomplete="off" class="form-control" placeholder="EMAIL">
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="pwd" autocomplete="off" class="form-control" placeholder="PASSWORD">
        </div>
        <!-- /.col -->
          <div class="">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
          </div>
          <!-- /.col -->
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/pnotify/pnotify.custom.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/backend/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {

<?php if($this->session->flashdata('invalid_cred') != ''){ ?>
new PNotify({
    title: 'Notification',
    text: '<?php echo $this->session->flashdata('invalid_cred'); ?>',
    type: 'error'
});
<?php } ?>
    
  })
</script>
</body>
</html>
