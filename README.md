# Mesa Orbital
[WIP]

## Working on
* Connectivity with the EVE ESI.
* Development of route planner and freight calculator.
* Development of the frontend corporation website.

## Documentation

### ESI SSO

#### Authorization Flow

* Your application will redirect a user to a login page provided by EVE’s SSO.

1. The user navigates to `http://mesa-orbital.local/eveauth/login`, which calls the `SsoController`'s `login()`
method to redirect the user to `https://login.eveonline.com/v2/oauth/authorize` with required url-encoded parameters:
    - `response_type=code`
    - `redirect_uri=<app-callback-url>`
    - `client_id=<app-client-id>`
    - `scope=<space-delimited-scopes>`
    - `state=<random-string>`
    
2. After the user logs in as a specific character the SSO sends a GET request to the callback URL provided by
your application containing a one use only authorization code that expires in 5 minutes.

[TBC]


![EVE SSO Flow](resources/images/eve-sso-flow.png)


### Importer

Using the `Locations` importer as an example, you will see it extends the `AbstractImporter`, this base abstract class provides a common `import()` method that will resolve the `type` and `subtype` of an import action in order to successfully execute the import method belonging to the instantiated object. For example:

Route:
```
Route::post('/import/{type}/{subtype}', 'ImportController@import')->name('import');
```

E.g.:
```
POST https://mesa-orbital.local/import/locations/regions
```

The import controller will resolve and create an instance of `Locations`, and call the common `import()` method provided by the abstract to successfully perform the import, which in this case is handled by the `Location`'s `regions()` method. In short:

* Logic for handling each individual type of import is handled in each individual class (e.g. regions and constellations handled by `Location`, employment history and skill points handled by `Character` etc.)
* Each class should be structured so the methods for importing can be resolved by the `subtype` parameter passed in the route  (e.g. `Location` should have a `regions()` method, `Character` should have a `skillPoints()` method etc.).
* By following the two points above, you shouldn't need to override the `import()` method in any of the individual classes, you also shouldn't need to modify the `ImportController`'s logic.
