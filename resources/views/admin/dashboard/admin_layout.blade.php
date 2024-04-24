<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS - Admin Panel</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/pos_admin.png')}}" rel="icon">
    <link href="{{asset('img/pos_admin.png')}}" rel="nippon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/simple-datatables/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
   
    

    <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">


</head>
<body oncontextmenu="return false">

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="{{'/'}}" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="">
          <span class="d-none d-lg-block">POS</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->

      <!-- <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
          <input type="text" name="query" placeholder="Search" title="Enter search keyword">
          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
      </div> -->
      <!-- End Search Bar -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <!-- <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li>
          //End Search Icon -->

          <li class="nav-item dropdown">

              <!-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="badge bg-primary badge-number">4</span>
              </a> -->
            <!-- End Notification Icon -->
<!-- 
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
              <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                  <h4>Lorem Ipsum</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>30 min. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-x-circle text-danger"></i>
                <div>
                  <h4>Atque rerum nesciunt</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>1 hr. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                  <h4>Sit rerum fuga</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>2 hrs. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                <div>
                  <h4>Dicta reprehenderit</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>4 hrs. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
              </li>

            </ul> -->
            <!-- End Notification Dropdown Items -->

          <!-- </li> -->
          <!-- End Notification Nav -->

          <!-- <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-chat-left-text"></i>
              <span class="badge bg-success badge-number">3</span>
            </a><!-- End Messages Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
              <li class="dropdown-header">
                You have 3 new messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="assets/img/messages-1main-content.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Maria Hudson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>4 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Anna Nelson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>6 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>David Muldon</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>8 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="dropdown-footer">
                <a href="#">Show all messages</a>
              </li>

            </ul><!-- End Messages Dropdown Items -->

          <!-- </li>  -->
          <!-- End Messages Nav -->

          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="{{asset('img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2">{{isset(Auth::user()->name) ? Auth::user()->name : 'Profile' }}</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>{{isset(Auth::user()->name) ? Auth::user()->name : '-' }}</h6>
                <span>{{isset(Auth::user()->rolename) ? Auth::user()->rolename : '-' }}</span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
<!-- 
              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li> -->
              <!-- <li>
                <hr class="dropdown-divider">
              </li> -->

              <li>
                <a class="dropdown-item d-flex align-items-center" href="{{route('admin.logout')}}">
                  <i class="bi bi-gear"></i>
                  <span>Log Out</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
<!-- 
              <li>
                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                  <i class="bi bi-question-circle"></i>
                  <span>Need Help?</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li> -->

              <!-- <li>
               
              </li> -->

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
      </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

       
        <li class="nav-item">
          <a class="nav-link " href="{{url('/')}}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- End Dashboard Nav -->

        <!-- Enquriy Form -->
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#enquiry-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-info-square"></i><span>Role </span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="enquiry-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{url('/admin/role/create')}}">
                <i class="bi bi-circle"></i><span>Add Role </span>
              </a>
            </li>
            <li>
              <a href="{{url('/admin/role')}}">
                <i class="bi bi-circle"></i><span>Role List </span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End of Enquiry Form -->
         <!-- Batch Form -->
         <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#batch-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-diagram-2"></i><span>Batches </span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="batch-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{url('/admin/batch/create')}}">
                <i class="bi bi-circle"></i><span>Add Batch </span>
              </a>
            </li>
            <li>
              <a href="{{url('/admin/batch')}}">
                <i class="bi bi-circle"></i><span>Batch List </span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End of Batch Form -->
        <!-- Product Type Form -->
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#type-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-diagram-2"></i><span>Product  </span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="type-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{url('/admin/product/create')}}">
                <i class="bi bi-circle"></i><span>Add Product  </span>
              </a>
            </li>
            <li>
              <a href="{{url('/admin/product')}}">
                <i class="bi bi-circle"></i><span>Product List </span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End of Product Type Form -->
         <!-- Website Setting Form -->
         <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Customer Title</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="setting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{url('/admin/customertitle/create')}}">
                <i class="bi bi-circle"></i><span>Add Title </span>
              </a>
            </li>
            <li>
              <a href="{{url('/website')}}">
                <i class="bi bi-circle"></i><span>Title List </span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End of Website Setting Form -->

        <!-- Custom Order Setting Form -->
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#custom-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Custom Order</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="custom-nav" class="nav-content collapse " data-bs-parent="#custom-nav">
            <li>
              <a href="{{url('/admin/custom_order')}}">
                <i class="bi bi-circle"></i><span>Custom Order List</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End of Custom Order Form -->

          <!-- Customer List Form -->
          @if(auth()->user()->rolename =='Administration')
          <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#customerlist-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Customer List</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="customerlist-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{url('/admin/customerlist')}}">
                <i class="bi bi-circle"></i><span>Customer List </span>
              </a>
            </li>
          </ul>
        </li>
        @endif
        <!-- End of Customer List Form -->
