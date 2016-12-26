<?php

return [
    'routes' => [
        'Rota Padrão (Alias da Home)' => [
            'route' => '/',
            'controller' => \Egressos\Application\Controller\SiteController::class,
            'action' => 'Home'
        ],
        'home' => [
            'route' => '/home',
            'controller' => \Egressos\Application\Controller\SiteController::class,
            'action' => 'Home'
        ],
        'login' => [
            'route' => '/login',
            'controller' => \Egressos\Application\Controller\LoginController::class,
            'action' => 'Login'
        ],
        'logout' => [
            'route' => '/logout',
            'controller' => \Egressos\Application\Controller\LoginController::class,
            'action' => 'Logout'
        ],
        'cadastro' => [
            'route' => '/cadastrar',
            'controller' => \Egressos\Application\Controller\CadastroController::class,
            'action' => 'Cadastrar'
        ],
        'dashboard' => [
            'route' => '/dashboard',
            'controller' => \Egressos\Application\Controller\UsuarioController::class,
            'action' => 'Dashboard'
        ],
        'amigos' => [
            'route' => '/amigos',
            'controller' => \Egressos\Application\Controller\UsuarioController::class,
            'action' => 'Amigos'
        ],
        'buscar-amigos' => [
            'route' => '/buscar-amigos',
            'controller' => \Egressos\Application\Controller\UsuarioController::class,
            'action' => 'BuscarAmigos'
        ],
        'adicionar-amigos' => [
            'route' => '/adicionar-amigo/{id}',
            'controller' => \Egressos\Application\Controller\UsuarioController::class,
            'action' => 'AdicionarAmigo'
        ],
        'amigo-adicionado' => [
            'route' => '/amigo-adicionado',
            'controller' => \Egressos\Application\Controller\UsuarioController::class,
            'action' => 'AmigoAdicionadoSucesso'
        ],
        'aceitar-amigo' => [
            'route' => '/aceitar-amigo/{id}',
            'controller' => \Egressos\Application\Controller\UsuarioController::class,
            'action' => 'AceitarAmigo'
        ],
        'editar-perfil' => [
            'route' => 'editar-perfil',
            'controller' => \Egressos\Application\Controller\UsuarioController::class,
            'action' => 'EditarPerfil'
        ],
        'oportunidades' => [
            'route' => 'oportunidades',
            'controller' => \Egressos\Application\Controller\OportunidadesController::class,
            'action' => 'Oportunidades'
        ],
        'oportunidades-ver-cidade' => [
            'route' => 'oportunidades/{id}',
            'controller' => \Egressos\Application\Controller\OportunidadesController::class,
            'action' => 'Oportunidades'
        ],
        'perfil' => [
            'route' => 'perfil/{md5email}',
            'controller' => \Egressos\Application\Controller\UsuarioController::class,
            'action' => 'VerPerfil'
        ],

    ],
    'services' => [
        //Retrocompatibiliades
        'RequestManager' => \Cupcake\Request\Factory\RequestManagerFactory::class,
        'DataHelper' => \Cupcake\ObjectMapper\Factory\ObjectMapperFactory::class,
        'Renderer' => \Egressos\Application\Renderer\Factory\RendererFactory::class,
        'UsuarioValidator' => \Egressos\Application\Validator\Factory\UsuarioValidatorFactory::class,
        //
        \Cupcake\Request\RequestManager::class => \Cupcake\Request\Factory\RequestManagerFactory::class,
        \PDO::class => \Cupcake\GenericFactory\PDOFactory::class,
        \Cupcake\Messenger\FlashMessenger::class => \Cupcake\Messenger\Factory\FlashMessengerFactory::class,
        \Cupcake\Url\UrlGenerator::class => \Cupcake\Url\Factory\UrlGeneratorFactory::class,
        \Cupcake\ObjectMapper\ObjectMapper::class => \Cupcake\ObjectMapper\Factory\ObjectMapperFactory::class,
        \Egressos\Application\Manager\UserManager::class => \Egressos\Application\Manager\Factory\UserManagerFactory::class,
    ],
    'controllers' => [
        \Egressos\Application\Controller\SiteController::class => \Egressos\Application\Controller\Factory\SiteControllerFactory::class,
        \Egressos\Application\Controller\UsuarioController::class => \Egressos\Application\Controller\Factory\UsuarioControllerFactory::class,
        \Egressos\Application\Controller\CadastroController::class => \Egressos\Application\Controller\Factory\CadastroControllerFactory::class,
        \Egressos\Application\Controller\LoginController::class => \Egressos\Application\Controller\Factory\LoginControllerFactory::class,
        \Egressos\Application\Controller\OportunidadesController::class => \Egressos\Application\Controller\Factory\OportunidadesControllerFactory::class,
    ],
    'renderer' => [
        'viewFolders' => [
            'layout' => __DIR__ . '/../view/layout/',
            'site' => __DIR__ . '/../view/site/',
            'partials' => __DIR__ . '/../view/partials/',
        ],
    ],
    'doctrine' => [
        'entitiesPaths' => [
            __DIR__ . '/../src/Entity/'
        ],
        'proxyDir' => __DIR__ . '/../proxy/',
    ],
    'flash-messenger' => [
        'session-id' => 'flash-messenger-default',
    ]
];
