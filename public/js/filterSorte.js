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
            reconstructDOM(arrayTrecks);
        }

        if (textBtnDistance == "Distance 🔽") {
            console.log("second");
            document.getElementById("btnDistance").textContent = "Distance 🔼";
            arrayTrecks = arrayTrecksLS();
            var arrayTrecks = arrayTrecks.slice(0);
            arrayTrecks.sort(function (a, b) {
                return a.distance - b.distance;
            });
            reconstructDOM(arrayTrecks);
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
            reconstructDOM(arrayTrecks);
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
            reconstructDOM(arrayTrecks);
        }
        if (textBtnTime == "Time 🔽") {
            console.log("second");
            document.getElementById("btnTime").textContent = "Time 🔼";
            arrayTrecks = arrayTrecksLS();
            var arrayTrecks = arrayTrecks.slice(0);
            arrayTrecks.sort(function (a, b) {
                return a.time - b.time;
            });
            reconstructDOM(arrayTrecks);
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
            reconstructDOM(arrayTrecks);
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
            reconstructDOM(arrayTrecks);
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
            reconstructDOM(arrayTrecks);
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
            reconstructDOM(arrayTrecks);
        }
    }
    localStorage.setItem("arrayTrecksLS", JSON.stringify(arrayTrecks));
}

function resetChoiceBTN(btnToReset1, textBtn1, btnToReset2, textBtn2) {
    document.getElementById(btnToReset1).textContent = textBtn1;
    document.getElementById(btnToReset2).textContent = textBtn2;
}

function reconstructDOM(arrayTrecks) {
    console.log(arrayTrecks);
    document.getElementById("divMainTecks").value = "";
    const divMainTecks = document.getElementById("divMainTecks");
    divMainTecks.textContent = "";

    for (let i = 0; i < arrayTrecks.length; i++) {
        const aDetailTreck = document.createElement("a");
        const imgTreck = document.createElement("img");
        const divTreckInfos = document.createElement("div");
        const treckTitle = document.createElement("p");
        const divTreckInfosContainer = document.createElement("div");

        const divTreckInfosContainerLeft = document.createElement("div");
        const divTreckInfosContainerLeftUp = document.createElement("div");
        const strongDistance = document.createElement("strong");
        const hrDistance = document.createElement("hr");
        const hrType = document.createElement("hr");
        const hrDifficulty = document.createElement("hr");
        const hrTime = document.createElement("hr");
        const pDistance = document.createElement("p");
        const divTreckInfosContainerLeftDown = document.createElement("div");
        const strongType = document.createElement("strong");
        const pType = document.createElement("p");

        console.log(arrayTrecks[i].img);
        // imgTreck.src = "storage/app/" + arrayTrecks[i].img;
        img = arrayTrecks[i].img.replace("public", "/storage");
        imgTreck.src = img;
        imgTreck.alt =
            "http://treckinsecur-sprint-08.dwwm-12-2021.simplon.re/img/treckingsecurLogo.png";

        imgTreck.className = "rounded-3 ratio_img";
        divTreckInfos.className = "text-center ms-2";
        treckTitle.className = "mb-5";
        divTreckInfosContainer.className =
            "d-flex flex-row border rounded-3 m-3 card";
        divTreckInfosContainerLeft.className = "mx-2";

        //####---production---#########################################################
        // <a href="http://treckinsecur-sprint-08.dwwm-12-2021.simplon.re/detailTrek/7">
        aDetailTreck.setAttribute(
            "href",
            "http://treckinsecur-sprint-08.dwwm-12-2021.simplon.re/" +
                arrayTrecks[i].id
        );

        //####---local---#########################################################
        // <a href="http://127.0.0.1:8000/detailTrek/21">
        // aDetailTreck.setAttribute(
        //     "href",
        //     "http://127.0.0.1:8000/detailTrek/" + arrayTrecks[i].id
        // );

        aDetailTreck.appendChild(imgTreck);

        treckTitle.innerHTML = arrayTrecks[i].treckName;

        strongDistance.innerHTML = "Distance";
        pDistance.innerHTML = arrayTrecks[i].distance;

        strongType.innerHTML = "Type";
        pType.innerHTML = arrayTrecks[i].type;

        divTreckInfosContainerLeftUp.appendChild(strongDistance);
        divTreckInfosContainerLeftUp.appendChild(hrDistance);
        divTreckInfosContainerLeftUp.appendChild(pDistance);

        divTreckInfosContainerLeftDown.appendChild(strongType);
        divTreckInfosContainerLeftDown.appendChild(hrType);
        divTreckInfosContainerLeftDown.appendChild(pType);

        divTreckInfosContainerLeft.appendChild(divTreckInfosContainerLeftUp);
        divTreckInfosContainerLeft.appendChild(divTreckInfosContainerLeftDown);

        const divTreckInfosContainerRight = document.createElement("div");
        const divTreckInfosContainerRightUp = document.createElement("div");
        const strongDifficulty = document.createElement("strong");
        const pDifficulty = document.createElement("p");
        const divTreckInfosContainerRightDown = document.createElement("div");
        const strongTime = document.createElement("strong");
        const pTime = document.createElement("p");

        divTreckInfosContainerRight.className = "mx-2";

        strongDifficulty.innerHTML = "Hardness";
        pDifficulty.innerHTML = arrayTrecks[i].hardness;

        strongTime.innerHTML = "Time";
        pTime.innerHTML = arrayTrecks[i].time;

        divTreckInfosContainerRightUp.appendChild(strongDifficulty);
        divTreckInfosContainerRightUp.appendChild(hrDifficulty);
        divTreckInfosContainerRightUp.appendChild(pDifficulty);

        divTreckInfosContainerRightDown.appendChild(strongTime);
        divTreckInfosContainerRightDown.appendChild(hrTime);
        divTreckInfosContainerRightDown.appendChild(pTime);

        divTreckInfosContainerRight.appendChild(divTreckInfosContainerRightUp);
        divTreckInfosContainerRight.appendChild(
            divTreckInfosContainerRightDown
        );
        divTreckInfosContainer.appendChild(treckTitle);
        divTreckInfosContainer.appendChild(aDetailTreck);
        divTreckInfosContainer.appendChild(divTreckInfosContainerLeft);
        divTreckInfosContainer.appendChild(divTreckInfosContainerRight);
        divMainTecks.appendChild(divTreckInfosContainer);
    }
}
