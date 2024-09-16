<!DOCTYPE html>
<html lang="en" class="scroll-smooth group" data-sidebar="brand" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>DevMe - Admin & Dashboard Template</title>
        <meta  name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta  content="Admin & Dashboard"  name="description"/>
        <meta content="" name="Mannatthemes" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}" />
        
        <!-- Css -->
        <!-- Main Css -->
        <link rel="stylesheet" href="{{asset('assets/libs/icofont/icofont.min.css')}}">
        <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/tailwind.min.css')}}">

    </head>
    
    <body data-layout-mode="light"  data-sidebar-size="default" data-theme-layout="vertical" class="bg-[#EEF0FC] dark:bg-gray-900">
         @include('dashboard::partials.header')
        @include('dashboard::partials.sidebar')
       

        <div class="ltr:flex flex-1 rtl:flex-row-reverse">
            <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
                
                <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14"> 
                    @include('dashboard::partials.breadcrum')
                    @yield('content')
                    @include('dashboard::partials.footer')
                 </div>
            </div>
        </div>


        <!-- JAVASCRIPTS -->
        <!-- <div class="menu-overlay"></div> -->
        <script src="{{ asset('assets/libs/lucide/umd/lucide.min.js')}}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{ asset('assets/libs/@frostui/tailwindcss/frostui.js')}}"></script>

        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{ asset('assets/js/pages/analytics-index.init.js')}}"></script>
        <script src="{{ asset('assets/js/app.js')}}"></script>

    </body>


    
  
</html>