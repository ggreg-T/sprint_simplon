mapboxgl.accessToken =
    "pk.eyJ1IjoiY29sb3NzdXMxOTg1IiwiYSI6ImNsMm9penoxcjFoNGIzZG5xdm95eGhicDQifQ.0F6F6Mgivxm8qkGavUsXOw";
let distance = 0;
let duration = 0;
const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/mapbox/streets-v11",
    center: [55.53296113212326, -21.130457736181043], // starting position
    zoom: 9,
});

const draw = new MapboxDraw({
    // Instead of showing all the draw tools, show only the line string and delete tools
    displayControlsDefault: false,
    controls: {
        line_string: true,
        trash: true,
    },
    // Set the draw mode to draw LineStrings by default
    defaultMode: "draw_line_string",
    styles: [
        // Set the line style for the user-input coordinates
        {
            id: "gl-draw-line",
            type: "line",
            filter: [
                "all",
                ["==", "$type", "LineString"],
                ["!=", "mode", "static"],
            ],
            layout: {
                "line-cap": "round",
                "line-join": "round",
            },
            paint: {
                "line-color": "#438EE4",
                "line-dasharray": [0.2, 2],
                "line-width": 2,
                "line-opacity": 0.7,
            },
        },
        // Style the vertex point halos
        {
            id: "gl-draw-polygon-and-line-vertex-halo-active",
            type: "circle",
            filter: [
                "all",
                ["==", "meta", "vertex"],
                ["==", "$type", "Point"],
                ["!=", "mode", "static"],
            ],
            paint: {
                "circle-radius": 12,
                "circle-color": "#FFF",
            },
        },
        // Style the vertex points
        {
            id: "gl-draw-polygon-and-line-vertex-active",
            type: "circle",
            filter: [
                "all",
                ["==", "meta", "vertex"],
                ["==", "$type", "Point"],
                ["!=", "mode", "static"],
            ],
            paint: {
                "circle-radius": 8,
                "circle-color": "#438EE4",
            },
        },
    ],
});

// Add the draw tool to the map
map.addControl(draw);

// Add create, update, or delete actions
map.on("draw.create", updateRoute);
map.on("draw.update", updateRoute);
map.on("draw.delete", removeRoute);

// Use the coordinates you just drew to make the Map Matching API request
function updateRoute() {
    removeRoute(); // Overwrite any existing layers

    const profile = "walking"; // Set the profile

    // Get the coordinates
    const data = draw.getAll();
    const lastFeature = data.features.length - 1;
    const coords = data.features[lastFeature].geometry.coordinates;
    // Format the coordinates
    const newCoords = coords.join(";");
    // Set the radius for each coordinate pair to 25 meters
    const radius = coords.map(() => 25);
    getMatch(newCoords, radius, profile);
}

// Make a Map Matching request
async function getMatch(coordinates, radius, profile) {
    // Separate the radiuses with semicolons
    const radiuses = radius.join(";");
    // Create the query
    // console.log(typeof coordinates);

    const query = await fetch(
        `https://api.mapbox.com/directions/v5/mapbox/${profile}/${coordinates}?` +
            `geometries=geojson&alternatives=true&continue_straight=true&` +
            `language=en&overview=simplified&steps=true&access_token=${mapboxgl.accessToken}`,
        { method: "GET" }
    );
    const response = await query.json();
    console.log(response);
    // Handle errors
    if (response.code !== "Ok") {
        alert(
            `${response.code} - ${response.message}.\n\nFor more information: https://docs.mapbox.com/api/navigation/map-matching/#map-matching-api-errors`
        );
        return;
    }
    // Draw the route on the map
    // addRoute(coords);
    addRoute(response.routes[0].geometry);
    getInstructions(response.routes[0]);
    // console.log(response.routes[0].distance);

    //###---for add route informations in db by the form---###############################################
    distance = (response.routes[0].distance / 1000).toFixed(2);
    const goback = document.getElementById("btn-check-outlined-go&back");
    if (goback) {
        distance = distance * 2;
    }
    duration = response.routes[0].duration;
    duration = Math.round(duration / 60);

    document.getElementById("floatingCoords").value = coordinates;
    document.getElementById("floatingDistance").value = distance;
    document.getElementById("floatingProfile").value = profile;
    document.getElementById("floatingTime").value = duration;
}
function distanceX2() {
    distance2Way = distance * 2;
    time2Way = duration * 2;
    document.getElementById("floatingDistance").value = distance2Way;
    document.getElementById("floatingTime").value = time2Way;
}
function distanceX1() {
    document.getElementById("floatingDistance").value = distance;
    document.getElementById("floatingTime").value = duration;
}

function getInstructions(data) {
    // Target the sidebar to add the instructions
    const directions = document.getElementById("directions");
    let tripDirections = "";
    // Output the instructions for each step of each leg in the response object
    for (const leg of data.legs) {
        const steps = leg.steps;
        for (const step of steps) {
            tripDirections += `<li>${step.maneuver.instruction}</li>`;
        }
    }
    directions.innerHTML = `<p><strong>Trip duration: ${Math.floor(
        data.duration / 60
    )} min.</strong></p><ol>${tripDirections}</ol>`;
}

// Draw the Map Matching route as a new layer on the map
function addRoute(coords) {
    // If a route is already loaded, remove it
    if (map.getSource("route")) {
        map.removeLayer("route");
        map.removeSource("route");
    } else {
        map.addLayer({
            id: "route",
            type: "line",
            source: {
                type: "geojson",
                data: {
                    type: "Feature",
                    properties: {},
                    geometry: coords,
                },
            },
            layout: {
                "line-join": "round",
                "line-cap": "round",
            },
            paint: {
                "line-color": "#03AA46",
                "line-width": 8,
                "line-opacity": 0.8,
            },
        });
    }
}

// If the user clicks the delete draw button, remove the layer if it exists
function removeRoute() {
    if (!map.getSource("route")) return;
    map.removeLayer("route");
    map.removeSource("route");
}

//####---direction fields---####################################################

const nav = new mapboxgl.NavigationControl();
map.addControl(nav);

// let direction = new MapboxDirection({
//     accessToken: mapboxgl.accessToken,
// });

// map.addControl(directions, "top-left");
