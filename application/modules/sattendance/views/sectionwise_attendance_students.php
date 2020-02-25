<?php // echo '<pre>';print_r($section_attendance);echo "</pre>" 
	
?>
		<table id="" class="table table-striped table-bordered">
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
              <?php if(isset($section_attendance) && count($section_attendance)>0) { 
                      $i = 1;
                      foreach( $section_attendance as $sa_key => $sa_val ){
                ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $sa_val->preferred_name; ?></td>
                <td><?php echo $sa_val->roll_no; ?></td>
                <td><?php echo $sa_val->email; ?></td>
                <td>
                    <a href="<?php echo base_url().'sattendance/view/'.$sa_val->student_id.'/'.$sa_val->section_id.'/section'; ?>">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </td>
              </tr>
            <?php } } else{ ?>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <!-- hidden column 8 for proper DataTable applying -->
                <td style="display: none"></td>
              </tr>
            <?php } ?>
            </tbody>
        </table>