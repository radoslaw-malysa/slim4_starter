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
use Slim\Views\PhpRenderer;

class ForesightPrintAction 
{
    public function __construct(PhpRenderer $view, TopicsRepository $topics, FactorsTypesRepository $factorsTypes, TopicsFactorsTypesRepository $topicsFactorsTypes, FactorsRepository $factors, ScenariosRepository $scenarios)
    {
        $this->topics = $topics;
        $this->factorsTypes = $factorsTypes;
        $this->topicsFactorsTypes = $topicsFactorsTypes;
        $this->factors = $factors;
        $this->scenarios = $scenarios;
        $this->view = $view;
    }
    
    public function __invoke(Request $request, Response $response, $args) {
        
        $topic = $this->topics->where('id', $args['id'])->first();
        $topic['editable'] = ($topic['id'] > 2) ? 1 : 1;

        $factors_types = ($topic['editable']) ? $this->indexArray($this->factorsTypes->topicSelectionEditable($topic['id'])) : $this->indexArray($this->factorsTypes->topicSelection($topic['id']));
        $topics_factors_types = $this->topicsFactorsTypes->where('id_topic', $args['id'])->get();
        $factors = $this->factors->where('id_topic', $args['id'])->get();
        $scenarios = $this->scenarios->where('id_topic', $args['id'])->get();
        
        $data = array_merge($topic, ['factors_types' => $factors_types, 'topics_factors_types' => $topics_factors_types, 'factors' => $factors, 'scenarios' => $scenarios]);
        
        return $this->view->render($response, 'foresight/print_topic.php');
    }

    protected function indexArray($array, $column = 'id')
    {
        $indexed = [];
        foreach ($array as $row) {
            $indexed[$row[$column]] = $row;
        }
        return $indexed;
    }
}