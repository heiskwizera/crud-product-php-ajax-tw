<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="KAHINDO Joel & KWIZERA Fabrice">
    <title>Crud - Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
</head>
<style>
    .title {

        font-family: 'Quicksand';
    }
</style>

<body>


    <?php
    include "includes/header.php";

    ?>

    <section class="w-full bg-white">
        <div class="py-10 mx-auto max-w-7xl md:px-8 lg:mt-9 lg:mb-10">

            <div class="flex flex-col-reverse items-center w-full p-10 bg-gray-100 md:rounded-xl sm:p-10 md:flex-row">

                <div class="w-full mt-16 md:w-1/2 md:mt-0">
                    <img src="images/crud.webp" class="w-full">
                </div>

                <div class="flex flex-col w-full space-y-6 text-center md:w-1/2 px-7 sm:px-0">
                    <h2 class="max-w-md mx-auto text-3xl font-semibold md:text-4xl title">CRUD OPERATIONS.</h2>
                    <p class="text-gray-600"> &nbsp; &nbsp; Create, Retrieve, Update and Delete Products from MYSQL Database using PHP.</p>
                    <a href="#_" class="flex items-center w-auto mx-auto leading-tight text-center text-blue-600 hover:underline">
                        <span>Learn More</span>
                        <svg class="w-3 h-3 mt-0.5 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>




    <?php
    include "includes/footer.php";
    ?>





</body>

</html>