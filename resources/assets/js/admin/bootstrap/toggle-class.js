/* ========================================================================
 * Custom: toggle-class.js v1.0.0
 * ========================================================================
 * Copyright 2013-2015 Falcon Frag Networks, LLC.
 * Licensed under MIT
 * ======================================================================== */

+function ($) {
  'use strict';

  // Toggler Class Definition
  var Toggler = function(element) {
    this.element = $(element)
  }

  // Version
  Toggler.VERSION = '1.0.0'

  Toggler.prototype.toggle = function() {
    var $this = this.element
    var toggle = $this.data('toggle-class')

    if($this.is('.disabled, :disabled')) return
    if(!toggle) return

    var target = getTargetFromTrigger($this)

    target.toggleClass(toggle)
  }

  function getTargetFromTrigger($trigger) {
    var trigger = $trigger;

    if(trigger.is(('[href="#"]') && trigger.data('target') == "#") || (trigger.is(('[href="#"]')) && !trigger.data('target')) || trigger.data('target') == "#")
      return trigger;

    if(!trigger.data('target'))
      return $(trigger.attr('href') || (trigger.attr('href') && trigger.attr('href').replace(/.*(?=#[^\s]+$)/, ''))) // IE7

    if(trigger.data('target').indexOf("#") !== -1)
      return $(trigger.data('target'))

    // Fallback for anything gone wrong
    return target;
  }

  // Toggler Plugin Definition
  function Plugin(option) {
    return this.each(function() {
      var $this = $(this)
      var data = $this.data('bs.toggler')

      if(!data) $this.data('bs.toggler', (data = new Toggler(this)))
        if(typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.toggler
  $.fn.toggler = Plugin
  $.fn.toggler.Constructor = Toggler

  // jQuery no conflict
  $.fn.toggler.noConflict = function() {
    $.fn.toggler = old
    return this
  }

  // Data-API
  var clickHandler = function(e) {
    e.preventDefault()
    Plugin.call($(this), 'toggle')
  }

  $(document).on('click.bs.toggler.data-api', '[data-toggle="class"]', clickHandler);

}(jQuery);