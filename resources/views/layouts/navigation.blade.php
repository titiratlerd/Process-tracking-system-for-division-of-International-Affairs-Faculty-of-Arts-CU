<nav x-data="{ open: false }" class="">

    <!-- Primary Navigation Menu -->
    <div class="h-screen w-64 fixed top-0 left-0 bg-gray-900 z-50 overflow-x-hidden pt-10 text-gray-50">
        <!-- Sidebar content -->
        <div class="nav-content px-4">
            <div class="user-name flex items-center text-base py-2">
                <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.625 11.752C11.625 8.23114 14.4792 5.37695 18 5.37695C21.5208 5.37695 24.375 8.23114 24.375 11.752C24.375 15.2728 21.5208 18.127 18 18.127C14.4792 18.127 11.625 15.2728 11.625 11.752ZM18 7.62695C15.7218 7.62695 13.875 9.47378 13.875 11.752C13.875 14.0301 15.7218 15.877 18 15.877C20.2782 15.877 22.125 14.0301 22.125 11.752C22.125 9.47378 20.2782 7.62695 18 7.62695Z" fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22.627C10.136 22.627 8.625 24.138 8.625 26.002V27.7844C8.625 27.8115 8.64467 27.8347 8.67145 27.839C14.8496 28.8477 21.1504 28.8477 27.3285 27.839C27.3553 27.8347 27.375 27.8115 27.375 27.7844V26.002C27.375 24.138 25.864 22.627 24 22.627H23.4887C23.4492 22.627 23.4099 22.6332 23.3723 22.6455L22.074 23.0694C19.4268 23.9338 16.5732 23.9338 13.926 23.0694L12.6277 22.6455C12.5901 22.6332 12.5508 22.627 12.5113 22.627H12ZM6.375 26.002C6.375 22.8954 8.8934 20.377 12 20.377H12.5113C12.788 20.377 13.063 20.4207 13.3261 20.5066L14.6244 20.9305C16.8178 21.6468 19.1822 21.6468 21.3756 20.9305L22.6739 20.5066C22.937 20.4207 23.212 20.377 23.4887 20.377H24C27.1066 20.377 29.625 22.8954 29.625 26.002V27.7844C29.625 28.9142 28.8062 29.8776 27.6911 30.0596C21.2729 31.1075 14.7271 31.1075 8.30891 30.0596C7.19383 29.8776 6.375 28.9142 6.375 27.7844V26.002Z" fill="white"/>
                    </svg>
                <div class="mx-2 whitespace-nowrap">{{ Auth::user()->name }}</div>
            </div>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{route('dashboard')}}" class="hover:border hover:border-pink-300 flex items-center p-2 text-gray-50 rounded-lg dark:text-white  dark:hover:bg-gray-400 group">
                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.5271 8.65741C22.185 7.36957 20.066 7.36957 18.7239 8.65741L11.5914 15.5014C11.4167 15.6691 11.2991 15.8875 11.2554 16.1257C10.4012 20.7844 10.3381 25.5538 11.0689 30.2334L11.2424 31.3442H15.8311V21.7684C15.8311 21.1298 16.3488 20.6121 16.9873 20.6121H25.2637C25.9022 20.6121 26.4199 21.1298 26.4199 21.7684V31.3442H31.0086L31.1821 30.2334C31.9129 25.5538 31.8498 20.7844 30.9956 16.1257C30.9519 15.8875 30.8343 15.6691 30.6596 15.5014L23.5271 8.65741ZM17.1228 6.98884C19.3596 4.84243 22.8914 4.84243 25.1282 6.98884L32.2607 13.8328C32.7857 14.3366 33.1389 14.9929 33.2701 15.7086C34.1713 20.6229 34.2378 25.6539 33.4669 30.5902L33.1882 32.3747C33.073 33.1126 32.4374 33.6567 31.6904 33.6567H25.2637C24.6251 33.6567 24.1074 33.139 24.1074 32.5004V22.9246H18.1436V32.5004C18.1436 33.139 17.6259 33.6567 16.9873 33.6567H10.5606C9.81364 33.6567 9.17804 33.1126 9.06279 32.3747L8.78411 30.5902C8.01321 25.6539 8.07973 20.6229 8.98088 15.7086C9.11212 14.9929 9.46529 14.3366 9.99034 13.8328L17.1228 6.98884Z" fill="white"/>
                            </svg>
                            
                        <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
                    </a>
                </li>  
                <li>
                    <a href="#" class="hover:border hover:border-pink-300 flex items-center p-2 text-gray-50 rounded-lg dark:text-white  dark:hover:bg-gray-400 group">
                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.5678 21.0904C26.5678 20.5541 26.133 20.1192 25.5967 20.1192H17.8274C17.291 20.1192 16.8562 20.5541 16.8562 21.0904C16.8562 21.6268 17.291 22.0616 17.8274 22.0616H25.5967C26.133 22.0616 26.5678 21.6268 26.5678 21.0904Z" fill="white"/>
                            <path d="M25.2729 24.9751C25.2729 24.4387 24.8381 24.0039 24.3018 24.0039H17.8274C17.291 24.0039 16.8562 24.4387 16.8562 24.9751C16.8562 25.5114 17.291 25.9462 17.8274 25.9462H24.3018C24.8381 25.9462 25.2729 25.5114 25.2729 24.9751Z" fill="white"/>
                            <path d="M25.5967 27.8886C26.133 27.8886 26.5678 28.3234 26.5678 28.8597C26.5678 29.3961 26.133 29.8309 25.5967 29.8309H17.8274C17.291 29.8309 16.8562 29.3961 16.8562 28.8597C16.8562 28.3234 17.291 27.8886 17.8274 27.8886H25.5967Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.8562 36.629H33.6897C35.6564 36.629 37.2506 35.0348 37.2506 33.0681V25.9462C37.2506 25.4099 36.8158 24.9751 36.2795 24.9751H32.0711V14.8662C32.0711 13.023 29.9878 11.9509 28.4879 13.0222L28.2613 13.1841C27.2506 13.906 25.8816 13.9036 24.8663 13.1783C23.1779 11.9723 20.8936 11.9723 19.2052 13.1783C18.1898 13.9036 16.8208 13.906 15.8102 13.1841L15.5835 13.0222C14.0837 11.9509 12.0004 13.023 12.0004 14.8662V31.7732C12.0004 34.455 14.1744 36.629 16.8562 36.629ZM20.3342 14.7588C21.3472 14.0352 22.7243 14.0352 23.7373 14.7588C25.4233 15.9631 27.6995 15.9723 29.3902 14.7646L29.6169 14.6027C29.8311 14.4497 30.1288 14.6028 30.1288 14.8662V33.0681C30.1288 33.651 30.2688 34.2011 30.517 34.6867H16.8562C15.2471 34.6867 13.9427 33.3823 13.9427 31.7732V14.8662C13.9427 14.6028 14.2403 14.4497 14.4546 14.6027L14.6812 14.7646C16.372 15.9723 18.6482 15.9631 20.3342 14.7588ZM32.0711 33.0681V26.9174H35.3083V33.0681C35.3083 33.962 34.5836 34.6867 33.6897 34.6867C32.7958 34.6867 32.0711 33.962 32.0711 33.0681Z" fill="white"/>
                        </svg>     
                            
                        <span class="ms-3">MOU</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="w-full  text-base  transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:border hover:border-pink-300 flex items-center p-2 text-gray-50   group" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.0742 20.6138C20.0742 18.1003 22.1119 16.0626 24.6255 16.0626C27.139 16.0626 29.1767 18.1003 29.1767 20.6138C29.1767 23.1274 27.139 25.165 24.6255 25.165C22.1119 25.165 20.0742 23.1274 20.0742 20.6138ZM24.6255 17.8831C23.1173 17.8831 21.8947 19.1057 21.8947 20.6138C21.8947 22.122 23.1173 23.3445 24.6255 23.3445C26.1336 23.3445 27.3562 22.122 27.3562 20.6138C27.3562 19.1057 26.1336 17.8831 24.6255 17.8831Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6838 19.5546C17.016 15.5238 20.3844 12.4216 24.4289 12.4216H24.822C28.8665 12.4216 32.2349 15.5238 32.5671 19.5546C32.7452 21.7152 32.0778 23.8607 30.7055 25.539L26.3426 30.8746C25.4551 31.96 23.7958 31.96 22.9083 30.8746L18.5454 25.539C17.1731 23.8607 16.5057 21.7152 16.6838 19.5546ZM24.4289 14.2421C21.3318 14.2421 18.7525 16.6176 18.4981 19.7041C18.3588 21.3947 18.881 23.0734 19.9547 24.3866L24.3176 29.7223C24.4767 29.9168 24.7742 29.9168 24.9333 29.7223L29.2962 24.3866C30.3699 23.0734 30.8922 21.3947 30.7528 19.7041C30.4984 16.6176 27.9191 14.2421 24.822 14.2421H24.4289Z" fill="white"/>
                            <path d="M19.3713 29.5165C19.5961 29.0668 19.4139 28.5201 18.9642 28.2953C18.5146 28.0704 17.9678 28.2527 17.743 28.7023L15.3157 33.557C15.1746 33.8391 15.1897 34.1742 15.3556 34.4426C15.5214 34.7109 15.8144 34.8743 16.1299 34.8743H33.1211C33.4365 34.8743 33.7295 34.7109 33.8954 34.4426C34.0612 34.1742 34.0763 33.8391 33.9352 33.557L31.5079 28.7023C31.2831 28.2527 30.7363 28.0704 30.2867 28.2953C29.837 28.5201 29.6548 29.0668 29.8796 29.5165L31.6483 33.0538H17.6027L19.3713 29.5165Z" fill="white"/>
                            </svg>
                            
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Inbound</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <x-nav-link :href="route('inbound.dashboard.index')" :active="request()->routeIs('inbound.dashboard.index')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
        
                            
                        </li>
                        <li>
                            <x-nav-link :href="route('inbound.progress_tracking.edit')" :active="request()->routeIs('inbound.progress_tracking.edit')">
                                {{ __('Progress tracking') }}
                            </x-nav-link>
                            
                        </li>
                        <li>
                            <x-nav-link :href="route('student.index')" :active="request()->routeIs('student.index')">
                                {{ __('Inbound Student Data') }}
                            </x-nav-link>
                            
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="w-full  text-base  transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:border hover:border-pink-300 flex items-center p-2 text-gray-50   group">
                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M34.0292 11.0459C34.4252 11.4419 34.4252 12.084 34.0292 12.48L33.2849 13.2243C37.732 18.4042 37.5021 26.2164 32.5951 31.1234C30.279 33.4395 27.3157 34.7136 24.2875 34.9458V37.0127H26.6536C27.2137 37.0127 27.6677 37.4667 27.6677 38.0268C27.6677 38.5868 27.2137 39.0408 26.6536 39.0408H19.8932C19.3331 39.0408 18.8791 38.5868 18.8791 38.0268C18.8791 37.4667 19.3331 37.0127 19.8932 37.0127H22.2593V34.9457C19.5467 34.7376 16.886 33.6935 14.696 31.8133L13.9517 32.5575C13.5557 32.9535 12.9136 32.9535 12.5176 32.5575C12.1216 32.1615 12.1216 31.5194 12.5176 31.1234L13.4737 30.1673C14.1435 29.4975 15.1845 29.5317 15.8366 30.1161C17.9485 32.0088 20.6087 32.9555 23.2693 32.9564L23.2734 32.9564L23.2778 32.9564C26.1311 32.9553 28.9841 31.8662 31.161 29.6893C35.3699 25.4804 35.5122 18.744 31.5878 14.3649C31.0034 13.7128 30.9691 12.6719 31.639 12.002L32.5951 11.0459C32.9911 10.6499 33.6332 10.6499 34.0292 11.0459Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1468 21.8017C14.1468 16.7612 18.2329 12.6751 23.2734 12.6751C28.3139 12.6751 32.4 16.7612 32.4 21.8017C32.4 26.8422 28.3139 30.9283 23.2734 30.9283C18.2329 30.9283 14.1468 26.8422 14.1468 21.8017ZM23.2734 14.7032C19.353 14.7032 16.1749 17.8813 16.1749 21.8017C16.1749 22.2544 16.2173 22.6973 16.2983 23.1264C16.8545 22.52 17.6534 22.1397 18.5411 22.1397C20.2212 22.1397 21.5833 23.5018 21.5833 25.1819C21.5833 26.429 20.8329 27.5009 19.759 27.9705C20.7952 28.5621 21.9948 28.9002 23.2734 28.9002C26.7122 28.9002 29.58 26.4548 30.2325 23.2082C29.3286 24.5997 27.7605 25.52 25.9776 25.52C23.1773 25.52 20.9072 23.2499 20.9072 20.4496C20.9072 17.6494 23.1773 15.3793 25.9776 15.3793C26.0945 15.3793 26.2105 15.3832 26.3254 15.391C25.4009 14.9501 24.366 14.7032 23.2734 14.7032ZM22.9354 20.4496C22.9354 18.7695 24.2974 17.4074 25.9776 17.4074C27.6577 17.4074 29.0198 18.7695 29.0198 20.4496C29.0198 22.1298 27.6577 23.4918 25.9776 23.4918C24.2974 23.4918 22.9354 22.1298 22.9354 20.4496ZM18.5411 24.1679C17.981 24.1679 17.527 24.6219 17.527 25.1819C17.527 25.742 17.981 26.196 18.5411 26.196C19.1011 26.196 19.5551 25.742 19.5551 25.1819C19.5551 24.6219 19.1011 24.1679 18.5411 24.1679Z" fill="white"/>
                            </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Outbound</span>
                    
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
    
        {{-- <aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:border hover:border-pink-30 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <span class="ms-3">Inbound</span>
                    </a> --}}
                    {{-- <x-nav-link :href="route('inbound.dashboard.index')" :active="request()->routeIs('inbound.dashboard.index')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('inbound.progress_tracking.edit')" :active="request()->routeIs('inbound.progress_tracking.edit')">
                        {{ __('Progress tracking') }}
                    </x-nav-link>

                    <x-nav-link :href="route('student.index')" :active="request()->routeIs('student.index')">
                        {{ __('Inbound Student Data') }}
                    </x-nav-link>
                </li>
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:border hover:border-pink-30 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">E-commerce</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:border hover:border-pink-30 dark:text-white dark:hover:bg-gray-700">Products</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:border hover:border-pink-30 dark:text-white dark:hover:bg-gray-700">Billing</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:border hover:border-pink-30 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:border hover:border-pink-30 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Kanban</span>
                        <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                    </a>
                </li>
                
            </ul>
            </div>

        </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:border hover:border-pink-30 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div> --}}

        {{-- <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div> --}}
        {{-- </aside> --}}


        
        
        {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col justify-between h-16">
                <div class="flex">
                    <div class="bg-slate-800 text-white px-16 py-16">
                        <p class="mx-2 whitespace-nowrap">SomSri Meesuk</p>

                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex sm:flex-col">
                            <!-- Navigation Links -->
                            <x-nav-link :href="route('inbound.dashboard.index')" :active="request()->routeIs('inbound.dashboard.index')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
        
                            <x-nav-link :href="route('inbound.progress_tracking.edit')" :active="request()->routeIs('inbound.progress_tracking.edit')">
                                {{ __('Progress tracking') }}
                            </x-nav-link>
        
                            <x-nav-link :href="route('student.index')" :active="request()->routeIs('student.index')">
                                {{ __('Inbound Student Data') }}
                            </x-nav-link>
        
                        </div>
                    </div>

                </div> --}}

                {{-- <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:border hover:border-pink-30 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div> --}}


</nav>
