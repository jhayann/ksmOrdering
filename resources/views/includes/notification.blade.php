@if(count($notifications)>=1) 
@foreach($notifications as $notif)
<a href="#">
    <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
    <div class="mail-contnet">
        <h5>{{$notif->title}}</h5> <span class="mail-desc">{{$notif->body}}</span> <span class="time">9:02 AM</span>
    </div>
</a>
@endforeach 
@else
<a href="#">
    <div class="btn btn-primary btn-circle m-r-10"><i class="ti-check"></i></div>
    <div class="mail-contnet">
        <h5>You're all set!</h5> 
    </div>
</a>
@endif