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


// Route::get('/','WebpagesController@index');

Auth::routes();
//must use this route prefixes to be more organized
Route::group(['prefix'=>'administrator/'],function(){
    
    Route::resource('/dashboard','AdminDashboardController');
    Route::get('/register','LoginControllers\AdminLoginController@showRegister');
    Route::post('/register','LoginControllers\AdminLoginController@register');
    //Maintenance Routes
    Route::group(['prefix'=>'maintenance/'],function(){
        //Dashboard Components
        //Maintenance Resource
        Route::resource('/berth','BerthController');
        Route::post('/berth/store','BerthController@store');
        Route::post('/berth/update','BerthController@update');
        Route::get('/berth/{intBerthID}/edit','BerthController@edit');
        Route::get('/berth/{intBerthID}/delete','BerthController@delete');
        Route::get('/berth/{intBerthID}/destroy','BerthController@destroy');
        
        Route::resource('/pier','PierController');
        Route::post('/pier/store','PierController@store');
        Route::post('/pier/update','PierController@update');
        Route::get('/pier/{intPierID}/edit','PierController@edit');
        Route::get('/pier/{intPierID}/delete','PierController@delete');
        Route::get('/pier/{intPierID}/destroy','PierController@destroy');
        
        Route::resource('/position','PositionController');
        Route::post('/position/store','PositionController@store');
        Route::post('/position/update','PositionController@update');
        Route::get('/position/{intPositionID}/get','PositionController@get');
        Route::get('/position/{intPositionID}/delete','PositionController@delete');
        Route::get('/position/{intPositionID}/destroy','PositionController@destroy');
        
        Route::resource('/employees','EmployeesController');
        Route::post('/employees/store','EmployeesController@store');
        Route::post('/employees/update','EmployeesController@update');
        Route::get('/employees/{intEmployeeID}/edit','EmployeesController@edit');
        Route::get('/employees/{intEmployeeID}/delete','EmployeesController@delete');
        Route::get('/employees/{intEmployeeID}/destroy','EmployeesController@destroy');
        
        Route::resource('/goods','GoodsController');
        Route::post('/goods/store','GoodsController@store');
        Route::post('/goods/update','GoodsController@update');
        Route::get('/goods/{intGoodsID}/edit','GoodsController@edit');
        Route::get('/goods/{intGoodsID}/delete','GoodsController@delete');
        Route::get('/goods/{intGoodsID}/destroy','GoodsController@destroy');

        Route::resource('/tugboattype','TugboatTypeController');
        Route::post('/tugboattype/store','TugboatTypeController@store');
        Route::post('/tugboattype/update','TugboatTypeController@update');
        Route::get('/tugboattype/{intTugboatTypeID}/edit','TugboatTypeController@edit');
        Route::get('/tugboattype/{intTugboatTypeID}/delete','TugboatTypeController@delete');
        Route::get('/tugboattype/{intTugboatTypeID}/destroy','TugboatTypeController@destroy');
        
        Route::resource('/tugboat','TugboatController');
        Route::post('/tugboat/store','TugboatController@store');
        Route::post('/tugboat/pictures','TugboatController@updatePictures');
        Route::post('/tugboat/maininfo','TugboatController@updateMain');
        Route::post('/tugboat/specifications','TugboatController@updateSpecs');
        Route::post('/tugboat/classification','TugboatController@updateClass');
        Route::get('/tugboat/{intTugboatMainID}/please','TugboatController@please');
        Route::get('/tugboat/{intTugboatMainID}/delete','TugboatController@delete');
        Route::get('/tugboat/{intTugboatMainID}/destroy','TugboatController@destroy');
        
        Route::resource('/quotations','QuotationsController');
        Route::post('/quotations/store','QuotationsController@store');
        Route::post('/quotations/update','QuotationsController@update');
        Route::get('/quotations/{intQuotationID}/show','QuotationsController@show');
        Route::get('/quotations/{intQuotationID}/edit','QuotationsController@edit');
        Route::get('/quotations/{intQuotationID}/delete','QuotationsController@delete');
        
        // Good as Deleted for Next Update
        // Route::resource('/insurances','InsurancesController');
        // Route::resource('/usertype','UsertypeController');
        // Route::resource('/standard','StandardController');
        // Route::resource('/termsandcondition','TermsandConditionsController');
        // Route::resource('/agreements','AgreementsController');
        //Maintenance Create / Store to Database
        // Route::post('/usertype/store','UsertypeController@store');
        // Route::post('/insurances/store','InsurancesController@store');
        // Route::post('/standard/store','StandardController@store');
        // Route::post('/termsandcondition/store','TermsandConditionsController@store');
        // Route::post('/agreements/store','AgreementsController@store');
        
        //Maintenance Edit (JSON Data Render)
        // Route::get('/insurances/{intInsuranceID}/edit','InsurancesController@edit');
        // Route::get('/usertype/{intUserTypeID}/edit','UsertypeController@edit');
        // Route::get('/standard/{intStandardID}/edit','StandardController@store');
        // Route::get('/agreements/{intAgreementsID}/edit','AgreementsController@edit');
        // Route::get('/termsandcondition/{intTermsConditionID}/edit','TermsandConditionsController@edit');
        
        //Maintenance Update
        // Route::post('/insurances/update','InsurancesController@update');
        // Route::post('/usertype/update','UsertypeController@update');
        // Route::post('/standard/update','StandardController@update');
        // Route::post('/agreements/update','AgreementsController@update');
        
        //for Tugboat Only
        
        //Maintenance Delete (Delete for Soft Delete)
        // Route::get('/insurances/{intInsurancesID}/delete','InsurancesController@delete');
        // Route::get('/usertype/{intUserTypeID}/delete','UsertypeController@delete');
        // Route::get('/standard/{intStandarID}/delete','StandardController@delete');
        // Route::get('/agreements/{intAgreementsID}/delete','AgreementsController@delete');
        
        //Maintenance Delete (Destroy for total Deletion)
        // Route::get('/usertype/{intUserTypeID}/destroy','UsertypeController@destroy');
        
        //Show Modals
        // Route::get('/agreements/{intAgreementsID}/show','AgreementsController@show');
        // Route::get('/termsandcondition/{intTermsConditionID}/show','TermsandConditionsController@show');
    });
    //Transactions Routes
    Route::group(['prefix'=>'transactions/'],function(){
        //Transaction Resources

        Route::resource('/teamassignment','TugboatTeamAssignmentController');
        Route::resource('/scheduling','SchedulingController');
        Route::resource('/joborders','JobOrderController');
        Route::resource('/contractrequests','ContractRequestsController');
        Route::resource('/contracts','ContractsController');
        
        //Consignee Accounts
        Route::resource('/consignee','ConsigneeAccountsController');
        Route::post('/consignee/activate','ConsigneeAccountsController@activate');
        //Consignee Contracts
        Route::get('/contractrequests/{intContractID}/create','ContractRequestsController@create');
        Route::get('/contractrequests/{intContractID}/getactive','ContractRequestsController@getactive');
        Route::post('/contractrequests/show','ContractRequestsController@show');
        Route::post('/contractrequests/store','ContractRequestsController@store');
        Route::post('/contractrequests/activate','ContractRequestsController@activate');
        Route::post('/contractrequests/getnotifs','ContractRequestsController@getnotifs');
        //Dispatch and Hauling Job Orders
        Route::get('/joborders/{intJobOrderID}/accept','JobOrderController@accept');
        Route::get('/joborders/{intJobOrderID}/forwardrequest','JobOrderController@forwardrequest');
        Route::post('/joborders/{intJobOrderID}/forward','JobOrderController@forward');
        Route::post('/joborders/store','JobOrderController@store');
        Route::get('/joborders/{intJobOrderID}/decline','JobOrderController@decline');
        //Dispatch and Hauling Team Builder (Team Assignment)
        Route::post('/teamassignment/store','TugboatTeamAssignmentController@store');
        Route::post('/teamassignment/teamassignment','TugboatTeamAssignmentController@teamassignment');
        Route::get('/teamassignment/{intTeamID}/show','TugboatTeamAssignmentController@show');
        //Dispatch and Hauling Tugboat Assignment
        Route::resource('/tugboatassignment','TugboatAssignmentController');
        Route::post('/tugboatassignment/create','TugboatAssignmentController@create');
        Route::post('/tugboatassignment/available','TugboatAssignmentController@available');

        //Scheduling
        
    });
    //Reports Routes
    Route::group(['prefix'=>'reports/'],function(){
    });
    //Queries Routes
    Route::group(['prefix'=>'queries/'],function(){
    });
    //Utitlities Routes
    Route::group(['prefix'=>'utilities/'],function(){
        Route::resource('/teamcomposition','TeamCompositionController');
    });
    Route::post('/Adminlogout','LoginControllers\AdminLoginController@logout');

});
Route::group(['prefix'=>'consignee/'],function(){
    // Route::resource('/')
    Route::post('/logout','LoginControllers\UserLoginController@logout');
    Route::get('/dashboard','ConsigneeControllers\ConsigneeController@index');
    //Contract Request
    Route::resource('/contracts','ConsigneeControllers\ContractsController');
    Route::get('/contracts/{intContractListID}/show','ConsigneeControllers\ContractsController@show');
    Route::post('/contracts/requestchanges','ConsigneeControllers\ContractsController@requestchanges');
    Route::post('/contracts/activate','ConsigneeControllers\ContractsController@activate');
    Route::post('/contracts/store','ConsigneeControllers\ContractsController@store');
    Route::post('/contracts/getnotifs','ConsigneeControllers\ContractsController@getnotifs');
    //Job Orders
    Route::resource('/joborders','ConsigneeControllers\JobOrdersController');
    Route::post('/joborders/create','ConsigneeControllers\JobOrdersController@create');
    Route::post('/joborders/{intJobOrderID}/store','ConsigneeControllers\JobOrdersController@store');
    Route::post('/joborders/update','ConsigneeControllers\JobOrdersController@update');
    Route::get('/joborders/{intJobOrderID}/show','ConsigneeControllers\JobOrdersController@show');

    // Route::get('/consignee/login','LoginControllers\UserLoginController@index')
});
Route::group(['prefix'=>'affiliates/'],function(){
    
    Route::group(['prefix'=>'maintenance/'],function(){
        Route::resource('/position','PositionController');
        Route::post('/position/store','PositionController@store');
        Route::post('/position/update','PositionController@update');
        Route::get('/position/{intPositionID}/get','PositionController@get');
        Route::get('/position/{intPositionID}/delete','PositionController@delete');
        Route::get('/position/{intPositionID}/destroy','PositionController@destroy');
        
        Route::resource('/employees','EmployeesController');
        Route::post('/employees/store','EmployeesController@store');
        Route::post('/employees/update','EmployeesController@update');
        Route::get('/employees/{intEmployeeID}/edit','EmployeesController@edit');
        Route::get('/employees/{intEmployeeID}/delete','EmployeesController@delete');
        Route::get('/employees/{intEmployeeID}/destroy','EmployeesController@destroy');

        Route::resource('/tugboat','TugboatController');
        Route::post('/tugboat/store','TugboatController@store');
        Route::post('/tugboat/pictures','TugboatController@updatePictures');
        Route::post('/tugboat/maininfo','TugboatController@updateMain');
        Route::post('/tugboat/specifications','TugboatController@updateSpecs');
        Route::post('/tugboat/classification','TugboatController@updateClass');
        Route::get('/tugboat/{intTugboatMainID}/please','TugboatController@please');
        Route::get('/tugboat/{intTugboatMainID}/delete','TugboatController@delete');
        Route::get('/tugboat/{intTugboatMainID}/destroy','TugboatController@destroy');

    });
    Route::group(['prefix'=>'transactions/'],function(){
            //Dispatch and Hauling Job Orders
            Route::get('/joborders/{intJobOrderID}/accept','JobOrderController@accept');
            Route::get('/joborders/{intJobOrderID}/forwardrequest','JobOrderController@forwardrequest');
            Route::post('/joborders/{intJobOrderID}/forward','JobOrderController@forward');
            Route::post('/joborders/store','JobOrderController@store');
            Route::get('/joborders/{intJobOrderID}/decline','JobOrderController@decline');
            //Dispatch and Hauling Team Builder (Team Assignment)
            Route::post('/teamassignment/store','TugboatTeamAssignmentController@store');
            Route::post('/teamassignment/teamassignment','TugboatTeamAssignmentController@teamassignment');
            Route::get('/teamassignment/{intTeamID}/show','TugboatTeamAssignmentController@show');
            //Dispatch and Hauling Tugboat Assignment
            Route::resource('/tugboatassignment','TugboatAssignmentController');
            Route::post('/tugboatassignment/create','TugboatAssignmentController@create');
            Route::post('/tugboatassignment/available','TugboatAssignmentController@available');
        
    });
});
//Routes with CRUD and Full Resources 
//Maintenance

