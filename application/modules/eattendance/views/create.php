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

      <?php $this->load->view('common/header.php'); ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="attendance_status text-center" style="display: none"></div>

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
                        Exam schedule title *
                        <select id="examschedule_id" name="examschedule_id" class="form-control" id="examschedule_id">
                          <option value="">Select Exam</option>
                          <?php 
                            if(!empty($all_examschedule)){
                          foreach($all_examschedule as $e_key=>$e_val){ ?>
                            <option value="<?php echo $e_val->id; ?>" <?php echo ($this->session->flashdata('examschedule_id')==$e_val->id)?'selected':''; ?> ><?php echo $e_val->exam_schedule_title; ?></option>
                          <?php } } ?>
                        </select>
                      </div>

                      <input type="hidden" name="exam_id" class="exam_id" value="<?php echo ($this->session->flashdata('exam_id'))?$this->session->flashdata('exam_id'):''; ?>" >
                      <input type="hidden" name="class_id" class="class_id" value="<?php echo ($this->session->flashdata('class_id'))?$this->session->flashdata('class_id'):''; ?>" >
                      <input type="hidden" name="section_id" class="section_id" value="<?php echo ($this->session->flashdata('section_id'))?$this->session->flashdata('section_id'):''; ?>" >
                      <input type="hidden" name="subject_id" class="subject_id" value="<?php echo ($this->session->flashdata('subject_id'))?$this->session->flashdata('subject_id'):''; ?>" >
                      <input type="hidden" name="attendance_taken" class="attendance_taken" value="<?php echo ($this->session->flashdata('attendance_taken'))?$this->session->flashdata('attendance_taken'):''; ?>" >
                      <div class="col-md-2 col-sm-12 col-xs-12 form-group examschedule_info"></div>
                      
                      
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
                          <?php $count=1; foreach( $student_attendance_info as $a_key => $a_val ){ 
                              $checked = "";
                              if(isset($student_examattendance_info) && count($student_examattendance_info)>0) {
                                foreach( $student_examattendance_info as $ea_key => $ea_val ){
                                  if($ea_val->student_id == $a_val->id){
                                    $checked = ($ea_val->present_status)?"checked":"";
                                  }
                                }
                                // echo $checked;
                              }
                            ?>
                          <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $a_val->preferred_name; ?></td>
                            <td><?php echo $a_val->section; ?></td>
                            <td><?php echo $a_val->email; ?></td>
                            <td><?php echo $a_val->roll_no; ?></td>
                            <td>
                              <input type="checkbox" class="attendance btn btn-warning present" id="student-<?php echo $a_val->id; ?>" value="1" data-student_id="<?php echo $a_val->id; ?>" name="student-<?php echo $a_val->id; ?>" onchange="takeStudentExamAttendance('<?php echo $a_val->id; ?>');" <?php echo $checked; ?> >
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
    
    <?php $this->load->view('common/footer.php'); ?>

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
            examschedule_id: {
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

        $('#examschedule_id').on('change', function(){
            var es_id = $(this).val();
            console.log("Exam Schedule ID ",es_id);
            $.ajax({
              url: "<?php echo base_url() ?>examschedule/ajax_get_examschedule_data",
              type: "post",
              dataType: "json",
              data: {es_id:es_id},
              success: function(response){
                console.log("response ",response);
                $('.examschedule_info').html(response.exam_name+' - '+response.class+' - '+response.section+' - '+response.subject_name);
                $('input:hidden.exam_id').prop('value',response.exam_id);
                $('input:hidden.class_id').prop('value',response.class_id);
                $('input:hidden.section_id').prop('value',response.section_id);
                $('input:hidden.subject_id').prop('value',response.subject_id);
                $('input:hidden.attendance_taken').prop('value',response.attendance_taken);
              }
            });
        });
        
      });
      function takeStudentExamAttendance(student_id){
        // var student_id = $(this).data('student_id');
        console.log('student_id ',student_id);
        var $check = $('#student-'+student_id);
        var present_val = $check.prop('checked') ? $check.val() : 0;
        console.log('checkbox value ',present_val);
        var exam_id = $('.exam_id').val();
        var class_id = $('.class_id').val();
        var section_id = $('.section_id').val();
        var subject_id = $('.subject_id').val();
        var examschedule_id = $('#examschedule_id').val();
        var attendance_taken = $('.attendance_taken').val();
        console.log('exam_id ',exam_id);
        console.log('class_id ',class_id);
        console.log('section_id ',section_id);
        console.log('subject_id ',subject_id);
        console.log('examschedule_id ',examschedule_id);
        console.log('attendance_taken ',attendance_taken);
        $.ajax({
          url:"<?php echo base_url(); ?>eattendance/ajax_save_exam_attendance",
          type:'post',
          data:{student_id:student_id,present_status:present_val,exam_id:exam_id,class_id:class_id,section_id:section_id,subject_id:subject_id,exam_schedule_id:examschedule_id,attendance_taken:attendance_taken},
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
