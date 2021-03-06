<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GYM system</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::user()->profile_image == null)
                <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                @else
                <img src="{{ asset(Auth::user()->profile_image) }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <p href="#" class="fw-bold text-white d-block">{{ Auth::user()->name }}</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard.
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                </li>
                <!-- Cities  -->
                @role('admin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-city"></i>
                        <p>
                            Cities.
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('city.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Cities.</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('city.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add a new city.</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- End of Cities -->
                <!-- City managers -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            City managers.
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/cityManager/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List cities managers.</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/cityManager/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new city manager.</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole
                <!-- End of city managers -->
                <!-- Gyms -->
                @role('admin|cityManager')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-dumbbell"></i>
                        <p>
                            Gyms.
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/gym/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List gyms.</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/gym/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new gym.</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- End of Gyms -->
                <!-- Gym managers. -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-dumbbell"></i>
                        <p>
                            Gym managers.
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('gymManager.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List gym managers.</p>
                            </a>
                        </li>
                        <li class="nav-item">

                            <a href="{{ route('gymManager.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new gym manager.</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endrole
                <!-- End of gym managers. -->
                <!-- Coaches -->
                @role('admin|cityManager|gymManager')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-ninja"></i>
                        <p>
                            Coaches.
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('coaches.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List coaches.</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('coaches.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add a new coach.</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- End of coaches -->
                <!-- users -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users.
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Users.</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End of users -->
                <!-- Training packages -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>
                            Training packages.
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('trainingPackeges.listPackeges') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List packages.</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('trainingPackeges.creatPackege') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add a new package.</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('PaymentPackage.stripe') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buy a package.</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('PaymentPackage.purchase_history') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Purchases history.</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end of training packages -->
                <!-- training sessions -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>
                            Training sessions.
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('trainingSession.listSessions') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List sessions.</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('trainingSession.training_session') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add a new session.</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <!-- end of training sessions -->
                <!-- Attendance Table -->
                <li class="nav-item">
                    <a href="{{ route('attendance') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Attendance table.
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('revenue') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            revenue card.
                        </p>
                    </a>
                </li>
                <!-- End of attendance table -->
                <!-- Banned Users -->
                <li class="nav-item">
                    <a href="{{ route('user.listBanned') }}" class="nav-link">
                        <i class="nav-icon fa fa-user-lock"></i>
                        <p> Banned Users </p>
                    </a>
                </li>
                <!-- End of banned users. -->

                @endrole


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

</aside>