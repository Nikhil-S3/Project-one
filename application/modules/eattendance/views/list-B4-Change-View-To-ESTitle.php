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

    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- jQuery Validator -->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

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
                  <!-- <h3>Student Attendance</h3> -->
                  <a href="<?php echo base_url();?>eattendance/add">
                    <button type="submit" class="btn btn-success">Add Exam Attendance</button>
                  </a>
              </div>
            
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Exam Attendance</h2>
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
                    <?php echo validation_errors('<p style="color: red;">', '</p>'); 
                        if($this->session->flashdata('item')) {
                          $message = $this->session->flashdata('item');
                          $class = $message['class'];
                          $message = $message['message'];
                          echo "<div class='$class'>$message</div>";
                        }
                    ?>
                    
                    <form id="exam_attendance_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>eattendance/index" method="post" enctype="multipart/form-data" >

                        <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                          Exam Name *
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
                          Subject *
                          <select id="subject_id" name="subject_id" class="form-control">
                            <option value="">Select Subject</option>

                            <?php if($this->session->flashdata('subject_id')){ 
                                if(count($class_subjects)>0){
                                  $i=2;
                                  foreach ($class_subjects as $cs_key => $cs_val) {
                            ?>
                            <option value="<?php echo $cs_val->id; ?>" <?php echo ($this->session->flashdata('subject_id')==$cs_val->id)?'selected':''; ?>><?php echo $cs_val->subject_name; ?></option>
                            <?php } } } ?>
                          </select>
                        </div>
                        
                        <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                          &nbsp;&nbsp;
                            <input type="submit" class="btn btn-success form-control" id="attendance_submit" name="attendance_submit" value="View Attendance">
                        </div>
                    </form>

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active">
                          <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">All Students</a>
                        </li>
                        <?php if($this->session->flashdata('class_id')){ 
                                if(count($class_sections)>0){
                                  $i=2;
                                  foreach ($class_sections as $cs_key => $cs_val) {
                                   
                          ?>
                        <li role="presentation" class="">
                          <a href="#tab_content<?php echo $i++;?>" role="tab" id="section<?php echo $cs_val->section; ?>-tab" data-toggle="tab" aria-expanded="false" onclick="getSectionWiseStudents(<?php echo $cs_val->id; ?>);">Section <?php echo $cs_val->section.' ( '.$cs_val->category.' )'; ?></a>
                        </li>
                      <?php } }  } ?>
                        
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          
                          <table id="datatable-fixed-header" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Email</th>
                                <th>Status</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php if(!empty($all_attendance)) { 
                                      $i = 1;
                                      foreach( $all_attendance as $sa_key => $sa_val ){
                                        if($sa_val->present_status=='Present')
                                          $class = 'btn btn-success btn-xs';
                                        else if($sa_val->present_status=='Absent')
                                          $class = 'btn btn-danger btn-xs';
                                        else
                                          $class = '';
                                                    
                                ?>
                              <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $sa_val->preferred_name; ?></td>
                                <td><?php echo $sa_val->roll_no; ?></td>
                                <td><?php echo $sa_val->email; ?></td>
                                <td>
                                    <?php echo "<button class='$class'>".$sa_val->present_status."</button>"; ?>
                                </td>
                              </tr>
                            <?php } } else{ ?>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <!-- hidden column 8 for proper DataTable applying -->
                                <td style="display: none"></td>
                              </tr>
                            <?php } ?>
                            </tbody>
                          </table>

                        </div>

                        <?php 
                            if(isset($class_sections) && count($class_sections)>0){
                              $i=2;
                              foreach ($class_sections as $cs_key => $cs_val) {
                         ?>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content<?php echo $i++; ?>" aria-labelledby="profile-tab">
                          
                          <div id="sectionwise_attendance<?php echo $cs_val->id; ?>"></div>

                        </div>

                      <?php } } ?>

                      </div>
                    </div>

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
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- jQuery Form Validator -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
	   
    <script>
      
      /** After windod Load */
      $(window).bind("load", function() {
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 4000);
      });

      function getAttendance(){
        document.getElementById("attendance_class_form").submit();
      }
      function getSectionWiseStudents(section_id){
        console.log('section_id'+section_id);
        $.ajax({
          url: "<?php echo base_url();?>eattendance/get_students_sectionwise",
          type: "post",
          dataType: 'html',
          data: {section_id:section_id},
          success: function(response){
            // console.log('response',response);
            $('#sectionwise_attendance'+section_id).html(response);
          }
        });
      }
      $(document).ready(function () {
        $('#class_id').on('change', function(){
          var class_id = $(this).val();
          console.log("class_id",class_id);
          if(class_id!=''){
            // Get subjects
            $.ajax({
              url: "<?php echo base_url(); ?>subject/ajax_get_class_subjects",
              type: "post",
              data: {'class_id':class_id, 'is_ajax':'1'},
              success: function(response){
                console.log("response",response);
                $('#subject_id').html(response);
              }
            });
          }else{
            $('#subject_id').html('<option value="0">Select Subject</option>');
          }
        });
      });
    </script>

  </body>
</html>
