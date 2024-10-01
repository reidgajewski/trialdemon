<?php
  session_start();

  if ($_SESSION["email"] != "reid@gmail.com") {
    header("Location: ./login?error=notallowed");
}

?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Auth Panel</title>
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
<body class="font-Inter ">

    
<!-- Nav -->
<section>
  <!-- mobile -->
  <section class="md:hidden shadow">
    <nav class="px-2 sm:px-4 md:mt-2 py-2.5 rounded font-inter">
      <div class="container flex flex-wrap justify-between items-center mx-auto">
        <div class="py-1 flex items-center">
            <img src="./trialdemon/public/imgs/logofinal.png" class=" mr-2 w-8 sm:w-8" />
            <span class="self-center text-xl sm:text-2xl font-semibold whitespace-nowrap text-announcement"></span>
        </div>
        <button data-collapse-toggle="mobile-menu"  type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden bg-gray-100 " aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg id="mobile-open" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          <svg id="mobile-close" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
          <ul class="md:flex  flex-1 justifry-end items-center gap-12 text-s">

            <?php
              if(isset($_SESSION["email"]))
              {
            ?>

            <li>
              <a href="./index" class="mt-4 sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Home</a>
            </li>
            <li>
              <a href="./account" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Account</a>
            </li>
            <li>
              <a href="./logout" class="sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Logout</a>
            </li>
            <li>
              <a href="./dashboard">
                <button type="button" class="mt-2 md:mt-0 bg-bookmark-purple text-white rounded-md px-10 py-3 hover:bg-purple-highlight">Dashboard</button>
              </a>
            </li>

            <?php
              } else {
            ?>

            <li>
              <a href="./index" class="mt-4 sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Home</a>
            </li>
            <li>
              <a href="./index#pricing" class="sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Pricing</a>
            </li>
            <li>
              <a href="./login" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Sign in</a>
            </li>
            <li>
              <a href="./signup">
                <button type="button" class="mt-2 md:mt-0 bg-bookmark-purple text-white rounded-md px-10 py-3 hover:bg-purple-highlight">Sign Up</button>
              </a>
            </li>

            <?php
              }
            ?>

          </ul>
        </div>
      </div>
    </nav>
  </section>
  <!-- desktop -->
  <section class="hidden md:block pt-1">
    <nav class="px-2 sm:px-4 md:mt-2 py-2.5 rounded font-inter">
      <div class="container flex flex-wrap justify-between items-center mx-auto">
        <div class="py-1 flex items-center">
            <img src="./trialdemon/public/imgs/logofinal.png" class="pb-0.5 sm:pb-1 mr-2 w-8 sm:w-8" />
            <span class="self-center text-xl sm:text-2xl font-semibold whitespace-nowrap text-announcement">TrialDemon</span>
        </div>
        <button data-collapse-toggle="mobile-menu"  type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden bg-gray-100 " aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg id="mobile-open" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          <svg id="mobile-close" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
          <ul class="md:flex  flex-1 justifry-end items-center gap-12 text-s">

            <?php
              if(isset($_SESSION["email"]))
              {
            ?>

            <li>
              <a href="./index" class="mt-4 sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Home</a>
            </li>
            <li>
              <a href="./account" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Account</a>
            </li>
            <li>
              <a href="./logout" class="sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Logout</a>
            </li>
            <li>
              <a href="./dashboard">
                <button type="button" class="mt-2 md:mt-0 bg-bookmark-purple text-white rounded-md px-10 py-3 hover:bg-purple-highlight">Dashboard</button>
              </a>
            </li>

            <?php
              } else {
            ?>

            <li>
              <a href="./index" class="mt-4 sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Home</a>
            </li>
            <li>
              <a href="./index#pricing" class="sm:mt-0 block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Pricing</a>
            </li>
            <li>
              <a href="./login" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 cursor-pointer md:text-bookmark-grey md:hover:underline md:underline-offset-4 md:hover:bg-transparent md:border-0 md:p-0">Sign in</a>
            </li>
            <li>
              <a href="./signup">
                <button type="button" class="mt-2 md:mt-0 bg-bookmark-purple text-white rounded-md px-10 py-3 hover:bg-purple-highlight">Sign Up</button>
              </a>
            </li>

            <?php
              }
            ?>

          </ul>
        </div>
      </div>
    </nav>
  </section>
</section>

    <!-- change password -->
    <section>
        <div class="min-h-full flex items-center justify-center pt-12 pb-5 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">

              <div>
                <img class="mx-auto h-12 w-auto" src="./trialdemon/public/imgs/face-small.png" alt="Workflow">
                <h2 class="mt-4 text-center text-3xl font-extrabold text-gray-900">Reset Temporary Password</h2>

              </div>
              <form id="tempPassForm" class="mt-8 space-y-6" method="post">
                <input type="hidden" name="remember" value="true">
                <input type="hidden" name="action" value="tempPassword">
                <div class="rounded-md shadow-sm -space-y-px">
                  <div>
                    <label for="email" class="sr-only">New Password</label>
                    <input name="email" type="email" id="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-bookmark-purple focus:border-bookmark-purple focus:z-10 sm:text-sm" placeholder="New password">
                  </div>
                  <div>
                    <label for="password" class="sr-only">New Password</label>
                    <input name="password" type="password" id="pwd" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-bookmark-purple focus:border-bookmark-purple focus:z-10 sm:text-sm" placeholder="New password">
                  </div>
               
                  <div>
                    <label for="password" class="sr-only">Repeat password</label>
                    <input name="pwdrepeat" type="password" id="pwdrepeat" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-bookmark-purple focus:border-bookmark-purple focus:z-10 sm:text-sm" placeholder="Repeat password">
                  </div>
                </div>
              </form>
              <div>
                  <button name="submit"  id="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white hover:text-bookmark-grey bg-bookmark-purple hover:bg-purple-highlight focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bookmark-purple">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                      <!-- Heroicon name: solid/lock-closed -->
                      <svg id="lockIcon" style="display: block" class="h-5 w-5 text-bookmark-white group-hover:text-bookmark-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                      </svg>
                      
                      <svg id="loadSpinner" style="display: none" role="status" class="mr-2 w-6 h-6 text-gray-200 animate-spin  fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                      </svg>
                    </span>
                    Change Password
                  </button>
              </div>
            </div>
          </div>
    </section>
    <div class=" flex items-center justify-center pt-0 pb-7 px-4 sm:px-6 lg:px-8">
      <div id="err" style="display: block" class="text-center text-sm text-error-red font-semibold ">

        <div id="placeholder" style="display: none" class="bg-[#FCD7D7] text-red-500 py-2 px-8 mb-2 w-full justify-center rounded-lg">
          <p>Your password must be at least 8 characters</p>
        </div>
        <div id="error" style="display: none" class="bg-[#FCD7D7] text-red-500 py-2 px-8 mb-2 w-full justify-center rounded-lg">
          <p></p>
        </div>
    </div>


   
 
<script src="./trialdemon/js/mobile.js"></script>
<script src="./trialdemon/js/adminpanel.js"></script>

</body>
</html>