<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
    @include('components.admin.head')
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
        @include('components.admin.sidebar')
        @include('components.admin.sidebar_setting')
		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->
		    @include('components.admin.navbar')
			<!-- partial -->
            @yield('content')


			<!-- partial:partials/_footer.html -->
			@include('components.admin.footer')
			<!-- partial -->

		</div>
	</div>
    @yield('js')
	@include('components.admin.js')

</body>
</html>
