<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/* static page route*/

Route::get('/pages/{title}', [
    'uses' => 'FrontendController@PageByTitle',
    'as' => 'cPages'
]);
/* Sell routes*/
Route::get('/sell', function () {
    return view('frontendviews.includes.sell');
})->name('sell');

Route::Post('/sell-post', [
    'uses' => 'FrontendController@SellPost',
    'as' => 'sell.post'
]);

/* Booking routes*/

Route::Post('/booking-form', [
    'uses' => 'FrontendController@BookProperty',
    'as' => 'bookings'
]);

/* verifying users and sending mails */
Route::get('/verify-user', array(
    'uses' => 'Auth\AuthController@verify',
    'as' => 'verify-user'
));

Route::get('/verify-user/{code}', array(
    'uses' => 'Auth\AuthController@verify',
    'as' => 'verify-user-email'
));

/*search routes*/

Route::get('/search/', [
    'uses' => 'FrontendController@search',
    'as' => 'search'
]);


/* Frontend routes*/
Route::get('/', function () {
    return view('frontendviews.welcome');
});
Route::get('/plotingdetails/{plots}', [
    'uses' => 'FrontendController@plotingDetails',
    'as' => 'plotingdetails'
]);

Route::get('/properties/{id}', [
    'uses' => 'FrontendController@HousesById',
    'as' => 'property.houses'
]);
Route::get('/lands/{id}', [
    'uses' => 'FrontendController@LandById',
    'as' => 'property.land'
]);

Route::get('/flat/{id}', [
    'uses' => 'FrontendController@FlatById',
    'as' => 'property.flat'
]);


Route::get('/room/{id}', [
    'uses' => 'FrontendController@roomById',
    'as' => 'property.room'
]);


Route::get('/lands/{id}', [
    'uses' => 'FrontendController@LandById',
    'as' => 'property.land'
]);

Route::get('/our/team/details', function () {
    return view('frontendviews.includes.our_team');
}
)->name('our_team');


/* pagination */

Route::get('/listhouses', function (\App\houses $house) {
    $houses = $house->orderBy('created_at', 'DESC')->paginate(3);
    return view('frontendviews.listHouses', ['houses' => $houses]);

})->name('AllHouses');

Route::get('/listland', function (\App\lands $land) {
    $lands = $land->orderBy('created_at', 'DESC')->paginate(3);
    return view('frontendviews.listLand', ['lands' => $lands]);
})->name('AllLands');

Route::get('/listrooms', function (\App\rooms $room) {
    $rooms = $room->orderBy('created_at', 'DESC')->paginate(3);
    return view('frontendviews.listRooms', ['rooms' => $rooms]);
})->name('AllRooms');

Route::get('/listflats', function (\App\flats $flat) {
    $flats = $flat->orderBy('created_at', 'DESC')->paginate(3);
    return view('frontendviews.listFlats', ['flats' => $flats]);
})->name('AllFlats');


//Route::group(['middleware' => 'web'], function () {
//
//
//Route::auth();
//Route::post('login', function () {
//    $credentials = Request::only('email', 'password');
//
//    if (!Auth::attempt($credentials)) {
//        return Redirect::back()->withMessage('Invalid credentials');
//    }
//
//    if (Auth::user()->user_type_id == 1) {
//        return Redirect::to('/dashboard');
//    }
//
//    return Redirect::to('/');
//});

