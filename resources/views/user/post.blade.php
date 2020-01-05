@extends('user/app')
@section('bg-img',asset("").Storage::disk('local')->url($post->image))
<link rel="stylesheet" href="{{asset('user/css/prism.css')}}">
@section('title',$post->title)
@section('sub-heading',$post->subtitle)
@section('main-content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v5.0&appId=444302566231985&autoLogAppEvents=1"></script>
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <small>Created at {{ $post->created_at}}</small>
                    @foreach($post->categories as $category)
                    <small class="pull-right" style="margin-right:20px  ">

                        <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>

                    </small>
                     @endforeach
                    {!!htmlspecialchars_decode($post->body)!!}

                    @foreach($post->tags as $tag)
                        <a href="{{ route('tag',$tag->slug) }}">
                        <small class="pull-left" style="margin-right:20px;border-radius:5px;border: 1px solid gray ; padding: 5px  ">

                        {{$tag->name}}
                        </small>
                        </a>

                    @endforeach
                </div>
                <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5"></div>
            </div>
        </div>
    </article>
@endsection
@section('footer')
    <script href="{{asset('user/js/prism.js')}}"></script>
@endsection
