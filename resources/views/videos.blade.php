@extends('layouts.videos')
@section('title','Videos')
@section('content')
<video id="my-video" class="video-js" controls preload="auto" autoplay="true" width="100%" height="100%"
  poster="MY_VIDEO_POSTER.jpg" data-setup="{'autoplay': true}">
    <source src="https://seoul.sfo2.digitaloceanspaces.com/023ks02948.mp4" type='video/mp4'>
    <p class="vjs-no-js">
      Para poder ver este video, recomendamos activar JavaScript y tener un explorador que
      <a href="https://videojs.com/html5-video-support/" target="_blank">soporte HTML5.</a>
    </p>
  </video>
@endsection