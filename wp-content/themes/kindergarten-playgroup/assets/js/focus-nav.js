( function( window, document ) {
  function kindergarten_playgroup_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const kindergarten_playgroup_nav = document.querySelector( '.sidenav' );
      if ( ! kindergarten_playgroup_nav || ! kindergarten_playgroup_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...kindergarten_playgroup_nav.querySelectorAll( 'input, a, button' )],
        kindergarten_playgroup_lastEl = elements[ elements.length - 1 ],
        kindergarten_playgroup_firstEl = elements[0],
        kindergarten_playgroup_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && kindergarten_playgroup_lastEl === kindergarten_playgroup_activeEl ) {
        e.preventDefault();
        kindergarten_playgroup_firstEl.focus();
      }
      if ( shiftKey && tabKey && kindergarten_playgroup_firstEl === kindergarten_playgroup_activeEl ) {
        e.preventDefault();
        kindergarten_playgroup_lastEl.focus();
      }
    } );
  }
  kindergarten_playgroup_keepFocusInMenu();
} )( window, document );