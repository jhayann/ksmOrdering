<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add administrator</div>

                <div class="card-body container">
                    <form method="POST" id="form" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('form#form').submit(function(e){
   e.preventDefault();
        var name = $('#name').val();
      var email = $('#email').val();
        var pass = $('#password').val();
        var conpass = $('#password-confirm').val();
          if (pass != conpass){
            $('#password').toggleClass('is-invalid');
                     $('#password-confirm').toggleClass('is-invalid');
               sweetAlert("Oops...", "Your password  is not match!", "error");
            return  false;
        }
         $.ajax({
             type:"post",
             url: "{{ route('insert_admin') }}",
             data: {_token:"{{Session::token()}}",name:name,email: email ,password:  pass,password_confirm:  conpass},
             success: function(response) {
                 $('#ajax').html(response);
             },
             error: function(err) {
                 var msg = err.responseJSON.message;
                 var error = err.responseJSON.errors;
                console.log(msg);
                if(/23000/.test(msg)){
                    sweetAlert("Oops...", "Email is already use. !!", "error");
                } else if(/invalid/.test(msg))
                 sweetAlert("Oops...", "The data is invalid !!", "error");
                 else {
                    sweetAlert("Oops...", "Something went wrong !!", "error");
                }
             }
       
             
         });
    
    });
    

    
</script>