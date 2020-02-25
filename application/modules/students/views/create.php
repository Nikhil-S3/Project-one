<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>School Management System</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
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
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
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
                <h3>Students</h3>
              </div>

              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>
            <div class="clearfix"></div>
            <!-- <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12"> -->
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Students</h2>
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
                    <?php echo validation_errors('<p style="color: red;">', '</p>'); 
                        if($this->session->flashdata('item')) {
                          $message = $this->session->flashdata('item');
                          $class = $message['class'];
                          $message = $message['message'];
                          echo "<div class='$class'>$message</div>";
                        }
                    ?>


                    <form id="add_student_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>students/save" method="post" enctype="multipart/form-data" >
                      <div class="container">
                        <div class="row">
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Name
                            <!-- <div class="form-group"> -->
                              <!-- <label class="control-label" for="preferred_name">Name <span class="required">*</span> 
                              </label>-->
                              <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input type="text" id="preferred_name" name='preferred_name' class="form-control" value="<?php echo set_value('preferred_name'); ?>" placeholder="Name">
                              <!-- </div> -->
                            <!-- </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Guardian
                            <!-- <div class="form-group"> -->
                             <!--  <label class="control-label" for="last-name">Guardian </label> -->
                              <!-- <div class="col-md-4 col-sm-4 col-xs-12"> -->
                                <!-- <input type="text" id="guardian" name="guardian" required="required" class="form-control col-md-7 col-xs-12"> -->
                                <select id="guardian" name="guardian" class="form-control">
                                  <option value="">Choose Guardian..</option>
                                  <option value="guardian1" <?php echo set_select('guardian', 'guardian1', TRUE); ?> >Guardian1</option>
                                  <option value="guardian2" <?php echo set_select('guardian', 'guardian2', TRUE); ?> >Guardian2</option>
                                  <option value="guardian3" <?php echo set_select('guardian', 'guardian3', TRUE); ?> >Guardian3</option>
                                </select>
                              <!-- </div> -->
                            <!-- </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Date Of Birth
                            <!-- <div class="form-group"> -->
                               <!-- <label class="control-label">Date Of Birth <span class="required">*</span> 
                              </label> -->
                              <!-- <div class="col-md-4 col-sm-4 col-xs-12"> -->
                                <!-- <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"> -->

                                <div class='input-group date' id='myDatepicker2'>
                                    <input type='text' class="form-control" name="date_of_birth" value="<?php echo set_value('date_of_birth'); ?>" />
                                    <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                              <!-- </div> -->
                            <!-- </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Gender
                            <!-- <div class="form-group">
                              <label class="control-label" for="last-name">Gender </label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <!-- <input type="text" id="guardian" name="guardian" required="required" class="form-control col-md-7 col-xs-12"> -->
                                <select id="gender" class="form-control" name="gender">
                                  <option value="">Choose..</option>
                                  <option value="male" <?php echo set_select('gender', 'male', TRUE); ?> >Male</option>
                                  <option value="female" <?php echo set_select('gender', 'female', TRUE); ?> >FeMale</option>
                                </select>
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Blood Group
                            <!-- <div class="form-group">
                              <label class="control-label" for="last-name">Blood Group</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <select id="blood_group" name="blood_group" class="form-control">
                                  <option value="">Select Blood Group</option>
                                  <option value="a+" <?php echo set_select('blood_group', 'a+', TRUE); ?> >A+</option>
                                  <option value="a-" <?php echo set_select('blood_group', 'a-', TRUE); ?> >A-</option>
                                  <option value="b+" <?php echo set_select('blood_group', 'b+', TRUE); ?> >B+</option>
                                  <option value="b-" <?php echo set_select('blood_group', 'b-', TRUE); ?> >B-</option>
                                  <option value="o+" <?php echo set_select('blood_group', 'o+', TRUE); ?> >O+</option>
                                  <option value="o-" <?php echo set_select('blood_group', 'o-', TRUE); ?> >O-</option>
                                  <option value="ab+" <?php echo set_select('blood_group', 'ab+', TRUE); ?> >AB+</option>
                                  <option value="ab-" <?php echo set_select('blood_group', 'ab-', TRUE); ?> >AB-</option>
                                </select>
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Religion
                            <!-- <div class="form-group">
                              <label for="religion" class="control-label col-md-3 col-sm-3 col-xs-12">Religion</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="religion" class="form-control col-md-7 col-xs-12" type="text" name="religion" value="<?php echo set_value('religion'); ?>">
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Email
                            <!-- <div class="form-group">
                              <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="email" class="form-control col-md-7 col-xs-12" type="text" name="email" value="<?php echo set_value('email'); ?>">
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Phone
                            <!-- <div class="form-group">
                              <label for="phone" class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="phone" class="form-control col-md-7 col-xs-12" type="text" name="phone" value="<?php echo set_value('phone'); ?>">
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Address
                            <!-- <div class="form-group">
                              <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="address" class="form-control col-md-7 col-xs-12" type="text" name="address" value="<?php echo set_value('address'); ?>">
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            State
                            <!-- <div class="form-group">
                              <label for="state" class="control-label col-md-3 col-sm-3 col-xs-12">State</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="state" class="form-control col-md-7 col-xs-12" type="text" name="state" value="<?php echo set_value('state'); ?>">
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Country
                            <!-- <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Country</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <select id="country" name="country" class="form-control">
                                  <option value="">Select Country</option>
                                  <option value="india" <?php echo  set_select('country', 'india', TRUE); ?>>India</option>
                                  <option value="usa"<?php echo  set_select('country', 'usa', TRUE); ?>>USA</option>
                                </select>
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Class
                            <!-- <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class">Class</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <select id="student_class" name="student_class" class="form-control">
                                  <option value="">Select Class</option>
                                  <option value="one" <?php echo  set_select('student_class', 'one', TRUE); ?>>One</option>
                                  <option value="two" <?php echo  set_select('student_class', 'two', TRUE); ?>>Two</option>
                                </select>
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Section
                            <!-- <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section">Section</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <select id="section" name="section" class="form-control">
                                  <option value="">Select Section</option>
                                  <option value="a" <?php echo  set_select('section', 'a', TRUE); ?>>A</option>
                                  <option value="b" <?php echo  set_select('section', 'b', TRUE); ?>>B</option>
                                </select>
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Group
                            <!-- <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Group</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <select id="group" name="group" class="form-control">
                                  <option value="">Select Group</option>
                                  <option value="science" <?php echo set_select('group', 'science', TRUE); ?>>Science</option>
                                  <option value="arts" <?php echo set_select('group', 'arts', TRUE); ?>>Arts</option>
                                  <option value="commerce" <?php echo set_select('group', 'commerce', TRUE); ?>>Commerce</option>
                                </select>
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Optional Subject
                            <!-- <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Optional Subject</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <select id="optional_subject" name="optional_subject" class="form-control">
                                  <option value="">Select Optional Subject</option>
                                  <option value="subject1" <?php echo set_select('optional_subject', 'subject1', TRUE); ?>>subject1</option>
                                  <option value="subject2" <?php echo set_select('optional_subject', 'subject2', TRUE); ?>>subject1</option>
                                </select>
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Register No
                            <!-- <div class="form-group">
                              <label for="register_no" class="control-label col-md-3 col-sm-3 col-xs-12">Register No</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="register_no" class="form-control col-md-7 col-xs-12" type="text" name="register_no" value="<?php echo set_value('register_no'); ?>">
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Roll
                            <!-- <div class="form-group">
                              <label for="roll_no" class="control-label col-md-3 col-sm-3 col-xs-12">Roll</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="roll_no" class="form-control col-md-7 col-xs-12" type="text" name="roll_no" value="<?php echo set_value('roll_no'); ?>">
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Photo
                            <!-- <div class="form-group">
                              <label for="photo" class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="photo" class="form-control col-md-7 col-xs-12" type="file" name="photo" value="<?php echo set_value('photo'); ?>">
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Extra Curricular Activities
                            <!-- <div class="form-group">
                              <label for="extra_curricular_activities" class="control-label col-md-3 col-sm-3 col-xs-12">Extra Curricular Activities</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="extra_curricular_activities" class="form-control col-md-7 col-xs-12" type="text" name="extra_curricular_activities" value="<?php echo set_value('extra_curricular_activities'); ?>">
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Remarks
                            <!-- <div class="form-group">
                              <label for="remarks" class="control-label col-md-3 col-sm-3 col-xs-12">Remarks</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="remarks" class="form-control col-md-7 col-xs-12" type="text" name="remarks" value="<?php echo set_value('remarks'); ?>">
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Username
                            <!-- <div class="form-group">
                              <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="username" class="form-control col-md-7 col-xs-12" type="text" name="username" value="<?php echo set_value('username'); ?>">
                              <!-- </div>
                            </div> -->
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Password
                            <!-- <div class="form-group">
                              <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                              <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <input id="password" class="form-control col-md-7 col-xs-12" type="password" name="password">
                              <!-- </div>
                            </div> -->
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="button">Cancel</button>
                              <button class="btn btn-primary" type="reset">Reset</button>
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
    <script src="<?php echo base_url(); ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url(); ?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url(); ?>assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url(); ?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url(); ?>assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
	   
    <script>
      
      $('#myDatepicker2').datetimepicker({
          format: 'DD/MM/YYYY'
      });
      /** After windod Load */
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
