<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Exam Schedule</title>

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

  <?php $this->load->view('common/header.php'); ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Exam Schedule</h2>
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

                    <form id="edit_examschedule_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>examschedule/update" method="post" enctype="multipart/form-data">
                      <div class="container">
                        <div class="row">
                          <input type="hidden" id="examschedule_id" name='examschedule_id' class="form-control" value="<?php echo $examschedule_info->id; ?>">

                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Exam Name *
                        <select id="exam_id" name="exam_id" class="form-control">
                          <option value="">Select Exam</option>
                          <?php 
                                if(!empty($all_exams)){
                              foreach($all_exams as $e_key=>$e_val){ ?>
                                <option value="<?php echo $e_val->id; ?>" <?php echo ($e_val->id==$examschedule_info->exam_id)?'selected':''; ?> ><?php echo $e_val->exam_name; ?></option>
                              <?php } } ?>
                        </select>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Class *
                        <select id="class_id" name="class_id" class="form-control">
                          <option value="">Select Class</option>
                          <?php 
                            if(!empty($all_classes)){
                          foreach($all_classes as $c_key=>$c_val){ ?>
                            <option value="<?php echo $c_val->id; ?>" <?php echo ($examschedule_info->class_id==$c_val->id)?'selected':''; ?> ><?php echo $c_val->class; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Section *
                          <select id="section_id" name="section_id" class="form-control">
                            <option value="">Select Section</option>
                            <?php 
                              if(!empty($all_sections)){
                            foreach($all_sections as $s_key=>$s_val){ ?>
                              <option value="<?php echo $s_val->id; ?>" <?php echo ($examschedule_info->section_id==$s_val->id)?'selected':''; ?> ><?php echo $s_val->section; ?></option>
                            <?php } } ?>
                          </select>
                      </div>
                      
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Subject *
                          <select id="subject_id" name="subject_id" class="form-control">
                            <option value="">Select Subject</option>
                            <?php 
                              if(!empty($class_subjects)){
                            foreach($class_subjects as $cs_key=>$cs_val){ ?>
                              <option value="<?php echo $cs_val->id; ?>" <?php echo ($examschedule_info->subject_id==$cs_val->id)?'selected':''; ?> ><?php echo $cs_val->subject_name; ?></option>
                            <?php } } ?>
                          </select>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Date *
                        <input id="e_schedule_date" class="form-control col-md-7 col-xs-12" type="text" name="e_schedule_date" value="<?php echo date('d/m/Y',strtotime($examschedule_info->e_schedule_date)); ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Time From *
                        <input id="time_from" class="form-control col-md-7 col-xs-12" type="text" name="time_from" value="<?php echo $examschedule_info->time_from; ?>" >
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Time To *
                        <input id="time_to" class="form-control col-md-7 col-xs-12" type="text" name="time_to" value="<?php echo $examschedule_info->time_to; ?>" >
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Room
                        <input id="room_no" class="form-control col-md-7 col-xs-12" type="text" name="room_no" value="<?php echo $examschedule_info->room_no; ?>" >
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <input type="submit" name="submit" value="Update" class="btn btn-success">
                        </div>
                      </div>
                      </div>
                      </div>
                    </form>
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
      
      $('#e_schedule_date').datetimepicker({
          format: 'DD/MM/YYYY'
      });
      $('#time_from').datetimepicker({
        format: 'hh:mm A'
      });
      $('#time_to').datetimepicker({
        format: 'hh:mm A'
      });
      /** After windod Load */
      $(window).bind("load", function() {
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 4000);
      });

      $(document).ready(function () {
        
        $('#edit_examschedule_form').validate({
          rules: {
            exam_id: {
              required: true
            },
            class_id: {
              required: true,
            },
            section_id: {
              required: true
            },
            subject_id: {
              required: true,
            },
            e_schedule_date: {
              required: true
            },
            time_from: {
              required: true
            },
            time_to: {
              required: true
            }
          },
          messages: {
            exam_id: {
              required: "The name is required."
            },
            class_id: {
              required: "The class is required."
            },
            section_id: {
              required: "The section is required."
            },
            subject_id: {
              required: "The subject is required.",
            },
            e_schedule_date: {
              required: "The date is required."
            },
            time_from: {
              required: "The time from is required."
            },
            time_to: {
              required: "The time to is required."
            }
          },
          submitHandler: function (form) { // for demo
            // alert('valid form submitted');
            // return false;
            form.submit();
          }
        });

        $(document).on('change', '#class_id', function(){
          var class_id = $(this).val();
          // console.log("class_id",class_id);
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
    </script>

  </body>
</html>
