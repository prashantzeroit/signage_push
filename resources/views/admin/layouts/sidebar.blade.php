        <aside class="main-sidebar elevation-0" style="background:#8C64D2;">
            <a href="http://127.0.0.1:8000/admin" class="brand-link">
                <h1 style="color:#3B2C8B;"> Lo͟Go͟IPSUM </h1>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column elevation-0" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open" style="background:#3B2C8B">
                            <a href="http://127.0.0.1:8000/admin" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-columns-gap" viewBox="0 0 16 16">
                                    <path d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/></svg>
                                <p style="color:white;">
                            &nbsp;Dashboard
                        </p>
                    </a>
                </li>
            <br>
            @if(Helper::is_permission())
            <li class="nav-item">
                <a href="{{asset('admin/user/list')}}" class="nav-link">
                    <i class="nav-icon fa fa-users" style="color:white;"></i>
                        <p style="color:white;">
                        All Users
                        </p>
                    </a>
                </li>
            <br>
            @endif
            <li class="nav-item">
                <a href="{{asset('admin/signage/list')}}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-slack" viewBox="0 0 16 16">
                    <path d="M3.362 10.11c0 .926-.756 1.681-1.681 1.681S0 11.036 0 10.111C0 9.186.756 8.43 1.68 8.43h1.682v1.68zm.846 0c0-.924.756-1.68 1.681-1.68s1.681.756 1.681 1.68v4.21c0 .924-.756 1.68-1.68 1.68a1.685 1.685 0 0 1-1.682-1.68v-4.21zM5.89 3.362c-.926 0-1.682-.756-1.682-1.681S4.964 0 5.89 0s1.68.756 1.68 1.68v1.682H5.89zm0 .846c.924 0 1.68.756 1.68 1.681S6.814 7.57 5.89 7.57H1.68C.757 7.57 0 6.814 0 5.89c0-.926.756-1.682 1.68-1.682h4.21zm6.749 1.682c0-.926.755-1.682 1.68-1.682.925 0 1.681.756 1.681 1.681s-.756 1.681-1.68 1.681h-1.681V5.89zm-.848 0c0 .924-.755 1.68-1.68 1.68A1.685 1.685 0 0 1 8.43 5.89V1.68C8.43.757 9.186 0 10.11 0c.926 0 1.681.756 1.681 1.68v4.21zm-1.681 6.748c.926 0 1.682.756 1.682 1.681S11.036 16 10.11 16s-1.681-.756-1.681-1.68v-1.682h1.68zm0-.847c-.924 0-1.68-.755-1.68-1.68 0-.925.756-1.681 1.68-1.681h4.21c.924 0 1.68.756 1.68 1.68 0 .926-.756 1.681-1.68 1.681h-4.21z"/></svg>
                        <p style="color:white;">
                            Signage
                        </p>
                    </a>
                </li>
            <br>
            <li class="nav-item">
                <a href="{{asset('admin/playlist/add')}}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/></svg>
                        <p style="color:white;">
                            Add New Playlist
                        </p>
                    </a>
                </li>
            <br>
            <li class="nav-item">
                <a href="{{asset('admin/playlist/list')}}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-justify-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg>
                        <p style="color:white;">
                            Manage Playlist
                        </p>
                    </a>
                </li>
            <br>
            <li class="nav-item">
                <a href="http://127.0.0.1:8000/admin/profile" class="nav-link">
                    <i class="nav-icon fa fa-user" style="color:white;"></i>
                        <p style="color:white;">
                            Profile
                        </p>
                    </a>
                </li>
            <br>
            @if(Helper::is_permission())
            <li class="nav-item">
                <a href="{{asset('admin/term&condition/term_condition')}}" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                        <p style="color:white;">
                            T&C
                        </p>
                    </a>
                </li>
            <br>
            @endif
            <li class="nav-item">
                <a href="{{route('admin.logout')}}" class="nav-link" style="color:white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                        <path d="M7.5 1v7h1V1h-1z"/>
                            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                                </svg>&nbsp;&nbsp;
                            <p style="color:white;">Log Out</p>
                        </a>
                    </li>
                <br>
            </ul>
        </nav>
    </div>
</aside>