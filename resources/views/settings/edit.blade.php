@extends('layouts.app')
@section('content')

    @section('page_title')

        Setthings

    @endsection

    <section class="content-header">
 
    </section>


        <section class="content">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Setting</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">

              <div class="card-body">
                @include('partials.validation_errors')
                @include('flash::message')
              </div>
                  {!! Form::model($model,[

                      'action' => ['SettingsController@update',$model->id],
                      'method' => 'put'

                    ]) !!}

                      <div class="form-group">
                        <label for="phone">Phone</label>
                            {!! Form::text('phone',null,['class'=>'form-control']) !!}
                      </div>   
                      <div class="form-group">
                        <label for="whats_app">Whats App</label>
                            {!! Form::text('whats_app',null,['class'=>'form-control']) !!}
                      </div> 
                      <div class="form-group">
                        <label for="gmail">Gmail</label>
                            {!! Form::text('gmail',null,['class'=>'form-control']) !!}
                      </div> 
                      <div class="form-group">
                        <label for="facebook">Facebook</label>
                            {!! Form::text('facebook',null,['class'=>'form-control']) !!}
                      </div> 
                      <div class="form-group">
                        <label for="insta">Insta</label>
                            {!! Form::text('insta',null,['class'=>'form-control']) !!}
                      </div> 
                      <div class="form-group">
                        <label for="bank_name">Bank Name</label>
                            {!! Form::text('bank_name',null,['class'=>'form-control']) !!}
                      </div> 
                      <div class="form-group">
                        <label for="app_link">App Link</label>
                            {!! Form::text('app_link',null,['class'=>'form-control']) !!}
                      </div> 
                      <div class="form-group">
                        <label for="commission">Commission</label>
                            {!! Form::text('commission',null,['class'=>'form-control']) !!}
                      </div> 
                      <div class="form-group">
                        <label for="about_us">About Us</label>
                            {!! Form::text('about_us',null,['class'=>'form-control']) !!}
                      </div> 
                      
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
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
