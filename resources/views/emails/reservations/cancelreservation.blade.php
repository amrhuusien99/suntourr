@component('mail::message')
# Introduction

SunTour Application

<div> The Customer Cancel The Reservation

    <br> @foreach ($data as $key => $value)

            {{ $key }} :   
            {{ $value }}
            <br>

        @endforeach

</div>

Thanks,<br>
{{ config('app.name') }} 
@endcomponent
