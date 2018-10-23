@extends('customer.master')
@section('contents')

  <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Update your profile</li>
        </ol>
    </nav>
           @if (session('success'))
                     <div class="alert alert-success alert-dismissible fade show" style="color:black;">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <strong>Success!</strong> {{ session('success') }}
                    </div>
            @endif
     
                
  <style>
      .avatar
      {
          max-height:200px;
          max-width:200px;
          min-width:200px;
      }
      .file-upload
      {
          width: 100px;
      }


  </style>



<hr>


    <div class="row">
 
  		<div class="col-sm-4"><!--left col-->
              

      <div class="text-center">
        <img src="{{$customer[0]->profileimg == null ? '../../img/users/avatar_2x.png' : URL::to('img/users')}}/{{$customer[0]->profileimg}}" class="avatar img-circle img-thumbnail" alt="avatar">
             @if($customer[0]->status == null)
                 <span class="badge badge-warning">Account not verified</span>
                 @else
          <span class="badge badge-success"><b>Account verified</b></span>
           @endif
            @if ($errors->has('photo'))
                                    <span class="" style="font-size:12px;color:red" role="alert">
                                        <strong>Please select your profile picture</strong>
                                    </span>
                                @endif
           </div><br>

          
        </div><!--/col-3-->
    	<div class="col-sm-8">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Profile info</a></li>
                
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
<br>
                     <form class="form" action="{{route('customer.update')}}" method="POST" id="registrationForm" enctype="multipart/form-data">
                     <input  type="hidden" value="{{$customer[0]->id}}" name="id">
                      <div class="form-group">
                          
                          <div class="col-xs-4">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" id="first_name" placeholder="first name" title="enter your first name if any." value="{{$customer[0]->firstname}}">
                            @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                             </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control {{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" id="last_name" placeholder="last name" title="enter your last name if any." value="{{$customer[0]->lastname}}">
                              @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="middle_name"><h4>Middle name</h4></label>
                              <input type="text" class="form-control {{ $errors->has('middlename') ? ' is-invalid' : '' }}" name="middlename" id="middle_name" title="enter your middlename." value="{{$customer[0]->middlename}}">
                              @if ($errors->has('middlename'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                                @endif
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="birthdate"><h4>Birthdate</h4></label>
                              <input type="date" class="form-control {{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" id="birthdate" placeholder="enter mobile birthdate" title="Enter your birthdate" value="{{$customer[0]->birthdate}}">
                              @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                          </div>
                      </div>
                      <div class="form-group">
                              <div class="col-xs-6">   
                                 <label for="gender"><h4>Gender</h4></label>
                                <select class="custom-select custom-select-md {{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender">
                                <option value="" {{ $customer[0]->gender == null ? 'selected':'' }} >Select your gender</option>
                                <option value="male" {{ $customer[0]->gender == "male" ? 'selected':'' }} >Male</option>
                                    <option value="female"  {{ $customer[0]->gender == "female" ? 'selected':'' }} >Female</option>                                   
                                </select>
                                 @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                          </div>
                      </div>
                 
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." value="{{$customer[0]->email}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Complete Address</h4></label>
                              <input type="text" class="form-control" name="address" id="location" placeholder="somewhere" title="enter a location" value="{{$customer[0]->address}}">
                          </div>
                      </div>
               <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="contact"><h4>Contact no.</h4></label>
                              <input type="number" class="form-control {{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" id="contact" placeholder="mobile number" title="enter your mobile number" value="{{$customer[0]->number}}">
                              @if ($errors->has('contact'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                          </div>
                      </div>
                      <div class="form-group">
                    
                       Profile picture:  <input type="file" id="image" name="photo"  accept="image/jpeg" class="text-center center-block file-upload">
                         
                         </div>
                   <!--   <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div> -->
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                               <button class="btn btn-success btn-block" type="submit"> Save</button>
                            </div>
                      </div>
              
                </form>
              <hr>

             </div><!--/tab-pane-->

 
               
              </div><!--/tab-pane-->
              
    </div><!--/tab-content-->
      
</div>
<!--/col-9-->
    <!--/row-->
                                                     

                                                      
@endsection