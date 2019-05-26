(function() {
  "use strict";

  var isDisplayingInstructions = false;
  var currentInstructionsIndex = 1;
  var gMap = null;
  var openedInfoWindow = null;
  var isDark = false;
  window.map = null;
  var timeline = null;

  function initTimeline() {
    let c = document.getElementById("timeRender");
    timeline = {
      canvas: c,
      ctx: c.getContext("2d"),
      padding: 10,
      contentPadding: 30,
      arrowWidth: 20,
      arrowHeight: 10,
      _years: {},
      _hoveredYear: -1,
      _selectedYear: -1,
      _activeMarkers: [],
      _activePoligone: [],

      render: function() {
        let midHeight = timeline.canvas.height / 2.0 + 10;
        let arrowWidth = timeline.arrowWidth;
        let arrowHeight = timeline.arrowHeight;

        timeline.ctx.clearRect(0, 0, timeline.canvas.width, timeline.canvas.height);
        timeline.ctx.fillStyle = "black";
        timeline.ctx.lineWidth = 2;
        timeline.ctx.beginPath();
        timeline.ctx.moveTo(timeline.padding, midHeight);
        timeline.ctx.lineTo(timeline.canvas.width - timeline.padding, midHeight);
        timeline.ctx.stroke();
        timeline.ctx.closePath();
        timeline.ctx.beginPath();
        timeline.ctx.lineTo(timeline.canvas.width - timeline.padding - arrowWidth, midHeight + arrowHeight);
        timeline.ctx.lineTo(timeline.canvas.width - timeline.padding - arrowWidth, midHeight - arrowHeight);
        timeline.ctx.lineTo(timeline.canvas.width - timeline.padding, midHeight);
        timeline.ctx.fill();
        timeline.ctx.closePath();

        var years = timeline._years;
        var firstYear = years.get(0);
        var lastYear = years.get(years.length - 1);
        var totalTimeSpan = lastYear - firstYear;
        var distPerYear = ((timeline.canvas.width - 2 * timeline.contentPadding) - timeline.padding - arrowWidth) / totalTimeSpan;
        window.years = years;

        var i = 0;
        for (var year in years) {
          var yearsPassed = year - firstYear;
          var radius = 10;
          if ((parseInt(firstYear) + timeline._selectedYear) == year) {
            timeline.ctx.fillStyle = "#de00de";
            timeline.ctx.strokeStyle = "#222";
            radius = 12;
          } else if ((parseInt(firstYear) + timeline._hoveredYear) == year) {
            timeline.ctx.fillStyle = "lightblue";
            timeline.ctx.strokeStyle = "#222";
          } else {
            timeline.ctx.fillStyle = "grey";
            timeline.ctx.strokeStyle = "black";
          }

          timeline.ctx.storkeStyle = "black";
          timeline.ctx.beginPath();
          timeline.ctx.arc(yearsPassed * distPerYear + timeline.contentPadding, midHeight, radius, 0, 2 * Math.PI, true);
          timeline.ctx.fill();
          timeline.ctx.stroke();
          timeline.ctx.closePath();
          timeline.ctx.fillStyle = isDark ? "white" : "black";
          timeline.ctx.font = "18px Verdana";
          timeline.ctx.fillText("" + year, yearsPassed * distPerYear + timeline.contentPadding - 10, midHeight - 20);
          i++;
        }
      },

      resize: function() {
        timeline.canvas.width = window.innerWidth;
        timeline.canvas.height = 100;
        timeline.render();
      },

      mouseMove: function(e) {
        var containerWidth = 50;
        var years = timeline._years;
        var firstYear = years.get(0);
        var lastYear = years.get(years.length - 1);
        var totalTimeSpan = lastYear - firstYear;
        var distPerYear = ((timeline.canvas.width - 2 * timeline.contentPadding) - timeline.padding - timeline.arrowWidth) / totalTimeSpan;
        var yearNumb = Math.floor(e.clientX / distPerYear);

        timeline._hoveredYear = yearNumb;
        timeline.render();
      },

      mouseLeave: function(e) {
        timeline._hoveredYear = -1;
        timeline.render();
      },

      click: function(e) {
        var years = timeline._years;
        if (years[timeline._hoveredYear + parseInt(years.get(0))]) {
          if (isDisplayingInstructions) {
            displayNextInstructionImage(2);
          }

          timeline._selectedYear = timeline._hoveredYear;
          timeline._hoveredYear = -1;
          timeline.render();

          var eventsListUL = document.getElementById("eventsList").children[1];
          eventsListUL.innerHTML = "";


          for (var j in timeline._activeMarkers) {
            var marker = timeline._activeMarkers[j];
            marker.setMap(null);
          }

          for (var k in timeline._activePoligone) {
            var poligone = timeline._activePoligone[k];
            poligone.setMap(null);
          }

          timeline._activeMarkers = [];
          var year = timeline._years[parseInt(timeline._years.get(0)) + timeline._selectedYear];
          document.getElementById("eventsList").children[0].innerHTML = parseInt(timeline._years.get(0)) + timeline._selectedYear;
          for (var i in year) {
            var event = year[i];

            var li = document.createElement("li");
            li.appendChild(document.createTextNode(event.title));
            eventsListUL.appendChild(li);

            var monthNames = ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"];
            var d = event.date;

            var contentString =
            '<div id="content" style="color: black">' +
             '<div id="siteNotice">' +
              '<p>' + event.place + ': ' + monthNames[d.getMonth()] + ', ' + event.date.getUTCFullYear() + '</p>' +
             '</div>' +
             '<h1 id="firstHeading" class="firstHeading">' + event.title + '</h1>' +
             '<div id="bodyContent">' +
              '<p>' + event.content + '</p>' +
              '<p><a href="#" onclick="displayInfo(' + event.id + ', \'' + event.title + '\')">Mehr Infos</a></p>' +
             '</div>' +
            '</div>';

            var infowindow = new google.maps.InfoWindow({
              content: contentString
            });

            var marker = new google.maps.Marker({
              position: new google.maps.LatLng(event.position[0], event.position[1]),
              map: gMap,
              title: event.title,
              animation: google.maps.Animation.DROP,
              icon: {
                // url: 'assets/icons/marker_2.png',
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(15, 62)
              }
            });

            var clickHandler = function(marker, infowindow, li) {
              if (openedInfoWindow)
                openedInfoWindow.close();

              infowindow.open(gMap, marker);
              gMap.panTo(marker.getPosition());
              openedInfoWindow = infowindow;

              var children = eventsListUL.children;
              for (var i = 0; i < children.length; ++i) {
                children.item(i).style.fontWeight = "normal";
              }

              li.style.fontWeight = "bold";

              if (isDisplayingInstructions) {
                displayNextInstructionImage(3);

                var hoverFunc = new Function();
                hoverFunc = function() {
                  if (openedInfoWindow)
                    openedInfoWindow.close();

                  document.querySelector("#anleitung img").style.top = "40px";
                  document.querySelector("#anleitung img").style.bottom = "inherit";
                  document.querySelector("#anleitung img").style.left = "420px";
                  displayNextInstructionImage(4);

                  document.getElementById("eventsList").removeEventListener("mouseover", hoverFunc);

                  window.setTimeout(function() {
                    document.querySelector("#anleitung").classList.remove("display");
                    localStorage.setItem("oi:instructions", true);
                  }, 3500);
                };

                document.getElementById("eventsList").addEventListener("mouseover", hoverFunc);
              }
            };

            marker.addListener('click', (function(marker, infowindow, li) {
              return function() {
                clickHandler(marker, infowindow, li);
              };
            })(marker, infowindow, li));

            li.addEventListener("click", (function(marker, infowindow) {
              return function(e) {
                clickHandler(marker, infowindow, e.target);
              };
            })(marker, infowindow));

            infowindow.addListener("closeclick", function() {
              var children = eventsListUL.children;
              for (var i = 0; i < children.length; ++i) {
                children.item(i).style.fontWeight = "normal";
              }
            });

            timeline._activeMarkers.push(marker);

            eventControl.getPrevEventsForEvent(event).forEach(function(prevEv, i) {
              var path = [
                new google.maps.LatLng(event.position[0], event.position[1]),
                new google.maps.LatLng(prevEv.position[0], prevEv.position[1])
              ];

              var lineSymbol = {
                path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
              };

              var movePath = new google.maps.Polyline({
                path: path,
                geodesic: true,
                strokeColor: '#4285f4',
                icons: [{
                  icon: lineSymbol,
                  offset: '100%'
                }],
                strokeOpacity: 1.0,
                strokeWeight: 4
              });

              movePath.setMap(gMap);
              timeline._activePoligone.push(movePath);
            });

            /*if (path.length > 0) {
              var lineSymbol = {
                  path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
              };

              var movePath = new google.maps.Polyline({
                path: path,
                geodesic: true,
                strokeColor: '#FF0000',
                icons: [{
                  icon: lineSymbol,
                  offset: '100%'
                  }],
                strokeOpacity: 1.0,
                strokeWeight: 4
              });

              animateLineIcon(movePath);

              movePath.setMap(gMap);
              timeline._activePoligone.push(movePath);
            }*/
          }
        }
      }
    };

    timeline._years = sortByYear();
  }

  var currentMargin = [0, 0];
  var mousedownfunc;

  function displayInfo(id, title) {
    var wrapper = document.querySelector("#details .wrapper");

    wrapper.style.display = "block";
    document.getElementById("infoFrame").src = "/details/index.php?id=" + id;
    document.querySelector("#details .wrapper #detailsWindow #title").innerHTML = title;

    setTimeout(function() {
      wrapper.style.opacity = 1;
    }, 0);

    var header = document.querySelector("#detailsWindow .header");
    var startPoint;

    var mousemovefunc = function(e2) {
      document.querySelector("#detailsWindow").style.webkitTransform = "translate(" + ((currentMargin[0] + e2.screenX - startPoint[0]) + "px") + "," + ((currentMargin[1] + e2.screenY - startPoint[1]) + "px") + ")";
    };

    var mouseupfunc = function(e3) {
      window.removeEventListener("mousemove", mousemovefunc);
      window.removeEventListener("mouseup", mouseupfunc);

      currentMargin = [(currentMargin[0] + e3.screenX - startPoint[0]), (currentMargin[1] + e3.screenY - startPoint[1])];
    };

    mousedownfunc = function(e1) {
      startPoint = [e1.screenX, e1.screenY];

      window.addEventListener("mousemove", mousemovefunc);
      window.addEventListener("mouseup", mouseupfunc);
    };

    header.addEventListener("mousedown", mousedownfunc);
  }

  function closeInfo() {
    document.querySelector("#details .wrapper").style.display = "none";
    document.querySelector("#details .wrapper").style.opacity = 0;
    document.querySelector("#details .wrapper").addEventListener("mousedown", mousedownfunc);
  }

  window.displayInfo = displayInfo;
  window.closeInfo = closeInfo;

  function animateLineIcon(line) {
    var count = 0;
    window.setInterval(function() {
      count = (count + 1) % 200;

      var icons = line.get('icons');
      icons[0].offset = (count / 2) + '%';
      line.set('icons', icons);
    }, 20);
  }

  function loadEventData(callback) {
    (new AJAXCommunicator).sendRequest(0, function(successful, response) {
      if (successful) {
        for (var i in response) {
          var element = response[i];
          eventControl.addEvent(new OIEvent(element, i));
        }
      } else {
        console.error("Can't load events");
      }
      callback();
    });
  }

  function sortByYear() {
    var years = {};
    var len = 0;
    for (var i in eventControl.events) {
      var e = eventControl.events[i];
      if (years[e.date.getUTCFullYear()]) {
        years[e.date.getUTCFullYear()].push(e);
      } else {
        years[e.date.getUTCFullYear()] = [e];
        ++len;
      }
    }

    years.length = len;
    years.getWithDeltaFromFirstYear = function(i) {
      var start = true;
      var lastYear = 0;
      for (var year in this) {
        year = parseInt(year);
        if (start == true) {
          lastYear = year;
          start = false;
        }
        if ((year - lastYear) == i) {
          return year;
        }
        lastYear = year;
      }
    };
    years.get = function(i) {
      var j = 0;
      for (var year in this) {
        if (j++ == i) {
          return year;
        }
      }
    };
    return years;
  }

  function zoomMap(zoomIn) {
    if (zoomIn) {
      gMap.setZoom(Math.min(Math.max(gMap.zoom + 1, 0), 21));
    } else {
      gMap.setZoom(Math.min(Math.max(gMap.zoom - 1, 0), 21));
    }
  }

  function toggleMap() {
    if (gMap.getMapTypeId() == google.maps.MapTypeId.ROADMAP) {
      gMap.setMapTypeId(google.maps.MapTypeId.HYBRID);
      isDark = true;
    } else {
      gMap.setMapTypeId(google.maps.MapTypeId.ROADMAP);
      isDark = false;
    }

    if (isDark) {
      document.body.className = "dark";
    } else {
      document.body.className = "";
    }

    timeline.render();
  }

  function updateCoordsLabel() {
    var coords = gMap.getCenter();
    var lat = coords.lat();
    var lng = coords.lng();
    var fullLat = Math.floor(lat);
    var latSeconds = ((lat - fullLat) * 60).toFixed(1);
    var fullLng = Math.floor(lng);
    var lngSeconds = ((lng - fullLng) * 60).toFixed(1);

    if (latSeconds < 10) {
      latSeconds = "0" + latSeconds;
    }

    if (lngSeconds < 10) {
      lngSeconds = "0" + lngSeconds;
    }

    document.getElementById("coords").innerHTML = fullLat + "° " + latSeconds + "'  N | " + fullLng + "° " + lngSeconds + "' W";
  }

  function initInstructions() {
    var instEl = document.querySelector("#anleitung");
    if (!localStorage.getItem("oi:instructions") || localStorage.getItem("oi:instructions") == 'false') {
      // display instructions

      isDisplayingInstructions = true;
      instEl.classList.add("display");
    }

    document.getElementById("instructionsButton").addEventListener("click", function() {
      localStorage.setItem("oi:instructions", false);
      location.reload();
    });
  }

  function displayNextInstructionImage(index) {
    if (index > currentInstructionsIndex)
      document.querySelector("#anleitung img").src = "assets/icons/Anleitung_" + index + ".png";
  }

  window.addEventListener("load", function(loadEvent) {
    loadEventData(function() {
      initTimeline();
      initInstructions();

      timeline.resize();
      timeline.render();
      window.onresize = timeline.resize;
      var myOptions = {
        zoom: 4,
        center: new google.maps.LatLng(50.0, 9.9),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true
      };
      gMap = new google.maps.Map(document.getElementById("map"), myOptions);

      timeline.canvas.addEventListener("mousemove", timeline.mouseMove);
      timeline.canvas.addEventListener("mouseup", timeline.click);
      timeline.canvas.addEventListener("mouseleave", timeline.mouseLeave);
      document.getElementById("magnifyMap").addEventListener("click", function(e) {
        zoomMap(true);
      });
      document.getElementById("minifyMap").addEventListener("click", function(e) {
        zoomMap(false);
      });

      document.getElementById("switchRoadmap").addEventListener("click", function(e) {
        if (e.target.classList.contains("active")) {
          return;
        }
        toggleMap();
        e.target.classList.remove("inactive");
        e.target.classList.add("active");
        document.getElementById("switchHybrid").classList.remove("active");
        document.getElementById("switchHybrid").classList.add("inactive");
      });

      document.getElementById("switchHybrid").addEventListener("click", function(e) {
        if (e.target.classList.contains("active")) {
          return;
        }
        toggleMap();
        e.target.classList.remove("inactive");
        e.target.classList.add("active");
        document.getElementById("switchRoadmap").classList.remove("active");
        document.getElementById("switchRoadmap").classList.add("inactive");
      });

      document.getElementById("about").addEventListener("click", function(e) {
        var wrapper = document.getElementById("wrapper");
        wrapper.style.display = "block";

        var listener = function(e) {
          if (e.target == wrapper) {
            wrapper.style.display = "none";
          }
        };

        wrapper.addEventListener("mouseup", listener);
        wrapper.addEventListener("touchend", listener);
      });

      gMap.addListener("drag", function(e) {
        updateCoordsLabel();
      });

      updateCoordsLabel();
    });
  });
})();
