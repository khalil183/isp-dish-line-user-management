<?php

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('customer','ClientController');
Route::resource('year','YearController');
Route::resource('month','MonthController');
Route::resource('payment','PaymentController');
// monthly Payment history
Route::get('monthly-payment','PaymentController@monthlyPayment')->name('monthly.payment');
Route::post('search-monthly-payment','PaymentController@searchMonthlyPayment');
// yearly payment history
Route::get('yearly-payment','PaymentController@yearlyPayment')->name('yearly.payment');
Route::post('search-yearly-payment','PaymentController@searchYearlyPayment');

// Report section
// monthly Report
Route::get('monthly-report','ReportController@monthlyReport')->name('monthly.report');
Route::post('search-monthly-report','ReportController@searchMonthlyReport');
// Yearly report
Route::get('yearly-report','ReportController@yearlyReport')->name('yearly.report');
Route::post('search-yearly-report','ReportController@searchYearlyReport');

// Due Management
Route::get('customer-due','DueController@index')->name('customer.due');
Route::post('yearly-customer-due','DueController@yearlyCustomerDue')->name('yearly.customer.due');
