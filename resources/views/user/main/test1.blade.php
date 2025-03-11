<ul class="sidebar-list">
    <li class="active-list">
        <div class="title">
            <a href="{{url('admin_index')}}" class="link">
                <i class="bi bi-grid-fill"></i>
                <span class="name">Dashboard</span>
            </a>
        </div>
        <div class="submenu">
            <a href="{{url('admin_index')}}" @if($page=="admin_index") style="font-weight:700;" @endif class="link submenu-title">Dashboard</a>
        </div>
    </li>

    <li class="dropdown">
        <div class="title">
            <a href="#" class="link ">
                <i class='bx bx-cog'></i>
                <span class="name">Home sections</span>
            </a>
            <i class='bx bxs-chevron-down'></i>
        </div>

        <div class="submenu">
            {{-- <a href="#" class="link submenu-title">Header User</a>
            <a href="{{ url('contact_form_list') }}" class="link">Contact form list</a>
            <a href="{{ url('user_about_us') }}" class="link">ABOUT</a>
            <a href="{{ url('admin_how_to_works') }}" class="link">HOW ITS WORKS</a>
            <a href="" class="link"></a>
            <a href="{{ url('admin_terms_condition') }}" class="link">TERM AND CONDITION</a>
            <a href="{{ url('admin_privacy_policy') }}" class="link">PRIVACY POLICY</a>
            <a href="{{ url('admin_Refund_policy') }}" class="link">REFUND POLICY</a>
            <a href="{{ url('admin_blog') }}" class="link">BLOG</a>
            <a href="{{ url('admin_career') }}" class="link">CAREER</a>
            <a href="{{ url('admin_media') }}" class="link">MEDIA</a> --}}
            <a href="{{ url('banner') }}"  @if($page=="banner") style="font-weight:700;" @endif class="link">Banner</a>
            <a href="{{ url('tools') }}"  @if($page=="tools") style="font-weight:700;" @endif  class="link">Key Features</a>
            <a href="{{ url('tool2') }}" @if($page=="tool2") style="font-weight:700;" @endif class="link">Home content</a>
            {{-- <a href="{{ url('tools') }}" class="link">Save Money</a>
            <a href="{{ url('tool2') }}" class="link">Heading Text</a> --}}
            <a href="{{ url('testimonials') }}" @if($page=="testimonials") style="font-weight:700;" @endif  class="link">Testimonials</a>
            <a href="{{ url('add_cru') }}" @if($page=="add_cru") style="font-weight:700;" @endif class="link">Storage company</a>
            <a href="{{ url('why_choose') }}" @if( $page=="why_choose") style="font-weight:700;" @endif  class="link">why choose us</a>

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
            <a href="{{ url('user_about_us') }}"  @if($page=="user_about_us") style="font-weight:700;" @endif class="link">About</a>
            <a href="{{ url('admin_how_to_works') }}"  @if($page=="admin_how_to_works") style="font-weight:700;" @endif class="link">How to works</a>
            <a href="{{ url('admin_terms_condition') }}" @if($page=="admin_terms_condition") style="font-weight:700;" @endif class="link">Terms & condition</a>
            <a href="{{ url('admin_privacy_policy') }}"  @if($page=="admin_privacy_policy") style="font-weight:700;" @endif class="link">Privacy policy</a>
            <a href="{{ url('admin_Refund_policy') }}" @if($page=="admin_Refund_policy") style="font-weight:700;" @endif class="link">Refund policy</a>
            <a href="{{ url('admin_blog') }}" @if($page=="admin_blog") style="font-weight:700;" @endif class="link">Blog</a>
            <a href="{{ url('admin_career') }}" @if($page=="admin_career") style="font-weight:700;" @endif class="link">Career</a>
            <a href="{{ url('admin_media') }}"  @if($page=="admin_media") style="font-weight:700;" @endif class="link">Media</a>
            {{-- <a href="{{ url('banner') }}" class="link">Banner</a> --}}

        </div>
    </li>

    <li class="dropdown">
        <div class="title">
            <a href="#" class="link">
                <i class="bi bi-box2"></i>
                <span class="name">Customer</span>
            </a>
            <i class='bx bxs-chevron-down'></i>
        </div>
        <div class="submenu">
            <a href="#" class="link submenu-title">Main user</a>
            {{-- <a href="{{ url('master') }}" class="link">About</a> --}}
            {{-- <a href="{{ url('master2') }}" class="link">helo</a> --}}
            {{-- <a href="{{ url('master3') }}" class="link">Navbar</a> --}}
            {{-- <a href="{{ url('admin_kyc') }}" class="link">KYC Table</a> --}}
            <a href="{{ url('total_user') }}" @if($page=="total_user") style="font-weight:700;" @endif class="link">Total users</a>
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
            <a href="{{ url('total_owner') }}" @if($page=="total_owner") style="font-weight:700;" @endif class="link">Total owner</a>
            <a href="{{ url('admin_bank_details') }}" @if($page=="admin_bank_details") style="font-weight:700;" @endif class="link">Owner bank details</a>
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
            <a href="{{ url('total_paking') }}" @if($page=="total_paking") style="font-weight:700;" @endif class="link">Total parking</a>
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
            <a href="{{url('payouts')}}" @if($page=="payouts") style="font-weight:700;" @endif class="link">Payouts</a>
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

            <a href="{{ url('contact_form_list') }}" @if($page=="contact_form_list") style="font-weight:700;" @endif class="link">Contact form list</a>
            <a href="{{ url('email_phone') }}" @if($page=="email_phone") style="font-weight:700;" @endif class="link">Your all-in-one Parking slot</a>
            <a href="{{url('listing_details')}}" @if($page=="listing_details") style="font-weight:700;" @endif class="link">
                Static listing
            </a>
            {{-- <a href="{{ url('admin_recent_order') }}" class="link">Total booking</a> --}}
            {{-- <a href="{{ url('admin_recent_order') }}" class="link">Recent order</a> --}}
            {{-- <a href="{{ url('total_user') }}" class="link">Total User</a>
            <a href="{{ url('total_owner') }}" class="link">Total Owner</a> --}}
        </div>
    </li>



    <li class="dropdown">
        <div class="title">
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

    <li>
        <div class="title">
            <a href="{{url('listing_details')}}" @if($page=="commission") style="font-weight:700;" @endif >
                <i class='bx bx-grid-alt'></i>
                <span class="name1">Static listing</span>
            </a>
            <!-- <i class='bx bxs-chevron-down'></i> -->
        </div>
    </li>
<li>

<li>

    <div class="title">
        <a href="{{url('admin_logout')}}" class="link">
            <i class="bi bi-box-arrow-right"></i>
            <span class="name1">Logout</span>
        </a>
    </div>

</li>
</ul>
