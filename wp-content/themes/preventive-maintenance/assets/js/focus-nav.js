( function( window, document ) {
  function preventive_maintenance_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const preventive_maintenance_nav = document.querySelector( '.sidenav' );
      if ( ! preventive_maintenance_nav || ! preventive_maintenance_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...preventive_maintenance_nav.querySelectorAll( 'input, a, button' )],
        preventive_maintenance_lastEl = elements[ elements.length - 1 ],
        preventive_maintenance_firstEl = elements[0],
        preventive_maintenance_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && preventive_maintenance_lastEl === preventive_maintenance_activeEl ) {
        e.preventDefault();
        preventive_maintenance_firstEl.focus();
      }
      if ( shiftKey && tabKey && preventive_maintenance_firstEl === preventive_maintenance_activeEl ) {
        e.preventDefault();
        preventive_maintenance_lastEl.focus();
      }
    } );
  }
  preventive_maintenance_keepFocusInMenu();
} )( window, document );