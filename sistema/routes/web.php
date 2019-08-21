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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

/* empresas */
Route::get('/admin/formEmpresa', 'AdminController@formEmpresa');
Route::post('/admin/cadastroEmpresa', 'AdminController@cadastroEmpresa')->name('admin.cadastro.empresa');

/* certificado */
Route::get('/admin/formCurso','CertificadoController@formCurso');
Route::post('/admin/cadastroCurso','CertificadoController@cadastroCurso')->name('admin.cadastro.curso');

Route::get('/admin/formAluno','CertificadoController@formAluno');
Route::post('/admin/cadastroAluno','CertificadoController@cadastroAluno')->name('admin.cadastro.aluno');

Route::get('/admin/listaAlunoCurso','CertificadoController@listaAlunoCurso');
Route::get('/admin/formAlunoCurso/{id}','CertificadoController@formAlunoCurso')->name('admin.cadastro.incluir.aluno');
Route::post('/admin/cadastroAlunoCurso/{id}','CertificadoController@cadastroAlunoCurso')->name('admin.cadastro.aluno.curso');
