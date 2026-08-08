# Processmaker Package Bug Report
This package provides the necessary base code to start the developing a package in ProcessMaker 4.

## Development
If you need to create a new ProcessMaker package run the following commands:

```
git clone https://github.com/ProcessMaker/package-bug-report.git
cd package-bug-report
php rename-project.php package-bug-report
composer install
npm install
npm run dev
```

## Installation
* Use `composer require processmaker/package-bug-report` to install the package.
* Use `php artisan package-bug-report:install` to install generate the dependencies.

## Navigation and testing
* Navigate to administration tab in your ProcessMaker 4
* Select `Skeleton Package` from the administrative sidebar

## Uninstall
* Use `php artisan package-bug-report:uninstall` to uninstall the package
* Use `composer remove processmaker/package-bug-report` to remove the package completely
