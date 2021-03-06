<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Adapter;

use Akeneo\Pim\ApiClient\AkeneoPimClient;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Wrapper\AkeneoResourceCursorInterface;
use SprykerEco\Service\AkeneoPim\Dependencies\External\Api\Wrapper\AkeneoResourcePageInterface;

abstract class AbstractApiAdapter implements ApiAdapterInterface
{
    /**
     * @var \Akeneo\Pim\ApiClient\AkeneoPimClient
     */
    protected $akeneoPimClient;

    /**
     * @param \Akeneo\Pim\ApiClient\AkeneoPimClient $akeneoPimClient
     */
    public function __construct(AkeneoPimClient $akeneoPimClient)
    {
        $this->akeneoPimClient = $akeneoPimClient;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function get($code): array;

    /**
     * {@inheritdoc}
     */
    abstract public function listPerPage($limit = 10, $withCount = false, array $queryParameters = []): AkeneoResourcePageInterface;

    /**
     * {@inheritdoc}
     */
    abstract public function all($pageSize = 10, array $queryParameters = []): AkeneoResourceCursorInterface;
}
