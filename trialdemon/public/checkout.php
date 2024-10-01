<?php
  session_start();
  $plan = $_GET["plan"];
  if ($plan === "weekly") {
      $planName = "Weekly Plan";
      $planPrice = "3.00";
      $period = "week";
      $api_id = "price_1L8UxaIUyyqkBxkCZerEUixx";
  } else if ($plan === "yearly") {
    $planName = "Yearly Plan";
    $planPrice = "50.00";
    $period = "year";
    $api_id = "price_1MUg6bIUyyqkBxkCtZ7Agls5";
  } else {
      $planName = "Monthly Plan";
      $planPrice = "6.00";
      $period = "month";
      $api_id = "price_1L8UxkIUyyqkBxkCUJt5Sfxp";
  }
?>

<?php
    if (!$_SESSION["email"]) {
        header("Location: ./login?next=checkout");
    }
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1">
  <title>Subscribe</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./trialdemon/public/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="icon" type="image/x-icon" href="./trialdemon/public/imgs/logofinal.png">
  <script src="https://js.stripe.com/v3/"></script>
  <style>
    .StripeElement--focus {
      border: 1px solid #0856ec
    }
  </style>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-YDH873B4DR"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-YDH873B4DR');
  </script>

<!-- tiktok -->
  <script>
    !function (w, d, t) {
      w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};

      ttq.load('CF87OSBC77U0H42CLGP0');
      ttq.page();
    }(window, document, 'ttq');
  </script>

</head>
<body class="">

<div class="min-h-full">   
<!-- nav -->
  <nav class="bg-[#181c2c]">
    <!-- Desktop stuff -->
    <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="./trialdemon/public/imgs/logofinal.png" alt="Your Company">
          </div>
          <!-- Desktop links -->
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="./dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>

              <a href="./list" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Free trial list</a>

              <a href="./features" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Savings calculator</a>

            </div>
          </div>
        </div>
        <!-- desktop profile -->
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button id="desktopDropdownButton" class="flex max-w-xs items-center rounded-full  text-sm "  aria-expanded="false" >
                  <svg id="desktopClosed" style="display: block" class=" h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
                  <svg id="desktopOpen" style="display: none" class=" h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
              <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div id="desktopDropdown" style="display: none" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" >
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="./account" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Account</a>

                <a href="./logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 pr-1 flex md:hidden">
          <!-- Mobile menu button -->
          <button  id="mobileButton" class="inline-flex items-center justify-center rounded-md p-2  bg-gray-700 text-white outline-none  ring-offset-2 ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
              Heroicon name: outline/bars-3

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg id="mobileOpen" style="display: block" class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Heroicon name: outline/x-mark

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg id="mobileClose" style="display: none" class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div style="display: none" class=" md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="./dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

        <a href="./list" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Free trial list</a>

        <a href="./features" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Savings Calculator</a>


      </div>
      <div class="border-t border-gray-700 pt-2 pb-3">
        <div class="flex items-center px-5">
     
        </div>
        <div class=" space-y-0 px-2">
          <a href="./account" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Account</a>

          <a href="./logout" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <header class="bg-white shadow">
    <div class="mx-auto max-w-full py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Subscribe</h1>
    </div>
  </header>




<!-- selected plan -->
<section class="flex justify-center mt-4 sm:mt-8 " >
  <h1 class="sr-only">Subscribe</h1>

  <div class="w-11/12 md:w-3/5 lg:w-3/5 xl:w-2/5 ">

    <div class="grid grid-cols-1">
      

      <div class="py-4 bg-white rounded-2xl md:py-6">
        <div class=" px-2  lg:px-8">
          <div class="grid grid-cols-6 gap-6">



            <div class="col-span-6 ">
            
        
         
            <div class="px-6 py-5  bg-[#fcfcfc] rounded-2xl shadow-sm border border-gray-200 ">

                <h5 class="mb-4 text-xl font-medium text-gray-500 "><?php echo $planName?></h5>
                <div class="flex items-baseline text-gray-900 ">
                <span class="text-3xl font-semibold">$</span>
                <span class="text-5xl font-extrabold tracking-tight"><?php echo $planPrice?></span>
                <span class="ml-2 text-xl font-normal text-gray-500 "> /<?php echo $period?></span>
                </div>

                <ul role="list" class="mt-7 space-y-2">

      

                <li class="flex space-x-3">
                <svg class="flex-shrink-0 w-5 h-5 text-bookmark-purple " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span class="text-base font-normal leading-tight text-gray-500 ">24/7 support</span>
                </li>

                <li class="flex space-x-3">
                <svg class="flex-shrink-0 w-5 h-5 text-bookmark-purple " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span class="text-base font-normal leading-tight text-gray-500 ">Cancel any time in the dashboard</span>
                </li>

                <li class="flex space-x-3">
                <svg class="flex-shrink-0 w-5 h-5 text-bookmark-purple mb-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span class="text-base font-normal leading-tight text-gray-500 ">Unlock unlimited free trials</span>
                </li>

  
  

                </ul>
      
            </div>
           
        </div>
  
        </div>
          
        </div>
      </div>
    </div>
  </div>
