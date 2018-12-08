<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics;
use Analytics\Entity;

class Project extends AbstractScheme {

    protected $_entityName = 'Project';

    /**
     * @return Entity\Project[]
     * @throws \Exception
     */
    public function getProjects() {
        $response = Analytics\Roistat::$api->send('user/projects');
        return $this->_buildEntity($response['projects']);
    }

    /**
     * @param Entity\Project $project
     * @return array
     * @throws \Exception
     */
    public function createProject(Entity\Project $project) {
        return Analytics\Roistat::$api->send('account/project/create', $project, 'POST');
    }
}