<?php require base_path("views/partials/head.php") ?>
<main class="w-full min-h-screen flex items-center justify-center border lg:p-4">
    <div class="lg:w-[75%] w-full h-fit border p-4 shadow-lg lg:rounded-xl ">
        <section class="lg:flex lg:items-center lg:justify-between">
            <div class="min-w-0 flex-1">
                <div class="flex justify-between">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight"><?= htmlspecialchars($profile["name"]) ?></h2>
                    <form action="/logout" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Logout</button>
                    </form>
                </div>
                <div class="flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                    <div class="flex items-center text-lg text-gray-700">
                        <p class="mr-2 font-semibold">Division:</p>
                        <?= htmlspecialchars($profile["divisionName"]) ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-4 pr-8 pl-8">
            <h3 class="font-bold text-2xl mb-4">Student list</h3>
            <div class="flex justify-between gap-4 mb-4">
                <?php require base_path("views/partials/searchForm.php") ?>
                <div class="flex gap-2">
                    <?php require base_path("views/partials/dropDownStatus.php") ?>
                    <?php require base_path("views/partials/orderByYear.php") ?>
                    <div>
                        <a href="/<?=$_SESSION["user"]["level"] ?>">
                            <button id="orderDropdownDefaultButton" data-dropdown-toggle="orderDropdown" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs p-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Reset List
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="h-[500px] relative max-lg:overflow-x-scroll overflow-y-scroll">
                <table class="w-full lg:text-sm text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="lg:text-base text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="lg:px-6 lg:py-3  px-3 py-1">
                                Student Name
                            </th>
                            <th scope="col" class="lg:px-6 lg:py-3  px-3 py-1">
                                Coure and Year
                            </th>
                            <th scope="col" class="lg:px-6 lg:py-3  px-3 py-1">
                                Status
                            </th>
                            <th>
                                <button class="y-1 lg:px-5 px-2 lg:text-sm text-xs font-medium  focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg p-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Total: <?= $count ?>
                                </button>
                            </th>
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

                                <th scope="row" class="lg:px-6 lg:py-4 px-3 py-1 font-semibold text-gray-900 whitespace-nowrap ">
                                    <?= $status[$x]["name"] ?>
                                </th>
                                <td class="lg:px-6 lg:py-4 px-3 py-1">
                                    <?= $status[$x]["course"] ?> - <?= $status[$x]["year"] ?>
                                </td>
                                <td class="lg:px-6 lg:py-4 px-3 py-1">
                                    <?php if ($status[$x]["dean"] == 0) : ?>
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
                                    <?php if ($status[$x]["dean"] == 0) : ?>
                                        <form action="/<?=$_SESSION["user"]["level"] ?>/update" method="POST">
                                            <input type="hidden" name="_method" value="PATCH">
                                            <input type="hidden" name="value" id="" value="1">
                                            <input type="hidden" name="studentId" id="" value="<?= $status[$x]["studentId"] ?>">
                                            <input type="hidden" name="office" id="" value="dean">
                                            <button type="submit" class="py-1 lg:px-5  px-2 me-2 mb-2 lg:text-sm text-xs font-medium  focus:outline-none bg-white rounded border border-gray-200 hover:bg-gray-100 text-green-600 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Approve</button>
                                        </form>
                                    <?php else : ?>
                                        <form action="/<?=$_SESSION["user"]["level"] ?>/update" method="POST">
                                            <input type="hidden" name="_method" value="PATCH">
                                            <input type="hidden" name="value" id="" value="0">
                                            <input type="hidden" name="studentId" id="" value="<?= $status[$x]["studentId"] ?>">
                                            <input type="hidden" name="office" id="" value="dean">
                                            <button type="submit" class="py-1 lg:px-5 px-2 me-2 mb-2 lg:text-sm text-xs  font-medium  focus:outline-none bg-white rounded border border-gray-200 hover:bg-gray-100 text-red-600 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Disapprove</button>
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

<script src="assets/js/deanDropDown.js"></script>
<?php require base_path("views/partials/footer.php") ?>