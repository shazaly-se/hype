@extends('dashboard.index')

@section('content')

<div class="row">

      @foreach($users as $user)
      <div class="col-md-4 mt-2">
                          <div class="card text-white bg-secondary mb-3" >
                              
                              <div class="card-body">
                                  <h5 class="card-title">{{$user->name}}</h5>
                                  <p class="card-text">{{$user->email}}</p>
                                  
                              </div>
                              </div>
                          </div>
      @endforeach
  
  
    </div>


@endsection