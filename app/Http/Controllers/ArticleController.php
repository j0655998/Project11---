<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ArticleController extends Controller
{

    public function store(Request $request)
    {

        request()->validate([
            'url' => 'required'
        ]);

        $articles = new Article;

        $articles->URL = $request->input('url');

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $request->input('url'));
            $container = $response->getStatusCode();
            if ($container == 200) {
                $determination = 'Online';
            } else {
                $determination = 'Offline';
            }
        } catch (\Exception $e) {

            $determination = 'Offline';
        }

        $articles->status = $determination;


        $articles->save();

        return redirect('/home');
    }

    public function add()
    {
        $articles = Article::Paginate(6);

        return view('/home', compact('articles'));
    }
    public function welconmadd()
    {
        $articles = Article::Paginate(35);

        return view('/welcome', compact('articles'));
    }



    public function edit($id)
    {
        $articles = Article::find($id);
        return view('edit', compact('articles'));
    }
    public function update(Request $request)
    {
        request()->validate([
            'url' => 'required'
        ]);

        $articles = Article::find($request->input('id'));
        $articles->URL = $request->input('url');

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $request->input('url'));
            $container = $response->getStatusCode();
            if ($container == 200) {
                $determination = 'Online';
            } else {
                $determination = 'Offline';
            }
        } catch (\Exception $e) {

            $determination = 'Offline';
        }

        $articles->status = $determination;

        $articles->save();

        return redirect('/home');
    }

    public function destroy(Request $request)
    {
        $delete = $request->input('id');
        Article::destroy($delete);
        return redirect('/home');
    }
}
