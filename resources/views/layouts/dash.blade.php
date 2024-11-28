<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App UI kit.">
    <meta name="keyword" content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon"> 
    <title>@yield('title', 'Home')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/luno-style.css') }}">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMW7h5j6f3K5Cq0K5w5Nf3E5k5k5N5Zz2P2q0" crossorigin="anonymous">    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <style>
        body {
            display: flex;  /* Use flexbox for the main layout */
            height: 100vh; /* Full height for the layout */
            margin: 0;     /* Remove default margin */
        }

        .sidebar {
            max-height: 800px; 
           
            width: 400px; /* Fixed width for the sidebar */
            background-color: #f8f9fa; /* Sidebar background color */
            padding: 15px; /* Padding inside the sidebar */
            overflow-y: auto; 
            margin-right: 20px;
            
            /* Allow scrolling if content overflows */
        }

        .main-content {
            flex-grow: 1; /* Allow the main content to fill the remaining space */
            display: flex;
            flex-direction: column; /* Stack header and content vertically */
        }

        .page-header {
            position: sticky; /* Keep the header at the top */
            top: 0;
            z-index: 1000; /* Ensure it stays on top of other content */
            padding: 10px; /* Padding in the header */
        }

        .dashed-divider {
            border-top: 1px dashed #ccc; /* Dashed line style */
            margin: 10px 0; /* Spacing around the dashed line */
        }
    </style>
    @include('layouts.head') <!-- Include any additional head content -->
</head>

<body class="layout-1" data-luno="theme-blue">
    
    <div class="sidebar">
        <div class="container-fluid">
            <div class="title-text d-flex align-items-center mb-4 mt-1">
                @include('layouts.sidebar') 
            </div>
            <div class="dashed-divider"></div> <!-- Dashed line here -->
        </div>
    </div>

    <div class="main-content">
        <header class="page-header sticky-top px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
            <div class="container-fluid">
                @include('layouts.header')
            </div>
        </header>

        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
            <div class="container-fluid">
                <div class="row">
                    <!-- Total Stores Card -->
                    <div class="col-md-6 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Stores</h5>
                                <h2 class="card-text">{{ $totalStores }}</h2>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Total Clients Card -->
                    <div class="col-md-6 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Clients</h5>
                                <h2 class="card-text">{{ $totalClients }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Products</h5>
                                <h2 class="card-text">{{ $totalProducts }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Orders</h5>
                                <h2 class="card-text">{{ $totalOrders }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                @yield('content') <!-- Main content goes here -->
            </div>
        </div>


    
        @include('layouts.footer') <!-- Include footer -->
    </div>

    <!-- JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    @yield('js') <!-- Allow child templates to include additional JavaScript -->
    
</body>
</html>