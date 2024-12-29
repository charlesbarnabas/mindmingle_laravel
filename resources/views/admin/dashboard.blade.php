@extends('admin.layouts.main')
@section('title', 'Admin Dashboard | Mind Mingle')
@section('content')
	<div class="row mb-2 mb-xl-3">
		<div class="col-auto d-none d-sm-block">
			<h1 class="h3 mb-3">Dashboard</h1>
		</div>

		<div class="col-auto ms-auto text-end mt-n1">
			<a class="btn btn-light bg-white shadow-sm" href="#" data-bs-toggle="dropdown" data-bs-display="static">
				<i class="align-middle mt-n1" data-feather="calendar"></i> Today |
				{{ $current = Carbon\Carbon::now()->format('d M Y') }}
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="w-100">
				<div class="row">
					<div class="col-sm-3 col-lg-12 col-xxl-3 d-flex">
						<div class="card illustration flex-fill">
							<div class="card-body p-0 d-flex flex-fill">
								<div class="row g-0 w-100">
									<div class="col-6">
										<div class="illustration-text p-3 m-1">
											<h4 class="illustration-text">Welcome {{ Auth::user()->full_name }}!</h4>
											<p class="mb-0">Mind Mingle Dashboard</p>
										</div>
									</div>
									<div class="col-6 align-self-end text-end">
										<img src="{{ asset('assets-admin/img/illustrations/searching.png') }}" alt="Searching"
											class="img-fluid illustration-img">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-lg-12 col-xxl-3 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Students</h5>
									</div>

									<div class="col-auto">
										<div class="stat stat-sm">
											<i class="align-middle" data-feather="users"></i>
										</div>
									</div>
								</div>
								<span class="h1 d-inline-block mt-1 mb-4">{{ $students }}</span>
								<div class="mb-0">
									@if ($studentsNew != '')
										<span class="badge badge-soft-success me-2"> +{{ $studentsNew }} % </span>
										<span class="text-muted">New Students</span>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-lg-12 col-xxl-3 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Instructors</h5>
									</div>

									<div class="col-auto">
										<div class="stat stat-sm">
											<i class="align-middle" data-feather="users"></i>
										</div>
									</div>
								</div>
								<span class="h1 d-inline-block mt-1 mb-4">{{ $instructors }}</span>
								<div class="mb-0">
									@if ($instructorsNew != '')
										<span class="badge badge-soft-success me-2"> +{{ $instructorsNew }} % </span>
										<span class="text-muted">New Instructor</span>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-lg-12 col-xxl-3 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Courses</h5>
									</div>

									<div class="col-auto">
										<div class="stat stat-sm">
											<i class="align-middle" data-feather="book-open"></i>
										</div>
									</div>
								</div>
								<span class="h1 d-inline-block mt-1 mb-4">{{ $masterclasses }}</span>
								<div class="mb-0">
									@if ($masterclassesNew != '')
										<span class="badge badge-soft-success me-2"> +{{ $masterclassesNew }} %</span>
										<span class="text-muted">New Course</span>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-12 col-lg-4 d-flex">
			<div class="card flex-fill">
				<div class="card-header">
					<div class="card-actions float-end">
						<div class="dropdown position-relative">
							<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
								<i class="align-middle" data-feather="more-horizontal"></i>
							</a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</div>
					</div>
					<h5 class="card-title mb-0">Interests</h5>
				</div>
				<div class="card-body">
					<div class="chart">
						<canvas id="chartjs-dashboard-radar"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-4 d-flex">
			<div class="card flex-fill w-100">
				<div class="card-header">
					<div class="card-actions float-end">
						<div class="dropdown position-relative">
							<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
									stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
									class="feather feather-more-horizontal align-middle">
									<circle cx="12" cy="12" r="1"></circle>
									<circle cx="19" cy="12" r="1"></circle>
									<circle cx="5" cy="12" r="1"></circle>
								</svg>
							</a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</div>
					</div>
					<h5 class="card-title mb-0">Course Category</h5>
				</div>
				<div class="card-body d-flex w-100">
					<div class="align-self-center chart">
						<div class="chartjs-size-monitor">
							<div class="chartjs-size-monitor-expand">
								<div class=""></div>
							</div>
							<div class="chartjs-size-monitor-shrink">
								<div class=""></div>
							</div>
						</div>
						<canvas id="chartjs-dashboard-bar-devices" width="782" height="600" class="chartjs-render-monitor"
							style="display: block; height: 300px; width: 391px;"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-4 d-flex">
			<div class="card flex-fill w-100">
				<div class="card-header">
					<div class="card-actions float-end">
						<div class="dropdown position-relative">
							<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
									stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
									class="feather feather-more-horizontal align-middle">
									<circle cx="12" cy="12" r="1"></circle>
									<circle cx="19" cy="12" r="1"></circle>
									<circle cx="5" cy="12" r="1"></circle>
								</svg>
							</a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</div>
					</div>
					<h5 class="card-title mb-0">Categories</h5>
				</div>
				<table class="table table-striped my-0">
					<thead>
						<tr>
							<th>Language</th>
							<th class="text-end">Users</th>
							<th class="d-none d-xl-table-cell w-75">% Users</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>en-us</td>
							<td class="text-end">735</td>
							<td class="d-none d-xl-table-cell">
								<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 43%;" aria-valuenow="43"
										aria-valuemin="0" aria-valuemax="100">43%</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>en-gb</td>
							<td class="text-end">223</td>
							<td class="d-none d-xl-table-cell">
								<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 27%;" aria-valuenow="27"
										aria-valuemin="0" aria-valuemax="100">27%</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>fr-fr</td>
							<td class="text-end">181</td>
							<td class="d-none d-xl-table-cell">
								<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 22%;" aria-valuenow="22"
										aria-valuemin="0" aria-valuemax="100">22%</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>es-es</td>
							<td class="text-end">132</td>
							<td class="d-none d-xl-table-cell">
								<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 16%;" aria-valuenow="16"
										aria-valuemin="0" aria-valuemax="100">16%</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>de-de</td>
							<td class="text-end">118</td>
							<td class="d-none d-xl-table-cell">
								<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 15%;" aria-valuenow="15"
										aria-valuemin="0" aria-valuemax="100">15%</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>ru-ru</td>
							<td class="text-end">98</td>
							<td class="d-none d-xl-table-cell">
								<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 13%;" aria-valuenow="13"
										aria-valuemin="0" aria-valuemax="100">13%</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-7 col-xl-12 d-flex">
			<div class="card flex-fill">
				<div class="card-header">
					<div class="card-actions float-end">
						<div class="dropdown position-relative">
							<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
								<i class="align-middle" data-feather="more-horizontal"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</div>
					</div>
					<h5 class="card-title mb-0">Masterclasses</h5>
				</div>
				<table id="datatables-dashboard-traffic" class="table table-striped my-0">
					<thead>
						<tr>
							<th>Source</th>
							<th class="text-end">Users</th>
							<th class="d-none d-xl-table-cell text-end">Sessions</th>
							<th class="d-none d-xl-table-cell text-end">Bounce Rate</th>
							<th class="d-none d-xl-table-cell text-end">Avg. Session Duration</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Google</td>
							<td class="text-end">1023</td>
							<td class="d-none d-xl-table-cell text-end">1265</td>
							<td class="d-none d-xl-table-cell text-end text-success">27.23%</td>
							<td class="d-none d-xl-table-cell text-end">00:06:25</td>
						</tr>
						<tr>
							<td>Bing</td>
							<td class="text-end">504</td>
							<td class="d-none d-xl-table-cell text-end">623</td>
							<td class="d-none d-xl-table-cell text-end text-danger">66.76%</td>
							<td class="d-none d-xl-table-cell text-end">00:04:42</td>
						</tr>
						<tr>
							<td>Twitter</td>
							<td class="text-end">462</td>
							<td class="d-none d-xl-table-cell text-end">571</td>
							<td class="d-none d-xl-table-cell text-end text-success">31.53%</td>
							<td class="d-none d-xl-table-cell text-end">00:08:05</td>
						</tr>
						<tr>
							<td>Pinterest</td>
							<td class="text-end">623</td>
							<td class="d-none d-xl-table-cell text-end">770</td>
							<td class="d-none d-xl-table-cell text-end text-danger">52.81%</td>
							<td class="d-none d-xl-table-cell text-end">00:03:10</td>
						</tr>
						<tr>
							<td>Facebook</td>
							<td class="text-end">812</td>
							<td class="d-none d-xl-table-cell text-end">1003</td>
							<td class="d-none d-xl-table-cell text-end text-success">24.83%</td>
							<td class="d-none d-xl-table-cell text-end">00:05:56</td>
						</tr>
						<tr>
							<td>DuckDuckGo</td>
							<td class="text-end">693</td>
							<td class="d-none d-xl-table-cell text-end">856</td>
							<td class="d-none d-xl-table-cell text-end text-success">37.36%</td>
							<td class="d-none d-xl-table-cell text-end">00:09:12</td>
						</tr>
						<tr>
							<td>GitHub</td>
							<td class="text-end">713</td>
							<td class="d-none d-xl-table-cell text-end">881</td>
							<td class="d-none d-xl-table-cell text-end text-success">38.09%</td>
							<td class="d-none d-xl-table-cell text-end">00:06:19</td>
						</tr>
						<tr>
							<td>Direct</td>
							<td class="text-end">872</td>
							<td class="d-none d-xl-table-cell text-end">1077</td>
							<td class="d-none d-xl-table-cell text-end text-success">32.70%</td>
							<td class="d-none d-xl-table-cell text-end">00:09:18</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
	 document.addEventListener("DOMContentLoaded", function() {
	  // Bar chart
	  new Chart(document.getElementById("chartjs-dashboard-bar-devices"), {
	   type: "bar",
	   data: {
	    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	    datasets: [{
	     label: "Mobile",
	     backgroundColor: window.theme.primary,
	     borderColor: window.theme.primary,
	     hoverBackgroundColor: window.theme.primary,
	     hoverBorderColor: window.theme.primary,
	     data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
	     barPercentage: .5,
	     categoryPercentage: .5
	    }, {
	     label: "Desktop",
	     backgroundColor: window.theme["primary-light"],
	     borderColor: window.theme["primary-light"],
	     hoverBackgroundColor: window.theme["primary-light"],
	     hoverBorderColor: window.theme["primary-light"],
	     data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
	     barPercentage: .5,
	     categoryPercentage: .5
	    }]
	   },
	   options: {
	    maintainAspectRatio: false,
	    cornerRadius: 15,
	    legend: {
	     display: false
	    },
	    scales: {
	     yAxes: [{
	      gridLines: {
	       display: false
	      },
	      ticks: {
	       stepSize: 20
	      },
	      stacked: true,
	     }],
	     xAxes: [{
	      gridLines: {
	       color: "transparent"
	      },
	      stacked: true,
	     }]
	    }
	   }
	  });
	 });
	</script>
	<script>
	 document.addEventListener("DOMContentLoaded", function() {
	  var markers = [{
	    coords: [31.230391, 121.473701],
	    name: "Shanghai"
	   },
	   {
	    coords: [39.904202, 116.407394],
	    name: "Beijing"
	   },
	   {
	    coords: [28.704060, 77.102493],
	    name: "Delhi"
	   },
	   {
	    coords: [6.524379, 3.379206],
	    name: "Lagos"
	   },
	   {
	    coords: [39.343357, 117.361649],
	    name: "Tianjin"
	   },
	   {
	    coords: [24.860735, 67.001137],
	    name: "Karachi"
	   },
	   {
	    coords: [41.008240, 28.978359],
	    name: "Istanbul"
	   },
	   {
	    coords: [35.689487, 139.691711],
	    name: "Tokyo"
	   },
	   {
	    coords: [23.129110, 113.264381],
	    name: "Guangzhou"
	   },
	   {
	    coords: [19.075983, 72.877655],
	    name: "Mumbai"
	   },
	   {
	    coords: [40.7127837, -74.0059413],
	    name: "New York"
	   },
	   {
	    coords: [34.052235, -118.243683],
	    name: "Los Angeles"
	   },
	   {
	    coords: [41.878113, -87.629799],
	    name: "Chicago"
	   },
	   {
	    coords: [29.760427, -95.369804],
	    name: "Houston"
	   },
	   {
	    coords: [33.448376, -112.074036],
	    name: "Phoenix"
	   },
	   {
	    coords: [51.507351, -0.127758],
	    name: "London"
	   },
	   {
	    coords: [48.856613, 2.352222],
	    name: "Paris"
	   },
	   {
	    coords: [55.755825, 37.617298],
	    name: "Moscow"
	   },
	   {
	    coords: [40.416775, -3.703790],
	    name: "Madrid"
	   }
	  ];
	  var map = new jsVectorMap({
	   map: "world",
	   selector: "#world_map",
	   zoomButtons: true,
	   markers: markers,
	   markerStyle: {
	    initial: {
	     r: 9,
	     stroke: window.theme.white,
	     strokeWidth: 7,
	     stokeOpacity: .4,
	     fill: window.theme.primary
	    },
	    hover: {
	     fill: window.theme.primary,
	     stroke: window.theme.primary
	    }
	   },
	   regionStyle: {
	    initial: {
	     fill: window.theme["gray-200"]
	    }
	   },
	   zoomOnScroll: false
	  });
	  window.addEventListener("resize", () => {
	   map.updateSize();
	  });
	  setTimeout(function() {
	   map.updateSize();
	  }, 250);
	 });
	</script>
	<script>
	 document.addEventListener("DOMContentLoaded", function() {
	  // Pie chart
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
	     borderWidth: 5,
	     borderColor: window.theme.white
	    }]
	   },
	   options: {
	    responsive: !window.MSInputMethodContext,
	    maintainAspectRatio: false,
	    cutoutPercentage: 70,
	    legend: {
	     display: false
	    }
	   }
	  });
	 });
	</script>
	<script>
	 document.addEventListener("DOMContentLoaded", function() {
	  // Radar chart
	  new Chart(document.getElementById("chartjs-dashboard-radar"), {
	   type: "radar",
	   data: {
	    labels: ["Technology", "Sports", "Media", "Gaming", "Arts"],
	    datasets: [{
	     label: "Interests",
	     backgroundColor: "rgba(0, 123, 255, 0.2)",
	     borderColor: "#2979ff",
	     pointBackgroundColor: "#2979ff",
	     pointBorderColor: "#fff",
	     pointHoverBackgroundColor: "#fff",
	     pointHoverBorderColor: "#2979ff",
	     data: [70, 53, 82, 60, 33]
	    }]
	   },
	   options: {
	    maintainAspectRatio: false,
	    legend: {
	     display: false
	    }
	   }
	  });
	 });
	</script>
	<script>
	 document.addEventListener("DOMContentLoaded", function() {
	  $("#datatables-dashboard-traffic").DataTable({
	   pageLength: 8,
	   lengthChange: false,
	   bFilter: false,
	   autoWidth: false,
	   order: [
	    [1, "desc"]
	   ]
	  });
	 });
	</script>
@endsection
