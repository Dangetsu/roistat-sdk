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
 * @method self setCalltrackingType(string $value)
 * @method self setCssSelector(string[] $values)
 * @method self setSegments(array $values)
 * @method self setPhoneFormat(string $value)
 * @method self setRedirect(Options\Redirect $redirect)
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
    protected $redirect = 'Options\\Redirect';
    /** @var array */
    protected $segments;
    /** @var int */
    protected $target_call_time;
}