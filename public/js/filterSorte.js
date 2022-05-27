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
        const divTreckInfosContainer = document.createElement("div");
        const btnTreck = document.createElement("button");

        const divTreckInfos = document.createElement("div");
        divTreckInfos.className =
            "px-5 text-nowrap d-flex flex-row justify-content-between";

        const divPTitles = document.createElement("p");
        divPTitles.className = "d-flex flex-column";
        const divHr = document.createElement("hr");
        divHr.className = "clas_ligne_listtreck";
        const divPInfos = document.createElement("p");
        divPInfos.className = "text-end";

        const strongDistance = document.createElement("strong");
        strongDistance.innerHTML = "Distance";
        const pTitleDistance = document.createElement("p");
        pTitleDistance.className = "mb-0";
        pTitleDistance.appendChild(strongDistance);

        const strongType = document.createElement("strong");
        strongType.innerHTML = "Type";
        const pTitleType = document.createElement("p");
        pTitleType.className = "mb-0";
        pTitleType.appendChild(strongType);

        const strongDifficulty = document.createElement("strong");
        strongDifficulty.innerHTML = "Difficulty";
        const pTitleDifficulty = document.createElement("p");
        pTitleDifficulty.className = "mb-0";
        pTitleDifficulty.appendChild(strongDifficulty);

        const strongTime = document.createElement("strong");
        strongTime.innerHTML = "Time";
        const pTitleTime = document.createElement("p");
        pTitleTime.className = "mb-0";
        pTitleTime.appendChild(strongTime);

        divPTitles.appendChild(strongDistance);
        divPTitles.appendChild(strongType);
        divPTitles.appendChild(strongDifficulty);
        divPTitles.appendChild(strongTime);

        const hrDistance = document.createElement("hr");
        hrDistance.className = "list_treck";
        const hrType = document.createElement("hr");
        hrType.className = "list_treck";
        const hrDifficulty = document.createElement("hr");
        hrDifficulty.className = "list_treck";
        const hrTime = document.createElement("hr");
        hrTime.className = "list_treck_fin";

        divHr.appendChild(hrDistance);
        divHr.appendChild(hrType);
        divHr.appendChild(hrDifficulty);
        divHr.appendChild(hrTime);

        const pDifficulty = document.createElement("p");
        pDifficulty.innerHTML = arrayTrecks[i].hardness;
        pDifficulty.className = "mb-0";
        const pTime = document.createElement("p");
        pTime.innerHTML = arrayTrecks[i].time;
        pTime.className = "mb-0";
        const pDistance = document.createElement("p");
        pDistance.innerHTML = arrayTrecks[i].distance;
        pDistance.className = "mb-0";
        const pType = document.createElement("p");
        pType.innerHTML = arrayTrecks[i].type;
        pType.className = "mb-0";

        divPInfos.appendChild(pDistance);
        divPInfos.appendChild(pType);
        divPInfos.appendChild(pDifficulty);
        divPInfos.appendChild(pTime);

        divTreckInfos.appendChild(divPTitles);
        divTreckInfos.appendChild(divHr);
        divTreckInfos.appendChild(divPInfos);

        btnTreck.textContent = arrayTrecks[i].treckName;
        btnTreck.className = "mx-5 text-white btn bouton";

        console.log(arrayTrecks[i].img);
        // imgTreck.src = "storage/app/" + arrayTrecks[i].img;
        img = arrayTrecks[i].img.replace("public", "/storage");
        imgTreck.src = img;

        imgTreck.className = "rounded-3 ratio_img";
        divTreckInfosContainer.className = "card ms-5 mt-3 mb-1";

        //####---production---#########################################################
        // <a href="http://treckinsecur-sprint-08.dwwm-12-2021.simplon.re/detailTrek/7">
        aDetailTreck.setAttribute(
            "href",
            "http://treckinsecur-sprint-08.dwwm-12-2021.simplon.re/" +
                arrayTrecks[i].id
        );
        imgTreck.alt =
            "http://treckinsecur-sprint-08.dwwm-12-2021.simplon.re/img/treckingsecurLogo.png";

        //####---local---#########################################################
        // <a href="http://127.0.0.1:8000/detailTrek/21">
        // aDetailTreck.setAttribute(
        //     "href",
        //     "http://127.0.0.1:8000/detailTrek/" + arrayTrecks[i].id
        // );
        // imgTreck.alt =
        //     "http://127.0.0.1:8000/detailTrek//img/treckingsecurLogo.png";

        aDetailTreck.appendChild(imgTreck);

        divTreckInfosContainer.appendChild(aDetailTreck);
        divTreckInfosContainer.appendChild(divTreckInfos);
        divTreckInfosContainer.appendChild(btnTreck);
        divMainTecks.appendChild(divTreckInfosContainer);
    }
}
