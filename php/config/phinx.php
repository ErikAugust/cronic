<?php

require_once __DIR__.'/../base.php';

if (!$settings = parse_ini_file(DB_SETTINGS_DIR, TRUE)) {
    throw new \Exception('Unable to open ' . DB_SETTINGS_DIR . '.');
}

return [
    'paths' => [
        'migrations' => 'migrations'
    ],
    'migration_base_class' => 'models\Migration',
    'environments' => [
        'default_migration_table' => $settings['default']['migration_table'],
        'default_database' => $settings['default']['name'],
        $settings['default']['name'] => [
            'adapter' => $settings['default']['driver'],
            'host' => $settings['default']['host'],
            'name' => $settings['default']['name'],
            'user' => $settings['default']['username'],
            'pass' => $settings['default']['password'],
            'port' => $settings['default']['port']
        ]
    ]
];