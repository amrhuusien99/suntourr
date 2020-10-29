@extends('layouts.app')

@section('content')

    @section('page_title')
        Rooms
    @endsection

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Of Rooms</h3>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Max In Room</th>
                                    <th>Front Image</th>
                                    <th>Today Price</th>
                                    <th>Hotel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <td>{{$record->id}}</td>
                                        <td>{{$record->title}}</td>
                                        <td>{{$record->max_in_room}}</td>
                                        <td>
                                            <img src="{{asset($record->front_image)}}" style="width: 80px; height: 60px;">
                                        </td>
                                        <td>{{$record->today_price}}</td>
                                        <td>{{optional($record->hotel)->name}}</td>
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