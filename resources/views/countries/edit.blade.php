@extends('layouts.app')
@section('content')

    @section('page_title')
        Edit Country
    @endsection

    <section class="content-header">
 
    </section>
        <section class="content">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Country</h3>
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

                      'action' => ['CountriesController@update',$model->id],
                      'method' => 'put'

                    ]) !!}

                      <div class="form-group">
                        <label for="name">Name</label>
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                      </div>   
                      
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                  {!! Form::close() !!} 
            </div>
        </div>
    </section>

@endsection
