@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Vos informations</div>

                <div class="card-body">


                        <div class="row">
                            <div class="col-md-6 text-right font-weight-bold mt-3">Registration date</div>
                            <div class="col-md-6 mt-3"> {{ $users->created_at}} </div>
                            <div class="col-md-6 text-right font-weight-bold mt-3">Name</div>
                            <div class="col-md-6 mt-3"> {{ $users->name}} </div>
                            <div class="col-md-6 text-right font-weight-bold mt-3">Email</div>
                            <div class="col-md-6 mt-3"> {{ $users->email}} </div>
                            <div class="col-md-6 text-right font-weight-bold mt-3">Role</div>
                            <div class="col-md-6 mt-3"> {{ implode(', ', $users->roles()->get()->pluck('name')->toArray()) }}</div>
  {{--                           <div class="col-md-6 text-right font-weight-bold">Number of posts</div>
                            <div class="col-md-6"> {{ $users->created_at}}</div>
                            <div class="col-md-6 text-right font-weight-bold">Number of comments</div>
                            <div class="col-md-6"> {{ $users->created_at}}</div> --}}

                            <div class="col text-center mt-4">

                           <a href="{{ route('user.users.edit', $users->id) }}">
                            <button class="btn btn-primary mr-3"> Change my informations </button>

                             <a href="{{ route('user.users.password', $users->id) }}">
                                <button class="btn btn-primary"> Change my password </button></a>
                             </div>

               </div>
                    </div>
                </div>

                <div class="text-right mt-3">

                <form action="{{route('user.users.destroy',$users->id)}}" method="post" class="d-inline align-right">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger align-right"> Delete my account </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
