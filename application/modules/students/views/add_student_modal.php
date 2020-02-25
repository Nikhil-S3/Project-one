<!-- Modal -->
<div id="addStudentModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title text-center">ADD STUDENT</h4>
      	</div>
        <form id="add_student_form" class="form-horizontal form-label-left" action="<?php echo base_url();?>students/save" method="post" enctype="multipart/form-data" >
	      <div class="modal-body">
	      	<div class="container">
	      		<div class="notes notes-danger">
		      		<p><strong>NOTE:</strong> Create teacher, class, section before create a new student.</p>
		      	</div>

	            <div class="row">

		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
		                Name *
		                <input type="text" id="preferred_name" name='preferred_name' class="form-control" value="<?php echo set_value('preferred_name'); ?>" >
		              </div>
		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
		                Guardian
	                    <select id="parent_id" name="parent_id" class="form-control">
	                      <option value="">Choose Guardian..</option>
	                      <?php 
                              if(!empty($all_parents)){
                            foreach($all_parents as $p_key=>$p_val){ ?>
                              <option value="<?php echo $p_val->id; ?>" ><?php echo $p_val->parent_guardian_name; ?></option>
                            <?php } } ?>
	                    </select>
		              </div>
		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
		                Date Of Birth
	                    <div class='input-group date' id='date_of_birth'>
	                        <input type='text' class="form-control" name="date_of_birth" value="<?php echo set_value('date_of_birth'); ?>" />
	                        <span class="input-group-addon">
	                           <span class="glyphicon glyphicon-calendar"></span>
	                        </span>
	                    </div>
		              </div>
		              <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Gender
	                    <select id="gender" class="form-control" name="gender">
	                      <option value="">Choose..</option>
	                      <option value="male">Male</option>
	                      <option value="female">FeMale</option>
	                    </select>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Blood Group
	                    <select id="blood_group" name="blood_group" class="form-control">
	                      <option value="">Select Blood Group</option>
	                      <option value="a+">A+</option>
	                      <option value="a-">A-</option>
	                      <option value="b+">B+</option>
	                      <option value="b-">B-</option>
	                      <option value="o+">O+</option>
	                      <option value="o-">O-</option>
	                      <option value="ab+">AB+</option>
	                      <option value="ab-">AB-</option>
	                    </select>
	                   </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Religion
	                    <input id="religion" class="form-control" type="text" name="religion">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Email
	                    <input id="email" class="form-control" type="text" name="email">
	                    <span class="email_exists_error" style="display: none;color:red"></span>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Phone
	                    <input id="phone" class="form-control" type="text" name="phone">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Address
	                    <input id="address" class="form-control" type="text" name="address">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    State
	                    <input id="state" class="form-control" type="text" name="state">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Country
	                    <select id="country" name="country" class="form-control">
	                      <option value="">Select Country</option>
	                      <option value="india">India</option>
	                      <option value="usa">USA</option>
	                    </select>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Class 
	                    <select id="class_id" name="class_id" class="form-control">
	                      <option value="">Select Class</option>
	                      <?php 
                              if(!empty($all_classes)){
                            foreach($all_classes as $c_key=>$c_val){ ?>
                              <option value="<?php echo $c_val->id; ?>" ><?php echo $c_val->class; ?></option>
                            <?php } } ?>
	                    </select>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Section 
	                    <select id="section_id" name="section_id" class="form-control">
	                      <option value="">Select Section</option>
	                      <option value="A">A</option>
	                      <option value="B">B</option>
	                      <option value="C">C</option>
	                      <option value="D">D</option>
	                     
	                    </select>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Group
	                    <select id="group" name="group" class="form-control">
	                      <option value="">Select Group</option>
	                      <option value="science">Science</option>
	                      <option value="arts">Arts</option>
	                      <option value="commerce">Commerce</option>
	                    </select>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Optional Subject
	                        <select id="optional_subject_id" name="optional_subject_id" class="form-control">
	                          <option value="">Select Optional Subject</option>
	                        </select>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Register No *
	                    <input id="register_no" class="form-control" type="text" name="register_no">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Roll *
	                    <input id="roll_no" class="form-control" type="text" name="roll_no">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Photo
	                    <input id="photo" class="form-control" type="file" name="photo">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Extra Curricular Activities
	                    <input id="extra_curricular_activities" class="form-control" type="text" name="extra_curricular_activities">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Remarks
	                    <input id="remarks" class="form-control" type="text" name="remarks">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Username *
	                    <input id="username" class="form-control" type="text" name="username">
	                    <span class="username_exists_error" style="display: none;color:red"></span>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12 form-group'>
	                    Password *
	                    <input id="password" class="form-control" type="password" name="password">
	                  </div>
	          		</div>
	            </div>

	      	</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-success add_student_btn" value="Submit">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
        </form>
    </div>

  </div>
</div>