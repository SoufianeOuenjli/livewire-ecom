	<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="{{request()->routeIs('dashboard') ? 'active' : ''}}">
                        <a href="{{route('dashboard')}}" wire:navigate><i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="{{route('dashboard')}}" wire:navigate><i class="fe fe-layout"></i> <span>Appointments</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->
