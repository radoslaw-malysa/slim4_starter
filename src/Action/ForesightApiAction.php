<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Model\Foresight\TopicsRepository;
use App\Model\Foresight\FactorsTypesRepository;
use App\Model\Foresight\TopicsFactorsTypesRepository;
use App\Model\Foresight\FactorsRepository;
use App\Model\Foresight\ScenariosRepository;

class ForesightApiAction 
{
    public function __construct(TopicsRepository $topics, FactorsTypesRepository $factorsTypes, TopicsFactorsTypesRepository $topicsFactorsTypes, FactorsRepository $factors, ScenariosRepository $scenarios)
    {
        $this->topics = $topics;
        $this->factorsTypes = $factorsTypes;
        $this->topicsFactorsTypes = $topicsFactorsTypes;
        $this->factors = $factors;
        $this->scenarios = $scenarios;
    }
    
    public function __invoke(Request $request, Response $response, $args) {
        
        return $this->view->render($response, 'scenariusze.html');
    }

    public function getTopic(Request $request, Response $response, $args) {
        
        $topic = $this->topics->where('id', $args['id'])->first();
        $topic['editable'] = ($topic['id'] > 2) ? 1 : 1;

        $factors_types = ($topic['editable']) ? $this->indexArray($this->factorsTypes->topicSelectionEditable($topic['id'])) : $this->indexArray($this->factorsTypes->topicSelection($topic['id']));
        $topics_factors_types = $this->topicsFactorsTypes->where('id_topic', $args['id'])->get();
        $factors = $this->factors->where('id_topic', $args['id'])->get();
        $scenarios = $this->scenarios->where('id_topic', $args['id'])->get();
        
        $data = array_merge($topic, ['factors_types' => $factors_types, 'topics_factors_types' => $topics_factors_types, 'factors' => $factors, 'scenarios' => $scenarios]);
        $payload = json_encode($data);

        $response->getBody()->write($payload);
        
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }

    public function addTopicType(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        
        if (isset($data['id_topic'])) {

            $this->topicsFactorsTypes->insert([
                'id_topic' => $data['id_topic'],
                'id_factor_type' => $data['id_factor_type']
            ]);
            
            return $this->getTopic($request, $response, ['id' => $data['id_topic']]);
        } else {
            return $this->errorResponse($request, $response, []);
        }
    }

    public function updateTopic(Request $request, Response $response, $args) {
        
        $data = $request->getParsedBody();
        
        if ($data['title']) {
            if (isset($data['id'])) {
                $this->topics
                ->where('id', $data['id'])
                ->update([
                    'title' => $data['title'],
                    'time_horizon' => $data['time_horizon'],
                    'topic_area' => $data['topic_area']
                ]);
            } else {
                $data['id'] = $this->topics->insert([
                    'title' => $data['title'],
                    'time_horizon' => $data['time_horizon'],
                    'topic_area' => $data['topic_area'],
                    'state' => 1
                ]);
            }
        }
        
        $payload = json_encode(['id' => $data['id']]);

        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:8080')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }

    public function updateFactor(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        
        if (isset($data['id_topic'])) {
            if ($data['id']) {
                $this->factors
                ->where('id', $data['id'])
                ->update([
                    'title' => $data['title'],
                    'ord' => $data['ord']
                ]);
            } else {
                $this->factors->insert([
                    'id_topic' => $data['id_topic'],
                    'title' => $data['title'],
                    'ord' => $data['ord'],
                    'key_factor' => '0',
                    'type' => $data['type']
                ]);
            }
            
            return $this->getTopic($request, $response, ['id' => $data['id_topic']]);
        } else {
            return $this->errorResponse($request, $response, []);
        }
    }

    public function deleteFactor(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        
        if (isset($data['id_topic'])) {
            if (isset($data['id'])) {
                $this->factors
                ->where('id', $data['id'])
                ->delete();
            } 
            
            return $this->getTopic($request, $response, ['id' => $data['id_topic']]);
        } else {
            return $this->errorResponse($request, $response, []);
        }
    }

    public function updateKeyFactors(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();


        /*$payload = json_encode($data);
            $response->getBody()->write($payload);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS'); exit;*/

        
        if (isset($data['id_topic'])) {
            $this->factors->where('id_topic', $data['id_topic'])->where('key_factor', '1')->update(['key_factor' => '0']);
            if (isset($data['id'])) {
                $this->factors->where('id', 'IN', $data['id'])->update(['key_factor' => '1']);
            }
            return $this->getTopic($request, $response, ['id' => $data['id_topic']]);
        } else {
            return $this->errorResponse($request, $response, []);
        }
    }

    public function updateScenario(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        
        if (isset($data['id_topic'])) {
            if ($data['id']) {
                
                $this->scenarios
                ->where('id', $data['id'])
                ->update([
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'ord' => $data['ord'],
                    'factors' => $data['factors']
                ]);
            } else {
                
                $this->scenarios->insert([
                    'id_topic' => $data['id_topic'],
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'ord' => $data['ord'],
                    'factors' => $data['factors']
                ]);
            }
            
            return $this->getTopic($request, $response, ['id' => $data['id_topic']]);
        } else {
            return $this->errorResponse($request, $response, []);
        }
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

    protected function indexArray($array, $column = 'id')
    {
        $indexed = [];
        foreach ($array as $row) {
            $indexed[$row[$column]] = $row;
        }
        return $indexed;
    }

   //"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" Files (x86)\Google\Chrome\Application\chrome.exe --disable-web-security --user-data-dir="C:/ChromeDevSession"

}
