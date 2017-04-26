<?php
namespace App\Http\Middleware;

use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\BrowserConsoleHandler;

class LogBrowserConsole implements Middleware {

  public function handle($request, \Closure $next)
  {
    // add BrowserConsoleHandler to Laravel's Logger
    $log = Log::getMonolog();
    $log->pushHandler(new BrowserConsoleHandler(\Psr\Log\LogLevel::DEBUG));

    // invokes all your stuff like it would do without the middleware but with the new logger
    $response = $next($request);

    // after the request is done we care about the log entries
    $handlers = $log->getHandlers();

    $scriptSnippet = "";
    foreach($handlers as $handler){ // only handle BrowserConsoleHandler
        if($handler instanceof BrowserConsoleHandler){
            ob_start(); //start output buffer so we can save echo to variable
            $handler->send(); // create the scriptSnipped
            $scriptSnippet .= ob_get_clean();
        }
    }

    // write scriptSnippet to end of response content
    $content = $response->getContent();
    $response->setContent($content.$scriptSnippet);

    return $response;
  }
}