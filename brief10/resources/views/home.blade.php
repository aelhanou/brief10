@extends('layouts.app')


@section('content')
<div class="flex justify-center m-10">
    <div class="w-8/12 bg-white p-6 rounded-lg" style="text-align: center">
        MOVIES
    </div>
</div>
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg " style="display: flex;flex-direction: row; gap:30px;flex-wrap: wrap;justify-content: center;">
        @if ($posts->count())
                    @foreach ($posts as $post)
                        <div>
                            <div class="mb-4">

                                <img src="{{ asset('storage/'.$post->image) }}" alt="" srcset="" style="width: 350px;margin-right:15px;height:300px">
                                <span class="text-gray-600 text-sm"> {{ $post->created_at }}</span>
                                <p class="mb-2">{{ $post->body }}</p>
                            </div>
                            <a href="{{route('comment' ,['id' => $post->id ]) }}" style="background-color: gray;color:black;padding:8px;border-radius:9px">Read More</a>
                            <a href="#" style="background-color: red;color:white;padding:8px;border-radius:9px">Delete</a>
                            <a href="#" style="background-color: blue;color:white;padding:8px;border-radius:9px">Update</a>
                        </div>
                    @endforeach
            @else
                    <p>There are no posts</p>
                @endif
    </div>
</div>

@endsection
