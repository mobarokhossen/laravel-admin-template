<?php
/**
 * Created by PhpStorm.
 * User: Mobarok Hossen
 * Date: 12/2/2017
 * Time: 10:16 PM
 */
?>

<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
          <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
             <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search  " action="#" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-television"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            
              <li class="heading">
                  {{--<i class="icon-settings"></i> --}}
                  <h3 class="uppercase">Settings</h3>
              </li>
              
              <li class="nav-item  ">
                  <a href="{{ route('admin.roles.index') }}" class="nav-link nav-toggle">
                      <i class="fa fa-tasks"></i>
                      <span class="title">Roles</span>
                  </a>
              </li>
              <li class="nav-item ">
                  <a href="{{ route('admin.permissions.index') }}" class="nav-link nav-toggle">
                      <i class="icon-lock"></i>
                      <span class="title">Permissions</span>
                  </a>
              </li>
          </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
