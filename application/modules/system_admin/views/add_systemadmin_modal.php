<!-- Modal -->
<div id="addSystemAdminModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title text-center">ADD SYSTEM ADMIN</h4>
      	</div>
        <form id="add_systemadmin_form" class="form-horizontal form-label-left" action="<?php echo base_url();?>system_admin/save" method="post" enctype="multipart/form-data" >
	      <div class="modal-body">
	      	<div class="container">
	      		<!-- <div class="notes notes-danger">
		      		<p><strong>NOTE:</strong> Create teacher, class, section before create a new student.</p>
		      	</div> -->

	            <div class="row">

		              <div class='col-md-4 col-sm-12 col-xs-12'>
		                Name *
		                <input type="text" id="preferred_name" name='preferred_name' class="form-control" value="<?php echo set_value('preferred_name'); ?>" >
		              </div>
		              <div class='col-md-4 col-sm-12 col-xs-12'>
		                Date Of Birth *
	                    <div class='input-group date' id='date_of_birth'>
	                        <input type='text' class="form-control" name="date_of_birth" value="<?php echo set_value('date_of_birth'); ?>" />
	                        <span class="input-group-addon">
	                           <span class="glyphicon glyphicon-calendar"></span>
	                        </span>
	                    </div>
		              </div>
		              <div class='col-md-4 col-sm-12 col-xs-12'>
	                    Gender
	                    <select id="gender" class="form-control" name="gender">
	                      <option value="">Choose..</option>
	                      <option value="male">Male</option>
	                      <option value="female">FeMale</option>
	                    </select>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12'>
	                    Religion
	                    <input id="religion" class="form-control" type="text" name="religion">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12'>
	                    Email *
	                    <input id="email" class="form-control" type="text" name="email">
	                    <span class="email_exists_error" style="display: none;color:red"></span>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12'>
	                    Phone
	                    <input id="phone" class="form-control" type="text" name="phone">
	                    <span id="phone_error" style="display: none;color:red"></span>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12'>
	                    Address
	                    <input id="address" class="form-control" type="text" name="address">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12'>
		                Joining Date *
	                    <div class='input-group date' id='joining_date'>
	                        <input type='text' class="form-control" name="joining_date" value="<?php echo set_value('joining_date'); ?>" />
	                        <span class="input-group-addon">
	                           <span class="glyphicon glyphicon-calendar"></span>
	                        </span>
	                    </div>
		              </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12'>
	                    Photo
	                    <input id="photo" class="form-control" type="file" name="photo">
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12'>
	                    Username *
	                    <input id="username" class="form-control" type="text" name="username">
	                    <span class="username_exists_error" style="display: none;color:red"></span>
	                  </div>
	                  <div class='col-md-4 col-sm-12 col-xs-12'>
	                    Password *
	                    <input id="password" class="form-control" type="password" name="password">
	                  </div>
	          		</div>
	            </div>

	      	</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-success add_systemadmin_btn" value="Submit" name="add_systemadmin">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
        </form>
    </div>

  </div>
</div>