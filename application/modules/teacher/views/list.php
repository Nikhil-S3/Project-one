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

      <?php $this->load->view('common/header.php'); ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Attendance</h2>
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

                  <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <!-- <h3>Student Attendance</h3> -->
                        <a href="<?php echo base_url();?>sattendance/add">
                          <button type="submit" class="btn btn-success">Add Student Attendance</button>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="pull-right">
                        <div class="input-group">
                          <form id="attendance_class_form" method="post">
                            <select class="form-control" style="width:200px;" id="class_id" name="class_id" onchange="getAttendance()">
                              <option value="">Select Class</option>
                              <?php 
                                if(!empty($all_classes)){
                                  foreach($all_classes as $c_key=>$c_val){ ?>
                                    <option value="<?php echo $c_val->id; ?>" <?php echo ($this->session->flashdata('class_id')==$c_val->id)?'selected':''; ?> ><?php echo $c_val->class; ?></option>
                              <?php } } ?>
                            </select>
                          </form>
                        </div>
                      </div>
                    </div>
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
                    

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active">
                          <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">All Students</a>
                        </li>
                        <?php if($this->session->flashdata('class_id')){ 
                                if(isset($class_sections) && count($class_sections)>0){
                                  $i=2;
                                  foreach ($class_sections as $cs_key => $cs_val) {
                                   
                          ?>
                        <li role="presentation" class="">
                          <a href="#tab_content<?php echo $i++;?>" role="tab" id="section<?php echo $cs_val->section; ?>-tab" data-toggle="tab" aria-expanded="false" onclick="getSectionWiseStudents(<?php echo $cs_val->id; ?>);">Section <?php echo $cs_val->section.' ( '.$cs_val->category.' )'; ?></a>
                        </li>
                      <?php } }  } ?>
                        <!-- <li role="presentation" class="">
                          <a href="#tab_content3" role="tab" id="sectionb-tab" data-toggle="tab" aria-expanded="false">Section B</a>
                        </li>
                        <li role="presentation" class="">
                          <a href="#tab_content4" role="tab" id="sectionc-tab" data-toggle="tab" aria-expanded="false">Section C</a>
                        </li> -->
                      
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
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php if(!empty($all_attendance)) { 
                                      $i = 1;
                                      foreach( $all_attendance as $sa_key => $sa_val ){
                                ?>
                              <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $sa_val->preferred_name; ?></td>
                                <td><?php echo $sa_val->roll_no; ?></td>
                                <td><?php echo $sa_val->email; ?></td>
                                <td>
                                    <a href="<?php echo base_url().'sattendance/view/'.$sa_val->student_id.'/'.$sa_val->section_id.'/all'; ?>">
                                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                              </tr>
                            <?php } } else{ ?>
                              <tr>
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

                          <!-- <table id="" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Email</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php /*if(!empty($section_attendance)) { 
                                      $i = 1;
                                      foreach( $section_attendance as $sa_key => $sa_val ){*/
                                ?>
                              <tr>
                                <td><?php // echo $i++; ?></td>
                                <td><?php // echo $sa_val->preferred_name; ?></td>
                                <td><?php // echo $sa_val->roll_no; ?></td>
                                <td><?php // echo $sa_val->email; ?></td>
                                <td>
                                    <a href="<?php // echo base_url().'sattendance/view/'.$sa_val->student_id; ?>">
                                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                              </tr>
                            <?php // } } else{ ?>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td style="display: none"></td>
                              </tr>
                            </tbody>
                          </table> -->

                        </div>

                      <?php } } ?>

                        <!-- <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                        </div> -->
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
    
    <?php $this->load->view('common/footer.php'); ?>

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
          url: "<?php echo base_url();?>sattendance/get_students_sectionwise",
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
        
      });
    </script>

  </body>
</html>
