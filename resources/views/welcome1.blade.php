<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
  <meta name="author" content="NobleUI">
  <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <title>Admin Panel - Real Estate </title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->


  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}">



<!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
  <!-- End plugin css for this page -->

  <!-- core:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <!-- endinject -->

  <!-- Layout styles -->  
  <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />

   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
 

 
</head>
<body>
  <div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
   
   <nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Easy<span>Admin</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div> 
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route('admin.admin_dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">RealEstate</li>
         
          {{-- @if(Auth::user()->can('type.menu'))
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property Type </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
               
               @if(Auth::user()->can('all.type'))
                <li class="nav-item">
                  <a href="{{ route('all.type') }}" class="nav-link">All Type</a>
                </li>
                  @endif
                 @if(Auth::user()->can('add.type'))
                <li class="nav-item">
                  <a href="{{ route('add.type') }}" class="nav-link">Add Type</a>
                </li>
                @endif
                
              </ul>
            </div>
          </li>
          @endif --}}


  {{-- @if(Auth::user()->can('state.menu'))
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#state" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property State </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="state">
              <ul class="nav sub-menu">
                 @if(Auth::user()->can('state.all'))
                <li class="nav-item">
                  <a href="{{ route('all.state') }}" class="nav-link">All State</a>
                </li>
                @endif
                 @if(Auth::user()->can('state.add'))
                <li class="nav-item">
                  <a href="{{ route('add.state') }}" class="nav-link">Add State</a>
                </li>
                @endif
              </ul>
            </div>
          </li>
 @endif --}}

           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#amenitie" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Amenitie  </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="amenitie">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('all.amenitie') }}" --}}
                   class="nav-link">All Amenitie</a>
                </li>
                <li class="nav-item">
                  <a href="pages/email/read.html" class="nav-link">Add Amenitie</a>
                </li>
                
              </ul>
            </div>
          </li>


           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property  </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="property">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('all.property') }}" --}}
                   class="nav-link">All Property</a>
                </li>
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('add.property') }}"--}}
                   class="nav-link">Add Property</a> 
                </li>
                
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a href=""
            {{-- {{ route('admin.package.history') }}" --}}
             class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Package History</span>
            </a>
          </li>

           <li class="nav-item">
            <a href=""
            {{-- {{ route('admin.property.message') }}" --}}
             class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Property Message </span>
            </a>
          </li>


           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#testimonials" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Testimonials Manage </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="testimonials">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('all.testimonials') }}" --}}
                   class="nav-link">All Testimonials</a>
                </li>
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('add.testimonials') }}" --}}
                   class="nav-link">Add Testimonials</a>
                </li>
                
              </ul>
            </div>
          </li>




          <li class="nav-item nav-category">User All Function</li>
          

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Manage Agent </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('all.agent') }}"  --}}
                  class="nav-link">All Agent </a>
                </li>
                <li class="nav-item">
                  <a href="
                  pages/ui-components/alerts.html" class="nav-link">Add Agent</a>
                </li>
                
              </ul>
            </div>
          </li>



               <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#blogcategory" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Blog Category </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="blogcategory">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('all.blog.category') }}" --}}
                   class="nav-link">All Blog Category </a>
                </li>
                
                
              </ul>
            </div>
          </li>


           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Post" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Blog Post </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="Post">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('all.post') }}"  --}}
                  class="nav-link">All Post </a>
                </li>

                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('add.post') }}"  --}}
                  class="nav-link">Add Post </a>
                </li>
                
                
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a href=""
            {{-- {{ route('admin.blog.comment') }}"  --}}
            class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Blog Comment </span>
            </a>
          </li>

           <li class="nav-item">
            <a href=""
            {{-- {{ route('smtp.setting') }}"  --}}
            class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">SMTP Setting </span>
            </a>
          </li>

          <li class="nav-item">
            <a href=""
            {{-- {{ route('site.setting') }}" --}}
             class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Site Setting </span>
            </a>
          </li>


  <li class="nav-item nav-category">Role & Permission</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Role & Permission</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('all.permission') }}" --}}
                   class="nav-link">All Permission</a>
                </li>
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('all.roles') }}"  --}}
                  class="nav-link">All Roles </a>
                </li>

                 <li class="nav-item">
                  <a href=""
                  {{-- {{ route('add.roles.permission') }}"  --}}
                  class="nav-link">Role in Permission </a>
                </li>

                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('all.roles.permission') }}" --}}
                   class="nav-link">All Role in Permission </a>
                </li>
                
              </ul>
            </div>
          </li>


             <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="admin">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Manage Admin User</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="admin">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('all.admin') }}"  --}}
                  class="nav-link">All Admin</a>
                </li>
                <li class="nav-item">
                  <a href=""
                  {{-- {{ route('add.admin') }}"  --}}
                  class="nav-link">Add Admin </a>
                </li> 
              </ul>
            </div>
          </li>
          


           
          
        
          
          <li class="nav-item nav-category">Docs</li>
          <li class="nav-item">
            <a href="#" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Documentation</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
  
    <div class="page-wrapper">
          
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar">
        <a href="#" class="sidebar-toggler">
          <i data-feather="menu"></i>
        </a>
        <div class="navbar-content">
          <form class="search-form">
            <div class="input-group">
              <div class="input-group-text">
                <i data-feather="search"></i>
              </div>
              <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
            </div>
          </form>
          <ul class="navbar-nav">
         
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="grid"></i>
              </a>
              <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                  <p class="mb-0 fw-bold">Web Apps</p>
                  <a href="javascript:;" class="text-muted">Edit</a>
                </div>
                <div class="row g-0 p-1">
                  <div class="col-3 text-center">
                    <a href="pages/apps/chat.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i><p class="tx-12">Chat</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/apps/calendar.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i><p class="tx-12">Calendar</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/email/inbox.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i><p class="tx-12">Email</p></a>
                  </div>
                  <div class="col-3 text-center">
                    <a href="pages/general/profile.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i><p class="tx-12">Profile</p></a>
                  </div>
                </div>
                <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                  <a href="javascript:;">View all</a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="mail"></i>
              </a>
              <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                  <p>9 New Messages</p>
                  <a href="javascript:;" class="text-muted">Clear all</a>
                </div>
                <div class="p-1">
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Leonardo Payne</p>
                        <p class="tx-12 text-muted">Project status</p>
                      </div>
                      <p class="tx-12 text-muted">2 min ago</p>
                    </div>  
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Carl Henson</p>
                        <p class="tx-12 text-muted">Client meeting</p>
                      </div>
                      <p class="tx-12 text-muted">30 min ago</p>
                    </div>  
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Jensen Combs</p>
                        <p class="tx-12 text-muted">Project updates</p>
                      </div>
                      <p class="tx-12 text-muted">1 hrs ago</p>
                    </div>  
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Amiah Burton</p>
                        <p class="tx-12 text-muted">Project deatline</p>
                      </div>
                      <p class="tx-12 text-muted">2 hrs ago</p>
                    </div>  
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="d-flex justify-content-between flex-grow-1">
                      <div class="me-4">
                        <p>Yaretzi Mayo</p>
                        <p class="tx-12 text-muted">New record</p>
                      </div>
                      <p class="tx-12 text-muted">5 hrs ago</p>
                    </div>  
                  </a>
                </div>
                <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                  <a href="javascript:;">View all</a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="bell"></i>
                <div class="indicator">
                  <div class="circle"></div>
                </div>
              </a>
              <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                  <p>6 New Notifications</p>
                  <a href="javascript:;" class="text-muted">Clear all</a>
                </div>
                <div class="p-1">
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                      <i class="icon-sm text-white" data-feather="gift"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
                      <p>New Order Recieved</p>
                      <p class="tx-12 text-muted">30 min ago</p>
                    </div>  
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                      <i class="icon-sm text-white" data-feather="alert-circle"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
                      <p>Server Limit Reached!</p>
                      <p class="tx-12 text-muted">1 hrs ago</p>
                    </div>  
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
                    </div>
                    <div class="flex-grow-1 me-2">
                      <p>New customer registered</p>
                      <p class="tx-12 text-muted">2 sec ago</p>
                    </div>  
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                      <i class="icon-sm text-white" data-feather="layers"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
                      <p>Apps are ready for update</p>
                      <p class="tx-12 text-muted">5 hrs ago</p>
                    </div>  
                  </a>
                  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                      <i class="icon-sm text-white" data-feather="download"></i>
                    </div>
                    <div class="flex-grow-1 me-2">
                      <p>Download completed</p>
                      <p class="tx-12 text-muted">6 hrs ago</p>
                    </div>  
                  </a>
                </div>
                <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                  <a href="javascript:;">View all</a>
                </div>
              </div>
            </li>

          {{-- @php

        $id = Auth::user()->id;
        $profileData = App\Models\User::find($id);

          @endphp --}}


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="wd-30 ht-30 rounded-circle" src="""
                {{-- {{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" 
                --}}
                alt="profile"> 
              </a>
              <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                  <div class="mb-3">
                    <img class="wd-80 ht-80 rounded-circle" src=""
                    {{-- {{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" 
                   --}}
                    alt=""> 
                  </div>
                  <div class="text-center">
                    <p class="tx-16 fw-bolder">
                      {{-- {{ $profileData->name }} --}}
                    </p>
                    <p class="tx-12 text-muted">
                      {{-- {{ $profileData->email }} --}}
                    </p>
                  </div>
                </div>
                <ul class="list-unstyled p-1">
                  <li class="dropdown-item py-2">
      <a href=""
      {{-- {{ route('admin.profile') }}" --}}
       class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href=""
                    {{-- {{ route('admin.change.password') }}"  --}}
                    class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="edit"></i>
                      <span>Change Password</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="javascript:;" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="repeat"></i>
                      <span>Switch User</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
       <a href=""
       {{-- {{ route('admin.logout') }}"  --}}
       class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>Log Out</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- partial -->


      
       <div class="page-content">
      
              <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                  <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                  <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                    <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                    <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
                  </div>
                  <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Print
                  </button>
                  <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Download Report
                  </button>
                </div>
              </div>
      
              <div class="row">
                <div class="col-12 col-xl-12 stretch-card">
                  <div class="row flex-grow-1">
                    <div class="col-md-4 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">New Customers</h6>
                            <div class="dropdown mb-2">
                              <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                              <h3 class="mb-2">3,897</h3>
                              <div class="d-flex align-items-baseline">
                                <p class="text-success">
                                  <span>+3.3%</span>
                                  <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                </p>
                              </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                              <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">New Orders</h6>
                            <div class="dropdown mb-2">
                              <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                              <h3 class="mb-2">35,084</h3>
                              <div class="d-flex align-items-baseline">
                                <p class="text-danger">
                                  <span>-2.8%</span>
                                  <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                </p>
                              </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                              <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Growth</h6>
                            <div class="dropdown mb-2">
                              <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                              <h3 class="mb-2">89.87%</h3>
                              <div class="d-flex align-items-baseline">
                                <p class="text-success">
                                  <span>+2.8%</span>
                                  <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                </p>
                              </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-7">
                              <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- row -->
      
              
              <div class="row">
                <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Monthly sales</h6>
                        <div class="dropdown mb-2">
                          <a type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                          </div>
                        </div>
                      </div>
                      <p class="text-muted">Sales are activities related to selling or the number of goods or services sold in a given time period.</p>
                      <div id="monthlySalesChart"></div>
                    </div> 
                  </div>
                </div>
                
              </div> <!-- row -->
      
              <div class="row">
                <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Inbox</h6>
                        <div class="dropdown mb-2">
                          <a type="button" id="dropdownMenuButton6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                        <a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
                          <div class="me-3">
                            <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                          </div>
                          <div class="w-100">
                            <div class="d-flex justify-content-between">
                              <h6 class="text-body mb-2">Leonardo Payne</h6>
                              <p class="text-muted tx-12">12.30 PM</p>
                            </div>
                            <p class="text-muted tx-13">Hey! there I'm available...</p>
                          </div>
                        </a>
                        <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                          <div class="me-3">
                            <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                          </div>
                          <div class="w-100">
                            <div class="d-flex justify-content-between">
                              <h6 class="text-body mb-2">Carl Henson</h6>
                              <p class="text-muted tx-12">02.14 AM</p>
                            </div>
                            <p class="text-muted tx-13">I've finished it! See you so..</p>
                          </div>
                        </a>
                        <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                          <div class="me-3">
                            <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                          </div>
                          <div class="w-100">
                            <div class="d-flex justify-content-between">
                              <h6 class="text-body mb-2">Jensen Combs</h6>
                              <p class="text-muted tx-12">08.22 PM</p>
                            </div>
                            <p class="text-muted tx-13">This template is awesome!</p>
                          </div>
                        </a>
                        <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                          <div class="me-3">
                            <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                          </div>
                          <div class="w-100">
                            <div class="d-flex justify-content-between">
                              <h6 class="text-body mb-2">Amiah Burton</h6>
                              <p class="text-muted tx-12">05.49 AM</p>
                            </div>
                            <p class="text-muted tx-13">Nice to meet you</p>
                          </div>
                        </a>
                        <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                          <div class="me-3">
                            <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
                          </div>
                          <div class="w-100">
                            <div class="d-flex justify-content-between">
                              <h6 class="text-body mb-2">Yaretzi Mayo</h6>
                              <p class="text-muted tx-12">01.19 AM</p>
                            </div>
                            <p class="text-muted tx-13">Hey! there I'm available...</p>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-7 col-xl-8 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Projects</h6>
                        <div class="dropdown mb-2">
                          <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                          </div>
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-hover mb-0">
                          <thead>
                            <tr>
                              <th class="pt-0">#</th>
                              <th class="pt-0">Project Name</th>
                              <th class="pt-0">Start Date</th>
                              <th class="pt-0">Due Date</th>
                              <th class="pt-0">Status</th>
                              <th class="pt-0">Assign</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>NobleUI jQuery</td>
                              <td>01/01/2022</td>
                              <td>26/04/2022</td>
                              <td><span class="badge bg-danger">Released</span></td>
                              <td>Leonardo Payne</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>NobleUI Angular</td>
                              <td>01/01/2022</td>
                              <td>26/04/2022</td>
                              <td><span class="badge bg-success">Review</span></td>
                              <td>Carl Henson</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>NobleUI ReactJs</td>
                              <td>01/05/2022</td>
                              <td>10/09/2022</td>
                              <td><span class="badge bg-info">Pending</span></td>
                              <td>Jensen Combs</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>NobleUI VueJs</td>
                              <td>01/01/2022</td>
                              <td>31/11/2022</td>
                              <td><span class="badge bg-warning">Work in Progress</span>
                              </td>
                              <td>Amiah Burton</td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>NobleUI Laravel</td>
                              <td>01/01/2022</td>
                              <td>31/12/2022</td>
                              <td><span class="badge bg-danger">Coming soon</span></td>
                              <td>Yaretzi Mayo</td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>NobleUI NodeJs</td>
                              <td>01/01/2022</td>
                              <td>31/12/2022</td>
                              <td><span class="badge bg-primary">Coming soon</span></td>
                              <td>Carl Henson</td>
                            </tr>
                            <tr>
                              <td class="border-bottom">3</td>
                              <td class="border-bottom">NobleUI EmberJs</td>
                              <td class="border-bottom">01/05/2022</td>
                              <td class="border-bottom">10/11/2022</td>
                              <td class="border-bottom"><span class="badge bg-info">Pending</span></td>
                              <td class="border-bottom">Jensen Combs</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div> 
                  </div>
                </div>
              </div> <!-- row -->
      
            </div>
      




    

      <!-- partial:partials/_footer.html -->
      <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
        <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://easylearningbd.com" target="_blank">EasyLearning</a>.</p>
        <p class="text-muted">EasyLearning With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
      </footer>
      <!-- partial -->
    
    </div>
  </div>

  <!-- core:js -->
  <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
  <!-- endinject -->

  <!-- Plugin js for this page -->
  <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/template.js') }}"></script>
  <!-- endinject -->

  <!-- Custom js for this page -->
  <script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
  <!-- End custom js for this page -->

  <script type="text/javascript" src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js')}}"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="{{ asset('backend/assets/js/code/code.js') }}"></script>
  <script src="{{ asset('backend/assets/js/code/validate.min.js') }}"></script>

  <!-- Start datatables -->
  <script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script> 
  <script src="{{ asset('backend/assets/js/data-table.js') }}"></script>
  <!-- End datatables -->


  <!-- Input Tags -->
  <script src="{{ asset('backend/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/select2/select2.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>

  <script src="{{ asset('backend/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>

  <script src="{{ asset('backend/assets/js/inputmask.js') }}"></script>
  <script src="{{ asset('backend/assets/js/select2.js') }}"></script>
  <script src="{{ asset('backend/assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('backend/assets/js/tags-input.js') }}"></script>

    <!-- Input Tags -->

 <!-- tinymce -->
      <script src="{{ asset('backend/assets/vendors/tinymce/tinymce.min.js') }}"></script>
     <script src="{{ asset('backend/assets/js/tinymce.js') }}"></script>
 <!-- tinymce -->

  <script src="{{asset('https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js')}}"></script>


</body>
</html>    