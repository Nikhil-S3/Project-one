<!-- <h3> General</h3>-->
<?php // echo "<pre>";print_r($_SESSION);echo "</pre>";exit; ?>
<ul class="nav side-menu">
  <?php if($_SESSION['module_permissions'][3]['p_view'] == '1'){ ?>
  <li>
    <a href="<?php echo base_url();?>students"><i class="fa fa-users"></i> Students </a>
  </li>
  <?php } if($_SESSION['module_permissions'][1]['p_view'] == '1'){ ?>
  <li>
    <a href="<?php echo base_url();?>teachers"><i class="fa fa-users"></i> Teachers </a>
  </li>
  <?php } // if($_SESSION['module_permissions'][1]['p_view'] == '1'){ ?>
    <!-- <li>
      <a href="<?php // echo base_url();?>teacher"><i class="fa fa-users"></i> Teacher </a>
    </li> -->
  <?php // } 
    if($_SESSION['module_permissions'][2]['p_view'] == '1'){ ?>
  <li>
    <a href="<?php echo base_url();?>parents"><i class="fa fa-users"></i> Parents </a>
  </li>
  <?php } if($_SESSION['module_permissions'][4]['p_view'] == '1'){ ?>
  <li>
    <a href="<?php echo base_url();?>users"><i class="fa fa-users"></i> Users </a>
  </li>

<?php } if($_SESSION['module_permissions'][5]['p_view'] == '1' || $_SESSION['module_permissions'][6]['p_view'] == '1' || $_SESSION['module_permissions'][7]['p_view'] == '1'){ ?>
  <li>
    <a><i class="fa fa-home"></i> Academic <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <?php if($_SESSION['module_permissions'][5]['p_view'] == '1'){ ?>
      <li><a href="<?php echo base_url();?>classes">Class</a></li>
    <?php } if($_SESSION['module_permissions'][6]['p_view'] == '1'){ ?>
      <li><a href="<?php echo base_url();?>sections">Section</a></li>
    <?php } if($_SESSION['module_permissions'][7]['p_view'] == '1'){ ?>
      <li><a href="<?php echo base_url();?>subject">Subject</a></li>
    <?php } ?>
    </ul>
  </li>
  <?php } if($_SESSION['module_permissions'][8]['p_view'] == '1' || $_SESSION['module_permissions'][9]['p_view'] == '1' || $_SESSION['module_permissions'][28]['p_view'] == '1'){ ?>

  <li>
    <a><i class="fa fa-home"></i> Attendance <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <?php if($_SESSION['module_permissions'][8]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>sattendance">Student Attendance</a></li>
      <?php } if($_SESSION['module_permissions'][28]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>tattendance">Teacher Attendance</a></li>
      <?php } if($_SESSION['module_permissions'][9]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>uattendance">User Attendance</a></li>
      <?php } ?>
    </ul>
  </li>

  <?php } if($_SESSION['module_permissions'][10]['p_view'] == '1' || $_SESSION['module_permissions'][11]['p_view'] == '1' || $_SESSION['module_permissions'][12]['p_view'] == '1' || $_SESSION['module_permissions'][19]['p_view'] == '1'){ ?>

  <li>
    <a><i class="fa fa-home"></i> Exam <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <?php if($_SESSION['module_permissions'][11]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>exams">Exam</a></li>
      <?php } if($_SESSION['module_permissions'][19]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>examschedule">Exam Schedule</a></li>
      <?php } if($_SESSION['module_permissions'][12]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>grade">Grade</a></li>
      <?php } if($_SESSION['module_permissions'][10]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>eattendance">Exam Attendance</a></li>
      <?php } ?>
    </ul>
  </li>

  <?php } if($_SESSION['module_permissions'][13]['p_view'] == '1'){ ?>

  <li>
    <a><i class="fa fa-home"></i> Marks <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?php echo base_url();?>marks">Marks</a></li>
      <!-- <li><a href="<?php //echo base_url();?>marks/markdistribution">Marks Distribution</a></li> -->
    </ul>
  </li>

<?php } if($_SESSION['module_permissions'][14]['p_view'] == '1' || $_SESSION['module_permissions'][15]['p_view'] == '1' || $_SESSION['module_permissions'][16]['p_view'] == '1'){ ?>

  <li>
    <a><i class="fa fa-home"></i> Payroll <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <?php if($_SESSION['module_permissions'][14]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>salary_template">Salary Template</a></li>
      <?php } if($_SESSION['module_permissions'][15]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>manage_salary">Manage Salary</a></li>
      <?php } if($_SESSION['module_permissions'][16]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>make_payment">Make Payment</a></li>
      <?php } ?>
    </ul>
  </li>

<?php } if($_SESSION['module_permissions'][17]['p_view'] == '1' || $_SESSION['module_permissions'][18]['p_view'] == '1' || $_SESSION['module_permissions'][20]['p_view'] == '1' || $_SESSION['module_permissions'][21]['p_view'] == '1' || $_SESSION['module_permissions'][22]['p_view'] == '1' || $_SESSION['module_permissions'][23]['p_view'] == '1' ){ ?>

  <li>
    <a><i class="fa fa-home"></i> Reports <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <?php if($_SESSION['module_permissions'][17]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>reports/class">Class Report</a></li>
      <?php } if($_SESSION['module_permissions'][18]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>reports/student">Student Report</a></li>
      <?php } if($_SESSION['module_permissions'][20]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>reports/examschedule">ExamSchedule Report</a></li>
      <?php } if($_SESSION['module_permissions'][21]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>reports/idcardreport">ID Card Report</a></li>
      <?php } if($_SESSION['module_permissions'][22]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>reports/salaryreport">Salary Report</a></li>
      <?php } if($_SESSION['module_permissions'][23]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>reports/progresscard_report">Progress Card Report</a></li>
      <?php } ?>
    </ul>
  </li>

<?php } if($_SESSION['module_permissions'][24]['p_view'] == '1' || $_SESSION['module_permissions'][25]['p_view'] == '1' || $_SESSION['module_permissions'][26]['p_view'] == '1' || $_SESSION['module_permissions'][27]['p_view'] == '1'){ ?>

  <li>
    <a><i class="fa fa-home"></i> Administrator <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <?php if($_SESSION['module_permissions'][24]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>system_admin">System Admin</a></li>
      <?php } if($_SESSION['module_permissions'][25]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>system_admin/reset_password">Reset Password</a></li>
      <?php } if($_SESSION['module_permissions'][26]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>user_role">Role</a></li>
      <?php } if($_SESSION['module_permissions'][27]['p_view'] == '1'){ ?>
        <li><a href="<?php echo base_url();?>permission">Permission</a></li>
      <?php } ?>
    </ul>
  </li>
  <?php } ?>
</ul>