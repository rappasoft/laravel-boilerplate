<?php

return [
    'app_key_is_set' => [
        'message' => 'Der Anwendungsschlüssel ist nicht gesetzt. Nutze "php artisan key:generate", um einen zu erstellen und zu setzen.',
        'name' => 'Anwendungsschlüssel ist gesetzt',
    ],
    'composer_with_dev_dependencies_is_up_to_date' => [
        'message' => 'Die Composer Abhängigkeiten sind nicht aktuell. Nutze "composer install", um diese zu aktualisieren. :more',
        'name' => 'Composer Abhängigkeiten (inkl. dev) sind aktuell',
    ],
    'composer_without_dev_dependencies_is_up_to_date' => [
        'message' => 'Die Composer Abhängigkeiten sind nicht aktuell. Nutze "composer install", um diese zu aktualisieren. :more',
        'name' => 'Composer Abhängigkeiten (ohne dev) sind aktuell',
    ],
    'configuration_is_cached' => [
        'message' => 'Die Konfiguration sollte für bessere Performance gecached sein im Produktivbetrieb. Nutze "php artisan config:cache", um den Konfigurations-Cache zu erstellen.',
        'name' => 'Konfiguration ist gecached',
    ],
    'configuration_is_not_cached' => [
        'message' => 'Die Konfiguration sollte während der Entwicklung nicht gecached sein. Nutze "php artisan config:clear", um den Konfigurations-Cache zu leeren.',
        'name' => 'Konfiguration ist nicht gecached',
    ],
    'correct_php_version_is_installed' => [
        'message' => 'Die benötigte PHP Version ist nicht installiert.' . PHP_EOL . 'Benötigt: :required' . PHP_EOL . 'In Verwendung: :used',
        'name' => 'Die richtige PHP Version ist installiert',
    ],
    'database_can_be_accessed' => [
        'message' => 'Auf die Datenbank kann nicht zugegriffen werden: :error',
        'name' => 'Die Datenbank ist erreichbar',
    ],
    'debug_mode_is_not_enabled' => [
        'message' => 'Der Debugging-Modus sollte im Produktivbetrieb nicht genutzt werden. Setze "APP_DEBUG" in der .env Datei auf "false".',
        'name' => 'Der Debugging-Modus ist deaktiviert',
    ],
    'directories_have_correct_permissions' => [
        'message' => 'Folgende Verzeichnisse sind nicht beschreibbar:' . PHP_EOL .':directories',
        'name' => 'Alle Verzeichnisse haben die richtigen Berechtigungen',
    ],
    'env_file_exists' => [
        'message' => 'Die .env Datei existiert nicht. Bitte kopiere die Datei .env.example zu .env und passe diese entsprechend an.',
        'name' => 'Die Umgebungsvariablendatei existiert',
    ],
    'example_environment_variables_are_set' => [
        'message' => 'Folgende Umgebungsvariablen fehlen im .env Umgebungsfile, sind aber in .env.example definiert:' . PHP_EOL . ':variables',
        'name' => 'Die Beispiel-Umgebungsvariablen sind gesetzt',
    ],
    'migrations_are_up_to_date' => [
        'message' => [
            'need_to_migrate' => 'Die Datenbank muss aktualisiert werden. Nutze "php artisan migrate", um die Migrationen einzuspielen.',
            'unable_to_check' => 'Die Migrationen konnten nicht geprüft werden: :reason',
        ],
        'name' => 'Die Migrationen sind aktuell',
    ],
    'php_extensions_are_disabled' => [
        'message' => 'Die folgenden Erweiterungen sind noch immer aktiviert:' . PHP_EOL . ':extensions',
        'name' => 'Unerwünschte PHP Erweiterungen sind deaktiviert',
    ],
    'php_extensions_are_installed' => [
        'message' => 'Die folgenden Erweiterungen fehlen:' . PHP_EOL . ':extensions',
        'name' => 'Die benötigten PHP Erweiterungen sind installiert',
    ],
    'routes_are_cached' => [
        'message' => 'Die Routen sollten für bessere Performance gecached sein im Produktivbetrieb. Nutze "php artisan route:cache", um den Routen-Cache zu erstellen.',
        'name' => 'Routen sind gecached',
    ],
    'routes_are_not_cached' => [
        'message' => 'Die Routen sollten während der Entwicklung nicht gecached sein. Nutze "php artisan route:clear", um den Routen-Cache zu leeren.',
        'name' => 'Routen sind nicht gecached',
    ],
    'storage_directory_is_linked' => [
        'message' => 'Das Speicherverzeichnis ist nicht verlinkt. Nutze "php artisan storage:link", um eine symbolische Verknüpfung zu erstellen.',
        'name' => 'Das Speicherverzeichnis ist verlinkt',
    ],
];
