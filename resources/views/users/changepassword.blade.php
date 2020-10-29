@extends('layouts.app')
@inject('model','App\User')
@section('content')

    @section('page_title')

        Create User

    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create User</h3>

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

                {!! Form::model($model,[
                    'action' => 'UsersController@change_password_save',
                    'method' => 'post'
                ]) !!}

                    <div class="form-group">
                        <label for="old-password">Old Password</label>
                        <input type="password" name="old-password" class="form-control" >
                    </div> 

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" >
                    </div> 

                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation</label>
                        {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
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
