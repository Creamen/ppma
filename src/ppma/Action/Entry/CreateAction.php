<?php

namespace ppma\Action\Entry;

use ppma\Action\AbstractAction;
use ppma\Model\User;
use Psr\Http\Message\ResponseInterface;
use Respect\Validation\Exceptions\NestedValidationException;
use Slim\Http\Request;
use Slim\Http\Response;
use Respect\Validation\Validator as v;

class CreateAction extends AbstractAction
{

    /**
     * @see AbstractAction::__invoke()
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return ResponseInterface
     */
    function __invoke(Request $request, Response $response, array $args) : ResponseInterface
    {
        // create validator
        $validator = v::create();
        $validator->key('username', v::stringType()->notEmpty());
        $validator->key('password', v::stringType()->length(8));

        // validate & save
        try {
            $validator->assert($request->getParsedBody());

            // create and save user
            $user = new User();
            $user->username = $request->getParsedBodyParam('username');
            $user->password = password_hash($request->getParsedBodyParam('password'), PASSWORD_BCRYPT);
            $user->save();

            return $response
                ->withStatus(201)
                ->withJson($user);

        } catch (NestedValidationException $exception) {
            /* @var array $errors */

            // get errors
            $errors = $exception->findMessages(['username', 'password']);

            // remove empty errors
            $errors = array_filter($errors, 'strlen');

            return $response
                ->withStatus(400)
                ->withJson(['errors' => $errors]);
        }
    }

}
