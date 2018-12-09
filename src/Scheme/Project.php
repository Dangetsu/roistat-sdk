<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine\Exception;
use Analytics\Entity;

class Project extends AbstractScheme {
    /** @var string */
    protected $_entityName = 'Project';

    /**
     * @return Entity\Project[]
     * @throws Exception\AuthException
     */
    public function items() {
        $response = $this->_api->send('user/projects');
        return $this->_buildEntity($response['projects']);
    }

    /**
     * @param Entity\Project $project
     * @return Entity\Project
     * @throws Exception\AuthException
     */
    public function create(Entity\Project $project) {
        $response = $this->_api->send('account/project/create', $project, 'POST');
        $project->id = $response['data']['project_id'];
        $project->counter = new Entity\Counter($response['data']['counter']);
        return $project;
    }
}