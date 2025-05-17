   <!-- Essential javascripts for application to work-->
   <script src="{{ asset('assets/backend/js/jquery-3.7.0.min.js') }}"></script>
   <script src="{{ asset('assets/backend/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('assets/backend/js/main.js') }}"></script>
   <!-- Page specific javascripts-->
   @stack('js')
   @stack('custom_js')