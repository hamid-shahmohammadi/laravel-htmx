# laravel htmx

```shell
pamm Post -m
```

## create_post_table

```php
Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->String('title');
            $table->text('body');
            $table->timestamps();
        });
```

## make PostSeeder

```shell
pams PostSeeder
```

## PostSeeder

```php
public function run(): void
    {
        $faker = Factory::create();
        foreach (range(1, 50) as $index) {
            DB::table('posts')->insert([
                'title' => $faker->sentence(),
                'body' => $faker->paragraph(),
            ]);
        }
    }
```

## database/seeders/DatabaseSeeder.php

```php
$this->call(PostSeeder::class);
```

## web.php

```php
Route::get('/', function () {
    return view('search');
});

Route::get('/hello', function () {
    return 'hello';
});

Route::get('/search', function (Request $request) {
    $term=$request->get('search-term');
    $pageSize=3;
    if($term==''){
        $results=Post::paginate($pageSize);
    }else{
        $results=Post::where('title','LIKE','%'.$term.'%')->paginate($pageSize);
    }
    return view('search-results',compact('results'));
});
```

## resources/views/welcome.blade.php

```php

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/htmx.org@1.9.10"></script>    

<body class="m-8 mx-auto text-center">   

<button
            hx-get="/hello"
            hx-target="#content"
            class="bg-indigo-600 text-white p-4 text-lg rounded-md">
            load connection
</button>

<div id="content" class="flex justify-center"></div>

</body>
```

## resources/views/search.blade.php

```php
<body class="m-8 mx-auto text-center">
    <div class="m-8">
        <div>
            <form>
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input
                        name="search-term"
                        type="search"
                        id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Mockups, Logos..." required>
                    <button
                        hx-get="/search"
                        hx-target="#search-results"
                        hx-include="[name='search-term']"
                        type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>

    </div>
    <div id="search-results"></div>

</body>
```

## resources/views/search-results.blade.php

```php
@foreach ($results as $result)
<div class="px-5 mt-5">
    <div class="bg-white rounded-md max-w-4xl mx-auto p-4 space-y-4 shadow-lg">
        <h3 class="font-semibold">{{$result->title}}</h3>
        <p>
            {{$result->body}}
        </p>
    </div>
</div>
@endforeach
<div class="flex justify-center px-5 mt-5">{{$results->links('search-pagination')}}</div>
```

## resources/views/search-pagination.blade.php

```php
<a
                    hx-get="{{ $paginator->previousPageUrl() }}"
                    hx-target="#search-results"
                    hx-include="[name='search-term']"
                    href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                    {!! __('pagination.previous') !!}         

 </a>
<a
    hx-get="{{ $url }}"
    hx-target="#search-results"
   hx-include="[name='search-term']"
    href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
  {{ $page }}
 </a>
```

```shellag-0-1hls3a5egag-1-1hls3a5eg
php artisan vendor:publish --tag=laravel-pagination
```


