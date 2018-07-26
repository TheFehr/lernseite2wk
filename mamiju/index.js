(function() {
  window.BILDER = 1;
  window.VIDEOS = 2;
  window.AUDIO = 3;

  var activeTab, activeContainer, imagesContainer, videosContainer, audioContainer;
  window.addEventListener("load", function() {
    activeTab = document.querySelector("#switchContainer #header .tab.active");
    activeContainer = document.querySelector("#switchContainer #content .container.active");

    imagesContainer = document.getElementById("images");
    videosContainer = document.getElementById("videos");
    audioContainer = document.getElementById("audios");
  });

  function activate(container) {
    container.classList.add("active");
    activeContainer.classList.remove("active");
    activeContainer = container;
  }

  window.switchTab = function switchTab(type, e) {
    if (e.target == activeTab)
      return;

    e.target.classList.add("active");
    activeTab.classList.remove("active");
    activeTab = e.target;

    switch (type) {
      case BILDER:
        activate(imagesContainer);
        break;

      case VIDEOS:
        activate(videosContainer);
        break;

      case AUDIO:
        activate(audioContainer);
        break;
    }
  };
})();
