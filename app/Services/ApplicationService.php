<?php

namespace App\Services;

use App\Models\Application;

class ApplicationService {




    function     store(array $app)
    {

       try {
        return  Application::create($app);
    } catch (\Exception $e) {
      //  abort(500, $e->getMessage());
        throw new \Exception($e->getMessage());

    }

    }

    function  getApp(string $app)
    {

       try {
        return  Application::whereAppNo($app)->first();
    } catch (\Exception $e) {
      //  abort(500, $e->getMessage());
        throw new \Exception($e->getMessage());

    }

    }


    function   updateAppStage(string $app, int $stage=0)
    {

       try {
        return  Application::whereAppNo($app)->update(['stage'=>$stage]);
    } catch (\Exception $e) {
      //  abort(500, $e->getMessage());
        throw new \Exception($e->getMessage());

    }

    }



}
