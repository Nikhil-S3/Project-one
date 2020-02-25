<!-- <h3> General</h3>-->
<ul class="nav side-menu">
  <?php if($this->session->userdata('logged_in')['role_id'] == '1' || $this->session->userdata('logged_in')['role_id'] == '2'){ ?>
  <li>
    <a href="<?php echo base_url();?>students"><i class="fa fa-users"></i> Students </a>
  </li>
  <?php } if($this->session->userdata('logged_in')['role_id'] == '1'){ ?>
  <li>
    <a href="<?php echo base_url();?>teachers"><i class="fa fa-users"></i> Teachers </a>
  </li>
  <?php } if($this->session->userdata('logged_in')['role_id'] == '2'){ ?>
    <li>
      <a href="<?php echo base_url();?>teacher"><i class="fa fa-users"></i> Teacher </a>
    </li>
  <?php } ?>
  <li>
    <a href="<?php echo base_url();?>parents"><i class="fa fa-users"></i> Parents </a>
  </li>
  <?php if($this->session->userdata('logged_in')['role_id'] == '1'){ ?>
  <li>
    <a href="<?php echo base_url();?>users"><i class="fa fa-users"></i> Users </a>
  </li>
  <?php } if($this->session->userdata('logged_in')['role_id'] == '1'){ ?>
  <li>
    <a><i class="fa fa-home"></i> Academic <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?php echo base_url();?>classes">Class</a></li>
      <li><a href="<?php echo base_url();?>sections">Section</a></li>
      <li><a href="<?php echo base_url();?>subject">Subject</a></li>
    </ul>
  </li>
  <li>
    <a><i class="fa fa-home"></i> Attendance <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?php echo base_url();?>sattendance">Student Attendance</a></li>
      <li><a href="<?php echo base_url();?>tattendance">Teacher Attendance</a></li>
      <li><a href="<?php echo base_url();?>uattendance">User Attendance</a></li>
    </ul>
  </li>
  <li>
    <a><i class="fa fa-home"></i> Exam <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?php echo base_url();?>exams">Exam</a></li>
      <li><a href="<?php echo base_url();?>examschedule">Exam Schedule</a></li>
      <li><a href="<?php echo base_url();?>grade">Grade</a></li>
      <li><a href="<?php echo base_url();?>eattendance">Exam Attendance</a></li>
    </ul>
  </li>
  <li>
    <a><i class="fa fa-home"></i> Marks <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?php echo base_url();?>marks">Marks</a></li>
      <li><a href="<?php echo base_url();?>marks/markdistribution">Marks Distribution</a></li>
    </ul>
  </li>
  <li>
    <a><i class="fa fa-home"></i> Payroll <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?php echo base_url();?>salary_template">Salary Template</a></li>
      <li><a href="<?php echo base_url();?>manage_salary">Manage Salary</a></li>
      <li><a href="<?php echo base_url();?>make_payment">Make Payment</a></li>
    </ul>
  </li>
  <li>
    <a><i class="fa fa-home"></i> Reports <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?php echo base_url();?>reports/class">Class Report</a></li>
      <li><a href="<?php echo base_url();?>reports/student">Student Report</a></li>
      <li><a href="<?php echo base_url();?>reports/examschedule">ExamSchedule</a></li>
      <li><a href="<?php echo base_url();?>reports/idcardreport">ID Card Report</a></li>
      <li><a href="<?php echo base_url();?>reports/salaryreport">Salary Report</a></li>
      <li><a href="<?php echo base_url();?>reports/progresscard_report">Progress Card Report</a></li>
    </ul>
  </li>
  <li>
    <a><i class="fa fa-home"></i> Administrator <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?php echo base_url();?>system_admin">System Admin</a></li>
      <li><a href="<?php echo base_url();?>system_admin/reset_password">Reset Password</a></li>
      <li><a href="<?php echo base_url();?>user_role">Role</a></li>
      <li><a href="<?php echo base_url();?>permission">Permission</a></li>
    </ul>
  </li>
  <?php } ?>
</ul>