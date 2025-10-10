<?php return array (
  'app' => 
  array (
    'name' => 'LinksCircle',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://127.0.0.1:8000',
    'asset_url' => NULL,
    'timezone' => 'Asia/Karachi',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:sjjAsaPQCD9fsRC6dZyEYE0LoW2w/VXubOXpmTBQrRc=',
    'cipher' => 'AES-256-CBC',
    'maintenance' => 
    array (
      'driver' => 'file',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\RouteServiceProvider',
      26 => 'App\\Providers\\EmailServiceProvider',
      27 => 'Yajra\\DataTables\\DataTablesServiceProvider',
      28 => 'Yajra\\DataTables\\FractalServiceProvider',
      29 => 'Yajra\\DataTables\\ButtonsServiceProvider',
      30 => 'Artesaos\\SEOTools\\Providers\\SEOToolsServiceProvider',
      31 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
      32 => 'Barryvdh\\DomPDF\\ServiceProvider',
      33 => 'Jenssegers\\Agent\\AgentServiceProvider',
      34 => 'Stevebauman\\Location\\LocationServiceProvider',
      35 => 'L5Swagger\\L5SwaggerServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
      'SEOMeta' => 'Artesaos\\SEOTools\\Facades\\SEOMeta',
      'OpenGraph' => 'Artesaos\\SEOTools\\Facades\\OpenGraph',
      'Twitter' => 'Artesaos\\SEOTools\\Facades\\TwitterCard',
      'JsonLd' => 'Artesaos\\SEOTools\\Facades\\JsonLd',
      'JsonLdMulti' => 'Artesaos\\SEOTools\\Facades\\JsonLdMulti',
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
      'PDF' => 'Barryvdh\\DomPDF\\Facade\\Pdf',
      'Agent' => 'Jenssegers\\Agent\\Facades\\Agent',
      'Location' => 'Stevebauman\\Location\\Facades\\Location',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'host' => 'api-mt1.pusher.com',
          'port' => '443',
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'linkscircle_cache_',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'csp' => 
  array (
    'policy' => 'Spatie\\Csp\\Policies\\Basic',
    'report_only_policy' => '',
    'report_uri' => '',
    'enabled' => true,
    'nonce_generator' => 'Spatie\\Csp\\Nonce\\RandomString',
    'nonce_enabled' => true,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'uqrqhwsyhk',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'uqrqhwsyhk',
        'username' => 'uqrqhwsyhk',
        'password' => 'gMB5b9CnCxpl92',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => false,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'mysql_2' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'forge',
        'username' => 'uqrqhwsyhk',
        'password' => 'gMB5b9CnCxpl92',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => false,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'uqrqhwsyhk',
        'username' => 'uqrqhwsyhk',
        'password' => 'gMB5b9CnCxpl92',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'uqrqhwsyhk',
        'username' => 'uqrqhwsyhk',
        'password' => 'gMB5b9CnCxpl92',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
      'mongodb' => 
      array (
        'driver' => 'mongodb',
        'host' => NULL,
        'port' => NULL,
        'database' => NULL,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'linkscircle_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
      'starts_with' => false,
    ),
    'index_column' => 'DT_RowIndex',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => ':column :direction NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
    'callback' => 
    array (
      0 => '$',
      1 => '$.',
      2 => 'function',
    ),
  ),
  'debugbar' => 
  array (
    'enabled' => NULL,
    'except' => 
    array (
      0 => 'telescope*',
      1 => 'horizon*',
    ),
    'storage' => 
    array (
      'enabled' => true,
      'driver' => 'file',
      'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\debugbar',
      'connection' => NULL,
      'provider' => '',
      'hostname' => '127.0.0.1',
      'port' => 2304,
    ),
    'editor' => 'phpstorm',
    'remote_sites_path' => '',
    'local_sites_path' => '',
    'include_vendors' => true,
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'error_handler' => false,
    'clockwork' => false,
    'collectors' => 
    array (
      'phpinfo' => true,
      'messages' => true,
      'time' => true,
      'memory' => true,
      'exceptions' => true,
      'log' => true,
      'db' => true,
      'views' => true,
      'route' => true,
      'auth' => false,
      'gate' => true,
      'session' => true,
      'symfony_request' => true,
      'mail' => true,
      'laravel' => false,
      'events' => false,
      'default_request' => false,
      'logs' => false,
      'files' => false,
      'config' => false,
      'cache' => false,
      'models' => true,
      'livewire' => true,
    ),
    'options' => 
    array (
      'auth' => 
      array (
        'show_name' => true,
      ),
      'db' => 
      array (
        'with_params' => true,
        'backtrace' => true,
        'backtrace_exclude_paths' => 
        array (
        ),
        'timeline' => false,
        'duration_background' => true,
        'explain' => 
        array (
          'enabled' => false,
          'types' => 
          array (
            0 => 'SELECT',
          ),
        ),
        'hints' => false,
        'show_copy' => false,
        'slow_threshold' => false,
      ),
      'mail' => 
      array (
        'full_log' => false,
      ),
      'views' => 
      array (
        'timeline' => false,
        'data' => false,
        'exclude_paths' => 
        array (
        ),
      ),
      'route' => 
      array (
        'label' => true,
      ),
      'logs' => 
      array (
        'file' => NULL,
      ),
      'cache' => 
      array (
        'values' => true,
      ),
    ),
    'inject' => true,
    'route_prefix' => '_debugbar',
    'route_domain' => NULL,
    'theme' => 'auto',
    'debug_backtrace_limit' => 50,
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\fonts',
      'font_cache' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\fonts',
      'temp_dir' => 'C:\\Users\\lenovo\\AppData\\Local\\Temp',
      'chroot' => 'C:\\Users\\lenovo\\Downloads\\revdb',
      'allowed_protocols' => 
      array (
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_paper_orientation' => 'portrait',
      'default_font' => 'serif',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'strict_null_comparison' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => true,
        'include_separator_line' => false,
        'excel_compatibility' => false,
        'output_encoding' => '',
        'test_auto_detect' => true,
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'ignore_empty' => false,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => NULL,
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'UTF-8',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
    ),
    'transactions' => 
    array (
      'handler' => 'db',
      'db' => 
      array (
        'connection' => NULL,
      ),
    ),
    'temporary_files' => 
    array (
      'local_path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\framework/cache/laravel-excel',
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
      'force_resync_remote' => NULL,
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\app',
        'throw' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\app/public',
        'url' => 'http://127.0.0.1:8000/storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
      ),
    ),
    'links' => 
    array (
      'C:\\Users\\lenovo\\Downloads\\revdb\\public\\storage' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\app/public',
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
    ),
  ),
  'horizon' => 
  array (
    'domain' => NULL,
    'path' => 'horizon',
    'use' => 'default',
    'prefix' => 'linkscircle_horizon:',
    'middleware' => 
    array (
      0 => 'web',
    ),
    'waits' => 
    array (
      'redis:default' => 60,
    ),
    'trim' => 
    array (
      'recent' => 60,
      'pending' => 60,
      'completed' => 60,
      'recent_failed' => 10080,
      'failed' => 10080,
      'monitored' => 10080,
    ),
    'silenced' => 
    array (
    ),
    'metrics' => 
    array (
      'trim_snapshots' => 
      array (
        'job' => 24,
        'queue' => 24,
      ),
    ),
    'fast_termination' => false,
    'memory_limit' => 64,
    'defaults' => 
    array (
      'supervisor-1' => 
      array (
        'connection' => 'redis',
        'queue' => 
        array (
          0 => 'default',
        ),
        'balance' => 'auto',
        'autoScalingStrategy' => 'time',
        'maxProcesses' => 1,
        'maxTime' => 0,
        'maxJobs' => 0,
        'memory' => 128,
        'tries' => 1,
        'timeout' => 60,
        'nice' => 0,
      ),
    ),
    'environments' => 
    array (
      'production' => 
      array (
        'supervisor-1' => 
        array (
          'maxProcesses' => 10,
          'balanceMaxShift' => 1,
          'balanceCooldown' => 3,
        ),
      ),
      'local' => 
      array (
        'supervisor-1' => 
        array (
          'maxProcesses' => 3,
        ),
      ),
    ),
  ),
  'l5-swagger' => 
  array (
    'default' => 'default',
    'documentations' => 
    array (
      'default' => 
      array (
        'api' => 
        array (
          'title' => 'L5 Swagger UI',
        ),
        'routes' => 
        array (
          'api' => 'api/documentation-2',
        ),
        'paths' => 
        array (
          'use_absolute_path' => true,
          'docs_json' => 'api-docs.json',
          'docs_yaml' => 'api-docs.yaml',
          'format_to_use_for_docs' => 'json',
          'annotations' => 
          array (
            0 => 'C:\\Users\\lenovo\\Downloads\\revdb\\app',
          ),
        ),
      ),
    ),
    'defaults' => 
    array (
      'routes' => 
      array (
        'docs' => 'docs',
        'oauth2_callback' => 'api/oauth2-callback',
        'middleware' => 
        array (
          'api' => 
          array (
          ),
          'asset' => 
          array (
          ),
          'docs' => 
          array (
          ),
          'oauth2_callback' => 
          array (
          ),
        ),
        'group_options' => 
        array (
        ),
      ),
      'paths' => 
      array (
        'docs' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\api-docs',
        'views' => 'C:\\Users\\lenovo\\Downloads\\revdb\\resources/views/vendor/l5-swagger',
        'base' => NULL,
        'swagger_ui_assets_path' => 'vendor/swagger-api/swagger-ui/dist/',
        'excludes' => 
        array (
        ),
      ),
      'scanOptions' => 
      array (
        'analyser' => NULL,
        'analysis' => NULL,
        'processors' => 
        array (
        ),
        'pattern' => NULL,
        'exclude' => 
        array (
        ),
        'open_api_spec_version' => '3.0.0',
      ),
      'securityDefinitions' => 
      array (
        'securitySchemes' => 
        array (
        ),
        'security' => 
        array (
          0 => 
          array (
          ),
        ),
      ),
      'generate_always' => false,
      'generate_yaml_copy' => false,
      'proxy' => false,
      'additional_config_url' => NULL,
      'operations_sort' => NULL,
      'validator_url' => NULL,
      'ui' => 
      array (
        'display' => 
        array (
          'doc_expansion' => 'none',
          'filter' => true,
        ),
        'authorization' => 
        array (
          'persist_authorization' => false,
          'oauth2' => 
          array (
            'use_pkce_with_authorization_code_grant' => false,
          ),
        ),
      ),
      'constants' => 
      array (
        'L5_SWAGGER_CONST_HOST' => 'http://my-default-host.com',
      ),
    ),
  ),
  'laravel-exchange-rates' => 
  array (
    'driver' => 'exchange-rates-api-io',
    'api_key' => NULL,
    'https' => true,
  ),
  'log-viewer' => 
  array (
    'enabled' => true,
    'route_domain' => NULL,
    'route_path' => '838v7aozgk/site-log-viewer',
    'back_to_system_url' => 'http://127.0.0.1:8000',
    'back_to_system_label' => NULL,
    'timezone' => NULL,
    'middleware' => 
    array (
      0 => 'web',
      1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
      2 => 'auth',
    ),
    'api_middleware' => 
    array (
      0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
      1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
    ),
    'hosts' => 
    array (
      'local' => 
      array (
        'name' => 'Local',
      ),
    ),
    'include_files' => 
    array (
      0 => '*.log',
      1 => '**/*.log',
    ),
    'exclude_files' => 
    array (
    ),
    'shorter_stack_trace_excludes' => 
    array (
      0 => '/vendor/symfony/',
      1 => '/vendor/laravel/framework/',
      2 => '/vendor/barryvdh/laravel-debugbar/',
    ),
    'patterns' => 
    array (
      'laravel' => 
      array (
        'log_matching_regex' => '/^\\[(\\d{4}-\\d{2}-\\d{2}[T ]\\d{2}:\\d{2}:\\d{2}\\.?(\\d{6}([\\+-]\\d\\d:\\d\\d)?)?)\\].*/',
        'log_parsing_regex' => '/^\\[(\\d{4}-\\d{2}-\\d{2}[T ]\\d{2}:\\d{2}:\\d{2}\\.?(\\d{6}([\\+-]\\d\\d:\\d\\d)?)?)\\](.*?(\\w+)\\.|.*?)(debug|info|notice|warning|error|critical|alert|emergency|processing|processed|failed)?: (.*?)( in [\\/].*?:[0-9]+)?$/is',
      ),
    ),
    'cache_driver' => NULL,
    'lazy_scan_chunk_size_in_mb' => 50,
    'strip_extracted_context' => true,
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'daily',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'default' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/default.log',
        'level' => 'info',
        'days' => 14,
      ),
      'warning' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/warning.log',
        'level' => 'info',
        'days' => 14,
      ),
      'error' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/error.log',
        'level' => 'info',
        'days' => 14,
      ),
      'generate_link' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/generate_link.log',
        'level' => 'info',
        'days' => 14,
      ),
      'generate_depp_link' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/generate_depp_link.log',
        'level' => 'info',
        'days' => 14,
      ),
      'tracking_clicks' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/tracking_clicks.log',
        'level' => 'info',
        'days' => 14,
      ),
      'admitad' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/admitad.log',
        'level' => 'info',
        'days' => 14,
      ),
      'awin' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/awin.log',
        'level' => 'info',
        'days' => 14,
      ),
      'impact_radius' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/impact_radius.log',
        'level' => 'info',
        'days' => 14,
      ),
      'pepperjam' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/pepperjam.log',
        'level' => 'info',
        'days' => 14,
      ),
      'rakuten' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/rakuten.log',
        'level' => 'info',
      ),
      'tradedoubler' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/tradedoubler.log',
        'level' => 'info',
        'days' => 14,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => 'https://hooks.slack.com/services/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',
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'smtp.elasticemail.com',
        'port' => '587',
        'encryption' => 'tls',
        'username' => '0CFDEC76E6933A6BE967D2F9C753AEBCB19F516AEACC377214999851FDA2250A9221CD210E6BAEC2F283784F1C4FCB7F',
        'password' => '0CFDEC76E6933A6BE967D2F9C753AEBCB19F516AEACC377214999851FDA2250A9221CD210E6BAEC2F283784F1C4FCB7F',
        'timeout' => NULL,
        'local_domain' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => 'no-reply@linkscircle.com',
      'name' => 'LinksCircle',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\Users\\lenovo\\Downloads\\revdb\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'panel' => 
  array (
    'date_format' => 'Y-m-d',
    'time_format' => 'H:i:s',
    'primary_language' => 'en',
    'available_languages' => 
    array (
      'en' => 'English',
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => '127.0.0.1:8000',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'verify_csrf_token' => 'App\\Http\\Middleware\\VerifyCsrfToken',
      'encrypt_cookies' => 'App\\Http\\Middleware\\EncryptCookies',
    ),
  ),
  'scribe' => 
  array (
    'title' => 'Linkscircle API Documentation',
    'description' => '',
    'base_url' => NULL,
    'routes' => 
    array (
      0 => 
      array (
        'match' => 
        array (
          'prefixes' => 
          array (
            0 => 'api/*',
          ),
          'domains' => 
          array (
            0 => '*',
          ),
          'versions' => 
          array (
            0 => 'v1',
          ),
        ),
        'include' => 
        array (
        ),
        'exclude' => 
        array (
          0 => 'api/documentation',
          1 => 'api/documentation-2',
          2 => 'api/oauth2-callback',
          3 => 'api/user',
        ),
        'apply' => 
        array (
          'headers' => 
          array (
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
          ),
          'response_calls' => 
          array (
            'methods' => 
            array (
              0 => 'GET',
            ),
            'config' => 
            array (
              'app.env' => 'documentation',
            ),
            'queryParams' => 
            array (
            ),
            'bodyParams' => 
            array (
            ),
            'fileParams' => 
            array (
            ),
            'cookies' => 
            array (
            ),
          ),
        ),
      ),
    ),
    'type' => 'laravel',
    'theme' => 'default',
    'static' => 
    array (
      'output_path' => 'public/docs',
    ),
    'laravel' => 
    array (
      'add_routes' => true,
      'docs_url' => '/api/documentation',
      'assets_directory' => NULL,
      'middleware' => 
      array (
      ),
    ),
    'external' => 
    array (
      'html_attributes' => 
      array (
      ),
    ),
    'try_it_out' => 
    array (
      'enabled' => true,
      'base_url' => 'http://127.0.0.1:8000',
      'use_csrf' => false,
      'csrf_url' => '/sanctum/csrf-cookie',
    ),
    'auth' => 
    array (
      'enabled' => true,
      'default' => true,
      'in' => 'header',
      'name' => 'token',
      'use_value' => NULL,
      'placeholder' => '',
      'extra_info' => 'You can retrieve your token by visiting our <b>Linkscircle Publisher dashboard</b>, accessing the settings, clicking on the <b>API Info section</b>, and then copying the token for use here. <br />  <br /> You can utilize the following APIs to make <b>10 requests</b> within a <b>one-minute time</b> frame.',
    ),
    'intro_text' => 'This documentation is intended to offer all the information necessary for you to effectively utilize our API.

<aside>While scrolling, you\'ll encounter code examples for interacting with the API in various programming languages within the dark section on the right side (or integrated within the content on mobile). You can change the programming language displayed by using the tabs located at the top right (or through the navigation menu at the top left on mobile).</aside>',
    'example_languages' => 
    array (
      0 => 'bash',
      1 => 'javascript',
      2 => 'php',
      3 => 'python',
    ),
    'postman' => 
    array (
      'enabled' => true,
      'overrides' => 
      array (
      ),
    ),
    'openapi' => 
    array (
      'enabled' => true,
      'overrides' => 
      array (
      ),
    ),
    'groups' => 
    array (
      'default' => 'Endpoints',
      'order' => 
      array (
        'Websites' => 
        array (
          0 => 'GET /websites',
        ),
        'Advertisers' => 
        array (
          0 => 'GET /advertisers',
        ),
        'Offers' => 
        array (
          0 => 'GET /offers',
        ),
      ),
    ),
    'logo' => 'http://127.0.0.1:8000img/logo-white.png',
    'last_updated' => 'Last updated: {date:F j, Y}',
    'examples' => 
    array (
      'faker_seed' => NULL,
      'models_source' => 
      array (
        0 => 'factoryCreate',
        1 => 'factoryMake',
        2 => 'databaseFirst',
      ),
    ),
    'strategies' => 
    array (
      'metadata' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Metadata\\GetFromDocBlocks',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Metadata\\GetFromMetadataAttributes',
      ),
      'urlParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\UrlParameters\\GetFromLaravelAPI',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\UrlParameters\\GetFromLumenAPI',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\UrlParameters\\GetFromUrlParamAttribute',
        3 => 'Knuckles\\Scribe\\Extracting\\Strategies\\UrlParameters\\GetFromUrlParamTag',
      ),
      'queryParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\QueryParameters\\GetFromFormRequest',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\QueryParameters\\GetFromInlineValidator',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\QueryParameters\\GetFromQueryParamAttribute',
        3 => 'Knuckles\\Scribe\\Extracting\\Strategies\\QueryParameters\\GetFromQueryParamTag',
      ),
      'headers' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Headers\\GetFromRouteRules',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Headers\\GetFromHeaderAttribute',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Headers\\GetFromHeaderTag',
      ),
      'bodyParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromFormRequest',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromInlineValidator',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromBodyParamAttribute',
        3 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromBodyParamTag',
      ),
      'responses' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseResponseAttributes',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseTransformerTags',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseApiResourceTags',
        3 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseResponseTag',
        4 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseResponseFileTag',
        5 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls',
      ),
      'responseFields' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\ResponseFields\\GetFromResponseFieldAttribute',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\ResponseFields\\GetFromResponseFieldTag',
      ),
    ),
    'database_connections_to_transact' => 
    array (
      0 => 'mysql',
    ),
    'fractal' => 
    array (
      'serializer' => NULL,
    ),
    'routeMatcher' => 'Knuckles\\Scribe\\Matching\\RouteMatcher',
  ),
  'seotools' => 
  array (
    'meta' => 
    array (
      'defaults' => 
      array (
        'title' => 'LinksCircle Affiliate Network',
        'titleBefore' => false,
        'description' => '',
        'separator' => ' | ',
        'keywords' => 
        array (
        ),
        'canonical' => false,
        'robots' => false,
      ),
      'webmaster_tags' => 
      array (
        'google' => NULL,
        'bing' => NULL,
        'alexa' => NULL,
        'pinterest' => NULL,
        'yandex' => NULL,
        'norton' => NULL,
      ),
      'add_notranslate_class' => false,
    ),
    'opengraph' => 
    array (
      'defaults' => 
      array (
        'title' => '',
        'description' => '',
        'url' => false,
        'type' => false,
        'site_name' => false,
        'images' => 
        array (
        ),
      ),
    ),
    'twitter' => 
    array (
      'defaults' => 
      array (
      ),
    ),
    'json-ld' => 
    array (
      'defaults' => 
      array (
        'title' => 'Over 9000 Thousand!',
        'description' => 'For those who helped create the Genki Dama',
        'url' => false,
        'type' => 'WebPage',
        'images' => 
        array (
        ),
      ),
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
      'scheme' => 'https',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'linkscircle_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
  ),
  'slack-alerts' => 
  array (
    'webhook_urls' => 
    array (
      'default' => 'https://hooks.slack.com/services/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',
      'warning' => 'https://hooks.slack.com/services/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',
      'generate_link' => 'https://hooks.slack.com/services/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',
      'generate_depp_link' => 'https://hooks.slack.com/services/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',
      'admitad_notification' => 'https://hooks.slack.com/services/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',
      'awin_notification' => 'https://hooks.slack.com/services/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',
      'impact_radius_notification' => 'https://hooks.slack.com/services/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',
      'pepperjam_notification' => 'https://hooks.slack.com/services/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',
      'rakuten_notification' => 'https://hooks.slack.com/services/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',
      'tradedoubler_notification' => 'https://hooks.slack.com/services/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',
    ),
    'job' => 'Spatie\\SlackAlerts\\Jobs\\SendToSlackChannelJob',
    'queue' => 'default',
  ),
  'snappy' => 
  array (
    'pdf' => 
    array (
      'enabled' => true,
      'binary' => '/usr/local/bin/wkhtmltopdf',
      'timeout' => false,
      'options' => 
      array (
      ),
      'env' => 
      array (
      ),
    ),
    'image' => 
    array (
      'enabled' => true,
      'binary' => '/usr/local/bin/wkhtmltoimage',
      'timeout' => false,
      'options' => 
      array (
      ),
      'env' => 
      array (
      ),
    ),
  ),
  'telescope' => 
  array (
    'domain' => NULL,
    'path' => 'telescope',
    'driver' => 'database',
    'storage' => 
    array (
      'database' => 
      array (
        'connection' => 'mysql',
        'chunk' => 1000,
      ),
    ),
    'enabled' => false,
    'middleware' => 
    array (
      0 => 'web',
      1 => 'Laravel\\Telescope\\Http\\Middleware\\Authorize',
    ),
    'only_paths' => 
    array (
    ),
    'ignore_paths' => 
    array (
      0 => 'nova-api*',
    ),
    'ignore_commands' => 
    array (
    ),
    'watchers' => 
    array (
      'Laravel\\Telescope\\Watchers\\BatchWatcher' => true,
      'Laravel\\Telescope\\Watchers\\CacheWatcher' => 
      array (
        'enabled' => true,
        'hidden' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\ClientRequestWatcher' => true,
      'Laravel\\Telescope\\Watchers\\CommandWatcher' => 
      array (
        'enabled' => true,
        'ignore' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\DumpWatcher' => 
      array (
        'enabled' => true,
        'always' => false,
      ),
      'Laravel\\Telescope\\Watchers\\EventWatcher' => 
      array (
        'enabled' => true,
        'ignore' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\ExceptionWatcher' => true,
      'Laravel\\Telescope\\Watchers\\GateWatcher' => 
      array (
        'enabled' => true,
        'ignore_abilities' => 
        array (
        ),
        'ignore_packages' => true,
        'ignore_paths' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\JobWatcher' => true,
      'Laravel\\Telescope\\Watchers\\LogWatcher' => true,
      'Laravel\\Telescope\\Watchers\\MailWatcher' => true,
      'Laravel\\Telescope\\Watchers\\ModelWatcher' => 
      array (
        'enabled' => true,
        'events' => 
        array (
          0 => 'eloquent.*',
        ),
        'hydrations' => true,
      ),
      'Laravel\\Telescope\\Watchers\\NotificationWatcher' => true,
      'Laravel\\Telescope\\Watchers\\QueryWatcher' => 
      array (
        'enabled' => true,
        'ignore_packages' => true,
        'ignore_paths' => 
        array (
        ),
        'slow' => 100,
      ),
      'Laravel\\Telescope\\Watchers\\RedisWatcher' => true,
      'Laravel\\Telescope\\Watchers\\RequestWatcher' => 
      array (
        'enabled' => true,
        'size_limit' => 64,
        'ignore_http_methods' => 
        array (
        ),
        'ignore_status_codes' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\ScheduleWatcher' => true,
      'Laravel\\Telescope\\Watchers\\ViewWatcher' => true,
    ),
  ),
  'verify-new-email' => 
  array (
    'route' => NULL,
    'redirect_to' => '/publisher/dashboard',
    'login_after_verification' => true,
    'login_remember' => false,
    'model' => 'ProtoneMedia\\LaravelVerifyNewEmail\\PendingUserEmail',
    'mailable_for_first_verification' => 'ProtoneMedia\\LaravelVerifyNewEmail\\Mail\\VerifyFirstEmail',
    'mailable_for_new_email' => 'ProtoneMedia\\LaravelVerifyNewEmail\\Mail\\VerifyNewEmail',
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\Users\\lenovo\\Downloads\\revdb\\resources\\views',
    ),
    'compiled' => 'C:\\Users\\lenovo\\Downloads\\revdb\\storage\\framework\\views',
  ),
  'webhook-client' => 
  array (
    'configs' => 
    array (
      0 => 
      array (
        'name' => 'default',
        'signing_secret' => NULL,
        'signature_header_name' => 'Signature',
        'signature_validator' => 'Spatie\\WebhookClient\\SignatureValidator\\DefaultSignatureValidator',
        'webhook_profile' => 'Spatie\\WebhookClient\\WebhookProfile\\ProcessEverythingWebhookProfile',
        'webhook_response' => 'Spatie\\WebhookClient\\WebhookResponse\\DefaultRespondsTo',
        'webhook_model' => 'Spatie\\WebhookClient\\Models\\WebhookCall',
        'store_headers' => 
        array (
        ),
        'process_webhook_job' => 'App\\Jobs\\ProcessWebhookJob',
      ),
    ),
    'delete_after_days' => 30,
  ),
  'flare' => 
  array (
    'key' => NULL,
    'flare_middleware' => 
    array (
      0 => 'Spatie\\FlareClient\\FlareMiddleware\\RemoveRequestIp',
      1 => 'Spatie\\FlareClient\\FlareMiddleware\\AddGitInformation',
      2 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddNotifierName',
      3 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddEnvironmentInformation',
      4 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddExceptionInformation',
      5 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddDumps',
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddLogs' => 
      array (
        'maximum_number_of_collected_logs' => 200,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddQueries' => 
      array (
        'maximum_number_of_collected_queries' => 200,
        'report_query_bindings' => true,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddJobs' => 
      array (
        'max_chained_job_reporting_depth' => 5,
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestBodyFields' => 
      array (
        'censor_fields' => 
        array (
          0 => 'password',
          1 => 'password_confirmation',
        ),
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestHeaders' => 
      array (
        'headers' => 
        array (
          0 => 'API-KEY',
        ),
      ),
    ),
    'send_logs_as_events' => true,
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'auto',
    'enable_share_button' => true,
    'register_commands' => false,
    'solution_providers' => 
    array (
      0 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\BadMethodCallSolutionProvider',
      1 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\MergeConflictSolutionProvider',
      2 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\UndefinedPropertySolutionProvider',
      3 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\IncorrectValetDbCredentialsSolutionProvider',
      4 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingAppKeySolutionProvider',
      5 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\DefaultDbNameSolutionProvider',
      6 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\TableNotFoundSolutionProvider',
      7 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingImportSolutionProvider',
      8 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\InvalidRouteActionSolutionProvider',
      9 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\ViewNotFoundSolutionProvider',
      10 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\RunningLaravelDuskInProductionProvider',
      11 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingColumnSolutionProvider',
      12 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UnknownValidationSolutionProvider',
      13 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingMixManifestSolutionProvider',
      14 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingViteManifestSolutionProvider',
      15 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingLivewireComponentSolutionProvider',
      16 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UndefinedViewVariableSolutionProvider',
      17 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\GenericLaravelExceptionSolutionProvider',
    ),
    'ignored_solution_providers' => 
    array (
    ),
    'enable_runnable_solutions' => NULL,
    'remote_sites_path' => 'C:\\Users\\lenovo\\Downloads\\revdb',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
    'settings_file_path' => '',
    'recorders' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\Recorders\\DumpRecorder\\DumpRecorder',
      1 => 'Spatie\\LaravelIgnition\\Recorders\\JobRecorder\\JobRecorder',
      2 => 'Spatie\\LaravelIgnition\\Recorders\\LogRecorder\\LogRecorder',
      3 => 'Spatie\\LaravelIgnition\\Recorders\\QueryRecorder\\QueryRecorder',
    ),
  ),
  'datatables-buttons' => 
  array (
    'namespace' => 
    array (
      'base' => 'DataTables',
      'model' => '',
    ),
    'pdf_generator' => 'snappy',
    'snappy' => 
    array (
      'options' => 
      array (
        'no-outline' => true,
        'margin-left' => '0',
        'margin-right' => '0',
        'margin-top' => '10mm',
        'margin-bottom' => '10mm',
      ),
      'orientation' => 'landscape',
    ),
    'parameters' => 
    array (
      'dom' => 'Bfrtip',
      'order' => 
      array (
        0 => 
        array (
          0 => 0,
          1 => 'desc',
        ),
      ),
      'buttons' => 
      array (
        0 => 'excel',
        1 => 'csv',
        2 => 'pdf',
        3 => 'print',
        4 => 'reset',
        5 => 'reload',
      ),
    ),
    'generator' => 
    array (
      'columns' => 'id,add your columns,created_at,updated_at',
      'buttons' => 'excel,csv,pdf,print,reset,reload',
      'dom' => 'Bfrtip',
    ),
  ),
  'datatables-html' => 
  array (
    'namespace' => 'LaravelDataTables',
    'table' => 
    array (
      'class' => 'table',
      'id' => 'dataTableBuilder',
    ),
    'script' => 'datatables::script',
    'editor' => 'datatables::editor',
  ),
  'scribe_new' => 
  array (
    '__configVersion' => 'v2',
    'theme' => 'default',
    'title' => NULL,
    'description' => '',
    'base_url' => NULL,
    'type' => 'static',
    'static' => 
    array (
      'output_path' => 'public/docs',
    ),
    'try_it_out' => 
    array (
      'enabled' => true,
      'base_url' => NULL,
      'use_csrf' => false,
      'csrf_url' => '/sanctum/csrf-cookie',
    ),
    'postman' => 
    array (
      'enabled' => true,
      'overrides' => 
      array (
      ),
    ),
    'openapi' => 
    array (
      'enabled' => true,
      'overrides' => 
      array (
      ),
    ),
    'intro_text' => 'This documentation aims to provide all the information you need to work with our API.

<aside>As you scroll, you\'ll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>',
    'example_languages' => 
    array (
      0 => 'bash',
      1 => 'javascript',
    ),
    'logo' => false,
    'last_updated' => 'Last updated: {date:F j, Y}',
    'groups' => 
    array (
      'order' => 
      array (
      ),
      'default' => 'Endpoints',
    ),
    'examples' => 
    array (
      'faker_seed' => NULL,
      'models_source' => 
      array (
        0 => 'factoryCreate',
        1 => 'factoryMake',
        2 => 'databaseFirst',
      ),
    ),
    'routeMatcher' => NULL,
    'database_connections_to_transact' => 
    array (
      0 => 'mysql',
    ),
    'fractal' => 
    array (
      'serializer' => NULL,
    ),
    'auth' => 
    array (
      'enabled' => false,
      'default' => false,
      'in' => 'bearer',
      'name' => 'key',
      'use_value' => NULL,
      'placeholder' => '{YOUR_AUTH_KEY}',
      'extra_info' => 'You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.',
    ),
    'strategies' => 
    array (
      'metadata' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Metadata\\GetFromDocBlocks',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Metadata\\GetFromMetadataAttributes',
      ),
      'urlParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\UrlParameters\\GetFromLaravelAPI',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\UrlParameters\\GetFromLumenAPI',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\UrlParameters\\GetFromUrlParamAttribute',
        3 => 'Knuckles\\Scribe\\Extracting\\Strategies\\UrlParameters\\GetFromUrlParamTag',
      ),
      'queryParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\QueryParameters\\GetFromFormRequest',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\QueryParameters\\GetFromInlineValidator',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\QueryParameters\\GetFromQueryParamAttribute',
        3 => 'Knuckles\\Scribe\\Extracting\\Strategies\\QueryParameters\\GetFromQueryParamTag',
      ),
      'headers' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Headers\\GetFromRouteRules',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Headers\\GetFromHeaderAttribute',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Headers\\GetFromHeaderTag',
        3 => 
        array (
          0 => 'override',
          1 => 
          array (
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
          ),
        ),
      ),
      'bodyParameters' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromFormRequest',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromInlineValidator',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromBodyParamAttribute',
        3 => 'Knuckles\\Scribe\\Extracting\\Strategies\\BodyParameters\\GetFromBodyParamTag',
      ),
      'responses' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseResponseAttributes',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseTransformerTags',
        2 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseApiResourceTags',
        3 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseResponseTag',
        4 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\UseResponseFileTag',
        5 => 
        array (
          0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls',
          1 => 
          array (
            'only' => 
            array (
              0 => 'GET *',
            ),
            'except' => 
            array (
            ),
            'config' => 
            array (
              'app.env' => 'documentation',
            ),
            'queryParams' => 
            array (
            ),
            'bodyParams' => 
            array (
            ),
            'fileParams' => 
            array (
            ),
            'cookies' => 
            array (
            ),
          ),
        ),
      ),
      'responseFields' => 
      array (
        0 => 'Knuckles\\Scribe\\Extracting\\Strategies\\ResponseFields\\GetFromResponseFieldAttribute',
        1 => 'Knuckles\\Scribe\\Extracting\\Strategies\\ResponseFields\\GetFromResponseFieldTag',
      ),
    ),
    'routes' => 
    array (
      0 => 
      array (
        'match' => 
        array (
          'prefixes' => 
          array (
            0 => 'api/*',
          ),
          'domains' => 
          array (
            0 => '*',
          ),
          'versions' => 
          array (
            0 => 'v1',
          ),
        ),
        'include' => 
        array (
        ),
        'exclude' => 
        array (
        ),
      ),
    ),
  ),
  'location' => 
  array (
    'driver' => 'Stevebauman\\Location\\Drivers\\IpApi',
    'fallbacks' => 
    array (
      0 => 'Stevebauman\\Location\\Drivers\\IpInfo',
      1 => 'Stevebauman\\Location\\Drivers\\GeoPlugin',
      2 => 'Stevebauman\\Location\\Drivers\\MaxMind',
    ),
    'position' => 'Stevebauman\\Location\\Position',
    'maxmind' => 
    array (
      'web' => 
      array (
        'enabled' => false,
        'user_id' => '',
        'license_key' => '',
        'options' => 
        array (
          'host' => 'geoip.maxmind.com',
        ),
      ),
      'local' => 
      array (
        'type' => 'city',
        'path' => 'C:\\Users\\lenovo\\Downloads\\revdb\\database\\maxmind/GeoLite2-City.mmdb',
      ),
    ),
    'ip_api' => 
    array (
      'token' => NULL,
    ),
    'ipinfo' => 
    array (
      'token' => NULL,
    ),
    'ipdata' => 
    array (
      'token' => NULL,
    ),
    'kloudend' => 
    array (
      'token' => NULL,
    ),
    'testing' => 
    array (
      'enabled' => true,
      'ip' => '66.102.0.0',
    ),
  ),
  'datatables-fractal' => 
  array (
    'includes' => 'include',
    'serializer' => 'League\\Fractal\\Serializer\\DataArraySerializer',
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
