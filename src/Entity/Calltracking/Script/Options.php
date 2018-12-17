<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\Calltracking\Script;

use Analytics\Entity;

/**
 * @method string getCalltrackingType()
 * @method string getStaticSource()
 * @method string[] getCssSelector()
 * @method string getPhoneFormat()
 * @method Options\Redirect getRedirect()
 * @method array getSegments()
 * @method int getTargetCallTime()
 */
class Options extends Entity\AbstractEntity {
    /** @var string */
    protected $calltracking_type;
    /** @var string */
    protected $static_source;
    /** @var string[] */
    protected $css_selector;
    /** @var string */
    protected $phone_format;
    /** @var Options\Redirect */
    protected $redirect;
    /** @var array */
    protected $segments;
    /** @var int */
    protected $target_call_time;

    /**
     * Options constructor.
     * @param array $data
     */
    public function __construct(array $data = []) {
        parent::__construct($data);
        if ($this->redirect !== null) $this->redirect = new Options\Redirect($this->redirect);
    }
}