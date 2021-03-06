<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Wrapper;

use Iterator;

interface AkeneoResourceCursorInterface extends Iterator
{
    /**
     * @return int
     */
    public function getPageSize(): int;
}
