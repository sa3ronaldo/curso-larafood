<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * ADMIN GESTÃO DE PLANOS
 * */
Route::get('admin/plans/create', 'Admin\PlanController@create')->name('plans.create');// Criar Novo PLano
Route::get('admin/plans/{url}', 'Admin\PlanController@show')->name('plans.show');// Visualizar pagina Plano


Route::get('admin/plans/{url}/edit', 'Admin\PlanController@edit')->name('plans.edit');// Editar um plano
Route::put('admin/plans/{url}', 'Admin\PlanController@update')->name('plans.update');// Editar um plano UPDADE

Route::any('admin/plans/search', 'Admin\PlanController@search')->name('plans.search');// Visualizar pagina Plano

Route::get('admin/plans/remover/{url}', 'Admin\PlanController@destroy')->name('plans.destroy');// Visualizar pagina Plano


Route::post('admin/plans', 'Admin\PlanController@store')->name('plans.store');// Salvar o plano no banco

Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index'); // Rota de plano

Route::any('admin/', 'Admin\PlanController@search')->name('admin.home');// Visualizar pagina Plano

