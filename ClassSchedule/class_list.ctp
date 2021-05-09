<?php $session = $this->request->session()->read("User");?>
<script>
$(document).ready(function(){		
	$(".mydataTable").DataTable({
		"responsive": true,
		"order": [[ 1, "asc" ]],
		"language" : {<?php echo $this->Gym->data_table_lang();?>}				  
	});
});		
</script>

<?php
if($session["role_name"] == "administrator" || $session["role_name"] == "staff_member")
{ ?>
	<script>
	$(document).ready(function(){
		var table = $(".mydataTable").DataTable();
	});
	</script>
<?php } ?>
<style>
	.table-striped>tbody>tr:nth-of-type(odd){
		background: white;
	}
	.btn.btn-flat{
		border-radius: 100%;
	}
	.btn-primary{
		color: #808080;
		background: #e5e5e5;
		border-color: #e5e5e5;
	}
	.btn-primary:hover, .btn-primary:active, .btn-primary.hover{
		background-color: #e5e5e5;
	}
	th{
		color: white;
	}
</style>
<section class="content">
	<br>
	<div class="col-md-12 box box-default">		
		<div class="box-header">
			<section class="content-header">
			  <h1>
				<i class="fa fa-bars"></i>
				<?php echo __("Class List");?>
				<small><?php echo __("Class Schedule");?></small>
			  </h1>
			  <ol class="breadcrumb">
				<?php
				if($session["role_name"] == "administrator" || $session["role_name"] == "member" || $session["role_name"] == "staff_member")
				{ ?>
					<a href="<?php echo $this->Gym->createurl("ClassSchedule","viewSchedule");?>" class="btn btn-flat btn-custom"><i class="fa fa-calendar"></i></a>
				<?php }
				if($session["role_name"] == "administrator" || $session["role_name"] == "staff_member")
				{ ?>
				&nbsp;
					<a href="<?php echo $this->Gym->createurl("ClassSchedule","addClass");?>" class="btn btn-flat btn-custom"><i class="fa fa-plus"></i></a>
				<?php } ?>
			  </ol>
			</section>
		</div>
		<hr>
		<div class="box-body">
			<table class="mydataTable table table-striped" width="100%">
				<thead>
					<tr style="background: #333;">
						<th><?php echo __("Class Name");?></th>
						<th><?php echo __("Staff Name");?></th>
						<th><?php echo __("Starting Time");?></th>					
						<th><?php echo __("Ending Time");?></th>
						<th><?php echo __("Location");?></th>
						<?php if($session["role_name"] !="member"){ ?>
						<th><?php echo __("Action");?></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($data as $row)
				{
					substr_replace('abcd', 'x', 0, -4); 
					echo "<tr>
							<td>{$row['class_name']}</td>
							<td>{$row['gym_member']['first_name']} {$row['gym_member']['last_name']}</td>						
							<td>{$row['start_time']}</td>
							<td>{$row['end_time']}</td>
							<td>{$row['location']}</td>
							";
							if($session["role_name"] !="member")
							{
								$confirmMsg = __("Are you sure,You want to delete this record?");
							echo"<td>
								<a href='{$this->request->base}/ClassSchedule/editClass/{$row['id']}' title='Edit' class='btn btn-flat btn-primary'><i class='zmdi zmdi-edit'></i></a>
								<a href='{$this->request->base}/ClassSchedule/deleteClass/{$row['id']}' title='Delete' class='btn btn-flat btn-danger' onClick=\"return confirm('$confirmMsg');\"><i class='zmdi zmdi-delete'></i></a>
							</td>";
							}
					echo "</tr>";
				}
				?>
				</tbody>
				
			</table>
		</div>	
		<div class="overlay gym-overlay">
		  <i class="fa fa-refresh fa-spin"></i>
		</div>
	</div>
</section>