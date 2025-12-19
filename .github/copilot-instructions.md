# MintHCM Copilot Instructions

## Architecture Overview
MintHCM is an open-source Human Capital Management (HCM) system built on SuiteCRM. It consists of:
- **Frontend**: Vue 3 SPA with Vuetify UI, Pinia state management, built with Vite and TypeScript. Located in `vue/` directory, deployed to root `assets/` and `index.html`.
- **API**: PHP 8.2 REST API using Slim framework, Doctrine ORM, and PHP-DI. Located in `api/` directory with PSR-4 autoload under `MintHCM\Api\` namespace.
- **Legacy Core**: Extends SuiteCRM for core CRM/HCM functionality. API routes load `legacy/include/entryPoint.php` for shared logic.
- **Infrastructure**: Docker Compose setup with Apache/PHP container, Percona MySQL, and ElasticSearch 7.9.

Data flows from Vue frontend via Axios HTTP requests to `/api/` endpoints, processed by Slim routes that integrate with legacy SuiteCRM beans and Doctrine entities.

## Key Components
- `api/app/Controllers/`: REST controllers (e.g., `ModuleController.php` handles CRUD for modules like Employees).
- `api/app/Entities/`: Doctrine entities for database mapping.
- `api/modules/`: Module-specific logic (e.g., ACLs in `Employees/EmployeesListACL.php`).
- `vue/src/views/`: Vue components for pages (e.g., employee profiles, dashboards).
- `legacy/`: SuiteCRM core code for authentication, modules, workflows.

## Developer Workflows
- **Setup**: Use `docker/docker-compose.yml` for dev environment. Run `docker-compose up` to start services.
- **API Development**: `cd api/ && composer install` to install PHP deps. Run tests with `composer test` (PHPUnit in `tests/`).
- **Frontend Development**: `cd vue/ && npm install` then `npm run dev` for hot-reload dev server. Build for production with `npm run build:repo` (copies to `../assets/` and root).
- **Database**: Migrations and schema managed via legacy SuiteCRM tools. Use Docker volumes for persistence.
- **Debugging**: API errors logged via PSR-3 logger. Frontend uses Vue DevTools. Check Docker logs with `docker-compose logs`.

## Project Conventions
- **PHP**: PSR-4 autoloading with `MintHCM\` namespaces. Controllers use `BeanFactory` from legacy for SuiteCRM integration. Global config in `api/configs/mint/config.php`.
- **Vue**: TypeScript with ESLint/Prettier. Components in PascalCase (e.g., `MintPanelRecordDetails.vue`). API calls via `vue/src/api/` utilities.
- **Naming**: CamelCase for JS/TS, PascalCase for PHP classes. Module names match SuiteCRM conventions (e.g., `Employees`).
- **Routing**: `.htaccess` routes `/api/*` to `install/index.php`, assets served statically.
- **Testing**: PHPUnit for API in `api/tests/`. No frontend tests specified.
- **Commits**: Follow conventional commits; focus on HCM features like recruitment, time management.

## Integration Points
- **Database**: MySQL via Doctrine ORM and legacy DBAL. ElasticSearch for full-text search (configured in `$mint_config`).
- **Authentication**: Handled by legacy SuiteCRM (sessions, ACLs).
- **External APIs**: Mobile apps (iOS/Android) connect to same API endpoints.
- **File Storage**: Assets and uploads managed via legacy file system.

## Common Patterns
- **API Responses**: JSON with Slim PSR-7. Use `ModuleController` pattern for CRUD: inject repositories, handle requests/responses.
- **Vue Components**: Use composables in `vue/src/composables/` for shared logic. Store state in Pinia stores under `vue/src/store/`.
- **Error Handling**: API throws exceptions caught by middlewares. Frontend shows Vuetify alerts.
- **Customization**: Custom modules in `api/custom/modules/`, custom API in `api/custom/app/`.

Reference: `README.md` for features, `docker/docker-compose.yml` for services, `api/composer.json` for deps.