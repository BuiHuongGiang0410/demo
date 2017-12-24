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


Route::get('schema/create',function(){
	Schema::create('a',function($table){
	   $table->increments('id') ;
	   $table->string('thu');
	   $table->timestamps();
	});
});

Route::get('id/{id}',function($id){
	echo "$id";
});

//ÃÂÃÂÃÂÃÂÃÂÃÂ¡ÃÂÃÂ»ÃÂÃÂi tÃÂÃÂÃÂÃÂªn bÃÂÃÂ¡ÃÂÃÂºÃÂÃÂ£ng tÃÂÃÂ¡ÃÂÃÂ»ÃÂÃÂ« nameTable -> renameTable
Route::get('schema/rename/{nameTable}/{renameTable}',function($nameTable,$renameTable){
   Schema::rename("$nameTable","$renameTable"); 
});

//XÃÂÃÂÃÂÃÂ³a bÃÂÃÂ¡ÃÂÃÂºÃÂÃÂ£ng
Route::get('schema/drop/{nameTable}',function($nameTable){
     Schema::dropIfExists("$nameTable"); 
});

//LÃÂÃÂ¡ÃÂÃÂºÃÂÃÂ¥y tÃÂÃÂÃÂÃÂ¡t cÃÂÃÂ¡ÃÂÃÂºÃÂÃÂ£ dÃÂÃÂ¡ÃÂÃÂ»ÃÂÃÂ¯ liÃÂÃÂ¡ÃÂÃÂ»ÃÂÃÂu
Route::get('getAll/{nameTable}',function($nameTable){
    $data = DB::table("$nameTable")->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('getName/{nameTable}',function($nameTable){
    $data = DB::table("$nameTable")->select('nameType')->get();
    echo "<pre>";
    return Response::json($data);
    echo "</pre>";
});

//API 2
Route::get('getEating/idType/{idType}',function($idType){
    $data = DB::table('eating')->where('idType',"$idType")->select('id','name','image')->get();
    return Response::json($data);
});
Route::get('getEating/sth',function(){
    $data = DB::table('eating')->select('material','making','tips')->get();
    return Response::json($data);
});
Route::get('getEating/content/{id}',function($id){
    $data = DB::table('eating')->where('id',"$id")->select('material','making','tips','idType')->get();
    return Response::json($data);
});
Route::get('getEating/like/{like}',function($like){
    $data = DB::table('eating')->where('name','like',"%$like%")->select('id','name','image')->get();
    return Response::json($data);
});



//API 1
Route::get('getType',function(){
    $data = DB::table('type')->get();
    return Response::json($data);
    
});

//API 3
Route::get('getEating/id/{id}',function($id){
    $data = DB::table('eating')->where("id","$id")->get();
    return Response::json($data);
    
});

Route::get('getEating/id/making/{id}',function($id){
    $data = DB::table('eating')->where("id","$id")->select('making')->get();
    return Response::json($data);
    
});

Route::get('getEating/id/image/{id}',function($id){
    $data = DB::table('eating')->where("id","$id")->select('image')->get();
    return Response::json($data);
    
});

Route::get('getType/count',function(){
    $data = DB::table('type')->select("idType","count")->get();
    return Response::json($data);
    
});


