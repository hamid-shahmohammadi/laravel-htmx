# Hx-vals

### 

```html
<button 
    hx-post="/api/store/post"
    hx-target="#alert"
    hx-vals='{"title":"x@a.com","body":"123"}'
    
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
             

```

```html
<script>
   function getPassword(){
    return 'fkjklsdfjlkfs';
   } 
</script>                        
<button 
    hx-post="/api/store/post"
    hx-target="#alert"
    hx-vals='js:{"title":"x@a.com","pass":getPassword()}'
    
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    Submit</button>
```
