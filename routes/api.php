<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Statuses
    Route::apiResource('statuses', 'StatusesApiController');

    // Contracts
    Route::post('contracts/media', 'ContractApiController@storeMedia')->name('contracts.storeMedia');
    Route::apiResource('contracts', 'ContractApiController');

    // Ndas
    Route::post('ndas/media', 'NdasApiController@storeMedia')->name('ndas.storeMedia');
    Route::apiResource('ndas', 'NdasApiController');

    // Comments
    Route::apiResource('comments', 'CommentApiController');

    // Licenses
    Route::post('licenses/media', 'LicenseApiController@storeMedia')->name('licenses.storeMedia');
    Route::apiResource('licenses', 'LicenseApiController');

    // Currencies
    Route::apiResource('currencies', 'CurrencyApiController');

    // Transaction Types
    Route::apiResource('transaction-types', 'TransactionTypeApiController');

    // Income Sources
    Route::apiResource('income-sources', 'IncomeSourceApiController');

    // Client Statuses
    Route::apiResource('client-statuses', 'ClientStatusApiController');

    // Project Statuses
    Route::apiResource('project-statuses', 'ProjectStatusApiController');

    // Clients
    Route::apiResource('clients', 'ClientApiController');

    // Projects
    Route::apiResource('projects', 'ProjectApiController');

    // Notes
    Route::apiResource('notes', 'NoteApiController');

    // Documents
    Route::post('documents/media', 'DocumentApiController@storeMedia')->name('documents.storeMedia');
    Route::apiResource('documents', 'DocumentApiController');

    // Transactions
    Route::apiResource('transactions', 'TransactionApiController');

    // Vendors
    Route::apiResource('vendors', 'VendorsApiController');
});
