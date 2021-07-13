@extends('layouts.app')


@section('content')

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form enctype="multipart/form-data" action="{{ route('posts') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4 " style="display: flex; flex-direction: column;">

                    <label for="img" class="sr-only">Titre</label>
                    <input type="text" id="img" name="body" accept="image/*" class="@error('body') border-red-500 @enderror"
                        placeholder="Post something!">
                    <label for="img" class="sr-only">Select image:</label>
                    <input type="file" id="img" name="image" accept="image/*">


                    {{-- <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg ></textarea>

                        @error('body')
                                <div class=" text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                        @enderror --}}
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                    </div>

                </form>


                
            </div>
        </div>

@endsection
