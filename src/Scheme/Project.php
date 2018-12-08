<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Scheme;

use Analytics;
use Analytics\Entity;

class Project {

    public function getProjects() {
        return Analytics\Roistat::$api->send('user/projects');
    }

    public function createProject(Entity\Project $project) {
        return Analytics\Roistat::$api->send('account/project/create', $project, 'POST');
    }
}