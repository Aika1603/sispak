<!-- FOOTER -->
<footer class="container">
  <p class="float-right"><a href="#banner">Back to top</a></p>
  <p>&copy; <?php echo date('Y');?> Sismasoya. &middot; </p>
</footer>
</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('assets/');?>/code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url('assets/');?>/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="<?php echo base_url('assets/');?>/assets/js/vendor/popper.min.js"></script>
<script src="<?php echo base_url('assets/');?>/dist/js/bootstrap-material-design.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="<?php echo base_url('assets/');?>/assets/js/vendor/holder.min.js"></script>

<script src="<?php echo base_url('assets/');?>/dist/js/jquery.js"></script>
<!-- <script src="<?php echo base_url('assets/');?>/dist/js/step.js"></script> -->
<script src="<?php echo base_url('assets/');?>/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/');?>/dist/js/jquery.isotope.min.js"></script>
<script src="<?php echo base_url('assets/');?>/dist/js/jquery.prettyPhoto.js"></script>
<?php if($menu_open == "Beranda"){
?>
  <script src="<?php echo base_url('assets/');?>/dist/js/main.js"></script>
  <?php
}
?>


<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js'></script>
<script id="rendered-js">
      ;(function ($) {
  "use strict";

  //* Form js
  function verificationForm() {
    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function () {
      if (animating) return false;
      animating = true;

      current_fs = $(this).parent();
      next_fs = $(this).parent().next();

      //activate next step on progressbar using the index of next_fs
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      //show the next fieldset
      next_fs.show();
      //hide the current fieldset with style
      current_fs.animate({
        opacity: 0 },
      {
        step: function (now, mx) {
          //as the opacity of current_fs reduces to 0 - stored in "now"
          //1. scale current_fs down to 80%
          scale = 1 - (1 - now) * 0.2;
          //2. bring next_fs from the right(50%)
          left = now * 50 + "%";
          //3. increase opacity of next_fs to 1 as it moves in
          opacity = 1 - now;
          current_fs.css({
            'transform': 'scale(' + scale + ')',
            'position': 'absolute' });

          next_fs.css({
            'left': left,
            'opacity': opacity });

        },
        duration: 800,
        complete: function () {
          current_fs.hide();
          animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack' });

    });

    $(".previous").click(function () {
      if (animating) return false;
      animating = true;

      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();

      //de-activate current step on progressbar
      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

      //show the previous fieldset
      previous_fs.show();
      //hide the current fieldset with style
      current_fs.animate({
        opacity: 0 },
      {
        step: function (now, mx) {
          //as the opacity of current_fs reduces to 0 - stored in "now"
          //1. scale previous_fs from 80% to 100%
          scale = 0.8 + (1 - now) * 0.2;
          //2. take current_fs to the right(50%) - from 0%
          left = (1 - now) * 50 + "%";
          //3. increase opacity of previous_fs to 1 as it moves in
          opacity = 1 - now;
          current_fs.css({
            'left': left });

          previous_fs.css({
            'transform': 'scale(' + scale + ')',
            'opacity': opacity });

        },
        duration: 800,
        complete: function () {
          current_fs.hide();
          animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack' });

    });

    $(".submit").click(function () {
      return false;
    });
  };

  //* Add Phone no select
  function phoneNoselect() {
    if ($('#msform').length) {
      $("#phone").intlTelInput();
      $("#phone").intlTelInput("setNumber", "+880");
    };
  };
  //* Select js
  function nice_Select() {
    if ($('.product_select').length) {
      $('select').niceSelect();
    };
  };
  /*Function Calls*/
  verificationForm();
  phoneNoselect();
  nice_Select();
})(jQuery);
      //# sourceURL=pen.js
    </script>
</body>

</html>
