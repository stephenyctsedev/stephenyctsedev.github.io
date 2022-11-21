<!DOCTYPE HTML>
<html>

<head>
    <title>Timer</title>
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.png" type="image/png" />

    <style>
        p {
            text-align: center;
            font-size: 40px;
            margin-top: 0px;
            color: white;
        }

        body {
            background: black;
        }
    </style>
</head>

<body>

    <p id="demo"></p>

    <script>
        // Set the date we're counting down to
        //var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();


        Date.prototype.pattern = function(fmt) {
            var o = {
                "M+": this.getMonth() + 1, //Month     
                "d+": this.getDate(), //Day
                "h+": this.getHours() % 12 == 0 ? 12 : this.getHours() % 12, //12Hour        
                "H+": this.getHours(), //24Hounr         
                "m+": this.getMinutes(), //Minute    
                "s+": this.getSeconds(), //Seconds      
                "q+": Math.floor((this.getMonth() + 3) / 3), //Quarter         
                "S": this.getMilliseconds() //Milliseconds         
            };
            var week = {
                "0": "\u65e5",
                "1": "\u4e00",
                "2": "\u4e8c",
                "3": "\u4e09",
                "4": "\u56db",
                "5": "\u4e94",
                "6": "\u516d"
            };
            var jWeek = {
                "0": "\u65e5",
                "1": "\u6708",
                "2": "\u706b",
                "3": "\u6c34",
                "4": "\u6728",
                "5": "\u91d1",
                "6": "\u571f"
            };

            if (/(y+)/.test(fmt)) {
                fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
            }
            if (/(E+)/.test(fmt)) {
                fmt = fmt.replace(RegExp.$1, ((RegExp.$1.length > 1) ? (RegExp.$1.length > 2 ? "\u661f\u671f" : "\u5468") : "") + week[this.getDay() + ""]);
            }
            if (/(J+)/.test(fmt)) {
                fmt = fmt.replace(RegExp.$1, jWeek[this.getDay() + ""] + ((RegExp.$1.length > 1) ? (RegExp.$1.length > 2 ? "\u66dc\u65e5" : "\u66dc") : ""));
            }
            for (var k in o) {
                if (new RegExp("(" + k + ")").test(fmt)) {
                    fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
                }
            }
            return fmt;
        }

        // Update the count down every 1 second
        var x = setInterval(function() {
            var startStr = "Now: ";

            var now = new Date().pattern("yyyy/MM/dd(E) HH:mm:ss");

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = now;

        }, 1000);
    </script>

</body>

</html>