</section>


<section class="flex justify-center mt-0 mb-2 " >
    <div class="w-11/12 md:w-3/5 lg:w-3/5 xl:w-2/5 ">
        <div class="grid grid-cols-1">
            <div class="py-4 bg-white rounded-2xl md:py-6">
                <div class=" px-2  lg:px-8">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 ">
                           
                            <form id="customerForm" method="post">

                                <div class="col-span-6 mb-4">
                                    <label class="block mb-1 text-sm text-gray-900" >
                                        Full Name
                                    </label>

                                    <input
                                        class="rounded-lg shadow-sm border border-gray-300 w-full text-sm p-2.5 placeholder-[#6b7280] "
                                        type="text"
                                        id="fullName"
                                        placeholder="John Appleseed"
                                    />
                                    <input type="hidden" name="action" value="newcustomer">
                                    <?php
                                        if($plan === "weekly") {
                                    ?>
                                        <input id="api" type="hidden" name="pricing" value="price_1L8UxaIUyyqkBxkCZerEUixx">
                                    <?php 
                                        } else if($plan === "monthly") {
                                    ?>
                                        <input id="api" type="hidden" name="pricing" value="price_1L8UxkIUyyqkBxkCUJt5Sfxp">
                                    <?php 
                                        } else { 
                                    ?>
                                        <input id="api" type="hidden" name="pricing" value="price_1MUg6bIUyyqkBxkCtZ7Agls5">
                                    <?php 
                                        } 
                                    ?>
                                </div>
                            </form>
                            <form id="payment-form">
                                <label class="block mb-1 text-sm text-gray-900" >
                                    Card Info
                                </label>
                                <div id="card-element" class="rounded-lg border shadow-sm border-gray-300 w-full text-md p-3 focus:border-bookmark-purple">
                                    <!-- Elements will create input elements here -->
                                </div>

                                <!-- We'll put the error messages in this element -->
                                <div id="card-element-errors" role="alert"></div>
                                <div class="col-span-6">
                                    <button id="btn" type="submit"  class="mt-8 mb-3 group relative w-full flex justify-center py-3 px-4 border border-transparent text-md font-medium rounded-md text-white hover:text-bookmark-grey bg-bookmark-purple hover:bg-purple-highlight focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bookmark-purple">
                                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                            <svg id="lockIcon" style="display: block" class="h-5 w-5 text-bookmark-white group-hover:text-bookmark-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                            </svg>
                                            
                                            <svg id="loadSpinner" style="display: none" role="status" class="mr-2 w-6 h-6 text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                            </svg>
                                        </span>
                                    Subscribe
                                    </button>
                                    <p class="text-sm text-gray-900 text-center mb-2">Secure checkout powered by Stripe</p>
                                    <p class="text-sm text-gray-600 text-center mb-12"><span id="refundPolicy" class="underline cursor-pointer">Refund Policy </span></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<!-- error modal -->
<div style="visibility: hidden" id="error_div">
  <div class=" backdrop-filter backdrop-blur shadow-sm fixed inset-x-0 bottom-0 mb-6 mx-auto z-50 p-2 w-3/4 md:w-84 lg:w-90 xl:w-90 rounded-lg bg-[#FCD7D7]">
    <div class=" text-center">
      <h3  class="text-sm leading-6 text-error-red "><span class="font-semibold">Error! </span> <span id="error_text">Make sure your info is accurate</span> </h3>
    </div>
  </div>
</div>

<!-- refund modal -->
<div style="display: none" id="refundModal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-full p-4 text-center sm:p-0">

      <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full  sm:mx-0 sm:h-10 sm:w-10">
              <!-- Heroicon name: outline/exclamation -->
              <i class="text-4xl text-gray-900 fa-solid fa-circle-info"></i>
     
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Refund Policy</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">If you don't like TrialDemon, you can request a refund within 24 hours after subscribing. You can also cancel your subscription any time in the dashboard</p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" id="refundClose" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50  sm:mt-0 sm:ml-0 sm:w-auto sm:text-sm">Okay</button>
        </div>
      </div>
    </div>
  </div>
</div>

</div>


<script src="./trialdemon/js/subscribe.js"></script>
<script src="./trialdemon/js/faq.js"></script>
</body>
</html>