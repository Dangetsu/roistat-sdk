<?php
/**
 * @author Vladislav Alatorcev(Dangetsu) <clannad.business@gmail.com>
 */

namespace Analytics\Entity\OrderAdd;

use Analytics\Entity;

/**
 * @method int getUploaded()
 * @method int getProcessed()
 * @method int getSkippedByStatus()
 * @method int getSkippedByWaitingVisitInfo()
 * @method int getSkippedByInternalError()
 * @method int getSkippedBecauseNotChanged()
 * @method int getSkippedByInvalidFormat()
 * @method string getComment()
 * @method int getSaved()
 */
class Response extends Entity\AbstractEntity {
    /** @var int */
    protected $uploaded;
    /** @var int */
    protected $processed;
    /** @var int */
    protected $skipped_by_status;
    /** @var int */
    protected $skipped_by_waiting_visit_info;
    /** @var int */
    protected $skipped_by_internal_error;
    /** @var int */
    protected $skipped_because_not_changed;
    /** @var int */
    protected $skipped_by_invalid_format;
    /** @var string */
    protected $comment;
    /** @var int */
    protected $saved;
}