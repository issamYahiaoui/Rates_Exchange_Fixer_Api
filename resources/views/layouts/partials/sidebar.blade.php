<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">


                <li> <a class=" waves-effect waves-dark" href="{{url('me')}}" >
                        <i class="fa fa-user-circle"></i>
                        <span class="hide-menu">Profile</span>
                    </a>

                </li>
                 @if(\Illuminate\Support\Facades\Auth::user()->role === "superadmin")
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-user"></i>
                            <span class="hide-menu">Users</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('users')}}">Users</a></li>
                            <li><a href="{{url('users/create')}}">Add User</a></li>
                        </ul>
                    </li>
                     @endif
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i>
                        <span class="hide-menu">Rate requests</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('rates')}}">Rate requests</a></li>
                        <li><a href="{{url('rates/create')}}">Add Rate request</a></li>

                    </ul>
                </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>