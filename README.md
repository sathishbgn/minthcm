<p align="center">
    <a href="https://minthcm.org/" target="_blank">
        <img width="25%" src="https://minthcm.org/minthcm-logo.svg" alt="MintHCM logo">
    </a>
</p>
<br/>
<p align="center">
    <a href="https://github.com/minthcm/minthcm/blob/master/LICENSE" target="_blank">
        <img src="https://img.shields.io/github/license/minthcm/minthcm.svg" alt="GitHub license">
    </a>
    <a href="https://github.com/minthcm/minthcm/releases" target="_blank">
        <img src="https://img.shields.io/github/tag/minthcm/minthcm.svg" alt="GitHub tag (latest SemVer)">
    </a>
</p>

[minthcm.org](https://minthcm.org/) is a free and open-source tool for Human Capital Management. 

## Main features:

* recruitment
* time management
* onboarding & offboarding
* calendar
* leave management
* resources booking
* travel & expenses
* workplace management
* analytics
* roles & permissions management
* job descriptions
* employer branding
* employee profiles
* competences & skills
* employment history
* employee evaluations
* [iOS](https://apps.apple.com/pl/app/minthcm/id1622342256) & [Android](https://play.google.com/store/apps/details?id=com.minthcm.mobile&hl=en&gl=US) mobile apps

Mint based on two popular, well-known business applications: SugarCRM Community Edition and SuiteCRM. This is why we often say that **MintHCM is CRM reinvented**. You all know how much goes into technological development of this type of business software… 

<br/>

**That's why we need your help.**

<br/>

Thanks to the open code of both SugarCRM CE and SuiteCRM we were able to reintroduce some features, redesign other, and provide brand new system to the users. The code of MintHCM remains open so feel free to use it

<br/>

<img src="https://minthcm.org/wp-content/uploads/2023/11/MintHCM4-gif.gif">

This repository contains a source code of MintHCM system.

## Installation 🖥

The installation process is described in this guide: [minthcm.org/support/minthcm-installation-guide/](https://minthcm.org/support/minthcm-installation-guide/)

### Quick Windows setup (dev)

1. Install prerequisites: Docker Desktop (WSL2 backend), Git, Node 18.x+, npm, Composer + PHP 8.2 for local dev.
2. Copy `.env.example` to `.env` and edit values (e.g., `WEB_PORT`, `MYSQL_PASSWORD`).
3. Start services: `docker compose up -d` from repo root.
4. Frontend (optional dev): `cd vue && npm ci && npm run dev` for hot-reload; `npm run build:repo` to build and copy assets to `assets/`.
5. API tests: `cd api && composer install && composer test` (or run composer/phpunit inside the web container).

Notes:
- ElasticSearch requires Docker Desktop memory >= 4GB and (for WSL2) vm.max_map_count=262144 set on the Linux host.
- The `scripts/start-dev.ps1` helper will copy `.env.example` to `.env`, start docker compose, and build frontend assets on Windows.

## API 🧩

MintHCM is based on SuiteCRM, so the API is very similar. However there are a few important differences, that we covered in this guide: [minthcm.org/support/how-to-use-mint-api/](https://minthcm.org/support/how-to-use-mint-api/)

## Community and Contributions 🤝

Be part of the conversation. Join our [Discord server](https://discord.gg/zHu8AfCEVb)

If you're willing to help, **fork a repo**, make some changes, and then create Pull Request!

## i18n 🌐

You can download and contribute your own translation packages via our [Crowdin project](https://crowdin.com/project/minthcm)

## Do you have a problem? Maybe you'd like to ask us about something? ❌


*  ❓  If you are looking for help, create a new topic on our [forum](https://minthcm.org/support/). 

*  🐛 If you found a bug, create a new issue on the [GitHub](https://github.com/minthcm/minthcm/issues).

## Requirements 💻

MintHCM requirements:
* **Linux** or **Windows** machine running Apache2
* PHP 8.0
* MySQL 8.0 or MariaDB 10.5, 10.6, 10.10, 10.11
* ElasticSearch 7.9
* All web browsers with Chromium and Firefox are supported by MintHCM. <br> Unfortunately, it doesn't support IE 😭 

## License 🌐

The MintHCM is released under the under terms of the [GNU Affero General Public License Version 3](LICENSE).

## Project Road Map

https://github.com/minthcm/minthcm/wiki/Road-Map
