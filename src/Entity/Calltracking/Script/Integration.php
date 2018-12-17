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
    protected $crm;
    /** @var Integration\Webhook */
    protected $webhook;
    /** @var Integration\GoogleAnalytics */
    protected $google_analytics;
    /** @var Integration\Webhook */
    protected $webhook_start;

    /**
     * Integration constructor.
     * @param array $data
     */
    public function __construct(array $data = []) {
        parent::__construct($data);
        if ($this->crm !== null) $this->crm = new Integration\Crm($this->crm);
        if ($this->webhook !== null) $this->webhook = new Integration\Webhook($this->webhook);
        if ($this->webhook_start !== null) $this->webhook_start = new Integration\Webhook($this->webhook_start);
        if ($this->google_analytics !== null) $this->google_analytics = new Integration\GoogleAnalytics($this->google_analytics);
    }
}