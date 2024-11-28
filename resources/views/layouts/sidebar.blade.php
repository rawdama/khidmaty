<div class="sidebar col-md-3 p-2 py-md-3 @@cardClass"> 
    <div class="container-fluid">
        <div class="title-text d-flex align-items-center mb-4 mt-1">
            <h4 class="sidebar-title mb-0 flex-grow-1">
                @php
                    $currentLocale = app()->getLocale();
                @endphp
                <span class="sm-txt">{{ $settings->translate($currentLocale)->name ?? 'Name not available' }}</span>
            </h4>
        </div>

        <div class="dashed-divider"></div> <!-- Dashed line here -->

        <ul class="menu-list">
            <ul class="main-menu">
                <li>
                    <a class="m-link" href="{{ route('sliders.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path class="var(--secondary-color)" fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg>
                        <span class="ms-2">Banners</span>
                    </a>
                </li>
                
                <div class="dashed-divider"></div> <!-- Dashed line here -->

                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Applications" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                            <path class="fill-secondary" d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        </svg>
                        <span class="ms-2">stores</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>
                    <ul class="sub-menu collapse" id="menu-Applications">
                       
                        <li><a class="ms-link" href="{{ route('stores.index') }}">store</a></li>
                        <li><a class="ms-link" href="{{ route('topSellingStores') }}">more sales stores</a></li>
                        <li><a class="ms-link" href="{{ route('mostPreferred-stores') }}">more saved stores</a></li>
                        <li><a class="ms-link" href="{{ route('wallets.index') }}">wallet</a></li>
                        
                    </ul>
                </li>

                <div class="dashed-divider"></div> <!-- Dashed line here -->

                <li>
                    <a class="m-link" href="{{ route('admins.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">users</span>
                    </a>
                </li>
                <div class="dashed-divider"></div> 
                <li class="dropdown">
                    <a class="m-link" href="" id="storesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">Stores </span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="storesDropdown">
                        <li><a class="dropdown-item" href="{{ route('stores.index') }}">store</a></li>
                        <li><a class="dropdown-item" href="{{ route('topSellingStores') }}">more sales stores</a></li>
                        <li><a class="dropdown-item" href="{{ route('mostPreferred-stores') }}">more saved stores</a></li>
                        <li><a class="dropdown-item" href="{{ route('wallets.index') }}">wallet</a></li> <!-- Example for editing category -->
                        <!-- Add more items as needed -->
                    </ul>
                </li>
                <div class="dashed-divider"></div> 
                <li>
                    <a class="m-link" href="{{ route('product-departments.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">products departments</span>
                    </a>
                </li>
                <div class="dashed-divider"></div> 
                <li>
                    <a class="m-link" href="{{ route('product-store.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">products stores</span>
                    </a>
                </li>
                <div class="dashed-divider"></div> 
                <li>
                    <a class="m-link" href="{{ route('product-type.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">products types</span>
                    </a>
                </li>
                <div class="dashed-divider"></div> 
                <li>
                    <a class="m-link" href="{{ route('brands.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">Brands</span>
                    </a>
                </li>
                <!-- End of Clients Section -->
                 <!-- Start of Clients Section -->
                 <div class="dashed-divider"></div> 
                 <li>
                    <a class="m-link" href="{{ route('cars.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">Cars</span>
                    </a>
                </li>
                
               
                <!-- Start of Clients Section -->
                <div class="dashed-divider"></div> 

                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Applications-products" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                            <path class="fill-secondary" d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        </svg>
                        <span class="ms-2">products</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>
                    <ul class="sub-menu collapse" id="menu-Applications-products">
                       
                        <li><a class="ms-link" href="{{ route('products.index') }}">products</a></li>
                        
                        <li><a class="ms-link" href="{{ route('mostPreferred-products') }}">more saved products</a></li>
                        
                        <li><a class="ms-link" href="{{ route('mostSoldProducts') }}">more soled products</a></li>

                    </ul>
                </li>
                <div class="dashed-divider"></div> 
                <li>
                    <a class="m-link" href="{{ route('questions.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">questions</span>
                    </a>
                </li>
                <div class="dashed-divider"></div> 
                <li>
                    <a class="m-link" href="{{ route('opnions.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">opnions</span>
                    </a>
                </li>
                <div class="dashed-divider"></div> 
                <li>
                    <a class="m-link" href="{{ route('blogs.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">blogs</span>
                    </a>
                </li>
                <div class="dashed-divider"></div> 
                <li>
                    <a class="m-link" href="{{ route('orders.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">orders</span>
                    </a>
                </li>
                <div class="dashed-divider"></div> 

                <li>
                    <a class="m-link" href="{{ route('clients.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">Clients</span>
                    </a>
                </li>
                <div class="dashed-divider"></div> 
                <li>
                    <a class="m-link" href="{{ route('settings.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a6 6 0 1 0 6 6A6 6 0 0 0 8 0zm0 1a5 5 0 1 1-5 5A5 5 0 0 1 8 1z"/>
                            <path d="M8 7a4 4 0 1 0 4 4A4 4 0 0 0 8 7zm0 1a3 3 0 1 1-3 3A3 3 0 0 1 8 8z"/>
                        </svg>
                        <span class="ms-2">settingss</span>
                    </a>
                </li>
                <div class="dashed-divider"></div>
                <div class="logout-icon mt-3">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                


            </ul>
        </ul>
    </div>
</div>