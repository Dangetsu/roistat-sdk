<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test\Calltracking;

use Analytics\Scheme;
use Analytics\Engine\Exception;
use Analytics\Entity;

class CallTest extends \Test\AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testItems() {
        $this->_roistat->api()->addMockHandler($this->_createMockResponse($this->_getSavedResponse('Calltracking/CallList')));
        $calls = (new Scheme\Calltracking\Call($this->_roistat))->items();
        $this->assertSame(2, count($calls));

        $call = $calls[0];
        $this->assertSame('16769', $call->getId());
        $this->assertSame('7495301234', $call->getCallee());
        $this->assertSame('7495751234', $call->getCaller());
        $this->assertSame(59, $call->getDuration());
        $this->assertSame(30, $call->getWaitingTime());
        $this->assertSame(29, $call->getAnswerDuration());
        $this->assertSame('ANSWER', $call->getStatus());
        $this->assertSame('2016-06-19T09:31:01+0000', $call->getDate());
        $this->assertSame('https://site.ru/calltracking/call/23/file/123456qwerty', $call->getLink());
        $this->assertSame('666', $call->getVisitId());
        $this->assertSame('777', $call->getOrderId());

        $staticSource = $call->getStaticSource();
        $this->assertSame('direct_search_18000022_2014432344_что такое гугл адвордс', $staticSource->getSystemName());
        $this->assertSame('Яндекс.Директ_Поиск_РК - adwords2 - поиск - Мир_Тратите деньги в Адвордс впустую?_что такое гугл адвордс', $staticSource->getDisplayName());
        $this->assertSame('https://favicon.yandex.net/favicon/direct.yandex.ru', $staticSource->getIconUrl());
        $this->assertSame('direct', $staticSource->getUtmSource());
        $this->assertSame('cpc', $staticSource->getUtmMedium());
        $this->assertSame('kampaniya', $staticSource->getUtmCampaign());
        $this->assertSame('slovo', $staticSource->getUtmTerm());
        $this->assertSame('test-message', $staticSource->getUtmContent());
        $this->assertSame('openstat', $staticSource->getOpenstat());
        $this->assertSame('http://site.ru/contact.php', $staticSource->getReferrer());
    }

    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testCreate() {
        $this->_roistat->api()->addMockHandler($this->_createMockResponse($this->_getSavedResponse('Calltracking/CallCreate')));
        $call = (new Entity\Calltracking\Call())
            ->setCallee('7495301234')
            ->setCaller('7495301234')
            ->setDuration(59)
            ->setAnswerDuration(29)
            ->setStatus('ANSWER')
            ->setDate('2016-06-19T09:31:01+0000')
            ->setVisitId('666')
            ->setMarker('ym_1_2')
            ->setOrderId('777')
            ->setComment('Перезвонить завтра')
            ->setSaveToCrm(0);
        $call = (new Scheme\Calltracking\Call($this->_roistat))->create($call);
        $this->assertSame('5', $call->getId());
    }

    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testUpdate() {
        $this->_roistat->api()->addMockHandler($this->_createMockResponse($this->_getSavedResponse('Calltracking/CallList')));
        $calls = (new Scheme\Calltracking\Call($this->_roistat))->items();
        $call = $calls[0];
        $handler = $this->_createMockResponse(['status' => 'success']);
        $this->_roistat->api()->addMockHandler($handler);
        $isUpdate = $call->setComment('Тестовый комментарий')
            ->setOrderId('22')
            ->setLink('https://site.ru/calltracking/call/23/file/123456qwerty')
            ->setStatus('CANCEL')
            ->setDuration(5)
            ->update();
        $this->assertTrue($isUpdate);
    }
}