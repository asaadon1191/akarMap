<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.DashBoard') }}"><img src="{{ asset('assets/images/icon/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="" >      {{-- Admin --}} 
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-admin"></i><span>admin</span></a>
                        <ul class="collapse">
                            <li class="{{ url()->current() == 'http://localhost:8000/en/admin/admin' ? 'active' : '' }}"><a href="{{ route('admin.index') }}">all admins</a></li>
                            <li class="{{ url()->current() == 'http://localhost:8000/en/admin/admin/create' ? 'active' : '' }}"><a href="{{ route('admin.create') }}">create new admin</a></li>
                        </ul>
                    </li>

                     <li>                   {{-- Roles --}}
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>
                                Roles
                            </span></a>
                        <ul class="collapse">
                            {{--  @can('role-list')  --}}
                                <li><a href="{{ route('roles.index') }}">All Roles</a></li>
                            {{--  @endcan  --}}
                            {{--  @can('role-create')  --}}
                                <li><a href="{{ route('roles.create') }}">Create New Role</a></li>
                            {{--  @endcan  --}}
                            
                            
                        </ul>
                    </li>

                    
                    {{--  <li>                   
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Permissions</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('permission.index') }}">All Permissions</a></li>
                            <li><a href="{{ route('permission.create') }}">Create New Permission</a></li>
                        </ul>
                    </li>  --}}
                
                    <li>                    {{-- Companies --}}
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>Companies</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('company.index') }}">All Companies</a></li>
                            <li><a href="{{ route('company.create') }}">Create New Company</a></li>
                        </ul>
                    </li>
                {{--  @can('governorates index')  --}}
                <li>
                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Governorates</span></a>
                    <ul class="collapse">
                        <li><a href="{{ route('governorate.index') }}">All Governorates</a></li>
                        <li><a href="{{ route('governorate.create') }}"> Create New Governorate</a></li>
                    </ul>
                </li>
                {{--  @endcan  --}}
                    

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                            <span>Cities</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('city.index') }}">All Cities</a></li>
                            <li><a href="{{ route('city.create') }}">Create New City</a></li>
                        </ul>
                    </li> 

                     <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Projects</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('project.index') }}">All Projects</a></li>
                            <li><a href="{{ route('project.create') }}">Create New Project</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i>
                            <span>Project Images</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('project_images.index') }}">All Projects Images</a></li>
                            <li><a href="{{ route('project_images.create') }}">Create New Project Image</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i>
                            <span>BuildingTypes</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('BuildingType.index') }}">All Buldings Type</a></li>
                            <li><a href="{{ route('BuildingType.create') }}">Create New Buldings Type</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i>
                            <span>Buildings</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('Building.index') }}">All Buldings</a></li>
                            <li><a href="{{ route('Building.create') }}">Create New Buldings</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i>
                            <span>Building Images</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('BuildingImage.index') }}">All Buldings</a></li>
                            <li><a href="{{ route('BuildingImage.create') }}">Create New Buldings</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i>
                            <span>Attributes</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('Attribute.index') }}">All Attributes</a></li>
                            <li><a href="{{ route('Attribute.create') }}">Create New Attribute</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-align-left"></i> <span>Multi
                                level menu</span></a>
                        <ul class="collapse">
                            <li><a href="#">Item level (1)</a></li>
                            <li><a href="#">Item level (1)</a></li>
                            <li><a href="#" aria-expanded="true">Item level (1)</a>
                                <ul class="collapse">
                                    <li><a href="#">Item level (2)</a></li>
                                    <li><a href="#">Item level (2)</a></li>
                                    <li><a href="#">Item level (2)</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Item level (1)</a></li>
                        </ul>
                    </li> 
                </ul>
            </nav>
        </div>
    </div>
</div>