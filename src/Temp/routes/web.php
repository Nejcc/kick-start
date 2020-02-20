
Route::get('locale/{id}/{locale}/{name}', function ($id, $locale, $name) {
    Session::put('locale_id', $id);
    Session::put('locale_code', $locale);
    Session::put('locale', $name);
    Carbon::setLocale($locale);
    return redirect()->back();
})->name('locale');

//check middleware can method on AppServiceProvider to see all GATES
//Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
//
//});
