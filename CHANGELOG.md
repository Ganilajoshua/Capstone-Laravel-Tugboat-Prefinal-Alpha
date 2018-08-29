# Changelog Capstone-Laravel-tugboat-dev-PreFinal
Pre Final Repository Monday August 27,2018

# 0.0.3 - 2018-08-29

### Database Changes
tblpier - `new` isActive -> null
tblberth - `new` isActive -> null
tblposition - `new` isActive -> null
tblemployee - `new` isActive -> null
tblgoods - `new` isActive -> null
tbltugboattype - `new` isActive -> null

### Maintenance tables has now a Status (Active / Inactive) 
- Pier
- Berth
- Position
- Employees
- Goods
- Tugboat Type

### `new` Routes 

Route::post('/berth/activate','BerthController@activate');
Route::post('/pier/activate','PierController@activate');
Route::post('/position/activate','PositionController@activate');
Route::post('/employees/activate','EmployeesController@activate');
Route::post('/goods/activate','GoodsController@activate');
Route::post('/tugboattype/activate','TugboatTypeController@activate');

### Updated `Controllers` & `Models` 

- PierController::activate -> `Pier`
- BerthController::activate -> `Berth`
- PositionController::activate -> `Position`
- EmployeesController::activate -> `Employees`
- GoodsController::activate -> `Goods`
- TugboatTypeController::activate -> `TugboatType`

# 0.0.2 - 2018-08-28
All Datatables are set to bg-primary

Added Pills to Consignee Accounts
- Requests Tab
- Active Tab

Added Pills to Contract Requests
- Pending Tab
- Request Changes
- Accepted

Bugfixes
- fixed a bug where the whole tab of Consignee Transaction tends to become active
- fixed a bug where the whole tab of Dispacth and Hauling Transaction tends to become active


# 0.0.1 - 2018-08-27
Removed Folders and Views

- Agreements
- Insurances
- TermsCondition
- Standard
- UserType

Removed Controllers
- AgreementsController
- TermsandConditionController
- StandardController
- UserTypeController

Removed Models
- Agreements
- Insurances
- TermsandConditon
- Standard
- UserType
