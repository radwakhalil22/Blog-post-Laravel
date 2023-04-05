@extends('layouts.app')

@section('title') Edit Post @endsection

@section('content')
<style>
        body{
        height: 100vh;
    }
    .create-container{
        display: flex   !important;
        justify-content: center !important;
        margin: 100px auto !important;
        background: #181818ce;
        width: fit-content;
        padding: 30px !important;
        border-radius: 10px !important;
        color: wheat;
    }
    input{
        margin-bottom: 10px;
    }
    button {
  background: #fff;
  border: none;
  padding: 10px 20px;
  display: inline-block;
  font-size: 15px;
  font-weight: 600;
  width: 120px;
  text-transform: uppercase;
  cursor: pointer;
  transform: skew(-21deg);
}

span {
  display: inline-block;
  transform: skew(21deg);
}

button::before {
  content: '';
  position: absolute;
  top: 0;
  bottom: 0;
  right: 100%;
  left: 0;
  background: rgb(20, 20, 20);
  opacity: 0;
  z-index: -1;
  transition: all 0.5s;
}

button:hover {
  color: #fff;
}

button:hover::before {
  left: 0;
  right: 0;
  opacity: 1;
}
</style>
    <div class="create-container">
        <form method="post" action="{{route('posts.update', $post)}}" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="form-group"  >
        <label for="exampleFormControlInput1">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="title" value="{{$post['title']}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="description" value="{{$post['description']}}">
        </div>


        <div class="form-group">
        <label for="exampleFormControlTextarea1">Post creator</label>
                <select class="form-control" name="user_id">
                <option value="{{$post->user->id}}">Select user</option>
                <option value="{{$post->user->id}}">{{$post->user->name}}</option>
            </select>
        </div>
        <br>
        <div class="form-group" style="display: grid; place-items: center;">
            <input type="file" name="image" id="fileToUpload">
            <br>
            <button type="submit" ><span>Edit</span></button>
            </div>
            @if($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>

                        @endforeach
                    </ul>
                </div>
            @endif


        </form>
    </div>
    @endsection
