{{-- Affichage de la page de gestion des posts utilisateur --}}

@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts' list</div>

                <div class="card-body">


                    {{-- Affichage d'un message spécifique si l'utilisateur n'a pas encore écrit de post --}}
                    @if($posts->isEmpty())
                    <div class="col text-center">
                    <p> You didn't wrote any article. Do you want to write one ? </p>
                    <a href="{{ route('posts.create') }}">
                        <button class="btn btn-primary m-1 ">Write an article </button></a>
                    </div>
                    @else

                    {{-- Sinon affichage d'un tableau de gestion des posts --}}
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th scope="col"> Date </th>
                                <th scope="col"> Title </th>
                                <th scope="col"> Status </th>
                                <th scope="col"> Type </th>
                                <th scope="col"> Category </th>
                                <th scope="col"> Actions </th>
                            </tr>
                        </thead>

                        <tbody>

                            {{-- On itère sur chaque posts --}}
                    @foreach ($posts as $post )

                            <tr>
                                <th scope="row"> {{ $post->post_date}} </td>
                                <td> {{ $post->post_title}} </td>
                                <td> {{ $post->post_status}} </td>
                                <td> {{ $post->post_type}} </td>
                                <td> {{ $post->post_category}} </td>

                                <td>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <a href="{{route('user.posts.show',$post->id)}}">
                                            <button class="btn btn-primary m-1">Show </button></a>
                                        <a href="{{route('user.posts.edit',$post->id)}}">
                                            <button class="btn btn-secondary m-1">Edit </button></a>

                                        <form action="{{route('user.posts.destroy',$post->id)}}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-1"> Delete </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                            @endif


                </div>

            </div>

        </div>

        {{-- Pagination --}}
        {!! $posts->render() !!}

    </div>

</div>


@endsection
