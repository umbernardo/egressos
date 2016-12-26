<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 21/10/16
 * Time: 11:45
 */

namespace Egressos\Application\Validator\Factory;

use Cupcake\Service\ServiceManager;
use Respect\Validation\Validator;

class UsuarioValidatorFactory
{
    /**
     * @param ServiceManager $serviceManager
     * @return Validator
     */
    public function __invoke(ServiceManager $serviceManager)
    {
        return Validator::key('nome', Validator::alpha()->notBlank())
            ->key('email', Validator::email()->notBlank())
            ->key('password', Validator::notBlank()->length(3))
            ->key('telefone', Validator::intVal()->notBlank())
            ->key('ano_entrada', Validator::intVal()->length(4, 4)->notBlank())
            ->key('ano_conclusao', Validator::intVal()->length(4, 4)->notBlank())
            ->key('campus', Validator::intVal()->notBlank())
            ->key('titulacao', Validator::intVal()->notBlank())
            ->key('curso', Validator::intVal()->notBlank())
            ->key('ra', Validator::notBlank());
    }

    /**
     * @return array
     */
    public static function getMessages()
    {
        return array(
            'nome' => 'Nome é obrigatório',
            'email' => 'E-mail é obrigatório e deve ser um e-mail válido',
            'password' => 'Sua senha deve ter no mínimo 3 caracteres',
            'telefone' => 'Telefone é obrigatório e deve conter apenas números',
            'ano_entrada' => 'Ano de entrada é obrigatório e deve seguir o formato XXXX',
            'ano_conclusao' => 'Ano de conclusão é obrigatório e deve seguir o formato XXXX',
            'campus' => 'Campus é obrigatório',
            'titulacao' => 'Titulação é obrigatório',
            'curso' => 'Curso é obrigatório',
            'ra' => 'RA é obrigatório',
        );
    }
}
