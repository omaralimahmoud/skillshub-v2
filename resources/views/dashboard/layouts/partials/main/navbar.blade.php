 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <form id="logout-form" action="{{ route('dashboard.dashboard.auth.logout') }}" method="POST">
         @csrf

     </form>

     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>

     </ul>


     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <!-- Navbar Search -->


         <div class="dropdown">
             <a class="btn  bg-gradient-white dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                 {{ LaravelLocalization::getCurrentLocaleNative() }}
             </a>

             <div class="dropdown-menu">
                 @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                     <li>
                         <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                             {{ $properties['native'] }}
                         </a>
                     </li>
                 @endforeach
             </div>
         </div>



         <li class="nav-item active">
            <a class="nav-link" id="logout-link" href="#">logout <span class="sr-only">(current)</span></a>
          </li>


     </ul>

 </nav>
 <!-- /.navbar -->
 @push('scripts')
     <script>
         $('#logout-link').click(function(e) {
             e.preventDefault()
             $('#logout-form').submit()
         })
     </script>
 @endpush
