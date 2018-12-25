<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Script;

use Analytics\Entity;

/**
 * @method string getIsLeadAutoCreate()
 * @method Integration\Crm getCrm()
 * @method Integration\Webhook getWebhook()
 * @method Integration\GoogleAnalytics getGoogleAnalytics()
 * @method Integration\Webhook getWebhookStart()
 * @method Integration setIsLeadAutoCreate(string $value)
 * @method Integration setCrm(Integration\Crm $crm)
 * @method Integration setWebhook(Integration\Webhook $webhook)
 * @method Integration setWebhookStart(Integration\Webhook $webhook)
 * @method Integration setGoogleAnalytics(Integration\GoogleAnalytics $analytics)
 */
class Integration extends Entity\AbstractEntity {

    /** @var string */
    protected $is_lead_auto_create;

    /** @var Integration\Crm */
    protected $crm;

    /** @var Integration\Webhook */
    protected $webhook;

    /** @var Integration\GoogleAnalytics */
    protected $google_analytics;

    /** @var Integration\Webhook */
    protected $webhook_start;

    /**
     * @param string $name
     * @return array
     */
    protected function _getPropertySettings($name) {
        switch($name) {
            case 'crm':
                return ['class' => Integration\Crm::getClass(), 'is_multiple' => false];
                break;
            case 'webhook':
                return ['class' => Integration\Webhook::getClass(), 'is_multiple' => false];
                break;
            case 'google_analytics':
                return ['class' => Integration\GoogleAnalytics::getClass(), 'is_multiple' => false];
                break;
            case 'webhook_start':
                return ['class' => Integration\Webhook::getClass(), 'is_multiple' => false];
                break;
        }
        return null;
    }
}