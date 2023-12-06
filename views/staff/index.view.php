<?php require base_path("views/partials/head.php") ?>
<main class="w-full h-screen flex items-center justify-center">
    <div class="w-[60%] border p-4 shadow-lg rounded-xl">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight"><?= htmlspecialchars($profile["name"]) ?></h2>
                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                    <div class="mt-2 flex items-center text-sm text-gray-700">
                        <p class="mr-2 font-semibold">Office:</p>
                        <?= htmlspecialchars($profile["officeName"]) ?>
                    </div>
                    <!-- <div class="mt-2 flex items-center text-sm text-gray-700">
                        <p class="mr-2 font-semibold">Division: </p>
                        
                    </div> -->
                </div>
            </div>
        </div>
        <div class="mt-4 pr-8 pl-8">
            <h3 class="font-bold text-2xl mb-4">Student list</h3>
            <div>
                <form>
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for Student Name.." required>
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Office name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th></th>
                            <th></th>
                            <!-- <th scope="col" class="px-6 py-3">
                                    Category
                                </th> -->
                            <!-- <th scope="col" class="px-6 py-3">
                    Price
                 </th> -->
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php require base_path("views/partials/footer.php") ?>