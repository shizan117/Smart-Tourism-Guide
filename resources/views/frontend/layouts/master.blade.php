<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

</head>
<body>
<!-- Navigation -->
@include('frontend.layouts.header')


@yield('content')


<!-- Footer -->
@include('frontend.layouts.footer')
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery and jQuery UI -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- FontAwesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize drag and drop
        $(".spot-item").draggable({
            revert: "invalid",
            helper: "clone",
            cursor: "move"
        });

        $(".day-container").droppable({
            accept: ".spot-item",
            drop: function(event, ui) {
                var spotItem = ui.draggable.clone();
                var dayId = $(this).closest('.day-content').attr('id');

                // Remove drag functionality from dropped item
                spotItem.draggable("destroy");

                // Create timeline item
                var timelineItem = $('<div class="timeline-item"></div>');
                timelineItem.append(spotItem.html());

                // Add time input and controls
                var timeControl = $('<div class="ms-auto d-flex align-items-center"></div>');
                timeControl.append('<input type="time" class="form-control form-control-sm time-input" value="09:00">');
                timeControl.append('<button class="btn btn-sm btn-outline-danger ms-2"><i class="fas fa-times"></i></button>');

                timelineItem.append(timeControl);

                // Add to timeline
                $("#" + dayId + "-items").append(timelineItem);

                // Hide empty state
                $("#" + dayId + "-empty").hide();

                // Update cost
                updateCostSummary();
            }
        });

        // Day navigation
        $(".day-nav").click(function() {
            $(".day-nav").removeClass("active");
            $(this).addClass("active");

            var day = $(this).data("day");
            $(".day-content").addClass("d-none");
            $("#day-" + day).removeClass("d-none");
        });

        // Add day functionality
        $("#add-day-btn").click(function() {
            var dayCount = $(".day-nav").length - 1; // Subtract the "Add Day" button
            var newDay = dayCount + 1;

            // Create new day button
            var newDayBtn = $('<button class="btn btn-outline-primary me-2 day-nav" data-day="' + newDay + '">Day ' + newDay + '</button>');
            newDayBtn.insertBefore($("#add-day-btn"));

            // Create new day content
            var newDayContent = $('<div class="day-content d-none" id="day-' + newDay + '"></div>');
            var dayContainer = $('<div class="day-container ui-sortable"></div>');

            var dayHeader = $('<div class="day-header"></div>');
            dayHeader.append('<h6 class="mb-0">Day ' + newDay + ': <input type="date" class="form-control form-control-sm d-inline-block w-auto"></h6>');
            dayHeader.append('<button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Remove Day</button>');

            var emptyState = $('<div class="empty-state" id="day-' + newDay + '-empty"></div>');
            emptyState.append('<i class="fas fa-arrow-left"></i>');
            emptyState.append('<p>Drag spots from the left panel to build your itinerary</p>');

            var timelineItems = $('<div class="timeline-items" id="day-' + newDay + '-items"></div>');

            dayContainer.append(dayHeader);
            dayContainer.append(emptyState);
            dayContainer.append(timelineItems);
            newDayContent.append(dayContainer);

            $(".itinerary-panel .day-content:last").after(newDayContent);

            // Make new day container droppable
            dayContainer.droppable({
                accept: ".spot-item",
                drop: function(event, ui) {
                    var spotItem = ui.draggable.clone();
                    var dayId = $(this).closest('.day-content').attr('id');

                    // Remove drag functionality from dropped item
                    spotItem.draggable("destroy");

                    // Create timeline item
                    var timelineItem = $('<div class="timeline-item"></div>');
                    timelineItem.append(spotItem.html());

                    // Add time input and controls
                    var timeControl = $('<div class="ms-auto d-flex align-items-center"></div>');
                    timeControl.append('<input type="time" class="form-control form-control-sm time-input" value="09:00">');
                    timeControl.append('<button class="btn btn-sm btn-outline-danger ms-2"><i class="fas fa-times"></i></button>');

                    timelineItem.append(timeControl);

                    // Add to timeline
                    $("#" + dayId + "-items").append(timelineItem);

                    // Hide empty state
                    $("#" + dayId + "-empty").hide();

                    // Update cost
                    updateCostSummary();
                }
            });

            // Add click event to new day button
            newDayBtn.click(function() {
                $(".day-nav").removeClass("active");
                $(this).addClass("active");

                var day = $(this).data("day");
                $(".day-content").addClass("d-none");
                $("#day-" + day).removeClass("d-none");
            });

            // Add remove day functionality
            dayHeader.find('button').click(function() {
                if (confirm("Are you sure you want to remove this day? All spots added to this day will be lost.")) {
                    newDayBtn.remove();
                    newDayContent.remove();

                    // Activate the first day
                    $(".day-nav:first").click();
                }
            });
        });

        // Remove spot from itinerary
        $(document).on('click', '.timeline-item button', function() {
            $(this).closest('.timeline-item').remove();

            // Show empty state if no items left
            var dayId = $(this).closest('.day-content').attr('id');
            if ($("#" + dayId + "-items").children().length === 0) {
                $("#" + dayId + "-empty").show();
            }

            // Update cost
            updateCostSummary();
        });

        // Cost calculator modal functionality
        $("#apply-costs").click(function() {
            var transportation = parseInt($("#transportation-input").val()) || 0;
            var accommodation = parseInt($("#accommodation-input").val()) || 0;
            var food = parseInt($("#food-input").val()) || 0;
            var activities = parseInt($("#activities-input").val()) || 0;
            var misc = parseInt($("#misc-input").val()) || 0;

            // Apply to main cost summary
            $("#transportation-cost").text("$" + transportation);
            $("#food-accommodation").text("$" + (accommodation + food));

            // Update progress bars (simplified for demo)
            $(".progress-bar").eq(1).css("width", "30%");
            $(".progress-bar").eq(2).css("width", "50%");

            updateCostSummary();

            // Close modal
            $("#costCalculatorModal").modal("hide");
        });

        // Update cost inputs in modal
        $(".modal input").on('input', function() {
            updateModalTotal();
        });

        // Function to update cost summary
        function updateCostSummary() {
            var entryFees = 0;

            // Calculate entry fees from spots
            $(".timeline-item").each(function() {
                // In a real app, we would get the cost from the data attribute
                // For demo, we'll use a random value between 0 and 30
                entryFees += Math.floor(Math.random() * 30);
            });

            $("#entry-fees").text("$" + entryFees);

            // Update progress bar for entry fees (simplified for demo)
            $(".progress-bar").eq(0).css("width", "20%");

            // Get other costs
            var transportation = parseInt($("#transportation-cost").text().replace('$', '')) || 0;
            var foodAccommodation = parseInt($("#food-accommodation").text().replace('$', '')) || 0;

            var total = entryFees + transportation + foodAccommodation;
            $("#total-cost").text("$" + total);
        }

        // Function to update modal total
        function updateModalTotal() {
            var transportation = parseInt($("#transportation-input").val()) || 0;
            var accommodation = parseInt($("#accommodation-input").val()) || 0;
            var food = parseInt($("#food-input").val()) || 0;
            var activities = parseInt($("#activities-input").val()) || 0;
            var misc = parseInt($("#misc-input").val()) || 0;

            var days = $(".day-nav").length - 1; // Subtract the "Add Day" button
            var total = transportation + (accommodation * days) + (food * days) + activities + misc;

            $("#modal-total-cost").text("$" + total);
        }

        // Initialize dates
        var today = new Date();
        var tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);

        $("#start-date").val(today.toISOString().split('T')[0]);
        $("#end-date").val(tomorrow.toISOString().split('T')[0]);

        // Set day dates based on start date
        $("#start-date").change(function() {
            var startDate = new Date($(this).val());

            $(".day-content input[type='date']").each(function(index) {
                var dayDate = new Date(startDate);
                dayDate.setDate(dayDate.getDate() + index);
                $(this).val(dayDate.toISOString().split('T')[0]);
            });
        });

        // Trigger change to set initial dates
        $("#start-date").trigger("change");
    });
