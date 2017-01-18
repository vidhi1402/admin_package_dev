<div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">

        <li>
            <a @if(Request::route()->getName() == 'admin.dashboard.index') class="active"
               @endif href="{{route('admin.dashboard.index')}}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sub-menu">

            <a @if( Request::route()->getName() == 'admin.product.index'
                 ||  Request::route()->getName() == 'admin.product_category.index'
                  ||  Request::route()->getName() == 'admin.product_sub_category.index'
                  ||  Request::route()->getName() == 'admin.service.index'
                  ||  Request::route()->getName() == 'admin.service_category.index'
                  ||  Request::route()->getName() == 'admin.service_sub_category.index'
                  ||  Request::route()->getName() == 'admin.testimonial.index'
                  ||  Request::route()->getName() == 'admin.team_member.index'
                  ||  Request::route()->getName() == 'admin.contact_us.index'
                   )
               class="active" @endif href="javascript:;">
                <i class="fa fa-user"></i>
                <span>Administrator</span>
            </a>
            <ul class="sub">
                <li @if(Request::route()->getName() == 'admin.product.index') class="active" @endif><a
                            href="{{route('admin.product.index')}}">Product</a></li>
                <li @if(Request::route()->getName() == 'admin.product_category.index') class="active" @endif><a
                            href="{{route('admin.product_category.index')}}">Product Category</a></li>
                <li @if(Request::route()->getName() == 'admin.product_sub_category.index') class="active" @endif><a
                            href="{{route('admin.product_sub_category.index')}}">Product Sub-Category</a></li>
                <li @if(Request::route()->getName() == 'admin.service.index') class="active" @endif><a
                            href="{{route('admin.service.index')}}">Service</a></li>
                <li @if(Request::route()->getName() == 'admin.service_category.index') class="active" @endif><a
                            href="{{route('admin.service_category.index')}}">Service Category</a></li>
                <li @if(Request::route()->getName() == 'admin.service_sub_category.index') class="active" @endif><a
                            href="{{route('admin.service_sub_category.index')}}">Service Sub-Category</a></li>
                <li @if(Request::route()->getName() == 'admin.testimonial.index') class="active" @endif><a
                            href="{{route('admin.testimonial.index')}}">Testimonial</a></li>
                <li @if(Request::route()->getName() == 'admin.team_member.index') class="active" @endif><a
                            href="{{route('admin.team_member.index')}}">Team Member</a></li>
                <li @if(Request::route()->getName() == 'admin.contact_us.index') class="active" @endif><a
                            href="{{route('admin.contact_us.index')}}">Contact Us</a></li>
            </ul>
        </li>

    </ul>
    <!-- sidebar menu end-->
</div>