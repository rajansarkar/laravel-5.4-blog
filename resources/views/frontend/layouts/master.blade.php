<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('public/frontend/css/heroic-features.css')}}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    @include('frontend.layouts.menu')

    <!-- Page Content -->
    <div class="container">

      @yield('page-content')

    </div>
    <!-- /.container -->
    
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript">


  // $(document).ready(function() {
  //     $("#submit").click(function(e){
  //       //alert('hello');
  //       e.preventDefault();
  //       var _token = $("input[name='_token']").val();
  //       var yname = $("input[name='name']").val();
  //       var email = $("input[name='email']").val();
  //       var mobile = $("input[name='mobile']").val();
  //       var password = $("input[name='password']").val();
  //       var address = $("textarea[name='address']").val();
  //         $.ajax({
  //             url: 'http://localhost/blog/public/userregistration/',
  //             type:'POST',
  //             data: {_token:_token, yname:name, email:email, mobile:mobile, password:password, address:address},
  //             success: function(data) {
  //                 if($.isEmptyObject(data.error)){
  //                   alert(data.success);
  //                 }else{
  //                   printErrorMsg(data.error);
  //                 }
  //             }
  //         });


  //     }); 


  //     function printErrorMsg (msg) {
  //     $(".print-error-msg").find("ul").html('');
  //     $(".print-error-msg").css('display','block');
  //     $.each( msg, function( key, value ) {
  //       $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
  //     });
  //   }
  // });


</script>

  </body>

</html>
