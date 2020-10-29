@extends('layouts.app')

@section('content')

    @section('page_title')
        Reservations
    @endsection

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Of Reservations</h3>
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
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>State</th>
                                    <th>Room Quantity</th>
                                    <th>Days Quantity</th>
                                    <th>Total Cost</th>
                                    <th>Hotel</th>
                                    <th>Client</th>
                                    <th>Show</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr class="text-center">
                                        <td>{{$record->id}}</td>
                                        <td>{{$record->state}}</td>
                                        <td>{{$record->room_quantity}}</td>
                                        <td>{{$record->days_quantity}}</td>
                                        <td>{{$record->total_cost}}</td>
                                        <td>{{optional($record->hotel)->name}}</td>
                                        <td>{{optional($record->client)->name}}</td>
                                        <td>
                                            <a href="{{url(route('reservations.show',$record->id))}}" class="btn btn-info btn-xs">Show</a>
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