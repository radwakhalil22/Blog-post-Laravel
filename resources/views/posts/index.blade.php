@extends('layouts.app')

@section('title') index @endsection

@section('content')
    <div class="text-center">
        <a type="button" class="mt-4 btn btn-success btn-style" href="{{route('posts.create')}}">Create Post</a>
        <a type="button" class="mt-4 btn btn-success btn-style" href="{{route('posts.deleteOldPost')}}">Delete old posts</a>
    </div>
    @if(session('message'))
    <div class="alert alert-danger">
        {{{ session('message') }}}
    </div>
    @endif
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
            <th scope="col">Slug</th>
            <th scope="col">image</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post['created_at']}}</td>
                <td>
                    <a style="background: rgb(31, 0, 71);" href="{{route('posts.show', $post['id'])}}" class="btn text-light">View</a>
                    <a style="background: rgb(2, 24, 4);" href="{{route('posts.edit', $post['id'])}}" class="btn text-light">Edit</a>
                    @if($post->trashed())
                    <a href="{{route('posts.restore', $post['id'])}}" class="btn btn-secondary">Restore</a>
                    @else
                    <button style="background: rgb(53, 4, 4);" href="#" class="btn text-light"  data-bs-toggle="modal" data-bs-target="#modal{{ $post->id }}">Delete</button>
                    @endif
                </td>
                <td>{{$post['slug']}}</td>
                @if ($post->getFirstMediaUrl('image', 'thumb'))
                <td><img style="width: 50px; height:50px;" src="{{$post->getFirstMediaUrl('image', 'thumb')}}" /></td>
                @else
                <td>No Image</td>
                @endif
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="modal{{ $post->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Alarm</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to Delete your post?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">No</button>
                                                <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        @endforeach



        </tbody>
    </table>

                    <div class="d-flex justify-content-center mt-5">
                        {!! $posts->links("pagination::bootstrap-5") !!}
                    </div>



@endsection
