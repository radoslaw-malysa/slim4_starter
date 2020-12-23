<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Model\Foresight\TopicsRepository;
use App\Model\Repositories\UsersRepository;
//use App\Model\Foresight\FactorsTypesRepository;
//use App\Model\Foresight\TopicsFactorsTypesRepository;
//use App\Model\Foresight\FactorsRepository;
//use App\Model\Foresight\ScenariosRepository;

class AdminAction 
{
    public function __construct(TopicsRepository $topics, UsersRepository $users)
    {
        $this->topics = $topics;
        $this->users = $users;
    }
    

    public function login(Request $request, Response $response, $args) {
        
        //$data = $request->getBody()->getContents();
        $data = $request->getParsedBody();

        $user = $this->users->where('email', $data['email'])->first(['id', 'email', 'passwd', 'id_group']);

        if ($user['id']) {
            if (password_verify((string)$data['passwd'], $user['passwd'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_id_group'] = $user['id_group'];
                $_SESSION['user_email'] = $user['email'];

                $payload = [
                    'id' => $user['id'],
                    'email' => $user['email']
                ];
            } else {
                $payload = ['error' => 1, 'message' => 'Hasło nieprawidłowe'];
            }
        } else {
            $payload = ['error' => 1, 'message' => 'Brak takiego adresu e-mail'];
        }

        $response->getBody()->write(json_encode($payload));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function session(Request $request, Response $response, $args) {
        $payload = ($_SESSION['user_id']) ? [
            'id' => $_SESSION['user_id'],
            'email' => $_SESSION['email']
        ] : [];

        $response->getBody()->write(json_encode($payload));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function saveUser(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        //print_r($data); exit;

        if (!empty($data['id'])) {
            $success = $this->users
            ->where('id', $data['id'])
            ->update([
                'email' => $data['email'],
                'passwd' => password_hash($data['passwd'], PASSWORD_DEFAULT),
                'state' => $data['state'],
                'update_time' => date("Y-m-d H:i:s"),
                'update_ip' => $_SERVER['REMOTE_ADDR']
            ]);

            $payload = ($success) ? ['id' => $data['id']] : ['error' => 1, 'message' => 'Nie udało się zapisać użytkownika'];
        } elseif ($data['email'] && $data['passwd']) {
            if ($this->users->where('email', $data['email'])->count() > 0) {
                $payload = ['error' => 1, 'message' => 'Ten adres e-mail już istnieje.'];
            } else {
                $user_id = $this->users->insert([
                    'email' => $data['email'],
                    'passwd' => password_hash($data['passwd'], PASSWORD_DEFAULT),
                    'state' => 1,
                    'create_time' => date("Y-m-d H:i:s"),
                    'create_ip' => $_SERVER['REMOTE_ADDR'],
                    'update_time' => date("Y-m-d H:i:s"),
                    'update_ip' => $_SERVER['REMOTE_ADDR']
                ]);

                $payload = ($user_id) ? ['id' => $user_id] : ['error' => 1, 'message' => 'Nie udało się dodać użytkownika'];
            }
        } else {
            $payload = ['error' => 1, 'message' => 'Niekompletne dane. Wymagane: e-mail i hasło'];
        }

        $response->getBody()->write(json_encode($payload));
        
        return $response->withHeader('Content-Type', 'application/json');
    }
    

    public function errorResponse(Request $request, Response $response, $args) {
        $payload = json_encode(['error' => 1]);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }


}

//https://stormpath.com/blog/where-to-store-your-jwts-cookies-vs-html5-web-storage
//https://stackoverflow.com/questions/26340275/where-to-save-a-jwt-in-a-browser-based-application-and-how-to-use-it/40376819#40376819
//https://hasura.io/blog/best-practices-of-using-jwt-with-graphql/
