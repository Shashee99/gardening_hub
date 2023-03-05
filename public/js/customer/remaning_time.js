const tabale_items = document.querySelectorAll(".remaning_time");

tabale_items.forEach(item => {
    setInterval(() => {
        //const expire_time = new Date("2023-03-05 23:59:00");
        const expire_time = new Date(item.dataset.time);

        
        //console.log(expire_time);

        var date = Math.abs((new Date().getTime() / 1000).toFixed(0));
        var date2 = Math.abs((new Date(expire_time).getTime() / 1000).toFixed(0));

        var diff = date2 - date;

        var days = Math.floor(diff / 86400);
        var hours = Math.floor(diff / 3600) % 24;
        var minutes = Math.floor(diff / 60) % 60;
        var seconds = diff % 60;

        var daysStr = days;
        if (days < 10) {
            daysStr = "0" + days;
        }
 
        var hoursStr = hours;
        if (hours < 10) {
            hoursStr = "0" + hours;
        }
 
        var minutesStr = minutes;
        if (minutes < 10) {
            minutesStr = "0" + minutes;
        }
 
        var secondsStr = seconds;
        if (seconds < 10) {
            secondsStr = "0" + seconds;
        }
        console.log(daysStr + " days, " + hoursStr + ":" + minutesStr + ":" + secondsStr);

        tabale_items.textContent = daysStr + " days, " + hoursStr + ":" + minutesStr + ":" + secondsStr;
      // Code to execute on each interval
    }, 1000); // Interval time in milliseconds
  });


// tabale_items.forEach(setInterval((data) => {
//     // data.setInterval(() => {
//         console.log(tabale_items);
        

//         //const value = document.querySelectorAll(".value");
//         const expire_time = new Date("2023-03-05 23:59:00");
//         //const expire_time = data.dataset.time;
//         console.log("hello");
//         //console.log(expire_time);

//         var date = Math.abs((new Date().getTime() / 1000).toFixed(0));
//         var date2 = Math.abs((new Date(expire_time).getTime() / 1000).toFixed(0));

//         var diff = date2 - date;

//         var days = Math.floor(diff / 86400);
//         var hours = Math.floor(diff / 3600) % 24;
//         var minutes = Math.floor(diff / 60) % 60;
//         var seconds = diff % 60;

//         var daysStr = days;
//         if (days < 10) {
//             daysStr = "0" + days;
//         }
 
//         var hoursStr = hours;
//         if (hours < 10) {
//             hoursStr = "0" + hours;
//         }
 
//         var minutesStr = minutes;
//         if (minutes < 10) {
//             minutesStr = "0" + minutes;
//         }
 
//         var secondsStr = seconds;
//         if (seconds < 10) {
//             secondsStr = "0" + seconds;
//         }
//         console.log(daysStr + " days, " + hoursStr + ":" + minutesStr + ":" + secondsStr);

//         tabale_items.innerHTML = daysStr + " days, " + hoursStr + ":" + minutesStr + ":" + secondsStr;

//     }, 1000));
    
    
    // addEventListener("onload", function(){
    //     console.log(tabale_items);
        
    //     const expire_time = data.dataset.time;

    //     var date = Math.abs((new Date().getTime() / 1000).toFixed(0));
    //     var date2 = Math.abs((new Date(expire_time).getTime() / 1000).toFixed(0));

    //     var diff = date2 - date;

    //     var days = Math.floor(diff / 86400);
    //     var hours = Math.floor(diff / 3600) % 24;
    //     var minutes = Math.floor(diff / 60) % 60;
    //     var seconds = diff % 60;

    //     var daysStr = days;
    //     if (days < 10) {
    //         daysStr = "0" + days;
    //     }
 
    //     var hoursStr = hours;
    //     if (hours < 10) {
    //         hoursStr = "0" + hours;
    //     }
 
    //     var minutesStr = minutes;
    //     if (minutes < 10) {
    //         minutesStr = "0" + minutes;
    //     }
 
    //     var secondsStr = seconds;
    //     if (seconds < 10) {
    //         secondsStr = "0" + seconds;
    //     }

    //     tabale_items.innerHTML = daysStr + " days, " + hoursStr + ":" + minutesStr + ":" + secondsStr;
    //});

//});