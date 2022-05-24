const filter = document.getElementById("");
const sorte = document.getElementById("");
let arrayTrecks = document.getElementById("listTrecks").textContent;
arrayTrecks = JSON.parse(arrayTrecks);
// console.log(arrayTrecks);
localStorage.setItem("arrayTrecksLS", JSON.stringify(arrayTrecks));

function arrayTrecksLS() {
    var arrayTrecksLS = localStorage.getItem("arrayTrecksLS");
    if (arrayTrecksLS != "" && arrayTrecksLS != null) {
        arrayTrecksLS = JSON.parse(arrayTrecksLS);
        localStorage.clear();
    }
    return arrayTrecksLS;
}

function sorteChoice(choice) {
    // console.log("[", choice, "]");
    let textBtnDistance = document.getElementById("btnDistance").textContent;
    let textBtnTime = document.getElementById("btnTime").textContent;
    let textBtnDifficulty =
        document.getElementById("btnDifficulty").textContent;

    if (choice == "Distance") {
        resetChoiceBTN("btnTime", "Time", "btnDifficulty", "Difficulty");

        if (textBtnDistance == "Distance") {
            console.log("first");
            document.getElementById("btnDistance").textContent = "Distance 🔽";
            arrayTrecks = arrayTrecksLS();
            // console.log(arrayTrecksSort);
            var arrayTrecks = arrayTrecks.slice(0);
            arrayTrecks
                .sort(function (a, b) {
                    return a.distance - b.distance;
                })
                .reverse();
            console.log(arrayTrecks);
        }
        if (textBtnDistance == "Distance 🔽") {
            console.log("second");
            document.getElementById("btnDistance").textContent = "Distance 🔼";
            arrayTrecks = arrayTrecksLS();
            var arrayTrecks = arrayTrecks.slice(0);
            arrayTrecks.sort(function (a, b) {
                return a.distance - b.distance;
            });
        }
        if (textBtnDistance == "Distance 🔼") {
            console.log("third");
            document.getElementById("btnDistance").textContent = "Distance 🔽";
            arrayTrecks = arrayTrecksLS();
            var arrayTrecks = arrayTrecks.slice(0);
            arrayTrecks
                .sort(function (a, b) {
                    return a.distance - b.distance;
                })
                .reverse();
        }
    }
    if (choice == "Time") {
        resetChoiceBTN(
            "btnDistance",
            "Distance",
            "btnDifficulty",
            "Difficulty"
        );
        if (textBtnTime == "Time") {
            console.log("first");
            document.getElementById("btnTime").textContent = "Time 🔽";
            arrayTrecks = arrayTrecksLS();
            var arrayTrecks = arrayTrecks.slice(0);
            arrayTrecks
                .sort(function (a, b) {
                    return a.time - b.time;
                })
                .reverse();
        }
        if (textBtnTime == "Time 🔽") {
            console.log("second");
            document.getElementById("btnTime").textContent = "Time 🔼";
            arrayTrecks = arrayTrecksLS();
            var arrayTrecks = arrayTrecks.slice(0);
            arrayTrecks.sort(function (a, b) {
                return a.time - b.time;
            });
        }
        if (textBtnTime == "Time 🔼") {
            console.log("third");
            document.getElementById("btnTime").textContent = "Time 🔽";
            arrayTrecks = arrayTrecksLS();
            var arrayTrecks = arrayTrecks.slice(0);
            arrayTrecks
                .sort(function (a, b) {
                    return a.time - b.time;
                })
                .reverse();
        }
    }
    if (choice == "Difficulty") {
        resetChoiceBTN("btnTime", "Time", "btnDistance", "Distance");
        if (textBtnDifficulty == "Difficulty") {
            console.log("first");
            document.getElementById("btnDifficulty").textContent =
                "Difficulty 🔽";
            arrayTrecks = arrayTrecksLS();
            var arrayTrecks = arrayTrecks.slice(0);
            arrayTrecks
                .sort(function (a, b) {
                    var x = a.hardness.toLowerCase();
                    var y = b.hardness.toLowerCase();
                    return x < y ? -1 : x > y ? 1 : 0;
                })
                .reverse();
        }
        if (textBtnDifficulty == "Difficulty 🔽") {
            console.log("second");
            document.getElementById("btnDifficulty").textContent =
                "Difficulty 🔼";
            arrayTrecks = arrayTrecksLS();
            var arrayTrecks = arrayTrecks.slice(0);
            arrayTrecks.sort(function (a, b) {
                var x = a.hardness.toLowerCase();
                var y = b.hardness.toLowerCase();
                return x < y ? -1 : x > y ? 1 : 0;
            });
        }
        if (textBtnDifficulty == "Difficulty 🔼") {
            console.log("third");
            document.getElementById("btnDifficulty").textContent =
                "Difficulty 🔽";
            arrayTrecks = arrayTrecksLS();
            var arrayTrecks = arrayTrecks.slice(0);
            arrayTrecks
                .sort(function (a, b) {
                    var x = a.hardness.toLowerCase();
                    var y = b.hardness.toLowerCase();
                    return x < y ? -1 : x > y ? 1 : 0;
                })
                .reverse();
        }
    }
    localStorage.setItem("arrayTrecksLS", JSON.stringify(arrayTrecks));
}

function resetChoiceBTN(btnToReset1, textBtn1, btnToReset2, textBtn2) {
    document.getElementById(btnToReset1).textContent = textBtn1;
    document.getElementById(btnToReset2).textContent = textBtn2;
}
