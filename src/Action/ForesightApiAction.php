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
        
        if (strpos($args['id'], '-') !== false) {
            list($id, $edit_key) = explode('-', $args['id']);
            $topic = $this->topics->where('id', $id)->where('edit_key', $edit_key)->first();
            $topic['editable'] = (isset($topic['id'])) ? 1 : 0;
        }
        
        if (!isset($topic['id'])) {
            $id = $args['id'];
            $topic = $this->topics->where('id', $args['id'])->first();
            $topic['editable'] = 0;
        }

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

    private function verifyEditKey($id) {
        if (strpos($id, '-') !== false) {
            list($id, $edit_key) = explode('-', $id);
            $topic = $this->topics->where('id', $id)->where('edit_key', $edit_key)->first(['id']);
            return $topic['id'];
        } else {
            return false;
        }
    }

    public function addTopicType(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $id_topic = $this->verifyEditKey($data['id_topic']);

        if ($id_topic) {
            $this->topicsFactorsTypes->insert([
                'id_topic' => $id_topic,
                'id_factor_type' => $data['id_factor_type']
            ]);
            
            return $this->getTopic($request, $response, ['id' => $data['id_topic']]);
        } else {
            return $this->errorResponse($request, $response, []);
        }
    }

    public function createAddTopicType(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $id_topic = $this->verifyEditKey($data['id_topic']);

        if ($id_topic) {
            $id_factor_type = $this->factorsTypes->insert([
                'title' => $data['title'],
                'color' => '#18b9a7',
                'standard_type' => '0'
            ]);
            
            if ($id_factor_type) {
                $this->topicsFactorsTypes->insert([
                    'id_topic' => $id_topic,
                    'id_factor_type' => $id_factor_type
                ]);
            } else {
                return $this->errorResponse($request, $response, []);
            }
            
            return $this->getTopic($request, $response, ['id' => $data['id_topic']]);
        } else {
            return $this->errorResponse($request, $response, []);
        }
    }

    public function delTopicType(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $id_topic = $this->verifyEditKey($data['id_topic']);
        
        if ($id_topic && isset($data['id']) && isset($data['id_factor_type'])) {
            $this->factors
            ->where('id_topic', $id_topic)
            ->where('type', $data['id_factor_type'])
            ->delete();
            
            $this->topicsFactorsTypes
            ->where('id', $data['id'])
            ->delete();

            //delete factor_type if not standart
            $this->factorsTypes
            ->where('id', $data['id_factor_type'])
            ->where('standard_type', '0')
            ->delete();
            
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
                $edit_key = substr(md5(time().'x'), 0, 6);
                $data['id'] = $this->topics->insert([
                    'title' => $data['title'],
                    'time_horizon' => $data['time_horizon'],
                    'topic_area' => $data['topic_area'],
                    'create_time' => date("Y-m-d H:i:s"),
                    'create_ip' => $_SERVER['REMOTE_ADDR'],
                    'state' => 1,
                    'edit_key' => $edit_key
                ]);

                //add first topic factors type
                $this->topicsFactorsTypes->insert([
                    'id_topic' => $data['id'],
                    'id_factor_type' => 1
                ]);
            }
        }
        
        $payload = json_encode(['id' => $data['id'] . '-' . $edit_key]);

        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:8080')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }

    public function updateFactor(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $id_topic = $this->verifyEditKey($data['id_topic']);
        
        if ($id_topic) {
            if ($data['id'] > 0) {
                $this->factors
                ->where('id', $data['id'])
                ->update([
                    'title' => $data['title'],
                    'ord' => $data['ord']
                ]);
            } else {
                $this->factors->insert([
                    'id_topic' => $id_topic,
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
        $id_topic = $this->verifyEditKey($data['id_topic']);
        
        if ($id_topic) {
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
        $id_topic = $this->verifyEditKey($data['id_topic']);


        /*$payload = json_encode($data);
            $response->getBody()->write($payload);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS'); exit;*/

        if ($id_topic) {
            $this->factors->where('id_topic', $id_topic)->where('key_factor', '1')->update(['key_factor' => '0']);
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
        $id_topic = $this->verifyEditKey($data['id_topic']);
        
        if ($id_topic) {
            if ($data['id']) {
                $this->scenarios
                ->where('id', $data['id'])
                ->update([
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'ord' => $data['ord']
                ]);
            } else {
                $this->scenarios->insert([
                    'id_topic' => $id_topic,
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'ord' => $data['ord']
                ]);
            }
            
            return $this->getTopic($request, $response, ['id' => $data['id_topic']]);
        } else {
            return $this->errorResponse($request, $response, []);
        }
    }

    public function updateScenarioFactors(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $id_topic = $this->verifyEditKey($data['id_topic']);
        
        if ($id_topic && isset($data['nr'])) {
            
            //clear scenario factors
            $this->factors
            ->where('id_topic', $id_topic)
            ->update([
                'scenario_' . $data['nr'] => '0'
            ]);
            
            $factors = json_decode($data['factors']);
           
            if (is_array($factors)) {
                foreach ($factors as $id_factor) {
                    $this->factors
                    ->where('id', $id_factor)
                    ->update([
                        'scenario_' . $data['nr'] => '1'
                    ]);
                }
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
