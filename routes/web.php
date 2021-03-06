<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'admin', 'web']], function () {
    
    Route::get('/admin', 'Admin\AdminController@index');
    
    Route::get('/admin/posts/per-page',          'Admin\PostController@perPage')->name('per-page');
    Route::get('/admin/posts/per-category-page', 'Admin\PostController@perCategoryPage')->name('per-category-page');
    Route::get('/admin/posts',                   'Admin\PostController@index');
    Route::get('/admin/posts/create',            'Admin\PostController@create');
    Route::post('/admin/posts',                  'Admin\PostController@store');
    Route::get('/admin/posts/{post}/edit',       'Admin\PostController@edit');
    Route::put('/admin/posts/{post}',            'Admin\PostController@update');
    Route::delete('/admin/posts/{post}',         'Admin\PostController@destroy');
    
    Route::get('/admin/categories',                 'Admin\CategoryController@index');
    Route::get('/admin/categories/create',          'Admin\CategoryController@create');
    Route::post('/admin/categories',                'Admin\CategoryController@store');
    Route::get('/admin/categories/{category}/edit', 'Admin\CategoryController@edit');
    Route::put('/admin/categories/{category}',      'Admin\CategoryController@update');
    Route::delete('/admin/categories/{category}',   'Admin\CategoryController@destroy');

    Route::get('/admin/tags',             'Admin\TagController@index');
    Route::get('/admin/tags/{tag}',       'Admin\TagController@show');
    Route::put('/admin/tags/{tag}',       'Admin\TagController@update');
    Route::get('/admin/tags/{tag}/edit',  'Admin\TagController@edit');
    Route::post('/admin/tags',            'Admin\TagController@store');
    Route::delete('/admin/tags/{tag}',    'Admin\TagController@destroy');
    
    Route::get('/admin/employees',                 'Admin\EmployeeController@index');
    Route::get('/admin/employees/create',          'Admin\EmployeeController@create');
    Route::post('/admin/employees',                'Admin\EmployeeController@store');
    Route::get('/admin/employees/{employee}/edit', 'Admin\EmployeeController@edit');
    Route::put('/admin/employees/{employee}',      'Admin\EmployeeController@update');
    Route::delete('/admin/employees/{employee}',   'Admin\EmployeeController@destroy');
    
    Route::get('/admin/favicon',  'Admin\FaviconController@index');
    Route::post('/admin/favicon', 'Admin\FaviconController@store');
    
    Route::get('/admin/footer',  'Admin\FooterController@index');
    Route::post('/admin/footer', 'Admin\FooterController@store');
    
    Route::get('/admin/users',             'Admin\UserController@index');
    Route::get('/admin/users/{user}/edit', 'Admin\UserController@edit');
    Route::put('/admin/users/{user}',      'Admin\UserController@update');
    Route::delete('/admin/users/{user}',   'Admin\UserController@destroy');
    
    Route::get('/admin/soc-icons',  'Admin\SocIconController@index');
    Route::post('/admin/soc-icons', 'Admin\SocIconController@store');
    
    Route::get('/admin/comments',              'Admin\CommentController@index');
    Route::get('/admin/comments/{post}/edit',  'Admin\CommentController@edit');
    Route::put('/admin/comments/{comment}',    'Admin\CommentController@update');
    Route::delete('/admin/comments/{comment}', 'Admin\CommentController@delete');
});

Route::get('/posts/search', 'PostController@search');

Route::get('/',                       'PostController@index');
Route::get('/about-us',               'EmployeeController@index');
Route::get('/portfolio',              'PortfolioController@index');
Route::post('/about-us/post',         'EmployeeController@store');
Route::get('/{category}',             'CategoryController@index');
Route::get('/posts/{post}',           'PostController@show')->name('posts');
Route::post('/posts/{post}/comments', 'CommentController@store');

Route::get('/posts/tags/per-tag-page','TagController@perTagPage')->name('per-tag-page');
Route::get('/posts/tags/{tag}',       'TagController@index');
