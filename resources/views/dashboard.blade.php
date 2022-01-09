@extends('layouts.main')
@section('content')
</div>
<section class="cart container mt-2 my-3 py-5">
<div class="container mt-2 text-center">
    <h4>Your Profile</h4>
    <p>{{ Auth::user()->name }}</p>
    <p>{{ Auth::user()->email }}</p>
    <form method="post" action="{{route('logout')}}">
        @csrf
        <input type="submit" class="btn btn-danger" value="Logout">
    </form>
</div>
</section>

@endsection