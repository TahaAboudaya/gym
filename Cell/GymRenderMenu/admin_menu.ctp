<?php 
$session = $this->request->session();
$is_rtl = $session->read("User.is_rtl");
$role_name = $session->read('User.role_name');
$pull = ($is_rtl == "1") ? "pull-left":"pull-right";

if($is_rtl == "1") 
{ ?>
	<style>
		.treeview a {
			display: inline-block !important;
			width : 100% !important;
		}
		.treeview i:first-child{
			float:right !important;
			padding-top : 5px;
		}
		.treeview span{
			float: right !important;
			margin-right: 5px !important;
			font-size: 10px;
		}
		
		
	</style>
<?php } ?>
          <br>
		  
          <ul class="sidebar-menu">	

		  <li class= "treeview" style="font-size: 15px; font-weight: bold; text-align: center;">
              <a href="<?php echo $this->Gym->createurl("Dashboard","");?>">
                <i class="fa fa-pie-chart"></i> <span><?php echo __('GYM');?></span></i> 
              </a>             
            </li> 
			<br>			
            <li class= "treeview <?php echo ($this->request->controller == "Dashboard") ? "active" : "";?>">
              <a href="<?php echo $this->Gym->createurl("Dashboard","index");?>">
                <i class="fa fa-pie-chart"></i> <span style="color: #333;"><?php echo __('Dashboard');?></span></i> 
              </a>             
            </li>
			<li class="treeview <?php echo ($this->request->controller == "Membership") ? "active" : "";?>">
              <a href="<?php echo $this->Gym->createurl("membership","membership_list");?>">
                <i class="fa fa-users"></i> <span style="color: #333;"><?php echo __('Membership Type');?></span>  
              </a>			   
			</li>
			<li class="treeview <?php echo ($this->request->controller == "GymGroup") ? "active" : "";?>">
              <a href="<?php echo $this->Gym->createurl("GymGroup","GroupList");?>">
                <i class="fa fa-object-group"></i> <span style="color: #333;"><?php echo __('Group');?></span> 
              </a>
			</li>			
			<li class="treeview <?php echo ($this->request->controller == "GymNutrition" || $this->request->controller == "ClassSchedule") ? "active" : "";?>">
              <a href="<?php echo $this->Gym->createurl("GymNutrition","nutritionList");?>">
                <i class="fa fa-calendar"></i> <span style="color: #333;"><?php echo __("Class & Nutrition Schedule");?></span><i class="fa fa-angle-left <?php echo $pull;?>"></i>
              </a>
			  <ul class="treeview-menu">					
					<li class="<?php echo ($this->request->action == "classList" || $this->request->action == "viewSchedule" || $this->request->action == "editClass"|| $this->request->action == "addClass") ? "active" : "";?>">
						<a href="<?php echo $this->Gym->createurl("classSchedule","classList");?>">
							<i class="fa fa-circle-o"></i><span><?php echo __('Class Schedule');?></span></i>
						</a>
					</li>
					
					<li class="<?php echo ($this->request->action == "nutritionList" || $this->request->action == "addnutritionSchedule" || $this->request->action == "viewNutirion") ? "active" : "";?>">
						<a href="<?php echo $this->Gym->createurl("GymNutrition","nutritionList");?>"><i class="fa fa-circle-o"></i><?php echo __('Nutrition Schedule');?></a>
					</li>	
              </ul>	
			</li>
			<li class="treeview <?php echo ($this->request->controller == "GymMember" || $this->request->controller == "StaffMembers" || $this->request->controller == "GymAccountant") ? "active" : "";?>">
              <a href="<?php echo $this->Gym->createurl("GymMember","memberList");?>">
                <i class="fa fa-user"></i> <span style="color: #333;"><?php echo __('Member Management');?></span></i><i class="fa fa-angle-left <?php echo $pull;?>"></i>
              </a>
			   <ul class="treeview-menu">
					<li class="<?php echo ($this->request->action == "memberList" || $this->request->action == "addMember" || $this->request->action == "editMember" || $this->request->action == "viewMember") ? "active" : "";?>">
						<a href="<?php echo $this->Gym->createurl("GymMember","memberList");?>"><i class="fa fa-circle-o"></i><?php echo __('Members');?></a>
					</li>
					<li class="<?php echo ($this->request->action == "staffList" || $this->request->action == "addStaff") ? "active" : "";?>">
						<a href="<?php echo $this->Gym->createurl("StaffMembers","StaffList");?>">
							<i class="fa fa-circle-o"></i><span><?php echo __('Traniner Member');?></span></i>
						</a>
					</li>
					
              </ul>			  
			</li>
			<li class="treeview <?php echo ($this->request->controller == "Activity") ? "active" : "";?>">
              <a href="<?php echo $this->Gym->createurl("Activity","activityList");?>">
                <i class="fa fa-bicycle"></i> <span style="color: #333;"><?php echo __('Activity');?></span>  
              </a>
			</li>
			<li class="treeview <?php echo ($this->request->controller == "GymAssignWorkout" || $this->request->controller == "GymDailyWorkout") ? "active" : "";?>">
				<a href="<?php echo $this->Gym->createurl("GymAssignWorkout","WorkoutLog");?>">
					<i class="fa fa-hand-grab-o"></i> <span style="color: #333;"><?php echo __('Workout');?></span><i class="fa fa-angle-left <?php echo $pull;?>"></i>
				</a>
			   <ul class="treeview-menu">
					<li class="<?php echo ($this->request->action == "workoutLog" || $this->request->action == "assignWorkout" || $this->request->action == "viewWorkouts") ? "active" : "";?>">
						<a href="<?php echo $this->Gym->createurl("GymAssignWorkout","WorkoutLog");?>"><i class="fa fa-circle-o"></i><?php echo __('Assign Workout');?></a>
					</li>
					<!-- <li class="<?php echo ($this->request->action == "workoutList" || $this->request->action == "addWorkout" || $this->request->action =="addMeasurment" || $this->request->action =="viewWorkout" || $this->request->action =="editMeasurment") ? "active" : "";?>">
						<a href="<?php echo $this->Gym->createurl("GymDailyWorkout","workoutList");?>">
							<i class="fa fa-circle-o"></i><span><?php echo __('Daily Workout');?></span></i>
						</a>
					</li>	 -->			
              </ul>	
			</li>			
						
			<li class="treeview <?php echo ($this->request->controller == "GymReservation") ? "active" : "";?>">
              <a href="<?php echo $this->Gym->createurl("GymReservation","reservationList");?>">
                <i class="fa fa-ticket"></i> <span style="color: #333;"><?php echo __("Event");?></span>  
              </a>
			</li>
			
			<li class="treeview <?php echo ($this->request->controller == "GymMessage") ? "active" : "";?>">
              <a href="<?php echo $this->Gym->createurl("GymMessage","composeMessage");?>">
                <i class="fa fa-commenting"></i> <span style="color: #333;"><?php echo __("Message");?></span>  
              </a>
			</li>
			
			<!-- <li class="treeview <?php echo ($this->request->controller == "GymNotice") ? "active" : "";?>">
              <a href="<?php echo $this->Gym->createurl("GymNotice","noticeList");?>">
                <i class="fa fa-bell"></i> <span style="color: #333;"><?php echo __("Notice");?></span>  
              </a>
			</li>	 -->
			<li class="treeview <?php echo ($this->request->controller == "Reports") ? "active" : "";?>">
              <a href="<?php echo $this->Gym->createurl("Reports","membershipReport");?>">
                <i class="fa fa-file-text-o"></i> <span style="color: #333;"><?php echo __("Report");?></span> 
              </a>
			</li> 	
			<li class="treeview <?php echo ($this->request->controller == "GeneralSetting") ? "active" : "";?>">
              <a href="<?php echo $this->Gym->createurl("GeneralSetting","SaveSetting");?>">
                <i class="fa fa-sliders"></i> <span><?php echo __("General Settings");?></span></i>
              </a>
			</li>
			<!-- <li class= "treeview <?php echo ($this->request->controller == "GymSubscriptionHistory") ? "active" : "";?>">
				<a href="<?php echo $this->Gym->createurl("GymSubscriptionHistory",""); ?>">
					<i class="fa fa-history"></i>
					<span style="color: #333;"><?php echo __("SubscriptionHistory");?></span>
				</a>             
			</li> -->
			<?php if($role_name == 'administrator')
			{?>
			
			
			<?php } ?>
          </ul>
      
      