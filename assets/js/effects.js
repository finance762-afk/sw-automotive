/* ============================================
   Page One Insights — Effects
   Ripple, magnetic hover, VanillaTilt init
   ============================================ */

document.addEventListener('DOMContentLoaded', function() {

  /* === Ripple Effect on All .btn Elements === */
  document.querySelectorAll('.btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      var rect = btn.getBoundingClientRect();
      var x = e.clientX - rect.left;
      var y = e.clientY - rect.top;

      var ripple = document.createElement('span');
      ripple.style.cssText = [
        'position:absolute',
        'left:' + x + 'px',
        'top:' + y + 'px',
        'width:0',
        'height:0',
        'border-radius:50%',
        'background:rgba(255,255,255,0.32)',
        'transform:translate(-50%,-50%)',
        'animation:rippleExpand 0.55s ease-out forwards',
        'pointer-events:none',
        'z-index:10'
      ].join(';');

      btn.appendChild(ripple);
      ripple.addEventListener('animationend', function() {
        ripple.remove();
      });
    });
  });

  /* === Magnetic Hover on Hero Primary CTA (desktop / fine-pointer only) === */
  var heroCta = document.querySelector('.hero-buttons .btn-accent');
  if (heroCta && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    heroCta.addEventListener('mousemove', function(e) {
      var rect = heroCta.getBoundingClientRect();
      var cx = rect.left + rect.width / 2;
      var cy = rect.top + rect.height / 2;
      var dx = (e.clientX - cx) * 0.2;
      var dy = (e.clientY - cy) * 0.2;
      heroCta.style.transform = 'translate(' + dx + 'px, ' + (dy - 2) + 'px)';
    });
    heroCta.addEventListener('mouseleave', function() {
      heroCta.style.transform = '';
    });
  }

  /* === VanillaTilt on .card elements (if library is loaded) === */
  if (typeof VanillaTilt !== 'undefined') {
    VanillaTilt.init(document.querySelectorAll('.card[data-tilt], .service-card[data-tilt]'), {
      max: 8,
      speed: 400,
      glare: true,
      'max-glare': 0.15
    });
  }

});
