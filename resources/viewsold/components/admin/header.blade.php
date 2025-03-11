<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autopark Admin</title>
    <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/parsley/parsleycss.css') }}" />


    <script type="text/javascript" src="{{ asset('admin/editorPlugin/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/editorPlugin/tinymce/init-tinymce.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>

<body>

    @if ($message = Session::get('msg'))
        <input type="hidden" name="msg" id="msg" value="{{ $message }}">
    @endif
    @if ($message = Session::get('error'))
        <input type="hidden" name="error" id="error" value="{{ $message }}">
    @endif


    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>

                <form class="d-flex">
                    <img src="admin/admin_admin/images/adminpro.png" alt="" class="me-3">
                    @if (Auth::user())
                        <a href="#" class="pt-2">{{ Auth()->user()->name }}</a>
                        {{-- <a href="{{ url('logout') }}">Logout</a> --}}
                    @else
                        <a href="admin_login" class="pt-2">Admin</a>
                        <a href="#" class="link submenu-title">Logout</a>
                    @endif

                </form>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <!-- ========== Logo ============  -->
        <a href="#" class="logo-box">
            <i class='bx bx-menu'></i>
            <div>
                <h5>AutoPark</h5>
            </div>
        </a>

        <!-- ========== List ============  -->

        @if ($page == 'admin_index')
            <ul class="sidebar-list">
                <li class="active-list">
                    <div class="title">
                        <a href="{{ url('admin_index') }}" class="link">
                            <i class="bi bi-grid-fill"></i>
                            <span class="name">Dashboard</span>
                        </a>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('admin_index') }}"
                            @if ($page == 'admin_index') style="font-weight:700;" @endif
                            class="link submenu-title">Dashboard</a>
                    </div>
                </li>

                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Home sections</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">

                        <a href="{{ url('banner') }}" class="link">Banner</a>
                        <a href="{{ url('tools') }}" class="link">Key Features</a>
                        <a href="{{ url('tool2') }}" class="link">Home content</a>

                        <a href="{{ url('testimonials') }}" class="link">Testimonials</a>
                        <a href="{{ url('add_cru') }}" class="link">Storage company</a>
                        <a href="{{ url('why_choose') }}" class="link">why choose us</a>




                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Page Settings</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Header User</a>
                        <a href="{{ url('user_about_us') }}" class="link">About</a>
                        <a href="{{ url('admin_how_to_works') }}" class="link">How to works</a>
                        <a href="{{ url('admin_terms_condition') }}" class="link">Terms & condition</a>
                        <a href="{{ url('admin_privacy_policy') }}" class="link">Privacy policy</a>
                        <a href="{{ url('admin_Refund_policy') }}" class="link">Refund policy</a>
                        <a href="{{ url('admin_blog') }}" class="link">Blog</a>
                        <a href="{{ url('admin_career') }}" class="link">Career</a>
                        <a href="{{ url('admin_media') }}" class="link">Media</a>

                    </div>
                </li>

                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Customer management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_user') }}" class="link">Total users</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Owner management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_owner') }}" class="link">Total owner</a>
                        <a href="{{ url('admin_bank_details') }}" class="link">Owner bank details</a>

                    </div>
                </li>
                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Space managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_paking') }}" class="link">Total parking</a>

                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-tags"></i>
                            <span class="name">Payout managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('payouts') }}" class="link">Payouts</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-people"></i>
                            <span class="name">Contact managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('contact_form_list') }}" class="link">Contact form list</a>
                        <a href="{{ url('email_phone') }}" class="link">Your all-in-one Parking slot</a>
                        <a href="{{ url('listing_details') }}" class="link">
                            Static listing
                        </a>

                    </div>
                </li>



                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-bar-chart"></i>
                            <span class="name">Commision managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('commission') }}" class="link">Commission</a>
                    </div>

                </li>



                <li onclick="location.href = 'admin_logout';">
                    <div class="title" >
                        <a href="{{ url('admin_logout') }}" class="link">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="name1">Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        @elseif(
            $page == 'banner' ||
                $page == 'tools' ||
                $page == 'tool2' ||
                $page == 'testimonials' ||
                $page == 'add_cru' ||
                $page == 'why_choose')
            <ul class="sidebar-list">
                <li class="#">
                    <div class="title">
                        <a href="{{ url('admin_index') }}" class="link">
                            <i class="bi bi-grid-fill"></i>
                            <span class="name">Dashboard</span>
                        </a>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('admin_index') }}" class="link submenu-title">Dashboard</a>
                    </div>
                </li>

                <li class="dropdown">
                    <div class="title active-list">
                        <a href="#" class="link ">
                            <i class='bx bx-cog'></i>
                            <span class="name">Home sections</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>

                    <div class="submenu">

                        <a href="{{ url('banner') }}"
                            @if ($page == 'banner') style="font-weight:700;" @endif class="link">Banner</a>
                        <a href="{{ url('tools') }}"
                            @if ($page == 'tools') style="font-weight:700;" @endif class="link">Key
                            Features</a>
                        <a href="{{ url('tool2') }}"
                            @if ($page == 'tool2') style="font-weight:700;" @endif class="link">Home
                            content</a>

                        <a href="{{ url('testimonials') }}"
                            @if ($page == 'testimonials') style="font-weight:700;" @endif
                            class="link">Testimonials</a>
                        <a href="{{ url('add_cru') }}"
                            @if ($page == 'add_cru') style="font-weight:700;" @endif class="link">Storage
                            company</a>
                        <a href="{{ url('why_choose') }}"
                            @if ($page == 'why_choose') style="font-weight:700;" @endif class="link">why
                            choose us</a>

                    </div>
                </li>

                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Page Settings</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Header User</a>
                        <a href="{{ url('user_about_us') }}" class="link">About</a>
                        <a href="{{ url('admin_how_to_works') }}" class="link">How to works</a>
                        <a href="{{ url('admin_terms_condition') }}" class="link">Terms & condition</a>
                        <a href="{{ url('admin_privacy_policy') }}" class="link">Privacy policy</a>
                        <a href="{{ url('admin_Refund_policy') }}" class="link">Refund policy</a>
                        <a href="{{ url('admin_blog') }}" class="link">Blog</a>
                        <a href="{{ url('admin_career') }}" class="link">Career</a>
                        <a href="{{ url('admin_media') }}" class="link">Media</a>

                    </div>
                </li>






                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Customer management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_user') }}" class="link">Total users</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Owner management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_owner') }}" class="link">Total owner</a>
                        <a href="{{ url('admin_bank_details') }}" class="link">Owner bank details</a>

                    </div>
                </li>
                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Space managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_paking') }}" class="link">Total parking</a>

                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-tags"></i>
                            <span class="name">Payout managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('payouts') }}" class="link">Payouts</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-people"></i>
                            <span class="name">Contact managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('contact_form_list') }}" class="link">Contact form list</a>
                        <a href="{{ url('email_phone') }}" class="link">Your all-in-one Parking slot</a>
                        <a href="{{ url('listing_details') }}" class="link">
                            Static listing
                        </a>

                    </div>
                </li>



                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-bar-chart"></i>
                            <span class="name">Commision managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('commission') }}" class="link">Commission</a>
                    </div>

                </li>



                <li onclick="location.href = 'admin_logout';">
                    <div class="title" >
                        <a href="{{ url('admin_logout') }}" class="link">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="name1">Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        @elseif(
                $page == 'user_about_us' ||
                $page == 'admin_how_to_works' ||
                $page == 'admin_terms_condition' ||
                $page == 'admin_privacy_policy' ||
                $page == 'admin_Refund_policy' ||
                $page == 'admin_blog' ||
                $page == 'admin_career' ||
                $page == 'admin_media')
            <ul class="sidebar-list">

                <li class="#">
                    <div class="title">
                        <a href="{{ url('admin_index') }}" class="link">
                            <i class="bi bi-grid-fill"></i>
                            <span class="name">Dashboard</span>
                        </a>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('admin_index') }}" class="link submenu-title">Dashboard</a>
                    </div>
                </li>
                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Home sections</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">

                        <a href="{{ url('banner') }}" class="link">Banner</a>
                        <a href="{{ url('tools') }}" class="link">Key Features</a>
                        <a href="{{ url('tool2') }}" class="link">Home content</a>

                        <a href="{{ url('testimonials') }}" class="link">Testimonials</a>
                        <a href="{{ url('add_cru') }}" class="link">Storage company</a>
                        <a href="{{ url('why_choose') }}" class="link">why choose us</a>




                    </div>
                </li>

                <li class="dropdown ">
                    <div class="title active-list ">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Page Settings</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Header User</a>
                        <a href="{{ url('user_about_us') }}"
                            @if ($page == 'user_about_us') style="font-weight:700;" @endif class="link">About</a>
                        <a href="{{ url('admin_how_to_works') }}"
                            @if ($page == 'admin_how_to_works') style="font-weight:700;" @endif class="link">How to
                            works</a>
                        <a href="{{ url('admin_terms_condition') }}"
                            @if ($page == 'admin_terms_condition') style="font-weight:700;" @endif class="link">Terms &
                            condition</a>
                        <a href="{{ url('admin_privacy_policy') }}"
                            @if ($page == 'admin_privacy_policy') style="font-weight:700;" @endif class="link">Privacy
                            policy</a>
                        <a href="{{ url('admin_Refund_policy') }}"
                            @if ($page == 'admin_Refund_policy') style="font-weight:700;" @endif class="link">Refund
                            policy</a>
                        <a href="{{ url('admin_blog') }}"
                            @if ($page == 'admin_blog') style="font-weight:700;" @endif class="link">Blog</a>
                        <a href="{{ url('admin_career') }}"
                            @if ($page == 'admin_career') style="font-weight:700;" @endif
                            class="link">Career</a>
                        <a href="{{ url('admin_media') }}"
                            @if ($page == 'admin_media') style="font-weight:700;" @endif
                            class="link">Media</a>

                    </div>
                </li>

                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Customer management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_user') }}" class="link">Total users</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Owner management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_owner') }}" class="link">Total owner</a>
                        <a href="{{ url('admin_bank_details') }}" class="link">Owner bank details</a>

                    </div>
                </li>
                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Space managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_paking') }}" class="link">Total parking</a>

                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-tags"></i>
                            <span class="name">Payout managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('payouts') }}" class="link">Payouts</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-people"></i>
                            <span class="name">Contact managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('contact_form_list') }}" class="link">Contact form list</a>
                        <a href="{{ url('email_phone') }}" class="link">Your all-in-one Parking slot</a>
                        <a href="{{ url('listing_details') }}" class="link">
                            Static listing
                        </a>

                    </div>
                </li>



                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-bar-chart"></i>
                            <span class="name">Commision managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('commission') }}" class="link">Commission</a>
                    </div>

                </li>



                <li onclick="location.href = 'admin_logout';">
                    <div class="title" >
                        <a href="{{ url('admin_logout') }}" class="link">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="name1">Logout</span>
                        </a>
                    </div>
                </li>


            </ul>
        @elseif($page == 'total_user')
            <ul class="sidebar-list">

                <li class="#">
                    <div class="title">
                        <a href="{{ url('admin_index') }}" class="link">
                            <i class="bi bi-grid-fill"></i>
                            <span class="name">Dashboard</span>
                        </a>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('admin_index') }}" class="link submenu-title">Dashboard</a>
                    </div>
                </li>
                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Home sections</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">

                        <a href="{{ url('banner') }}" class="link">Banner</a>
                        <a href="{{ url('tools') }}" class="link">Key Features</a>
                        <a href="{{ url('tool2') }}" class="link">Home content</a>

                        <a href="{{ url('testimonials') }}" class="link">Testimonials</a>
                        <a href="{{ url('add_cru') }}" class="link">Storage company</a>
                        <a href="{{ url('why_choose') }}" class="link">why choose us</a>




                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Page Settings</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Header User</a>
                        <a href="{{ url('user_about_us') }}" class="link">About</a>
                        <a href="{{ url('admin_how_to_works') }}" class="link">How to works</a>
                        <a href="{{ url('admin_terms_condition') }}" class="link">Terms & condition</a>
                        <a href="{{ url('admin_privacy_policy') }}" class="link">Privacy policy</a>
                        <a href="{{ url('admin_Refund_policy') }}" class="link">Refund policy</a>
                        <a href="{{ url('admin_blog') }}" class="link">Blog</a>
                        <a href="{{ url('admin_career') }}" class="link">Career</a>
                        <a href="{{ url('admin_media') }}" class="link">Media</a>

                    </div>
                </li>

                <li class="dropdown">
                    <div class="title active-list">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Customer</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_user') }}" @if($page=="total_user") style="font-weight:700;" @endif class="link">Total users</a>
                    </div>
                </li>



                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Owner management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_owner') }}" class="link">Total owner</a>
                        <a href="{{ url('admin_bank_details') }}" class="link">Owner bank details</a>

                    </div>
                </li>
                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Space managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_paking') }}" class="link">Total parking</a>

                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-tags"></i>
                            <span class="name">Payout managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('payouts') }}" class="link">Payouts</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-people"></i>
                            <span class="name">Contact managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('contact_form_list') }}" class="link">Contact form list</a>
                        <a href="{{ url('email_phone') }}" class="link">Your all-in-one Parking slot</a>
                        <a href="{{ url('listing_details') }}" class="link">
                            Static listing
                        </a>

                    </div>
                </li>



                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-bar-chart"></i>
                            <span class="name">Commision managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('commission') }}" class="link">Commission</a>
                    </div>

                </li>



                <li onclick="location.href = 'admin_logout';">
                    <div class="title" >
                        <a href="{{ url('admin_logout') }}" class="link">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="name1">Logout</span>
                        </a>
                    </div>
                </li>


            </ul>
        @elseif($page == 'total_owner' || $page == 'admin_bank_details')
            <ul class="sidebar-list">
                <li class="#">
                    <div class="title">
                        <a href="{{ url('admin_index') }}" class="link">
                            <i class="bi bi-grid-fill"></i>
                            <span class="name">Dashboard</span>
                        </a>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('admin_index') }}" class="link submenu-title">Dashboard</a>
                    </div>
                </li>
                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Home sections</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">

                        <a href="{{ url('banner') }}" class="link">Banner</a>
                        <a href="{{ url('tools') }}" class="link">Key Features</a>
                        <a href="{{ url('tool2') }}" class="link">Home content</a>

                        <a href="{{ url('testimonials') }}" class="link">Testimonials</a>
                        <a href="{{ url('add_cru') }}" class="link">Storage company</a>
                        <a href="{{ url('why_choose') }}" class="link">why choose us</a>




                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Page Settings</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Header User</a>
                        <a href="{{ url('user_about_us') }}" class="link">About</a>
                        <a href="{{ url('admin_how_to_works') }}" class="link">How to works</a>
                        <a href="{{ url('admin_terms_condition') }}" class="link">Terms & condition</a>
                        <a href="{{ url('admin_privacy_policy') }}" class="link">Privacy policy</a>
                        <a href="{{ url('admin_Refund_policy') }}" class="link">Refund policy</a>
                        <a href="{{ url('admin_blog') }}" class="link">Blog</a>
                        <a href="{{ url('admin_career') }}" class="link">Career</a>
                        <a href="{{ url('admin_media') }}" class="link">Media</a>

                    </div>
                </li>

                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Customer management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_user') }}" class="link">Total users</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title active-list">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Owner management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_owner') }}"
                            @if ($page == 'total_owner') style="font-weight:700;" @endif class="link">Total
                            owner</a>
                        <a href="{{ url('admin_bank_details') }}"
                            @if ($page == 'admin_bank_details') style="font-weight:700;" @endif class="link">Owner
                            bank details</a>

                    </div>
                </li>

                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Space managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_paking') }}" class="link">Total parking</a>

                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-tags"></i>
                            <span class="name">Payout managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('payouts') }}" class="link">Payouts</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-people"></i>
                            <span class="name">Contact managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('contact_form_list') }}" class="link">Contact form list</a>
                        <a href="{{ url('email_phone') }}" class="link">Your all-in-one Parking slot</a>
                        <a href="{{ url('listing_details') }}" class="link">
                            Static listing
                        </a>

                    </div>
                </li>



                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-bar-chart"></i>
                            <span class="name">Commision managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('commission') }}" class="link">Commission</a>
                    </div>

                </li>



                <li onclick="location.href = 'admin_logout';">
                    <div class="title" >
                        <a href="{{ url('admin_logout') }}" class="link">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="name1">Logout</span>
                        </a>
                    </div>
                </li>



            </ul>
        @elseif($page == 'total_paking')
            <ul class="sidebar-list">

                <li class="#">
                    <div class="title">
                        <a href="{{ url('admin_index') }}" class="link">
                            <i class="bi bi-grid-fill"></i>
                            <span class="name">Dashboard</span>
                        </a>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('admin_index') }}" class="link submenu-title">Dashboard</a>
                    </div>
                </li>
                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Home sections</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">

                        <a href="{{ url('banner') }}" class="link">Banner</a>
                        <a href="{{ url('tools') }}" class="link">Key Features</a>
                        <a href="{{ url('tool2') }}" class="link">Home content</a>

                        <a href="{{ url('testimonials') }}" class="link">Testimonials</a>
                        <a href="{{ url('add_cru') }}" class="link">Storage company</a>
                        <a href="{{ url('why_choose') }}" class="link">why choose us</a>




                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Page Settings</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Header User</a>
                        <a href="{{ url('user_about_us') }}" class="link">About</a>
                        <a href="{{ url('admin_how_to_works') }}" class="link">How to works</a>
                        <a href="{{ url('admin_terms_condition') }}" class="link">Terms & condition</a>
                        <a href="{{ url('admin_privacy_policy') }}" class="link">Privacy policy</a>
                        <a href="{{ url('admin_Refund_policy') }}" class="link">Refund policy</a>
                        <a href="{{ url('admin_blog') }}" class="link">Blog</a>
                        <a href="{{ url('admin_career') }}" class="link">Career</a>
                        <a href="{{ url('admin_media') }}" class="link">Media</a>

                    </div>
                </li>






                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Customer management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_user') }}" class="link">Total users</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Owner management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_owner') }}" class="link">Total owner</a>
                        <a href="{{ url('admin_bank_details') }}" class="link">Owner bank details</a>

                    </div>
                </li>
                <li class="dropdown">
                    <div class="title active-list">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Space managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_paking') }}"
                            @if ($page == 'total_paking') style="font-weight:700;" @endif class="link">Total
                            parking</a>

                    </div>
                </li>

                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-tags"></i>
                            <span class="name">Payout managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('payouts') }}" class="link">Payouts</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-people"></i>
                            <span class="name">Contact managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('contact_form_list') }}" class="link">Contact form list</a>
                        <a href="{{ url('email_phone') }}" class="link">Your all-in-one Parking slot</a>
                        <a href="{{ url('listing_details') }}" class="link">
                            Static listing
                        </a>

                    </div>
                </li>



                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-bar-chart"></i>
                            <span class="name">Commision managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('commission') }}" class="link">Commission</a>
                    </div>

                </li>



                <li onclick="location.href = 'admin_logout';">
                    <div class="title" >
                        <a href="{{ url('admin_logout') }}" class="link">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="name1">Logout</span>
                        </a>
                    </div>
                </li>

            </ul>
        @elseif($page == 'payouts')
            <ul class="sidebar-list">

                <li class="#">
                    <div class="title">
                        <a href="{{ url('admin_index') }}" class="link">
                            <i class="bi bi-grid-fill"></i>
                            <span class="name">Dashboard</span>
                        </a>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('admin_index') }}" class="link submenu-title">Dashboard</a>
                    </div>
                </li>
                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Home sections</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">

                        <a href="{{ url('banner') }}" class="link">Banner</a>
                        <a href="{{ url('tools') }}" class="link">Key Features</a>
                        <a href="{{ url('tool2') }}" class="link">Home content</a>

                        <a href="{{ url('testimonials') }}" class="link">Testimonials</a>
                        <a href="{{ url('add_cru') }}" class="link">Storage company</a>
                        <a href="{{ url('why_choose') }}" class="link">why choose us</a>




                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Page Settings</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Header User</a>
                        <a href="{{ url('user_about_us') }}" class="link">About</a>
                        <a href="{{ url('admin_how_to_works') }}" class="link">How to works</a>
                        <a href="{{ url('admin_terms_condition') }}" class="link">Terms & condition</a>
                        <a href="{{ url('admin_privacy_policy') }}" class="link">Privacy policy</a>
                        <a href="{{ url('admin_Refund_policy') }}" class="link">Refund policy</a>
                        <a href="{{ url('admin_blog') }}" class="link">Blog</a>
                        <a href="{{ url('admin_career') }}" class="link">Career</a>
                        <a href="{{ url('admin_media') }}" class="link">Media</a>

                    </div>
                </li>






                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Customer management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_user') }}" class="link">Total users</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Owner management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_owner') }}" class="link">Total owner</a>
                        <a href="{{ url('admin_bank_details') }}" class="link">Owner bank details</a>

                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Space managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_paking') }}" class="link">Total parking</a>

                    </div>
                </li>
                <li class="dropdown">
                    <div class="title active-list">
                        <a href="#" class="link">
                            <i class="bi bi-tags"></i>
                            <span class="name">Payout managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('payouts') }}"
                            @if ($page == 'payouts') style="font-weight:700;" @endif
                            class="link">Payouts</a>
                    </div>
                </li>

                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-people"></i>
                            <span class="name">Contact managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('contact_form_list') }}" class="link">Contact form list</a>
                        <a href="{{ url('email_phone') }}" class="link">Your all-in-one Parking slot</a>
                        <a href="{{ url('listing_details') }}" class="link">
                            Static listing
                        </a>

                    </div>
                </li>



                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-bar-chart"></i>
                            <span class="name">Commision managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('commission') }}" class="link">Commission</a>
                    </div>

                </li>



                <li onclick="location.href = 'admin_logout';">
                    <div class="title" >
                        <a href="{{ url('admin_logout') }}" class="link">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="name1">Logout</span>
                        </a>
                    </div>
                </li>


            </ul>
        @elseif($page == 'contact_form_list' || $page == 'email_phone' || $page == 'listing_details')
            <ul class="sidebar-list">
                <li class="#">
                    <div class="title">
                        <a href="{{ url('admin_index') }}" class="link">
                            <i class="bi bi-grid-fill"></i>
                            <span class="name">Dashboard</span>
                        </a>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('admin_index') }}" class="link submenu-title">Dashboard</a>
                    </div>
                </li>
                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Home sections</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">

                        <a href="{{ url('banner') }}" class="link">Banner</a>
                        <a href="{{ url('tools') }}" class="link">Key Features</a>
                        <a href="{{ url('tool2') }}" class="link">Home content</a>

                        <a href="{{ url('testimonials') }}" class="link">Testimonials</a>
                        <a href="{{ url('add_cru') }}" class="link">Storage company</a>
                        <a href="{{ url('why_choose') }}" class="link">why choose us</a>




                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Page Settings</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Header User</a>
                        <a href="{{ url('user_about_us') }}" class="link">About</a>
                        <a href="{{ url('admin_how_to_works') }}" class="link">How to works</a>
                        <a href="{{ url('admin_terms_condition') }}" class="link">Terms & condition</a>
                        <a href="{{ url('admin_privacy_policy') }}" class="link">Privacy policy</a>
                        <a href="{{ url('admin_Refund_policy') }}" class="link">Refund policy</a>
                        <a href="{{ url('admin_blog') }}" class="link">Blog</a>
                        <a href="{{ url('admin_career') }}" class="link">Career</a>
                        <a href="{{ url('admin_media') }}" class="link">Media</a>

                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Customer management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_user') }}" class="link">Total users</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Owner management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_owner') }}" class="link">Total owner</a>
                        <a href="{{ url('admin_bank_details') }}" class="link">Owner bank details</a>

                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Space managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>

                        <a href="{{ url('total_paking') }}" class="link">Total parking</a>

                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-tags"></i>
                            <span class="name">Payout managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>
                        {{-- <a href="{{ url('admin_recent_order') }}" class="link">Total booking</a>
                    <a href="{{ url('total_user') }}" class="link">Total booking</a> --}}
                        <a href="{{ url('payouts') }}" class="link">Payouts</a>
                    </div>
                </li>

                <li class="dropdown">
                    <div class="title active-list">
                        <a href="#" class="link">
                            <i class="bi bi-people"></i>
                            <span class="name">Contact managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('contact_form_list') }}" @if($page=="contact_form_list") style="font-weight:700;" @endif class="link">Contact form list</a>
                        <a href="{{ url('email_phone') }}" @if($page=="email_phone") style="font-weight:700;" @endif class="link">Your all-in-one Parking slot</a>
                        <a href="{{url('listing_details')}}" @if($page=="listing_details") style="font-weight:700;" @endif class="link">
                            Static listing
                        </a>

                    </div>
                </li>





                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-bar-chart"></i>
                            <span class="name">Commision managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="{{url('commission')}}" class="link">Commission</a>
                    </div>

                </li>


                <li onclick="location.href = 'admin_logout';">
                    <div class="title" >
                        <a href="{{ url('admin_logout') }}" class="link">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="name1">Logout</span>
                        </a>
                    </div>
                </li>

            </ul>
        @elseif($page == 'commission')
            <ul class="sidebar-list">

                <li class="#">
                    <div class="title">
                        <a href="{{ url('admin_index') }}" class="link">
                            <i class="bi bi-grid-fill"></i>
                            <span class="name">Dashboard</span>
                        </a>
                    </div>
                    <div class="submenu">
                        <a href="{{ url('admin_index') }}" class="link submenu-title">Dashboard</a>
                    </div>
                </li>
                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Home sections</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">

                        <a href="{{ url('banner') }}" class="link">Banner</a>
                        <a href="{{ url('tools') }}" class="link">Key Features</a>
                        <a href="{{ url('tool2') }}" class="link">Home content</a>

                        <a href="{{ url('testimonials') }}" class="link">Testimonials</a>
                        <a href="{{ url('add_cru') }}" class="link">Storage company</a>
                        <a href="{{ url('why_choose') }}" class="link">why choose us</a>




                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class='bx bx-cog'></i>
                            <span class="name">Page Settings</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Header User</a>
                        {{-- <a href="{{ url('contact_form_list') }}" class="link">Contact form list</a> --}}
                        <a href="{{ url('user_about_us') }}" class="link">About</a>
                        <a href="{{ url('admin_how_to_works') }}" class="link">How to works</a>
                        <a href="{{ url('admin_terms_condition') }}" class="link">Terms & condition</a>
                        <a href="{{ url('admin_privacy_policy') }}" class="link">Privacy policy</a>
                        <a href="{{ url('admin_Refund_policy') }}" class="link">Refund policy</a>
                        <a href="{{ url('admin_blog') }}" class="link">Blog</a>
                        <a href="{{ url('admin_career') }}" class="link">Career</a>
                        <a href="{{ url('admin_media') }}" class="link">Media</a>
                        {{-- <a href="{{ url('banner') }}" class="link">Banner</a> --}}

                    </div>
                </li>






                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Customer management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>
                        {{-- <a href="{{ url('master') }}" class="link">About</a> --}}
                        {{-- <a href="{{ url('master2') }}" class="link">helo</a> --}}
                        {{-- <a href="{{ url('master3') }}" class="link">Navbar</a> --}}
                        {{-- <a href="{{ url('admin_kyc') }}" class="link">KYC Table</a> --}}
                        <a href="{{ url('total_user') }}" class="link">Total users</a>
                        {{-- <a href="{{ url('listing_details') }}" class="link">Owner Spaces details</a> --}}
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Owner management</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>
                        {{-- <a href="{{ url('master') }}" class="link">About</a> --}}
                        {{-- <a href="{{ url('master2') }}" class="link">helo</a> --}}
                        {{-- <a href="{{ url('master3') }}" class="link">Navbar</a> --}}
                        {{-- <a href="{{ url('admin_kyc') }}" class="link">KYC Table</a> --}}
                        <a href="{{ url('total_owner') }}" class="link">Total owner</a>
                        <a href="{{ url('admin_bank_details') }}" class="link">Owner bank details</a>
                        {{-- <a href="{{ url('listing_details') }}" class="link">Owner Spaces details</a> --}}

                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-box2"></i>
                            <span class="name">Space managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Main user</a>
                        {{-- <a href="{{ url('master') }}" class="link">About</a> --}}
                        {{-- <a href="{{ url('master2') }}" class="link">helo</a> --}}
                        {{-- <a href="{{ url('master3') }}" class="link">Navbar</a> --}}
                        {{-- <a href="{{ url('admin_kyc') }}" class="link">KYC Table</a> --}}
                        <a href="{{ url('total_paking') }}" class="link">Total parking</a>
                        {{-- <a href="{{ url('admin_bank_details') }}" class="link">Owner bank details</a>
                    <a href="{{ url('listing_details') }}" class="link">Owner Spaces details</a> --}}
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-tags"></i>
                            <span class="name">Payout managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>
                        {{-- <a href="{{ url('admin_recent_order') }}" class="link">Total booking</a>
                    <a href="{{ url('total_user') }}" class="link">Total booking</a> --}}
                        <a href="{{ url('payouts') }}" class="link">Payouts</a>
                    </div>
                </li>


                <li class="dropdown">
                    <div class="title">
                        <a href="#" class="link">
                            <i class="bi bi-people"></i>
                            <span class="name">Contact managment</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="#" class="link submenu-title">Owner Header</a>

                        <a href="{{ url('contact_form_list') }}" class="link">Contact form list</a>
                        <a href="{{ url('email_phone') }}" class="link">Your all-in-one Parking slot</a>
                        <a href="{{ url('listing_details') }}" class="link">
                            Static listing
                        </a>

                    </div>
                </li>

                <li class="dropdown">
                    <div class="title active-list">
                        <a href="#" class="link">
                            <i class="bi bi-bar-chart"></i>
                            <span class="name">Commision</span>
                        </a>
                        <i class='bx bxs-chevron-down'></i>
                    </div>
                    <div class="submenu">
                        <a href="{{url('commission')}}" @if($page=="commission") style="font-weight:700;" @endif class="link">Commission</a>
                    </div>

                </li>

                <li onclick="location.href = 'admin_logout';">
                    <div class="title" >
                        <a href="{{ url('admin_logout') }}" class="link">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="name1">Logout</span>
                        </a>
                    </div>
                </li>

            </ul>
        @endif





    </div>
