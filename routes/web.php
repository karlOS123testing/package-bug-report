<?php

use ProcessMaker\Package\PackageBugReport\Http\Controllers\PackageBugReportController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin/package-bug-report', [PackageBugReportController::class, 'index'])->name('package.bug-report.index');
    Route::get('package-bug-report', [PackageBugReportController::class, 'index'])->name('package.bug-report.tab.index');
});
