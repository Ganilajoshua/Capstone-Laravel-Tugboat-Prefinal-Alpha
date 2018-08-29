# Changelog Capstone-Laravel-tugboat-dev-PreFinal α
Pre Final Repository Monday August 27,2018

# 0.0.5 - 2018-02-29 α

## fixed Middlewares for Admin and Affiliates

- [x] Affiliates are now redirected to `/affiliates/maintenance/employees`
- [x] Administrator are now redirected to `/administrator/maintenance/pier`

## `new`

### Added Functionality to Affilates

####`Maintenance`
- [x] Position
- [x] Employees
- [x] Tugboats

##### Routes (Everything needed for Maintenance)

- [x] /position
- [x] /employees
- [x] /tugboats

##### Javascript

- [x] positionAffiliates.js
- [x] employeeAffiliates.js
- [x] tugboatAffiliates.js

`changes`
- getdata.js is relocated to /dist/js/tugboat
- getdata.js is renamed as tugboat.js

# 0.0.4 - 2018-02-29 α
#### fixed the view modal for
- view initial contract
- view finalized (active) contract

`additions`

####user is now notified when 

- the contract is 1 or 2 days from being activated
- the contract expiration a month before expiry
- the contract is expired

`fixes`
####joborder dropdowns are properly rendering when there is an inactive data
- Goods
- Berth
 
# 0.0.3 - 2018-08-29 α

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

# 0.0.2 - 2018-08-28 α
All Datatables are set to bg-primary

Added XD
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


# 0.0.1 - 2018-08-27 α
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
