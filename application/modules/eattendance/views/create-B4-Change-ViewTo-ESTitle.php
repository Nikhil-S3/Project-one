<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Exam Attendance</title>

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
                      <li><a href="<?php echo base_url();?>section">Section</a></li>
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
                  <li><a><i class="fa fa-home"></i> Exam <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>exams">Exam</a></li>
                      <li><a href="<?php echo base_url();?>examschedule">Exam Schedule</a></li>
                      <li><a href="<?php echo base_url();?>grade">Grade</a></li>
                      <li><a href="<?php echo base_url();?>eattendance">Exam Attendance</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-home"></i> Marks <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>marks">Marks</a></li>
                      <li><a href="<?php echo base_url();?>marks/markdistribution">Marks Distribution</a></li>
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
                <h3>Exam Attendance</h3>
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
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="attendance_status text-center" style="display: none"></div>

                  <div class="x_title">
                    <h2>Add Exam Attendance</h2>
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

                    <form id="exam_attendance_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>eattendance/add" method="post" enctype="multipart/form-data" >

                      <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                        Exam *
                        <select id="exam_id" name="exam_id" class="form-control">
                          <option value="">Select Exam</option>
                          <?php 
                            if(!empty($all_exams)){
                          foreach($all_exams as $e_key=>$e_val){ ?>
                            <option value="<?php echo $e_val->id; ?>" <?php echo ($this->session->flashdata('exam_id')==$e_val->id)?'selected':''; ?> ><?php echo $e_val->exam_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                        Class *
                        <select id="class_id" name="class_id" class="form-control">
                          <option value="">Select Class</option>
                          <?php 
                            if(!empty($all_classes)){
                          foreach($all_classes as $c_key=>$c_val){ ?>
                            <option value="<?php echo $c_val->id; ?>" <?php echo ($this->session->flashdata('class_id')==$c_val->id)?'selected':''; ?> ><?php echo $c_val->class; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                        Section *
                        <select id="section_id" name="section_id" class="form-control">
                          <option value="">Select Section</option>
                          <?php if(!empty($class_sections) && count($class_sections)>0){
                                foreach($class_sections as $cs_key=>$cs_val){ ?>
                          <option value="<?php echo $cs_val->id; ?>" <?php echo ($this->session->flashdata('section_id')==$cs_val->id)?'selected':''; ?>><?php echo $cs_val->section; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                        Subject *
                        <select id="subject_id" name="subject_id" class="form-control">
                          <option value="">Select Subject</option>
                          <?php if(!empty($class_subjects) && count($class_subjects)>0){
                                foreach($class_subjects as $sub_key=>$sub_val){ ?>
                          <option value="<?php echo $sub_val->id; ?>" <?php echo ($this->session->flashdata('subject_id')==$sub_val->id)?'selected':''; ?>><?php echo $sub_val->subject_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      
                      <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                          &nbsp;&nbsp;
                          <input type="submit" class="btn btn-success form-control" id="attendance_submit" name="attendance_submit" value="Attendance">
                      </div>
                    </form>

                      <?php if(isset($student_attendance_info) && count($student_attendance_info)>0) { ?>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Email</th>
                            <th>Roll</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $count=1; foreach( $student_attendance_info as $a_key => $a_val ){ ?>
                          <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $a_val->preferred_name; ?></td>
                            <td><?php echo $a_val->section; ?></td>
                            <td><?php echo $a_val->email; ?></td>
                            <td><?php echo $a_val->roll_no; ?></td>
                            <td>
                              <input type="checkbox" class="attendance btn btn-warning present" id="student-<?php echo $a_val->id; ?>" value="1" data-student_id="<?php echo $a_val->id; ?>" name="student-<?php echo $a_val->id; ?>" onchange="takeStudentExamAttendance('<?php echo $a_val->id; ?>');">
                              <label style="vertical-align:  middle;display: inline;" for="student-<?php echo $a_val->id; ?>">Present </label> 
                            </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                      <button type="button" id="save_attendance" class="btn btn-primary save_attendance">Submit</button>
                      <?php } ?>
                    
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

    <!-- jQuery Form Validator -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
	   
    <script>
      
      $('#attendance_date').datetimepicker({
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
      $(document).ready(function(){

        $('#exam_attendance_form').validate({
          rules: {
            exam_id: {
              required: true
            },
            class_id: {
              required: true
            },
            section_id: {
              required: true
            },
            subject_id: {
              required: true
            }
          },
          
          errorPlacement: function(){
            return false;  // suppresses error message text
          },
          submitHandler: function (form) {
            form.submit();
          }
        });

        $('#class_id').on('change', function(){
          var class_id = $(this).val();
          console.log("class_id",class_id);
          if(class_id!=''){
            // Get Sections
            $.ajax({
              url: "<?php echo base_url() ?>sections/ajax_get_class_sections",
              type: "post",
              data: {'class_id':class_id, 'is_ajax':'1'},
              success: function(response){
                console.log("response",response);
                $('#section_id').html(response);
              }
            });
            // Get subjects
            $.ajax({
              url: "<?php echo base_url() ?>subject/ajax_get_class_subjects",
              type: "post",
              data: {'class_id':class_id, 'is_ajax':'1'},
              success: function(response){
                console.log("response",response);
                $('#subject_id').html(response);
              }
            });
          }else{
            $('#section_id').html('<option value="0">Select Section</option>');
            $('#subject_id').html('<option value="0">Select Subject</option>');
          }
        });
        
      });
      function takeStudentExamAttendance(student_id){
        // var student_id = $(this).data('student_id');
        console.log('student_id ',student_id);
        var $check = $('#student-'+student_id);
        var present_val = $check.prop('checked') ? $check.val() : 0;
        console.log('checkbox value ',present_val);
        var exam_id = $('#exam_id').val();
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var subject_id = $('#subject_id').val();
        console.log('exam_id ',exam_id);
        console.log('class_id ',class_id);
        console.log('section_id ',section_id);
        console.log('subject_id ',subject_id);
        $.ajax({
          url:"<?php echo base_url(); ?>eattendance/ajax_save_exam_attendance",
          type:'post',
          data:{student_id:student_id,present:present_val,exam_id:exam_id,class_id:class_id,section_id:section_id,subject_id:subject_id},
          dataType:'json',
          success: function(response){
            console.log('examAttendance response : '+response);
            $('.attendance_status').html('<span class="'+response.class+'">'+response.message+'</span>').show().delay(5000).fadeOut();
          }
        });
      }
    </script>

  </body>
</html>
