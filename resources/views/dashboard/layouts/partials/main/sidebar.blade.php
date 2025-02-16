<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('assets/dashboard/images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SkillsHub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('assets/dashboard/images/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Omar Ali</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.categories.index') }}" class="nav-link">
                                    <i class=" fas fa-list nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.skills.index') }}" class="nav-link">
                                    <i class=" nav-icon fas fa-brain"></i>
                                    <p> skills</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.exams.index') }}" class="nav-link">
                                    <i class=" nav-icon  far fa-clipboard"></i>
                                    <p>Exam</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('dashboard.students.index') }}" class="nav-link">
                                    <i class=" nav-icon  fas  fa-user-graduate"></i>
                                    <p>Students</p>
                                </a>
                            </li>

                            @hasrole('superAdmin')
                            <li class="nav-item">
                                <a href="{{ route('dashboard.admins.index') }}" class="nav-link">
                                    <i class=" nav-icon  fas  fa-user-cog"></i>
                                    <p>Admins</p>
                                </a>
                            </li>
                            @endhasrole



                            <li class="nav-item">
                                <a href="{{ route('dashboard.messages.index') }}" class="nav-link">
                                    <i class="fas fa-envelope-square"></i>
                                    <p>Messages</p>
                                </a>
                            </li>


                        </ul>
                    </li>












                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>

</aside>
