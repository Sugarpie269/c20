
    am5.ready(function() {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    
    var root = am5.Root.new("chartdiv");
    am5.addLicense("AM5C387725738");
    root._logo.dispose();
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    
    // Create the map chart
    // https://www.amcharts.com/docs/v5/charts/map-chart/
    var chart = root.container.children.push(
      am5map.MapChart.new(root, {
        panX: "rotateX",
        panY: "rotateY",
        projection: am5map.geoOrthographic(),  
      })
    );
    
    var cont = chart.children.push(
      am5.Container.new(root, {
        layout: root.horizontalLayout,
        x: 20,
        y: 40
      })
    );
    
    // // Add labels and controls
    // cont.children.push(
    //   am5.Label.new(root, {
    //     centerY: am5.p50,
    //     text: "Map"
    //   })
    // );
    
    // var switchButton = cont.children.push(
    //   am5.Button.new(root, {
    //     themeTags: ["switch"],
    //     centerY: am5.p50,
    //     icon: am5.Circle.new(root, {
    //       themeTags: ["icon"]
    //     })
    //   })
    // );
    
    // switchButton.on("active", function () {
    //   if (!switchButton.get("active")) {
    //     chart.set("projection", am5map.geoMercator());
    //     chart.set("panY", "translateY");
    //     chart.set("rotationY", 0);
        
    //     backgroundSeries.mapPolygons.template.set("fillOpacity", 0);
    //   } else {
    //     chart.set("projection", am5map.geoOrthographic());
    //     chart.set("panY", "rotateY");
    //     backgroundSeries.mapPolygons.template.set("fillOpacity", 0.1);
    //   }
    // });
    
    // cont.children.push(
    //   am5.Label.new(root, {
    //     centerY: am5.p50,
    //     text: "Globe"
    //   })
    // );
    
    // Create series for background fill
    // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
    var backgroundSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {}));
    backgroundSeries.mapPolygons.template.setAll({
    //   fill: root.interfaceColors.get("alternativeBackground"),
      fill: am5.color(0x23204d), 
      fillOpacity: 1,
      strokeOpacity: 0
    });
    
    // Add background polygon
    // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
    backgroundSeries.data.push({
      geometry: am5map.getGeoRectangle(90, 180, -90, -180)
    });
    
    // Create main polygon series for countries
    // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
    var polygonSeries = chart.series.push(
      am5map.MapPolygonSeries.new(root, {
        geoJSON: am5geodata_worldIndiaLow,
        fill: am5.color(0x3b8469),  
      })
    );
    
    // Create line series for trajectory lines
    // https://www.amcharts.com/docs/v5/charts/map-chart/map-line-series/
    var lineSeries = chart.series.push(am5map.MapLineSeries.new(root, {}));
    lineSeries.mapLines.template.setAll({
      stroke: root.interfaceColors.get("alternativeBackground"),
      strokeOpacity: 0.3
    });
    
    // Create point series for markers
    // https://www.amcharts.com/docs/v5/charts/map-chart/map-point-series/
    var pointSeries = chart.series.push(am5map.MapPointSeries.new(root, {}));
    
    pointSeries.bullets.push(function () {
      var circle = am5.Circle.new(root, {
        radius: 3,
        tooltipY: 0,
        fill: am5.color(0xffffff),
        // fill: am5.color(0xffba00),
        stroke: root.interfaceColors.get("background"),
        strokeWidth: 5,
        strokeOpacity: .1,
        tooltipText: "{title}"
      });
    
      return am5.Bullet.new(root, {
        sprite: circle
      });
    });
    if (individual) {
      for (var i = 0; i < cities1.length; i++) {
        var city = cities1[i];
        addCity(city.longitude, city.latitude, city.title);
      }
      
      function addCity(longitude, latitude, title) {
        pointSeries.data.push({
          geometry: { type: "Point", coordinates: [longitude, latitude] },
          title: title
        });
        // chart.homeZoomLevel = 2 ;
        chart.homeGeoPoint = {
          latitude: latitude,
          longitude: longitude
        };
      }
    }else{
      var cities = '';
      fetch(base_url+'/light-stories.json')
      .then((response) => response.json())
      .then((data) => {
        for (var i = 0; i < data.length; i++) {
          var city = data[i];
          addCity(city.longitude, city.latitude, city.title);
        }
      });      
      
      function addCity(longitude, latitude, title) {
        pointSeries.data.push({
          geometry: { type: "Point", coordinates: [longitude, latitude] },
          title: title
        });
      }
      chart.animate({
        key: "rotationX",
        from: 0,
        to: 360,
        duration: 30000,
        loops: Infinity
      });
    }   
    
    // Make stuff animate on load
    // chart.zoomToGeoPoint(pointSeries);      
    
    chart.appear(1000, 100);
    
    }); // end am5.ready()
