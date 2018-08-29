# Changelog Capstone-Laravel-tugboat-dev-PreFinal
Pre Final Repository Monday August 27,2018

# 0.0.3 - 2018-08-29

### Database Changes

- [x] tblpier - `new` isActive -> null
- [x] tblberth - `new` isActive -> null
- [x] tblposition - `new` isActive -> null
- [x] tblemployee - `new` isActive -> null
- [x] tblgoods - `new` isActive -> null
- [x] tbltugboattype - `new` isActive -> null

### Maintenance tables has now a Status (Active / Inactive) 
- [x] Pier
- [x] Berth
- [x] Position
- [x] Employees
- [x] Goods
- [x] Tugboat Type

### `new` Routes 

adasdasd
asdasdasd
asdasdad
asdasdasdasd

- [x] Route::post('/berth/activate','BerthController@activate');
- [x] Route::post('/pier/activate','PierController@activate');
- [x] Route::post('/position/activate','PositionController@activate');
- [x] Route::post('/employees/activate','EmployeesController@activate');
- [x] Route::post('/goods/activate','GoodsController@activate');
- [x] Route::post('/tugboattype/activate','TugboatTypeController@activate');

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
