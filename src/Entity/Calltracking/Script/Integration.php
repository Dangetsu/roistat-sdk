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
 * @method self setIsLeadAutoCreate(string $value)
 * @method self setCrm(Integration\Crm $crm)
 * @method self setWebhook(Integration\Webhook $webhook)
 * @method self setWebhookStart(Integration\Webhook $webhook)
 * @method self setGoogleAnalytics(Integration\GoogleAnalytics $analytics)
 */
class Integration extends Entity\AbstractEntity {
    /** @var string */
    protected $is_lead_auto_create;
    /** @var Integration\Crm */
    protected $crm = 'Integration\\Crm';
    /** @var Integration\Webhook */
    protected $webhook = 'Integration\\Webhook';
    /** @var Integration\GoogleAnalytics */
    protected $google_analytics = 'Integration\\GoogleAnalytics';
    /** @var Integration\Webhook */
    protected $webhook_start = 'Integration\\Webhook';
}