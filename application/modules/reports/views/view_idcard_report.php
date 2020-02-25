<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>ID Card Report</title>

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

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/build/css/styles.css" rel="stylesheet">
  </head>

      <?php $this->load->view('common/header.php'); ?>
            
            <div>
              <form id="idcard_reports_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>reports/idcardreport" method="post" enctype="multipart/form-data" >

                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  ID Card For *
                  <select id="id_card_for" name="id_card_for" class="form-control">
                    <option value="">Please Select</option>
                    <option value="student" <?php echo ($this->session->flashdata('id_card_for')=='student')?'selected':''; ?> >Student</option>
                    <option value="teacher"<?php echo ($this->session->flashdata('id_card_for')=='teacher')?'selected':''; ?> >Teacher</option>
                  </select>
                </div>
                <div class='col-md-2 col-sm-12 col-xs-12 form-group teacher_id_hidden' <?php echo ($this->session->flashdata('teacher_id') || $this->session->flashdata('id_card_for')=='teacher')?'':'style="display: none"' ?> >
                  Teacher *
                  <select id="teacher_id" name="teacher_id" class="form-control">
                    <option value="">Please Select</option>
                      <?php 
                        if(!empty($all_teachers)){
                      foreach($all_teachers as $e_key=>$e_val){ ?>
                        <option value="<?php echo $e_val->id; ?>" <?php echo ($this->session->flashdata('teacher_id')==$e_val->id)?'selected':''; ?> ><?php echo $e_val->preferred_name; ?></option>
                      <?php } } ?>
                  </select>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12 form-group report_for_hidden_div" style="display: none"></div>

                <div class='col-md-2 col-sm-12 col-xs-12 form-group class_id_hidden' <?php echo ($this->session->flashdata('class_id'))?'':'style="display: none"' ?>>
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
                <div class='col-md-2 col-sm-12 col-xs-12 form-group section_id_hidden' <?php echo ($this->session->flashdata('section_id'))?'':'style="display: none"' ?> >
                  Section *
                  <select id="section_id" name="section_id" class="form-control">
                    <option value="">Select Section</option>

                    <?php if($this->session->flashdata('section_id')){ 
                        if(count($class_sections)>0){
                          $i=2;
                          foreach ($class_sections as $cs_key => $cs_val) {
                    ?>
                    <option value="<?php echo $cs_val->id; ?>" <?php echo ($this->session->flashdata('section_id')==$cs_val->id)?'selected':''; ?>><?php echo $cs_val->section; ?></option>
                    <?php } } } ?>
                  </select>
                </div>

                <div class='col-md-2 col-sm-12 col-xs-12 form-group student_id_hidden' <?php echo ($this->session->flashdata('student_id'))?'':'style="display: none"' ?>>
                  Student *
                  <select id="student_id" name="student_id" class="form-control">
                    <option value="">Please Select</option>
                    <?php 
                      if(!empty($all_students)){
                    foreach($all_students as $s_key=>$s_val){ ?>
                      <option value="<?php echo $s_val->id; ?>" <?php echo ($this->session->flashdata('student_id')==$s_val->id)?'selected':''; ?> ><?php echo $s_val->preferred_name; ?></option>
                    <?php } } ?>
                  </select>
                </div>
                
                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  &nbsp;&nbsp;
                    <input type="submit" class="btn btn-success form-control" id="get_report" name="get_report" value="Get Report">
                </div>
            </form>  
            </div>

            <?php if(isset($idcard_reports) && count($idcard_reports)>0) { 
                    
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Report For - <span class="report_for_text"></span></h2>
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

                    <input type="button" class="btn btn-primary" onclick="printDiv('id-card')" value="print" />

                    <div class="x_content">
                      
                      <?php foreach ($idcard_reports as $key => $value) {
                              $img_path = base_url("assets/images/user.png");
                              if($value->photo!=''){
                                $img_path = base_url("assets/images/uploads/".$value->photo);
                              } ?>
                              <div class='id-card' id='id-card'>;
                                <h3>School Name</h3>;
                                <img src="<?php echo $img_path?>" class='id-card-img'>
                                <div class='id-card-inside-content'>
                                  <p>
                                    <span><b>Name</b></span> : <?php echo $value->preferred_name; ?>
                                  </p>
                                  <?php if($report_for=='student'){ ?>
                                    <p>
                                      <span><b>Register No</b></span> : <?php echo $value->register_no; ?>
                                    </p>
                                    <p>
                                      <span><b>Class</b></span> : <?php echo $value->class; ?>
                                    </p>
                                    <p>
                                      <span><b>Section</b></span> : <?php echo $value->section; ?>
                                    </p>
                                    <p>
                                      <span><b>Roll</b></span> : <?php echo $value->roll_no?>
                                    </p>
                                    <p>
                                      <span><b>Blood Group</b></span> : <?php echo strtoupper($value->blood_group); ?>
                                    </p>;
                                  <?php }else{ 
                                    $new_date = date('d M Y', strtotime($value->joining_date)); ?>
                                    <p>
                                      <span><b>Designation</b></span> : <?php echo $value->designation ?> 
                                    </p>
                                    <p>
                                      <span><b>Joining Date</b></span> : <?php echo $new_date ?>
                                    </p>
                                    <p>
                                      <span><b>Phone No</b></span> : <?php echo $value->phone; ?>
                                    </p>
                                    <p>
                                      <span><b>Email</b></span> : <?php echo $value->email ?>
                                    </p>
                                  <?php } ?>
                                </div>
                            </div>
                           <?php  }
                      ?>
                    </div>
                  </div>
                </div>
                      
              </div>
              <?php } ?>
            
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
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- easy-pie-chart -->
    <script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

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
      
      /** After window Load */
      $(window).bind("load", function() {
        window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 4000);
      });

      $(document).ready(function(){

        $('#idcard_reports_form').validate({
          rules: {
            id_card_for: {
              required: true
            },
            class_id: {
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
                url: "<?php echo base_url(); ?>sections/ajax_get_class_sections",
                type: "post",
                data: {'class_id':class_id, 'is_ajax':'1'},
                success: function(response){
                  console.log("response",response);
                  $('#section_id').html(response);
                  $('.section_id_hidden').show();
                }
              });
            }else{
              $('#section_id').html('<option value="0">Select Section</option>');
              $('.section_id_hidden').hide();
            }
          });

          $(document).on('change', '#id_card_for', function(){
              var id_card_for = $(this).val();
              console.log("id_card_for",id_card_for);
              if(id_card_for!='' ){
                if(id_card_for=='student'){
                  $('.teacher_id_hidden').hide();
                  $(".class_id_hidden").show();
                  $(".section_id_hidden").show();
                  $(".student_id_hidden").show();
                }else{
                  $(".class_id_hidden").hide();
                  $(".section_id_hidden").hide();
                  $(".student_id_hidden").hide();
                  $('.teacher_id_hidden').show();
                }
              }else{
                $(".class_id_hidden").toggle();
                $(".section_id_hidden").toggle();
                $('.teacher_id_hidden').toggle();
                $('.student_id_hidden').toggle();
              }
          });
          <?php if(!empty($_POST['id_card_for'])){ ?>
            var reportForText = $("#id_card_for option:selected").text();
            console.log('reportForText',reportForText);
            $('.report_for_text').text(reportForText).css('color','#808b9c');
          <?php } ?>
      });

      function printDiv(divName) {
          /*var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;*/
          var mywindow = window.open('', 'PRINT', 'height=400,width=600');

          mywindow.document.write('<html><head><title>' + document.title  + '</title>');
          mywindow.document.write('</head><body >');
          mywindow.document.write('<h1>' + document.title  + '</h1>');
          mywindow.document.write(document.getElementById(divName).innerHTML);
          mywindow.document.write('</body></html>');

          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10*/

          /*mywindow.print();
          mywindow.close();*/

          return false;
      }

    </script>

  </body>
</html>
