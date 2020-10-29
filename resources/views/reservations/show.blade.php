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
                @isset(($reservation))
                    <div calss="table-rseponsive">
                        <table class="table table-bordered">
                            
                            <tr>
                                <th class="text-center">#</th>
                                <td class="text-center">{{$reservation->id}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Notes</th>
                                <td class="text-center">{{$reservation->notes}}</td>
                            </tr>
                            
                            <tr>
                                <th class="text-center">Hotel</th>
                                <td class="text-center">{{optional($reservation->hotel)->name}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Title</th>
                                <td class="text-center">{{optional($reservation->room)->first()->title}}</td>
                            </tr>
                            
                            <tr>
                                <th class="text-center">Photo</th>
                                <td class="text-center">
                                    <img src="{{asset(optional($reservation->room)->first()->front_image)}}" style="width: 80px; height: 60px;">
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center">Reservation State</th>
                                <td class="text-center">{{$reservation->state}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Room Quantity</th>
                                <td class="text-center">{{$reservation->room_quantity}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Days Quantity</th>
                                <td class="text-center">{{$reservation->days_quantity}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Cost</th>
                                <td class="text-center">{{$reservation->cost}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Net</th>
                                <td class="text-center">{{$reservation->net}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Commission</th>
                                <td class="text-center">{{$reservation->commission}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Total Cost</th>
                                <td class="text-center">{{$reservation->total_cost}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Client</th>
                                <td class="text-center">{{optional($reservation->client)->name}}</td>
                            </tr>

                        </table>
                    </div>  
                @endisset              
            </div>
        </div>
    </section>

@endsection