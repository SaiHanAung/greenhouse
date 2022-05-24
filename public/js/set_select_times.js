function update(id) {
    // Select Every Count Container
    const countContainer = document.querySelectorAll(".count-digit");

    // Select option buttons
    const startAction = document.getElementById("start-timer");
    const stopAction = document.getElementById("stop-timer");
    const resetAction = document.getElementById("reset-timer");

    // Select HTML5 Audio element
    const timeoutAudio = document.getElementById("alarm_audio");

    // Default inital value of timer
    var select1 = document.getElementById("select_time");

    var item0 = select1.options[select1.selectedIndex].getAttribute('data-var0');
    var item1 = select1.options[select1.selectedIndex].getAttribute('data-var1');
    var item2 = select1.options[select1.selectedIndex].getAttribute('data-var2');
    var item3 = select1.options[select1.selectedIndex].getAttribute('data-var3');
    var item4 = select1.options[select1.selectedIndex].getAttribute('data-var4');
    var item5 = select1.options[select1.selectedIndex].getAttribute('data-var5');
    var item6 = select1.options[select1.selectedIndex].getAttribute('data-var6');
    var item7 = select1.options[select1.selectedIndex].getAttribute('data-var7');
    var item8 = select1.options[select1.selectedIndex].getAttribute('data-var8');
    var item9 = select1.options[select1.selectedIndex].getAttribute('data-var9');
    var item10 = select1.options[select1.selectedIndex].getAttribute('data-var10');
    var item11 = select1.options[select1.selectedIndex].getAttribute('data-var11');

    // var var1 = item.getAttribute('data-var1');

    if (item0) {
        var defaultValue = 1 * 10;
    }
    if (item1) {
        var defaultValue = 5 * 60;
    }
    if (item2) {
        var defaultValue = 10 * 60;
    }
    if (item3) {
        var defaultValue = 15 * 60;
    }
    if (item4) {
        var defaultValue = 20 * 60;
    }
    if (item5) {
        var defaultValue = 25 * 60;
    }
    if (item6) {
        var defaultValue = 30 * 60;
    }
    if (item7) {
        var defaultValue = 35 * 60;
    }
    if (item8) {
        var defaultValue = 40 * 60;
    }
    if (item9) {
        var defaultValue = 45 * 60;
    }
    if (item10) {
        var defaultValue = 50 * 60;
    }
    if (item11) {
        var defaultValue = 55 * 60;
    }

    // variable to the time
    var countDownTime = defaultValue;

    // variable to store time interval
    var timerID;

    // Variable to track whether timer is running or not
    var isStopped = true;

    // Function calculate time string
    const findTimeString = () => {
        var minutes = String(Math.trunc(countDownTime / 60));
        var seconds = String(countDownTime % 60);
        if (minutes.length === 1) {
            minutes = "0" + minutes;
        }
        if (seconds.length === 1) {
            seconds = "0" + seconds;
        }
        return minutes + seconds;
    };

    // Function to start Countdown
    const startTimer = () => {
        if (isStopped) {
            isStopped = false;
            timerID = setInterval(runCountDown, 1000);
        }
    };

    // Function to stop Countdown
    const stopTimer = () => {
        isStopped = true;
        if (timerID) {
            clearInterval(timerID);
        }
    };

    // Function to reset Countdown
    const resetTimer = () => {
        stopTimer();
        countDownTime = defaultValue;
        renderTime();
    };

    // Initialize alarm sound
    timeoutAudio.src = "http://soundbible.com/grab.php?id=1252&type=mp3";
    timeoutAudio.load();

    // Attach onclick event to buttons
    startAction.onclick = startTimer;
    resetAction.onclick = resetTimer;
    stopAction.onclick = stopTimer;

    // Function to display coundown on screen
    const renderTime = () => {
        const time = findTimeString();
        countContainer.forEach((count, index) => {
            count.innerHTML = time.charAt(index);
        });
    };

    // function to execute timer
    const runCountDown = () => {
        // decement time
        countDownTime -= 1;
        //Display updated time
        renderTime();

        // timeout on zero
        if (countDownTime === 0) {
            stopTimer();
            // Play alarm on timeout
            timeoutAudio.play();
            countDownTime = defaultValue;
        }
    };
}

update();