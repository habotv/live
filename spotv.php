<!DOCTYPE html>
<html><head>
<meta name='viewport' content='width=device-width, initial-scale=1.0' />
<meta name="referrer" content="no-referrer" />

 <script src="https://ajax.googleapis.com/ajax/libs/shaka-player/4.3.3/shaka-player.compiled.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/shaka-player/4.3.3/shaka-player.compiled.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/shaka-player/4.1.1/shaka-player.ui.min.js' crossorigin='anonymous'></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/4.3.3/controls.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/ZheHacK/fypnews.id@main/css//youtube-theme.css">
<link href="https://fonts.googleapis.com/css?family=Material+Icons+Sharp" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
	@import "https://fonts.googleapis.com/css?family=Play:300,400,700";
	@import "https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700";
	@import "https://fonts.googleapis.com/css?family=Monda:300,400,700";
	</style>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body bgcolor='black' style='margin:0'>

<div class="youtube-theme">
<div data-shaka-player-container="" class="shaka-mobile shaka-video-container" shaka-controls="true" style="cursor: none;"><video autoplay="" autostart="true" data-shaka-player="" poster="https://cdn.jsdelivr.net/gh/habotv/mokutv@master/mokutv.jpg" id="youtube-theme" style="width: 100vw; height: calc(var(--vh, 1vh) * 100);" class="shaka-video"></video>
</div></div>

<script type="text/javascript">

const youtube_theme_manifestUri = 'https://av-live-cdn.mncnow.id/live/eds/SPOTV-HD/sa_dash_vmx/SPOTV-HD.mpd';

async function init() {

  const video = document.getElementById('youtube-theme');

    const ui = video['ui'];

    const config = {

      'seekBarColors': {

        base: 'rgba(255,255,255,.2)',

        buffered: 'rgba(255,255,255,.4)',

        played: 'rgb(255,0,0)',

      }

    }

   ui.configure(config);

    const controls = ui.getControls();

    const player = controls.getPlayer();

    player.configure({

 

  drm                               : {

  clearKeys                         : {

//   'key-id-in-hex'                : 'key-in-hex',
    '57d2ac9210cfbca3596cc679a01c8b29': 'd5e35c0f39c76adf24853d7ea18c71e7',

    }

  }

});

  // Attach player and ui to the window to make it easy to access in the JS console.

  window.player = player;

  window.ui = ui;

  // Listen for error events.

  player.addEventListener('error', onPlayerErrorEvent);

  controls.addEventListener('error', onUIErrorEvent);

    try {

      await player.load(youtube_theme_manifestUri);

    } catch (error) {

      onPlayerError(error);

    }

function onPlayerErrorEvent(errorEvent) {

  // Extract the shaka.util.Error object from the event.

  onPlayerError(event.detail);

}

function onPlayerError(error) {

  // Handle player error

  console.error('Error code', error.code, 'object', error);

}

function onUIErrorEvent(errorEvent) {

  // Extract the shaka.util.Error object from the event.

  onPlayerError(event.detail);

}

function initFailed(errorEvent) {

  // Handle the failure to load; errorEvent.detail.reasonCode has a

  // shaka.ui.FailReasonCode describing why.

  console.error('Unable to load the UI library!');

}

    // TODO find a way to do this without jquery. -___- or find a way to replace them CSS. maybe usering :after  

    $('.shaka-overflow-menu-button').html('settings');

    $('.shaka-back-to-overflow-button .material-icons-round').html('arrow_back_ios_new');

}

document.addEventListener('shaka-ui-loaded', init);

// Listen to the custom shaka-ui-load-failed event, in case Shaka Player fails

// to load (e.g. due to lack of browser support).

document.addEventListener('shaka-ui-load-failed', initFailed);

</script>
</body>
</html>