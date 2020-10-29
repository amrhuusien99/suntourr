@extends('layouts.app')

@section('content')

    @section('page_title')
        SunTour
    @endsection

    <section class="content-header">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Hotels</span>
                        <?php $counthotel = App\Models\Hotel::count(); ?>
                        <span class="info-box-text"><?php echo $counthotel ?></span>
                        <span class="info-box-number"></span>
                    </div>
                </div>
            </div> 
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Clients</span>
                        <?php $countclient = App\Models\Client::count(); ?>
                        <span class="info-box-text"><?php echo $countclient ?></span>
                        <span class="info-box-number"></span>
                    </div>
                </div>
            </div>
        </div>    
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                You are logged in !
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>

@endsection