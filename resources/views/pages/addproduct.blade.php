@extends('layouts.dashboardLayout')


@section('styles')
<style>

.image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
.productform
{
   max-width: 500px; 
    margin:auto;
}
</style>
@endsection
@section('pagetitle')
  <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">add product</li>
                    </ol>
                </div>
    </div>
@endsection
@section('content')
@include('includes.summaryheader')
 <div class="col-auto">
        <div class="card">
      
            <div class="card-body container" id="ajax">
                     <div class="card-header">Add product:</div>
               <div class="productform">
                  @if ($errors->has('photo'))
                            <div class="alert alert-danger">      
                                        <strong>{{ $errors->first('photo') }}</strong>
                                 </div>
                    @endif
                   <form method="post" enctype="multipart/form-data" action="{{route('store.product')}}">
                  <div class="form-group">
                            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label> 
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                         <div class="form-group">
                            <label for="name" class="col-form-label text-md-right">{{ __('Categorie') }}</label> 
                             <select id="categorie" class="form-control{{ $errors->has('categorie') ? ' is-invalid' : '' }}" name="categorie"  required autofocus>
                                    <option value="bundle">Bundle</option>
                                    <option value="Single">Single</option>
                                    <option value="item">Special Item</option>
                                  </select>

                                @if ($errors->has('categorie'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categorie') }}</strong>
                                    </span>
                                @endif
                        </div>
                         <div class="form-group">
                            <label for="name" class="col-form-label text-md-right">{{ __('price') }}</label> 
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                        </div>
                        
                     
        
                 
    
                    <div class="input-group image-preview">
                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                    <span class="input-group-btn">
                        <!-- image-preview-clear button -->
                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <i class="fa fa-remove"></i> Clear
                        </button>
                        <!-- image-preview-input -->
                        <div class="btn btn-default image-preview-input">
                          <i class="fa fa-folder-open"></i>
                            <span class="image-preview-input-title">Browse Image</span>
                            <input type="file" id="image" accept="image/jpeg" name="photo"/> <!-- rename it -->
                        </div>
                    </span>
                    </div>
                    <br>
                     <div class="form-group  mb-0">
                  
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Save') }}
                                </button>
                   
                        </div>
                   </form>
               </div>
            </div>
         </div>
    </div>
@endsection


@section('scripts')
 <script>

$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse Image"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:230
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>

@endsection