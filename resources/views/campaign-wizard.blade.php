<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Mobiplay</title>
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,301,400,401,500,501,700,701,900,901,1,2&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesheet.css') }}" />
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ion-rangeslider/css/ion.rangeSlider.min.css">

    <script src="https://davidshimjs.github.io/qrcodejs/qrcode.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/ion.rangeSlider.css">

</head>
<style>
    .advertisement img {
        width: 100%;
        height: auto;
    }
</style>

<body class="bg">
    <div id="navbar-wrapper" class="campaginstep-header">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="step-logo"><img src="assets/images/logo.svg" /></a>
                    <div class="right-nav">
                        <a href="#" class="notification-link"><img src="assets/images/darknotification.svg" /></a>
                        <div class="lang-menu">
                            <a href="#" class="active"><img src="assets/images/us.svg" /> EN</a>
                            <a href="#" class=""><img src="assets/images/spain.svg" /> ES</a>
                        </div>
                        <a href="#" class="profile-name"><span>{{ Auth::user()->name }} </span><img
                                src="assets/images/dark-dash-profile.png" /></a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="step-line">
        <a href="{{ route('dashboard') }}" class="step-close">Close <img src="assets/images/close.svg" /></a>
        <div class="figure-list">
            <ul>
                <li>
                    <a href="#" class="step-link active" data-step="0">
                        <label><img src="assets/images/trophy.svg" /></label>
                        <span>Goal</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="step-link" data-step="1">
                        <label><img src="assets/images/creative.svg" /></label>
                        <span>Creative</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="step-link" data-step="2">
                        <label><img src="assets/images/schedule.svg" /></label>
                        <span>Schedule</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="step-link" data-step="3">
                        <label><img src="assets/images/location.svg" /></label>
                        <span>Locations</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="step-link" data-step="4">
                        <label><img src="assets/images/ad.svg" /></label>
                        <span>Ad Spend</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <section id="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-14">
                    <form id="multiStepForm">
                        {{-- Step 1: Goals --}}
                        <div class="step" id="step-1">
                            <section id="content-wrapper">
                                <div class="container">
                                    <div class="row justify-content-center campe-list">
                                        <div class="col-lg-10 col-xl-8">
                                            <div class="choose-campgain">
                                                <img src="assets/images/campaign-icon.svg">
                                                <h2>Create a Campaign</h2>
                                                <p>Choose a Campaign Goal</p>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-4">
                                                    <a href="#" class="campe-box">
                                                        <div class="camp-img">
                                                            <img src="assets/images/c1.svg">
                                                        </div>
                                                        <div class="camp-title">
                                                            <h3>Brand Awareness</h3>
                                                            <p>Connect with your audience and make a lasting impression
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4">
                                                    <a href="#" class="campe-box active">
                                                        <div class="camp-img">
                                                            <img src="assets/images/c2.svg">
                                                        </div>
                                                        <div class="camp-title">
                                                            <h3>In-Person Visits</h3>
                                                            <p>Increase visitors to your location</p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4">
                                                    <a href="#" class="campe-box">
                                                        <div class="camp-img">
                                                            <img src="assets/images/c3.svg">
                                                        </div>
                                                        <div class="camp-title">
                                                            <h3>Mobile Conversions</h3>
                                                            <p>Create leads and increase mobile visits to your website
                                                                or app</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 mt-3">
                                                <input type="text" name="" class="form-control"
                                                    placeholder="Enter Campaign Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        {{-- Step 2: Creative --}}
                        <div class="step" id="step-2" style="display: none">
                            <section id="content-wrapper">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10">
                                            <div class="choose-campgain">
                                                <h2 class="text-start">Creative</h2>
                                                <p class="text-start">Upload and edit your advertisement</p>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-lg-7">
                                                    <div class="creative-box mb-3">
                                                        <div class="creative-inner">
                                                            <div class="row align-items-center">
                                                                <div class="col-xl-6">
                                                                    <div class="form-group">
                                                                        <h6>Upload Media<sup>*</sup></h6>
                                                                        <div class="uploadmedia" id="drop-zone">
                                                                            <!-- Changed id to match the JS -->
                                                                            <label>
                                                                                <input type="file" name=""
                                                                                    id="fileElem"
                                                                                    accept="image/*,video/*"
                                                                                    style="display:none;" />
                                                                                <div class="drop-zone">
                                                                                    Drop image here to upload
                                                                                </div>
                                                                                <span>Browse</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-xl-6 mt-2">
                                                                    <div class="upmedia-details">
                                                                        <p>Asset must fit a 16:9 ratio or will be
                                                                            automatically resized upon upload</p>
                                                                        <p>Supported video formats: MP4, MPEG, AVI, and
                                                                            MOV</p>
                                                                        <p>Supported image formats: PNG and JPEG</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="creative-inner">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group mb-3">
                                                                        <h4>Embed QR Code</h4>
                                                                        <p>Add a trackable URL to track visits reported
                                                                            in your dashboard. A QR code will be
                                                                            generated to your ad upon upload.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <div class="form-group mb-3">
                                                                        <h6>Call to Action (CTA)<sup>*</sup></h6>
                                                                        <input type="text"
                                                                            class="form-control bg-grey"
                                                                            id="cta" placeholder="Enter CTA">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <div class="form-group mb-3">
                                                                        <h6>Call to Action URL<sup>*</sup></h6>
                                                                        <input type="text"
                                                                            class="form-control bg-grey"
                                                                            id="ctaUrl" placeholder="Enter URL">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-5 align-content-center">
                                                                    <div class="form-group">
                                                                        <p class="url-visit mb-0">Visits to this URL
                                                                            are tracked and reported in your dashboard.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mb-3">
                                                                    <button id="generateQr"
                                                                        class="btn btn-primary">Generate QR
                                                                        Code</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="uploadpreview">
                                                        <h6>Preview</h6>
                                                        <div id="preview-container" class="text-center">
                                                            <img id="preview-image" src="assets/images/addbase.png"
                                                                alt="assets/images/addbase.png"
                                                                style=" max-width: 100%;" />
                                                            <video id="preview-video" controls
                                                                style="display: none; max-width: 100%;">
                                                                <source id="video-source" src=""
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                            <span id="remove-media" class=" mt-2"
                                                                style="display: none;">Remove Media</button>
                                                        </div>
                                                    </div>
                                                    <div id="qrcode" style="margin-top: 20px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        {{-- Step 3: Schedule --}}
                        <div class="step" id="step-3" style="display: none">
                          

                        </div>
                        {{-- Step: 4 --}}
                        <div class="step" id="step-4" style="display: none">
                            <section id="content-wrapper" class="p-0">
                                <div class="container-fluid p-0">
                                    <div class="row justify-content-end g-0">
                                        <div class="col-lg-7 order-lg-2">
                                            <div id="map" style="height: 500px;"></div>
                                        </div>
                                        <div class="col-lg-4 order-lg-1">
                                            <div class="loacat-section">
                                                <div class="choose-campgain">
                                                    <h2 class="text-start">Locations</h2>
                                                    <p class="text-start">Define where to target viewers</p>
                                                </div>
                                                <div class="location-list">
                                                    <div class="location-box active">
                                                        <div class="location-select">
                                                            <select class="form-select">
                                                                <option>Santiago de Queretaro</option>
                                                                <option>Mexico City</option>
                                                            </select>
                                                            <a href="#"><img src="assets/images/delete.svg"></a>
                                                        </div>
                                                        <div class="location-address">
                                                            <label>Address</label>
                                                            <div class="address-box">
                                                                <p id="address">Aeropuerto Intercontinental de
                                                                    Queretaro</p>
                                                            </div>
                                                            <div class="location-radius">
                                                                <label>Set Radius</label>
                                                                <div class="form-group">
                                                                    <input type="text" class="js-range-slider"
                                                                        id="radius-slider" name="my_range"
                                                                        value="10" />
                                                                </div>
                                                                <div class="extra-controls">
                                                                    <input type="text" class="js-input"
                                                                        id="radius-value" value="10" />Km
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        {{-- Step 5 --}}
                        <div class="step" id="step-5" style="display: none">
                            <section id="content-wrapper" class="">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10">
                                            <div class="choose-campgain">
                                                <h2 class="text-start">Ad Spend</h2>
                                                <p class="text-start">Create a budget for your campaign</p>
                                            </div>
                                            <div class="row justify-content-between">
                                                <div class="col-lg-12">
                                                    <div class="daily-budget-box">
                                                        <h3>Average Daily Budget - MXN</h3>
                                                        <div class="quantity">
                                                            <button class="minus" aria-label="Decrease"><img
                                                                    src="assets/images/minus.svg"></button>
                                                            <input type="number" class="input-box" value="0.00">
                                                            <button class="plus" aria-label="Increase"><img
                                                                    src="assets/images/plus.svg"></button>
                                                        </div>
                                                        <p>The amount you will spend per month <br>averagedover thirty
                                                            days.</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="spend-box">
                                                        <h4>0</h4>
                                                        <h5>Daily Impressions</h5>
                                                        <p>Estimated number of daily Impressions</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="spend-box">
                                                        <h4>0</h4>
                                                        <h5>Monthly Impressions</h5>
                                                        <p>Estimated number of impressions in a thirty-day period</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="spend-box">
                                                        <h4>0</h4>
                                                        <h5>Monthly Spend</h5>
                                                        <p>Total amount spent per thirty days. Campaigns can be paused
                                                            or cancelled at any time.</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                        <div class="camp-grp-btn">
                            <a href="#" class="btn btn-secondary prev-btn" id="prev">Back</a>
                            <a href="#" class="btn btn-primary next-btn" id="next">Next</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Load jQuery before ion.rangeSlider -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <script>
        let map;
        let marker;
        let circle;
        let geocoder;

        function initMap() {
            geocoder = new google.maps.Geocoder();

            const defaultLocation = {
                lat: 20.617,
                lng: -100.185
            };

            // Initialize map
            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultLocation,
                zoom: 12
            });

            // Initialize marker
            marker = new google.maps.Marker({
                position: defaultLocation,
                map: map,
                draggable: true
            });

            // Initialize circle with default radius
            circle = new google.maps.Circle({
                map: map,
                radius: 10000, // in meters
                fillColor: '#AA0000',
                strokeWeight: 1,
                strokeColor: '#000',
                fillOpacity: 0.2
            });

            circle.bindTo('center', marker, 'position');

            // Update address on marker drag
            google.maps.event.addListener(marker, 'dragend', function() {
                updateAddress(marker.getPosition());
            });

            // Update marker and address on map click
            google.maps.event.addListener(map, 'click', function(event) {
                marker.setPosition(event.latLng);
                updateAddress(event.latLng);
            });

            // Initialize ionRangeSlider
            $("#radius-slider").ionRangeSlider({
                min: 1,
                max: 100,
                from: 1,
                onStart: function(data) {
                    updateCircleRadius(data.from);
                },
                onChange: function(data) {
                    updateCircleRadius(data.from);
                }
            });
        }

        // Function to update the map circle radius
        function updateCircleRadius(radiusKm) {
            document.getElementById('radius-value').value = radiusKm;
            circle.setRadius(radiusKm * 1000); // Convert to meters
        }

        // Function to update address in the address box
        function updateAddress(latlng) {
            geocoder.geocode({
                'location': latlng
            }, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        document.getElementById('address').textContent = results[0].formatted_address;
                    } else {
                        document.getElementById('address').textContent = 'Address not found';
                    }
                } else {
                    document.getElementById('address').textContent = 'Geocoder failed: ' + status;
                }
            });
        }

        // Load map on window load
        window.onload = initMap;
    </script>
    <script type="text/javascript">
        var $range = $(".js-range-slider"),
            $input = $(".js-input"),
            instance,
            min = 1,
            max = 100;

        $range.ionRangeSlider({
            skin: "round",
            type: "single",
            min: min,
            max: max,
            from: 1,

            onStart: function(data) {
                $input.prop("value", data.from);
            },
            onChange: function(data) {
                $input.prop("value", data.from);
            }
        });

        instance = $range.data("ionRangeSlider");

        $input.on("change keyup", function() {
            var val = $(this).prop("value");

            // validate
            if (val < min) {
                val = min;
            } else if (val > max) {
                val = max;
            }

            instance.update({
                from: val
            });
        });
    </script>
    <script type="text/javascript">
        document.getElementById("generateQr").onclick = function() {
            var ctaUrl = document.getElementById("ctaUrl").value;
            var qrcodeContainer = document.getElementById("qrcode");
    
            // Check if the input URL is empty
            if (!ctaUrl) {
                alert("Please enter a URL to generate the QR code.");
                return;
            }
    
            // Clear previous QR code
            qrcodeContainer.innerHTML = "";
    
            try {
                // Generate new QR code
                var qrcode = new QRCode(qrcodeContainer, {
                    text: ctaUrl,
                    width: 128,
                    height: 128,
                    colorDark: "#000000",
                    colorLight: "#ffffff",
                    correctLevel: QRCode.CorrectLevel.H // Correct Level property needs to be used without extra commas
                });
    
                // Set display style via JavaScript or add a CSS class
                qrcodeContainer.style.display = "inline-block"; // Apply display style
            } catch (error) {
                alert("An error occurred while generating the QR code. Please try again.");
                console.error("QR Code generation error:", error);
            }
        };
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const steps = document.querySelectorAll(".step");
            const stepLinks = document.querySelectorAll(".step-link");
            let currentStep = 0;

            // Initially show the first step
            steps[currentStep].style.display = "block";
            // Function to show a specific step
            function showStep(stepIndex) {
                steps[currentStep].style.display = "none"; // Hide current step
                currentStep = stepIndex; // Update current step
                steps[currentStep].style.display = "block"; // Show new step

                // Update active step link
                stepLinks.forEach((link, index) => {
                    link.classList.toggle("active", index === currentStep);
                });
            }

            // Next button functionality
            document.getElementById("next").addEventListener("click", () => {
                if (currentStep < steps.length - 1) {
                    showStep(currentStep + 1);
                }
            });

            // Previous button functionality
            document.getElementById("prev").addEventListener("click", () => {
                if (currentStep > 0) {
                    showStep(currentStep - 1);
                }
            });

            // Step link functionality
            stepLinks.forEach((link) => {
                link.addEventListener("click", (event) => {
                    event.preventDefault(); // Prevent default link behavior
                    const stepIndex = parseInt(link.getAttribute("data-step"),
                        10); // Get the step number
                    if (stepIndex !== currentStep) {
                        showStep(stepIndex); // Show the clicked step
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const fileInput = document.getElementById("fileElem");
            const dropArea = document.getElementById("drop-zone");
            const previewImage = document.getElementById("preview-image");
            const previewVideo = document.getElementById("preview-video");
            const videoSource = document.getElementById("video-source");
            const removeMediaBtn = document.getElementById("remove-media");
            let currentFile;

            // Set default image preview
            previewImage.src = "assets/images/addbase.png";

            // Prevent default drag behaviors
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(event) {
                event.preventDefault();
                event.stopPropagation();
            }

            // Highlight drop area when file is dragged over
            dropArea.addEventListener("dragover", (event) => {
                dropArea.classList.add("hover");
            });

            dropArea.addEventListener("dragleave", () => {
                dropArea.classList.remove("hover");
            });

            dropArea.addEventListener("drop", (event) => {
                const files = event.dataTransfer.files;
                dropArea.classList.remove("hover");
                handleFiles(files);
            });

            // Handle file input change
            fileInput.addEventListener("change", (event) => {
                const files = event.target.files;
                handleFiles(files);
            });

            // Handle remove media button click
            removeMediaBtn.addEventListener('click', function() {
                previewImage.src = "";
                previewImage.style.display = "none";
                previewVideo.pause();
                previewVideo.style.display = "none";
                videoSource.src = "";
                removeMediaBtn.style.display = "none";
                previewImage.src = "assets/images/addbase.png"; // Reset to default image
            });

            // Handle file processing and previews
            function handleFiles(files) {
                if (files.length > 0) {
                    currentFile = files[0];
                    const reader = new FileReader();

                    reader.onload = (event) => {
                        if (currentFile.type.startsWith("video/")) {
                            videoSource.src = event.target.result;
                            previewVideo.load();
                            previewVideo.play();
                            previewVideo.muted = true;
                            previewVideo.style.display = "block";
                            previewImage.style.display = "none";
                        } else if (currentFile.type.startsWith("image/")) {
                            previewImage.src = event.target.result;
                            previewImage.style.display = "block";
                            previewVideo.style.display = "none";
                        }

                        removeMediaBtn.style.display = "block"; // Show remove button
                    };

                    reader.readAsDataURL(currentFile);
                }
            }
        });
    </script>

</body>

</html>
