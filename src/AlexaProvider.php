<?php namespace Develpr\AlexaApp;

use Illuminate\Http\Request;

use Illuminate\Support\ServiceProvider;

class AlexaProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    public function boot()
    {
        $request = $this->app->make('request');

        $this->setupSession($request);
    }

    private function setupSession(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        if(! $data)
            $data = json_decode($request->input('content'), true);

        $sessionAttributes = array_get($data, 'session.attributes');
        if( ! $sessionAttributes )
            return;
            
        foreach($sessionAttribute as $key => $value)
        {
            \Session::put($key, $value);
        }

    }
}
