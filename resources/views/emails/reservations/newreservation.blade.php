@component('mail::message')
# Introduction

SunTour Application

<div> : Your Have New Resevation  

    <br> @foreach ($data as $key => $value)

            {{ $key }} :   
            {{ $value }}
            <br>

        @endforeach

</div>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
