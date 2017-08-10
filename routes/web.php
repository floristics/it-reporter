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
    //return view('welcome');
    return redirect('/login');
});

Route::get('/hw', 'FirstController@renderHW');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/php', function () {
    $phpinfo = phpinfo();
    return "$phpinfo";
});

//Вывод по id (id обязательно должен быть primary key)
Route::get('org/{id}', function ($id) {
    $org = App\Organisation::find($id);
    echo $org->name;
});

Route::get('org_inn/{inn}', function ($inn) {
    $org = App\Organisation::where('inn', '=', $inn)->first();
    echo $org->name;
});

//Вывод много -> один
Route::get('deps', function () {
    $deps = App\Departure::all();
    foreach ($deps as $dep){
        $org = App\Organisation::find($dep->organisation_id);
        echo $dep->name .'=>'. $org->name .'<br>';
    }
});

//Вывод много->один
//добавили в модель функцию departure и получили тоже самое что код выше
Route::get('deps2', function () {
    $deps = App\Departure::all();
    foreach ($deps as $dep){
        echo $dep->name .'=>'. $dep->organisation->name .'<br>';
    }
});

//Вывод из массива записей
Route::get('orgs', function () {
    $orgs = App\Organisation::all();
    foreach ($orgs as $org){
        $dep = App\Departure::where('org_id', '=',$org->id)->get();
        echo $org->name .'=>'. $dep[0]->name .'<br>';
    }
});

//Вывод один -> много
Route::get('org-deps/{id_org}', function ($id_org) {
    $org = App\Organisation::find($id_org);
    echo $org->name;
    foreach($org->departures as $dep){
        echo '<li>'. $dep->name;
    }

});

//Вывод через VIEW (простые данные)
Route::get('mypage', function(){
    $data = array(
        'var1'=>'Hamburger',
        'var2'=>'Hot Dog',
        'var3'=>'French Fries',
        'var4'=> App\Organisation::all()
    );
    return view('mypage', $data);
});

//Вывод через CONTROLLER (один -> много)
Route::get('org-deps2/{id_org}', 'OrganisationController@organisation');


//Группа доступа только для привелигированных пользователей.
Route::group(['middleware' => ['admin']], function(){
//AdminMiddleware из уроков

    Route::get('admin', function(){
        echo 'You have access';
    });

});

/*
 * ORM training
 */
Route::get('/train/orm', [
    'as' => 'train.orm',
    'uses' => '\App\Http\Controllers\TrainController@orm',
]);


/*
//CREATE an item
Route::post('test', function(){
    echo print_r($_POST);
});

//Rad an item
Route::get('test', function(){
    echo '<form actuon="test" method="POST">';
    echo '<input type="submit">';
    echo csrf_field();
    echo method_field('DELETE');
    echo '</form>';
});

//Update an item
Route::put('test', function(){
    echo 'We have just updated an item';
});

//Delete an item
Route::delete('test', function(){
    echo 'We have just deleted an item';

});
*/

