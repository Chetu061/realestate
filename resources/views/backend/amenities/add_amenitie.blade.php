@extends('layouts.master1')
@section('content')
{{-- jquery valiadtion link --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">

       
        <div class="row profile-body">
        
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
             <div class="card">
              <div class="card-body">

			<h6 class="card-title">Add Amenities</h6>

			<form id="myapp" method="POST" action="{{route('store_amenitie')}}" class="forms-sample" > 
				@csrf 
 

				<div class="form-group mb-3">
                <label for="exampleInputEmail1" class="form-label">Amenitie Name</label>
					<input type="text" name="amenities_name" class="form-control">
  {{-- In these form javascript validaion apply using below script tag code--}}
          </div>
<button type="submit" class="btn btn-primary me-2">Save Changes </button>
			 </form></div>
            </div>
           </div>
          </div>
         </div>
</div>
       {{-- javascript validation --}}
      <script type="text/javascript">
        $(document).ready(function (){
            $('#myapp').validate({
                rules: {
                    amenities_name: {
                        required : true,
                    },
                },
                messages :{
                    amenities_name: {
                        required : 'Please Enter Amenities Name',
                    }, 
                },
                errorElement : 'span', 
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
        
    </script>
    {{-- javascript validation end --}}

@endsection