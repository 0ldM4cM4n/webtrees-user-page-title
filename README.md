![B&C Mods](https://raw.githubusercontent.com/0ldM4cM4n/webtrees-user-page-title/main/assets/images/B-C-Mods-Logo-02-optimized.png)

# wt-user-page-title
**Version 1.0.0**

This [webtrees](https://www.webtrees.net) module personalizes the user page title by replacing the default generic "My page" heading with the actual name of the logged-in user.

Based on [wt-module-custom-views](https://github.com/bertkoor/wt-module-custom-views) by BertKoor. Credit and thanks to BertKoor for the foundation upon which this module is built.

## Example
Instead of the default:
My page

The page will display one of the following, depending on which version you choose:
This page belongs to John Smith
or
John Smith owns this page

## Features
- ✅ Replaces the generic "My page" heading with the logged-in user's actual name
- ✅ Four display options to suit your preference and language needs
- ✅ Supports multiple languages via Webtrees' built-in translation system
- ✅ No core Webtrees files modified — update safe!

## Compatibility

### webtrees 2.2
This module is developed and tested with webtrees 2.2.6 running under PHP 8.4.

### webtrees 2.1
This module should work with webtrees 2.1.x but has not been explicitly tested.

### webtrees 2.0 and lower
This module **will not work** with webtrees versions lower than 2.1.

## Installation Instructions
1. Download the zip archive of this repository from GitHub.
2. Unzip the archive.
3. Place the entire `wt-user-page-title` folder into the `modules_v4` directory on your server.
4. That's it! Webtrees will automatically detect and load the module.

## Choosing Your Version

This module comes with four different ways to display the user's name on their page.
You need to choose ONE of them. Do not worry — it is very simple to do!

### Step 1 — Decide Which Option Suits Your Site

**Does your Webtrees site use only the English language?**
Then choose either Option 1 or Option 2.

**Does your Webtrees site support multiple languages?**
Then choose either Option 3 or Option 4.

Not sure? Choose Option 3. It works for everyone and is active by default.

### Step 2 — Decide On Your Preferred Wording

* Option 1 and Option 3 will display: **This page belongs to John Smith**
* Option 2 and Option 4 will display: **John Smith owns this page**

Simply pick whichever wording you prefer.

### Step 3 — Open The File And Activate Your Chosen Option

1. Open the file `user-page.phtml` found in the `resources/views/` folder of this module using any plain text editor.
2. Inside the file you will find four options. They look like this:

```php
// Option 1: echo 'This page belongs to ' . Auth::user()->realName();
// Option 2: echo Auth::user()->realName() . ' owns this page';
echo I18N::translate('This page belongs to %s', Auth::user()->realName());
// Option 4: echo I18N::translate('%s owns this page', Auth::user()->realName());
```

3. Option 3 is active by default — it has no `//` at the beginning of the line.
4. To activate a different option, remove the `//` from the beginning of that line.
5. To deactivate the currently active option, add `//` to the beginning of that line.
6. Make sure that ONE and ONLY ONE option has no `//` at the beginning. All others must have `//`.
7. Save the file.

### Example — Activating Option 1 Instead Of Option 3

Before:
```php
// Option 1: echo 'This page belongs to ' . Auth::user()->realName();
// Option 2: echo Auth::user()->realName() . ' owns this page';
echo I18N::translate('This page belongs to %s', Auth::user()->realName());
// Option 4: echo I18N::translate('%s owns this page', Auth::user()->realName());
```

After:
```php
echo 'This page belongs to ' . Auth::user()->realName();
// Option 2: echo Auth::user()->realName() . ' owns this page';
// Option 3: echo I18N::translate('This page belongs to %s', Auth::user()->realName());
// Option 4: echo I18N::translate('%s owns this page', Auth::user()->realName());
```

That is all there is to it! Save the file and reload your Webtrees site to see the change.

> 💡 **Note for experienced administrators:** You are free to modify the wording in any of the four options to suit your preference. However, please be careful with apostrophes. If you make a name possessive (e.g. "John Smith's page"), you must escape the apostrophe with a backslash, like this:
> ```php
> echo 'This is ' . Auth::user()->realName() . '\'s page';
> ```
> Failure to do so will cause a PHP syntax error.

## Known Limitations
This module overrides the `user-page.phtml` view file. If a future Webtrees upgrade changes the core `user-page.phtml`, you may need to manually merge those changes into this module's version. See **Upgrade Safety** above.

## Upgrade Safety
This module overrides only the `user-page.phtml` view file via the module system. No core Webtrees files are modified. Your customization is safe from being overwritten when you upgrade Webtrees.

### In Case Of A Webtrees Upgrade
* Your customized `user-page.phtml` in this module's `resources/views/` folder will not be touched.
* However, the core `user-page.phtml` in Webtrees may have changed.
* Compare the `user-page.phtml.bak` file with the upgraded core version to check for changes.
* If changes were made to the core file, merge them into your customized version accordingly.
* Replace `user-page.phtml.bak` with a fresh copy of the upgraded core file to prepare for the next upgrade.

## Privacy, Telemetry, Tracking
Privacy: yes. Tracking: no.

The module will check for the latest available version whenever the Webtrees Control Panel is opened. It checks a URL on github.com only.

## Credits
* Original module framework: [BertKoor](https://github.com/bertkoor/wt-module-custom-views)
* User page title customization: Bill Kochman with assistance from Claude (Anthropic)

## License
Copyright (C) 2026 Bill Kochman.
Based on work Copyright (C) 2025-2026 BertKoor.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

## Warranty
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details:
https://www.gnu.org/licenses/
