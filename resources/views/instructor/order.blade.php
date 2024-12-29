@extends('instructor.layouts.main')
@section('title', 'Order List')
@section('profile')
	<div class="col-xl-12">

		<!-- Card START -->
		<div class="card border bg-transparent rounded-3">
			<!-- Card header START -->
			<div class="card-header bg-transparent border-bottom">
				<h3 class="mb-0">Order List</h3>
			</div>
			<!-- Card header END -->

			<!-- Card body START -->
			<div class="card-body">

				<!-- Search and select START -->
				<div class="row g-3 align-items-center justify-content-between mb-4">
					<!-- Search -->
					<div class="col-md-8">
						<form class="rounded position-relative">
							<input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">
							<button class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i
									class="fas fa-search fs-6 "></i></button>
						</form>
					</div>
				</div>
				<!-- Search and select END -->

				<!-- Order list table START -->
				<div class="table-responsive border-0">
					<!-- Table START -->
					<table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
						<!-- Table head -->
						<thead>
							<tr>
								<th scope="col" class="border-0 rounded-start">Course name</th>
								<th scope="col" class="border-0">Order ID</th>
								<th scope="col" class="border-0">Date</th>
								<th scope="col" class="border-0">Amount</th>
								<th scope="col" class="border-0 rounded-end">Payment</th>
							</tr>
						</thead>

						<!-- Table body START -->
						<tbody>
							<!-- Table item -->
							<tr>
								<!-- Table data -->
								<td>
									<h6 class="table-responsive-title mt-2 mt-lg-0 mb-0"><a href="#">The complete
											Digital Marketing Course - 8 Course in 1</a></h6>
								</td>

								<!-- Table data -->
								<td class="text-center text-sm-start text-primary-hover">
									<a href="#" class="text-body"><u>#125489</u></a>
								</td>

								<!-- Table data -->
								<td>18/1/2022</td>

								<!-- Table data -->
								<td>$356</td>

								<!-- Table data -->
								<td>Credit Card</td>
							</tr>

							<!-- Table item -->
							<tr>
								<!-- Table data -->
								<td>
									<h6 class="table-responsive-title mt-2 mt-lg-0 mb-0"><a href="#">Time Management
											Mastery: Do More, Stress Less</a></h6>
								</td>
								<!-- Table data -->
								<td class="text-center text-sm-start text-primary-hover">
									<a href="#" class="text-body"><u>#235486</u></a>
								</td>

								<!-- Table data -->
								<td>25/1/2022</td>

								<!-- Table data -->
								<td>$186</td>

								<!-- Table data -->
								<td>Debit Card</td>
							</tr>

							<!-- Table item -->
							<tr>
								<!-- Table data -->
								<td>
									<h6 class="table-responsive-title mt-2 mt-lg-0 mb-0"><a href="#">Building
											Scalable APIs with GraphQL</a></h6>
								</td>
								<!-- Table data -->
								<td class="text-center text-sm-start text-primary-hover">
									<a href="#" class="text-body"><u>#0215789</u></a>
								</td>

								<!-- Table data -->
								<td>4/9/2020</td>

								<!-- Table data -->
								<td>$450</td>

								<!-- Table data -->
								<td>Paypal</td>
							</tr>

							<!-- Table item -->
							<tr>
								<!-- Table data -->
								<td>
									<h6 class="table-responsive-title mt-2 mt-lg-0 mb-0"><a href="#">Sketch from A
											to Z: for app designer</a></h6>
								</td>
								<!-- Table data -->
								<td class="text-center text-sm-start text-primary-hover">
									<a href="#" class="text-body"><u>#0135689</u></a>
								</td>

								<!-- Table data -->
								<td>5/1/2022</td>

								<!-- Table data -->
								<td>$0</td>

								<!-- Table data -->
								<td>Free</td>
							</tr>

							<!-- Table item -->
							<tr>
								<!-- Table data -->
								<td>
									<h6 class="table-responsive-title mt-2 mt-lg-0 mb-0"><a href="#">Build
											Responsive Websites with HTML</a></h6>
								</td>
								<!-- Table data -->
								<td class="text-center text-sm-start text-primary-hover">
									<a href="#" class="text-body"><u>#0587623</u></a>
								</td>

								<!-- Table data -->
								<td>2/1/2022</td>

								<!-- Table data -->
								<td>$250</td>

								<!-- Table data -->
								<td>Credit Card</td>
							</tr>

							<!-- Table item -->
							<tr>
								<!-- Table data -->
								<td>
									<h6 class="table-responsive-title mt-2 mt-lg-0 mb-0"><a href="#">JavaScript:
											Full Understanding</a></h6>
								</td>
								<!-- Table data -->
								<td class="text-center text-sm-start text-primary-hover">
									<a href="#" class="text-body"><u>#0215789</u></a>
								</td>

								<!-- Table data -->
								<td>14/1/2022</td>

								<!-- Table data -->
								<td>$325</td>

								<!-- Table data -->
								<td>Debit Card</td>
							</tr>
						</tbody>
						<!-- Table body END -->
					</table>
					<!-- Table END -->
				</div>
				<!-- Order list table END -->

				<!-- Pagination START -->
				<div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
					<!-- Content -->
					<p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
					<!-- Pagination -->
					<nav class="d-flex justify-content-center mb-0" aria-label="navigation">
						<ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
							<li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i
										class="fas fa-angle-left"></i></a></li>
							<li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
							<li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
							<li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
							<li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
						</ul>
					</nav>
				</div>
				<!-- Pagination END -->
			</div>
			<!-- Card body START -->
		</div>
		<!--Card END  -->
	</div>
@endsection
