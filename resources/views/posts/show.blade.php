@extends('layouts.app')

@section('title') Show @endsection

@section('content')
<style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
    }
    body {
    background: url(https://tinypic.host/images/2023/03/20/Shapes-Abstraction-Background-2466799.jpg) no-repeat center;
    background-size: cover;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .profile-card {
    overflow: hidden;
    text-align: center;
    position: relative;
    box-shadow: 0 0 10px #111;
    }
    .top-section {
    padding: 30px 40px;
    background: #2e2e32aa;
    }
    .message,
    .notif {
    position: absolute;
    top: 40px;
    font-size: 20px;
    cursor: pointer;
    color: #ffffff50
    }
    .message {
    right: 40px;
    }
    .notif {
    left: 40px;
    }
    .message:hover,
    .notif:hover {
    color: #f1f1f1;
    }
    .pic {
    width: 150px;
    height:150px;
    margin: auto;
    margin-bottom: 20px;
    border: 2px solid #fff;
    border-radius: 50%;
    padding: 8px;
    position: relative;
    }
    .pic:after {
    content: '';
    width: 100%;
    height: 100%;
    position: absolute;
    border: 1px solid #fff;
    left: 0;
    top: 0;
    border-radius: 50%;
    box-sizing: border-box;
    animation: wave 1.5s infinite linear;
    }
    @keyframes wave{
    to {
        transform: scale(1.3);
        opacity: 0;
    }
    }
    .pic img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    }
    .name {
    color: #f1f1f1;
    font-size: 28px;
    letter-spacing: 2px;
    text-transform: uppercase;
    }
    .tag {
    font-size: 18px;
    color: #222;
    }
    .bottom-section {
    background: #f1f1f1;
    padding: 0px 14px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: centre;
    text-transform: uppercase;
    font-size: 20px;
    }
    .bottom-section span {
    font-size: 14px;
    display: block;
    }
    .border {
    width: 1px;
    height: 20px;
    background: #bbb;
    margin: 0 20px;
    }
    .social-media {
    position: absolute;
    width: 100%;
    top: -18px;
    left: 0;
    z-index: 1;
    }
    .social-media i {
    width: 40px;
    height: 40px;
    background: #2c3e50;
    border-radius: 50%;
    color: #f1f1f1;
    line-height: 40px;
    font-size: 20px;
    margin: 0 1px;
    position: relative;
    }
    .social-media i:after {
    content: '';
    width: 100%;
    height: 100%;
    position: absolute;
    background: #2c3e50;
    left: 0;
    top: 0;
    box-sizing: border-box;
    border-radius: 50%;
    z-index: -1;
    transition: 0.4s linear;
    }
    .social-media i:hover:after {
    transform: scale(1.3);
    opacity: 0;
    }
</style>

        <link href='//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
<div class="profile-card">
  <div class="top-section">
    <div class="pic">
        <img src="{{$post->getFirstMediaUrl('image', 'thumb')}}" alt="image">
    </div>
    <div class="name">
        <h5 class="card-title">{{$post['title']}}</h5>
        <p class="card-text">{{$post['description']}}</p>
    </div>
  </div>
  <div class="bottom-section">
    <form style="width:100%;" method="POST" action="{{route('comment.addcomment', [$post->id])}}">
        @csrf
        <div class="card mt-5">
            <div class="card-header">
                Comments
            </div>
            <div class="card-body ">
            <input type="text" class="form-control" name="body">
            </form>
            </div>
            <button class="btn btn-dark" style="width: 140px;align-self: center;">Add comment</button>
            @if(isset($post->comments))
            @foreach($post->comments as $com)
            <div class="card-body">
                <p style="background-color: #eee; border-radius:5px; width:60%; margin:auto; margin-bottom:10px;">{{$com->body}}</p>
                <div style="display: flex; justify-content:center; gap:px">
                    <p style="font-size: 10px">created at:</p>
                    <p style="font-size: 10px">{{$com->created_at->diffForHumans()}}</p>
                </div>
                <form method="POST"  action="{{route('comment.deleteComment', [$post->id, $com->id])}}">
                    @method('delete')
                    @csrf
                    <button class="btn btn-dark">Delete</button>
                </form>
            </div>
            @endforeach

            @else

            <p class="mt-5 text-center"> No comment found</p>
            @endif
  </div>
</div>

@endsection
