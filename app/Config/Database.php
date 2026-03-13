<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    /**
     * The directory that holds the Migrations and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array<string, mixed>
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost', // Local: 'localhost'; Production: Use your DB host (e.g., Vercel Postgres, AWS RDS)
        'username'     => 'root', // Local: 'root'; Production: Your DB username
        'password'     => '', // Local: Empty for XAMPP; Production: Your DB password
        'database'     => 'team_borjak_db', // Name your database (match local/production DB name)
        'DBDriver'     => 'MySQLi', // Use 'Postgre' if using PostgreSQL
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => ENVIRONMENT !== 'production', // Disable debug in production
        'charset'      => 'utf8mb4', // Supports emojis and all Filipino characters
        'DBCollat'     => 'utf8mb4_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => true, // Enforce strict SQL mode (best practice)
        'failover'     => [],
        'port'         => 3306, // Default MySQL port; adjust if using custom port
    ];

    /**
     * Alternative connection for Vercel (if using Vercel Postgres or external DB)
     * Uncomment and configure if you use a cloud database
     */
    // public array $vercel = [
    //     'DSN'          => 'pgsql:host=aws-0-us-west-1.pooler.supabase.com;port=5432;dbname=postgres',
    //     'hostname'     => 'aws-0-us-west-1.pooler.supabase.com',
    //     'username'     => 'postgres.user', // Your cloud DB username
    //     'password'     => 'your-cloud-db-password', // Your cloud DB password
    //     'database'     => 'postgres',
    //     'DBDriver'     => 'Postgre',
    //     'DBPrefix'     => '',
    //     'pConnect'     => false,
    //     'DBDebug'      => false,
    //     'charset'      => 'utf8mb4',
    //     'DBCollat'     => '',
    //     'swapPre'      => '',
    //     'encrypt'      => true,
    //     'compress'     => false,
    //     'strictOn'     => true,
    //     'failover'     => [],
    //     'port'         => 5432,
    // ];

    /**
     * If you need to connect to multiple databases, add more connection groups here.
     */
    public array $groups = [];

    /**
     * Enable query builder for all connections.
     */
    public bool $allowCallbacks = true;

    /**
     * Configure how the query builder escapes identifiers and values.
     */
    public array $escape = [
        'likeEscape' => '\\',
        'likeWildcards' => true,
    ];
}
