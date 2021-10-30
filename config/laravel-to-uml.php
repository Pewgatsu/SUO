<?php

return [
    /**
     * Default route to see the UML diagram.
     */
    'route' => '/uml',

    /**
     * You can turn on or off the indexing of specific types
     * of classes. By default, LTU processes only controllers
     * and models.
     */
    'casts'         => false,
    'channels'      => false,
    'commands'      => false,
    'components'    => false,
    'controllers'   => false,
    'events'        => false,
    'exceptions'    => false,
    'jobs'          => false,
    'listeners'     => false,
    'mails'         => false,
    'middlewares'   => false,
    'models'        => true,
    'notifications' => false,
    'observers'     => false,
    'policies'      => false,
    'providers'     => false,
    'requests'      => false,
    'resources'     => false,
    'rules'         => false,

    /**
     * You can define specific nomnoml styling.
     * For more information: https://github.com/skanaar/nomnoml
     */
    'style' => [
        'background' => '#FFFFFF',
        'stroke'     => '#33322E',
        'arrowSize'  => 1,
        'bendSize'   => 0.3,
        'direction'  => 'down',
        'gutter'     => 5,
        'edgeMargin' => 0,
        'gravity'    => 1,
        'edges'      => 'rounded',
        'fill'       => '#fdf6e3',
        'fillArrows' => false,
        'font'       => 'Calibri',
        'fontSize'   => 12,
        'leading'    => 1.25,
        'lineWidth'  => 3,
        'padding'    => 8,
        'spacing'    => 40,
        'title'      => 'Class Diagram',
        'zoom'       => 1,
        'acyclicer'  => 'greedy',
        'ranker'     => 'longest-path'
    ],

    /**
     * Specific files can be excluded if need be.
     * By default, all default Laravel classes are ignored.
     */
    'excludeFiles' => [
        'Http/Kernel.php',
        'Console/Kernel.php',
        'Exceptions/Handler.php',
        'Http/Controllers/Controller.php',
        'Http/Middleware/Authenticate.php',
        'Http/Middleware/EncryptCookies.php',
        'Http/Middleware/PreventRequestsDuringMaintenance.php',
        'Http/Middleware/RedirectIfAuthenticated.php',
        'Http/Middleware/TrimStrings.php',
        'Http/Middleware/TrustHosts.php',
        'Http/Middleware/TrustProxies.php',
        'Http/Middleware/VerifyCsrfToken.php',
        'Providers/AppServiceProvider.php',
        'Providers/AuthServiceProvider.php',
        'Providers/BroadcastServiceProvider.php',
        'Providers/EventServiceProvider.php',
        'Providers/RouteServiceProvider.php',
        'Http/Livewire/UserProfile/DeleteAccountForm.php',
        'Http/Livewire/UserProfile/UpdatePasswordForm.php',
        'Http/Livewire/UserProfile/UpdatePersonalInfoForm.php',
        'Http/Livewire/UserProfile/UpdateProfileForm.php',
        'Http/Livewire/UserProfile/ValidateAccountForm.php',
        'Http/Livewire/Auth/Login.php',
        'Http/Livewire/Auth/Registration.php',
        'Models/MOBOCase.php',
        'Models/MOBOMemorySpeed.php',
        'Models/SocketCooler.php',
        'Models/ComponentDistance.php',
        'Http/Livewire/ProductsList/MotherboardProducts.php',
        'Http/Livewire/ProductsList/CPUProducts.php',
        'Http/Livewire/ProductsList/CPUCoolerProducts.php',
        'Http/Livewire/ProductsList/GraphicsCardProducts.php',
        'Http/Livewire/ProductsList/RAMProducts.php',
        'Http/Livewire/ProductsList/StorageProducts.php',
        'Http/Livewire/ProductsList/PSUProducts.php',
        'Http/Livewire/ProductsList/ComputerCaseProducts.php',
    ],

    /**
     * In case you changed any of the default directories
     * for different classes, please amend below.
     */
    'directories' => [
        'casts'         => 'Casts/',
        'channels'      => 'Broadcasting/',
        'commands'      => 'Console/Commands/',
        'components'    => 'View/Components/',
        'controllers'   => 'Http/Controllers/',
        'events'        => 'Events/',
        'exceptions'    => 'Exceptions/',
        'jobs'          => 'Jobs/',
        'listeners'     => 'Listeners/',
        'mails'         => 'Mail/',
        'middlewares'   => 'Http/Middleware/',
        'models'        => 'Models/',
        'notifications' => 'Notifications/',
        'observers'     => 'Observers/',
        'policies'      => 'Policies/',
        'providers'     => 'Providers/',
        'requests'      => 'Http/Requests/',
        'resources'     => 'Http/Resources/',
        'rules'         => 'Rules/',
    ],
];
