@extends('layouts.master1')
@section('content')
<div class="page-content">
    <nav class="page-breadcrumb">
					<ol class="breadcrumb">
	  <a href="{{ route('add_amenitie')}}" class="btn btn-inverse-info"> Add Amenities  </a>
					</ol>
		</nav>
   <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h6 class="card-title">Amenities All </h6>
              <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl </th>
                        <th>Amenitie Name </th>
                        <th>Action </th> 
                      </tr>
                    </thead>
                  <tbody>
                   @foreach($amenitie as $key => $item)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$item->amenities_name}}</td>
                         
                          <td><a href="{{route('edit_amenitie',$item->id)}}"class="btn btn-inverse-primary">Edit</a>
                           <a href="{{route('delete_amenitie',$item->id)}}"id="delete" class="btn btn-inverse-danger">Delete</td></a>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
                </div>
              </div>
          </div>
				</div>
			</div>
   </div>

@endsection

