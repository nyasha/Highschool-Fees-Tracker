<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url() ?>uploads/logo.png" alt="School Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CH-Tracker</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php $login_id = $this->session->userdata('login_id'); ?>
          <img src="<?php echo base_url().'uploads/parents/'.$login_id.'.png'; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('login_name'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url() ?>allparent" class="nav-link <?php if($page_name=='dashboard') echo 'active'; ?>">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview  <?php if($page_name=='payment') echo 'menu-open'; ?>">
            <a href="#" class="nav-link <?php if($page_name=='payment') echo 'active'; ?>">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Payment
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php  
              $this->db->where('SESSION', $current_session);
              $this->db->where('PARENT', $login_id);
              $students = $this->db->get('student')->result_array();
              foreach ($students as $row):
              ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>allparent/payment/<?php echo $row['CLASS'].'/'.$row['ID'] ?>" class="nav-link  <?php if($page_s_name==$row['ID']) echo 'active'; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p><?php echo $row['NAME']; ?></p>
                </a>
              </li>
              <?php  
              endforeach;
              ?>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url() ?>authe/logout" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>