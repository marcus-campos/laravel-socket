<?php
/**
 * Created by PhpStorm.
 * User: marcus
 * Date: 09/01/17
 * Time: 13:56
 */

namespace MarcusCampos\LaravelSocket\Emitter;

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X;
use Config;
use ElephantIO\Exception\ServerConnectionFailureException;

class Emitter
{
    /**
     * @param $channel
     * @param $message
     * @return bool
     */

    public static function emit($channel, $message){
        try{

            $host = config('socket.emit.host');
            $port = config('socket.emit.port');

            $url = $host.':'.$port;
            $client = new Client(new Version1X($url));
            $client->initialize();
            $client->emit($channel, $message);
            $client->close();
        }catch (ServerConnectionFailureException $ex){
            \Log::alert('failed to connect socket io stream on '.$url);
            return false;
        }
        return true;
    }
}