<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Employee Records</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg bg-light">
         <div class="container-fluid">
           <a class="navbar-brand" href="{{ route('employees.index') }}" class="nav-link {{ request()->is('employees*') ? 'active' : '' }}">AdminPanel</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                 <a href="{{ route('employees.index') }}" class="nav-link {{ request()->is('employees*') ? 'active' : '' }}">Employee</a>
               </li>
               <li class="nav-item">
                 <a href="{{ route('empDepartments.index') }}" class="nav-link {{ request()->is('empDepartments*') ? 'active' : '' }}">Department</a>
               </li>
               {{-- <li class="nav-item">
                 <a class="nav-link" href="#">Profile</a>
               </li> --}}
             </ul>
             <div class="mx-auto pull-right">
               <div class="">
                   <form action="{{ route('employees.index') }}" method="GET" role="search">
   
                       <div class="input-group">
                           
                           <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                           <a href="{{ route('employees.index') }}" class=" mt-1">
                              <span class="input-group-btn mr-5 mt-1">
                                 <button class="btn btn-info" type="submit" title="Search projects">Search
                                     <span class="fas fa-search"></span>
                                 </button>
                             </span>
                               <span class="input-group-btn">
                                   <button class="btn btn-danger" type="button" title="Refresh page">Refresh
                                       <span class="fas fa-sync-alt"></span>
                                   </button>
                               </span>
                           </a>
                       </div>
                   </form>
               </div>
           </div>
             
           </div>
           <ul>
             <li class="nav-item">
               <a class="btn btn-success" href="{{ route('logout') }}">Logout</a>
           </li>
         </ul>
         </div>
       </nav>
      <div class="container">
         @yield('content')
      </div>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
   </body>
</html>