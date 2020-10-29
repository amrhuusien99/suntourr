@component('mail::message')
# Introduction

SunTour Application Reset Password

<p> Your Reset Code Is : {{$code}} </p>

Thanks,<br>

{{ config('app.name') }}
@endcomponent
