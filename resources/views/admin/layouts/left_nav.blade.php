<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
	<div data-simplebar class="h-100">
		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<!-- Left Menu Start -->
			<ul class="metismenu list-unstyled" id="side-menu">
				<li class="menu-title" key="t-apps">Applications</li>
				<li class="{{ (request()->is('dashboard')) ? 'active mm-active' : '' }}">
					<a href="{!! url('/dashboard'); !!}" class="waves-effect">
						<i class="bx bxs-dashboard"></i>
						<span key="t-calendar">Dashboard</span>
					</a>
				</li>
				<li class="{{ (request()->is('admin*')) ? 'active mm-active' : '' }}">
					<a href="#" class="waves-effect">
						<i class="bx bx-user-circle"></i>
						<span key="t-calendar">Administrator</span>
					</a>
				</li>
				<li class="menu-title" key="t-apps">Consumer Detail</li>
				<li class="#">
					<a href="#" class="waves-effect">
						<i class="bx bx-user-check"></i>
						<span key="t-calendar">Registered Clients</span>
					</a>
				</li>
				
				<li class="menu-title" key="t-apps">Documents</li>
				<li class="">
					<a href="javascript: void(0);" class="has-arrow waves-effect ">
						<i class="bx bxs-bar-chart-alt-2"></i>
						<span key="t-charts">Documents</span>
					</a>
					<ul class="sub-menu mm-collapse mm-show" aria-expanded="false">
						<li class="{{ (request()->is('categories')) ? 'mm-active' : '' }}"><a href="{{route('categories')}}" key="t-apex-charts">Categories</a></li>
						<li class="{{ (request()->is('documents')) ? 'mm-active' : '' }}"><a href="{{route('documents')}}" key="t-e-charts">PDF</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
		<!-- Sidebar -->
	</div>
</div>
<!-- Left Sidebar End -->