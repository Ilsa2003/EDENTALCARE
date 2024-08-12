 <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">E-dental | <u>Doctor</u></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
				
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="images/1.png"><span class="badge">9</span></a>
	        		<ul class="dropdown-menu">
						
							<li class="dropdown-menu-header text-center">
							<strong>Settings</strong>
						</li>
						<li class="m_2"><a href="doctor_profile.php"><i class="fa fa-user"></i> Profile</a></li>
						<li class="m_2"><a href="change_pwd.php"><i class="fa fa-wrench"></i> Settings</a></li>
						
						<li class="m_2"><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>	
	        		</ul>
	      		</li>
			</ul>
			<form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation" style="height:1000px">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user-md nav_icon"></i>Appointment<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="appt_list.php">All Appointment List</a>
                                </li> 
                                 <li>
                                    <a href="today_appt_list.php">Today Appointment List</a>
                                </li>
                                 <li>
                                    <a href="pen_appt_list.php">Pending Appointment List</a>
                                </li>
                                 <li>
                                    <a href="can_appt_list.php">Cancel Appointment List</a>
                                </li>  
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user-md nav_icon"></i>Online Consultation<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="cons_list.php">All  Consultation List</a>
                                </li> 
                                 <li>
                                    <a href="today_cons_list.php">Today  Consultation List</a>
                                </li> 
                               <!--  <li>
                                    <a href="can_appt_list.php"> Cancel Consultaion List</a>
                                </li>  -->
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="patient_list.php"><i class="fa fa-users"></i> Patient List</a>
                        </li>
                         <li>
                            <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>