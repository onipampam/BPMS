@extends('layouts.user')

@section('page_title')

Vendor

@endsection

@extends('includes.table_includes');

@section('content')
	
	<div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Vendor
                            </h2><br>
                             <div class="row clearfix js-sweetalert">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                    <a href= "{{route('admin.vendor.create')}}" type="button" class="btn btn-primary waves-effect">+Add</a>
                                </div>
                            </div>

                                @if(Session::has('deleted_vendor'))
                                 <p class="bg-danger">{{Session('deleted_vendor')}}</p>
                                @endif

                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Balance</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Balance</th>
										<th>Action</th>

                                    </tr>
                                </tfoot>
                                <tbody>

                                @if($vendors)
									@foreach($vendors as $vendor)
                                    <tr>
										<td>{{$vendor->name}}</td>
										<td>{{$vendor->email}}</td>
										<td>{{$vendor->phone}}</td>
										<td>{{$vendor->balance}}</td>
										
                                        <td>
                                            <a href="{{route('admin.vendor.edit', $vendor->id)}}" class="btn btn-default btn-xs waves-effect"><i class="material-icons">create</i></a>
                                            <button class="btn btn-default btn-xs waves-effect" data-toggle="modal" data-type="confirm" data-target="#deletevendor{{$vendor->id}}"><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
             @if($vendors)
            @foreach($vendors as $vendor)
 
            <!-- Delete -->
            <div class="modal fade" id="deletevendor{{$vendor->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Delete a vendor</h4><br>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete?
                        </div>
                        <div class="modal-footer">
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminVendorsController@destroy', $vendor->id]]) !!}

                            {!! Form:: submit('DELETE', ['class'=>'btn btn-link waves-effect']) !!}
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                        </div>
                    </div>
                </div>
            </div>
           <!--End Delete--> 



        {!! Form::close() !!}
        @endforeach
        @endif

        </div>

	
@stop