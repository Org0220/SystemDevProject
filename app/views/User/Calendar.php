<?php require APPROOT . '/views/includes/headerUser.php'; 
?>

<style>
        .footer {
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
        }

        #calendar_table {
            background-color: rgb(231, 231, 231);  
            font-size: 0.9em; 
            font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
            width: 100%;
            
            border: solid 2px rgb(255, 180, 190);
        }

        caption {
            caption-side: top; 
            text-align: center;
            padding-bottom: 20px; 
            font-size: 1.6em; 
        }

        .calendar_weekdays {
            background-color: rgb(240, 240, 240);
            width: 14.28%; 
            border-bottom: 3px solid gray;
        }

        .calendar_dates {
            text-align: left; 
            vertical-align: top;
            border: 1px dotted rgb(180, 180, 180);
            background-color: white;
            height: 100px;
        }

        .calendar_dates > a {
            background: transparent; 
            border: none; 
            display: block; 
            width: 100%; 
            height: 100%;
            font-size: 20px;
        }

        #calendar_today {
            background-color: rgba(255, 192, 204, 0.3);
            border: 1px solid rgb(255, 192, 204);
        }

    </style>
<div class="container" style=" margin: auto; margin-top: 5%; height: auto; ">
        <!-- add code here -->

        <!-- title -->
        <h4 style="
        text-align: center;
        font: normal normal normal 50px/59px Lucida Fax;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;">Home</h4>

        <!-- Calendar -->
        <div style="height: 100px; width: auto; padding: 15px 0px; margin: auto;">
            <button id="lastMonth" class="btn" href="AdminEditGallery.html" style="
                float: left;
                width: 200px;
                height: 40px;
                background: #D7E7E4;
                border: 1px solid #707070;
                color: black;
                ">
            Previous Month
            </button>
            <button id="nextMonth" class="btn" href="#" style="
                float: right;
                width: 200px;
                height: 40px;
                background: #D7E7E4;
                border: 1px solid #707070;
                color: black;
                ">
            Next Month
            </button>
        </div>
        <div id="calendar"></div>
        
        
    </div>
</body>


<script>
    var selectedDate = new Date();
    var currentDatePassed = false;
    document.getElementById("calendar").innerHTML = createCalendar(selectedDate);
    
    document.getElementById('nextMonth').onclick = function() {
        // adding a month to the date
        var month = selectedDate.getMonth() + 1;
        
        // if month after december
        if (month >= 12) {
            //sets to january
            month = 0;

            // sets next year
            selectedDate.setFullYear(selectedDate.getFullYear() + 1);
        }

        // sets the month to the date and regenerates calendar
        selectedDate.setMonth(month);
        document.getElementById("calendar").innerHTML = createCalendar(selectedDate);
    }

    document.getElementById('lastMonth').onclick = function() {
        // removing a month to the date
        var month = selectedDate.getMonth() - 1;

        // if month before january
        if (month < 0) {
            // sets to december
            month = 11;

            // sets previous year
            selectedDate.setFullYear(selectedDate.getFullYear() - 1);
        }

        // sets the month to the date and regenerates calendar
        selectedDate.setMonth(month);
        document.getElementById("calendar").innerHTML = createCalendar(selectedDate);
    }

    /* generate calendar */
    function createCalendar(calDate) {
        var calendarHTML = "<table id='calendar_table' class='caption-top'>";
        calendarHTML += calCaption(calDate);
        calendarHTML += calWeekdayRow();
        calendarHTML += calDays(calDate);
        calendarHTML += "</table>";
        return calendarHTML;
    }

    /* generate month caption on top */
    function calCaption(calDate) {
        //converting month from int to string
        var monthName = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var thisMonth = calDate.getMonth();
        
        //year
        var thisYear = calDate.getFullYear();
        
        //adding caption
        return "<caption>" + monthName[thisMonth] + " " + thisYear + "</caption>";
    }

    /* to generate table labels */
    function calWeekdayRow() {
        // weekdays
        var dayName = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
        var rowHTML = "<tr>";
        
        // adding weekdays
        for (var i = 0; i < dayName.length; i++) {
            rowHTML += "<th class='calendar_weekdays'>" + dayName[i] + "</th>";
        }
        
        rowHTML += "</tr>";
        return rowHTML;
    }

    /* to generate the number of dates in a month */
    function daysInMonth(calDate) {
        // days in each month
        var dayCount = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        
        // selected year and month
        var thisYear = calDate.getFullYear();
        var thisMonth = calDate.getMonth();
        
        // changing number of days based on leap year
        if (thisYear % 4 === 0) {
            if ((thisYear % 100 != 0) || (thisYear % 400 === 0)) {
                dayCount[1] = 29;
            }
        }
        
        return dayCount[thisMonth];
    }

    /* to generate the calendar dates */
    function calDays(calDate) {
        // finding the first day of the month
        var day = new Date(calDate.getFullYear(), calDate.getMonth(), 1);
        var weekDay = day.getDay();
        
        // empty dates before the first day
        var htmlCode = "<tr>";
        for (var i = 0; i < weekDay; i++) {
            htmlCode += "<td></td>";
        }
        
        //php to gather values, either here or in the modal with hidden input
        //i is already date
        var month = calDate.getMonth();
        var year = calDate.getFullYear();
        var totalDays = daysInMonth(calDate);

        //today's date, to highlight
        var currentDate = new Date();
        if ( (currentDate.getFullYear() < year) || (currentDate.getMonth() < month && currentDate.getFullYear() == year)) {
            currentDatePassed = true;
        } else {
            currentDatePassed = false;
        }
        for (var i = 1; i <= totalDays; i++) {
            day.setDate(i);
            weekDay = day.getDay();
            
            // if Sunday, then start the table row
            if (weekDay === 0) {
                htmlCode += "<tr>";
            }

            // add class to highlight current date
            if (i === currentDate.getDate() && calDate.getMonth() === currentDate.getMonth() && calDate.getFullYear() === currentDate.getFullYear()) {
                currentDatePassed = true;
                htmlCode += "<td class='calendar_dates' id='calendar_today'><a class = 'btn' role ='button' href = '/SystemDevProject/Appointment/hours/" + i + "/" + month + "/" + year + "/" + weekDay +"'>" + i + "</a></td>";
            } else if (currentDatePassed) {
                htmlCode += "<td class='calendar_dates '><a class = 'btn' role ='button'href = '/SystemDevProject/Appointment/hours/" + i + "/" + month + "/" + year + "/" + weekDay + "'>" + i + "</a></td>";
             } 
             else {
                 htmlCode += "<td class='calendar_dates' style = 'background: gray;'><a class = 'btn' role ='button'>" + i + "</a></td>";
             }
        
            // if Saturday, then end the table row
            if (weekDay === 6) htmlCode += "</tr>";
        } 
        
        return htmlCode;
    }

    

    // maybe also add another event listener to send to backend
</script>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>