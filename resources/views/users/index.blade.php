@extends('layouts.app')

@section('content')

    @section('page_title')
        Users
    @endsection

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Of Users</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <a href="{{url(route('users.create'))}}" class="btn btn-primary mb-3"> <i class="fa fa-plus"> </i> Add User</a>
                @if(count($records))
                    <div calss="table-rseponsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Photo</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('flash::message')
                                @foreach($records as $record)
                                    <tr>
                                        <td>{{$record->id}}</td>
                                        <td>{{$record->name}}</td>
                                        <td>{{$record->email}}</td>
                                        <td>{{$record->phone}}</td>
                                        <td>
                                            <img src="{{asset($record->photo)}}" style="width: 80px; height: 60px;">
                                        </td>
                                        <td class="text-center">
                                            <a href="{{url(route('users.edit',$record->id))}}" class="btn btn-success btn-xs" class="fa fa-edit"> Edit </a>
                                        </td>

                                        <td class="text-center">

                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal-{{ $record->id}}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>

                                            <div class="modal fade" id="myModal-{{ $record->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" action="{{url(route('users.destroy',$record->id))}}" class="" method="POST">
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                {{ csrf_field() }}
                                                                <p>are you sure To Delete This Data</p>
                                                                <button type="submit" class="btn btn-danger" name='delete_modal'><i class="fa fa-trash" aria-hidden="true"></i> delete</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        
                                    </tr>  
                                @endforeach 
                            </tbody>
                        </table>
                    </div>  
                @endif                   
            </div>
        </div>
    </section>

@endsection