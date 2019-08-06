# Laravel Socket.io [Abandoned]
Socket gun based on wisembly/socket.io(socket.io v1.* emitter only) for Laravel.

Instalation
####Run
```
composer require marcuscampos/laravel-socket
```
####Add to config/app.php providers
```
MarcusCampos\LaravelSocket\SocketServiceProvider::class,
```
If you want custom name add to aliases
```
'SocketIo' => \MarcusCampos\LaravelSocket\Emitter\Facades\Emitter::class,
```
####Publish config
```
php artisan vendor:publish
```
####Usage
```
Emitter::emit('channelOrEvent', array('foo' => 'bar'));
```
