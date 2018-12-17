<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Test\Calltracking;

use Analytics\Engine\Exception;

class ScriptTestTest extends \Test\AbstractTest {
    /**
     * @throws Exception\AuthException
     * @throws Exception\BasicException
     */
    public function testItems() {
        $handler = $this->_createMockResponse($this->_getSavedResponse('Calltracking/ScriptList'));
        $this->_roistat->addMockHandler($handler);
        $scripts = $this->_roistat->Calltracking()->Script()->items();
        $this->assertSame(1, count($scripts));

        $script = $scripts[0];
        $this->assertSame(1, $script->getId());
        $this->assertSame('Базовый сценарий', $script->getName());
        $this->assertSame('2016-10-12T08:19:23+0000', $script->getCreationDate());
        $this->assertSame(1, $script->getIsEnabled());
        $this->assertSame(0, $script->getCallCount());
        $this->assertSame(90, $script->getAccuracy());
        $this->assertSame(1, $script->getNeededPhoneCount());
        $options = $script->getOptions();
        $this->assertSame('dynamic', $options->getCalltrackingType());
        $this->assertSame('test', $options->getStaticSource());
        $this->assertSame(['test'], $options->getCssSelector());
        $this->assertSame('8 (XXX) XXX-XX-XX', $options->getPhoneFormat());
        $this->assertSame(0, $options->getTargetCallTime());
        $this->assertSame([['source', 'like%', 'organic']], $options->getSegments());
        $redirect = $options->getRedirect();
        $this->assertSame('phone', $redirect->getType());
        $this->assertSame('74951234567', $redirect->getValue());
        $integration = $script->getIntegration();
        $this->assertSame('1', $integration->getIsLeadAutoCreate());
        $crm = $integration->getCrm();
        $this->assertSame(1, $crm->getEnabled());
        $custom_field = $crm->getCustomFields()[0];
        $this->assertSame('UF_CRM_12345', $custom_field->getId());
        $this->assertSame('text', $custom_field->getType());
        $this->assertSame('eee', $custom_field->getValue());
        $webhook = $integration->getWebhook();
        $this->assertSame('site.ru/webhook.php', $webhook->getUrl());
        $webhookStart = $integration->getWebhookStart();
        $this->assertSame('site.ru/webhook2.php', $webhookStart->getUrl());
        $googleAnalytics = $integration->getGoogleAnalytics();
        $this->assertSame('UA-123123-123', $googleAnalytics->getTrackingId());
        $this->assertSame('call', $googleAnalytics->getAction());
        $this->assertSame('phone', $googleAnalytics->getCategory());
        $this->assertSame('roistat', $googleAnalytics->getLabel());
    }
}