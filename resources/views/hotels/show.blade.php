@extends('layouts.app')

@section('content')

    @section('page_title')
        Hotels
    @endsection

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Of Hotels</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                @isset(($hotel))
                    <div calss="table-rseponsive">
                        <table class="table table-bordered">

                             @include('flash::message')

                            <tr>
                                <th class="text-center">#</th>
                                <td class="text-center">{{$hotel->id}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Name</th>
                                <td class="text-center">{{$hotel->name}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Email</th>
                                <td class="text-center">{{$hotel->email}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Phone</th>
                                <td class="text-center">{{$hotel->phone}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Photo</th>
                                <td class="text-center">
                                    <img src="{{asset($hotel->photo)}}" style="width: 80px; height: 60px;">
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center">Average Price</th>
                                <td class="text-center">{{$hotel->average_price}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Governorate</th>
                                <td class="text-center">{{optional($hotel->governorate)->name}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Country</th>
                                <td class="text-center">{{optional($hotel->governorate->country)->name}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Category</th>
                                <td class="text-center">{{optional($hotel->category)->name}}</td>
                            </tr>

                            <tr>
                                <th class="text-center">Section State</th>
                                <td class="text-center">
                                    @if($hotel->section == 'normal')
                                        <a href="{{url(route('hotels-in-page',$hotel->id))}}"
                                            class="btn btn-info btn-xs">In Page</a>
                                    @else
                                        <a href="{{url(route('hotels-normal',$hotel->id))}}"
                                            class="btn btn-success btn-xs">Normal</a>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center">Is Popular</th>
                                <td class="text-center">
                                    @if($hotel->popular == 'popular')
                                        <a href="{{url(route('hotels-un-popular',$hotel->id))}}"
                                            class="btn btn-success btn-xs">Popular</a>
                                    @else
                                        <a href="{{url(route('hotels-popular',$hotel->id))}}"
                                            class="btn btn-danger btn-xs">Un Popular</a>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center">Is Activate</th>
                                <td class="text-center">
                                    @if($hotel->is_activate)
                                        <a href="{{url(route('hotels-deactivate',$hotel->id))}}"
                                            class="btn btn-danger btn-xs">Deactivate</a>
                                    @else
                                        <a href="{{url(route('hotels-activate',$hotel->id))}}"
                                            class="btn btn-success btn-xs">ِActivate</a>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>  
                @endisset              
            </div>
        </div>
    </section>

@endsection