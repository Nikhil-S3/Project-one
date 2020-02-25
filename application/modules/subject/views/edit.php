<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Subject</title>

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
                    <h2>Subject</h2>
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
                        // echo "<pre>";print_r($subject_info);echo "</pre>";exit;
                    ?>

                    <form id="subject_edit_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>subject/update" method="post" enctype="multipart/form-data">
                      <div class="container">
                        <div class="row">

                          <input type="hidden" id="subject_id" name='id' class="form-control col-md-7 col-xs-12" value="<?php echo @$encrypt_id; ?>">

                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Class Name *
                            <select id="class_id" class="form-control" name="class_id">
                              <option value="">Choose..</option>
                              <?php 
                                if(!empty($all_classes)){
                              foreach($all_classes as $c_key=>$c_val){ ?>
                                <option value="<?php echo $c_val->id; ?>" <?php echo ($subject_info->class_id == $c_val->id)?'selected':''; ?> ><?php echo $c_val->class; ?></option>
                              <?php } } ?>
                            </select>
                          </div>

                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Teacher Name
                              <select id="teacher_id" class="form-control" name="teacher_id">
                                <option value="">Choose..</option>
                                <?php 
                                  if(!empty($all_teachers)){
                                foreach($all_teachers as $t_key=>$t_val){ ?>
                                  <option value="<?php echo $t_val->id; ?>" <?php echo ($subject_info->teacher_id==$t_val->id)?'selected':''; ?> ><?php echo $t_val->preferred_name; ?></option>
                                <?php } } ?>
                                
                              </select>
                          </div>
                          
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Type *
                              <select id="subject_type" class="form-control" name="subject_type">
                                <option value="">Choose..</option>
                                <option value="0" <?php echo ($subject_info->subject_type=='0')?'selected':''; ?>>Optional</option>
                                <option value="1" <?php echo ($subject_info->subject_type=='1')?'selected':''; ?> >Mandatory</option>
                              </select>
                          </div>

                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Pass Mark *
                              <input type="text" id="pass_mark" name="pass_mark" class="form-control" value="<?php echo $subject_info->pass_mark; ?>">
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Final Mark *
                              <input type="text" id="final_mark" name="final_mark" class="form-control" value="<?php echo $subject_info->final_mark; ?>">
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Subject Name *
                              <input type="text" id="subject_name" name="subject_name" class="form-control" value="<?php echo $subject_info->subject_name; ?>">
                          </div>
                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Subject Author
                              <input type="text" id="subject_author" name="subject_author" class="form-control" value="<?php echo $subject_info->subject_author; ?>">
                          </div>

                          <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Subject Code *
                              <input type="text" id="subject_code" name="subject_code" class="form-control" value="<?php echo $subject_info->subject_code; ?>">
                          </div>
                          
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button class="btn btn-primary" type="button">Cancel</button>
                              <button type="submit" class="btn btn-success">Update</button>
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

      $(document).ready(function () {
        
        $('#subject_edit_form').validate({
          rules: {
            class_id: {
              required: true
            },
            teacher_id: {
              required: true
            },
            subject_type: {
              required: true,
            },
            pass_mark: {
              required: true,
              number: true
            },
            final_mark: {
              required: true,
              number: true
            },
            subject_name: {
              required: true
            },
            subject_code: {
              required: true
            }
          },
          messages: {
            class_id: {
              required: "The Class Name field is required"
            },
            teacher_id: {
              required: "The Teacher Name field is required"
            },
            subject_type: {
              required: "The Type field is required",
            },
            pass_mark: {
              required: "The Pass Mmark field is required.",
              number: "The Pass Mark field must contain only numbers."
            },
            final_mark: {
              required: "The Final Mark field is required",
              number: "The Final Mark field must contain only numbers."
            },
            subject_name: {
              required: "The Subject Name field is required."
            },
            subject_code: {
              required: "The Subject Code field is required."
            }
          },
          submitHandler: function (form) { // for demo
            // alert('valid form submitted');
            // return false;
            form.submit();
          }
        });
      });
    </script>

  </body>
</html>
