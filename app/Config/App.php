<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Base Site URL
     * --------------------------------------------------------------------------
     * URL to your CodeIgniter root (use your actual Vercel app URL with HTTPS)
     */
    public string $baseURL = 'https://team-borjak-bsit-2b.vercel.app/';

    /**
     * --------------------------------------------------------------------------
     * Allowed Hostnames
     * --------------------------------------------------------------------------
     * Hostnames other than baseURL that your app should accept.
     * NOTE: http://media.example.com/ and http://accounts.example.com/ return errors (per docs), so left empty for now.
     */
    public array $allowedHostnames = [];

    /**
     * --------------------------------------------------------------------------
     * Index File
     * --------------------------------------------------------------------------
     * Empty string removes index.php from URLs (configured via vercel.json/.htaccess)
     */
    public string $indexPage = '';

    /**
     * --------------------------------------------------------------------------
     * URI PROTOCOL
     * --------------------------------------------------------------------------
     * Default setting works for most servers (including Vercel)
     */
    public string $uriProtocol = 'REQUEST_URI';

    /**
     * --------------------------------------------------------------------------
     * Allowed URL Characters
     * --------------------------------------------------------------------------
     * Restrict to safe characters (do not change unless absolutely necessary)
     */
    public string $permittedURIChars = 'a-z 0-9~%.:_\-';

    /**
     * --------------------------------------------------------------------------
     * Default Locale
     * --------------------------------------------------------------------------
     * Set to 'fil' for Filipino if needed; 'en' is default
     */
    public string $defaultLocale = 'en';

    /**
     * --------------------------------------------------------------------------
     * Negotiate Locale
     * --------------------------------------------------------------------------
     * Disable unless you need automatic language detection from user headers
     */
    public bool $negotiateLocale = false;

    /**
     * --------------------------------------------------------------------------
     * Supported Locales
     * --------------------------------------------------------------------------
     * Add 'fil' to support Filipino language strings
     */
    public array $supportedLocales = ['en'];

    /**
     * --------------------------------------------------------------------------
     * Application Timezone
     * --------------------------------------------------------------------------
     * Correct timezone for Cebu/Philippines (per PHP docs)
     */
    public string $appTimezone = 'Asia/Manila';

    /**
     * --------------------------------------------------------------------------
     * Default Character Set
     * --------------------------------------------------------------------------
     * UTF-8 is standard and compatible with htmlspecialchars() (per docs)
     */
    public string $charset = 'UTF-8';

    /**
     * --------------------------------------------------------------------------
     * Force Global Secure Requests
     * --------------------------------------------------------------------------
     * Enforce HTTPS (required for Vercel and secure production deployments)
     */
    public bool $forceGlobalSecureRequests = true;

    /**
     * --------------------------------------------------------------------------
     * Reverse Proxy IPs
     * --------------------------------------------------------------------------
     * Vercel uses reverse proxies; add trusted IP ranges if needed (optional)
     */
    public array $proxyIPs = [];

    /**
     * --------------------------------------------------------------------------
     * Content Security Policy
     * --------------------------------------------------------------------------
     * Enable to prevent XSS attacks (configure rules in ContentSecurityPolicy.php)
     */
    public bool $CSPEnabled = true;

    /**
     * --------------------------------------------------------------------------
     * CSRF Protection
     * --------------------------------------------------------------------------
     * Enable to prevent cross-site request forgery attacks
     */
    public bool $CSRFProtection = true;
}
