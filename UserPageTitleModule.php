<?php

/**
 * wt-user-page-title: A webtrees module to personalize the user page title.
 * Copyright (C) 2026 Bill Kochman.
 *
 * Based on wt-module-custom-views by BertKoor.
 * https://github.com/bertkoor/wt-module-custom-views
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details:
 * <https://www.gnu.org/licenses/>
 */

namespace BillKochman\WtModule\UserPageTitle;

use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\View;

use function is_dir;
use function is_readable;
use function scandir;
use function str_ends_with;
use function str_replace;
use function str_starts_with;

class UserPageTitleModule extends AbstractModule implements ModuleCustomInterface
{
    use ModuleCustomTrait;

    const GITHUB_USER = 'billkochman';
    const GITHUB_REPO = 'wt-user-page-title';
    const THIS_VERSION = '1.0.0';

    public function __construct() { }

    public function title(): string
    {
        return 'User page title';
    }

    public function description(): string
    {
        return 'Personalizes the user page title to display the actual username instead of the generic "My page".';
    }

    public function customModuleAuthorName(): string
    {
        return 'Bill Kochman';
    }

    public function customModuleVersion(): string
    {
        return self::THIS_VERSION;
    }

    public function customModuleLatestVersionUrl(): string
    {
        return 'https://raw.githubusercontent.com/' . self::GITHUB_USER . '/' . self::GITHUB_REPO . '/main/latest-version.txt';
    }

    public function customModuleSupportUrl(): string
    {
        return 'https://github.com/' . self::GITHUB_USER . '/' . self::GITHUB_REPO;
    }

    public function resourcesFolder(): string {
        return __DIR__ . '/resources/';
    }

    public function boot(): void
    {
        $viewsFolder = $this->resourcesFolder() . 'views/';
        View::registerNamespace($this->name(), $viewsFolder);
        $this->scan($viewsFolder);
    }

    private function scan(string $root, string $path = ''): void
    {
        if (is_readable($root . $path)) {
            foreach (scandir($root . $path) as $item) {
                if (is_dir($root . $path . $item) && !str_starts_with($item, '.')) {
                    $this->scan($root, $path . $item . '/');
                } else if (str_ends_with($item, '.phtml') && is_readable($root . $path . $item)) {
                    $viewName = str_replace('.phtml', '', $path . $item);
                    $this->register($viewName);
                }
            }
        }
    }

    private function register(string $viewName): void {
        View::registerCustomView(View::NAMESPACE_SEPARATOR . $viewName, $this->name() . View::NAMESPACE_SEPARATOR . $viewName);
    }
}
