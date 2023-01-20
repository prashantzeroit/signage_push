<!DOCTYPE html>
<html lang="en">
<head>  
    @include('admin.layouts.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('admin.layouts.header')
            @include('admin.layouts.sidebar')

            <div class="page-wrapper dasboardViewpage" style="min-height: 428px;">
                <div ui-view class="app-body" id="view">
                    @include('admin.layouts.errors')
                </div>
                <div class="content-wrapper">
                    @yield('content')
                    @include('admin.layouts.foot')
                </div>
            </div>
             @include('admin.layouts.footer')
        </div>
</body>
</html>