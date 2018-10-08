        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-star-half-full f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>00</h2>
                                    <p class="m-b-0">Total Points</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                           <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-money f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>00</h2>
                                    <p class="m-b-0">Purchases</p>
                                </div>
                            </div>                      
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                           <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-pink"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>00</h2>
                                    <p class="m-b-0">Total orders</p>
                                </div>
                            </div>                       
                        </div>
                    </div>                   
                </div>
            </div>
            <br>
              @if($customer[0]->status == null)
            <div class="card">
                <div class="card-header">Messages</div><br>
                <div class="card-body">
                 
                       <div class="alert alert-danger">
                           <strong>Your account is not yet activated.! Please verify your account using the activation link that we sent to your email.</strong>
                       </div>
                       <br>
                        
                       @if(session('success'))
                    <div class="alert alert-success" style="color:black"><b>{{session('success')}} </b></div>
                       @else
                         <div class="alert alert-info">
                           <strong>If you did not receive an email from us within 1 hour. <br>You can <a href="{{route('customer.resendactivation', $customer[0]->id)}}"><b style="color:#dd0c67">resend activation</b></a> to your email.</strong>
                       </div>
                       @endif
                       
                     
                           
                   
                </div>
            </div>
            @endif
        </div>