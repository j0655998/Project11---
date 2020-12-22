<?php

namespace App\Console;
use App\Models\Article;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
    $schedule->call(function () {
        $article = Article::all();

        foreach ($article as $post) {
            try{
            $urls=($post->URL);
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET',$urls);
            $container= $response->getStatusCode();
            if($container=200){
                $determination='Online';
            }else{
                $determination='Offline';
            }

        }catch (\Exception $e){
            $determination='Offline';


        }
        $post->status=$determination;
        $post->save();


        }

           });

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
