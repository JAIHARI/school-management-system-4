<hr />


<div class="panel-body">
	
	<?php echo form_open(base_url() . 'admin/student/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
			
			<div class="col-sm-5">
				<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
			</div>
		</div>

		<div class="form-group">
			<label for="field-2" class="col-sm-3 control-label">Session</label>
			
			<div class="col-sm-5">
				<select name="session_id" class="form-control" data-validate="required" id="session_id" 
					data-message-required="<?php echo get_phrase('value_required');?>">
					<?php 
					$sessions = $this->db->get('session')->result_array();
					foreach($sessions as $row):
						?>
						<option <?php if($row['session_id'] == $this->session->userdata('session_id')) echo 'selected'; ?> value="<?php echo $row['session_id'];?>">
								<?php echo $row['session_name'];?>
						</option>
					<?php
					endforeach;
					?>
				</select>
			</div> 
		</div>

		
		
		<div class="form-group">
			<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
			
			<div class="col-sm-5">
				<select name="class_id" class="form-control" data-validate="required" id="class_id" 
					data-message-required="<?php echo get_phrase('value_required');?>"
						onchange="return get_class_sections(this.value)">
					<option value=""><?php echo get_phrase('select');?></option>
					<?php 
					$classes = $this->db->get('class')->result_array();
					foreach($classes as $row):
						?>
						<option value="<?php echo $row['class_id'];?>">
								<?php echo $row['name'];?>
								</option>
					<?php
					endforeach;
					?>
				</select>
			</div> 
		</div>

	
		<div class="form-group">
			<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('roll');?></label>
			
			<div class="col-sm-5">
				<input data-validate="required" type="text" class="form-control" name="roll" value="" >
			</div> 
		</div>
		
		<div class="form-group">
			<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
			
			<div class="col-sm-5">
				<input data-validate="required" type="text" class="form-control datepicker" name="birthday" value="" data-start-view="2">
			</div> 
		</div>
		
		<div class="form-group">
			<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
			
			<div class="col-sm-5">
				<select name="sex" class="form-control">
					<option value="male"><?php echo get_phrase('male');?></option>
					<option value="female"><?php echo get_phrase('female');?></option>
				</select>
			</div> 
		</div>
		
		<div class="form-group">
			<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
			
			<div class="col-sm-5">
				<input data-validate="required" type="text" class="form-control" name="address" value="" >
			</div> 
		</div>
		
		<div class="form-group">
			<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
			
			<div class="col-sm-5">
				<input data-validate="required" type="text" class="form-control" name="phone" value="" >
			</div> 
		</div>
		
		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
			<div class="col-sm-5">
				<input data-validate="required" type="text" class="form-control" name="email" value="">
			</div>
		</div>
	

		<div class="form-group">
			<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
			
			<div class="col-sm-5">
				<div class="fileinput fileinput-new" data-provides="fileinput">
					<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
						<img src="http://placehold.it/200x200" alt="...">
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
					<div>
						<span class="btn btn-white btn-file">
							<span class="fileinput-new">Select image</span>
							<span class="fileinput-exists">Change</span>
							<input type="file" name="userfile" accept="image/*">
						</span>
						<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5">
				<button type="submit" class="btn btn-info"><?php echo get_phrase('add_student');?></button>
			</div>
		</div>
	<?php echo form_close();?>
</div>
     

<script type="text/javascript">

	function get_class_sections(class_id) {

    	$.ajax({
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }

</script>