<!-- 
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="components-alerts.html">
                <i class="bi bi-circle"></i><span>Alerts</span>
              </a>
            </li>
            <li>
              <a href="components-accordion.html">
                <i class="bi bi-circle"></i><span>Accordion</span>
              </a>
            </li>
            <li>
              <a href="components-badges.html">
                <i class="bi bi-circle"></i><span>Badges</span>
              </a>
            </li>
            <li>
              <a href="components-breadcrumbs.html">
                <i class="bi bi-circle"></i><span>Breadcrumbs</span>
              </a>
            </li>
            <li>
              <a href="components-buttons.html">
                <i class="bi bi-circle"></i><span>Buttons</span>
              </a>
            </li>
            <li>
              <a href="components-cards.html">
                <i class="bi bi-circle"></i><span>Cards</span>
              </a>
            </li>
            <li>
              <a href="components-carousel.html">
                <i class="bi bi-circle"></i><span>Carousel</span>
              </a>
            </li>
            <li>
              <a href="components-list-group.html">
                <i class="bi bi-circle"></i><span>List group</span>
              </a>
            </li>
            <li>
              <a href="components-modal.html">
                <i class="bi bi-circle"></i><span>Modal</span>
              </a>
            </li>
            <li>
              <a href="components-tabs.html">
                <i class="bi bi-circle"></i><span>Tabs</span>
              </a>
            </li>
            <li>
              <a href="components-pagination.html">
                <i class="bi bi-circle"></i><span>Pagination</span>
              </a>
            </li>
            <li>
              <a href="components-progress.html">
                <i class="bi bi-circle"></i><span>Progress</span>
              </a>
            </li>
            <li>
              <a href="components-spinners.html">
                <i class="bi bi-circle"></i><span>Spinners</span>
              </a>
            </li>
            <li>
              <a href="components-tooltips.html">
                <i class="bi bi-circle"></i><span>Tooltips</span>
              </a>
            </li>
          </ul>
        </li> -->
        <!-- End Components Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="forms-elements.html">
                <i class="bi bi-circle"></i><span>Form Elements</span>
              </a>
            </li>
            <li>
              <a href="forms-layouts.html">
                <i class="bi bi-circle"></i><span>Form Layouts</span>
              </a>
            </li>
            <li>
              <a href="forms-editors.html">
                <i class="bi bi-circle"></i><span>Form Editors</span>
              </a>
            </li>
            <li>
              <a href="forms-validation.html">
                <i class="bi bi-circle"></i><span>Form Validation</span>
              </a>
            </li>
          </ul>
        </li> -->
        <!-- End Forms Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="tables-general.html">
                <i class="bi bi-circle"></i><span>General Tables</span>
              </a>
            </li>
            <li>
              <a href="tables-data.html">
                <i class="bi bi-circle"></i><span>Data Tables</span>
              </a>
            </li>
          </ul>
        </li> -->
        <!-- End Tables Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="charts-chartjs.html">
                <i class="bi bi-circle"></i><span>Chart.js</span>
              </a>
            </li>
            <li>
              <a href="charts-apexcharts.html">
                <i class="bi bi-circle"></i><span>ApexCharts</span>
              </a>
            </li>
            <li>
              <a href="charts-echarts.html">
                <i class="bi bi-circle"></i><span>ECharts</span>
              </a>
            </li>
          </ul>
        </li> -->
        <!-- End Charts Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="icons-bootstrap.html">
                <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
              </a>
            </li>
            <li>
              <a href="icons-remix.html">
                <i class="bi bi-circle"></i><span>Remix Icons</span>
              </a>
            </li>
            <li>
              <a href="icons-boxicons.html">
                <i class="bi bi-circle"></i><span>Boxicons</span>
              </a>
            </li>
          </ul>
        </li> -->
        <!-- End Icons Nav -->

        <!-- <li class="nav-heading">Pages</li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="users-profile.html">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li> -->
        <!-- End Profile Page Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>F.A.Q</span>
          </a>
        </li> -->
        <!-- End F.A.Q Page Nav -->
<!-- 
        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-contact.html">
            <i class="bi bi-envelope"></i>
            <span>Contact</span>
          </a>
        </li> -->
        <!-- End Contact Page Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="pages-register.html">
            <i class="bi bi-card-list"></i>
            <span>Register</span>
          </a>
        </li> -->
        <!-- End Register Page Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="{{'/Admin/dashboard'}}">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Logout</span>
          </a>
        </li> -->
        <!-- End Login Page Nav -->

        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="pages-error-404.html">
            <i class="bi bi-dash-circle"></i>
            <span>Error 404</span>
          </a>
        </li> -->
        <!-- End Error 404 Page Nav -->
<!-- 
        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-blank.html">
            <i class="bi bi-file-earmark"></i>
            <span>Blank</span>
          </a>
        </li> -->
        <!-- End Blank Page Nav -->

      </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>{{$pagename}}</h1>
        @yield('breadcrumb')
      </div><!-- End Page Title -->

      <section class="section @yield('content-class')">
        @yield('main-content')
      </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>POS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a href="https://bootstrapmade.com/">Maung Win</a>
      </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('vendor/simple-datatables/simple-datatables.js')}}"></script>
    <!-- <script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script> -->
    <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
    


    <!-- Template Main JS File -->
    <script src="{{asset('js/main.js')}}"></script>
    
  </body>
</html>
<script>
    $(document).bind('contextmenu',function(){return false;});
    document.addEventListener("keydown", function (event){
        if (event.ctrlKey){
           event.preventDefault();
        }
        if(event.keyCode == 123){
            if(e.keyCode == 123) {
                return false;
               }
               if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
                return false;
               }
               if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
                return false;
               }
               if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
                return false;
               }

               if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
                return false;
               }
        }
    });
    document.addEventListener('contextmenu',
        event => event.preventDefault()
    );

</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> -->
  <!-- Tiny MCE  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.5.1/tinymce.min.js" integrity="sha512-UhysBLt7bspJ0yBkIxTrdubkLVd4qqE4Ek7k22ijq/ZAYe0aadTVXZzFSIwgC9VYnJabw7kg9UMBsiLC77LXyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     
  <!-- Tiny MCE -->
  <script src="https://code.jquery.com/jquery-git.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />





@yield('script')