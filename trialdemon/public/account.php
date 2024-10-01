<?php
  session_start();
?>

<?php
    if (!$_SESSION["email"]) {
        header("Location: ./login?next=account");
    }
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1">
  <title>Account</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./trialdemon/public/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="icon" type="image/x-icon" href="./trialdemon/public/imgs/logofinal.png">
  <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-YDH873B4DR"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-YDH873B4DR');
  </script>

</head>
<body class="">

<div class="min-h-full">
  <nav class="bg-[#181c2c]">
    <!-- Desktop stuff -->
    <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <a href="./index">
            <img class="h-8 w-8" src="./trialdemon/public/imgs/logofinal.png" alt="Your Company">
            </a>
          </div>
          <!-- Desktop links -->
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="./dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" >Dashboard</a>

              <a href="./list" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Free trial list</a>

              <a href="./features?hide=true" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Savings calculator</a>

              <a href="./referral" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Referral Program</a>

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
        <a href="./dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>

        <a href="./list" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Free trial list</a>

        <a href="./features?hide=true" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Savings Calculator</a>

        <a href="./referral" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Referral Program</a>


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
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Account</h1>
    </div>
  </header>

<!-- Account -->
<section>
    <div class="min-h-full flex items-center justify-center pt-1 sm:pt-5 pb-0 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 ">
            <div>
                <!-- <img class="mx-auto h-10 sm:h-12 w-auto" src="./trialdemon/public/imgs/logofinal.png" alt="Workflow"> -->
                
            </div>
            <div id="form" class="mt-20 rounded-2xl p-6 bg-gray-100">
                <label for="email" class="block text-xl font-bold text-gray-900 ">Account details</label>
                <label for="email" class="mt-2 block text-sm font-medium text-gray-900 ">Your email</label>
                <input disabled type="email" id="email" class="mt-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

          
                </input>
                </a>

                <div class="mt-4">
                <a href="./changepassword">
                <button id="changePassword" class="mt-4 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white hover:text-bookmark-grey bg-bookmark-purple hover:bg-purple-highlight focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bookmark-purple">
                Change password
                </button>
                </a>
            </div>
            </div>
            
        </div>
    </div>
</section>


<!-- cardholder info -->
<div class="min-h-full flex items-center justify-center px-4 sm:px-6 lg:px-8  ">
    <div class="bg-gray-100  max-w-md w-full p-6 rounded-2xl mt-8">
        <label  class="block text-2xl font-bold text-gray-900">Card information</label>
        <label  class="mb-2 block text-sm font-medium text-gray-500">Make sure this information is accurate, or your card will not work</label>
        <div class="col-span-6 cursor-pointer space-y-2">
            <form id="updateCardHolderForm" method="post" >
            <input type="hidden" name="action" value="updateCardHolder">
                <!-- first and last name -->
                <div class="flex space-x-2">
                    <div class="flex-1 rounded-br-2xl">
                        <label for="firstname" class="mt-1 block text-sm font-medium text-gray-900 ">First name</label>
                        <input name="firstname" type="text" id="firstname" required class="mt-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Your first name">
                    </div>


                    <div class="flex-1 rounded-br-2xl">
                        <label for="lastname" class="mt-1 block text-sm font-medium text-gray-900 ">Last name</label>
                        <input name="lastname" type="text" id="lastname" required class="mt-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Your last name">
                    </div>
                </div>

                <!-- address -->
                <div>
                    <label for="address" class="mt-4 block text-sm font-medium text-gray-900 ">Address</label>
                    <input id="address" name="address" type="text" class="mt-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Your address">
                </div>

                <!-- address extra info -->
                <div class="flex space-x-2">
                    <div class="flex-1">
                        <label for="city" class="mt-4 block text-sm font-medium text-gray-900 ">City</label>
                        <input id="city" name="city" type="text" class="mt-2 mr-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="City">
                    </div>

                    <div class="flex-1">
                        <label for="state" class="mt-4 block text-sm font-medium text-gray-900 ">State</label>
                        <input id="state" name="state" type="text" class="mt-2 mr-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="State">
                    </div>

                    <div class="flex-1">
                        <label for="zip" class="mt-4 block text-sm font-medium text-gray-900 ">Zip</label>
                        <input id="zip" name="zip" type="text" class="mt-2 mr-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="Zip">
                    </div>
                </div>

            </form>
            <div class="mt-4">
                <button name="submit" id="update" class="mt-4 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white hover:text-bookmark-grey bg-bookmark-purple hover:bg-purple-highlight focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bookmark-purple">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <!-- Heroicon name: solid/lock-closed -->
                    <svg id="lockIcon" style="display: block" class="h-5 w-5 text-bookmark-white group-hover:text-bookmark-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    
                    <svg id="loadSpinner" style="display: none" role="status" class="mr-2 w-6 h-6 text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                </span>
                Update card
                </button>
            </div>
        </div>
    </div>
