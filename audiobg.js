const audio = new Audio();
audio.src = 'Skies of Deception.mp3';
audio.autoplay = true;
audio.loop = true;
audio.load();

console.log("Loaded");

const volumeSlider = document.getElementById('volumeSlider');
if (volumeSlider){
  volumeSlider.addEventListener('input', () => {
    setVolume(volumeSlider.value);
  });
}

function setVolume(volume) {
  audio.volume = volume;
}

// Function to save audio playback state to local storage
function savePlaybackState() {
  localStorage.setItem('audioPlaybackState', JSON.stringify({
    currentTime: audio.currentTime,
    isPlaying: !audio.paused,
    volume: audio.volume // Save the volume
  }));
}

// Function to load audio playback state from local storage
function loadPlaybackState() {
  const playbackState = JSON.parse(localStorage.getItem('audioPlaybackState'));
  if (playbackState) {
    audio.currentTime = playbackState.currentTime;
    if (playbackState.isPlaying) {
      audio.play();
    }
    setVolume(playbackState.volume); // Load the volume
    if (volumeSlider){
      volumeSlider.value = playbackState.volume;
    }
  }
}

// Event listener for saving playback state when page is hidden
window.addEventListener('pagehide', () => {
  savePlaybackState();
});

// Event listener for loading playback state when page is shown
window.addEventListener('pageshow', () => {
  loadPlaybackState();
});

// Event listener for saving playback state before unloading the page
window.addEventListener('beforeunload', () => {
  savePlaybackState();
});