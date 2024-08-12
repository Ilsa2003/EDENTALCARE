 <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">E-Dental | <u>Admin</u></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
				
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="images/1.png"><span class="badge">9</span></a>
	        		<ul class="dropdown-menu">
						<!-- <li class="dropdown-menu-header text-center">
							<strong>Account</strong>
						</li> -->
						
						<li class="dropdown-menu-header text-center">
							<strong>Account</strong>
						</li>
						<li class="m_2"><a href="admin_profile.php"><i class="fa fa-user"></i> Profile</a></li>
						<li class="m_2"><a href="change_password.php"><i class="fa fa-wrench"></i> Settings</a></li>
						
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
                            <a href="#"><i class="fa fa-user-md nav_icon"></i>Doctor<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_doctor.php">Add Doctor</a>
                                </li>
                                 <li>
                                    <a href="doctor_list.php">Doctor List</a>
                                </li>
                                <li>
                                    <a href="add_deg.php">Add Degree</a>
                                </li>
                                 <li>
                                    <a href="deg_list.php">Degree List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil"></i> Dental Tips<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_dental_tips.php">Add Dental Tips</a>
                                </li>
                                 <li>
                                    <a href="dtips_list.php">Dental Tips List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bold"></i> Blog<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_blog.php">Add Blog</a>
                                </li>
                                <li>
                                    <a href="blog_list.php">Blog List</a>
                                </li>
                                <li>
                                    <a href="vblog_list.php">Video Blog List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square"></i> Notes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_notes.php">Add Notes</a>
                                </li>
                                <li>
                                    <a href="notes_list.php">Notes List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cog"></i> Service<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_service.php">Add Service</a>
                                </li>
                                <li>
                                    <a href="service_list.php">Service List</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="patient_list.php"><i class="fa fa-users fa-fw nav_icon"></i>Patient</a>
                        </li>
                         <li>
                            <a href="general_setting.php"><i class="fa fa-wrench"></i>General Setting</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>