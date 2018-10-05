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
        // Route::get('/register','LoginControllers\AdminLoginController@showRegister');
        // Route::post('/register','LoginControllers\AdminLoginController@register');
    //Maintenance Routes
    Route::group(['prefix'=>'maintenance/'],function(){
        //Dashboard Components
        //Maintenance Resource
        Route::resource('/berth','BerthController');
        Route::post('/berth/store','BerthController@store');
        Route::post('/berth/update','BerthController@update');
        Route::post('/berth/activate','BerthController@activate');
        Route::get('/berth/{intBerthID}/edit','BerthController@edit');
        Route::get('/berth/{intBerthID}/delete','BerthController@delete');
        Route::get('/berth/{intBerthID}/destroy','BerthController@destroy');
        
        Route::resource('/pier','PierController');
        Route::post('/pier/store','PierController@store');
        Route::post('/pier/update','PierController@update');
        Route::post('/pier/activate','PierController@activate');
        Route::get('/pier/{intPierID}/edit','PierController@edit');
        Route::get('/pier/{intPierID}/delete','PierController@delete');
        Route::get('/pier/{intPierID}/destroy','PierController@destroy');
        
        Route::resource('/position','PositionController');
        Route::post('/position/store','PositionController@store');
        Route::post('/position/update','PositionController@update');
        Route::post('/position/activate','PositionController@activate');
        Route::get('/position/{intPositionID}/get','PositionController@get');
        Route::get('/position/{intPositionID}/delete','PositionController@delete');
        Route::get('/position/{intPositionID}/destroy','PositionController@destroy');
        
        Route::resource('/employees','EmployeesController');
        Route::post('/employees/store','EmployeesController@store');
        Route::post('/employees/update','EmployeesController@update');
        Route::post('/employees/activate','EmployeesController@activate');
        Route::get('/employees/{intEmployeeID}/edit','EmployeesController@edit');
        Route::get('/employees/{intEmployeeID}/delete','EmployeesController@delete');
        Route::get('/employees/{intEmployeeID}/destroy','EmployeesController@destroy');
        
        Route::resource('/goods','GoodsController');
        Route::post('/goods/store','GoodsController@store');
        Route::post('/goods/update','GoodsController@update');
        Route::post('/goods/activate','GoodsController@activate');
        Route::get('/goods/{intGoodsID}/edit','GoodsController@edit');
        Route::get('/goods/{intGoodsID}/delete','GoodsController@delete');
        Route::get('/goods/{intGoodsID}/destroy','GoodsController@destroy');

        Route::resource('/tugboattype','TugboatTypeController');
        Route::post('/tugboattype/store','TugboatTypeController@store');
        Route::post('/tugboattype/update','TugboatTypeController@update');
        Route::post('/tugboattype/activate','TugboatTypeController@activate');
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

        Route::resource('/vesseltype','VesselTypeController');
        Route::post('/vesseltype/store','VesselTypeController@store');
        Route::post('/vesseltype/update','VesselTypeController@update');
        Route::post('/vesseltype/activate','VesselTypeController@activate');
        Route::get('/vesseltype/{intVesselTypeID}/edit','VesselTypeController@edit');
        Route::get('/vesseltype/{intVesselTypeID}/delete','VesselTypeController@delete');
        Route::get('/vesseltype/{intVesselTypeID}/destroy','VesselTypeController@destroy');
        
        // Route::resource('/quotations','QuotationsController');
        // Route::post('/quotations/store','QuotationsController@store');
        // Route::post('/quotations/update','QuotationsController@update');
        // Route::get('/quotations/{intQuotationID}/show','QuotationsController@show');
        // Route::get('/quotations/{intQuotationID}/edit','QuotationsController@edit');
        // Route::get('/quotations/{intQuotationID}/delete','QuotationsController@delete');
    });
    //Transactions Routes
    Route::group(['prefix'=>'transactions/'],function(){
        //Transaction Resources
        
        //Consignee Module
        Route::group(['prefix'=>'consignee/'],function(){

        });

        //Dispatch and Hauling Module
        Route::group(['prefix'=>'dispatchandhauling/'],function(){
            //Team Builder (Team Assignment)
            Route::resource('/teamassignment','TugboatTeamAssignmentController');
            Route::get('/teamassignment/{intTeamID}/show','TugboatTeamAssignmentController@show');
            Route::get('/teamassignment/{intTeamID}/viewteam','TugboatTeamAssignmentController@viewteam');
            Route::get('/teamassignment/{intTATeamID}/viewtugboatteam','TugboatTeamAssignmentController@viewtugboatteam');
            Route::get('/teamassignment/{intTATugboatID}/showtugboatinformation','TugboatTeamAssignmentController@showtugboatinformation');
            Route::post('/teamassignment/store','TugboatTeamAssignmentController@store');
            Route::post('/teamassignment/teamassignment','TugboatTeamAssignmentController@teamassignment');
            Route::post('/teamassignment/cleartugboatteam','TugboatTeamAssignmentController@cleartugboatteam');
            Route::post('/teamassignment/removeteamemployees','TugboatTeamAssignmentController@removeteamemployees');
            Route::post('/teamassignment/requestteam','TugboatTeamAssignmentController@requestteam');
            Route::post('/teamassignment/requesttugboat','TugboatTeamAssignmentController@requesttugboat');
            Route::post('/teamassignment/forwardteam','TugboatTeamAssignmentController@forwardteam');
            Route::post('/teamassignment/forwardtugboat','TugboatTeamAssignmentController@forwardtugboat');
            Route::post('/teamassignment/returnteam','TugboatTeamAssignmentController@returnteam');
            Route::post('/teamassignment/returntugboat','TugboatTeamAssignmentController@returntugboat');
            Route::post('/teamassignment/notifications','TugboatTeamAssignmentController@notifications');
            
            Route::group(['prefix'=>'hauling/'],function(){
                Route::get('/{intJobOrderID}/show','HaulingController@show');
                Route::post('/showteam','HaulingController@showteam');
                Route::post('/start','HaulingController@start');
                Route::post('/terminate','HaulingController@terminate');
            });
        });

        //Payment and Billing Module
        Route::group(['prefix'=>'paymentandbilling/'],function(){

        });
        
        //Consignee Accounts
        Route::resource('/consignee','ConsigneeAccountsController');
        Route::post('/consignee/verify','ConsigneeAccountsController@verify');
        Route::post('/consignee/activate','ConsigneeAccountsController@activate');
        Route::get('/consignee/{intCompanyID}/show','ConsigneeAccountsController@show');
        //Consignee Contracts Requests
        Route::resource('/contractrequests','ContractRequestsController');
        Route::get('/contractrequests/{intContractID}/create','ContractRequestsController@create');
        Route::get('/contractrequests/{intContractID}/requestchanges','ContractRequestsController@requestchanges');
        Route::get('/contractrequests/{intContractID}/getactive','ContractRequestsController@getactive');
        Route::post('/contractrequests/show','ContractRequestsController@show');
        Route::post('/contractrequests/store','ContractRequestsController@store');
        Route::post('/contractrequests/activate','ContractRequestsController@activate');
        Route::post('/contractrequests/getnotifs','ContractRequestsController@getnotifs');
        Route::post('/contractrequests/saverequestchanges','ContractRequestsController@saverequestchanges');
        //Final Contracts
        Route::resource('/contracts','ContractsController');
        
        //Dispatch and Hauling - Forward Requests
        Route::resource('/forwardrequests','ForwardRequestsController');
        //Dispatch and Hauling - Job Orders
        Route::resource('/joborders','JobOrderController');
        Route::get('/joborders/{intJobOrderID}/accept','JobOrderController@accept');
        Route::get('/joborders/{intJobOrderID}/forwardrequest','JobOrderController@forwardrequest');
        Route::get('/joborders/{intJobOrderID}/decline','JobOrderController@decline');
        Route::get('/joborders/{intJobOrderID}/viewdetails','JobOrderController@viewdetails');
        Route::post('/joborders/forward','JobOrderController@forward');
        Route::post('/joborders/store','JobOrderController@store');
        //Dispatch and Hauling - Tugboat Assignment
        Route::resource('/tugboatassignment','TugboatAssignmentController');
        Route::get('/tugboatassignment/{intJobOrderID}/showjoborder','TugboatAssignmentController@showjoborder');
        Route::post('/tugboatassignment/create','TugboatAssignmentController@create');
        Route::post('/tugboatassignment/hauling','TugboatAssignmentController@hauling');
        Route::post('/tugboatassignment/available','TugboatAssignmentController@available');
        Route::post('/tugboatassignment/tugboatsavailable','TugboatAssignmentController@tugboatsavailable');
        //Scheduling Controller
        Route::resource('/scheduling','SchedulingController');
        //Dispatch and Hauling - Hauling
        Route::resource('/hauling','HaulingController');
        // Route::post('/hauling/prepare','HaulingController@prepare');
        // Payment And Billing Routes

        //Dispatch Ticket
        Route::resource('/dispatchticket','DispatchTicketController');
        Route::get('/dispatchticket','DispatchTicketController@index');
        Route::get('/dispatchticket/{intDispatchTicketID}/info','DispatchTicketController@info');
        Route::post('/dispatchticket/AdminAccept','DispatchTicketController@AdminAccept');
        Route::post('/dispatchticket/Void','DispatchTicketController@Void');
        Route::post('/dispatchticket/store','DispatchTicketController@store');
        Route::post('/dispatchticket/finalize','DispatchTicketController@finalize');
        //Scheduling
        Route::post('/scheduling/tugboatsavailable','SchedulingController@tugboatsavailable');
        
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
    Route::post('/dashboard/getnotifs','ConsigneeControllers\ConsigneeController@getnotifs');
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
    Route::post('/joborders/haulingservice','ConsigneeControllers\JobOrdersController@haulingservice');
    Route::post('/joborders/update','ConsigneeControllers\JobOrdersController@update');
    Route::get('/joborders/{intJobOrderID}/show','ConsigneeControllers\JobOrdersController@show');

    Route::resource('/dispatchticket','ConsigneeControllers\CDispatchTicketController');
    Route::get('/dispatchticket','ConsigneeControllers\CDispatchTicketController@index');
    Route::get('/dispatchticket/{intDispatchTicketID}/info','ConsigneeControllers\CDispatchTicketController@info');
    Route::post('/dispatchticket/store','ConsigneeControllers\CDispatchTicketController@store');

    
    Route::group(['prefix'=>'paymentbilling/'],function(){
        Route::resource('/billing','ConsigneeControllers\CBillingController');
        Route::post('/billing/store','ConsigneeControllers\CBillingController@store');
        Route::resource('/payment','ConsigneeControllers\CPaymentController');
        Route::get('/payment/{intBillID}/info','ConsigneeControllers\CPaymentController@info');
        Route::post('/payment/store','ConsigneeControllers\CPaymentController@store');
        // Route::get('/payment','ConsigneeControllers\CPaymentController@index');
    });
    // Route::get('/consignee/login','LoginControllers\UserLoginController@index')
});
Route::group(['prefix'=>'affiliates/'],function(){
    
    Route::group(['prefix'=>'maintenance/'],function(){
        Route::resource('/position','PositionController');
        Route::post('/position/store','PositionController@store');
        Route::post('/position/update','PositionController@update');
        Route::post('/position/activate','PositionController@activate');
        Route::get('/position/{intPositionID}/get','PositionController@get');
        Route::get('/position/{intPositionID}/delete','PositionController@delete');
        Route::get('/position/{intPositionID}/destroy','PositionController@destroy');
        
        Route::resource('/employees','EmployeesController');
        Route::post('/employees/store','EmployeesController@store');
        Route::post('/employees/update','EmployeesController@update');
        Route::post('/employees/activate','EmployeesController@activate');
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
            Route::resource('/joborders','JobOrderController');
            Route::get('/joborders/{intJobOrderID}/accept','JobOrderController@accept');
            Route::get('/joborders/{intJobOrderID}/forwardrequest','JobOrderController@forwardrequest');
            Route::post('/joborders/{intJobOrderID}/forward','JobOrderController@forward');
            Route::post('/joborders/store','JobOrderController@store');
            Route::get('/joborders/{intJobOrderID}/decline','JobOrderController@decline');
            //Dispatch and Hauling Team Builder (Team Assignment)
            Route::resource('/teamassignment','TugboatTeamAssignmentController');
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
