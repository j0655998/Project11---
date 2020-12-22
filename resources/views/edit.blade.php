@extends('layouts.app')

@section('content')
    <div id="wrapper">

            <div id="page" class="container">

            <form method="post" action="/home">
                    @csrf
                    @method('PUT')
                    <div class="field">
                        <label class="label" for="title">修改URL</label>
                        <div class="control">
                        <input class="input"type="text" name="url" id="url"value="{{$articles->URL}}">
                        @error('url')
                        <p>{{$errors->first('url')}}</p>
                        @enderror
                        </div>

                   </div>
                   <input type="hidden" name="id" value="{{$articles->id}}" >
                   <input type="submit" name=archive value="存檔" >
                </form>
            </div>

    </div>

@endsection
