<?php
/**
 * Created by PhpStorm.
 * User: marcus
 * Date: 10/01/17
 * Time: 09:42
 */

namespace MarcusCampos\LaravelSocket\Receiver;

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X;
use Config;
use ElephantIO\Exception\ServerConnectionFailureException;

class Receiver
{
    public static function receive()
    {
        $host = config('socket.emit.host');
        $port = config('socket.emit.port');

        $url = $host.':'.$port;

        $client = new Client(new Version1X($url));
        $client->initialize();

        while (true) {
            $r = $client->read();
            dd($r);
        }

        $client->close();
    }
}