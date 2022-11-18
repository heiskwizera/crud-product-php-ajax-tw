<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud - App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
</head>


<style>
    .title {

        font-family: 'Quicksand';
    }
</style>

<body>

    <?php
    include "includes/header.php"
    ?>

    <br>
    <h1 class="font-bold px-6 text-center  font-bold" style="font-size: 30px;">Products Management</h1>
    <br>


    <section class="w-8/12 text-center lg:ml-64">

        <button class="bg-black text-white mt-1 mx-auto inline-block rounded-full px-3 py-1.5 text-base" type="button" data-modal-toggle="newProduct" id="addProduct">New Product</button>
        <BR></BR>




        <div class="overflow-x-auto relative shadow-md sm:rounded-lg ">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="dataContents">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Product name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Manufacturer
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Product Price
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Category
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include "dao.php";
                    $sql = getProducts();
                    $op = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($op)) {
                    ?>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $row['pname']; ?>
                            </th>
                            <td class="py-4 px-6">
                                <?php echo $row['pcat']; ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo $row['pprice']; ?>
                            </td>
                            <td class="py-4 px-6">
                                <?php echo $row['pbrand']; ?>
                            </td>
                            <td class="py-4 px-6">
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="editMe('<?php echo $row['pid']; ?>')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="deleteMe('<?php echo $row['pid']; ?>')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </section>

    <section class=" mt-24">
        <?php
        include "includes/footer.php";
        ?>

    </section>





    <!-- Main modal -->
    <div id="newProduct" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full lg:ml-60 lg:mb-24 ">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto ">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600 bg-blue-500">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add Product
                    </h3>

                    <button type="button" id="cls" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="space-y-6">
                    <div class="relative z-10 w-full max-w-2xl  ">
                        <div class="relative z-10 flex flex-col items-start justify-start p-10  rounded-xl">
                            <div id="err" class="bg-red-600 text-center rounded-full w-1/2 px-5">

                            </div>
                            <div id="succ" class="bg-green-600 text-center rounded-full w-1/2 px-5">

                            </div>
                            <form id="saver" class="relative w-full mt-6 space-y-8">
                                <div class="relative">
                                    <label class="absolute px-2 ml-2 -mt-3 font-small text-gray-600 bg-white">Product</label>
                                    <input type="text" id="pname" class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black" placeholder="Product Name" required>
                                </div>
                                <div class="relative">
                                    <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Manufacturer</label>
                                    <input type="text" id="pbrand" class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black" placeholder="Manufacturer Name" required>
                                </div>
                                <div class="relative">
                                    <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Price</label>
                                    <input type="number" id="pprice" class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black" placeholder="Product Price" required>
                                </div>
                                <div class="relative">
                                    <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Category</label>
                                    <input type="text" id="pcat" class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black" placeholder="Category Name" required>
                                </div>
                                <div class="relative">
                                    <button id="save" href="#_" class="inline-block w-1/3 px-5 py-4 text-xl font-medium text-center text-white transition duration-200 bg-blue-300 rounded-lg hover:bg-green-400 ease" onclick="return saveProduct();">Submit</button>

                                </div>
                            </form>

                        </div>

                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="button" id="cls2" style="color:white" class="hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-red-200 bg-red-500" data-modal-toggle="defaultModal">
                        Close
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="unewProduct" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full lg:ml-60 lg:mb-24 ">
    </div>







    <script>
        let modal = document.getElementById("newProduct");
        let upt = document.getElementById("unewProduct");


        let btn = document.getElementById("addProduct");




        let close1 = document.getElementById("cls");
        let close2 = document.getElementById("cls2");


        btn.onclick = function() {
            modal.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        close1.onclick = function() {
            modal.style.display = "none";
        }


        close2.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        function saveProduct() {

            let name = document.getElementById('pname');
            let brand = document.getElementById('pbrand');
            let price = document.getElementById('pprice');
            let cat = document.getElementById('pcat');
            let fm = document.getElementById('saver');
            let save = document.getElementById("save");

            // alert(name.value + brand.value + price.value)

            if (!name.checkValidity()) {
                return err.innerHTML = "Product Name is Required ? ";
            } else if (!brand.checkValidity()) {
                return err.innerHTML = "Manufacturer is Required ";
            } else if (!price.checkValidity()) {
                return err.innerHTML = "Price is Required ? ";
            } else if (!cat.checkValidity()) {
                return err.innerHTML = "Category is Required ? ";
            }
            save.innerHTML = 'Please wait...';
            save.disabled = true;



            function refreshProducts() {
                $("#dataContents").load(window.location.href + " #dataContents");

            }


            $.ajax({
                type: "POST", //type of method
                url: "process/add.php", //your page
                data: {
                    name: name.value,
                    brand: brand.value,
                    price: price.value,
                    cat: cat.value
                }, // passing the values
                success: function(res) {
                    if (res === '1') {
                        save.disabled = false;
                        save.innerHTML = 'SUBMIT';
                        succ.innerHTML = "Product saved successfully";
                        setTimeout(() => {
                            fm.reset();
                            succ.innerHTML = "";
                            refreshProducts();
                        }, 3000);

                    } else {
                        err.innerHTML = res;
                    }

                }
            });







        }


        function editMe(arg) {

            $.ajax({
                type: "POST", //type of method
                url: "process/getSingle.php", //your page
                data: {
                    id: arg
                }, // passing the values
                success: function(res) {

                    if (res.startsWith('0')) {
                        return false;
                    } else {
                        upt.innerHTML = res;
                    }


                }
            });

            upt.style.display = "block";
            window.onclick = function(event) {
                if (event.target == upt) {
                    upt.style.display = "none";
                }
            }


        }

        function deleteMe(arg) {
            if (confirm('Sure you want to delete ?')) {
                $.ajax({
                    type: "POST", //type of method
                    url: "process/delete.php", //your page
                    data: {
                        id: arg
                    }, // passing the values
                    success: function(res) {

                        if (res === '1') {
                            $("#dataContents").load(window.location.href + " #dataContents");

                            alert('Product removed successfully');

                        } else {
                            alert(res)
                        }


                    }
                });
            }
        }

        function updateProduct(id) {
            let name = document.getElementById('upname');
            let brand = document.getElementById('upbrand');
            let price = document.getElementById('upprice');
            let cat = document.getElementById('upcat');
            let fm = document.getElementById('usaver');
            let save = document.getElementById("usave");

            if (!name.checkValidity()) {
                return uerr.innerHTML = "Product Name is Required ? ";
            } else if (!brand.checkValidity()) {
                return uerr.innerHTML = "Manufacturer is Required ";
            } else if (!price.checkValidity()) {
                return uerr.innerHTML = "Price is Required ? ";
            } else if (!cat.checkValidity()) {
                return uerr.innerHTML = "Category is Required ? ";
            }
            save.innerHTML = 'Updating...';
            save.disabled = true;


            function refreshProducts() {
                $("#dataContents").load(window.location.href + " #dataContents");

            }

            $.ajax({
                type: "POST", //type of method
                url: "process/update.php", //your page
                data: {
                    name: name.value,
                    brand: brand.value,
                    price: price.value,
                    cat: cat.value,
                    id: id
                }, // passing the values
                success: function(res) {
                    alert(res)
                    if (res === '1') {
                        save.disabled = false;
                        save.innerHTML = 'Update';
                        usucc.innerHTML = "Product Updated successfully";
                        setTimeout(() => {
                            usucc.innerHTML = "";
                            refreshProducts();
                        }, 2000);

                    } else {
                        err.innerHTML = res;
                    }

                }
            });


        }
    </script>




</body>

</html>