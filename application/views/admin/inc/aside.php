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
          <img src="<?php echo base_url() ?>assets/backend/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Logged In Name</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url() ?>admin" class="nav-link <?php if($page_name=='dashboard') echo 'active'; ?>">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

         <li class="nav-item has-treeview  <?php if($page_name=='enrollment') echo 'menu-open'; ?>">
            <a href="#" class="nav-link <?php if($page_name=='enrollment') echo 'active'; ?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Enrollment
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php  
              $class = $this->db->get('class_tbl')->result_array();
              foreach ($class as $row):
              ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/enrollment/class/<?php echo $row['ID'] ?>" class="nav-link  <?php if($page_s_name==$row['ID']) echo 'active'; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p><?php echo $row['NAME']; ?></p>
                </a>
              </li>
              <?php  
              endforeach;
              ?>
            </ul>
          </li>

          <!-- <li class="nav-item">
            <a href="<?php //echo base_url() ?>admin/enrollment" class="nav-link <?php //if($page_name=='enrollment') echo 'active'; ?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Enrollment
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url() ?>admin/payment" class="nav-link <?php if($page_name=='payment') echo 'active'; ?>">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Payment
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview  <?php if($page_name=='management') echo 'menu-open'; ?>">
            <a href="#" class="nav-link <?php if($page_name=='management') echo 'active'; ?>">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/management/class" class="nav-link  <?php if($page_s_name=='class') echo 'active'; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/management/term" class="nav-link  <?php if($page_s_name=='term') echo 'active'; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Team</p>
                </a>
              </li>
              <?php
              //if($this->session->userdata('l_priv') == 'admin'):
              ?>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/management/users" class="nav-link <?php if($page_s_name=='users') echo 'active'; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/management/settings" class="nav-link  <?php if($page_s_name=='settings') echo 'active'; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>General Settings</p>
                </a>
              </li>
              <?php  
              //endif;
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