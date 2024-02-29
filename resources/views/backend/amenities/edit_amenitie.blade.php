@extends('layouts.master1')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">

       
        <div class="row profile-body">
        
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
             <div class="card">
              <div class="card-body">

			<h6 class="card-title">Edit Amenities</h6>

			<form  method="POST" action="{{route('update_amenitie',$amenitie->id)}}" class="forms-sample" > 
				@csrf 
 
        <input type="hidden" name="id" value={{$amenitie->id}}>
				<div class="mb-3">
               
                <label for="exampleInputEmail1" class="form-label">Amenitie Name</label>
					<input type="text" name="amenities_name" class="form-control
           @error('amenities_name') is-invalid @enderror" value="{{$amenitie->amenities_name}}">
          
           {{-- above in form control and below validation --}}
           @error('amenities_name')
           <span class="text-danger">{{ $message }}</span>
           @enderror
           {{-- end validation --}}
				</div>

      		 
	 <button type="submit" class="btn btn-primary me-2">Update </button>
			 
			</form>

              </div>
            </div>




            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
         
          <!-- right wrapper end -->
        </div>

			</div>
 


@endsection