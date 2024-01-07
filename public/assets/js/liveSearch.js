//search for projects
$(document).ready(function(){
    $("#searchinput").keyup(function(){
        var input = $(this).val();
        if(input != ""){
            $.ajax({
                url:"Home/livesearch",
                method:"post",
                data: { query: input },
                success: function(res){
                    console.log(JSON.parse(res));
                    displayMatches(JSON.parse(res));
                }
            });
        }
    })

});

//search by date range
$(document).ready(function(){
    $("#searchbutton").click(function(){ 
        var startDate = $("#startDateInput").val(); 
        var endDate = $("#endDateInput").val(); 
        

        if(startDate !== "" && endDate !== ""){
            $.ajax({
                url: "Home/searchByDateRange", 
                method: "post",
                data: { 
                    start_date: startDate,
                    end_date: endDate 
                },
                success: function(res){
                    // console.log(JSON.parse(res));
                    displayMatches(JSON.parse(res));
                }
            });
        }
    });
});

function displayMatches(matche){
    let matchcontainer = document.getElementById("match-container");
    matchcontainer.innerHTML="";
    matche.forEach(matche => {
        matchcontainer.innerHTML += `
        <div  class="match-card-display  mx-3 mt-6 flex flex-col rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-gray-800 sm:shrink-0 sm:grow sm:basis-0">
        <a href="#!">
            <img class="rounded-t-lg" src="public/assets/uploads/${matche.image}" alt="football" />
        </a>
        <div class="p-5">
            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                 ${matche.team1} VS ${matche.team2} 
            </h5>
            <p class=" text-base text-neutral-600 dark:text-neutral-200">
                Experience the thrill at <strong>${matche.stadiumName}</strong> , where <strong>${matche.team1}</strong> 
                and <strong>${matche.team2}</strong> 
                face off in an epic showdown on <strong>${matche.matchDay}</strong> Don't miss the action secure your tickets now and join us for an unforgettable match day! Buy your tickets today to witness the magic live in the stadium!
            </p>
        </div>
        <div class="p-3 flex justify-end">
            <a href="buyTicket\\index\\${matche.id}" class="text-orange border border-orange py-2 px-3 rounded inline-flex  items-center">
                Buy Ticket
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 ml-2">
                    <path d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
        <div class="mt-auto border-t-2 border-neutral-100 px-6 py-3 text-center dark:border-neutral-600 dark:text-neutral-50">
            <small> ${matche.matchDay}</small>
        </div>
    </div>
        
        `  
    });
}