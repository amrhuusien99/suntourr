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
                @isset(($offer))
                    <div calss="table-rseponsive">
                        <table class="table table-bordered">
                            
                            <tr>
                                <th class="text-center">#</th>
                                <td class="text-center">{{$offer->id}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Title</th>
                                <td class="text-center">{{$offer->title}}</td>
                            </tr>
                            
                            <tr>
                                <th class="text-center">Photo</th>
                                <td class="text-center">
                                    <img src="{{asset($offer->front_image)}}" style="width: 80px; height: 60px;">
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center">Room Images</th>
                                <td class="text-center">{{$offer->images}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Content</th>
                                <td class="text-center">{{$offer->content}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">From</th>
                                <td class="text-center">{{$offer->from}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">To</th>
                                <td class="text-center">{{$offer->to}}</td>
                            </tr>
                            
                            <tr>
                                <th class="text-center">Hotel</th>
                                <td class="text-center">{{optional($offer->hotel)->name}}</td>
                            </tr>

                        </table>
                    </div>  
                @endisset              
            </div>
        </div>
    </section>

@endsection