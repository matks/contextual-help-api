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

class PageInfos
{
    public const PAGE_TYPE_HTML = 'html';
    public const PAGE_TYPE_JSON = 'json';

    public function __construct(
        private int $pageId,
        private string $controller,
        private string $language,
        private string $pageType = self::PAGE_TYPE_HTML,
        private ?string $callback = null
    ) {
    }

    public function getPageId(): int
    {
        return $this->pageId;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getPageType(): string
    {
        return $this->pageType;
    }

    public function getCallback(): ?string
    {
        return $this->callback;
    }
}
