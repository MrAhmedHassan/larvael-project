<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Mahmoud Zidan</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                {{--                    @role('Admin|Teacher')--}}
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('teachers.index')}}" class="nav-link active">
                        {{--                            <i class="nav-icon fas fa-tachometer-alt"></i>--}}
                        <p>
                            Teacher
                            {{--                                <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>

                </li>
                {{--                    @endrole--}}
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('courses.index')}}" class="nav-link active">
                        {{--             courses               <i class="nav-icon fas fa-tachometer-alt"></i>--}}
                        <p>
                            Courses
                            {{--                                <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="/supporters" class="nav-link active">
                        {{--                            <i class="nav-icon fas fa-tachometer-alt"></i>--}}
                        <p>
                            Supporter
                            {{--                                <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        {{--                            <i class="nav-icon fas fa-tachometer-alt"></i>--}}
                        <p>
                            Students
                            {{--                                <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>
                </li>
                
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('comments.index')}}" class="nav-link active">
                        {{--                            <i class="nav-icon fas fa-tachometer-alt"></i>--}}
                        <p>
                            Students Comments
                            {{--                                <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>
                </li>


                <li class="nav-item has-treeview menu-open">
                    <a href="/statistics" class="nav-link active">
                        {{--                            <i class="nav-icon fas fa-tachometer-alt"></i>--}}
                        <p>
                            Statistics
                            {{--                                <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
