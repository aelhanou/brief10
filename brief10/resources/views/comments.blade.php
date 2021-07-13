@extends('layouts.app')


@section('content')

    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg ">

            <div class="mb-4">

                <h1 style="display:flex; width:100%;justify-content:center;font-size:28px !important;">{{ $posts->body   }}
                </h1>
                <img src="{{ asset('storage/' . $posts->image) }}" alt="" srcset=""
                    style="width: 550px;margin:auto;height:300px">
                <div style=" display: flex; width: 100%;justify-content:center;margin-left:-103px;margin-top: 10px">
                    {{ $posts->created_at }}</div>

            </div>

        </div>
    </div>

    <div class="flex justify-center mt-10">
        <div class="w-6/12 bg-white p-6 rounded-lg ">
            <form action="{{ route('comment.create',['id' => $posts->id]) }}" method="POST">

                @csrf
                <div>
                    <textarea type="email" name="comments"
                        style="border:3px solid black;border-radius:6px;text-align: center;" rows="10" cols="125"
                        id="comment" aria-describedby="emailHelpId" placeholder="Comment"></textarea>
                </div>
                <div style="width: 100%;display:flex;justify-content: flex-end;margin-top: 10px;">
                    <button type="submit"
                        style="width:120px ;background-color: gray;color:white;padding:8px;border-radius:9px;">Send</button>
                </div>
            </form>

        </div>
    </div>
    @foreach ($comments as $value)
        <div class="flex justify-center m-4">
            <div class="w-6/12 bg-white p-6 rounded-lg ">

                <div style="display: flex;flex-direction: row;gap:10px">
                    <img src="{{ asset('storage/NbrUdrBohthNLBwSDzJVtLE3RkUomk8afmOn8x3H.png') }}" style="width: 50px;height:50px;border-radius:100%" alt="" srcset="">
                    <h2 style="margin-top: 5px;font-size:23px !important;">{{ $value->name }}</h2>
                    <h2 style="margin-top: 8px;font-size:20px !important;">{{ $value->created_at }}</h2>
                </div>

                <div class="w-12/12   rounded-lg" style="color: white;padding:1px;margin:10px 5px;background-color: gainsboro">
                    <p style="margin: 10px">{{ $value->comments }}</p>
                </div>
                <div style="display: flex;justify-content: flex-end;width: 100%">
                    <button
                        style="width:80px ;background-color: gray;color:white;padding:8px;border-radius:9px;">Reply</button>
                </div>
            </div>
        </div>
    @endforeach


@endsection
