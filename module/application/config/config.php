<?php

return [
    'routes' => [
        'Rota Padrão (Alias da Home)' => [
            'route' => '/',
            'controller' => '\Egressos\Application\Controller\SiteController',
            'action' => 'Home'
        ],
        'home' => [
            'route' => '/home',
            'controller' => '\Egressos\Application\Controller\SiteController',
            'action' => 'Home'
        ],
        'login' => [
            'route' => '/login',
            'controller' => '\Egressos\Application\Controller\LoginController',
            'action' => 'Login'
        ],
        'logout' => [
            'route' => '/logout',
            'controller' => '\Egressos\Application\Controller\LoginController',
            'action' => 'Logout'
        ],
        'cadastro' => [
            'route' => '/cadastrar',
            'controller' => '\Egressos\Application\Controller\CadastroController',
            'action' => 'Cadastrar'
        ],
        'dashboard' => [
            'route' => '/dashboard',
            'controller' => '\Egressos\Application\Controller\UsuarioController',
            'action' => 'Dashboard'
        ],
        'amigos' => [
            'route' => '/amigos',
            'controller' => '\Egressos\Application\Controller\UsuarioController',
            'action' => 'Amigos'
        ],
        'buscar-amigos' => [
            'route' => '/buscar-amigos',
            'controller' => '\Egressos\Application\Controller\UsuarioController',
            'action' => 'BuscarAmigos'
        ],
        'adicionar-amigos' => [
            'route' => '/adicionar-amigo/{id}',
            'controller' => '\Egressos\Application\Controller\UsuarioController',
            'action' => 'AdicionarAmigo'
        ],
        'amigo-adicionado' => [
            'route' => '/amigo-adicionado',
            'controller' => '\Egressos\Application\Controller\UsuarioController',
            'action' => 'AmigoAdicionadoSucesso'
        ],
        'aceitar-amigo' => [
            'route' => '/aceitar-amigo/{id}',
            'controller' => '\Egressos\Application\Controller\UsuarioController',
            'action' => 'AceitarAmigo'
        ],
        'editar-perfil' => [
            'route' => '/editar-perfil',
            'controller' => '\Egressos\Application\Controller\UsuarioController',
            'action' => 'EditarPerfil'
        ],
        'oportunidades' => [
            'route' => '/oportunidades',
            'controller' => '\Egressos\Application\Controller\OportunidadesController',
            'action' => 'Oportunidades'
        ],
        'oportunidades-ver-cidade' => [
            'route' => '/oportunidades/{id}',
            'controller' => '\Egressos\Application\Controller\OportunidadesController',
            'action' => 'Oportunidades'
        ],
        'perfil' => [
            'route' => '/perfil/{md5email}',
            'controller' => '\Egressos\Application\Controller\UsuarioController',
            'action' => 'VerPerfil'
        ],
        'esqueci-senha' => [
            'route' => '/esqueci-senha',
            'controller' => '\Egressos\Application\Controller\PasswordController',
            'action' => 'EsqueciSenha'
        ],
        'recuperar-senha' => [
            'route' => '/recuperar-senha/{md5Email}/{md5Pass}',
            'controller' => '\Egressos\Application\Controller\PasswordController',
            'action' => 'RecuperarSenha'
        ],

    ],
    'services' => [
        //Retrocompatibiliades
        'UrlGenerator' => '\Egressos\Application\Controller\Factory\TestFactory',
        'RequestManager' => '\Cupcake\Request\Factory\RequestManagerFactory',
        'DataHelper' => '\Cupcake\ObjectMapper\Factory\ObjectMapperFactory',
        'Renderer' => '\Egressos\Application\Renderer\Factory\RendererFactory',
        'UsuarioValidator' => '\Egressos\Application\Validator\Factory\UsuarioValidatorFactory',
        'UserManager' => '\Egressos\Application\Manager\Factory\UserManagerFactory',
        //
        '\Cupcake\Request\RequestManager' => '\Cupcake\Request\Factory\RequestManagerFactory',
        'PDO' => '\Cupcake\GenericFactory\PDOFactory',
        '\Cupcake\Messenger\FlashMessenger' => '\Cupcake\Messenger\Factory\FlashMessengerFactory',
        '\Cupcake\Url\UrlGenerator' => '\Cupcake\Url\Factory\UrlGeneratorFactory',
        '\Cupcake\ObjectMapper\ObjectMapper' => '\Cupcake\ObjectMapper\Factory\ObjectMapperFactory',
        '\Egressos\Application\Manager\UserManager' => '\Egressos\Application\Manager\Factory\UserManagerFactory',
    ],
    'controllers' => [
        '\Egressos\Application\Controller\SiteController' => '\Egressos\Application\Controller\Factory\SiteControllerFactory',
        '\Egressos\Application\Controller\UsuarioController' => '\Egressos\Application\Controller\Factory\UsuarioControllerFactory',
        '\Egressos\Application\Controller\CadastroController' => '\Egressos\Application\Controller\Factory\CadastroControllerFactory',
        '\Egressos\Application\Controller\LoginController' => '\Egressos\Application\Controller\Factory\LoginControllerFactory',
        '\Egressos\Application\Controller\OportunidadesController' => '\Egressos\Application\Controller\Factory\OportunidadesControllerFactory',
        '\Egressos\Application\Controller\PasswordController' => '\Egressos\Application\Controller\Factory\PasswordControllerFactory',
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
