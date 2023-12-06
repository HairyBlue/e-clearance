<?php require base_path("views/partials/head.php") ?>
<main class="w-full h-screen flex items-center justify-center">
    <div class="w-[60%] border p-4 shadow-lg rounded-xl ">
        <section class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <div class="flex justify-between">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight"><?= htmlspecialchars($profile["name"]) ?></h2>
                    <form action="/logout" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Logout</button>
                    </form>
                </div>

                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                    <div class="mt-2 flex items-center text-sm text-gray-700">
                        <p class="mr-2 font-semibold">Office:</p>
                        <?= htmlspecialchars($profile["officeName"]) ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-4 pr-8 pl-8">
            <h3 class="font-bold text-2xl mb-4">Student list</h3>
            <div class="flex justify-between gap-4 mb-4">
                <?php require base_path("views/partials/searchForm.php") ?>
                <div class="flex gap-2">
                    <?php require base_path("views/partials/orderByYear.php") ?>
                    <?php require base_path("views/partials/dropDownDivision.php") ?>
                    <div>
                        <a href="/staff">
                            <button id="orderDropdownDefaultButton" data-dropdown-toggle="orderDropdown" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs p-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Reset List
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="h-[500px] relative overflow-x-hidden overflow-y-scroll">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Student Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Coure and Year
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Division
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
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
                        <?php for ($x = 0; $x < count($status); $x++) : ?>
                            <tr>

                                <th scope="row" class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $status[$x]["name"] ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $status[$x]["course"] ?> - <?= $status[$x]["year"] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $status[$x]["divisionName"] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if ($status[$x][$profile["officeName"]] == 0) : ?>
                                        <span class="text-red-600">
                                            Pending
                                        </span>
                                    <?php else : ?>
                                        <span class="text-green-600">
                                            Done
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($status[$x][$profile["officeName"]] == 0) : ?>
                                        <form action="/staff/update" method="POST">
                                            <input type="hidden" name="_method" value="PATCH">
                                            <input type="hidden" name="value" id="" value="1">
                                            <input type="hidden" name="studentId" id="" value="<?= $status[$x]["studentId"] ?>">
                                            <input type="hidden" name="office" id="" value="<?= $profile["officeName"] ?>">
                                            <button type="submit" class="py-1 px-5 me-2 mb-2 text-sm font-medium  focus:outline-none bg-white rounded border border-gray-200 hover:bg-gray-100 text-green-600 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Approve</button>
                                        </form>
                                    <?php else : ?>
                                        <form action="/staff/update" method="POST">
                                            <input type="hidden" name="_method" value="PATCH">
                                            <input type="hidden" name="value" id="" value="0">
                                            <input type="hidden" name="studentId" id="" value="<?= $status[$x]["studentId"] ?>">
                                            <input type="hidden" name="office" id="" value="<?= $profile["officeName"] ?>">
                                            <button type="submit" class="py-1 px-5 me-2 mb-2 text-sm font-medium  focus:outline-none bg-white rounded border border-gray-200 hover:bg-gray-100 text-red-600 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Disapprove</button>
                                        </form>
                                    <?php endif; ?>

                                </td>
                            <?php endfor; ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</main>

<script src="assets/js/dropdown.js"></script>
<?php require base_path("views/partials/footer.php") ?>