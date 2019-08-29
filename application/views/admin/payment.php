<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$current_session = $this->db->get_where('settings_tbl',array('ID'=>1))->row()->SESSION;
$class_name = $this->db->get_where('class_tbl',array('ID'=>$class_id))->row()->NAME; 
$fees = $this->db->get_where('class_tbl',array('ID'=>$class_id))->row()->FEES;  

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
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $page_title.' for '.$class_name; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fa fa-info"></i> Reminder!</h5>
              <?php echo $class_name.' total payment for '.$current_session.' session is '.number_format($fees); ?>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="row mt-5">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-info">
                    <!-- <h3 class="card-title"></h3> -->
                    <div class="card-tools">
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body mt-3">

                    <table class="table table-bordered table-striped" id="example1">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>PARENT</th>
                          <th>NAME</th>
                          <th>STATUS</th>
                          <th>ACTIONS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  
                        $count = 1;
                        $this->db->where('CLASS', $class_id);
                        $this->db->where('SESSION', $current_session);
                        $student = $this->db->get('student')->result_array();
                        foreach ($student as $row):
                        ?>
                        <tr>
                          <td><?php echo $count++; ?></td>
                          <td>
                            <?php echo $this->db->get_where('parent_tbl',array('ID'=>$row['PARENT']))->row()->NAME.' ('.$this->db->get_where('parent_tbl',array('ID'=>$row['PARENT']))->row()->EMAIL.')'; ?>
                          </td>
                          <td><?php echo $row['NAME']; ?></td>
                          <td>INCOMPLETE</td>
                          <td>
                            <a href="<?php echo base_url() ?>admin/payment/single/<?php echo $class_id ?>/<?php echo $row['ID'] ?>" class="btn btn-sm btn-info">PAYMENT</a>
                            <button class="btn btn-sm btn-primary">PROMOTE</button>
                          </td>
                        </tr>
                        <?php  
                        endforeach;
                        ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
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
<script>
$(function () {
  $("#example1").DataTable();
})
</script>
</body>
</html>
