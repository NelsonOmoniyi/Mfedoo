<?php
require_once('libs/dbfunctions.php');
require_once('class/menu.php');
if(!isset($_SESSION['username_sess']))
{
    header('location: logout.php');
}
$dbobject = new dbobject();
$menu = new Menu();
$menu_list = $menu->generateMenu($_SESSION['role_id_sess']);
$menu_list = $menu_list['data'];


$sql = "SELECT firstname,lastname FROM userdata WHERE username = '$_SESSION[username_sess]' LIMIT 1 ";
$user_det = $dbobject->db_query($sql);

$sqlpending    = "SELECT side_number FROM vehicle_sidenumbers WHERE status = '0' ";
	$result = $dbobject->db_query($sqlpending);
	$count0 = count($result);
	
$sqlprocessed    = "SELECT side_number FROM vehicle_sidenumbers WHERE status = '1' ";
	$result = $dbobject->db_query($sqlprocessed);
	$count1 = count($result);

$sqldeclined    = "SELECT side_number FROM vehicle_sidenumbers WHERE status = '2' ";
	$result = $dbobject->db_query($sqldeclined);
	$count2 = count($result);

$sqlDSL    = "SELECT school_name FROM driving_sch_form WHERE status = '1' ";
	$result = $dbobject->db_query($sqlDSL);
	$count3 = count($result);
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from appstack.bootlab.io/dashboard-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Jul 2019 15:56:51 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Admin Dashboard">
	<meta name="author" content="Bootlab">

	<title>Admin </title>
	
	<link rel="preconnect" href="http://fonts.gstatic.com/" crossorigin>

	<style>
		body {
			opacity: 0;
		}
	</style>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/settings.js"></script>
	
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-6');
</script></head>

<body>
	<div class="wrapper">
		<nav class="sidebar">
			<div class="sidebar-content ">
				<a class="sidebar-brand bg-white" href="home.php">
          <i class="align-middle" data-feather="box"></i>
          <span class="align-middle text-dark" style="font-size: 15px; font-weight:bold;">Mfedoo</span>
        </a>
<!--     side tab     -->