</script>

<script>
    function requestLocationAndLogin() {
        if (!navigator.geolocation) {
            alert("Your device does not support location. Please enable GPS.");
            return;
        }

        navigator.geolocation.getCurrentPosition(
            // SUCCESS
            function (position) {
                document.getElementById("lat").value = position.coords.latitude;
                document.getElementById("lon").value = position.coords.longitude;
                document.getElementById("loginForm").submit();
            },

            // ERROR
            function (error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        alert("Please allow location permission to login.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("Location unavailable. Turn ON GPS & try again.");
                        break;
                    case error.TIMEOUT:
                        alert("Location timeout. Move to an open area or turn ON GPS.");
                        break;
                    default:
                        alert("Unable to get your location.");
                }
            },

            // OPTIONS
            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );
    }
</script>
<script>function applyNearMe(btn) {
        let isActive = btn.classList.contains('active');

        if (isActive) {
            document.getElementById('lat').value = '';
            document.getElementById('lng').value = '';
            document.getElementById('near').value = '';
            btn.classList.remove('active');
        } else {
            if (!navigator.geolocation) { alert("Your device does not support GPS."); return; }
            document.getElementById('city').value = ''; // ignore city
            navigator.geolocation.getCurrentPosition(
                (pos) => {
                    document.getElementById('lat').value = pos.coords.latitude;
                    document.getElementById('lng').value = pos.coords.longitude;
                    document.getElementById('near').value = 1;
                    btn.classList.add('active');
                    document.getElementById('filterForm').submit();
                },
                () => alert("Enable GPS to use Near Me filter.")
            );
            return;
        }

        document.getElementById('filterForm').submit();
    }

    function enterCity(btn) {
        let city = prompt("Enter your city:");
        if (city) {
            document.getElementById('city').value = city;
            document.getElementById('lat').value = '';
            document.getElementById('lng').value = '';
            document.getElementById('near').value = '';
            btn.classList.add('active');
            document.getElementById('filterForm').submit();
        }
    }

    function applyThreeStars(btn) {
        let isActive = btn.classList.contains('active');
        if (isActive) {
            document.querySelector('input[name="rating"][value="3"]').checked = false;
            btn.classList.remove('active');
        } else {
            document.querySelector('input[name="rating"][value="3"]').checked = true;
            document.getElementById('city').value = '';
            document.getElementById('near').value = '';
            btn.classList.add('active');
        }
        document.getElementById('filterForm').submit();
    }
</script>

</body>
</html>
