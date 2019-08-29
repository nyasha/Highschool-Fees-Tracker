<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$class_name = $this->db->get_where('class_tbl',array('ID'=>$class_id))->row()->NAME; 
$student_name = $this->db->get_where('student',array('ID'=>$student_id))->row()->NAME; 
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php'; ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include 'inc/navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'inc/aside.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark"><?php echo $page_title.' for '.$student_name.' in '.$class_name.', '.$current_session.' session'; ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <div class="card card-info card-outline collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Payment for First Term</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: none;">
            The body of the card
          </div>
          <!-- /.card-body -->
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include 'inc/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'inc/rscript.php'; ?>

</body>
</html>
