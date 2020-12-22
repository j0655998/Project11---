@extends('layouts.app')

@section('content')

    {{-- <div class="container"> --}}

        <div class="row justify-content-center">

            <div class="col-md-8">

                <form method="post" action="/home">
                    @csrf
                    輸入網址
                    <input type="text" name="url" id="url">
                    <input type="submit" value="新增">
                    @error('url')
                        <p>{{ $errors->first('url') }}</p>
                    @enderror
                </form>
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card">

                    @CSRF

                    @foreach ($articles as $article)
                        <div class="{{ $article->status == 'Offline' ? 'server has-failed' : 'server' }}">

                            <ul class="server-details">
                                <li>Hostname: <span class="data">{{ $article->URL }}</span></li>
                                <div class="editor">
                                    <li>Status: <span class='data signal'>{{ $article->status }}</span>
                                        <label class="form-inline" style="float:right">
                                            <form method="post" action="/home">
                                                @csrf
                                                @method('delete')

                                                <input type="hidden" name="id" value="{{ $article->id }}">
                                                <input type="submit" name="delete" value="刪除">

                                            </form>
                                            &emsp;
                                            <form method="get" action="{{ route('edit', ['article' => $article->id]) }}">
                                                @csrf
                                                <input type="submit" value="編輯">


                                            </form>
                                        </label>
                                    </li>
                                </div>
                                <li>Address: <span class='data'>192.168.0.24</span></li>

                            </ul>
                        </div>


                    @endforeach

                    {{ $articles->render()}}

                </div>


            </div>


        </div>

    </div>



    {{-- </div> --}}

@endsection
