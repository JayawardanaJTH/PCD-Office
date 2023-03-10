<?php

$page = "home";
setcookie("pageName", $page, time() + (86400 * 30), "/");

include 'support/header.php';
?>
<!-- Carousel -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleSlidesOnly" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleSlidesOnly" data-slide-to="1"></li>
		<li data-target="#carouselExampleSlidesOnly" data-slide-to="2"></li>
		<li data-target="#carouselExampleSlidesOnly" data-slide-to="3"></li>
		<li data-target="#carouselExampleSlidesOnly" data-slide-to="4"></li>

	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block w-100" src="images/carosal1.jpg" alt="First slide">
		</div>
		<div class="carousel-item ">
			<img class="d-block w-100" src="images/carosal2.jpg" alt="Second slide">
		</div>
		<div class="carousel-item ">
			<img class="d-block w-100" src="images/carosal3.jpg" alt="Second slide">
		</div>
		<div class="carousel-item ">
			<img class="d-block w-100" src="images/carosal4.jpg" alt="Second slide">
		</div>
		<div class="carousel-item ">
			<img class="d-block w-100" src="images/carosal5.jpg" alt="Second slide">
		</div>
	</div>
</div>
<!-- End of carousel -->

<!-- Services -->
<div class="wrapper row3">
	<main class="hoc container clear">
		<!-- main body -->
		<div class="sectiontitle">
			<h1 class="text-gray-dark font-x3 font-weight-bold" style="border-bottom: 2px solid #911105; font-family: sans-serif;" data-aos="fade-left">Our Services</h1>
		</div>
		<div class="group center btmspace-80">
			<!-- First line -->
			<div class="row service1" data-aos="zoom-in-up">
				<div class="col-md-6 justify-content-center">
					<article><a class="ringcon btmspace-50" href="our_works.php"><i class="fas fa-user-cog"></i></a>
						<h6 class="heading">Our works</h6>
						<p>Come and see our works</p>
					</article>
				</div>
				<div class="col-md-6">
					<article><a class="ringcon btmspace-50" href="welfare.php"><i class="fas fa-hands-helping"></i></a>
						<h6 class="heading">List of welfare</h6>
						<p>Our social interactions</p>
					</article>
				</div>
			</div>

			<br>
			<!-- Second line -->
			<?php
			if ($_SESSION["TYPE"] == 0) {
			?>
				<div class="row service1 justify-content-center" data-aos="zoom-in-up">
					<div class="col-md-6">
						<article><a class="ringcon btmspace-50" href="online_application_home.php"><i class="fas fa-file-invoice"></i></a>
							<h6 class="heading">Online application</h6>
							<p>Here can submit applications</p>
						</article>
					</div>
				</div>
			<?php
			}
			?>
		</div>
		<!-- / main body -->
		<div class="clear"></div>
	</main>
</div>

<!-- Calender and upcoming events -->
<div class="row p-2">
	<div class="calender-cover col-md-6">
		<div id="calender">
			<div class="month">
				<i class="fas fa-arrow-left pre"></i>
				<div class="days">
					<h1></h1>
					<p></p>
				</div>
				<i class="fas fa-arrow-right next"></i>
			</div>
			<div class="weekdays">
				<div>Sun</div>
				<div>Mon</div>
				<div>Tue</div>
				<div>Wed</div>
				<div>Thu</div>
				<div>Fri</div>
				<div>Sat</div>
			</div>
			<div class="day">

			</div>
		</div>
	</div>

	<div class="event col-md-6">
		<?php
		$events = array();
		$dates = array();
		$months = array();
		$years = array();
		$ids = array();

		$sql = "SELECT * FROM events WHERE e_postDate LIKE '%" . date('Y') . "%' LIMIT 5";

		$result = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_object($result)) {
			$events[] = $row;
		}

		if (count($events) > 0) {

			foreach ($events as $event) {

				$date = $event->e_date;

				$year = date('Y', strtotime($date));
				$month = date('M', strtotime($date));
				$month_num = date('n', strtotime($date));
				$day = date('d', strtotime($date));
				$dayName = date('D', strtotime($date));
				$description = $event->e_description;

				$dates[] = $day;
				$months[] = $month_num;
				$years[] = $year;
				$ids[] = $event->e_id;
		?>
				<div class="row row-striped">
					<div class="col-2 text-center">
						<h1 class="display-4"> <span class="badge badge-success"><?php echo $day ?></span></h1>
						<h2><?php echo $month ?></h2>
					</div>
					<div class="col-10">
						<h1><a href="php/event-add.php?view_id=<?php echo $event->e_id; ?>"> <?php echo $event->e_name ?></a></h1>
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fas fa-calendar"></i> <?php echo $dayName ?></li>
						</ul>
						<p><a href="php/event-add.php?view_id=<?php echo $event->e_id; ?>"> Event details</a></p>
					</div>
				</div>
		<?php
			}
		}

		?>
	</div>
</div>
</div>

<!-- Footer -->
<?php
include 'support/footer.php';
?>

<script src="layout/scripts/calender.js"></script>
<script>
	loadDates(<?php echo json_encode($dates); ?>, <?php echo json_encode($months) ?>, <?php echo json_encode($years) ?>,
		<?php echo json_encode($ids); ?>);
</script>

</body>

</html>