</div>


<!--  subscription button -->
<div class="min-h-full flex items-center justify-center px-4 sm:px-6 lg:px-8 mb-8 ">
    <div class="bg-gray-100  max-w-md w-full p-6 rounded-2xl mt-8">
        <label  class="block text-2xl font-bold text-gray-900">Subscription</label>
        <p id="subscriptionHeader" class="mb-2 block text-sm font-medium text-gray-500"></p>
        <p id="subscriptionInfo" style="display:none" class="mb-2 block text-sm font-medium text-gray-500"></p>
        <div class="col-span-6 cursor-pointer space-y-2">
            
            <div class="mt-4">
                <button id="openPortal" style="display: none" class="mt-4 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-bookmark-purple hover:bg-purple-highlight focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bookmark-purple">   
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <!-- Heroicon name: solid/lock-closed -->

                    
                    <svg id="subSpinner" style="display: none" role="status" class="mr-2 w-6 h-6 text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                </span>       
                Open billing portal
                </button>
            </div>
        </div>
    </div>
</div>

<div class="flex justify-center text-sm mb-8 px-4">
  Have any questions? Email hello@trialdemon.com
</div>

<!-- error modal -->
<div style="visibility: hidden" id="error_div">
  <div class=" backdrop-filter backdrop-blur shadow-sm fixed inset-x-0 bottom-0 mb-6 mx-auto z-50 p-2 w-3/4 md:w-84 lg:w-90 xl:w-90 rounded-lg bg-[#FCD7D7]">
    <div class=" text-center">
      <h3  class="text-sm leading-6 text-error-red "><span class="font-semibold">Error! </span> <span id="error_text">Make sure your info is accurate</span> </h3>
    </div>
  </div>
</div>

<!-- Success modal -->
<div style="visibility: hidden" id="success_div">
  <div class=" backdrop-filter backdrop-blur shadow-sm fixed inset-x-0 bottom-0 mb-6 mx-auto z-50 p-2 w-3/4 md:w-84 lg:w-90 xl:w-90 rounded-lg bg-green-100">
    <div class=" text-center">
      <h3  class="text-sm leading-6 text-green-700"><span class="font-semibold">Success! </span> Your card was updated</h3>
    </div>
  </div>
</div>
</div>

<!-- trying to cancel? -->
<div style="display: none" id="cancel-modal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

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
              <h3 class="text-lg leading-6 font-medium text-gray-900">Are you looking to cancel your subscription?</h3>
              <p class="text-sm mt-1 text-gray-400">Please select an option</p>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse space-y-2 sm:space-y-0">
          <a href="./cancel">
            <button type="button"  id="cancelSub" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-error-red text-base font-medium text-white hover:bg-[#bc1717]  sm:ml-3 sm:w-auto sm:text-sm">
              Cancel subscription
            </button>
          </a>
          <button type="button"  id="no-billing" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-bookmark-purple text-base font-medium text-white hover:bg-purple-highlight focus:outline-none focus:ring-2 focus:ring-offset-2 focus:purple-highlight sm:ml-3 sm:w-auto sm:text-sm">
            Nope, just billing
          </button>
          <button type="button" id="cancelClose" class=" w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50  sm:mt-0 sm:ml-0 sm:w-auto sm:text-sm">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>







<script src="./trialdemon/js/account.js"></script>   
<script src="./trialdemon/js/mobile.js"></script>
</body>
</html>

