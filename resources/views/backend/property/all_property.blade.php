@extends('layouts.master1')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('add_property') }}" class="btn btn-inverse-info"> Add Property </a>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Property All </h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>P Type</th>
                                        <th>Status Type</th>
                                        <th>City</th>
                                        <th>Code</th>
                                        <th>Status</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($property as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img
                                                    src="{{ asset($item->property_thambnail) }}"style="width:70px; height:40px;">
                                            </td>
                                            <td>{{ $item->property_name }}</td>
                                            <td>{{ $item['type']['type_name'] }}</td>
                                            <td>{{ $item->property_status }}</td>
                                            <td>{{ $item->city }}</td>
                                            <td>{{ $item->property_code }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge rounded-pill bg-success">Active</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">Inactive</span>
                                                @endif
                                                {{-- {{$item->status}} --}}
                                            </td>
                                            <td>{{ $item->city }}</td>

                                            <td>
                                                <a href="{{ route('details.property', $item->id) }}"
                                                    class="btn btn-inverse-info" title="Detail"> <i data-feather="eye"></i>
                                                </a>
                                                <a href="{{ route('edit_property', $item->id) }}"class="btn btn-inverse-primary"
                                                    title="Edit"><i data-feather="edit"></i></a>
                                                <a href="{{ route('delete.property', $item->id) }}"
                                                    class="btn btn-inverse-danger" id="delete" title="Delete"> <i
                                                        data-feather="trash-2"></i></a>
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
