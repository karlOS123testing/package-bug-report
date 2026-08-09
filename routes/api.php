<?php

use ProcessMaker\Package\PackageBugReport\Http\Controllers\PackageBugReportController;

Route::group(['middleware' => ['auth:api', 'bindings']], function () {
    Route::get('admin/package-bug-report/fetch', [PackageBugReportController::class, 'fetch'])->name('package.bug-report.tab.fetch');
    Route::apiResource('admin/package-bug-report', PackageBugReportController::class);
});
