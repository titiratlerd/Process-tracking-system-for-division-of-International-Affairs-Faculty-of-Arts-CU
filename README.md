<h2>Features</h2>
<li>Staff can Create , read , Update and Delete exchange students data to the system (CRUD)</li>
<li>Staff can Mark thier to do list amd Track thier working processes</li>
<li>Staff can Mark to-do-with-each-student processs.</li>
<li>General users can choose only some of archive docs from all doc list they selected to submit the system</li> 
<li>Dashboard that summarize the overall amount of student (with university filter) and the overall progess of to-deal-with-student process.</li>
<li>When the year changed the processes of the coming year is automatically generated</li>
<hr>
<h2>To run</h2>
<p>1. Pls install Xampp, start Apache & mySql server</p>
<p>2. run these code in the terminal</p>

```
php artisan serve
```
```
npm run dev
```
```
php migrate:fresh --seed
```
<p>To test Function automatically generated process of the coming year</p>
<p>run this code</p>

```
php artisan schedule:run
```
