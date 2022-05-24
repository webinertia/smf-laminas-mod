<?php

use Laminas\ServiceManager\Config;
use Laminas\ServiceManager\ServiceManager;

function buildServiceManager()
{
    global $serviceManager;
    if (file_exists(__DIR__ . '/../../config/app.config.php')) {
        $configuration = include __DIR__ . '/../../config/app.config.php';
        // Prepare the service manager
        $smConfig       = $configuration['service_manager'] ?? [];
        $smConfig       = new Config($smConfig);
        $serviceManager = new ServiceManager();
        $smConfig->configureServiceManager($serviceManager);
        $serviceManager->setService('config', $configuration);
    }
}
