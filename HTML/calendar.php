<!DOCTYPE html>
<html lang="no">

<head>
    <title>Kalender</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../CSS/calendar.css">
</head>

<body>
    <!-- Kalender knapper -->
    <div class="container">
        <div class="page-header">
            <div class="pull-right form-inline">
                <div class="btn-group">
                    <button class="btn btn-primary" data-calendar-nav="prev"> Forrige </button>
                    <button class="btn btn-default" data-calendar-nav="today">i dag</button>
                    <button class="btn btn-primary" data-calendar-nav="next">Neste >></button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-warning" data-calendar-view="year">År</button>
                    <button class="btn btn-warning active" data-calendar-view="month">Måned</button>
                    <button class="btn btn-warning" data-calendar-view="week">Uke</button>
                    <button class="btn btn-warning" data-calendar-view="day">Dag</button>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-9">
                <div id="showEventCalendar"></div>
            </div>
            <div class="col-md-3">
                <h4>Alle events</h4>
                <ul id="eventlist" class="nav nav-list"></ul>
            </div>
        </div>
    </div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="../JS/calendar.js"></script>
<script type="text/javascript" src="../JS/events.js"></script>
</body>
</html>