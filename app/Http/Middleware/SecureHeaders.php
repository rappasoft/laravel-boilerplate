<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class SecureHeaders.
 */
class SecureHeaders
{
    // Note: This class is disabled by default
    // You may enable it in the Kernel if you wish to use it
    // You must set the values to your liking, they have been set to sensible defaults

    // Enumerate headers which you do not want in your application's responses.
    // Great starting point would be to go check out @Scott_Helme's:
    // https://securityheaders.com/

    /**
     * @var array
     */
    private $unwantedHeaderList = [
        'X-Powered-By',
        'Server',
    ];

    /**
     * @param $request
     * @param  Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // They seems to mess up the tests so disable them
        if (config('app.testing')) {
            return $next($request);
        }

        $this->removeUnwantedHeaders($this->unwantedHeaderList);

        $response = $next($request);

        // Info: https://scotthelme.co.uk/a-new-security-header-referrer-policy/
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');

        // Info: https://scotthelme.co.uk/hardening-your-http-response-headers/#x-content-type-options
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Info: https://scotthelme.co.uk/hardening-your-http-response-headers/#x-xss-protection
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Info: https://scotthelme.co.uk/hardening-your-http-response-headers/#x-frame-options
        $response->headers->set('X-Frame-Options', 'DENY');

        // Info: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');

        // Info: https://scotthelme.co.uk/content-security-policy-an-introduction/
        // Generate Here: https://www.cspisawesome.com/content_security_policies
        $response->headers->set('Content-Security-Policy', "default-src 'self'");

        // Info: https://scotthelme.co.uk/a-new-security-header-feature-policy/
        $response->headers->set('Feature-Policy', "geolocation 'none'; midi 'none'; sync-xhr 'none'; microphone 'none'; camera 'none'; magnetometer 'none'; gyroscope 'none'; speaker 'self'; fullscreen 'self'; payment 'none'");

        return $response;
    }

    /**
     * @param $headerList
     */
    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header) {
            header_remove($header);
        }
    }
}
