<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Action\Action;
use App\Model\Foresight\TopicsRepository;
use App\Model\Foresight\FactorsRepository;

class ForesightApiAction 
{
    public function __construct(TopicsRepository $topics, FactorsRepository $factors)
    {
        $this->topics = $topics;
        $this->factors = $factors;
    }
    
    public function __invoke(Request $request, Response $response, $args) {
        
        return $this->view->render($response, 'scenariusze.html');
    }

    public function getTopic(Request $request, Response $response, $args) {
        
        $topic = $this->topics->where('id', $args['id'])->first();
        $factors = $this->factors->where('id_topic', $args['id'])->get();
        
        $data = array_merge($topic, ['factors' => $factors]);
        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }

    public function updateFactor(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();


        $payload = json_encode($data);
            $response->getBody()->write($payload);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS'); exit;


        
        //$data = ['id'=>1, 'id_topic'=> 1, 'title'=>'dupa', 'ord' =>'1', 'type'=>'1'];
        
        if ($data['id_topic']) {
            if ($data['id']) {
                $this->factors
                ->where('id', 1)
                ->update([
                    'title' => $data['title'],
                    'ord' => $data['ord']
                ]);
            } else {
                $this->factors->insert([
                    'id_topic' => $data['id_toppic'],
                    'title' => $data['title'],
                    'ord' => $data['ord'],
                    'key_factor' => '0',
                    'type' => $data['type']
                ]);
            }
            
            return getTopic($request, $response, ['id' => $data['id_topic']]);
        } else {
            $payload = json_encode(['error' => 1]);
            $response->getBody()->write($payload);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
        }
    }

   //"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" Files (x86)\Google\Chrome\Application\chrome.exe --disable-web-security --user-data-dir="C:/ChromeDevSession"
   
}
