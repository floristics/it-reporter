<?php
/**
 * Дашборд
 */
// Дашборд редактируется в другом месте
/*Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here1.';
	return AdminSection::view($content, 'Рабочий стол');
}]);*/

/**
 * Информация
 */
Route::get('information', [
    'as' => 'admin.information',
    function () {
    $content = 'Define your information here2.';
        //todo Пока без разделения на информацию для админа или юзера
    return AdminSection::view($content, 'Информация');
}]);

/*
 * Характеристики
 */
Route::get('/organisations/about', [
    'as' => 'admin.about',
    'uses' => '\App\Http\Controllers\FirstController@index',
]);
/*
Route::get('/annex/{annex_id}/edit/', [
    'as' => 'admin.annex.edit',
    'uses' => '\App\Http\Controllers\AnnexController@edit',
], function ($annex_id){});

Route::get('/annex/{contract_id}/create', [
    'as' => 'admin.annex.create',
    'uses' => '\App\Http\Controllers\AnnexController@create',
], function ($contract_id){});
*/
Route::group(['middleware' => 'auth'], function()
{
    /**
     * Настройки приложения
     */
    Route::get('app_settings', [
    'as' => 'admin.app_settings',
    'middleware' => 'admin',
    function () {
        $content = 'Settings here.';
        return AdminSection::view($content, 'Настройки приложения');
    }]);
/*
 * В случае редактирования без id организации перенаправление на редактирование своей организации
 */
    Route::get('/organisations/edit', [
        'middleware' => 'user',
        function () {
            if (auth()->user()->isUser()){
                return redirect( url('/home').'/organisations/'.auth()->user()->getOrgId().'/edit' );
            }
            return abort(404);
        }]);

});
