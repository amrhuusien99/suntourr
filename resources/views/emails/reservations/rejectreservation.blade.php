@component('mail::message')
# Introduction

SunTour Application

<div> The Resevation Was Rejected

    <br>@foreach ($data as $key => $value)

        {{ $key }} :
        {{ $value }}
        <br> 
        
        @endforeach

</div>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
