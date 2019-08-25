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
            <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
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

                      <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" href="#courses" role="tab" data-toggle="tab">CLASSES</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#add" role="tab" data-toggle="tab">ADD CLASS</a>
                        </li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active table-responsive" id="courses">

                          <table class="table table-bordered table-striped" id="example1">
                            <thead>
                              <tr>
                                <th>S/N</th>
                                <th>CLASS NAME</th>
                                <th>PAYABLE FEES</th>
                                <th>ACTIONS</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  
                              // $count = 1;
                              // $this->db->order_by('creation_date', 'ASC');
                              // $courses = $this->db->get('courses_tbl')->result_array();
                              // foreach ($courses as $row):
                              ?>
                              <tr>
                                <td><?php //echo $count++; ?></td>
                                <td><?php //echo $row['name']; ?></td>
                                <td><?php //echo $row['duration']; ?></td>
                                <td>
                                  <a href="<?php //echo base_url() ?>aftrack/options/edit_enroll/<?php //echo $row['id']; ?>" class="btn btn-sm btn-block btn-info btn-flat">Edit</a>
                                </td>
                              </tr>
                              <?php  
                              //endforeach;
                              ?>
                            </tbody>
                          </table>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="add">

                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <form role="form" method="POST" action="<?php echo base_url() ?>aftrack/action/new_course" enctype="multipart/form-data">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label>CLASS NAME</label>
                                      <input autocomplete="off" value="<?php ?>" type="text" name="name" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>TOTAL PAYABLE FEES</label>
                                      <input autocomplete="off" type="tel" value="<?php  ?>" name="fees" class="form-control money">
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-primary">ADD NEW CLASS</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="col-md-2"></div>
                          </div>

                        </div>
                      </div>

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
    });
  </script>

</body>
</html>
