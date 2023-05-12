# php-laravel-Practice
A practice project. To build login system and shopping cart functions.

中文 :

 - 切換於專案目錄example-app底下，執行 run npm dev 與 php artisan serve來啟動專案 ;
 - 啟動專案後於瀏覽器輸入網址 : http://127.0.0.1:8000/MemberRegister Or http://127.0.0.1:8000/Shopping ;
 - 設定路徑與頁面的映射設定檔位於 : resources/routes/web.php ;
 - public/good.txt有商品的資料檔案 ; 
 - 主要程式頁面檔位於 resources/views/shopping.blade.php & register.blade.php ; 
 - shopping頁的搜索功能目前是針對第一格商品名稱做搜尋，開頭字串符合的才會出現在新的表格上。
 - 已知問題 : 嘗試使用laravel mix或Babel來編譯ES6語法，但目前失敗。 Vue常見的 export default{} 無法使用 ; 
 - 沒有使用Vue常用的寫法、擴充(Ex : Vuetify)，使用css、js的邏輯來完成此專案 ;

English : 
 
 - Switch to the project directory "example-app" and execute "npm run dev" and "php artisan serve" to start the project.
 - Once the project is running, enter the following URLs in the browser: http://127.0.0.1:8000/MemberRegister or http://127.0.0.1:8000/Shopping.
 - The mapping configuration file for routes is located at: resources/routes/web.php.
 - The file "public/good.txt" contains the data for the products.
 - The main pages are located at resources/views/shopping.blade.php and register.blade.php.
 - The search functionality on the shopping page currently searches for matches in the first column of the product names. Only items with matching starting strings will appear in the new table.
 - Known issue: Attempted to use Laravel Mix or Babel to compile ES6 syntax, but currently facing failures. The commonly used Vue syntax "export default {}" cannot be used.
 - The project does not utilize commonly used Vue practices or extensions (e.g., Vuetify). Instead, CSS and JavaScript logic are used to accomplish the objectives.