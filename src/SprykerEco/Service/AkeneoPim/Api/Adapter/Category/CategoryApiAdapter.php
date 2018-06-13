<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Service\AkeneoPim\Api\Adapter\Category;

use Akeneo\Pim\ApiClient\AkeneoPimClientInterface;
use SprykerEco\Service\AkeneoPim\Api\Adapter\ApiAdapterInterface;
use SprykerEco\Service\AkeneoPim\Api\Wrapper\WrapperFactoryInterface;

class CategoryApiAdapter implements ApiAdapterInterface
{
    /**
     * @var \Akeneo\Pim\ApiClient\AkeneoPimClientInterface
     */
    protected $akeneoPimClient;

    /**
     * @var \SprykerEco\Service\AkeneoPim\Api\Wrapper\WrapperFactoryInterface
     */
    private $wrapperFactory;

    /**
     * @param \Akeneo\Pim\ApiClient\AkeneoPimClientInterface $akeneoPimClient
     * @param \SprykerEco\Service\AkeneoPim\Api\Wrapper\WrapperFactoryInterface $wrapperFactory
     */
    public function __construct(AkeneoPimClientInterface $akeneoPimClient, WrapperFactoryInterface $wrapperFactory)
    {
        $this->akeneoPimClient = $akeneoPimClient;
        $this->wrapperFactory = $wrapperFactory;
    }

    /**
     * @inheritdoc
     */
    public function get($code)
    {
        return $this->akeneoPimClient
            ->getCategoryApi()
            ->get($code);
    }

    /**
     * @inheritdoc
     */
    public function listPerPage($limit = 10, $withCount = false, array $queryParameters = [])
    {
        $page = $this->akeneoPimClient
            ->getCategoryApi()
            ->listPerPage($limit, $withCount, $queryParameters);

        return $this->wrapperFactory
            ->createAkeneoPage($page);
    }

    /**
     * @inheritdoc
     */
    public function all($pageSize = 10, array $queryParameters = [])
    {
        $resourceCursor = $this->akeneoPimClient
            ->getCategoryApi()
            ->all($pageSize, $queryParameters);

        return $this->wrapperFactory
            ->createAkeneoResourceCursor($resourceCursor);
    }
}