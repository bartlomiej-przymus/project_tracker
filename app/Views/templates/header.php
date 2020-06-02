<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Project Tracker</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="/assets/css/style.css">
            <script>
                /* let myInterval = setInterval(currentTime, 1000); */
                function currentTime() {
                    let dateNow = new Date();
                    const options = {
                        weekday: 'short',
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric'
                    };
                    let day = dateNow.toLocaleDateString(undefined, options);
                    document.getElementById("current_time").innerHTML = day;/* + ' ' + dateNow.toLocaleTimeString();*/
                }
                window.onload = currentTime;
            </script>
        </head>
        <body>
            <div class="container"> <!--this is main container-->
                <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
                    <div class="container">
                        <div class="col-3 col-md-4">
                                <a class="navbar-brand text-wrap" href="/">Project Tracker</a>
                            </div>
                            <div class="col-9 col-md-8 text-right">
                                <div class="navbar-text text-white-50">
                                    <span id="current_time"></span>
                                </div>
                            </div>
                    </div>
                </nav>        