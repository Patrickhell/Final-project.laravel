<x-app-layout>
    <x-popup-create-profile />
    <div id="stats" class="w-9/12 mx-auto mt-10" >

        <div class=" mywrapperstats flex flex-row flex-wrap justify-center gap-5 ">

            <div class=" mycard-stats basis-1/2 p-6 max-w-sm  rounded-lg shadow hover:scale-105 hover:duration-300 dark:bg-gray-800 dark:border-gray-700">
                
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-90 dark:text-white">Messaggi</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Numero di messaggi : 32</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                
            </div>

            <div class=" mycard-stats basis-1/2 max-w-sm p-6  rounded-lg shadow hover:scale-105 hover:duration-300 dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-90 dark:text-white">Recensioni</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Numero di recensioni : 32</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>

            <div class="lg:basis-11/12 md:basis-auto hover:scale-105 hover:duration-300 ole mycard-stats">
                {{-- <img id="imgstats" class="rounded-lg" src="https://images.devnews.it/tutorials/D3.js-graph/grafico-a-barre-con-d3js.png" alt="">--}} 
             {{--   <div class='barcontainer'>
                            <div class='barcontainerheader'>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-90 dark:text-white">Voti</h5>
                            </div>
                            <div class='bar h-5/6'>
                                bar
                                <div class='barlabel'>
                                    Gennaio
                                </div>
                            </div>
                            
                    </div>--}}
                    
<div style="width: 600px; margin: auto;">
    <canvas id="myChart"></canvas>
</div>


<script src="{{ mix('/js/app.js') }}"></script>

            </div>
      </div>
  </div>
  
 
  
            </div> 

            
            
           
            

        </div>
    </div>
</x-app-layout>