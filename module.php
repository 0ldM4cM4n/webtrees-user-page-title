<?php
/**
 * webtrees module: wt-user-page-title
 * Personalizes the user page title with the actual user's name.
 * 
 * Based on wt-module-custom-views by BertKoor.
 * https://github.com/bertkoor/wt-module-custom-views
 *
 * Copyright (C) 2026 Bill Kochman.
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
declare(strict_types=1);
namespace BillKochman\WtModule\UserPageTitle;
use Composer\Autoload\ClassLoader;

$loader = new ClassLoader();
$loader->addPsr4('BillKochman\\WtModule\\UserPageTitle\\', __DIR__);
$loader->register();

return new UserPageTitleModule();
