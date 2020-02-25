<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Student</title>

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
                    <h2>Student</h2>
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

                    <form id="edit_student_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>students/update" method="post" enctype="multipart/form-data">
                      <div class="container">
                        <div class="row">
                          <input type="hidden" id="student_id" name='student_id' class="form-control" value="<?php echo $encrypt_id; ?>">

                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Name *
                        <input type="text" id="preferred_name" name='preferred_name' class="form-control" value="<?php echo $student_info->preferred_name; ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Guardian
                        <select id="parent_id" name="parent_id" class="form-control">
                          <option value="">Choose..</option>
                          <?php 
                              if(!empty($all_parents)){
                            foreach($all_parents as $p_key=>$p_val){ ?>
                              <option value="<?php echo $p_val->id; ?>" <?php echo ($student_info->parent_id==$p_val->id)?'selected':''; ?> ><?php echo $p_val->parent_guardian_name; ?></option>
                            <?php } } ?>
                        </select>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Date Of Birth
                          <div class='input-group date' id='date_of_birth'>
                              <input type='text' class="form-control" name="date_of_birth" value="<?php echo date('d/m/Y',strtotime($student_info->date_of_birth)); ?>" />
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>

                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Gender
                          <select id="gender" class="form-control" name="gender">
                            <option value="">Choose..</option>
                            <option value="male" <?php echo ($student_info->gender=='male')?'selected':''; ?> >Male</option>
                            <option value="female" <?php echo ($student_info->gender=='female')?'selected':''; ?> >FeMale</option>
                          </select>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Blood Group
                          <select id="blood_group" name="blood_group" class="form-control">
                            <option value="">Select Blood Group</option>
                            <option value="a+" <?php echo ($student_info->blood_group=='a+')?'selected':''; ?> >A+</option>
                            <option value="a-" <?php echo ($student_info->blood_group=='a-')?'selected':''; ?> >A-</option>
                            <option value="b+" <?php echo ($student_info->blood_group=='b+')?'selected':''; ?> >B+</option>
                            <option value="b-" <?php echo ($student_info->blood_group=='b-')?'selected':''; ?> >B-</option>
                            <option value="o+" <?php echo ($student_info->blood_group=='o+')?'selected':''; ?> >O+</option>
                            <option value="o-" <?php echo ($student_info->blood_group=='o-')?'selected':''; ?> >O-</option>
                            <option value="ab+" <?php echo ($student_info->blood_group=='ab+')?'selected':''; ?> >AB+</option>
                            <option value="ab-" <?php echo ($student_info->blood_group=='ab-')?'selected':''; ?> >AB-</option>
                          </select>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Religion
                          <input id="religion" class="form-control" type="text" name="religion" value="<?php echo $student_info->religion; ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Email
                        <input id="email" class="form-control" type="text" name="email" value="<?php echo $student_info->email; ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Phone
                          <input id="phone" class="form-control" type="text" name="phone" value="<?php echo $student_info->phone; ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Address
                          <input id="address" class="form-control" type="text" name="address" value="<?php echo $student_info->address; ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          State
                          <input id="state" class="form-control" type="text" name="state" value="<?php echo $student_info->state; ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Country
                          <select id="country" name="country" class="form-control">
                            <option value="">Select Country</option>
                            <option value="india" <?php echo ($student_info->country=='india')?'selected':''; ?> >India</option>
                            <option value="usa" <?php echo ($student_info->country=='usa')?'selected':''; ?> >USA</option>
                          </select>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Class *
                          <select id="class_id" name="class_id" class="form-control">
                            <option value="">Select Class</option>
                            <?php 
                              if(!empty($all_classes)){
                            foreach($all_classes as $c_key=>$c_val){ ?>
                              <option value="<?php echo $c_val->id; ?>" <?php echo ($student_info->class_id==$c_val->id)?'selected':''; ?> ><?php echo $c_val->class; ?></option>
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
                              <option value="<?php echo $s_val->id; ?>" <?php echo ($student_info->section_id==$s_val->id)?'selected':''; ?> ><?php echo $s_val->section; ?></option>
                            <?php } } ?>
                          </select>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Group
                          <select id="group" name="group" class="form-control">
                            <option value="">Select Group</option>
                            <option value="science" <?php echo ($student_info->group=='science')?'selected':''; ?> >Science</option>
                            <option value="arts" <?php echo ($student_info->group=='arts')?'selected':''; ?> >Arts</option>
                            <option value="commerce" <?php echo ($student_info->group=='commerce')?'selected':''; ?> >Commerce</option>
                          </select>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Optional Subject
                          <select id="optional_subject_id" name="optional_subject_id" class="form-control">
                            <option value="">Select Optional Subject</option>
                            <?php 
                              if(!empty($class_optional_subjects)){
                            foreach($class_optional_subjects as $os_key=>$os_val){ ?>
                              <option value="<?php echo $os_val->id; ?>" <?php echo ($student_info->optional_subject_id==$os_val->id)?'selected':''; ?> ><?php echo $os_val->subject_name; ?></option>
                            <?php } } ?>
                          </select>
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                        Register NO *
                        <input id="register_no" class="form-control" type="text" name="register_no" value="<?php echo $student_info->register_no; ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Roll *
                          <input id="roll_no" class="form-control" type="text" name="roll_no" value="<?php echo $student_info->roll_no; ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Extra Curricular Activities
                          <input id="extra_curricular_activities" class="form-control" type="text" name="extra_curricular_activities" value="<?php echo $student_info->extra_curricular_activities; ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Remarks
                          <input id="remarks" class="form-control" type="text" name="remarks" value="<?php echo $student_info->remarks; ?>">
                      </div>
                      <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                          Username *
                          <input id="username" class="form-control" type="text" name="username" value="<?php echo $student_info->username; ?>">
                      </div>
                      <div>
                        <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
                            Photo

                            <input type="hidden" id="old_photo" name="old_photo" value="<?php echo $student_info->photo ?>">

                            <input id="new_photo" class="form-control" type="file" name="new_photo">
                            <?php if($student_info->photo!=''){ ?>
                              <img src="<?php echo base_url('assets/images/uploads/'.$student_info->photo); ?>" width="200" height="200">
                            <?php } ?>
                        </div>
                      </div>
                      <!-- <div class="form-group">
                        <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" class="form-control" type="password" name="password">
                        </div>
                      </div> -->

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

    <!-- jQuery Form Validator -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
	   
    <script>
      
      $('#date_of_birth').datetimepicker({
          format: 'DD/MM/YYYY',
          maxDate: 'now'
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
        
        $('#edit_student_form').validate({
          rules: {
            preferred_name: {
              required: true,
              minlength: 4,
              maxlength: 12
            },
            class_id: {
              required: true
            },
            section_id: {
              required: true
            },
            register_no: {
              required: true
            },
            roll_no: {
              required: true
            },
            username: {
              required: true
            }
          },
          messages: {
            preferred_name: {
              required: "The Name field is required"
            },
            class_id: {
              required: "The Class field is required"
            },
            section_id: {
              required: "The Section field is required"
            },
            register_no: {
              required: "The Register field is required"
            },
            roll_no: {
              required: "The Roll field is required"
            },
            username: {
              required: "The Username field is required"
            }
          },
          submitHandler: function (form) { // for demo
            // alert('valid form submitted');
            // return false;
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
            // Get Optional subjects
            $.ajax({
              url: "<?php echo base_url() ?>subject/ajax_get_class_subjects",
              type: "post",
              data: {'class_id':class_id, 'is_ajax':'1', 'is_optional_subjects':'1'},
              success: function(response){
                console.log("response",response);
                $('#optional_subject_id').html(response);
              }
            });
          }else{
            $('#section_id').html('<option value="0">Select Section</option>');
            $('#optional_subject_id').html('<option value="0">Select Optional Subject</option>');
          }
        });

      });
    </script>

  </body>
</html>
