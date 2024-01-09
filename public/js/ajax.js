function loadPage(page, link) {
  $.ajax({
    url: page,
    type: 'GET',
    success: function(data) {
      // Update content container with loaded data
      $('#app').html(data);

      // Remove 'active' class from all <li> elements
      $('ul li').removeClass('active');

      // Add 'active' class to the parent <li> of the clicked <a>
      $(link).closest('li').addClass('active');

      // Update URL using HTML5 History API
      history.pushState({page: page}, '', page);
    }
  });
}

// Listen for popstate event to handle back/forward buttons
window.addEventListener('popstate', function(event) {
  if (event.state && event.state.page) {
    // Find the <a> associated with the page
    var link = $('a[href="' + event.state.page + '"]');
    loadPage(event.state.page, link);
  }
});