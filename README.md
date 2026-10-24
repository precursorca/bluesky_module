# BlueSky module

> v. 1.1.6 
> October 23, 2026 
> Alex Narvey / Precursor.ca  

![BlueSky Module Report](BlueSky_module.png)
<img src="https://raw.githubusercontent.com/precursorca/bluesky_module/refs/heads/main/Bluesky_tab.png" width="424" height="268">
![BlueSky Module Listing](Bluesky_listing.png)

Reports on BlueSky installs and shows some optional advanced security info.
(see: https://github.com/BlueSkyTools/BlueSkyConnect)

Retrieves information from the preferences file /var/bluesky/preference.plist.
And checks for VNC LocalHost Only and Password Authentication settings.
Setting up VNC Localhost Only would be more secure,
as would turning off Password Authentication in favour of SSH Keys.
The techniques for these methods were provided by Stefan Oberle in the BlueSky Connect Wiki.

Provides clickable links in the Listing page and the Summary Tab for SSH, VNC, and SCP.
The clickable links work well with the Bluesky Admin applescript app. They do not work properly with the newer BlueConnect swift app.
THIS REQUIRES ADDING YOUR BLUESKY INSTANCE INTO THE .ENV FILE:

## example .env file addition:
`BLUESKY_BASE_URL="bluesky.example.com"` (replace bluesky.example.com with the url for your bluesky server).

The following information is stored in the table:

* version - The BlueSky version
* blueskyid - The BlueSky ID #
* VNC Localhost only (you may enable this feature to increase security - see the Wiki)
* Password Authentication (you may turn this off when using SSH keys for added security - see the Wiki)


## Notes

An output file is only created if the preferences file exists in the /var/bluesky folder.
The output file is removed if the preferences file no longer exists so that new records will not be created.

## Updates

* October 23, 2026 Version 1.1.6 Added clickable links for SSH, NVC, and SCP to the listing page and the tab.
* October 22, 2026 Version 1.1.5 Added the Bluesky ID # to the listing.
* November 21, 2025 Version 1.1.4 Improved formatting of client tab.
* August 1, 2025 Version 1.1.3 Improved the VNCLocalOnly Test
* August 1, 2025 Version 1.1.2 Correct API url in new widgets
* August 1, 2025 Version 1.1.1 Corrects a syntax error in the yml of a widget
* July 22, 2025 Version 1.1.0 Added widgets for VNC LocalHost ONLY and Password Authentication based on Advanced techniques suggested in the Wiki by Stefan Oberle
* June 3, 2025 Version 1.0.2 Updated composer json for packagist compatibility.
* July 6, 2021 Version 1.0.1 Correct test for -f file instead of -d directory. 
* April 5, 2021 Version 1.0 

## Contributors
* Alex Narvey

—
Alex Narvey
precursor.ca
