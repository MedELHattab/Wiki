<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki</title>
    <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Wiki, Wiki">
    <meta name="description" content=" Wiki for new wikis">

    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/dist/output.css">



</head>

<body class="dark:bg-gray-900">

    <!-- Navbar  -->
    <?php include "../app/View/includes/header.php" ?>
    <!-- Navbar  -->
    <div class="hero_section flex flex-row mt-[7em] mx-[7em] gap-x-3">
        <div class="p-4" style="border-left: 2px solid #004634;">Inscription</div>

        <div class="ml-auto">
            <button class="flex flex-row gap-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mt-6 org-text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"></path>
                </svg>
                <div class="p-4" style="border-bottom: 2px solid #FF6E01;"><a href="Signin">Retour</a></div>
            </button>
        </div>
    </div>
    <div class="border-black py-8 px-4 mb-20 mt-4 mx-[7em] border">
        <div class="flex gap-x-4 justify-center"><a href="Signin" class="opacity-20"><span class="org-text-shadow-disabled opacity-40 uppercase mt-8 md:ml-8 font-bold text-black text-xs md:text-lg">Déjà
                    Membre</span></a><a aria-current="page" href="Signup" class="router-link-active router-link-exact-active"><span class="org-text-shadow uppercase mt-8 md:ml-8 font-bold text-black text-xs md:text-lg" style="border-bottom: 2px solid #FF6E01;">Nouveau
                    Compte</span></a></div><!----><!---->
        <div class="flex justify-center gap-4 mt-8">
            <form class="w-full md:w-7/12 xl:w-5/12" data-gtm-form-interact-id="0" method="post" action="./Signup">
                <div>
                    <div><!---->
                        <div class="mb-6 relative"><label for="email"><span class="span-validation ps-3 text-red-500" id="email-error"></span></label>
                            <div class="flex"><input id="email" onkeyup="validateEmail()" class="text-base md:text-sm border-b w-full focus:outline-none border-gray-400 text-gray-700 placeholder-gray-800" name="email" type="email" autocomplete="on" placeholder="Email *"><!----></div>
                            <!---->
                        </div>
                    </div>

                    <div><!---->
                        <div class="mb-6 relative"><label for="name"><span class="span-validation ps-3 text-red-500" id="name-error"></span></label>
                            <div class="flex"><input id="name" onkeyup="validateName()" class="text-base md:text-sm border-b w-full focus:outline-none border-gray-400 text-gray-700 placeholder-gray-800" name="name" type="text" autocomplete="on" placeholder="Nom *"><!----></div>
                            <!---->
                        </div>
                    </div>
                    <div><!---->
                        <div class="mb-6 relative"><label for="phone"><span class="span-validation ps-3 text-red-500" id="phone-error"></span></label>
                            <div class="flex"><input id="phone" onkeyup="validatePhone()" class="text-base md:text-sm border-b w-full focus:outline-none border-gray-400 text-gray-700 placeholder-gray-800" name="phone" type="text" autocomplete="on" placeholder="phone *"><!----></div>
                            <!---->
                        </div>
                    </div>
                    <div><!---->
                        <div class="mb-6 relative"><label for="password"><span class="span-validation ps-3 text-red-500" id="password-error"></span></label>
                            <div class="flex"><input id="password" onkeyup="validatePassword()" class="text-base md:text-sm border-b w-full focus:outline-none border-gray-400 text-gray-700 placeholder-gray-800" name="password" type="password" autocomplete="off" placeholder="Mot de passe *"></div><!---->
                        </div>
                    </div>
                    <div><!---->
                        <div class="mb-6 relative"><label for="confirmPassword"><span class="span-validation ps-3 text-red-500" id="confirmPassword-error"></span></label>
                            <div class="flex"><input id="confirmPassword" onkeyup="validateConfirmPassword()" class="text-base md:text-sm border-b w-full focus:outline-none border-gray-400 text-gray-700 placeholder-gray-800" name="confirmPassword" type="password" autocomplete="off" placeholder="Confirmer le mot de passe *">
                            </div><!---->
                        </div>
                    </div>
                    <div class="flex gap-x-2 text-xs mb-4 org-text-primary"><input type="checkbox" data-gtm-form-interact-field-id="0">
                        <div class="flex flex-col gap-x-2">
                            <div> En utilisant ce site Web, en achetant un billet ou en créant un compte, vous acceptez
                                <a href="CGV" target="_blank" rel="noopener noreferrer" class="text-inherit hover:text-inherit cursor-pointer underline font-semibold"> les
                                    conditions d'utilisation </a> et la politique de confidentialité
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-4 items-center justify-center mt-8"><button onclick="return validateForm()" type="submit" class="bg-[#004634] text-white font-bold py-2 px-4 border rounded" style="background-color: #004634;">
                            S'inscrire
                        </button>
                        <span class="span-validation ps-3 text-red-500" id="send-error"></span>
                    </div>
                </div><!---->
            </form>
        </div>
    </div>
    <?php include "../app/View/includes/footer.php"; ?>
    <!-- / Footer   -->

    <!-- / For dark mode -->
    <script src="public/assets/js/darkmode.js"></script>
    <script src="<?= URL_DIR ?>public/assets/js/validation.js"></script>
    <!-- / For navbar mobile -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/e80051e55f.js" crossorigin="anonymous"></script>
</body>

</html>