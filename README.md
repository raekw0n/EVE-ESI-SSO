# Mesa Orbital

#### currently working on:
* Connectivity with the EVE ESI, starting with non-auth information such as universe (regions, constellations, systems, stations etc.) and storing this information in a relational manner (e.g. regions with constellations, constellations with systems, systems with stargates and stations, stargates with destination stargates and systems etc.).
* Development of route planner and freight calculator, taking into account security status and recent activity of systems.
* Development of the frontend corporation website.

#### How it works

##### Importer

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
