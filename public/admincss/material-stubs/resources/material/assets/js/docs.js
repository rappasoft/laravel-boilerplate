(function () {
  let navbarToggler = document.getElementsByClassName("ct-docs-navbar-toggler")[0];
  navbarToggler.addEventListener("click", function() {
    let sidebarCollapseLinks = document.getElementsByClassName("ct-docs-sidebar-collapse-links")[0];
    if (sidebarCollapseLinks.style.maxHeight) {
      sidebarCollapseLinks.style.maxHeight = null;
      sidebarCollapseLinks.style.padding = null;
      sidebarCollapseLinks.style.display = null;
    } else {
      sidebarCollapseLinks.style.display = "block";
      // the 48 is for the padding heights as well
      // 2rem + 1rem = 3rem = 3 * 16 px = 48px
      sidebarCollapseLinks.style.maxHeight = sidebarCollapseLinks.scrollHeight + 48 + "px";
      sidebarCollapseLinks.style.padding = "2rem 0 1rem";
    }
  })
  // navbar dropdowns init
  let dropdowns = document.getElementsByClassName("ct-docs-nav-item-dropdown");
  for (var i = 0; i < dropdowns.length; i++) {
    dropdowns[i].addEventListener("mouseenter", dropdownEvent);
    dropdowns[i].addEventListener("mouseleave", dropdownEvent);
  }
  function dropdownEvent(event) {
    let currentEventTarget = event.currentTarget;
    let dropdownMenu = currentEventTarget.getElementsByClassName("ct-docs-navbar-dropdown-menu")[0];
    if(dropdownMenu.classList.contains("ct-docs-navbar-dropdown-menu-show")) {
      dropdownMenu.style.display = null;
      dropdownMenu.classList.remove("ct-docs-navbar-dropdown-menu-show");
    } else {
      dropdownMenu.style.display = "block";
      dropdownMenu.classList.add("ct-docs-navbar-dropdown-menu-show");
    }
  }
})();
