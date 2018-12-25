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
 * @method Options setCalltrackingType(string $value)
 * @method Options setCssSelector(string[] $values)
 * @method Options setSegments(array $values)
 * @method Options setPhoneFormat(string $value)
 * @method Options setRedirect(Options\Redirect $redirect)
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
     * @param string $name
     * @return array
     */
    protected function _getPropertySettings($name) {
        switch($name) {
            case 'redirect':
                return ['class' => Options\Redirect::getClass(), 'is_multiple' => false];
                break;
        }
        return null;
    }
}