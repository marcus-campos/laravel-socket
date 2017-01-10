<?php
/**
 * Created by PhpStorm.
 * User: marcus
 * Date: 09/01/17
 * Time: 13:57
 */

namespace MarcusCampos\LaravelSocket\Facades;


use Illuminate\Support\Facades\Facade;

class Emitter extends Facade
{
    protected static function getFacadeAccessor(){
        return 'emitter';
    }
}