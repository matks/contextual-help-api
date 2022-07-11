<?php
/**
 * This file is authored by PrestaShop SA and Contributors <contact@prestashop.com>
 *
 * It is distributed under MIT license, since 2021.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Help\PrestaShop;

use Help\PrestaShop\Http\HttpClient;
use Throwable;

class DocContentProvider implements ContentProviderInterface
{
    protected HttpClient $httpClient;

    protected string $urlPattern;

    /**
     * @var array<string, array>
     */
    protected array $urlOptions;

    /**
     * @param array<string, array> $urlOptions
     */
    public function __construct(HttpClient $httpClient, string $urlPattern, array $urlOptions = [])
    {
        $this->httpClient = $httpClient;
        $this->urlPattern = $urlPattern;
        $this->urlOptions = $urlOptions;
    }

    public function getContentByPageInfos(PageInfos $pageInfos): ?string
    {
        try {
            return $this->httpClient->get(
                str_replace('PAGE_ID', (string) $pageInfos->getPageId(), $this->urlPattern),
                $this->urlOptions
            );
        } catch (Throwable $exception) {
            return null;
        }
    }
}
