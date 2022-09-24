<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content" style="min-height:800px">
        {{-- <div class="sidebar-user-material">
            <div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                    <li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
                    <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                    <li>
                        <a href="{{ url('/admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-switch2"></i>Logout
                        </a>
                        
                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div> --}}
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <li class=""><a href="{{url('/admin/student')}}"><i class="icon-home4"></i> <span>user pages</span></a></li>
                    <li class=""><a href="{{url('/admin/loads')}}"><i class="icon-home4"></i> <span>Loads</span></a></li>
{{--                     
                    <li>
                        <a href="{{ url('/admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-switch2"></i>Logout
                        </a>
                        
                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li> --}}
                    
                  
                    <!-- <li class=""><a href="" class="legitRipple">Permission Groups</a></li> -->
                   
                    
                    
                
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>