  /*
    MAP LOCATION
    created by emanuel castillo
  */
  let latInput = $('#lat'),
      lonInput = $('#lon'),
      geocodeService = L.esri.Geocoding.geocodeService();

  var myMarker = {};

  function getPosition (latitude='', longitude='', option, title=null) {
    map.removeLayer(myMarker);
    map.panTo(new L.LatLng(latitude, longitude));

    myMarker = L.marker([latitude, longitude], {
      title: "Coordenadas",
      alt: "Coordenadas",
      draggable: true,
      opacity: option == 'val' ? 1.0 : 0
    });
    myMarker.addTo(map).on('dragend', (e) => {
      map.spin(true);
      geocodeService.reverse().latlng(e.target._latlng).run(function(error, result) {
        let lat = myMarker.getLatLng().lat.toFixed(8),
            lon = myMarker.getLatLng().lng.toFixed(8);
        setValues(lat,lon);
        myMarker.bindPopup(`<b>Latitud:</b> ${lat} <br /><b>Longitud:</b> ${lon}<br /> <b>Dirección:</b> ${result.address.Match_addr}`).openPopup();
        $('#direction').val(result.address.Match_addr);
        $('#directionOther').val(result.address.Match_addr);
        map.spin(false);
      });
    });

    map.on('click', (e) => {
      map.spin(true);
      geocodeService.reverse().latlng(e.latlng).run((error, result) => {
        if(option == 'init'){
          $('.leaflet-marker-shadow.leaflet-zoom-animated').css('opacity',1);
          $('.leaflet-marker-icon.leaflet-zoom-animated.leaflet-interactive.leaflet-marker-draggable').css('opacity',1);
        }
        let lat = (e.latlng.lat.toFixed(8)),
            lon = (e.latlng.lng.toFixed(8));
        setValues(lat,lon);
        myMarker.setLatLng([lat, lon]).update();
        myMarker.bindPopup(`<b>Latitud:</b> ${lat} <br /><b>Longitud:</b> ${lon} <br /> <b>Dirección:</b> ${result.address.Match_addr}`).openPopup();
        $('#direction').val(result.address.Match_addr);
        $('#directionOther').val(result.address.Match_addr);
        map.spin(false);
      });
    });
    if(option == 'val') myMarker.bindPopup(`<b>Latitud:</b> ${latitude} <br /><b>Longitud:</b> ${longitude}<br /> <b>Dirección:</b> ${title}`).openPopup();
  }

  let latEdit = parseFloat($('#latEdit').val()),
      lonEdit = parseFloat($('#lonEdit').val());

  let map = new L.Map('map', {
    zoom: 14
  });

  if(!latEdit && !lonEdit) getPosition(8.09764012, -80.97943077, 'init');
  else{
    getPosition(latEdit, lonEdit, 'val',$('#directionOther').val());
  }

  map.addLayer(new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://github.com/emanueljcc">Barbacoa</a>'
  }).addTo(map));

  function setValues (lat,lon){
    let czoom = map.getZoom();
    if(czoom < 18) nzoom = czoom + 1;
    if(nzoom > 18) nzoom = 16;
    if(czoom != 18)
        map.setView([lat,lon], nzoom);
    else
        map.setView([lat,lon]);
    latInput.val(lat);
    lonInput.val(lon);
    return;
  }

  function formatJSON(rawjson) {
    let json = {},
    key, loc, disp = [];
    for(let i in rawjson) {
      //disp = rawjson[i].display_name.split(',');
      // key = disp[0] +', '+ disp[1];
      key = rawjson[i].display_name;
      loc = L.latLng( rawjson[i].lat, rawjson[i].lon );
      json[ key ]= loc;
    }
    return json;
  }

  let searchOpts = {
    url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
    jsonpParam: 'json_callback',
    formatData: formatJSON,
    zoom: 10,
    minLength: 2,
    autoType: true,
    container: 'findbox',
    marker: {
      icon: false,
      animate: true
    },
    moveToLocation: function(latlng, title, map) {
      getPosition(latlng.lat, latlng.lng, 'val',title);
      $('#direction').val(title);
      $('#directionOther').val(title);
      latInput.val(latlng.lat);
      lonInput.val(latlng.lng);
    }
  };

  var searchControl = map.addControl( new L.Control.Search(searchOpts) );

  $('a.search-cancel').on('click', function(){
    $('#direction').val('');
    $('#directionOther').val('');
    getPosition(8.09764012, -80.97943077, 'init');
  });
