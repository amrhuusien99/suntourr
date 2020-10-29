@extends('layouts.app')

@section('content')

    @section('page_title')
        Settings
    @endsection

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Of Settings</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                @if(count($records))
                    <div calss="table-rseponsive">
                        @foreach($records as $record)
                            <a href="{{url(route('settings.edit',$record->id))}}" class="btn btn-success mb-3"> <i class="fa fa-plus"> </i> edit Settings</a>
                            <table class="table table-bordered">

                                <tr>
                                    <th>#</th>
                                    <td>{{$record->id}}</td>
                                </tr> 
                                 
                                <tr>
                                    <th>Phone</th>
                                    <td>{{$record->phone}}</td>
                                </tr>

                                <tr>
                                    <th>Whats App</th>
                                    <td>{{$record->whats_app}}</td>
                                </tr>

                                <tr>
                                    <th>Gamil</th>
                                    <td>{{$record->gmail}}</td>
                                </tr>

                                <tr>
                                    <th>Facebook</th>
                                    <td>{{$record->id}}</td>
                                </tr>

                                <tr>
                                    <th>Insta</th>
                                    <td>{{$record->insta}}</td>
                                </tr>  

                                <tr>
                                    <th>Bank Name</th>
                                    <td>{{$record->bank_name}}</td>
                                </tr>

                                <tr>
                                    <th>App Link</th>
                                    <td>{{$record->app_link}}</td>
                                </tr>

                                <tr>
                                    <th>Commission</th>
                                    <td>{{$record->commission}}</td>
                                </tr>

                                <tr>
                                    <th>About Us</th>
                                    <td>{{$record->about_us}}</td>
                                </tr>

                            @endforeach 
                        </table>
                    </div>  
                @endif                   
            </div>
        </div>
    </section>

@endsection