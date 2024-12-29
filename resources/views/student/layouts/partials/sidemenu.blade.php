<!-- Responsive offcanvas body START -->
<nav class="navbar navbar-light navbar-expand-xl mx-0">
	<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
		{{-- Offcanvas header --}}
		<div class="offcanvas-header bg-light">
			<h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>

		{{-- Offcanvas body --}}
		<div class="offcanvas-body p-3 p-xl-0">
			<div class="bg-dark border rounded-3 pb-0 p-3 w-100">
				<!-- Dashboard menu -->
				<div class="list-group list-group-dark list-group-borderless">
					<a class="list-group-item active" href="{{ route('student.index') }}"><i
							class="bi bi-ui-checks-grid fa-fw me-2"></i>Dashboard</a>
					<a class="list-group-item" href="{{ route('student.mycourse') }}"><i class="bi bi-basket fa-fw me-2"></i>My
						Courses</a>
					<a class="list-group-item" href="{{ route('student.setting') }}"><i class="bi bi-gear fa-fw me-2"></i>Settings</a>
					<a class="list-group-item text-danger bg-danger-soft-hover" href="{{ route('logout') }}"><i
							class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
				</div>
			</div>
		</div>
	</div>
</nav>
<!-- Responsive offcanvas body END -->
