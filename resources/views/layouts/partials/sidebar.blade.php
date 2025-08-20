   <div class="fixed top-0 bottom-0 z-20 hidden lg:flex flex-col items-stretch shrink-0 bg-muted [--kt-drawer-enable:true] lg:[--kt-drawer-enable:false]"
       data-kt-drawer="true" data-kt-drawer-class="kt-drawer kt-drawer-start flex" id="sidebar">
       <div class="hidden lg:flex items-center justify-center shrink-0 pt-8 pb-3.5" id="sidebar_header">
           <a href="{{ route('dashboard') }}">
               <img class="dark:hidden min-h-[42px]" src="assets/media/app/mini-logo-square-gray.svg" />
               <img class="hidden dark:block min-h-[42px]" src="assets/media/app/mini-logo-square-gray-dark.svg" />
           </a>
       </div>
       <div class="kt-scrollable-y-hover grow gap-2.5 shrink-0 flex items-center pt-5 lg:pt-0 ps-3 pe-3 lg:pe-0 flex-col"
           data-kt-scrollable="true" data-kt-scrollable-dependencies="#sidebar_header,#sidebar_footer"
           data-kt-scrollable-height="auto" data-kt-scrollable-offset="80px"
           data-kt-scrollable-wrappers="#sidebar_menu_wrapper" id="sidebar_menu_wrapper">
           <!-- Sidebar Menu -->
           <div class="kt-menu flex flex-col gap-2.5 grow" data-kt-menu="true" id="sidebar_menu">
               <div class="kt-menu-item">
                   <a class="kt-menu-link rounded-[9px] border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border w-[62px] h-[60px] flex flex-col justify-center items-center gap-1 p-2"
                       href="{{ route('dashboard') }}">
                       <span
                           class="kt-menu-icon kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary text-secondary-foreground">
                           <i class="ki-filled ki-chart-line-star text-xl">
                           </i>
                       </span>
                       <span
                           class="kt-menu-title text-xs kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary text-secondary-foreground font-medium text-center">
                           Anasayfa
                       </span>
                   </a>
               </div>



    <div class="kt-menu-item">
                   <a class="kt-menu-link rounded-[9px] border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border w-[62px] h-[60px] flex flex-col justify-center items-center gap-1 p-2"
                       href="{{ route('priceoffer') }}">
                       <span
                           class="kt-menu-icon kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary text-secondary-foreground">
                           <i class="ki-filled ki-chart-line-star text-xl">
                           </i>
                       </span>
                       <span
                           class="kt-menu-title text-xs kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary text-secondary-foreground font-medium text-center">
                        Teklif Al
                       </span>
                   </a>
               </div>



                   <div class="kt-menu-item">
                   <a class="kt-menu-link rounded-[9px] border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border w-[62px] h-[60px] flex flex-col justify-center items-center gap-1 p-2"
                       href="{{ route('pricecalcute') }}">
                       <span
                           class="kt-menu-icon kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary text-secondary-foreground">
                           <i class="ki-filled ki-chart-line-star text-xl">
                           </i>
                       </span>
                       <span
                           class="kt-menu-title text-xs kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary text-secondary-foreground font-medium text-center">
                           Hızlı Fiyat Hesaplama
                       </span>
                   </a>
               </div>


                   <div class="kt-menu-item">
                   <a class="kt-menu-link rounded-[9px] border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border w-[62px] h-[60px] flex flex-col justify-center items-center gap-1 p-2"
                       href="{{ route('companies.index') }}">
                       <span
                           class="kt-menu-icon kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary text-secondary-foreground">
                           <i class="ki-filled ki-chart-line-star text-xl">
                           </i>
                       </span>
                       <span
                           class="kt-menu-title text-xs kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary text-secondary-foreground font-medium text-center">
                           Firmalarım
                       </span>
                   </a>
               </div>


                   <div class="kt-menu-item">
                   <a class="kt-menu-link rounded-[9px] border border-transparent kt-menu-item-active:border-border kt-menu-item-active:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border w-[62px] h-[60px] flex flex-col justify-center items-center gap-1 p-2"
                       href="{{ route('addresses.index', ['type' => 'sender']) }}">
                       <span
                           class="kt-menu-icon kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary text-secondary-foreground">
                           <i class="ki-filled ki-chart-line-star text-xl">
                           </i>
                       </span>
                       <span
                           class="kt-menu-title text-xs kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary text-secondary-foreground font-medium text-center">
                           Adreslerim
                       </span>
                   </a>
               </div>
















































                @if (Auth::user()->type == 1)


               <div class="kt-menu-item" data-kt-menu-item-offset="-10px, 14px" data-kt-menu-item-overflow="true"
                   data-kt-menu-item-placement="right-start" data-kt-menu-item-toggle="dropdown"
                   data-kt-menu-item-trigger="click|lg:hover">
                   <div
                       class="kt-menu-link rounded-[9px] border border-transparent kt-menu-item-here:border-border kt-menu-item-here:bg-background kt-menu-link-hover:bg-background kt-menu-link-hover:border-border w-[62px] h-[60px] flex flex-col justify-center items-center gap-1 p-2 grow">
                       <span
                           class="kt-menu-icon kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary text-secondary-foreground">
                           <i class="ki-filled ki-profile-circle text-xl">
                           </i>
                       </span>
                       <span
                           class="kt-menu-title kt-menu-item-here:text-primary kt-menu-item-active:text-primary kt-menu-link-hover:text-primary font-medium text-xs text-secondary-foreground">
                           Admin
                       </span>
                   </div>
                   <div
                       class="kt-menu-default kt-menu-dropdown gap-0.5 w-[220px] kt-scrollable-y-auto lg:overflow-visible max-h-[50vh]">
                       
                     
                       <div class="kt-menu-item">
                           <a class="kt-menu-link" href="{{ route('price.offers.indexadmin') }}">
                               <span class="kt-menu-title">
                                   Fiyat Teklifi İstekleri
                               </span>
                           </a>
                       </div>
                    

                         
                       <div class="kt-menu-item">
                           <a class="kt-menu-link" href="{{ route('admin.teklif.liste') }}">
                               <span class="kt-menu-title">
                                   Teklif Firmaları
                               </span>
                           </a>
                       </div>

                         
                       <div class="kt-menu-item">
                           <a class="kt-menu-link" href="{{ route('ulkeler.index') }}">
                               <span class="kt-menu-title">
                                   Ülkeler
                               </span>
                           </a>
                       </div>


                   </div>
               </div>
              @endif
              
           </div>
           <!-- End of Sidebar Menu -->

       </div>

   </div>

