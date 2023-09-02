
@extends('layouts.home', ['class' => '', 'activePage' => 'home', 'title' => __('Home')])
@section('content')
<div class="container-fluid py-2">
   <div class="row">
      <div class="col-sm-12">
         <!--      Wizard container        -->
         <div class="wizard-container">
               <div class="card text-center" data-color="red" id="wizardProfile">
               <div class="card-body">
               <p class="card-title"><strong>{{ __('Welcome User') }}</strong></p>
               <p>
                  Name:{{ auth()->user()->name }}<br>
                  Email:{{ auth()->user()->email }}
               </p>
               </div>
               </div>
         </div> <!-- wizard container -->
      </div>
   </div>
</div>
@endsection
