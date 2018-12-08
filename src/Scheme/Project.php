<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics\Engine\Exception;
use Analytics\Entity;

class Project extends AbstractScheme {

    protected $_entityName = 'Project';

    /**
     * @return Entity\Project[]
     * @throws Exception\AuthException
     */
    public function getProjects() {
        $response = $this->_api->send('user/projects');
        return $this->_buildEntity($response['projects']);
    }

    /**
     * @param Entity\Project $project
     * @return array
     * @throws Exception\AuthException
     */
    public function createProject(Entity\Project $project) {
        return $this->_api->send('account/project/create', $project, 'POST');
    }
}