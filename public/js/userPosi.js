mapboxgl.accessToken =
    "pk.eyJ1IjoiY29sb3NzdXMxOTg1IiwiYSI6ImNsMm9penoxcjFoNGIzZG5xdm95eGhicDQifQ.0F6F6Mgivxm8qkGavUsXOw";
coords = document.getElementById("coords").value;
profile = document.getElementById("profile").value;

let distance = 0;
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
// map.addControl(draw);

// Add create, update, or delete actions
// map.on("draw.create", updateRoute);
// map.on("draw.update", updateRoute);
// map.on("draw.delete", removeRoute);

// Use the coordinates you just drew to make the Map Matching API request
// function updateRoute(profile, coords) {
// console.log("ici1");
// removeRoute(); // Overwrite any existing layers

// const profile = "walking"; // Set the profile

// // Get the coordinates
// const data = draw.getAll();
// const lastFeature = data.features.length - 1;
// const coords = data.features[lastFeature].geometry.coordinates;
// // Format the coordinates
// const newCoords = coords.join(";");
// // Set the radius for each coordinate pair to 25 meters
// const radius = coords.map(() => 25);
//getMatch(profile, coords);
// }

map.on("load", () => {
    map.addControl(draw);
    getMatch(profile, coords);
});

// Make a Map Matching request
async function getMatch(profile, coordinates) {
    // Separate the radiuses with semicolons
    // const radiuses = radius.join(";");
    // Create the query
    // console.log("ici2");

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

// // Add geolocate control to the map.
// map.addControl(
//     new mapboxgl.GeolocateControl({
//         positionOptions: {
//             enableHighAccuracy: true,
//         },
//         // When active the map will receive updates to the device's location as it changes.
//         trackUserLocation: true,
//         // Draw an arrow next to the location dot to indicate which direction the device is heading.
//         showUserHeading: true,
//     })
// );

const geolocate = new mapboxgl.GeolocateControl({
    positionOptions: {
        enableHighAccuracy: true,
    },
    trackUserLocation: true,
});
map.addControl(geolocate);
geolocate.on("geolocate", (e) => {
    var lon = e.coords.longitude;
    var lat = e.coords.latitude;
    var position = [lon, lat];
    console.log(position);
});
