<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Progress Card Report</title>

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
              <form id="progresscard_reports_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>reports/progresscard_report" method="post" enctype="multipart/form-data" >

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

                <div class='col-md-2 col-sm-12 col-xs-12 form-group' id="student_id_hidden" <?php echo ($this->session->flashdata('student_id'))?'':'style="display: none"' ?> >
                  Student *
                  <select id="student_id" name="student_id" class="form-control">
                    <option value="">Please Select</option>
                  </select>
                </div>
                
                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  &nbsp;&nbsp;
                    <input type="submit" class="btn btn-success form-control" id="get_report" name="get_report" value="Get Report">
                </div>
            </form>  
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Report For - <?php echo ucwords(preg_replace('/[^A-Za-z0-9\-]/', '', $this->session->flashdata('report_for'))); ?></h2>
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

                    <input type="button" class="btn btn-primary" onclick="printDiv('student-report')" value="print" />

                        <div class='student-reporttt'>
                    <div class="x_content">
                      
                        <h4></h4>
                          <table class="table-bordered">
                          <tr>
                          <td>
                          <?php
                          if(isset($student_exams) || count($student_exams)>0){
                            foreach ($student_exams as $e_key => $e_val) {
                              foreach($student_marks as $mk=>$mv){ 
                                if($mk==$e_val->exam_id) {
                                    // echo '<h4>'.$e_val->exam_name.'</h4>'; ?>
                                    <table class="table-bordered">
                                      <thead>
                                          <tr>
                                            <th>Subject</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach($mv as $key=>$val){ ?>
                                          <tr>
                                              <td><?php echo $val->subject_name; ?></td>
                                          </tr>
                                      <?php } ?> 
                                      </tbody>
                                    </table>
                                  <?php } } } ?>
                            </td>
                            <td>
                                  <?php 
                                  foreach ($student_exams as $e_key => $e_val) {
                              foreach($student_marks as $mk=>$mv){ 
                                if($mk==$e_val->exam_id) {
                                     ?>
                                    <table class="table-bordered">
                                      <thead>
                                          <tr>
                                            <th><?php echo $e_val->exam_name; ?></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      <?php foreach($mv as $key=>$val){ ?>
                                          <tr>
                                              <td><?php echo $val->marks; ?></td>
                                          </tr>
                                      <?php } ?> 
                                      </tbody>
                                    </table>
                                  <?php } } } ?> 
                            </td>
                            <td>
                            <?php foreach ($student_exams as $e_key => $e_val) {
                              foreach($student_marks as $mk=>$mv){ 
                                if($mk==$e_val->exam_id) { ?>
                                      <table class="table-bordered">
                                        <thead>
                                            <tr>
                                              <th><?php echo 'Grade'; ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($mv as $key=>$val){ ?>
                                            <tr>
                                                <?php 
                                                if(count($subject_grades[$val->id])>0){
                                                      echo '<td>'.$subject_grades[$val->id]->grade_name.'</td>'; ?>
                                              <?php } ?> 
                                            </tr>
                                          <?php } ?> 
                                        </tbody>
                                      </table>
                                    <?php } } } ?>
                              </td>
                            <td>
                            <?php foreach ($student_exams as $e_key => $e_val) {
                              foreach($student_marks as $mk=>$mv){ 
                                if($mk==$e_val->exam_id) { ?>
                                      <table class="table-bordered">
                                        <thead>
                                            <tr>
                                              <th><?php echo 'Point'; ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($mv as $key=>$val){ ?>
                                            <tr>
                                                <?php 
                                                if(count($subject_grades[$val->id])>0){
                                                      echo '<td>'.$subject_grades[$val->id]->grade_point.'</td>'; ?>
                                                <?php } ?> 
                                            </tr>
                                        <?php } ?> 
                                        </tbody>
                                      </table>
                                    <?php } } } ?>
                                        
                                  
                              <?php } ?>
                              </td>
                            </tr>
                          </table>
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
          if($("#date_of_birth").is(":visible")){
            $('#date_of_birth').datetimepicker({
                format: 'DD/MM/YYYY',
                maxDate: 'now'
            });
          }

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

          $('#section_id').on('change', function(){
              var section_id = $(this).val();
              var class_id = $("#class_id").val();
              console.log("section_id",section_id);
              if(section_id!='' && class_id!=""){
                $.ajax({
                  url: "<?php echo base_url() ?>reports/ajax_get_students_class_sectionwise",
                  type:'post',
                  data: {class_id:class_id, section_id:section_id},
                  success: function(response){
                    console.log('response',response);
                    if(response!=''){
                      $('#student_id').html(response);
                      $('#student_id_hidden').show();
                    }
                  }
                });
              }else{
                $('#student_id').html('');
                $('#student_id_hidden').hide();
              }
          });
      });

      function printDiv(divName) {
        var printContents = document.getElementById(divName);
        var originalContents = document.body.innerHTML;

        var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding:0.5em;' +
        '}' +
        '</style>';
        htmlToPrint += printContents.innerHTML;

        // document.body.innerHTML = printContents;
        document.body.innerHTML = htmlToPrint;

        window.print();

        document.body.innerHTML = originalContents;
      }
    </script>

  </body>
</html>
