Quick Login for phpBB 3.1
==========

Extension for phpBB 3.1 that adds a simple quick login popup lightbox using JavaScript.

![Screenshot](screenshot.png)

## Features
- Just a simple lightbox popup for quick login actions.
- Changes the behaviour of the normal login button in the header.
- Only activates on pages where there is no normal login form (not when trying to access the UCP for example).

#### Requirements
- phpBB 3.1.0 or higher
- PHP 5.3.3 or higher

#### Languages supported
- No language files included/necessary

#### To do list
- Since JS is required, we might use it position the popup better. The current method uses only CSS, but that has it's limitations.

## Installation
1. [Download the latest release](https://github.com/PayBas/QuickLogin/releases) and unzip it.
2. Copy the entire contents from the unzipped folder to `phpBB/ext/paybas/quicklogin/`.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Find `Quick Login` under "Disabled Extensions" and click `Enable`.

## Uninstallation
1. Navigate in the ACP to `Customise -> Manage extensions`.
2. Click the `Disable` link for `Quick Login`.
3. To permanently uninstall, click `Delete Data`, then delete the `quicklogin` folder from `phpBB/ext/paybas/`.

### License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2014 - PayBas