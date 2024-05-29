<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="site-logo nav-item text-center" href="{{ url('/admin/home') }}">
        {{-- <div><img class="w-100" src="{{ asset('images/logo.png') }}" /></div> --}}
        <div><img class="w-100" src="{{ url('public/images/logo.png') }}" /></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/invoice') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Patient Invoice</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#doctors_bar"
            aria-expanded="true" aria-controls="doctors_bar">
            <i class="fas fa-fw fa-cog"></i>
            <span>Doctors</span>
        </a>
        <div id="doctors_bar" class="collapse" aria-labelledby="doctors_bar" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/add_doctor') }}">Add Doctor</a>
                <a class="collapse-item" href="{{ url('/admin/view_doctor') }}">View Doctors</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#set_appointment"
            aria-expanded="true" aria-controls="set_appointment">
            <i class="fas fa-fw fa-cog"></i>
            <span>Schedule</span>
        </a>
        <div id="set_appointment" class="collapse" aria-labelledby="set_appointment" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/set_doctor_schedule') }}">Set Schedule</a>
                <a class="collapse-item" href="{{ url('/admin/select_doctor') }}">View
                    Schedule</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rights" aria-expanded="true"
            aria-controls="rights">
            <i class="fas fa-fw fa-cog"></i>
            <span>Rights</span>
        </a>
        <div id="rights" class="collapse" aria-labelledby="rights" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/add_rights') }}">Add Rights</a>
                <a class="collapse-item" href="{{ url('/admin/view_rights') }}">View Rights</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#patient_health"
            aria-expanded="true" aria-controls="patient_health">
            <i class="fas fa-fw fa-cog"></i>
            <span>Patient Health</span>
        </a>
        <div id="patient_health" class="collapse" aria-labelledby="patient_health" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/treatment') }}">Patient Treatments</a>
                <a class="collapse-item" href="{{ url('/admin/procedure') }}">Patient Procedure</a>
                <a class="collapse-item" href="{{ url('/admin/medication') }}">Patient Medication</a>
                <a class="collapse-item" href="{{ url('/admin/radiology') }}">Patient Radiology order</a>
                <a class="collapse-item" href="{{ url('/admin/investigation') }}">Patient Investigation</a>


            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#patient_lab_order"
            aria-expanded="true" aria-controls="patient_lab_order">
            <i class="fas fa-fw fa-cog"></i>
            <span>Patient Lab Order</span>
        </a>
        <div id="patient_lab_order" class="collapse" aria-labelledby="patient_lab_order" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{ url('/admin/lab-order') }}">Patient Lab Order</a>
                <a class="collapse-item" href="{{ url('/admin/lab-sub-order') }}">Patient Sub Lab Order</a>

            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#patient_inventory"
            aria-expanded="true" aria-controls="patient_inventory">
            <i class="fas fa-fw fa-cog"></i>
            <span>Patient Inventory</span>
        </a>
        <div id="patient_inventory" class="collapse" aria-labelledby="add_item" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/item-list') }}">Add Item</a>
                <a class="collapse-item" href="{{ url('/admin/manufacturer-list') }}">Add Manufacturer</a>
                <a class="collapse-item" href="{{ url('/admin/suppliers-list') }}">Add Suppliers</a>
                <a class="collapse-item" href="{{ url('/admin/category-list') }}">Add Category</a>
                <a class="collapse-item" href="{{ url('/admin/manage-stock-list') }}">Manage Stock</a>
                <a class="collapse-item" href="{{ url('/admin/stock-adjustment') }}"> Consume Stock</a>
                <a class="collapse-item" href="{{ url('/admin/asset-request-list') }}">Asset Request And Return</a>
                <a class="collapse-item" href="{{ url('/admin/stock-adjustment') }}">Stock Adjustment</a>

            </div>

        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report_bar"
            aria-expanded="true" aria-controls="report_bar">
            <i class="fas fa-fw fa-cog"></i>
            <span>Report</span>
        </a>
        <div id="report_bar" class="collapse" aria-labelledby="report_bar" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/patient_report') }}">Patient Report </a>
                <a class="collapse-item" href="{{ url('/admin/appointment_report') }}">Appointment Report</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#staff_bar"
            aria-expanded="true" aria-controls="staff_bar">
            <i class="fas fa-fw fa-cog"></i>
            <span>Staff Area</span>
        </a>
        <div id="staff_bar" class="collapse" aria-labelledby="staff_bar" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/add_staff') }}">Create Staff Login</a>
                <a class="collapse-item" href="{{ url('/admin/view_staff') }}">View Users</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#video_bar"
            aria-expanded="true" aria-controls="video_bar">
            <i class="fas fa-fw fa-cog"></i>
            <span>Videos / Articles</span>
        </a>
        <div id="video_bar" class="collapse" aria-labelledby="video_bar" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/view_videos') }}">Videos</a>
                <a class="collapse-item" href="{{ url('/admin/view_articles') }}">Article</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#language_bar"
            aria-expanded="true" aria-controls="language_bar">
            <i class="fas fa-fw fa-cog"></i>
            <span>Language</span>
        </a>
        <div id="language_bar" class="collapse" aria-labelledby="language_bar" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/add_language') }}">Add Language</a>
                <a class="collapse-item" href="{{ url('/admin/view_languages') }}">View Language</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#specaility_bar"
            aria-expanded="true" aria-controls="specaility_bar">
            <i class="fas fa-fw fa-cog"></i>
            <span>Services</span>
        </a>
        <div id="specaility_bar" class="collapse" aria-labelledby="specaility_bar" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/add_service') }}">Add Service</a>
                <a class="collapse-item" href="{{ url('/admin/view_service') }}">View Services</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#branch_bar"
            aria-expanded="true" aria-controls="branch_bar">
            <i class="fas fa-fw fa-cog"></i>
            <span>Branches</span>
        </a>
        <div id="branch_bar" class="collapse" aria-labelledby="branch_bar" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/add_branch') }}">Add Branch</a>
                <a class="collapse-item" href="{{ url('/admin/view_branches') }}">View Branch</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#session_bar"
            aria-expanded="true" aria-controls="session_bar">
            <i class="fas fa-fw fa-cog"></i>
            <span>Sessions</span>
        </a>
        <div id="session_bar" class="collapse" aria-labelledby="session_bar" aria-expanded="true"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/add_session') }}">Add Session</a>
                <a class="collapse-item" href="{{ url('/admin/view_sessions') }}">View Sessions</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/view_all_question') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>View Questions</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/view_all_users') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>View All Patient</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/view_appointment_queries') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>View All Appointment Queries</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
