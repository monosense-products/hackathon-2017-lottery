( function( $, pusher ) {

  var itemActionChannel = pusher.subscribe( 'itemAction' );

  itemActionChannel.bind( "App\\Events\\ItemUpdated", function( data ) {
    alert('test');
  } );

} )( jQuery, pusher);
