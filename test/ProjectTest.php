<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test;

use Analytics\Engine\Exception;
use Analytics\Entity;
use Analytics\Scheme;

class ProjectTest extends AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testItems() {
        $handler = $this->_createMockResponse(['projects' => [
            ['id' => 58211, 'name' => 'API', 'profit' => '0', 'creation_date' => '2017-09-29 08:41:27', 'currency' => 'RUB', 'is_owner' => 1],
            ['id' => 58211, 'name' => 'API', 'profit' => '0', 'creation_date' => '2017-09-29 08:41:27', 'currency' => 'RUB', 'is_owner' => 1],
        ], 'status' => 'success']);
        $this->_roistat->addMockHandler($handler);
        $projects = (new Scheme\Project($this->_roistat))->items();
        $this->assertSame(2, count($projects));

        $project = $projects[0];
        $this->assertSame(58211, $project->getId());
        $this->assertSame('API', $project->getName());
        $this->assertSame('0', $project->getProfit());
        $this->assertSame('2017-09-29 08:41:27', $project->getCreationDate());
        $this->assertSame('RUB', $project->getCurrency());
        $this->assertSame(1, $project->getIsOwner());
    }

    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testCreate() {
        $handler = $this->_createMockResponse(['data' => ['project_id' => 99999, 'counter' => ['id' => '213214', 'code' => '<script>counter</script>']], 'status' => 'success']);
        $this->_roistat->addMockHandler($handler);
        $project = (new Scheme\Project($this->_roistat))->create((new Entity\Project())->setName('TestName')->setCurrency('USD'));
        $this->assertSame(99999, $project->getId());
        $this->assertSame('TestName', $project->getName());
        $this->assertSame('USD', $project->getCurrency());
        $this->assertSame('213214', $project->getCounter()->getId());
        $this->assertSame('<script>counter</script>', $project->getCounter()->getCode());
    }
}