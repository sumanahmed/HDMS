<aside id="sidebar_main">

    <div class="sidebar_main_header">
        <div class="sidebar_logo">
            <a href="{{ route("home") }}" class="sSidebar_hide sidebar_logo_large">
                <img class="logo_regular" src="{{asset('img/logo.jpg')}}" alt="" height="15" width="71"/>
            </a>            
        </div>
    </div>

    <div class="menu_section">
        <ul id="tiktok_account">
            <li id="sidebar_master" title="Dashboard">
                <a href="{{ route("home") }}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">Dashboard</span>
                </a>
            </li>

            <li id="sidebar_patient_setting" title="Setting">
                <a href="#" id="tiktok2">
                    <span class="menu_icon">
                        <i class="material-icons">settings</i>
                    </span>
                    <span class="menu_title">Patient</span>
                </a>
                <ul>
                    <li id="sidebar_patient">
                        <a href="{{ route('patient_index') }}">Patient</a>
                    </li>
                </ul>
            </li><li id="sidebar_test_setting" title="Test">
                <a href="#" id="tiktok1">
                    <span class="menu_icon">
                        <i class="material-icons">X</i>
                    </span>
                    <span class="menu_title">Test</span>
                </a>
                <ul>
                    <li id="sidebar_test_category">
                        <a href="{{ route('test_category_index') }}">Test Category</a>
                    </li>
                    <li id="sidebar_test">
                        <a href="">Test</a>
                    </li>
                    <li id="sidebar_test_report">
                        <a href="">Test Report</a>
                    </li>
                </ul>
            </li>

            <li id="sidebar_stuff" title="Stuff">
                <a href="{{ route("stuff_index") }}">
                    <span class="menu_icon"><i class="material-icons">person</i></span>
                    <span class="menu_title">Stuff</span>
                </a>
            </li>
            <li id="sidebar_doctor" title="Doctor">
                <a href="{{ route("doctor_index") }}">
                    <span class="menu_icon"><i class="material-icons">add_circle_outline</i></span>
                    <span class="menu_title">Doctor</span>
                </a>
            </li>

        </ul>
    </div>
</aside><!-- main sidebar end -->