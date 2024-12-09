<div>
    <div class="py-4 px-4 grid grid-cols-2 md:grid-cols-4 gap-4 bg-white dark:bg-gray-800 shadow-lg rounded-lg mb-4">
        <!-- Total Wines -->
        <div class="p-4 bg-blueGray-50 dark:bg-gray-900 text-center rounded-lg shadow">
            <h4 class="text-sm font-semibold text-blueGray-700 dark:text-white">Total Wines</h4>
            <p class="text-2xl font-bold text-indigo-500">{{ $totalWines }}</p>
        </div>
        <!-- Whites Tried -->
        <div class="p-4 bg-blueGray-50 dark:bg-gray-900 text-center rounded-lg shadow">
            <h4 class="text-sm font-semibold text-blueGray-700 dark:text-white">Whites Liked / Tried</h4>
            <p class="text-2xl font-bold text-indigo-500">{{ $totalWhitesLiked }}/{{ $totalWhites }} = {{ $whitesPercentage }}%</p>
        </div>
        <!-- Reds Tried -->
        <div class="p-4 bg-blueGray-50 dark:bg-gray-900 text-center rounded-lg shadow">
            <h4 class="text-sm font-semibold text-blueGray-700 dark:text-white">Reds Liked / Tried</h4>
            <p class="text-2xl font-bold text-indigo-500">{{ $totalRedsLiked }}/{{ $totalReds }} - {{ $redsPercentage }}%</p>
        </div>
    </div>

</div>
