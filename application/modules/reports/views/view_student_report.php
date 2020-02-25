<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/ico" />

    <title>Student Report</title>

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
              <form id="student_reports_form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url();?>reports/student" method="post" enctype="multipart/form-data" >

                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  Report For *
                  <select id="report_for" name="report_for" class="form-control">
                    <option value="">Please Select</option>
                      <option value="blood_group" <?php echo ($this->session->flashdata('report_for')=='blood_group')?'selected':''; ?> >Blood Group</option>
                      <option value="country" <?php echo ($this->session->flashdata('report_for')=='country')?'selected':''; ?> >Country</option>
                      <option value="gender" <?php echo ($this->session->flashdata('report_for')=='gender')?'selected':''; ?> >Gender</option>
                      <option value="birthday" <?php echo ($this->session->flashdata('report_for')=='birthday')?'selected':''; ?> >Birthday</option>
                  </select>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12 form-group report_for_hidden_div" style="display: none"></div>

                <?php if($this->session->flashdata('report_for') && $this->session->flashdata('report_for')=='blood_group') { ?>
                    <div class="col-md-2 col-sm-12 col-xs-12 form-group report_for_show_div">
                        Blood Group * 
                        <select id="report_for_dynamic" class="form-control" name="report_for_dynamic">
                          <option value="">Please Select</option>
                          <option value="a+" <?php echo ($this->session->flashdata('report_for_dynamic')=='a+')?'selected':''; ?> >A+</option>
                          <option value="b+" <?php echo ($this->session->flashdata('report_for_dynamic')=='b+')?'selected':''; ?> >B+</option>
                          <option value="ab+" <?php echo ($this->session->flashdata('report_for_dynamic')=='ab+')?'selected':''; ?> >AB+</option>
                          <option value="ab-" <?php echo ($this->session->flashdata('report_for_dynamic')=='ab-')?'selected':''; ?> >AB-</option>
                          <option value="b-" <?php echo ($this->session->flashdata('report_for_dynamic')=='b-')?'selected':''; ?> >B-</option>
                          <option value="o+" <?php echo ($this->session->flashdata('report_for_dynamic')=='o+')?'selected':''; ?> >O+</option>
                          <option value="o-" <?php echo ($this->session->flashdata('report_for_dynamic')=='o-')?'selected':''; ?> >O-</option>
                        </select>
                    </div>
                <?php } if($this->session->flashdata('report_for') && $this->session->flashdata('report_for')=='country') { ?>
                    <div class="col-md-2 col-sm-12 col-xs-12 form-group report_for_show_div">
                        Country * 
                        <select id="report_for_dynamic" class="form-control" name="report_for_dynamic">
                          <option value="">Please Select</option>
                          <option value="india" <?php echo ($this->session->flashdata('report_for_dynamic')=='india')?'selected':''; ?> >India</option>
                          <option value="us" <?php echo ($this->session->flashdata('report_for_dynamic')=='us')?'selected':''; ?> >US</option>
                        </select>
                    </div>
                <?php } if($this->session->flashdata('report_for') && $this->session->flashdata('report_for')=='gender') { ?>
                    <div class="col-md-2 col-sm-12 col-xs-12 form-group report_for_show_div">
                        Gender * 
                        <select id="report_for_dynamic" class="form-control" name="report_for_dynamic">
                          <option value="">Please Select</option>
                          <option value="male" <?php echo ($this->session->flashdata('report_for_dynamic')=='male')?'selected':''; ?> >Male</option>
                          <option value="female" <?php echo ($this->session->flashdata('report_for_dynamic')=='female')?'selected':''; ?> >FeMale</option>
                        </select>
                    </div>
                <?php } if($this->session->flashdata('report_for') && $this->session->flashdata('report_for')=='birthday') { ?>
                    <div class="col-md-2 col-sm-12 col-xs-12 form-group report_for_show_div">
                        Birthday * 
                        <input class="form-control" id="date_of_birth" name="report_for_dynamic" value="<?php echo $this->session->flashdata('report_for_dynamic'); ?>">
                    </div>
                <?php } ?>

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
                
                <div class='col-md-2 col-sm-12 col-xs-12 form-group'>
                  &nbsp;&nbsp;
                    <input type="submit" class="btn btn-success form-control" id="get_report" name="get_report" value="Get Report">
                </div>
            </form>  
            </div>

            <?php if(isset($student_reports) && count($student_reports)>0) { 
                  $report_for_dynamic = $this->session->flashdata('report_for_dynamic');
                  if($this->session->flashdata('report_for') == 'birthday'){
                    $converted_date = str_replace('/', '-', $report_for_dynamic);
                    $report_for_dynamic = date('d M Y',strtotime($converted_date));
                  }
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Report For - <?php echo ucwords(preg_replace('/[^A-Za-z0-9\-]/', '', $this->session->flashdata('report_for'))). ' ( '.ucwords($report_for_dynamic).' )'; ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>

                    <input type="button" class="btn btn-primary" onclick="printDiv('student-report')" value="print" />

                        <div class='student-reporttt'>
                    <div class="x_content">
                      
                        <h4></h4>
                          <table class="table table-striped table-bordered student-report"  id='student-report'>
                            <thead>
                              <th>#</th>
                              <th>Name</th>
                              <th>Register No</th>
                              <th>Roll</th>
                              <th>Email</th>
                              <th>Phone</th>
                            </thead>
                              <?php $counter=1; foreach ($student_reports as $key => $value) {
                                echo '<tr>';
                                echo '<td>'.$counter.'</td>';
                                echo '<td>'.$value->preferred_name.'</td>';
                                echo '<td>'.$value->register_no.'</td>';
                                echo '<td>'.$value->roll_no.'</td>';
                                echo '<td>'.$value->email.'</td>';
                                echo '<td>'.$value->phone.'</td>';
                                echo '</tr>';
                              $counter++; } ?>
                              <?php ?>
                          </table>
                    </div>
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

          $('#report_for').on('change', function(){
              var report_for = $(this).val();
              console.log("report_for",report_for);
              if(report_for!=''){
                <?php // $this->session->unset_userdata('report_for_dynamic');
                // $this->session->unset_userdata('report_for'); ?>
                $('.report_for_show_div').html('').hide();
                // var dynamic_html = '<select id="report_for_dynamic" class="form-control">';
                switch(report_for){
                  case 'blood_group':
                    var dynamic_html = 'Blood Group * <select id="report_for_dynamic" class="form-control" name="report_for_dynamic"><option value="">Please Select</option><option value="a+">A+</option><option value="b+">B+</option><option value="ab+">AB+</option><option value="ab-">AB-</option><option value="b-">B-</option><option value="o+">O+</option><option value="o-">O-</option></select>';
                    $('.report_for_hidden_div').html(dynamic_html).show();
                    break;
                  case 'gender':
                    var dynamic_html = 'Gender * <select id="report_for_dynamic" class="form-control" name="report_for_dynamic"><option value="">Please Select</option><option value="male">Male</option><option value="female">FeMale</option></select>';
                    $('.report_for_hidden_div').html(dynamic_html).show();
                    break;
                  case 'country':
                    var dynamic_html = 'Country * <select id="report_for_dynamic" class="form-control" name="report_for_dynamic"><option value="">Please Select</option><option value="india">India</option><option value="us">US</option></select>';
                    $('.report_for_hidden_div').html(dynamic_html).show();
                    break;
                  case 'birthday':
                    var birthday_html = 'Birthday * <input class="form-control" id="date_of_birth" name="report_for_dynamic">';
                    $('.report_for_hidden_div').html(birthday_html).show();
                    $('#date_of_birth').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: 'now'
                    });
                    break;
                }
                console.log('dynamic_html',dynamic_html);
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
