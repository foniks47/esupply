    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link"></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">

                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <!-- Notifications Dropdown Menu -->
                    <!-- Notifications Dropdown Menu -->
                    @canany(['pic', 'tluser', 'tlgam', 'admin'])
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-bell"></i>
                                <span
                                    class="badge badge-warning navbar-badge">{{ $notifpicapproverequest + $notifpicapprovedirect + $notiftluserapproverequest + $notiftlgamapproverequest }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span
                                    class="dropdown-item dropdown-header">{{ $notifpicapproverequest + $notifpicapprovedirect + $notiftluserapproverequest + $notiftlgamapproverequest }}
                                    Approval</span>
                                <div class="dropdown-divider"></div>
                                @canany(['pic', 'admin'])
                                    <a href="{{ route('approval.pic') }}" class="dropdown-item">
                                        <i class="fas fa-file mr-2"></i> {{ $notifpicapprovedirect }} Direct Pick Up
                                        Approval
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endcanany
                                @canany(['pic', 'admin'])
                                    <a href="{{ route('approval.pic') }}" class="dropdown-item">
                                        <i class="fas fa-file mr-2"></i> {{ $notifpicapproverequest }} Purchase Request
                                        Approval
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endcanany
                                @canany(['tluser', 'admin'])
                                    <a href="{{ route('approval.tluser') }}" class="dropdown-item">
                                        <i class="fas fa-file mr-2"></i> {{ $notiftluserapproverequest }} Purchase Request
                                        Approval
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endcanany
                                @canany(['tlgam', 'admin'])
                                    <a href="{{ route('approval.tlgam') }}" class="dropdown-item">
                                        <i class="fas fa-file mr-2"></i> {{ $notiftlgamapproverequest }} Purchase Request
                                        Approval
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endcanany
                                {{-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
                            </div>
                        </li>
                    @endcanany
                    <li class="nav-item">
                        <a data-toggle="modal" data-target="#logoutModal" href="#" type="submit"
                            class="btn btn-sm"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('logoutpage') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Logout</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
