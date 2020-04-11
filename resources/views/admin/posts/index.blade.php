@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts' list</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"> # </th>
                                <th scope="col"> Author </th>
                                <th scope="col"> Date </th>
                                <th scope="col"> Title </th>
{{--                                 <th scope="col"> Content </th>
 --}}                                <th scope="col"> Status </th>
                                <th scope="col"> Type </th>
                                <th scope="col"> Category </th>
                                <th scope="col"> Actions </th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($posts as $post )
                            <tr>
                                <th scope="row"> {{ $post->id}} </th>
                                <td> {{ $post->author->name }}</td>
                                <td> {{ $post->post_date}} </td>
                                <td> {{ $post->post_title}} </td>
{{--                                 <td> {{ $post->post_content}} </td>
 --}}                                <td> {{ $post->post_status}} </td>
                                <td> {{ $post->post_type}} </td>
                                <td> {{ $post->post_category}} </td>

                                <td>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <a href="{{route('admin.posts.show',$post->id)}}">
                                        <button class="btn btn-primary m-1">Show </button></a>
                                <a href="{{route('admin.posts.edit',$post->id)}}">
                                    <button class="btn btn-secondary m-1">Edit </button></a>

                                    <form action="{{route('admin.posts.destroy',$post->id)}}" method="post" class="d-inline">
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

                </div>

            </div>

        </div>
        {!! $posts->render() !!}

    </div>

</div>


@endsection
