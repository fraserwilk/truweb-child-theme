// Add your custom JS here.

var controller = new ScrollMagic.Controller();

var scene = new ScrollMagic.Scene({
    triggerElement: '#scroll-trigger', // starting scene, when reaching this element
    duration: 400 // pin the element for a total of 400px
  })
  .setPin('#scroll-trigger'); // the element we want to pin
  
  // Add Scene to ScrollMagic Controller
  controller.addScene(scene);