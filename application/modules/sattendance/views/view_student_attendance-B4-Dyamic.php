<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Student Attendance</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/build/css/styles.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url();?>students"><i class="fa fa-home"></i> Students </a>
                  </li>
                  <li><a href="<?php echo base_url();?>teachers"><i class="fa fa-edit"></i> Teachers </a>
                  </li>
                  <li><a href="<?php echo base_url();?>parents"><i class="fa fa-edit"></i> Parents </a>
                  </li>
                  <li><a><i class="fa fa-home"></i> Academic <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>classes">Class</a></li>
                      <li><a href="<?php echo base_url();?>sections">Section</a></li>
                      <li><a href="<?php echo base_url();?>subject">Subject</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-home"></i> Attendance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>sattendance">Student Attendance</a></li>
                      <li><a href="<?php echo base_url();?>tattendance">Teacher Attendance</a></li>
                      <li><a href="<?php echo base_url();?>uattendance">User Attendance</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                  <h3>Student Attendance</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input Mask</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                    <div class="x_content">
                      <img class="img-circle" src="<?php echo base_url('assets/images/uploads/'.$attendance_student_data->photo); ?>" alt="" width="200" height="200">
                      <span class="text-center"><h5><?php echo $attendance_student_data->student_name; ?></h5></span>
                      <!-- <div class="card-body"> -->
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Register NO : <?php echo $attendance_student_data->register_no; ?></li>
                          <li class="list-group-item">Roll : <?php echo $attendance_student_data->roll_no; ?></li>
                          <li class="list-group-item">Class : <?php echo $attendance_student_data->class; ?></li>
                          <li class="list-group-item">Section : <?php echo $attendance_student_data->section; ?></li>
                        </ul>
                    </div>
                  </div>
                </div>
                      
                <div class="col-md-9 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Color Picker</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                          </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <br />
                      <?php if(isset($student_subjects) && count($student_subjects)>0) {
                              foreach($student_subjects as $sk => $sv){
                       ?>
                            <h4><?php echo $sv->subject_name ?></h4>

                            <table class="attendance_table table-bordered">
                              <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>6</th>
                                    <th>7</th>
                                    <th>8</th>
                                    <th>9</th>
                                    <th>10</th>
                                    <th>11</th>
                                    <th>12</th>
                                    <th>13</th>
                                    <th>14</th>
                                    <th>15</th>
                                    <th>16</th>
                                    <th>17</th>
                                    <th>18</th>
                                    <th>19</th>
                                    <th>20</th>
                                    <th>21</th>
                                    <th>22</th>
                                    <th>23</th>
                                    <th>24</th>
                                    <th>25</th>
                                    <th>26</th>
                                    <th>27</th>
                                    <th>28</th>
                                    <th>29</th>
                                    <th>30</th>
                                    <th>31</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>Jan</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-danger">A</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-info">W</td>
                                    <td class="ini-bg-danger">A</td>
                                    <td class="ini-bg-success">L</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-danger">A</td>
                                    <td class="ini-bg-danger">A</td>
                                    <td class="ini-bg-info">W</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-success">L</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-info">W</td>
                                    <td class="ini-bg-danger">A</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-danger">A</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-danger">A</td>
                                    <td class="ini-bg-success">P</td>
                                    <td class="ini-bg-info">W</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                  </tr>
                                  <tr>
                                    <td>Feb</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-info">W</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-primary">H</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-info">W</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                  </tr>
                                  <tr>
                                    <td>Mar</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-info">W</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-info">W</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-info">W</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td>
                                    <td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td></tr><tr><td>Apr</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td></tr><tr><td>May</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td></tr><tr><td>Jun</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-primary">H</td><td class="ini-bg-secondary">N/A</td></tr><tr><td>Jul</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td></tr><tr><td>Aug</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td></tr><tr><td>Sep</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td></tr><tr><td>Oct</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td></tr><tr><td>Nov</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td></tr><tr><td>Dec</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-primary">H</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-info">W</td><td class="ini-bg-secondary">N/A</td><td class="ini-bg-secondary">N/A</td></tr>
                                </tbody>
                          </table>
                  <?php } } ?>
                  </div>
                </div>
              </div>

                    <!-- </div> -->
                          <!-- row -->
                  </div>
                </div>
            </div>
          </div>
        </div>
      <!-- </div> -->
        
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- easy-pie-chart -->
    <script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
	   
    <script>
      
      /** After window Load */
      $(window).bind("load", function() {
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 4000);
      });

    </script>

  </body>
</html>
