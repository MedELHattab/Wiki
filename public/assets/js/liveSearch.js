const search = document.getElementById("search");
const btn = document.getElementById("btn");
const container = document.getElementById("container");
search.addEventListener("keyup", () => {
  // Code to be executed when a key is released
  // You can access the input value using search.value
  const inputValue = search.value;

  container.innerHTML = "";
  load();
  // Add your logic here based on the input value
  console.log("Input Value:", inputValue);
});

function load() {
  fetch(`../matchs/index1/?name=${search.value}`) //api for the get request
    .then((response) => response.json())
    .then((data) =>
      data.forEach((element) => {
        container.innerHTML += `
        <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                <div class="bg-[#fdfdfd] rounded-lg overflow-hidden mb-10 border">
                    <img src="../public/assets/images/afcon-draw-4-d.webp" alt="image" class="w-full">
                    
                    <div class="pt-2 pr-8 pb-5 pl-3 sm:pt-2 sm:pr-8 sm:pb-5 sm:pl-3 md:pt-2 md:pr-8 md:pb-5 md:pl-3 xl:pt-2 xl:pr-8 xl:pb-5 xl:pl-3 text-center">
                        <p class="text-base text-body-color leading-relaxed mb-7 text-left font-libre-franklin border-solid border-0 border-e5e7eb box-border font-normal text-003">
                        ${element.DateHeure}
                        </p>
                        
                        <h3 class="mb-6">
                            <a href="javascript:void(0)" class="text-left font-semibold text-dark text-xl sm:text-2xl md:text-xl lg:text-2xl xl:text-xl 2xl:text-2xl block hover:text-primary relative pl-5">
                                <div class="org-section-card-border absolute top-0 left-0 w-1 h-full bg-green-600 pr-1"></div>
                                ${element.EquipeDomicile} VS ${element.EquipeExterieur}
                            </a>
                        </h3>

                        <p class="flex items-center text-base text-body-color leading-relaxed mb-7 text-left font-libre-franklin border-solid border-0 border-e5e7eb box-border font-normal text-003">
                            <svg class="mx-4" fill="#000000" height="20px" width="20px" version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" xml:space="preserve">
                                <path d="M89.2,26.9v11.8c5.6,1.8,8.8,4.1,8.8,6.5c0,3.4-6.3,6.4-16.3,8.5c0.2-0.1,0.3-0.2,0.5-0.4c4-1.3,6.3-2.9,6.3-4.5
            c0-4.6-17.5-8.3-39-8.3c-21.5,0-39,3.7-39,8.3c0,2,3.3,3.9,8.9,5.3C8.2,52,1,48.8,1,45.2c0-2.5,3.5-4.8,9.4-6.7V26.9v-6.2H12h9.9
            v6.2H12V38c0.4-0.1,0.8-0.2,1.2-0.3c4.9-1.3,11.2-2.3,18.2-3c0.7-0.1,1.3-0.1,2-0.2c4.9-0.4,10.2-0.6,15.7-0.6c0.2,0,0.3,0,0.5,0
            c0.1,0,0.3,0,0.4,0v-9.9v-6.2h1.6h9.9v6.2h-9.9v9.9c14.6,0.1,27.5,1.8,36,4.3V26.9v-6.2h1.6h9.9v6.2H89.2z M1.6,54l4,20.5l1.6,14.6
            c2,1.4,4.8,2.6,8.3,3.7V80.2c0-3.8,3.1-6.9,6.9-6.9h0c3.8,0,6.9,3.1,6.9,6.9v15.5c4.1,0.6,8.6,1,13.3,1.2V80.2
            c0-3.8,3.1-6.9,6.9-6.9s6.9,3.1,6.9,6.9V97c4.7-0.2,9.2-0.5,13.3-1.1V80.2c0-3.8,3.1-6.9,6.9-6.9s6.9,3.1,6.9,6.9v13
            c3.2-0.9,6-2,8.1-3.1l2-16.7L97.4,54c-6,3.9-25.2,8.3-47.9,8.3C26.8,62.3,7.6,57.9,1.6,54z"></path>
            </svg>
            ${element.NomStade}
            </p>
            <!-- <p class="text-base text-body-color leading-relaxed mb-7">
            Lorem ipsum dolor sit amet pretium consectetur adipiscing
              elit. Lorem consectetur adipiscing elit.
              </p> -->

              <a href="javascript:void(0)">
              <button class="transition-all duration-100 text-center p-2 rounded-md text-white w-1/2 bg-gradient-to-r from-orange-700 to-orange-500 hover:shadow-md hover:from-orange-800 hover:to-orange-600">
              View Details
              </button>
                        </a>
                        </div>
                        </div>
                        </div>`;
      })
    );
}
load();

function clicked() {
  console.log(search.value);
}
