/* forma de iniciar los campos del incio de sesion  */
$(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });
  
/*forma de inicializar el sidenav */


  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });

  $("#sortable8").sortable({
    items: "li:not(.ui-state-disabled)"
    });
    
    $("#sortable9").sortable({
    cancel: ".ui-state-disabled"
    });

    //
$("#centralModalSuccess").on('show.bs.modal', function(){
      alert("Hello World!");
   });
   
   //grafico
   new Chart(document.getElementById("horizontalBar"), {
    "type": "horizontalBar",
    "data": {
      "labels": ["Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey"],
      "datasets": [{
        "label": "My First Dataset",
        "data": [22, 33, 55, 12, 86, 23, 14],
        "fill": false,
        "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
          "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
        ],
        "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
          "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
          "rgb(201, 203, 207)"
        ],
        "borderWidth": 1
      }]
    },
    "options": {
      "scales": {
        "xAxes": [{
          "ticks": {
            "beginAtZero": true
          }
        }]
      }
    }
  });

    // Regular map
    function regular_map() {
      var var_location = new google.maps.LatLng(13.8333000,-88.9167000);
  
      var var_mapoptions = {
        center: var_location,
        zoom: 14
      };
  
      var var_map = new google.maps.Map(document.getElementById("map-container"),
        var_mapoptions);
  
      var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "Instituto Tecnico Ricaldone"
      });
    }

    $("#ModalDanger").on('hide.bs.modal', function(){
      alert("Hello World!");
    });


    var map,
    markerIndex = 0,
    markersCoords = {};

map = new jvm.WorldMap({
    map: 'us_lcc',
    markerStyle: {
      initial: {
        fill: 'red'
      }
    },
    container: $('#event-map'),
    onMarkerLabelShow: function(e, label, code){
      label.text(markersCoords[code].lat.toFixed(2)+', '+markersCoords[code].lng.toFixed(2));
    },
    onMarkerClick: function(e, code){
      map.removeMarkers([code]);
    },
    regionLabelStyle: {
    initial: {
      fill: '#B90E32'
    },
    hover: {
      fill: 'black'
    }
  }
})

map.container.click(function(e){
    var latLng = map.pointToLatLng(
            e.pageX - map.container.offset().left,
            e.pageY - map.container.offset().top
        ),
        targetCls = $(e.target).attr('class');

    if (latLng && (!targetCls || (targetCls && $(e.target).attr('class').indexOf('jvectormap-marker') === -1))) {
      markersCoords[markerIndex] = latLng;
      console.log(`${markersCoords[markerIndex].lat}`)
      map.addMarker(markerIndex, {latLng: [latLng.lat, latLng.lng]});
      markerIndex += 1;
    }
});

  // Line
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });

  //pie
  var ctxP = document.getElementById("pieChart").getContext('2d');
  var myPieChart = new Chart(ctxP, {
    type: 'pie',
    data: {
      labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
      datasets: [{
        data: [300, 50, 100, 40, 120],
        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
      }]
    },
    options: {
      responsive: true,
      legend: false
    }
  });


  //line
  var ctxL = document.getElementById("lineChart").getContext('2d');
  var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [{
          label: "My First dataset",
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2,
          data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label: "My Second dataset",
          backgroundColor: [
            'rgba(0, 137, 132, .2)',
          ],
          borderColor: [
            'rgba(0, 10, 130, .7)',
          ],
          data: [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    },
    options: {
      responsive: true
    }
  });


  //radar
  var ctxR = document.getElementById("radarChart").getContext('2d');
  var myRadarChart = new Chart(ctxR, {
    type: 'radar',
    data: {
      labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
      datasets: [{
        label: "My First dataset",
        data: [65, 59, 90, 81, 56, 55, 40],
        backgroundColor: [
          'rgba(105, 0, 132, .2)',
        ],
        borderColor: [
          'rgba(200, 99, 132, .7)',
        ],
        borderWidth: 2
      }, {
        label: "My Second dataset",
        data: [28, 48, 40, 19, 96, 27, 100],
        backgroundColor: [
          'rgba(0, 250, 220, .2)',
        ],
        borderColor: [
          'rgba(0, 213, 132, .7)',
        ],
        borderWidth: 2
      }]
    },
    options: {
      responsive: true
    }
  });

  //doughnut
  var ctxD = document.getElementById("doughnutChart").getContext('2d');
  var myLineChart = new Chart(ctxD, {
    type: 'doughnut',
    data: {
      labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
      datasets: [{
        data: [300, 50, 100, 40, 120],
        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
      }]
    },
    options: {
      responsive: true
    }
  });








