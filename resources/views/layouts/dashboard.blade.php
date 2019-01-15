@extends('layouts.plane')

@section('body')

<div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <h3 style="color:#337AB7;">THE BANYAN</h3>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->
                
                <!-- END PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                               <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user dropdown-dark">
                                <?php
                                $vars = Auth::user();
                                $id = $vars->id;
                                ?>
                                <a href="{{ URL::to('editprofile/' . $id . '/edit') }}" class="dropdown-toggle">
                                    <i class="fa fa-user"></i>
                                </a>

                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="{{url('logout')}}" class="dropdown-toggle" >

                                    <i class="icon-logout"></i>
                                </a>

                            </li>

                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>

                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->

        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                   
                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start">
                            <a onClick="location.href='{{ URL::to('member-status') }}'" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Features</h3>
                        </li>

                      
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-users"></i>
                                        <span class="title">Topup List</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a onClick="location.href='{{ URL::to('bill') }}'" class="nav-link ">
                                                <span class="title">Topup List</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                       
                          <?php
                        $author = Auth::user();
                        $role = $author->role;
                        if($role == 'SuperAdmin' || $role == 'Admin'){
                        ?>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Staff List</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item ">
                                    <a onClick="location.href='{{ URL::to('all_staff') }}'" class="nav-link ">
                                        <span class="title">Lock Staff</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a onClick="location.href='{{ URL::to('all_staff_topup') }}'" class="nav-link ">
                                        <span class="title">Lock Staff For Topup</span>
                                    </a>
                                </li>


                            </ul>
                           
                        </li>
                        <?php
                        }
                        ?>



</ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->


        <!-- BEGIN CONTAINER -->
        <div class="page-content-wrapper">
            <div class="page-content">


                @yield('content')



                <div class="page-footer">
                <div class="page-footer-inner"> 2016 &copy; THE BANYAN, Powered By
                <a target="_blank" href="http://keenthemes.com">Confident Solutions</a> &nbsp;|&nbsp;
                <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        </div>
        </div>






        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        
        <!-- END FOOTER -->
        <!-- BEGIN QUICK NAV -->
        
        <div class="quick-nav-overlay"></div>
</div>
@stop

