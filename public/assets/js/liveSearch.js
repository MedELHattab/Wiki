//search for Wikis
$(document).ready(function () {
    $("#searchinput").keyup(function () {
      var input = $(this).val();
      if (input != "") {
        $.ajax({
          url: "Home/search",
          method: "post",
          data: { search: input },
          success: function (res) {
            // console.log(JSON.parse(res));
            displayWikis(JSON.parse(res));
          },
        });
      }
    });
  });



  function displayWikis(wiki) {
    let WikisContainer = document.getElementById("wikis-container");
    WikisContainer.innerHTML = "";
    wiki.forEach((wiki) => {
      WikisContainer.innerHTML += 
      `
      <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                            <div class="rounded-lg h-64 overflow-hidden">
                                <img alt="content" class="object-cover object-center h-full w-full" src="<?= URL_DIR ?>public/assets/images/LogoWiki.svg" />
                            </div>
                            <h2 class="text-xl font-medium title-font text-gray-900 mt-5">
                                ${wiki.wiki_title}
                            </h2>
                            <h2 class="text-xl font-medium title-font text-gray-900 mt-5">
                                ${wiki.Categorie_Name}
                            </h2>
                            <p class="text-base leading-relaxed mt-2 dark:text-white">
                                ${wiki.content}
                            </p>
                            <a class="text-green-500 inline-flex items-center mt-3" href="wikipage">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>  `
  });
}