<hr style="margin-top:0px;">
				<ul class="sidebar-nav">
					
					
					<h3><a href="home.php" class="sidebar-header text-white font-weight-bold text-lg ">Dashboard</a></h3>
					
					<hr>
					<?php
                        foreach($menu_list as $row)
                        {
                        ?>
                            <a href="#k<?php echo $row['menu_id']; ?>" data-toggle="collapse" class="sidebar-link">
                                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle"><?php echo $row['menu_name']; ?></span>
                            </a>
						<?php
                            if($row['has_sub_menu'] == true)
                                {
									echo '<ul id="k'.$row['menu_id'].'"  class="sidebar-dropdown list-unstyled collapse">';
									foreach($row['sub_menu'] as $row2)
                                {
                                    if($row2['menu_id'] == "026")
                                {
                              
                        ?>
							<li class="sidebar-item"><a class="sidebar-link" href="javascript:getpage('<?php echo $row2['menu_url']; ?>','page')"><?php echo $row2['name']; ?></a>
							</li>
						<?php

							}
							else
							{

						?>
							<li class="sidebar-item">
                                <a class="sidebar-link" href="javascript:getpage('<?php echo $row2['menu_url']; ?>','page')">
                                <?php echo $row2['name']; ?>
                               	</a>
                            </li>
						<?php
                        }
                        }
                        	echo '</ul>';
                        }
                        ?>
                        <?php
                        }
                        ?>



				</ul>

				<div class="sidebar-bottom d-none d-lg-block">
					<div class="media">
						<img class="rounded-circle mr-3" src="img/avatars/avatar.jpg" width="40" height="40">
						<div class="media-body">
							<h5 class="mb-1"><?php echo $_SESSION['firstname_sess'].' '.$_SESSION['lastname_sess']; ?></h5>
							<div>
                                <button class="btn btn-danger btn-block" onclick="window.location='logout.php'">Logout</button>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light bg-white">
				<a class="sidebar-toggle d-flex mr-2">
          <i class="hamburger align-self-center"></i>
        </a>

				<a href="javascript:void(0)" class="d-flex mr-2">
                   <?php $state_loc = ":".$dbobject->getitemlabel('lga','stateid',$_SESSION['state_id_sess'],'State'); ?>
                    Your Role: &nbsp; <span style="font-weight:bold; color:#000"><?php echo $_SESSION['role_id_name'];"</small>"; ?></span>
                </a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

			  <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded-circle mr-1" alt="<?php echo $_SESSION['firstname_sess'].' '.$_SESSION['lastname_sess']; ?>"/> <span class="text-dark"><?php echo $_SESSION['firstname_sess'].' '.$_SESSION['lastname_sess']; ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Sign out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content" id="page">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12 col-sm-6 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="media">
										<div class="d-inline-block mt-2 mr-3">
											<i class="feather-lg text-success" data-feather="check-square"></i>
										</div>
										<div class="media-body">
											<?php
												echo '<h3 class="mb-2">'.$count1.'</h3>';
											?>
											<!-- <h3 class="mb-2">2.562</h3> -->
											<div class="mb-0">Processed Side Numbers</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="media">
										<div class="d-inline-block mt-2 mr-3">
											<i class="feather-lg text-warning" data-feather="activity"></i>
										</div>
										<div class="media-body">
											<?php
												echo '<h3 class="mb-2">'.$count0.'</h3>';
											?>
											<!-- <h3 class="mb-2">2.562</h3> -->
											<div class="mb-0">Pending Side Numbers</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="media">
										<div class="d-inline-block mt-2 mr-3">
											<i class="feather-lg text-danger" data-feather="x-octagon"></i>
										</div>
										<div class="media-body">
											<?php
												echo '<h3 class="mb-2">'.$count2.'</h3>';
											?>
											<!-- <h3 class="mb-2">2.562</h3> -->
											<div class="mb-0">Declined Side Numbers</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="media">
										<div class="d-inline-block mt-2 mr-3">
											<i class="feather-lg text-primary" data-feather="shopping-bag"></i>
										</div>
										<div class="media-body">
											<?php
												echo '<h3 class="mb-2">'.$count3.'</h3>';
											?>
											<div class="mb-0">Total Processed Driving School Licence</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-xl d-none d-xxl-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="media">
										<div class="d-inline-block mt-2 mr-3">
											<i class="feather-lg text-info" data-feather="dollar-sign"></i>
										</div>
										<div class="media-body">
											<h3 class="mb-2">$ 18.700</h3>
											<div class="mb-0">Total Revenue</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<span class="badge badge-primary float-right">Monthly</span>
									<h5 class="card-title mb-0">Total Revenue</h5>
								</div>
								<div class="card-body">
									<div class="chart chart-lg">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-4 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<span class="badge badge-info float-right">Today</span>
									<h5 class="card-title mb-0">Daily feed</h5>
								</div>
								<div class="card-body">
									<div class="media">
										<img src="img/avatars/avatar-5.jpg" width="36" height="36" class="rounded-circle mr-2" alt="Ashley Briggs">
										<div class="media-body">
											<small class="float-right text-navy">5m ago</small>
											<strong>Ashley Briggs</strong> started following <strong>Stacie Hall</strong><br />
											<small class="text-muted">Today 7:51 pm</small><br />

										</div>
									</div>

									<hr />
									<div class="media">
										<img src="img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle mr-2" alt="Chris Wood">
										<div class="media-body">
											<small class="float-right text-navy">30m ago</small>
											<strong>Chris Wood</strong> posted something on <strong>Stacie Hall</strong>'s timeline<br />
											<small class="text-muted">Today 7:21 pm</small>

											<div class="border text-sm text-muted p-2 mt-1">
												Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing...
											</div>
										</div>
									</div>

									<hr />
									<div class="media">
										<img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle mr-2" alt="Stacie Hall">
										<div class="media-body">
											<small class="float-right text-navy">1h ago</small>
											<strong>Stacie Hall</strong> posted a new blog<br />

											<small class="text-muted">Today 6:35 pm</small>
										</div>
									</div>

									<hr />
									<a href="#" class="btn btn-primary btn-block">Load more</a>
								</div>
							</div>
						</div>
					</div>

					<!-- <div class="row">
						<div class="col-12 col-lg-6 col-xl-4 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
						<i class="align-middle" data-feather="more-horizontal"></i>
						</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-xl-4 d-none d-xl-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
						<i class="align-middle" data-feather="more-horizontal"></i>
						</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Weekly sales</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<thead>
												<tr>
													<th>Source</th>
													<th class="text-right">Revenue</th>
													<th class="text-right">Value</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><i class="fas fa-square-full text-primary"></i> Direct</td>
													<td class="text-right">$ 2602</td>
													<td class="text-right text-success">+43%</td>
												</tr>
												<tr>
													<td><i class="fas fa-square-full text-warning"></i> Affiliate</td>
													<td class="text-right">$ 1253</td>
													<td class="text-right text-success">+13%</td>
												</tr>
												<tr>
													<td><i class="fas fa-square-full text-danger"></i> E-mail</td>
													<td class="text-right">$ 541</td>
													<td class="text-right text-success">+24%</td>
												</tr>
												<tr>
													<td><i class="fas fa-square-full text-dark"></i> Other</td>
													<td class="text-right">$ 1465</td>
													<td class="text-right text-success">+11%</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6 col-xl-4 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
						<i class="align-middle" data-feather="more-horizontal"></i>
						</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Appointments</h5>
								</div>
								<div class="p-4 bg-light">
									<h2>You have a meeting today!</h2>
									<p class="mb-0 text-sm">Your next meeting is in 2 hours. Check your <a href="#">schedule</a> to see the details.</p>
								</div>
								<div class="card-body">
									<ul class="timeline">
										<li class="timeline-item">
											<strong>Chat with Carl and Ashley</strong>
											<span class="float-right text-muted text-sm">30m ago</span>
											<p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu...</p>
										</li>
										<li class="timeline-item">
											<strong>The big launch</strong>
											<span class="float-right text-muted text-sm">2h ago</span>
											<p>Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum
												nunc...</p>
										</li>
										<li class="timeline-item">
											<strong>Coffee break</strong>
											<span class="float-right text-muted text-sm">3h ago</span>
											<p>Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae
												tortor...</p>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div> -->

					<!-- <div class="row">
						<div class="col-12 col-lg-6 col-xl-8 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
							<i class="align-middle" data-feather="more-horizontal"></i>
							</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Latest Projects</h5>
								</div>
								<table id="datatables-dashboard-projects" class="table table-striped my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Start Date</th>
											<th class="d-none d-xl-table-cell">End Date</th>
											<th>Status</th>
											<th class="d-none d-md-table-cell">Assignee</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Project Apollo</td>
											<td class="d-none d-xl-table-cell">01/01/2018</td>
											<td class="d-none d-xl-table-cell">31/06/2018</td>
											<td><span class="badge badge-success">Done</span></td>
											<td class="d-none d-md-table-cell">Carl Jenkins</td>
										</tr>
										<tr>
											<td>Project Fireball</td>
											<td class="d-none d-xl-table-cell">01/01/2018</td>
											<td class="d-none d-xl-table-cell">31/06/2018</td>
											<td><span class="badge badge-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">Bertha Martin</td>
										</tr>
										<tr>
											<td>Project Hades</td>
											<td class="d-none d-xl-table-cell">01/01/2018</td>
											<td class="d-none d-xl-table-cell">31/06/2018</td>
											<td><span class="badge badge-success">Done</span></td>
											<td class="d-none d-md-table-cell">Stacie Hall</td>
										</tr>
										<tr>
											<td>Project Nitro</td>
											<td class="d-none d-xl-table-cell">01/01/2018</td>
											<td class="d-none d-xl-table-cell">31/06/2018</td>
											<td><span class="badge badge-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Carl Jenkins</td>
										</tr>
										<tr>
											<td>Project Phoenix</td>
											<td class="d-none d-xl-table-cell">01/01/2018</td>
											<td class="d-none d-xl-table-cell">31/06/2018</td>
											<td><span class="badge badge-success">Done</span></td>
											<td class="d-none d-md-table-cell">Bertha Martin</td>
										</tr>
										<tr>
											<td>Project X</td>
											<td class="d-none d-xl-table-cell">01/01/2018</td>
											<td class="d-none d-xl-table-cell">31/06/2018</td>
											<td><span class="badge badge-success">Done</span></td>
											<td class="d-none d-md-table-cell">Stacie Hall</td>
										</tr>
										<tr>
											<td>Project Romeo</td>
											<td class="d-none d-xl-table-cell">01/01/2018</td>
											<td class="d-none d-xl-table-cell">31/06/2018</td>
											<td><span class="badge badge-success">Done</span></td>
											<td class="d-none d-md-table-cell">Ashley Briggs</td>
										</tr>
										<tr>
											<td>Project Wombat</td>
											<td class="d-none d-xl-table-cell">01/01/2018</td>
											<td class="d-none d-xl-table-cell">31/06/2018</td>
											<td><span class="badge badge-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Bertha Martin</td>
										</tr>
										<tr>
											<td>Project Zircon</td>
											<td class="d-none d-xl-table-cell">01/01/2018</td>
											<td class="d-none d-xl-table-cell">31/06/2018</td>
											<td><span class="badge badge-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">Stacie Hall</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-6 col-xl-4 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
								<i class="align-middle" data-feather="more-horizontal"></i>
								</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Sales / Revenue</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div> -->

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms of Service</a>
								</li>
							</ul>
						</div>
						<div class="col-6 text-right">
							<p class="mb-0">
								&copy; 2022 - <a href="index.html" class="text-muted">AppStack</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal_div">
            <div class="modal-header">
            <h4 class="modal-title" style="font-weight:bold"><?php echo ($operation=="edit")?"Edit ":""; ?> Setup<div><small style="font-size:12px">All asterik fields are compulsory</small></div></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              
            </div>
            
            </div>
        </div>
        </div>
    </div>

	<!-- large modal -->
	<div class="modal fade" id="defaultModallarge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="modal_div2">
            <div class="modal-header">
            <h4 class="modal-title" style="font-weight:bold"><?php echo ($operation=="edit")?"Edit ":""; ?> Setup<div><small style="font-size:12px">All asterik fields are compulsory</small></div></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              
            </div>
            
            </div>
        </div>
        </div>
    </div>

	
	<script src="js/app.js"></script>
	<script src="js/parsely.js"></script>
	
	<script src="js/sweet_alerts.js"></script>
	<script src="js/main.js"></script>
    <script src="js/jquery.blockUI.js"></script>
	
	
	<script>
		$(function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Last year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79]
					}, {
						label: "This year",
						backgroundColor: "#E8EAED",
						borderColor: "#E8EAED",
						hoverBackgroundColor: "#E8EAED",
						hoverBorderColor: "#E8EAED",
						data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							barPercentage: .75,
							categoryPercentage: .5,
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		$(function() {
			$("#datetimepicker-dashboard").datetimepicker({
				inline: true,
				sideBySide: false,
				format: "L"
			});
		});
	</script>
	<script>
		$(function() {
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: "transparent",
						borderColor: window.theme.primary,
						data: [2015, 1465, 1487, 1796, 1387, 2123, 2866, 2548, 3902, 4938, 3917, 4927]
					}, {
						label: "Orders",
						fill: true,
						backgroundColor: "transparent",
						borderColor: window.theme.tertiary,
						borderDash: [4, 4],
						data: [928, 734, 626, 893, 921, 1202, 1396, 1232, 1524, 2102, 1506, 1887]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.05)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 500
							},
							display: true,
							borderDash: [5, 5],
							gridLines: {
								color: "rgba(0,0,0,0)",
								fontColor: "#fff"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		$(function() {
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Direct", "Affiliate", "E-mail", "Other"],
					datasets: [{
						data: [2602, 1253, 541, 1465],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger,
							"#E8EAED"
						],
						borderColor: "transparent"
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					}
				}
			});
		});
	</script>
	<script>
		$(function() {
			$("#datatables-dashboard-projects").DataTable({
				pageLength: 6,
				lengthChange: false,
				bFilter: false,
				autoWidth: false
			});
		});
	</script>
<script>
	function year() {
		NOW();
	}
</script>
</body>

</html>