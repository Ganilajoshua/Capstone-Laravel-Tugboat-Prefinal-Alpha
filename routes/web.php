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

        // Berth Maintenance Route Group
        Route::group(['prefix'=>'berth/'],function(){
            Route::resource('/','BerthController');
            Route::post('/store','BerthController@store');
            Route::post('/update','BerthController@update');
            Route::post('/activate','BerthController@activate');
            Route::get('/{intBerthID}/edit','BerthController@edit');
            Route::get('/{intBerthID}/delete','BerthController@delete');
            Route::get('/{intBerthID}/destroy','BerthController@destroy');
        });
        
        // Pier Maintenance Route Group
        Route::group(['prefix'=>'pier/'],function(){
            Route::resource('/','PierController');
            Route::post('/store','PierController@store');
            Route::post('/update','PierController@update');
            Route::post('/activate','PierController@activate');
            Route::get('/{intPierID}/edit','PierController@edit');
            Route::get('/{intPierID}/delete','PierController@delete');
            Route::get('/{intPierID}/destroy','PierController@destroy');
        });
        
        // Position Maintenance Route Group
        Route::group(['prefix'=>'position/'],function(){
            Route::resource('/','PositionController');
            Route::post('/store','PositionController@store');
            Route::post('/update','PositionController@update');
            Route::post('/activate','PositionController@activate');
            Route::get('/{intPositionID}/get','PositionController@get');
            Route::get('/{intPositionID}/delete','PositionController@delete');
            Route::get('/{intPositionID}/destroy','PositionController@destroy');
        });
        
        // Employees Maintenance Route Group
        Route::group(['prefix'=>'employees/'],function(){
            Route::resource('/','EmployeesController');
            Route::post('/store','EmployeesController@store');
            Route::post('/update','EmployeesController@update');
            Route::post('/activate','EmployeesController@activate');
            Route::get('/{intEmployeeID}/edit','EmployeesController@edit');
            Route::get('/{intEmployeeID}/delete','EmployeesController@delete');
            Route::get('/{intEmployeeID}/destroy','EmployeesController@destroy');
        });
        
        // Goods Maintenance Route Group
        Route::group(['prefix'=>'goods/'],function(){
            Route::resource('/','GoodsController');
            Route::post('/store','GoodsController@store');
            Route::post('/update','GoodsController@update');
            Route::post('/activate','GoodsController@activate');
            Route::get('/{intGoodsID}/edit','GoodsController@edit');
            Route::get('/{intGoodsID}/delete','GoodsController@delete');
            Route::get('/{intGoodsID}/destroy','GoodsController@destroy');
        });
        
        // Tugboat Type Maintenance Route Group
        Route::group(['prefix'=>'tugboattype/'],function(){
            Route::resource('/','TugboatTypeController');
            Route::post('/store','TugboatTypeController@store');
            Route::post('/update','TugboatTypeController@update');
            Route::post('/activate','TugboatTypeController@activate');
            Route::get('/{intTugboatTypeID}/edit','TugboatTypeController@edit');
            Route::get('/{intTugboatTypeID}/delete','TugboatTypeController@delete');
            Route::get('/{intTugboatTypeID}/destroy','TugboatTypeController@destroy');
        });
        
        // Tugboat Maintenance Route Group
        Route::group(['prefix'=>'tugboat/'],function(){
            Route::resource('/','TugboatController');
            Route::post('/store','TugboatController@store');
            Route::post('/pictures','TugboatController@updatePictures');
            Route::post('/maininfo','TugboatController@updateMain');
            Route::post('/specifications','TugboatController@updateSpecs');
            Route::post('/classification','TugboatController@updateClass');
            Route::get('/{intTugboatMainID}/please','TugboatController@please');
            Route::get('/{intTugboatMainID}/delete','TugboatController@delete');
            Route::get('/{intTugboatMainID}/destroy','TugboatController@destroy');
        });
        
        Route::group(['prefix'=>'vesseltype/'],function(){
            Route::resource('/','VesselTypeController');
            Route::post('/store','VesselTypeController@store');
            Route::post('/update','VesselTypeController@update');
            Route::post('/activate','VesselTypeController@activate');
            Route::get('/{intVesselTypeID}/edit','VesselTypeController@edit');
            Route::get('/{intVesselTypeID}/delete','VesselTypeController@delete');
            Route::get('/{intVesselTypeID}/destroy','VesselTypeController@destroy');
        });
    });
    //Transactions Routes
    Route::group(['prefix'=>'transactions/'],function(){
        //Transaction Resources
        
        //Consignee Module
        Route::group(['prefix'=>'consignee/'],function(){
            //Consignee Accounts
            Route::group(['prefix'=>'accounts'],function(){

            });
            Route::group(['prefix'=>'contractrequests/'],function(){

            });
            Route::group(['prefix'=>'contracts/'],function(){

            });
            
            Route::resource('/','ConsigneeAccountsController');
            Route::post('/verify','ConsigneeAccountsController@verify');
            Route::post('/activate','ConsigneeAccountsController@activate');
            Route::get('/{intCompanyID}/show','ConsigneeAccountsController@show');
        });
        
        //Dispatch and Hauling Module Route Group
        Route::group(['prefix'=>'dispatchandhauling/'],function(){

            // Dispatch and Hauling - Job Orders Route Group
            Route::group(['prefix'=>'joborders/'],function(){
                Route::resource('/','JobOrderController');
                Route::get('/{intJobOrderID}/accept','JobOrderController@accept');
                Route::get('/{intJobOrderID}/forwardrequest','JobOrderController@forwardrequest');
                Route::get('/{intJobOrderID}/decline','JobOrderController@decline');
                Route::get('/{intJobOrderID}/viewdetails','JobOrderController@viewdetails');
                Route::post('/forward','JobOrderController@forward');
                Route::post('/store','JobOrderController@store');
            });
            
            // Dispatch and Hauling - Team Assignment Route Group
            Route::group(['prefix'=>'teamassignment/'],function(){
                Route::resource('/','TugboatTeamAssignmentController');
                Route::get('/{intTeamID}/show','TugboatTeamAssignmentController@show');
                Route::get('/{intTeamID}/viewteam','TugboatTeamAssignmentController@viewteam');
                Route::get('/{intTATeamID}/viewtugboatteam','TugboatTeamAssignmentController@viewtugboatteam');
                Route::get('/{intTATugboatID}/showtugboatinformation','TugboatTeamAssignmentController@showtugboatinformation');
                Route::post('/store','TugboatTeamAssignmentController@store');
                Route::post('/teamassignment','TugboatTeamAssignmentController@teamassignment');
                Route::post('/cleartugboatteam','TugboatTeamAssignmentController@cleartugboatteam');
                Route::post('/removeteamemployees','TugboatTeamAssignmentController@removeteamemployees');
                Route::post('/requestteam','TugboatTeamAssignmentController@requestteam');
                Route::post('/requesttugboat','TugboatTeamAssignmentController@requesttugboat');
                Route::post('/forwardteam','TugboatTeamAssignmentController@forwardteam');
                Route::post('/forwardtugboat','TugboatTeamAssignmentController@forwardtugboat');
                Route::post('/returnteam','TugboatTeamAssignmentController@returnteam');
                Route::post('/returntugboat','TugboatTeamAssignmentController@returntugboat');
                Route::post('/notifications','TugboatTeamAssignmentController@notifications');
                Route::post('/getteamcompositions','TugboatTeamAssignmentController@getteamcompositions');
            });
            
            // Dispatch and Hauling - Tugboat Assignment Route Group
            Route::group(['prefix'=>'tugboatassignment/'],function(){
                Route::resource('/','TugboatAssignmentController');
                Route::get('/{intJobOrderID}/showjoborder','TugboatAssignmentController@showjoborder');
                Route::post('/create','TugboatAssignmentController@create');
                Route::post('/hauling','TugboatAssignmentController@hauling');
                Route::post('/available','TugboatAssignmentController@available');
                Route::post('/tugboatsavailable','TugboatAssignmentController@tugboatsavailable');
            });
            
            // Dispatch and Hauling - Scheduling Route Group
            Route::group(['prefix'=>'scheduling/'],function(){
            });
            
            // Dispatch and Hauling - Hauling Route Group
            Route::group(['prefix'=>'hauling/'],function(){
                Route::resource('/','HaulingController');
                Route::get('/{intJobOrderID}/show','HaulingController@show');
                Route::post('/showteam','HaulingController@showteam');
                Route::post('/start','HaulingController@start');
                Route::post('/terminate','HaulingController@terminate');
            });
        });
        
        //Payment and Billing Module
        Route::group(['prefix'=>'paymentandbilling/'],function(){
            
        });
        
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

        //Scheduling Controller
        Route::resource('/scheduling','SchedulingController');
        //Dispatch and Hauling - Hauling
        
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
        Route::resource('/','ReportsController');
    });
    //Queries Routes
    Route::group(['prefix'=>'queries/'],function(){
        Route::resource('/','QueriesController');
    });

    //Utitlities Routes
    Route::group(['prefix'=>'utilities/'],function(){
        Route::resource('/teamcomposition','TeamCompositionController');
        Route::post('/teamcomposition/update','TeamCompositionController@update');
        
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
        Route::group(['prefix'=>'position/'],function(){
            Route::resource('/','PositionController');
            Route::post('/store','PositionController@store');
            Route::post('/update','PositionController@update');
            Route::post('/activate','PositionController@activate');
            Route::get('/{intPositionID}/get','PositionController@get');
            Route::get('/{intPositionID}/delete','PositionController@delete');
            Route::get('/{intPositionID}/destroy','PositionController@destroy');
        });
        
        Route::group(['prefix'=>'employees/'],function(){
            Route::resource('/','EmployeesController');
            Route::post('/store','EmployeesController@store');
            Route::post('/update','EmployeesController@update');
            Route::post('/activate','EmployeesController@activate');
            Route::get('/{intEmployeeID}/edit','EmployeesController@edit');
            Route::get('/{intEmployeeID}/delete','EmployeesController@delete');
            Route::get('/{intEmployeeID}/destroy','EmployeesController@destroy');
        });

        Route::group(['prefix'=>'tugboat/'],function(){
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


    });
    Route::group(['prefix'=>'transactions/'],function(){
            // Dispatch and Hauling Module Route Group
            Route::group(['prefix'=>'dispatchandhauling/'],function(){
                // Dispatch and Hauling - Job Orders Route Group
                Route::group(['prefix'=>'joborders/'],function(){

                });

                // Dispatch and Hauling - Tugboat Assignment Route Group
                Route::group(['prefix'=>'tugboatassignment/'],function(){

                });

                // Dispatch and Hauling - Team Assignment Route Group
                Route::group(['prefix'=>'teamassignment/'],function(){

                });

                // Dispatch and Hauling - Scheduling Route Group
                Route::group(['prefix'=>'scheduling/'],function(){

                });

                // Dispatch and Hauling - Hauling Route Group
                Route::group(['prefix'=>'hauling/'],function(){

                });
            });


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



Route::get('/','WebpagesController@index');
