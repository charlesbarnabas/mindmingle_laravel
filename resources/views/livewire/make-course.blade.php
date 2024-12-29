@extends('layouts.app')
@push('custom-style')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/aos/aos.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/glightbox/css/glightbox.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/quill/css/quill.snow.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/stepper/css/bs-stepper.min.css') }}">
@endpush
@section('title', 'Create a course')
@section('content')
	<main>

		<!-- Page Banner START -->
		<section class="py-0 bg-blue h-100px align-items-center d-flex h-200px rounded-0"
			style="background:url({{ asset('assets/images/pattern/04.png') }}) no-repeat center center; background-size:cover;">
			<!-- Main banner background image -->
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<!-- Title -->
						<h1 class="text-white">Submit a new Course</h1>
					</div>
				</div>
			</div>
		</section>
		<!-- Page Banner END -->

		<!-- steps START -->
		<section>
			<div class="container">
				<div class="card bg-transparent border rounded-3 mb-5">
					<div id="stepper" class="bs-stepper stepper-outline">
						<!-- Card header -->
						<div class="card-header bg-light border-bottom px-lg-5">
							<!-- Step Buttons START -->
							<div class="bs-stepper-header" role="tablist">
								<!-- Step 1 -->
								<div class="step" data-target="#step-1">
									<div class="d-grid text-center align-items-center">
										<button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger1"
											aria-controls="step-1" aria-selected="true">
											<span class="bs-stepper-circle">1</span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Course details</h6>
									</div>
								</div>
								<div class="line"></div>

								<!-- Step 2 -->
								<div class="step" data-target="#step-2">
									<div class="d-grid text-center align-items-center">
										<button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger2"
											aria-controls="step-2" aria-selected="false">
											<span class="bs-stepper-circle">2</span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Course media</h6>
									</div>
								</div>
								<div class="line"></div>

								<!-- Step 3 -->
								<div class="step" data-target="#step-3">
									<div class="d-grid text-center align-items-center">
										<button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger3"
											aria-controls="step-3" aria-selected="false">
											<span class="bs-stepper-circle">3</span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Curriculum</h6>
									</div>
								</div>
								<div class="line"></div>

								<!-- Step 4 -->
								<div class="step" data-target="#step-4">
									<div class="d-grid text-center align-items-center">
										<button type="button" class="btn btn-link step-trigger mb-0" role="tab" id="steppertrigger4"
											aria-controls="step-4" aria-selected="false">
											<span class="bs-stepper-circle">4</span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Course preview</h6>
									</div>
								</div>
							</div>
							<!-- Step Buttons END -->
						</div>

						<!-- Card body START -->
						<div class="card-body">
							<!-- Step content START -->
							@if (!empty($successMsg))
								{{ $successMsg }}
							@endif
							<div class="bs-stepper-content">
								<form method="POST" action="{{ route('make.index') }}" enctype="multipart/form-data">
									@csrf
									<!-- Step 1 content START -->
									<div id="step-1" role="tabpanel" class="content fade dstepper-block" aria-labelledby="steppertrigger1">
										<!-- Title -->
										<h4>Course details</h4>

										<hr> <!-- Divider -->

										<!-- Basic information START -->
										<div class="row g-4">
											<!-- Course title -->
											<div class="col-12">
												<label class="form-label">Course title</label>
												<input class="form-control @error('masterclass_name') is-invalid @enderror" wire:model="masterclass_name"
													type="text" placeholder="Enter course title" value="{{ old('masterclass_name') }}">
												@error('masterclass_name')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>

											<!-- Short description -->
											<div class="col-12">
												<label class="form-label">Short description</label>
												<textarea class="form-control @error('masterclass_short_desc')  @enderror" wire:model="masterclass_short_desc"
												 rows="2" placeholder="Enter keywords">{{ old('masterclass_short_desc') }}</textarea>
												@error('masterclass_short_desc')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>

											<!-- Course category -->
											<div class="col-md-6">
												<label class="form-label" for="category">Select category</label>
												<select class="form-select form-select-sm js-choice" wire:model="category" id="category"
													aria-label=".form-select-sm ">
													<option value="">Select course category</option>
													@foreach ($categories as $category)
														<option value="{{ $category->category_id }}"
															{{ $category->category_id == old('category') ? 'selected' : 'is_invalid' }}>
															{{ $category->category_name }}</option>
													@endforeach
												</select>
												@error('category')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>

											<!-- Course level -->
											<div class="col-md-6">
												<label class="form-label" for="masterclass_level">Course level</label>
												<select class="form-select form-select-sm js-choice" wire:model="masterclass_level" id="masterclass_level"
													aria-label=".form-select-sm ">
													<option value="">Select course level</option>
													@foreach ($levels as $level)
														<option value="{{ $level->masterclass_level_id }}"
															{{ $level->masterclass_level_id == old('masterclass_level') ? 'selected' : 'is_invalid' }}>
															{{ $level->masterclass_level_name }}</option>
													@endforeach
												</select>
												@error('masterclass_level')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>

											<!-- Course Class Type -->
											<div class="col-md-6">
												<label class="form-label" for="class_type">Class Type</label>
												<select class="form-select form-select-sm js-choice" wire:model="class_type" id="class_type"
													aria-label=".form-select-sm example">
													<option value="">Select class type</option>
													@foreach ($classes as $class)
														<option value="{{ $class->class_type_id }}"
															{{ $class->class_type_id == old('class_type') ? 'selected' : 'is_invalid' }}>
															{{ $class->class_type_name }}
														</option>
													@endforeach
												</select>
												@error('class_type')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>

											<!-- Course Price Type -->
											<div class="col-md-6">
												<label class="form-label" for="price_type">Price Type</label>
												<select class="form-select form-select-sm js-choice" wire:model="price_type" id="price_type"
													aria-label=".form-select-sm example">
													<option value="">Select price type</option>
													@foreach ($prices as $price)
														<option value="{{ $price->price_type_id }}"
															{{ $price->price_type_id == old('price_type') ? 'selected' : 'is_invalid' }}>
															{{ $price->price_type_name }}
														</option>
													@endforeach
												</select>
												@error('price_type')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>

											<!-- Course time -->
											<div class="col-md-6">
												<label class="form-label">Course time</label>
												<input class="form-control @error('masterclass_total_duration') is-invalid @enderror" type="text"
													wire:model="masterclass_total_duration" placeholder="Enter course time">
												@error('masterclass_total_duration')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>

											<!-- Total lecture -->
											<div class="col-md-6">
												<label class="form-label">Total Curriculum</label>
												<input class="form-control @error('masterclass_total_curriculum') is-invalid @enderror" type="text"
													wire:model="masterclass_total_curriculum" placeholder="Enter total curriculumn">
												@error('masterclass_total_curriculum')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>

											<!-- Course price -->
											<div class="col-md-6">
												<label class="form-label">Course price</label>
												<input type="tel" class="form-control @error('price') is_invalid @enderror" wire:model="price"
													placeholder="Enter course price">
												@error('price')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
											</div>


											<!-- Course description -->
											<div class="col-12">
												<label class="form-label">Short description</label>
												<textarea class="form-control @error('masterclass_description') is-invalid @enderror"
												 wire:model="masterclass_description" rows="12" placeholder="Enter keywords">{{ old('masterclass_description') }}</textarea>
												@error('masterclass_description')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
												@enderror
												<!-- Step 1 button -->
												<div class="d-flex justify-content-end mt-3">
													<button type="button" wire:click="firstStepSubmit" class="btn btn-primary next-btn mb-0">Next</button>
												</div>
											</div>
											<!-- Basic information START -->
										</div>
									</div>
									<!-- Step 1 content END -->

									<!-- Step 2 content START -->
									<div id="step-2" role="tabpanel" class="content fade dstepper-none" aria-labelledby="steppertrigger2">
										<!-- Title -->
										<h4>Course media</h4>

										<hr> <!-- Divider -->

										<div class="row">
											<!-- Upload image START -->
											<div class="col-12">
												<div
													class="text-center justify-content-center align-items-center p-4 p-sm-5 border border-2 border-dashed position-relative rounded-3">
													<!-- Image -->
													<img id="thumbnail" class="h-200px" width="300"
														src="{{ asset('assets/images/element/gallery.svg') }}" alt="your image" />
													<div>
														<h6 class="my-2">Upload course image here, or<a href="#!" class="text-primary"> Browse</a>
														</h6>
														<label style="cursor:pointer;">
															<span>
																<input class="form-control stretched-link" id="masterclass_thumbnail" type="file"
																	wire:model="masterclass_thumbnail" id="image" accept="image/gif, image/jpeg, image/png">
															</span>
														</label>
														<p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG and PNG. Our suggested dimensions are 600px *
															450px.</p>
													</div>
												</div>
											</div>
											<!-- Upload image END -->

											<!-- Upload video START -->
											<div class="col-12">
												<h5 class="mt-4">Upload video</h5>
												<!-- Input -->
												<div class="position-relative my-4">
													<hr>
													<p class="small position-absolute top-50 start-50 translate-middle bg-body px-3 mb-0">Or</p>
												</div>
												<div class="col-12">
													<label class="form-label">Upload video</label>
													<div class="input-group mb-3">
														<input type="file"
															class="form-control file_video @error('masterclass_video_preview') is-invalid @enderror"
															wire:model="masterclass_video_preview" id="inputGroupFile01" accept="video/*">
														<label class="input-group-text">.mp4</label>
														@error('masterclass_video_preview')
															<div class="invalid-feedback">
																{{ $message }}
															</div>
														@enderror
													</div>
												</div>


												<!-- Preview -->
												<h5 class="mt-4">Video preview</h5>
												<div class="position-relative bg-dark rounded-3">
													<div class="video-player rounded-3">
														<video controls crossorigin="anonymous" class="rounded-3" playsinline poster="#">
															<source src="#" type="video/mp4" size="720" id="video_here">
															Your browser does not support HTML5 video.
														</video>
													</div>
												</div>
											</div>
											<!-- Upload video END -->

											<!-- Step 2 button -->
											<div class="d-flex justify-content-between mt-3">
												<button class="btn btn-secondary prev-btn mb-0" type="button" wire:click="back(1)">Previous</button>
												<button class="btn btn-primary next-btn mb-0" type="button" wire:click="secondStepSubmit">Next</button>
											</div>
										</div>
									</div>
									<!-- Step 2 content END -->

									<!-- Step 3 content START -->
									<div id="step-3" role="tabpanel" class="content fade dstepper-none" aria-labelledby="steppertrigger3">
										<!-- Title -->
										<h4>Curriculum</h4>

										<hr> <!-- Divider -->

										<div class="row">
											<!-- Add lecture Modal button -->
											<div class="d-sm-flex justify-content-sm-between align-items-center mb-3">
												<h5 class="mb-2 mb-sm-0">Upload Lecture</h5>
												<a href="#" class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal"
													data-bs-target="#addLecture"><i class="bi bi-plus-circle me-2"></i>Add Lecture</a>
											</div>

											<!-- Edit lecture START -->
											<div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
												<!-- Item START -->
												<div class="accordion-item mb-3">
													<h6 class="accordion-header font-base" id="heading-1">
														<button class="accordion-button fw-bold rounded d-inline-block collapsed d-block pe-5" type="button"
															data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false"
															aria-controls="collapse-1">
															Introduction of Digital Marketing
														</button>
													</h6>

													<div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
														data-bs-parent="#accordionExample2">
														<!-- Topic START -->
														<div class="accordion-body mt-3">
															<!-- Add topic -->
															<a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal"
																data-bs-target="#addTopic"><i class="bi bi-plus-circle me-2"></i>Add topic</a>
														</div>
														<!-- Topic END -->
													</div>
												</div>
												<!-- Item END -->
											</div>
											<!-- Edit lecture END -->

											<!-- Step 3 button -->
											<div class="d-flex justify-content-between">
												<button class="btn btn-secondary prev-btn mb-0" type="button" wire:click="back(2)">Previous</button>
												<button class="btn btn-primary next-btn mb-0" type="button" wire:click="thirdStepSubmit">Next</button>
											</div>
										</div>
									</div>
									<!-- Step 3 content END -->

									<!-- Step 4 content START -->
									<div id="step-4" role="tabpanel" class="content fade dstepper-none" aria-labelledby="steppertrigger4">
										<!-- Title -->
										<h4>Course Preview</h4>

										<hr> <!-- Divider -->

										<div class="row g-4">

											<!-- Edit faq START -->
											<div class="col-12">
												<div class="bg-light border rounded p-2 p-sm-4">
													<h5 class="mb-2 mb-sm-0">Thumbnail and video</h5>
													<div class="row g-4">
														<div class="col-12">
															<div class="video-player">
																<video controls crossorigin="anonymous" playsinline poster="assets/images/videos/poster.jpg">
																	<source src="assets/images/videos/360p.mp4" type="video/mp4" size="360">
																	<source src="assets/images/videos/720p.mp4" type="video/mp4" size="720">
																	<source src="assets/images/videos/1080p.mp4" type="video/mp4" size="1080">
																	<!-- Caption files -->
																	<track kind="captions" label="English" srclang="en" src="assets/images/videos/en.vtt" default>
																	<track kind="captions" label="French" srclang="fr" src="assets/images/videos/fr.vtt">
																</video>
															</div>
														</div>

														<div class="col-12">
															<div class="bg-body p-4 border rounded">
																<!-- Item 2 -->
																<div class="d-sm-flex justify-content-sm-between align-items-center mb-2">
																	<!-- Question -->
																	<h4 class="mb-0">Web Programming with Ruby on Rails</h4>
																</div>
																{{-- <ul class="list-inline mb-0">
																	<li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i class="fas fa-signal me-2"></i>Advance
																	</li>
																</ul> --}}

																<!-- Content -->
																<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius laudantium id commodi rerum molestiae
																	eveniet laborum autem? Neque eos, voluptas voluptates suscipit voluptatum similique veniam quis error
																	quia. Consequuntur fuga debitis eius rem, dolores mollitia ex amet? Itaque necessitatibus voluptatem
																	sequi, vitae fuga dolor, nemo reiciendis ipsa repellendus veritatis minima ipsum atque eos maiores
																	ipsam
																	accusamus totam aut, doloribus quae accusantium illo? Nemo aperiam harum iusto fugiat, quam dolorem,
																	quo
																	tenetur nulla reprehenderit accusamus architecto officia, ea quia iste deleniti earum pariatur nesciunt
																	optio assumenda minus dicta velit maxime? Consequuntur necessitatibus neque, animi voluptate ducimus
																	hic
																	perferendis sapiente provident. Iste.</p>
																<ul class="list-group list-group-borderless border-0">
																	<li class="list-group-item px-0 d-flex justify-content-between">
																		<span class="h6 fw-light mb-0"><i class="fas fa-fw fa-book-open text-primary"></i>Lectures</span>
																		<span>30</span>
																	</li>
																	<li class="list-group-item px-0 d-flex justify-content-between">
																		<span class="h6 fw-light mb-0"><i class="fas fa-fw fa-clock text-primary"></i>Duration</span>
																		<span>4h 50m</span>
																	</li>
																	<li class="list-group-item px-0 d-flex justify-content-between">
																		<span class="h6 fw-light mb-0"><i class="fas fa-fw fa-signal text-primary"></i>Skills</span>
																		<span>Beginner</span>
																	</li>
																	<li class="list-group-item px-0 d-flex justify-content-between">
																		<span class="h6 fw-light mb-0"><i class="fas fa-fw fa-medal text-primary"></i>Certificate</span>
																		<span>Yes</span>
																	</li>
																	<li class="list-group-item px-0 d-flex justify-content-between">
																		<span class="h6 fw-light mb-0"><i class="fas fa-puzzle-piece text-primary"></i>Category</span>
																		<span>Web Programming</span>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- Edit faq END -->

											<!-- Tags START -->
											<div class="col-12">
												<div class="bg-light border rounded p-4">
													<h5 class="mb-0">Tags</h5>
													<!-- Comment -->
													<div class="mt-3">
														<div class="choices" data-type="text" aria-haspopup="true" aria-expanded="false">
															<div class="choices__inner"><input type="text" class="form-control js-choice mb-0 choices__input"
																	data-placeholder="true" data-placeholder-val="Enter tags" data-max-item-count="14"
																	data-remove-item-button="true" hidden="" tabindex="-1" data-choice="active" value="">
																<div class="choices__list choices__list--multiple"></div><input type="text"
																	class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off"
																	spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="Enter tags"
																	placeholder="Enter tags" style="min-width: 11ch; width: 1ch;">
															</div>
															<div class="choices__list choices__list--dropdown" aria-expanded="false"></div>
														</div>
														<span class="small">Maximum of 14 keywords. Keywords should all be in lowercase and separated by
															commas.
															e.g. javascript, react, marketing</span>
													</div>
												</div>
											</div>
											<!-- Tags START -->

											<!-- Reviewer START -->
											<div class="col-12">
												<div class="bg-light border rounded p-4">

													<!-- Edit lecture START -->
													<div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
														<!-- Item START -->
														<div class="accordion-item mb-3">
															<h6 class="accordion-header font-base" id="heading-1">
																<button class="accordion-button fw-bold rounded d-inline-block collapsed d-block pe-5" type="button"
																	data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false"
																	aria-controls="collapse-1">
																	Introduction of Digital Marketing
																</button>
															</h6>

															<div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
																data-bs-parent="#accordionExample2">
																<!-- Topic START -->
																<div class="accordion-body mt-3">
																	<!-- Video item START -->
																	<div class="d-flex justify-content-between align-items-center">
																		<div class="position-relative">
																			<a href="#"
																				class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"><i
																					class="fas fa-play"></i></a>
																			<span class="ms-2 mb-0 h6 fw-light">Introduction</span>
																		</div>
																		<!-- Edit and cancel button -->
																		<div>
																			<a href="#" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0"><i
																					class="far fa-fw fa-edit"></i></a>
																			<button class="btn btn-sm btn-danger-soft btn-round mb-0"><i
																					class="fas fa-fw fa-times"></i></button>
																		</div>
																	</div>
																	<!-- Divider -->
																	<hr>
																	<!-- Video item END -->

																	<!-- Video item START -->
																	<div class="d-flex justify-content-between align-items-center">
																		<div class="position-relative">
																			<a href="#"
																				class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"><i
																					class="fas fa-play"></i></a>
																			<span class="ms-2 mb-0 h6 fw-light">What is Digital Marketing</span>
																		</div>
																		<!-- Edit and cancel button -->
																		<div>
																			<a href="#" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0"><i
																					class="far fa-fw fa-edit"></i></a>
																			<button class="btn btn-sm btn-danger-soft btn-round mb-0"><i
																					class="fas fa-fw fa-times"></i></button>
																		</div>
																	</div>
																	<!-- Divider -->
																	<hr>
																</div>
																<!-- Topic END -->
															</div>
														</div>
														<!-- Item END -->

														<!-- Item START -->
														<div class="accordion-item mb-3">
															<h6 class="accordion-header font-base" id="heading-2">
																<button class="accordion-button fw-bold rounded d-inline-block collapsed d-block pe-5" type="button"
																	data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false"
																	aria-controls="collapse-2">
																	Customer Life cycle
																</button>
															</h6>

															<div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2"
																data-bs-parent="#accordionExample2">
																<!-- Topic START -->
																<div class="accordion-body mt-3">
																	<!-- Video item START -->
																	<div class="d-flex justify-content-between align-items-center">
																		<div class="position-relative">
																			<a href="#"
																				class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"><i
																					class="fas fa-play"></i></a>
																			<span class="ms-2 mb-0 h6 fw-light">Introduction</span>
																		</div>
																		<!-- Edit and cancel button -->
																		<div>
																			<a href="#" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0"><i
																					class="far fa-fw fa-edit"></i></a>
																			<button class="btn btn-sm btn-danger-soft btn-round mb-0"><i
																					class="fas fa-fw fa-times"></i></button>
																		</div>
																	</div>
																	<!-- Divider -->
																	<hr>
																	<!-- Video item END -->

																	<!-- Video item START -->
																	<div class="d-flex justify-content-between align-items-center">
																		<div class="position-relative">
																			<a href="#"
																				class="btn btn-danger-soft btn-round btn-sm mb-0 stretched-link position-static"><i
																					class="fas fa-play"></i></a>
																			<span class="ms-2 mb-0 h6 fw-light">What is Digital Marketing</span>
																		</div>
																		<!-- Edit and cancel button -->
																		<div>
																			<a href="#" class="btn btn-sm btn-success-soft btn-round me-1 mb-1 mb-md-0"><i
																					class="far fa-fw fa-edit"></i></a>
																			<button class="btn btn-sm btn-danger-soft btn-round mb-0"><i
																					class="fas fa-fw fa-times"></i></button>
																		</div>
																	</div>
																	<!-- Divider -->
																	<hr>
																</div>
																<!-- Topic END -->
															</div>
														</div>
														<!-- Item END -->

														<!-- Item START -->
														<div class="accordion-item mb-3">
															<h6 class="accordion-header font-base" id="heading-3">
																<button class="accordion-button fw-bold collapsed rounded d-block pe-5" type="button"
																	data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false"
																	aria-controls="collapse-3">
																	How much should I offer the sellers?
																</button>
															</h6>
															<!-- Body -->
															<div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3"
																data-bs-parent="#accordionExample2">
																<div class="accordion-body mt-3">
																	<!-- Add topic -->
																	<a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal"
																		data-bs-target="#addTopic">
																		<i class="bi bi-plus-circle me-2"></i>Add topic
																	</a>
																</div>
															</div>
														</div>
														<!-- Item END -->

													</div>
													<!-- Edit lecture END -->
												</div>
											</div>
											<!-- Reviewer START -->

											<!-- Step 4 button -->
											<div class="d-md-flex justify-content-between align-items-start mt-4">
												<button class="btn btn-secondary prev-btn mb-2 mb-md-0" wire:click="back(3)">Previous</button>
												<div class="text-md-end">
													<button class="btn btn-success mb-2 mb-sm-0" type="submi" wire:click="submitForm">Submit a
														Course</button>
												</div>
											</div>
										</div>
									</div>
									<!-- Step 4 content END -->
								</form>
							</div>
						</div>
						<!-- Card body END -->
					</div>
				</div>
			</div>
		</section>
		<!-- Steps END -->
	</main>
	<div class="modal fade" id="addLecture" tabindex="-1" aria-labelledby="addLectureLabel" style="display: none;"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title text-white" id="addLectureLabel">Add Lecture</h5>
					<button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close"><i
							class="bi bi-x-lg"></i></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{ route('curriculum.store') }}" class="row text-start g-3">
						@csrf
						<!-- Course name -->
						<div class="col-12">
							<label class="form-label">Course name <span class="text-danger">*</span></label>
							<input type="text" class="form-control @error('curriculum_section_name') is-invalid @enderror"
								wire:model="curriculum_section_name" id="curriculum_section_name" placeholder="Enter course name" required>
							@error('curriculum_section_name')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
							<button type="submit" id="save" class="btn btn-success my-0" data-bs-dismiss="modal">Save
								Lecture</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

	<div class="modal fade" id="addTopic" tabindex="-1" aria-labelledby="addTopicLabel" style="display: none;"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title text-white" id="addTopicLabel">Add topic</h5>
					<button type="button" class="btn btn-sm btn-light mb-0" data-bs-dismiss="modal" aria-label="Close"><i
							class="bi bi-x-lg"></i></button>
				</div>
				<div class="modal-body">
					<form class="row text-start g-3">
						<!-- Topic name -->
						<div class="col-md-12">
							<label class="form-label">Topic name</label>
							<input class="form-control @error('curriculum_name') is-invalid @enderror" wire:model="curriculum_name"
								type="text" placeholder="Enter topic name">
							@error('curriculum_name')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
						<!-- Video link -->
						<div class="col-md-12">
							<label class="form-label">Upload video</label>
							<div class="input-group mb-3">
								<input type="file" class="form-control @error('curriculum_video') is-invalid @enderror"
									wire:model="curriculum_video" id="inputGroupFile01">
								<label class="input-group-text">.mp4</label>
								@error('curriculum_video')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
						<!-- Description -->
						<div class="col-12 mt-3">
							<label class="form-label">Course description</label>
							<textarea class="form-control @error('curriculum_description') is-invalid @enderror" rows="4"
							 wire:model="curriculum_description" placeholder="" spellcheck="false"></textarea>
							@error('curriculum_description')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success my-0">Save topic</button>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('custom-script')
	<script src="{{ asset('assets/vendor/choices/js/choices.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
	<script src="{{ asset('assets/vendor/glightbox/js/glightbox.js') }}"></script>
	<script src="{{ asset('assets/vendor/quill/js/quill.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/stepper/js/bs-stepper.min.js') }}"></script>

	<script>
	 masterclass_thumbnail.onchange = evt => {
	  const [file] = masterclass_thumbnail.files
	  if (file) {
	   thumbnail.src = URL.createObjectURL(file)
	  }
	 }

	 $(document).on("change", ".file_video", function(evt) {
	  var $source = $('#video_here');
	  $source[0].src = URL.createObjectURL(this.files[0]);
	  $source.parent()[0].load();
	 });


	 var a = 1;
	 var add = $('#save').on('click', function() {
	  a++;
	  $('#accordionExample2').append(`
        <div class="accordion-item mb-3">
            <h6 class="accordion-header font-base" id="heading-${innerHTML = a}">
				<button class="accordion-button fw-bold rounded d-inline-block collapsed d-block pe-5" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapse-${innerHTML = a}" aria-expanded="false"
					aria-controls="collapse-1">
					${$('#curriculum_name').val()}
				</button>
			</h6>

			<div id="collapse-${innerHTML = a}" class="accordion-collapse collapse show" aria-labelledby="heading-1"
			    data-bs-parent="#accordionExample2">
			        <!-- Topic START -->
			    <div class="accordion-body mt-3">
			        <!-- Add topic -->
			        <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal"
			        data-bs-target="#addTopic"><i class="bi bi-plus-circle me-2"></i>Add topic</a>
			    </div>
			    <!-- Topic END -->
			</div>
		</div>
        `)
	 })
	</script>
@endpush
