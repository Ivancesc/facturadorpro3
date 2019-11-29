<?php

 
$current_hostname = app(Hyn\Tenancy\Contracts\CurrentHostname::class);

if($current_hostname) {
    Route::domain($current_hostname->fqdn)->group(function () {
        Route::middleware(['auth', 'locked.tenant'])->group(function () {
            
            Route::prefix('documents/not-sent')->group(function() {
                Route::get('', 'DocumentController@index')->name('tenant.documents.not_sent');
                Route::get('records', 'DocumentController@records');
                Route::get('data_table', 'DocumentController@data_table');

            });

            Route::prefix('documents')->group(function() {
                Route::post('pay-constancy/upload', 'DocumentController@upload');
            });

            Route::prefix('series-configurations')->group(function() {

                Route::get('', 'SeriesConfigurationController@index')->name('tenant.series_configurations.index');
                Route::get('records', 'SeriesConfigurationController@records');
                Route::get('tables', 'SeriesConfigurationController@tables');
                Route::post('', 'SeriesConfigurationController@store');
                Route::delete('{record}', 'SeriesConfigurationController@destroy');

            });

            Route::prefix('reports/validate-documents')->group(function() {

                Route::get('', 'ValidateDocumentController@index')->name('tenant.validate_documents.index');
                Route::get('records', 'ValidateDocumentController@records');
                Route::get('data_table', 'ValidateDocumentController@data_table');

            });

        });
    });
}
