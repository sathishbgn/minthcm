<#
PowerShell helper to start Docker services and build frontend on Windows.
Usage: Open PowerShell as Administrator (if Docker Desktop needs elevated permissions) and run:
  ./scripts/start-dev.ps1
#>

# Stop on error
$ErrorActionPreference = 'Stop'

Write-Host "Starting MintHCM dev environment..." -ForegroundColor Cyan

# Ensure .env exists
if (-not (Test-Path -Path ".env")) {
    Write-Host "No .env found. Copying .env.example to .env (edit values if needed)..." -ForegroundColor Yellow
    Copy-Item .env.example .env
}

# Start docker-compose
Write-Host "Starting docker compose services (detached)..." -ForegroundColor Cyan
docker compose up -d

# Build frontend assets (optional)
if (Test-Path -Path "vue\package.json") {
    Write-Host "Installing frontend dependencies (vue/) and building for repo..." -ForegroundColor Cyan
    Push-Location vue
    npm ci
    npm run build:repo
    Pop-Location
}

Write-Host "Done. Check services with: docker compose ps" -ForegroundColor Green
Write-Host "Use 'docker compose logs -f minthcm-db' or 'docker compose logs -f minthcm-web' to tail logs." -ForegroundColor Green

# Helpful tips
Write-Host "If ElasticSearch fails, ensure Docker Desktop has >= 4GB RAM and (for WSL2) vm.max_map_count=262144 is set on the WSL Linux host." -ForegroundColor Yellow
