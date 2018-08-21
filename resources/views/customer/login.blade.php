@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="title">
                   <p class="title-1">CUSTOMER PORTAL</p>
           </div>

                <div class="card-body">
                    <form method="POST" id="loginMe" aria-label="{{ __('Login') }}">
                        @csrf
                        @include('includes.message')
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>                          
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                  

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" id="bt" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                             <!--   <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ URL::to('js/lib/sweetalert/sweetalert.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#bt').click(function(){
            var email = $('#email').val();
                        var pass = $('#password').val();
          
          
            $.ajax({
                       
                        type:"post",
                        url:"{{ route('customerAuth') }}",
                        data: {'email': email,'password': pass, _token: "{{Session::token()}}"},
                        success: function(data){
                           if(data.hasOwnProperty('error')){
                            document.getElementById("email").focus();
                            sweetAlert("Oops...",  data['error'] , "error");
                            $('#email').val('');
                            $('#password').val('');
                            
                           }
                           if(data.hasOwnProperty('token')){                           
                            createSession(data['token']);
                           }
                        },
                        error: function()
                        {
                            alert("ERROR LOGGING IN");
                        }
                    }); 
        });
        

    });
    function createSession(e)
    {
        $.ajax({
            type:"post",
            url:"{{route('setSession')}}",
            data:{'token':e},
            success: function()
            {
                window.location.href="home?token="+e;
            }
        });
    }

</script>
@endsection
