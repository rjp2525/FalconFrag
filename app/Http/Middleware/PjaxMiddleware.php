<?php namespace Falcon\Http\Middleware;

use Closure;

class PjaxMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Only handle non-redirection requests
        if (!$response->isRedirection()) {
            // Check for PJAX HTTP headers
            if ($request->server->get('HTTP_X_PJAX')) {
                $crawler = new Crawler($response->getContent());

                // Filter title in order to update browser title bar
                $response_title = $crawler->filter('head > title');

                // Filter to given container
                $response_container = $crawler->filter($request->server->get('HTTP_X_PJAX_CONTAINER'));

                // Container needs to exist
                if ($response_container->count() != 0) {
                    $title = '';

                    // Check for a title attribute
                    if ($response_title->count() != 0) {
                        $title = '<title>' . $response_title->html() . '</title>';
                    }

                    // Set the new content for the response
                    $response->setContent($title . $response_container->html());
                }

                // Update address bar with the last URL in case of redirects
                $response->header('X-PJAX-URL', $request->getRequestUri());
            }
        }

        // Return the response
        return $response;
    }

}
