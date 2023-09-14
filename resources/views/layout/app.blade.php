<!DOCTYPE html>
 <html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">

        <title>Misaeto | Gestion</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.png">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="{{ asset('template/css/plugins.css') }}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{ asset('template/css/main.css') }}">
          @yield('style')
        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="{{ asset('template/css/themes.css') }}">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="{{ asset('template/js/vendor/modernizr.min.js') }}"></script>

        <link rel="stylesheet" href="{{asset('template/toastr/css/toastr.min.css')}}" type="text/css">


    </head>
    <body>
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
                </div>
            </div>
            <!-- END Preloader -->

            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
                <!-- Alternative Sidebar -->
                <div id="sidebar-alt">
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-alt-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Sidebar Section -->
                            <a href="index.html" class="sidebar-title">
                                <i class="gi gi-cogwheel pull-right"></i> <strong>Header</strong>
                            </a>
                            <div class="sidebar-section">Section content..</div>
                            <!-- END Sidebar Section -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Alternative Sidebar -->

                <!-- Main Sidebar -->
                @include('layout.sidebar')
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">

                    @include('layout.header')
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">
                         <!-- eCommerce Dashboard Header -->
                         <div class="content-header">
                            <ul class="nav-horizontal text-center">
                                <li class="active">
                                    <a href="page_ecom_dashboard.html"><i class="fa fa-bar-chart"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="page_ecom_orders.html"><i class="gi gi-shop_window"></i> Orders</a>
                                </li>
                                <li>
                                    <a href="page_ecom_order_view.html"><i class="gi gi-shopping_cart"></i> Order View</a>
                                </li>
                                <li>
                                    <a href="page_ecom_products.html"><i class="gi gi-shopping_bag"></i> Products</a>
                                </li>
                                <li>
                                    <a href="page_ecom_product_edit.html"><i class="gi gi-pencil"></i> Product Edit</a>
                                </li>
                                <li>
                                    <a href="page_ecom_customer_view.html"><i class="gi gi-user"></i> Customer View</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END eCommerce Dashboard Header -->

                        @include('layout.menu')
                       @yield('contenu')
                    </div>
                    <!-- END Page Content -->

                    <!-- Footer -->
                   @include('layout.footer')
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="{{ asset('template/js/vendor/jquery.min.js') }}"></script>
        <script src="{{ asset('template/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('template/js/plugins.js') }}"></script>
        <script src="{{ asset('template/js/app.js') }}"></script>

        <script src="{{asset('template/toastr/js/toastr.min.js')}}"></script>
        <script src="{{asset('sweetalert2.all.min.js')}}"></script>

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#profile-img-tag').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#image_produit").change(function(){
                readURL(this);
            });

          $(function(){

            $("a.addproduct").on("click", function(){
                var url = "{{ route('produit.create') }}";
                // $(this).window.open(url);
                window.location.replace(url);
            });
            $("a.addcdeClt").on("click", function(){
                var url = "{{ route('commandeClient.create') }}";
                // $(this).window.open(url);
                window.location.replace(url);
            });
            $("a.allproducts").on("click", function(){
                var url = "{{ route('produit.index') }}";
                window.location.replace(url);
            });

            //   $.ajaxSetup({
            //       headers: {
            //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //       }
            //   });
          });

          function notification(type,message,title=null){
             switch (type) {
              case "success":
                  toastr.success(message,title);
                  break;

              case "warning":
                  toastr.warning(message,title);
                  break;

              case "error":
                  toastr.error(message,title);
                  break;

              default:
                  break;
             }
          }

          function flashAlert(htmlTitle,type,htmlContent){
              Swal.fire({
                  title: htmlTitle,
                  type: type, //info,error,danger,warning,success
                  html: htmlContent,
                  showCloseButton: true,
                  showCancelButton: false,
                  focusConfirm: false,
                  confirmButtonText: 'Ok',
                  confirmButtonAriaLabel: 'Thumbs up, great!',
                  cancelButtonText: 'Annuler',
                  cancelButtonAriaLabel: 'Thumbs down',
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                  cancelButtonClass: 'btn btn-info ml-1'
              });
          }
      </script>
        @yield('scripts')
    </body>
</html>