Route::group(['middleware' => ['web']], function () {

    Route::auth();
    Route::group(['middleware' => ['admin']], function () {
    Route::get('/home', 'HomeController@index');

    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    /* Banners routes */

    Route::get('/banners', [
        'uses' => 'BannerController@AllBanners',
        'as' => 'banners'
    ]);

    Route::get('/create/banners/details', function () {
        return view('pages.create_banners');
    }
    )->name('add_banners');

    Route::post('/create/rooms', [
        'uses' => 'BannerController@CreateBanners',
        'as' => 'create_banners'
    ]);

    Route::get('/banner/edit/{id}', [
        'uses' => 'BannerController@BannersEdit',
        'as' => 'edit.banners'
    ]);

    Route::get('/banner/delete/{id}', [
        'uses' => 'BannerController@BannersDelete',
        'as' => 'delete.banners'
    ]);

    Route::post('/banner/updated/', [
        'uses' => 'BannerController@BannersUpdate',
        'as' => 'banner.update'
    ]);


    /* retrieving data when admin clicks pages in admin page */

    Route::get('/pages', [
        'uses' => 'PagesController@pages',
        'as' => 'pages'
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'PagesController@PageEdit',
        'as' => 'edit'
    ]);
    Route::get('/delete/{id}', [
        'uses' => 'PagesController@PageDelete',
        'as' => 'delete'
    ]);
    /* Adding pages */

    Route::get('/add_pages', function () {
        $pages = \App\Pages::lists("title", "id");
        //dd($pages);
        return view('pages.form', compact("pages"));
    })->name('add_pages');


    Route::post('/store_pages', [
        'as' => 'page-store',
        'uses' => 'PagesController@PageAdd'
    ]);


    /* updating pages */

    Route::post('/update_page', [
        'uses' => 'PagesController@PageUpdate',
        'as' => 'page.update'
    ]);

    /* Testimonials */

    Route::get('/testimonials', [
        'uses' => 'TestController@AllTestimonials',
        'as' => 'testimonials'
    ]);

    Route::get('/create_testimonials', function () {
        return view('pages.create_testimonials');
    }
    )->name('form.testimonial');

    Route::post('/testimonials', [
        'uses' => 'TestController@CreateTestimonials',
        'as' => 'create.testimonials'
    ]);

    Route::get('/edit_testimonials/{id}', [
        'uses' => 'TestController@TestEdit',
        'as' => 'testimonial.edit'
    ]);

    Route::get('/delete_testimonials/{id}', [
        'uses' => 'TestController@TestDelete',
        'as' => 'testimonial.delete'
    ]);

    Route::post('/updated_testimonials', [
        'uses' => 'TestController@TestUpdate',
        'as' => 'test.update'
    ]);

    /* Flats routes */

    Route::get('/flats', [
        'uses' => 'FlatsController@AllFlats',
        'as' => 'flats'
    ]);

    Route::get('/create_flats', function () {
        return view('pages.create_flats');
    }
    )->name('add_flats');

    Route::post('/flats-added', [
        'uses' => 'FlatsController@CreateFlats',
        'as' => 'create_flats'
    ]);

    Route::get('/flats_edit/{id}', [
        'uses' => 'FlatsController@FlatsEdit',
        'as' => 'edit.flat'
    ]);

    Route::get('/flats_delete/{id}', [
        'uses' => 'FlatsController@FlatsDelete',
        'as' => 'delete.flat'
    ]);

    Route::post('/flats_updated/', [
        'uses' => 'FlatsController@FlatUpdate',
        'as' => 'flat.update'
    ]);

    /* Houses Routes */

    Route::get('/houses', [
        'uses' => 'HousesController@AllHouses',
        'as' => 'houses'
    ]);

    Route::get('/create_houses', function () {
        return view('pages.create_houses');
    }
    )->name('add_house');

    Route::post('/houses_create/', [
        'uses' => 'HousesController@CreateHouses',
        'as' => 'create_houses'
    ]);

    Route::get('/house_delete/{id}', [
        'uses' => 'HousesController@HousesDelete',
        'as' => 'delete.house'
    ]);

    Route::get('/house_edit/{id}', [
        'uses' => 'HousesController@HousesEdit',
        'as' => 'edit.house'
    ]);

    Route::post('/house_updated/', [
        'uses' => 'HousesController@HousesUpdate',
        'as' => 'house.update'
    ]);

    /* Lands routes */

    Route::get('/lands', [
        'uses' => 'LandController@AllLands',
        'as' => 'lands'
    ]);

    Route::get('/create_lands', function () {
        return view('pages.create_lands');
    }
    )->name('add_land');

    Route::post('/lands_create/', [
        'uses' => 'LandController@CreateLands',
        'as' => 'create_lands'
    ]);

    Route::get('/land_delete/{id}', [
        'uses' => 'LandController@LandDelete',
        'as' => 'delete.land'
    ]);

    Route::get('/land_edit/{id}', [
        'uses' => 'LandController@LandEdit',
        'as' => 'edit.land'
    ]);

    Route::post('/land_update/', [
        'uses' => 'LandController@LandUpdate',
        'as' => 'land.update'
    ]);


    /* Ploting Routes */

    Route::get('/plots', [
        'uses' => 'PlotingController@AllPlots',
        'as' => 'plots'
    ]);

    Route::get('/create_plots', function () {
        return view('pages.create_plots');
    }
    )->name('add_plots');

    Route::post('/plots_create/', [
        'uses' => 'PlotingController@CreatePlots',
        'as' => 'create_plots'
    ]);

    Route::get('/plot_delete/{id}', [
        'uses' => 'PlotingController@PlotsDelete',
        'as' => 'delete.plot'
    ]);

    Route::get('/plot_edit/{id}', [
        'uses' => 'PlotingController@PlotsEdit',
        'as' => 'edit.plot'
    ]);

    Route::post('/plot_updated/', [
        'uses' => 'PlotingController@PlotsUpdate',
        'as' => 'plot.update'
    ]);


    /* Ploting Details Routes*/

    Route::get('/ploting-details', [
        'uses' => 'PlotingDetailsController@AllPlotings',
        'as' => 'ploting_details'
    ]);


    Route::get('/create_ploting.details', function () {
        $plots = \App\plotings::lists("plot", "id");
        return view('pages.create_ploting_details', compact('plots'));
    }
    )->name('add_ploting.details');

    Route::post('/ploting.details_create/', [
        'uses' => 'PlotingDetailsController@CreatePlotings',
        'as' => 'create_ploting'
    ]);

    Route::get('/ploting_edit/{id}', [
        'uses' => 'PlotingDetailsController@PlotingsEdit',
        'as' => 'edit.ploting'
    ]);

    Route::get('/delete/ploting/{id}', [
        'uses' => 'PlotingDetailsController@PlotingsDelete',
        'as' => 'delete.ploting'
    ]);

    Route::post('/ploting_updated/', [
        'uses' => 'PlotingDetailsController@PlotingsUpdate',
        'as' => 'ploting.update'
    ]);


    /* rooms routes*/
    Route::get('/rooms/details', [
        'uses' => 'RoomController@AllRooms',
        'as' => 'room_details'
    ]);

    Route::get('/create/rooms/details', function () {
        return view('pages.create_rooms');
    }
    )->name('add_rooms');

    Route::post('rooms/create', [
        'uses' => 'RoomController@CreateRooms',
        'as' => 'rooms_create'
    ]);

    Route::get('/room/edit/{id}', [
        'uses' => 'RoomController@RoomsEdit',
        'as' => 'edit.rooms'
    ]);

    Route::get('/ploting_delete/{id}', [
        'uses' => 'RoomController@RoomsDelete',
        'as' => 'delete.rooms'
    ]);

    Route::post('/rooms/updated/', [
        'uses' => 'RoomController@RoomsUpdate',
        'as' => 'room.update'
    ]);
    /* Banners routes */

    Route::get('/banners', [
        'uses' => 'BannerController@AllBanners',
        'as' => 'banners'
    ]);

    Route::get('/create/banners/details', function () {
        return view('pages.create_banners');
    }
    )->name('add_banners');

    Route::post('/create/rooms', [
        'uses' => 'BannerController@CreateBanners',
        'as' => 'create_banners'
    ]);

    Route::get('/banner/edit/{id}', [
        'uses' => 'BannerController@BannersEdit',
        'as' => 'edit.banners'
    ]);

    Route::get('/banner/delete/{id}', [
        'uses' => 'BannerController@BannersDelete',
        'as' => 'delete.banners'
    ]);

    Route::post('/banner/updated/', [
        'uses' => 'BannerController@BannersUpdate',
        'as' => 'banner.update'
    ]);

        /* Booking routes*/
        Route::get('/booking/details', [
            'uses' => 'BookingController@AllBookings',
            'as' => 'book'
        ]);

        Route::get('/sale/request/lists', [
            'uses' => 'BookingController@AllSaleRequest',
            'as' => 'sell.request'
        ]);
    });



/* customers routes*/


    Route::get('/customer/dash', function () {
        return view('customers-views.welcome');
    })->name('customer/dash');

    Route::post('/create-houses-by-customers/', [
        'uses' => 'CustomerController@CreateHouses',
        'as' => 'customer_create_houses'
    ]);

    Route::get('/customer/houses', [
        'uses' => 'CustomerController@AllHouses',
        'as' => 'cust_house'
    ]);
    Route::get('/customer/lands', function(){
        return view('customers-views.lists.listlands');
    })->name('cust_lands');

});