Route::resource('/equipments','EquipmentsController');
// Route::resource('/login','LoginController');
Route::resource('/invoiceTugboat','InvoiceController');
//Transactions
Route::resource('/contracts','ContractsController');

Route::get('/administrator/login','LoginControllers\AdminLoginController@showLogin');
Route::post('/administrator/login','LoginControllers\AdminLoginController@login');
Route::get('/administrator/register','LoginControllers\AdminLoginController@showRegister');
Route::post('/administrator/register','LoginControllers\AdminLoginController@register');

Route::get('/consignee/login','LoginControllers\UserLoginController@showLogin');
Route::post('/consignee/login','LoginControllers\UserLoginController@login');
Route::get('/consignee/register','LoginControllers\UserLoginController@showRegister');
Route::post('/consignee/register','LoginControllers\UserLoginController@register');

Route::get('/affiliates/login','LoginControllers\AffiliatesLoginController@showLogin');
Route::post('/affiliates/login','LoginControllers\AffiliatesLoginController@login');
Route::get('/affiliates/register','LoginControllers\AffiliatesLoginController@showRegister');
Route::post('/affiliates/register','LoginControllers\AffiliatesLoginController@register');


//Login
// Route::get('/register','LoginControllers\UserLoginController@register');
// Route::get('/login','LoginControllers\UserLoginController@showLogin');
// Route::post('/login','LoginControllers\UserLoginController@login');
//Delete Functions use the following format
// Route::get('/modulename/{databaseID}/delete','ControllerRou  te');

//JSON Data for maintenance tables
//Show info for Contracts Clauses
//tugboat MaxID
Route::get('/tugboat/maxid','TugboatController@maxid');

//post AJAX Route

//edit AJAX Route
//Tugboat editRoutes
//end Edit  

//transaction Scheduling Pre render
Route::get('/scheduling/schedules','SchedulingController@schedules');
//transactions Create
Route::post('/contracts/store','ContractsController@store');
//transactions getData
Route::get('/contracts/{intContractListID}/show','ContractsController@show');
//transactions edit Data
Route::get('/contracts/{intContractListID}/edit','ContractsController@edit');
//transaction Update
Route::post('/contracts/update','ContractsController@update');
//deleteTransactions
Route::get('/contracts/{intContractListID}/delete','ContractsController@delete');
// Route::get('/', function () {
//    return view('welcome');
// });


// Auth::routes();

// Route::get('/administrator/login','AuthController\AdminController@showLogin');
// Route::post('/administrator/login','AuthController\AdminController@login')->name('admin.login.submit');
// Route::get('/home', 'HomeController@index')->name('home');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','WebpagesController@index');
