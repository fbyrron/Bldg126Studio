<?php
include 'database.php';

$email = $_SESSION['admin_Email'];
$password = $_SESSION['admin_Password'];

$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
}

if (!isset($_SESSION['admin_Email'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="images/bldg grandis.png">
    <title>ADMIN: Bldg126 Studio</title>
    <style>
        .overlay-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: none;
        }

        .overlay-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .overlay-menu ul li {
            margin-bottom: 1rem;
        }

        .overlay-menu ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }
        .iframe {
            height: calc(100vh - px);
            width: 100%;
        }
    </style>
</head>


<header class="fixed top-0 left-0 right-0 z-50 bg-white bg-opacity-90 shadow-xl">
    <!-- Header -->
    <div class="py-1 px-2 md:py-2 px-10 lg:py-2 px-20 flex justify-between items-center">
        <h1 class="text-md lg:text-2xl p-5">Welcome back, <?php echo $row['first_name'] ?>!</h1>

        <div class="hidden lg:block lg:flex lg:items-center">
            <label class="text-l pr-7 hover: hover:text-blue-500"><a href="#home">Home</a></label>
            <label class="text-l pr-7 hover: hover:text-blue-500"><a href="#services">Services</a></label>
            <label class="text-l pr-7 hover: hover:text-blue-500"><a href="#portfolio">Portfolio</a></label>
            <label class="text-l pr-7 hover: hover:text-blue-500"><a href="#about us">About Us</a></label>
            <a href="login.php">
                <div class="px-4 py-1 grandis rounded"><label class="text-l hover: hover:text-red-900">Logout</label></div>
            </a>
        </div>
        <button id="menuButton" class="lg:hidden" style="margin-left: auto;">
            <svg class="w-6 h-6" viewBox="0 0 24 24">
                <path fill="currentColor" d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z" />
            </svg>
        </button>


    </div>
    <div class="grandis h-1 lg:h-2"></div>

    <div id="overlayMenu" class="overlay-menu">
        <span class="close-button">&times;</span>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#about us">About Us</a></li>
        </ul>
    </div>

    <script>
        document.getElementById('menuButton').addEventListener('click', function() {
            var overlayMenu = document.getElementById('overlayMenu');
            overlayMenu.style.display = 'block';
        });

        document.querySelector('.close-button').addEventListener('click', function() {
            var overlayMenu = document.getElementById('overlayMenu');
            overlayMenu.style.display = 'none';
        });

        document.querySelectorAll('#overlayMenu ul li a').forEach(function(link) {
            link.addEventListener('click', function() {
                var overlayMenu = document.getElementById('overlayMenu');
                overlayMenu.style.display = 'none';
            });
        });
    </script>
</header>

<!-- {{-- ---------BODY-------- --}} -->

<body>
    <div>
        <div class="relative flex " id="home">
            <div class="hidden lg:block w-1/3">
                <div class="h-screen flex justify-center items-center bg-gray-700">
                    <div style=" height: 90px "></div>
                    <img src="images/image-removebg-preview (1).png" alt="logo" width="300">
                </div>
            </div>
            <div id="largeScreenDiv" class="lg:h-screen w-2/3" style="padding-top: 95px;">
                <div class="flex justify-center">
                <iframe class="iframe" src="https://www.youtube.com/embed/53UDg9pHoQQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <div id="smallScreenDiv" class="w-full">
                <div class="bg-gray-100" style=" height: 120px " id="home">
                </div>
                <div>
                    <iframe width="100%" height="200px" src="https://www.youtube.com/embed/53UDg9pHoQQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>



            <script>
                function handleScreenSizeChange(mql) {
                    if (mql.matches) {
                        // Show small screen div and hide large screen div
                        document.getElementById('smallScreenDiv').style.display = 'block';
                        document.getElementById('largeScreenDiv').style.display = 'none';
                    } else {
                        // Show large screen div and hide small screen div
                        document.getElementById('largeScreenDiv').style.display = 'block';
                        document.getElementById('smallScreenDiv').style.display = 'none';
                    }
                }

                const mql = window.matchMedia('(max-width: 767px)');
                handleScreenSizeChange(mql);

                mql.addListener(handleScreenSizeChange);
            </script>

        </div>
        <!-- {{-- SERVICES SECTION --}} -->
        <div class="bg-gray-100" style=" height: 90px " id="services">
        </div>
        <form action="edit.php" method="post">
            <div class="pt-10 px-5 bg-gray-100 lg:px-20 ">
                <H1 class="text-center text-2xl font-black lg:text-4xl">Services</H1>

                <?php
                $sql = "SELECT * FROM services WHERE services_ID = '1'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $dnb = $row['design&branding'];
                    $dc = $row['digital_campaigns'];
                    $pnvp = $row['photo&vid_prod'];
                    $smm = $row['social_media_marketing'];
                }
                ?>
                <div class="flex flex-col lg:flex-row">
                    <div class="flex flex-col lg:w-1/2 m-10 lg:pr-10 pt-5">
                        <img src="images/dnb.png" width="320" class="pb-5 pr-10">
                        <textarea name="dnb" id="dnb" cols="30" rows="5"><?php echo htmlspecialchars($dnb)?></textarea>
                    </div>
                    <div class="flex flex-col lg:w-1/2 m-10">
                        <img src="images/dc.png" width="350" class="pb-5">
                        <textarea name="dc" id="dc" cols="30" rows="5"><?php echo htmlspecialchars($dc)?></textarea>
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row">
                    <div class="flex flex-col lg:w-1/2 m-10 lg:pr-10 lg:pt-2">
                        <img src="images/pnvp.png" width="350" class="pb-5">
                        <textarea name="pnvp" id="pnvp" cols="30" rows="5"><?php echo htmlspecialchars($pnvp)?></textarea>
                    </div>
                    <div class="flex flex-col lg:w-1/2 m-10">
                        <img src="images/smm.png" width="400" class="pb-5">
                        <textarea name="smm" id="smm" cols="30" rows="5"><?php echo htmlspecialchars($smm)?></textarea>
                    </div>
                </div>
                <div style="text-align: center; padding-bottom: 20px;"><input class="p-5 py-2 grandis rounded" type="submit" name="submit" value="Edit"></div>

            </div>
        </form>
        <!-- <div class="flex justify-center py-10"><button class="darkergrandis rounded-2xl py-3 px-10 text-white font-bold">Learn More</button></div>-->
    </div>


    </div>

    <!-- {{-- PORTFOLIO SECTION --}} -->
    <div style="height:90px" class="bg-gray-200" id="portfolio"></div>
    <div class="pt-10 bg-gray-200">
        <H1 class="text-center text-2xl pb-10 font-black lg:text-4xl">Our Portfolio</H1>

        <H1 class="text-center text-xl pb-3 lg:text-2xl">Some of our works... </H1>
        <p class="text-center text-l px-10 pb-10 lg:text-xl">Design & Branding &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Digital Campaigns &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Photo & Video Production &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Event Organizing</p>

        <div class="grid grid-cols-2 px-10 lg:grid-cols-4 gap-4 lg:px-20">
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port1.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/port2.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port9.png" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port6.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/port4.png" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port7 (1).png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port8.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port12.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port5.png" alt="">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port10.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port11 (1).png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port3.png" alt="">
                </div>
            </div>
        </div><br><br><br>
        <hr style="border: 2px solid rgb(103, 103, 103); border-radius: 5px; margin: 50px; margin-left: 80px; margin-right: 80px;">

        <H1 class="text-center text-xl pb-10 lg:text-2xl">Companies we have worked with</H1>

        <div class="grid grid-cols-2 px-10 lg:grid-cols-4 gap-4 lg:px-20">
            <div class="grid gap-4" id="imageGrid1">
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 171611.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 171750.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 172058.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 171904.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 172032.png" alt="">
                </div>
            </div>
            <div class="grid gap-4" id="imageGrid2">
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 171627.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 172017.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 171735.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/Screenshot 2023-05-14 171930.png" alt="">
                </div>
            </div>
            <div class="grid gap-4 hidden lg:grid" id="imageGrid3">
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 171832.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port8.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 171440.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 171958.png" alt="">
                </div>
            </div>
            <div class="grid gap-4 hidden lg:grid" id="imageGrid4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/portfolio/port10.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 171717.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 172045.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 171509.png" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" style="border: 2px solid #895e00;" src="images/logos/Screenshot 2023-05-14 171453.png" alt="">
                </div>
            </div>
        </div>
        <div class="mt-10 flex justify-center md:hidden"><button class="darkergrandis text-white font-bold py-2 px-10 lg:py-3 px-10 rounded-2xl" id="toggleButton">
                See More
            </button></div>

        <script>
            const imageGrid1 = document.getElementById('imageGrid1');
            const imageGrid2 = document.getElementById('imageGrid2');
            const imageGrid3 = document.getElementById('imageGrid3');
            const imageGrid4 = document.getElementById('imageGrid4');
            const toggleButton = document.getElementById('toggleButton');
            let isExpanded = false;

            imageGrid3.classList.add('hidden');
            imageGrid4.classList.add('hidden');

            toggleButton.addEventListener('click', () => {
                if (!isExpanded) {
                    imageGrid3.classList.remove('hidden');
                    imageGrid4.classList.remove('hidden');
                    toggleButton.textContent = 'Hide';
                    isExpanded = true;
                } else {
                    imageGrid3.classList.add('hidden');
                    imageGrid4.classList.add('hidden');
                    toggleButton.textContent = 'See More';
                    isExpanded = false;
                }
            });
        </script>

        <div class="bg-gray-200" style=" height: 120px " id="about us"></div>
    </div>

    <!-- {{-- ABOUT US SECTION --}} -->
    <div class=" bg-gray-100">
        <div class="flex flex-col lg:flex-row">
            <div id="grandis" class="w-1/4 h-screen grandis flex justify-center items-center hidden lg:flex">
                <img src="images/image-removebg-preview (2).png" width="300">
            </div>
            <div id="content" class="w-full lg:w-1/2 flex flex-col items-center">
                <h1 class="text-center text-2xl lg:text-4xl font-black pt-10 lg:py-10">About Us</h1>
                <p class="text-lg lg:text-xl p-10 lg:p-20">A creatives company that produces visual work and graphic design for content creators. Provides digital marketing and strategic advertising for business-related clients, as well as curates young artists towards reaching their objectives and aspirations as online influencers.</p>
                <img src="images/build.png" alt="build" class="w-1/2 pb-20 lg:w-400">
            </div>
            <div id="gray" class="w-1/4 h-screen bg-gray-700 flex justify-center items-center hidden lg:flex">
                <img src="images/image-removebg-preview (1).png" width="300">
            </div>
        </div>


        <div>
            <div class="flex flex-col md:flex-row">
                <div class=" md:w-2/3 md:block">
                    <img src="images/gradient1.png" alt="">
                </div>
                <div class="w-full md:w-1/3 p-5 md:p-20">
                    <h1 class="text-3xl md:text-6xl m-3 md:m-5">The team you need to succeed</h1>
                    <h2 class="text-lg md:text-2xl m-3 md:m-5">Fueled by passion and a commitment to our clients, our team of digital experts drives performance for small businesses and Fortune 500 companies alike.</h2>
                </div>
            </div>

            <div class="w-full flex flex-col">
                <div class="flex flex-col px-8 md:flex-row md:justify-center pb-7">
                    <img class="pb-3" src="images/bts1.png">
                    <img class="pb-3" src="images/bts2.png">
                    <img class="pb-3" src="images/bts3.png">
                </div>
            </div>


        </div>


    </div>
    </div>
</body>

<footer class="text-center inset-x-0 bottom-0">
    <div class="p-5 bg-red bg-opacity-50 ">
        <p>© 2023 <b style="font-weight: 600;">Bldg126 Studio</b> | All Rights Reserved</p>
    </div>
</footer>

</html>