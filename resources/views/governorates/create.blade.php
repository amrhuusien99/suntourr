@extends('layouts.app')
@section('content')

    @section('page_title')

        Add Governorate

    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add Governorate</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">

              <div class="card-body">
                @include('flash::message')
                @include('partials.validation_errors')
              </div>

                  {!! Form::open([

                      'action' => 'GovernoratesController@store',
                      'method' => 'post'

                    ]) !!}

                  @include('governorates.form')

              {!! Form::close() !!} 
            </div>

            <!-- /.card-body -->
            <!--<div class="card-footer">
              Footer
            </div> -->
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

        </section>

@endsection
