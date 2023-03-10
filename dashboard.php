<?php

$page = "dashboard";
setcookie("pageName", $page, time() + (86400 * 30), "/");

include "support/header.php";

?>
<link href="layout/styles/dashboard.css" rel="stylesheet" type="text/css" media="all">
<div class="dash">
	<div class="topic">
		<h1>Dashboard</h1>
	</div>
	<div class="status">
		<div class="card-deck">
			<div class="card">
				<div class="card-body">
					<h1>Total registered staff</h1>
					<?php
					$sql = "select count(*) as total from staff  where type = 2";
					$rs = mysqli_query($conn, $sql);

					if ($row = mysqli_fetch_array($rs)) {
						$total = $row["total"];
						echo "<h5>Total registered : $total</h5>";
					}
					?>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<h1>Total registered peoples</h1>
					<?php
					$sql = "select count(*) as total from people";
					$rs = mysqli_query($conn, $sql);

					if ($row = mysqli_fetch_array($rs)) {
						$total = $row["total"];
						echo "<h5>Total registered : $total</h5>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="panel">
		<div class="row justify-content-center">
			<div class="col-md-6 col-sm-12 mb-3">
				<a href="staff_details.php">
					<div class="card">
						<div class="card-header text-center">
							<h1><i class="fa fa-users"> Staff</i></h1>
						</div>
						<div class="card-body text-center">
							<div class="details">
								<p>About staff in the office</p>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-6 col-sm-12 mb-3">
				<a href="event.php">

					<div class="card">
						<div class="card-header text-center">
							<h1><i class="fa fa-calendar-check"> Events</i></h1>
						</div>
						<div class="card-body text-center">
							<div class="details">
								<p>About upcoming events</p>
							</div>
						</div>
					</div>
				</a>
			</div>
			<?php
			if ($_SESSION['TYPE'] == '1') {
			?>
				<div class="w-100"></div>
				<div class="col-md-6 col-sm-12 mb-3">
					<a href="feedback.php">

						<div class="card">
							<div class="card-header text-center">
								<h1><i class="fa fa-coins"> Feedbacks</i></h1>
							</div>
							<div class="card-body text-center">
								<div class="details">
									<p>About feedbacks submitted by peoples</p>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-6 col-sm-12 mb-3">
					<a href="report.php">

						<div class="card">
							<div class="card-header text-center">
								<h1><i class="fa fa-info-circle">Details</i></h1>
							</div>
							<div class="card-body text-center">
								<div class="details">
									<p>About Summary details</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php
			}
			?>
			<div class="w-100"></div>
			<div class="col-md-6 col-sm-12 mb-3">
				<a href="approvals.php">

					<div class="card">
						<div class="card-header text-center">
							<h1><i class="fa fa-check-circle"> Approvals</i></h1>
						</div>
						<div class="card-body text-center">
							<div class="details">
								<p>About applications and users approvals details</p>
							</div>
						</div>
					</div>
				</a>
			</div>

		</div>

	</div>
</div>

<?php
include "support/footer.php";
?>