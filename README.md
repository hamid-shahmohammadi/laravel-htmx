# store post

### cmd

```shell
php artisan make:component PostStoreComponent
```

### install tailwind laravel



### add flowite

```html
@vite('resources/css/app.css')
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="https://unpkg.com/htmx.org@1.9.10"></script>

```

### resources/views/search.blade.php

```html
<x-post-store-component></x-post-store-component>
            <form>
```

### views/components/post-store-component.blade.php

```html
<div id="alert"></div>
                    <form method="post"
                        hx-post="/api/store/post"
                        hx-target="#alert"                        
                    class="max-w-sm mx-auto">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="mb-5">
                            <label for="email" 
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Title</label>
                            <input id="title" name="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@flowbite.com" required />
                        </div>
                        <div class="mb-5">
                            <label for="body"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                Body</label>
                            <textarea id="body" name="body"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                ></textarea>
                        </div>
                        
                        <button 
                            type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>

                </div>
```


