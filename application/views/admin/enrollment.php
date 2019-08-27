<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
            <h1 class="m-0 text-dark">
              <?php echo $this->db->get_where('class_tbl',array('ID'=>$class_id))->row()->NAME; ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
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
                            <th>CLASS</th>
                            <th>TERM</th>
                            <th>PAYABLE FEES</th>
                            <th>ACTIONS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                          $count = 1;
                          $term = $this->db->get('term_tbl')->result_array();
                          foreach ($term as $row):
                          ?>
                          <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $this->db->get_where('class_tbl',array('ID'=>$row['CLASS_ID']))->row()->NAME; ?></td>
                            <td><?php echo $row['NAME']; ?></td>
                            <td><?php echo number_format($row['FEES']); ?></td>
                            <td>
                              <a href="<?php echo base_url() ?>admin/options/edit_term/<?php echo $row['ID']; ?>" class="btn btn-sm btn-block btn-info btn-flat">Edit</a>
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
      $('.money').simpleMoneyFormat();
      <?php if($this->session->flashdata('completed') != ''){ ?>
        new PNotify({
            title: 'Notification',
            text: '<?php echo $this->session->flashdata('completed'); ?>',
            type: 'success'
        });
      <?php } ?>
    });
  </script>

</body>
</html>
