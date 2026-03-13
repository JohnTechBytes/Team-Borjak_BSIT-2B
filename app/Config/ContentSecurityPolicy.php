<?php

namespace Config;

use CodeIgniter\HTTP\ContentSecurityPolicy\Config;

class ContentSecurityPolicy extends Config
{
    /**
     * Default policy directives for your app
     */
    public array $defaultDirectives = [
        'default-src' => "'self'",
        'script-src'  => [
            "'self'",
            // Add trusted script sources here (e.g., for analytics or widgets)
        ],
        'style-src'   => [
            "'self'",
            "'unsafe-inline'", // Temporary if you use inline styles; remove when possible
        ],
        'img-src'     => [
            "'self'",
            'data:', // Allow inline images (e.g., base64) if needed
        ],
        'connect-src' => "'self'",
        'font-src'    => "'self'",
        'object-src'  => "'none'",
        'frame-src'   => "'none'",
        'report-uri'  => '/csp-report', // Optional: For violation reports
    ];

    /**
     * Whether to send the policy as "report-only" (no blocking, just reports)
     */
    public bool $reportOnly = false;
}
