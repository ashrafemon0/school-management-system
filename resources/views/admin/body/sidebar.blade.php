@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
 @endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{($route == 'dashboard')?'active':''}}">
                <a href="{{route('dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if(Auth::user()->role == 'admin')
                <li class="treeview {{($prefix == '/user')?'active':''}}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Manage User</span>
                        <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('user.view')}}"><i class="ti-more"></i>View User</a></li>
                        <li><a href="{{route('add.user')}}"><i class="ti-more"></i>Add User</a></li>
                    </ul>
                </li>
            @endif
            <li class="treeview {{($prefix == '/profile')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Manage Profile</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.profile')}}"><i class="ti-more"></i>View Profile</a></li>
                    <li><a href="{{route('change.password')}}"><i class="ti-more"></i>Change Password</a></li>
                </ul>
            </li>
            @if(Auth::user()->role == 'admin')
            <li class="treeview {{($prefix == '/setup')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Student Setup</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('student.class')}}"><i class="ti-more"></i>Student Class</a></li>
                    <li><a href="{{route('student.year')}}"><i class="ti-more"></i>Student Year</a></li>
                    <li><a href="{{route('student.group')}}"><i class="ti-more"></i>Student Group</a></li>
                    <li><a href="{{route('student.shift')}}"><i class="ti-more"></i>Student Shift</a></li>
                    <li><a href="{{route('student.feeCategory')}}"><i class="ti-more"></i>Fee Category</a></li>
                    <li><a href="{{route('student.feeCategoryAmount')}}"><i class="ti-more"></i>Fee Category Amount</a></li>
                    <li><a href="{{route('student.exam')}}"><i class="ti-more"></i>Exam Type</a></li>
                    <li><a href="{{route('student.subject')}}"><i class="ti-more"></i>Subject</a></li>
                    <li><a href="{{route('subject.assign')}}"><i class="ti-more"></i>Subject Assign</a></li>
                    <li><a href="{{route('designation')}}"><i class="ti-more"></i>Designation</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->role == 'admin')
            <li class="treeview {{($prefix == '/student')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Student Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('student.reg')}}"><i class="ti-more"></i>Student Registration</a></li>

                    <li><a href="{{route('student.roll.generate')}}"><i class="ti-more"></i>Student Roll Generate</a></li>
                    <li><a href="{{route('student.registration.fee')}}"><i class="ti-more"></i>Registration Fee</a></li>
                    <li><a href="{{route('student.tuition.fee')}}"><i class="ti-more"></i>Tuition Fee</a></li>
                    <li><a href="{{route('student.exam.fee')}}"><i class="ti-more"></i>Exam Fee</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->role == 'student')
                <li class="treeview {{($prefix == '/Student_role')?'active':''}}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Student Management</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('student.reg')}}"><i class="ti-more"></i>Student Registration</a></li>

                        <li><a href="{{route('student.payment.add')}}"><i class="ti-more"></i>Payment</a></li>
                        <li><a href="{{route('student.payment.view')}}"><i class="ti-more"></i>Payment History</a></li>
                        <li><a href="{{route('Student.information')}}"><i class="ti-more"></i>Student Information</a></li>
                        <li><a href="{{route('student.home.work')}}"><i class="ti-more"></i>Home Work</a></li>
                    </ul>
                </li>
            @endif
            @if(Auth::user()->role == 'admin')
            <li class="treeview {{($prefix == '/employee')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Employee Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('employee.reg')}}"><i class="ti-more"></i>Employee Registration</a></li>
                    <li><a href="{{route('employee.salary')}}"><i class="ti-more"></i>Employee Salary</a></li>
                    <li><a href="{{route('employee.leave')}}"><i class="ti-more"></i>Employee Leave</a></li>
                    <li><a href="{{route('employee.attendance')}}"><i class="ti-more"></i>Employee Attendance</a></li>
                    <li><a href="{{route('employee.monthly.salary')}}"><i class="ti-more"></i>Employee Monthly Salary</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->role == 'admin')
            <li class="treeview {{($prefix == '/marks')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Marks Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('student.marks.add')}}"><i class="ti-more"></i>Marks Adds</a></li>
                    <li><a href="{{route('student.marks.edit')}}"><i class="ti-more"></i>Marks Edit</a></li>
                    <li><a href="{{route('student.marks.grade')}}"><i class="ti-more"></i>Marks grade</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->role == 'admin')
            <li class="treeview {{($prefix == '/account')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Account Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('account.student.fee.view')}}"><i class="ti-more"></i>Student Fee</a></li>
                </ul>
            </li>
            @endif
            <li class="treeview ">
                <a href="#">
                    <i data-feather="mail"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="mailbox_inbox.html"><i class="ti-more"></i>Inbox</a></li>
                    <li><a href="mailbox_compose.html"><i class="ti-more"></i>Compose</a></li>
                    <li><a href="mailbox_read_mail.html"><i class="ti-more"></i>Read</a></li>
                </ul>
            </li>


            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                    <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
                    <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
                    <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
                    <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
                    <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
                </ul>
            </li>


        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
