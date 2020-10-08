  //copyright year
  $('#year').text(new Date().getFullYear());

  //hightlight current day at openinghours
  $(document).ready(function() {
      $('.openinghours li:nth-child(' + (((new Date().getDay() + 6) % 7) + 1) + ')').addClass('openinghours-highlight')
  });