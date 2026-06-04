<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('dashboard_asset2/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_asset2/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_asset2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_asset2/css/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Enhanced Sidebar Styles -->
    <style>
        /* ========== IMPROVED SIDEBAR STYLES ========== */
        
        /* Sidebar Container */
        .sidebar {
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 100%);
        }
        
        /* Logo Section - Fixed overlapping */
        .logo-wrap {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 15px;
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
            padding-left: 2px;
            width: 100%;
        }
        
        .logo {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            flex-shrink: 0;
            padding-left: 2px;
        }
        
        .logo:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(76, 175, 80, 0.3);
        }
        
        .logo i {
            font-size: 24px;
            color: white;
        }
        
        .logo-info {
            flex: 1;
            min-width: 0;
        }
        
        .logo-text {
            display: block;
            font-size: 16px;
            font-weight: 700;
            color: white;
            letter-spacing: 0.5px;
            line-height: 1.3;
            padding-top: 20px;
            padding-left: 65px;
        }
        
        .logo-subtitle {
            display: block;
            font-size: 10px;
            color: rgba(255, 255, 255, 0.6);
            padding-top: 30px;
            padding-left: 85px;
        }
        
        /* Enhanced sidebar menu item interactions */
        aside .side-inner .nav-menu ul li a {
            position: relative;
            overflow: hidden;
            border-left: 3px solid transparent;
            padding-left: 20px;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        aside .side-inner .nav-menu ul li a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(180deg, #4CAF50, #45a049);
            transform: translateY(-100%);
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        aside .side-inner .nav-menu ul li a:hover {
            color: #fff;
            background: linear-gradient(90deg, rgba(76, 175, 80, 0.1) 0%, rgba(76, 175, 80, 0) 100%);
            padding-left: 25px;
            border-left-color: #4CAF50;
        }

        aside .side-inner .nav-menu ul li a:hover::before {
            transform: translateY(0);
        }

        /* Animate icon on hover */
        aside .side-inner .nav-menu ul li a .material-icons {
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1), color 0.35s ease;
        }

        aside .side-inner .nav-menu ul li a:hover .material-icons {
            transform: scale(1.2) rotate(5deg);
            color: #4CAF50;
        }

        /* Active menu item styling */
        aside .side-inner .nav-menu ul li.active a {
            color: #fff;
            background: linear-gradient(90deg, #4CAF50 0%, rgba(76, 175, 80, 0.8) 100%);
            border-left-color: #4CAF50;
            font-weight: 600;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        aside .side-inner .nav-menu ul li.active a::before {
            transform: translateY(0);
        }

        aside .side-inner .nav-menu ul li.active a .material-icons {
            color: #fff;
            transform: scale(1.15);
        }

        /* Logout item special styling */
        .nav-menu ul li:last-child {
            margin-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 15px;
        }

        /* Smooth text transition for menu text */
        aside .side-inner .nav-menu ul li a .menu-text {
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .show-sidebar aside .side-inner .nav-menu ul li a .menu-text {
            opacity: 1;
            visibility: visible;
        }

        /* Toggle button animation */
        aside .toggle .burger {
            transition: all 0.35s ease;
        }

        aside .toggle .burger:hover {
            background: rgba(76, 175, 80, 0.1);
            border-radius: 4px;
        }

        aside .toggle .burger:hover span,
        aside .toggle .burger:hover::before,
        aside .toggle .burger:hover::after {
            background: #4CAF50;
        }
        
        /* Animation for menu items */
        .nav-menu ul li {
            animation: fadeInLeft 0.3s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-15px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .nav-menu ul li:nth-child(1) { animation-delay: 0.05s; }
        .nav-menu ul li:nth-child(2) { animation-delay: 0.1s; }
        .nav-menu ul li:nth-child(3) { animation-delay: 0.15s; }
        .nav-menu ul li:nth-child(4) { animation-delay: 0.2s; }
        .nav-menu ul li:nth-child(5) { animation-delay: 0.25s; }
        
        /* Alert styles */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 15px 20px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border-left: 4px solid #28a745;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border-left: 4px solid #dc3545;
        }
        
        .alert-warning {
            background: linear-gradient(135deg, #fff3cd, #ffeeba);
            color: #856404;
            border-left: 4px solid #ffc107;
        }
    </style>

    <title>{{ config('app.name', 'Dashboard') }} - Admin Panel</title>
</head>

<body>

    <aside class="sidebar">
        <div class="toggle">
            <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
        </div>
        <div class="side-inner">

            <!-- Improved Logo Section - Changed icon to shield -->
            <div class="logo-wrap">
                <div class="logo">
                    <!-- <i class="fas fa-shield-alt"></i> -->
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="logo-info">
                    <span class="logo-text">Admin Panel</span>
                    <span class="logo-subtitle">Ethiopian AI Institute</span>
                </div>
            </div>

            <div class="nav-menu">
                <ul>
                    <li class="{{ request()->routeIs('home') || request()->is('/') ? 'active' : '' }}">
                        <a href="/" class="d-flex align-items-center">
                            <span class="material-icons mr-3">dashboard</span>
                            <span class="menu-text">Home</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('posts.*') ? 'active' : '' }}">
                        <a href="{{ route('posts.index') }}" class="d-flex align-items-center">
                            <span class="material-icons mr-3">announcement</span>
                            <span class="menu-text">Announcements</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('systems.*') ? 'active' : '' }}">
                        <a href="{{ route('systems.index') }}" class="d-flex align-items-center">
                            <span class="material-icons mr-3">settings</span>
                            <span class="menu-text">Services</span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}" class="d-flex align-items-center">
                            <span class="material-icons mr-3">people</span>
                            <span class="menu-text">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex align-items-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="material-icons mr-3">logout</span>
                            <span class="menu-text">Logout</span>
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </aside>

    <main>
        <div class="site-section">
            <div class="container">
                <div class="row justify-content-center">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('warning'))
                        <div class="alert alert-warning alert-dismissible fade show w-100" role="alert">
                            <i class="fas fa-exclamation-triangle"></i> {{ session('warning') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('dashboard_asset2/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('dashboard_asset2/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard_asset2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard_asset2/js/main.js') }}"></script>

    <!-- Active menu item highlighting based on current route -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = window.location.pathname;
            const menuItems = document.querySelectorAll('.nav-menu ul li');
            
            // Remove all active classes first
            menuItems.forEach(item => {
                item.classList.remove('active');
            });
            
            // Check each menu link
            const navLinks = document.querySelectorAll('.nav-menu ul li a');
            
            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                
                if (href && href !== '#') {
                    // Exact match for home page
                    if (href === '/' && (currentUrl === '/' || currentUrl === '/index.php')) {
                        link.closest('li').classList.add('active');
                    }
                    // For other routes, check if current URL starts with the href
                    else if (href !== '/' && currentUrl.startsWith(href)) {
                        link.closest('li').classList.add('active');
                    }
                    // For route names (posts, systems, users)
                    else if (link.closest('li').classList.contains('active') === false) {
                        // Check if current URL matches any route pattern
                        if (currentUrl.includes('/posts') && href.includes('/posts')) {
                            link.closest('li').classList.add('active');
                        } else if (currentUrl.includes('/systems') && href.includes('/systems')) {
                            link.closest('li').classList.add('active');
                        } else if (currentUrl.includes('/users') && href.includes('/users')) {
                            link.closest('li').classList.add('active');
                        }
                    }
                }
            });

            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut(500, function() {
                    $(this).remove();
                });
            }, 5000);
        });
    </script>

</body>
</html>