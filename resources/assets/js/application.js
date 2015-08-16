// Core application Javascript functions
var app = function() {
  // Initialize basic bootstrap elements
  var initBasic = function() {
    // Initialize any tooltips
    jQuery('[data-toggle="tooltip"], .js-tooltip').tooltip({
      container: 'body',
      animation: false
    });

    // Initialize any popovers
    jQuery('[data-toggle="popover"], .js-popover').popover({
      container: 'body',
      animation: true,
      trigger: 'hover'
    });

    // Initialize any tabs
    jQuery('[data-toggle="tabs"] a, .js-tabs a').click(function(e) {
      e.preventDefault();
      jQuery(this).tab('show');
    });
  };

  // Initialize sticky navbar
  var stickyNavbar = function() {
    // Listen for scroll event
    jQuery(window).on('scroll', function() {
      // Add or remove scroll class
      if(jQuery(window).width() > 768) {
        if (jQuery(window).scrollTop() > 100) {
          jQuery('.navbar').removeClass('down').addClass('up');
        } else {
          jQuery('.navbar').removeClass('up').addClass('down');
        }
      }
    });
  };

  // Initialize default sliders
  var homeSlider = function() {
    // Owl Slider
    jQuery("#homepage-slider").owlCarousel({
      items: 1,
      navigation: true,
      singleItem: true,
      navigationText: [
        '<img src="img/sliders/home/prev.png" alt="Previous" />',
        '<img src="img/sliders/home/next.png" alt="Next" />'
      ],
      pagination: false,
      autoPlay: true,
      slideSpeed: 600,
      animateOut: 'fadeOut',
      autoHeight: true
    });
  };

  // Material inputs helper
    var forms = function() {
        jQuery('.form-material.floating > .form-control').each(function(){
            var $input  = jQuery(this);
            var $parent = $input.parent('.form-material');

            if ($input.val()) {
                $parent.addClass('open');
            }

            $input.on('change', function(){
                if ($input.val()) {
                    $parent.addClass('open');
                } else {
                    $parent.removeClass('open');
                }
            });
        });
    };

    // Initialize wizards with validation
    var initWizardValidation = function() {
        // Custom validation methods
        jQuery.validator.addMethod('alpha', function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, 'Only letters are allowed');
        jQuery.validator.addMethod('alpha_numeric', function(value, element) {
            return this.optional(element) || /^[a-z0-9]+$/i.test(value);
        }, 'Only letters and numbers are allowed');
        jQuery.validator.addMethod('alpha_dash', function(value, element) {
            return this.optional(element) || /^[a-z0-9_-]+$/i.test(value);
        }, 'Only letters, numbers, dashes and underscores are allowed');
        jQuery.validator.addMethod('password', function(value, element) {
            return this.optional(element) || /[A-Z]/.test(value) // contains capital letter
                && /[a-z]/.test(value) // has a lowercase letter
                && /\d/.test(value) // has a digit
                && /[$-/:-?{-~!/"^_`\[\]]/.test(value); // has a symbol
        }, 'Password must contain at least one lowercase letter, uppercase letter, number and symbol');
        jQuery.validator.addMethod('intlphone', function(value, element) {
            return this.optional(element) || (value.match(/^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}(\s*(ext|x)\s*\.?:?\s*([0-9]+))?$/));
        }, 'Please enter a valid phone number');
        jQuery.validator.addMethod('street_address', function(value, element) {
            return this.optional(element) || /^[a-z0-9'\.\-\s\,]+$/i.test(value);
        }, 'Please enter a valid address line');
        jQuery.validator.addMethod('alpha_space', function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, 'Please enter a valid city name');
        jQuery.validator.addMethod('postal_code', function(value, element) {
            return this.optional(element) || /^[a-z0-9][a-z0-9\- ]{0,10}[a-z0-9]$/i.test(value);
        }, 'Please enter a valid postal code');

        // Get forms
        var $reg_form = jQuery('.js-form-register');
        //var $form2 = jQuery('.js-form2');

        // Prevent forms from submitting on enter key press
        $reg_form.on('keyup keypress', function (e) {
            var code = e.keyCode || e.which;

            if (code === 13) {
                e.preventDefault();
                return false;
            }
        });

        // Init form validation on the other wizard form
        var $reg_validator = $reg_form.validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group .form-material').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'first_name': {
                    required: true,
                    minlength: 2,
                    maxlength: 32,
                    alpha: true
                },
                'last_name': {
                    required: true,
                    minlength: 2,
                    maxlength: 32,
                    alpha: true
                },
                'username': {
                    required: true,
                    minlength: 3,
                    maxlength: 20,
                    alpha_dash: true
                },
                'email': {
                    required: true,
                    email: true
                },
                'company': {
                    required: false,
                    maxlength: 60
                },
                'phone': {
                    required: true,
                    intlphone: true,
                },
                'password': {
                    required: true,
                    password: true,
                    minlength: 8
                },
                'password_confirmation': {
                    required: true,
                    equalTo: '#password'
                },

                // Address validation
                'address1': {
                    required: true,
                    street_address: true,
                    maxlength: 120
                },
                'address2': {
                    required: false,
                    street_address: true,
                    maxlength: 120
                },
                'city': {
                    required: true,
                    alpha_space: true,
                    minlength: 3,
                    maxlength: 60
                },
                'state': {
                    required: true,
                    alpha_space: true,
                    maxlength: 60
                },
                'postcode': {
                    required: true,
                    postal_code: true,
                    maxlength: 14
                },
                'country': {
                    required: true,
                    alpha_space: true,
                    maxlength: 80
                },
                'security_question': {
                    required: true,
                    maxlength: 255
                },
                'security_answer': {
                    required: true,
                    maxlength: 255
                }
            },
            messages: {
                'first_name': {
                    required: 'Please enter a first name',
                    minlength: 'First name must consist of at least 2 characters',
                    maxlength: 'First name must be less than 32 characters',
                    alpha: 'First name may only contain letters'
                },
                'last_name': {
                    required: 'Please enter a last name',
                    minlength: 'Last name must consist of at least 2 characters',
                    maxlength: 'Last name must be less than 32 characters',
                    alpha: 'Last name may only contain letters'
                },
                'username': {
                    required: 'Please enter a username',
                    minlength: 'Username must be longer than 3 characters',
                    maxlength: 'Username must be shorter than 20 characters',
                    alpha_dash: 'Username may only contain letters, numbers, dashes and underscores'
                },
                'email': 'Please enter a valid email address',
                'company': {
                    maxlength: 'Company name must be shorter than 60 characters'
                },
                'phone': {
                    required: 'Please enter a phone number',
                    intlphone: 'Please enter a valid phone number',
                },
                'password': {
                    required: 'Please enter a password',
                    password: 'Password must contain at least one lowercase letter, uppercase letter, number and symbol',
                    minlength: 'Password must be at least 8 characters long'
                },
                'password_confirmation': {
                    required: 'Please confirm your password',
                    equalTo: 'Password does not match original'
                },
                'address1': {
                    required: 'Please enter a street address',
                    street_address: 'Please enter a valid street address',
                    maxlength: 'Address must be shorter than 120 characters'
                },
                'address2': {
                    street_address: 'Please enter a valid street address',
                    maxlength: 'Address must be shorter than 120 characters'
                },
                'city': {
                    required: 'Please enter a city',
                    alpha_space: 'Please enter a valid city',
                    minlength: 'City must contain a minimum of 3 characters',
                    maxlength: 'City must be less than 60 characters'
                },
                'state': {
                    required: 'Please enter a state',
                    alpha_space: 'Please enter a valid state',
                    maxlength: 'State must be less than 60 characters'
                },
                'postcode': {
                    required: 'Please enter a postal code',
                    postal_code: 'Please enter a valid postal code',
                    maxlength: 'Postal code must be less than 14 characters'
                },
                'country': {
                    required: 'Please enter a country',
                    alpha_space: 'Please enter a valid country',
                    maxlength: 'Country must be less than 80 characters'
                },
                'security_question': {
                    required: 'Please provide a security question',
                    maxlength: 'Security question must be less than 255 characters'
                },
                'security_answer': {
                    required: 'Please provide a security question answer',
                    maxlength: 'Security answer must be less than 255 characters'
                }
            }
        });

        // Init wizard with validation
        jQuery('.js-wizard-validation').bootstrapWizard({
            'tabClass': '',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'onTabShow': function($tab, $nav, $index) {
                var $total = $nav.find('li').length;
                var $current = $index + 1;

                // Get vital wizard elements
                var $wizard     = $nav.parents('.block');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
                } else {
                    $btnNext.show();
                    $btnFinish.hide();
                }
            },
            'onNext': function($tab, $navigation, $index) {
                var $valid = $reg_form.valid();

                if(!$valid) {
                    $reg_validator.focusInvalid();

                    return false;
                }
            },
            onTabClick: function($tab, $navigation, $index) {
                return false;
            }
        });
    };

    // Initialize product review readmore
    var initProductReviewReadmore = function() {
        jQuery('.text-readmore').readmore({
            collapsedHeight: 63,
            moreLink: '<a href="#">More</a>',
            lessLink: '<a href="#">Less</a>',
            blockCSS: 'display: inline-block;'
        });
    };

  return {
    init: function() {
      initBasic();
      stickyNavbar();
      homeSlider();
      forms();
      initWizardValidation();
      initProductReviewReadmore();
    }
  };
}();

// Intialize the application when page loads
jQuery(function() {
  app.init();
});
