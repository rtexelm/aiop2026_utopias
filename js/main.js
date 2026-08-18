jQuery(document).ready(function ($) {
  const $menuArea = $(".menuFull");
  const $overlay = $("#menuOverlay");
  const $toggle = $("#menuToggleAnchor");
  const $html = $("html");
  const $body = $("body");
  const $footer = $("footer");
  const onMobile = window.innerWidth < 720;
  let menuOpen = false;

  // Scroll variables

  const $navTop = $("nav.top");
  let scrollCheck;
  let prevScroll = window.scrollY;
  let delta = 5;

  // Menu toggle
  // Prevent scrolling while menu open

  function toggleMenu() {
    menuOpen = !menuOpen;
    moveMenuPosition();
    if (onMobile) $body.toggleClass("stopScrollMenu");
  }

  function moveMenuPosition() {
    const screenSize = window.innerWidth;
    let leftPos;

    if (menuOpen) {
      if (screenSize < 720) leftPos = "translateX(0)";
      else if (screenSize < 950) leftPos = "translateX(50vw)";
      else if (screenSize < 1200) leftPos = "translateX(66vw)";
      else leftPos = "translateX(66vw)";
      $menuArea.addClass("open");
      $overlay.addClass("visible");
    } else {
      if (screenSize < 720) leftPos = "translateX(140vw)";
      else leftPos = "translateX(120vw)";
      $menuArea.removeClass("open");
      $overlay.removeClass("visible");
    }

    $menuArea.css("transform", leftPos);
  }

  $toggle.on("click", toggleMenu);
  $(window).on("resize", moveMenuPosition);

  moveMenuPosition();

  // Menu close on outside click

  $(document).on("click", (e) => {
    if (
      !!menuOpen &&
      !$(e.target).closest($menuArea).length &&
      !$(e.target).closest($toggle).length
    ) {
      toggleMenu();
    }
  });

  // Hide nav on scroll

  $(window).on("scroll", function (e) {
    scrollCheck = true;
  });

  setInterval(function () {
    if (scrollCheck) {
      scrollAction();
      scrollCheck = false;
    }
  }, 250);

  function scrollAction() {
    const currentScroll = window.scrollY;

    if (Math.abs(prevScroll - currentScroll) <= delta) return;

    if (menuOpen || currentScroll < prevScroll) {
      $navTop.css("top", "0");
    } else {
      $navTop.css("top", "-46");
    }

    prevScroll = currentScroll;
  }

  // Artist page nave arrows

  const $artistNav = $(".artist-nav");
  const artistNavHeight = $artistNav.outerHeight();
  const footerHeight = $footer.outerHeight();
  const footerOffset = $footer.offset().top;
  const stickyTop = window.innerHeight * 0.9;

  $(window).on("scroll", function () {
    let scrollTop = $(window).scrollTop();

    // Calculate when the sidebar should stop being sticky
    if (scrollTop + artistNavHeight + stickyTop >= footerOffset) {
      // Sidebar reaches the footer, unstick it and make it absolute
      $artistNav.css({
        position: "absolute",
        top: footerOffset - artistNavHeight + "px",
      });
    } else {
      // Sidebar is still in sticky mode
      $artistNav.css({
        position: "fixed",
        top: "90vh",
      });
    }
  });

  // Marquee effect

  // Function to repeat text until it's at least twice the width of the container
  function repeatText($element, originalText) {
    while ($element[0].scrollWidth < 20 * $element.parent().width()) {
      $element.text($element.text() + " " + originalText);
    }
  }

  // Function to handle the scroll effect for the marquee
  function handleScroll($element, speedCoefficient) {
    const scrollPos = $(window).scrollTop(); // Get the current scroll position
    const translateXValue = -(scrollPos * speedCoefficient); // Calculate the scroll speed
    $element.css({
      transform: `translateX(${translateXValue}px)`, // Apply transformation
    });
  }

  // Setup marquee elements
  const marquees = [
    { id: "#text1", speed: 0.6 },
    { id: "#text2", speed: 1.5 },
    { id: "#text3", speed: 0.7 },
    { id: "#text4", speed: 0.5 },
    { id: "#text5", speed: 0.9 },
    { id: "#text6", speed: 0.6 },
    { id: "#text7", speed: 1.5 },
    { id: "#text8", speed: 0.7 },
    { id: "#text9", speed: 0.5 },
    { id: "#text10", speed: 0.9 },
  ];

  marquees.forEach((marquee) => {
    const $element = $(marquee.id);
    if ($element.length === 0) return; // Skip if element not found
    const originalText = $element.text();

    // Repeat text until it's long enough
    repeatText($element, originalText);

    // On scroll, update marquee position
    $(window).on("scroll", function () {
      handleScroll($element, marquee.speed);
    });
  });

  // Parallax effect

  // Function to handle the parallax effect for multiple elements
  function applyParallaxEffect($element, speedCoefficient) {
    const scrollPos = $(window).scrollTop(); // Get the current scroll position
    const translateYValue = -(scrollPos * speedCoefficient); // Calculate the vertical scroll speed
    $element.css({
      transform: `translateY(${translateYValue}px)`, // Apply the transformation
    });
  }

  // Initialize parallax effect for elements
  function initParallax(elements) {
    $(window).on("scroll", function () {
      elements.forEach(function (parallaxItem) {
        const $element = $(parallaxItem.id);
        if ($element.length === 0) return; // Skip if element not found
        applyParallaxEffect($element, parallaxItem.speed);
      });
    });
  }

  // Define the elements and their respective speed coefficients
  const parallaxElements = [
    { id: "#about-ripple-1", speed: -0.2 },
    { id: "#about-ripple-2", speed: 0.3 },
    { id: "#about-ripple-3", speed: 0.92 },
    { id: "#about-ripple-4", speed: 0.5 },
    { id: "#about-ripple-5", speed: 0.09 },
    { id: "#about-ripple-6", speed: -0.1 },
    { id: "#about-ripple-7", speed: 0.07 },
    { id: "#schedule-bg-element1", speed: 0.3 },
    { id: "#schedule-bg-element2", speed: 0.2 },
    { id: "#schedule-bg-element3", speed: 0.2 },
    { id: "#schedule-bg-element4", speed: 0.2 },
    { id: "#schedule-bg-element5", speed: 0.2 },
    { id: "#donate-ripple-1", speed: -0.3 },
  ];

  // Initialize the parallax for defined elements
  initParallax(parallaxElements);
});
