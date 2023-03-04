"use strict";

// Global components list
let components = {};

components.fontAwesome = {
  selector: '[class*="fa-"]',
  styles: "/components/font-awesome/font-awesome.css",
};

components.mdi = {
  selector: '[class*="mdi-"]',
  styles: "/components/mdi/mdi.css",
};

components.fontSpartan = {
  selector: "html",
  styles:
    "https://fonts.googleapis.com/css2?family=Spartan:wght@200;300;400;500;800&display=swap",
};

components.pageReveal = {
  selector: "html",
  init: function (nodes) {
    window.addEventListener(
      "components:ready",
      function () {
        window.dispatchEvent(new CustomEvent("resize"));
        document.documentElement.classList.add("components-ready");

        setTimeout(function () {
          document.documentElement.classList.add("page-loaded");
        }, 300);
      },
      { once: true }
    );
  },
};

components.currentDevice = {
  selector: "html",
  script: "/components/current-device/current-device.min.js",
};

components.blogPost = {
  selector: ".blog-post",
  styles: "/components/blog-post/blog-post.css",
};

components.box = {
  selector: ".box",
  styles: "/components/box/box.css",
};

components.breadcrumb = {
  selector: ".breadcrumb",
  styles: "/components/breadcrumb/breadcrumb.css",
};

components.button = {
  selector: ".btn",
  styles: "/components/button/button.css",
};

components.comment = {
  selector: ".comment",
  styles: "/components/comment/comment.css",
};

components.divider = {
  selector: ".divider",
  styles: "/components/divider/divider.css",
};

components.footer = {
  selector: "footer",
  styles: "/components/footer/footer.css",
};

components.grid = {
  selector: '.container, .container-fluid, .row, [class*="col-"]',
  styles: "/components/grid/grid.css",
};

components.icon = {
  selector: ".icon",
  styles: "/components/icon/icon.css",
};

components.image = {
  selector: ".image",
  styles: "/components/image/image.css",
};

components.input = {
  selector:
    ".form-group, .input-group, .form-check, .custom-control, .form-control",
  styles: "/components/input/input.css",
};

components.intro = {
  selector: ".intro",
  styles: "/components/intro/intro.css",
};

components.link = {
  selector: ".link",
  styles: "/components/link/link.css",
};

components.list = {
  selector: ".list",
  styles: "/components/list/list.css",
};

components.logo = {
  selector: ".logo",
  styles: "/components/logo/logo.css",
};

components.rdForm = {
  selector: ".rd-form",
  styles: "/components/rd-form/rd-form.css",
};

components.rights = {
  selector: ".rights",
  styles: "/components/rights/rights.css",
};

components.pag = {
  selector: ".pag",
  styles: "/components/pag/pag.css",
};

components.person = {
  selector: ".person",
  styles: "/components/person/person.css",
};

components.post = {
  selector: ".post",
  styles: "/components/post/post.css",
};

components.postMeta = {
  selector: ".post-meta",
  styles: "/components/post-meta/post-meta.css",
};

components.preloader = {
  selector: ".preloader",
  styles: "/components/preloader/preloader.css",
};

components.section = {
  selector: "section",
  styles: "/components/section/section.css",
};

components.snackbar = {
  selector: ".snackbar",
  styles: "/components/snackbar/snackbar.css",
};

components.tab = {
  selector: ".tab",
  styles: "/components/tab/tab.css",
};

components.table = {
  selector: ".table",
  styles: "/components/table/table.css",
};

components.templateInfo = {
  selector: ".template-info",
  styles: "/components/template-info/template-info.css",
};

components.termList = {
  selector: ".term-list",
  styles: "/components/term-list/term-list.css",
};

components.textBlock = {
  selector: ".text-block",
  styles: "/components/text-block/text-block.css",
};

components.thumbnail = {
  selector: ".thumbnail",
  styles: "/components/thumbnail/thumbnail.css",
};

components.widget = {
  selector: ".widget",
  styles: "/components/widget/widget.css",
};

// Script components
components.animate = {
  selector: "[data-animate]",
  styles: "/components/animate/animate.css",
  script: "/components/current-device/current-device.min.js",
  init: function (nodes) {
    if (window.xMode || device.macos()) {
      nodes.forEach(function (node) {
        let params = parseJSON(node.getAttribute("data-animate"));
        node.classList.add("animated", params.class);
      });
    } else {
      let observer = new IntersectionObserver(
        function (entries) {
          let observer = this;

          entries.forEach(function (entry) {
            let node = entry.target,
              params = parseJSON(node.getAttribute("data-animate"));

            if (params.delay) node.style.animationDelay = params.delay;
            if (params.duration) node.style.animationDuration = params.duration;

            if (entry.isIntersecting) {
              node.classList.add("animated", params.class);
              observer.unobserve(node);
            }
          });
        },
        {
          threshold: 0.5,
        }
      );

      nodes.forEach(function (node) {
        observer.observe(node);
      });
    }
  },
};

components.campaignMonitor = {
  selector: ".campaign-mailform",
  styles: "/components/rd-mailform/rd-mailform.css",
  script: "/components/jquery/jquery.min.js",
  init: function (nodes) {
    /**
     * @desc Check if all elements pass validation
     * @param {object} elements - object of items for validation
     * @param {object} captcha - captcha object for validation
     * @return {boolean}
     */
    function isValidated(elements, captcha) {
      let results,
        errors = 0;

      if (elements.length) {
        for (let j = 0; j < elements.length; j++) {
          let $input = $(elements[j]);
          if ((results = $input.regula("validate")).length) {
            for (let k = 0; k < results.length; k++) {
              errors++;
              $input
                .siblings(".form-validation")
                .text(results[k].message)
                .parent()
                .addClass("has-error");
            }
          } else {
            $input
              .siblings(".form-validation")
              .text("")
              .parent()
              .removeClass("has-error");
          }
        }

        if (captcha) {
          if (captcha.length) {
            return validateReCaptcha(captcha) && errors === 0;
          }
        }

        return errors === 0;
      }
      return true;
    }

    let $nodes = $(nodes);

    for (let i = 0; i < $nodes.length; i++) {
      let $campaignItem = $($nodes[i]);

      $campaignItem.on(
        "submit",
        $.proxy(function (e) {
          e.preventDefault();

          let data = {},
            url = this.attr("action"),
            dataArray = this.serializeArray(),
            $output = $("#" + $nodes.attr("data-form-output")),
            $this = $(this);

          for (let i = 0; i < dataArray.length; i++) {
            data[dataArray[i].name] = dataArray[i].value;
          }

          $.ajax({
            data: data,
            url: url,
            dataType: "jsonp",
            error: function (resp, text) {
              $output.html("Server error: " + text);

              setTimeout(function () {
                $output.removeClass("active");
              }, 4000);
            },
            success: function (resp) {
              $output.html(resp.Message).addClass("active");

              setTimeout(function () {
                $output.removeClass("active");
              }, 6000);
            },
            beforeSend: function (data) {
              // Stop request if inputs are invalid
              if (
                window.xMode ||
                !isValidated($this.find("[data-constraints]"))
              )
                return false;

              $output.html("Submitting...").addClass("active");
            },
          });

          // Clear inputs after submit
          let inputs = $this[0].getElementsByTagName("input");
          for (let i = 0; i < inputs.length; i++) {
            inputs[i].value = "";
            let label = document.querySelector(
              '[for="' + inputs[i].getAttribute("id") + '"]'
            );
            if (label) label.classList.remove("focus", "not-empty");
          }

          return false;
        }, $campaignItem)
      );
    }
  },
};

components.counter = {
  selector: "[data-counter]",
  styles: "/components/counter/counter.css",
  script: [
    "/components/util/util.min.js",
    "/components/counter/counter.min.js",
  ],
  init: function (nodes) {
    let observer = new IntersectionObserver(
      function (entries) {
        let observer = this;

        entries.forEach(function (entry) {
          let node = entry.target;

          if (entry.isIntersecting) {
            node.counter.run();
            observer.unobserve(node);
          }
        });
      },
      {
        rootMargin: "0px",
        threshold: 1.0,
      }
    );

    nodes.forEach(function (node) {
      let counter = aCounter(
        Object.assign(
          {
            node: node,
            duration: 1000,
          },
          parseJSON(node.getAttribute("data-counter"))
        )
      );

      if (window.xMode) {
        counter.run();
      } else {
        observer.observe(node);
      }
    });
  },
};

components.countdown = {
  selector: "[ data-countdown ]",
  styles: "/components/countdown/countdown.css",
  script: [
    "/components/util/util.min.js",
    "/components/progress-circle/progress-circle.min.js",
    "/components/countdown/countdown.min.js",
  ],
  init: function (nodes) {
    nodes.forEach(function (node) {
      aCountdown(
        Object.assign(
          {
            node: node,
            tick: 100,
          },
          parseJSON(node.getAttribute("data-countdown"))
        )
      );
    });
  },
};

components.isotope = {
  selector: ".isotope-wrap",
  styles: "/components/isotope/isotope.css",
  script: [
    "/components/jquery/jquery.min.js",
    "/components/isotope/isotope.min.js",
  ],
  init: function (nodes) {
    function setFilterActive(filterGroup, activeItem) {
      if (!activeItem.classList.contains("active")) {
        for (let n = 0; n < filterGroup.length; n++)
          filterGroup[n].classList.remove("active");
        activeItem.classList.add("active");
      }
    }

    nodes.forEach(function (node) {
      let isotopeItem = $(".isotope"),
        isotopeFilters = node.querySelectorAll("[data-isotope-filter]");

      isotopeItem.isotope({
        itemSelector: ".isotope-item",
      });

      isotopeFilters.forEach(function (filter) {
        filter.addEventListener("click", function () {
          setFilterActive(isotopeFilters, filter);
          isotopeItem.isotope({
            filter: $(this).attr("data-isotope-filter"),
          });
        });
      });
    });
  },
};

components.lightgallery = {
  selector: "[data-lightgallery]",
  styles: "/components/lightgallery/lightgallery.css",
  script: [
    "/components/jquery/jquery.min.js",
    "/components/lightgallery/lightgallery.min.js",
    "/components/util/util.min.js",
  ],
  init: function (nodes) {
    if (!window.xMode) {
      nodes.forEach(function (node) {
        node = $(node);
        let defaults = {
            thumbnail: true,
            selector: ".lightgallery-item",
            youtubePlayerParams: {
              modestbranding: 1,
              showinfo: 0,
              rel: 0,
              controls: 0,
            },
            vimeoPlayerParams: {
              byline: 0,
              portrait: 0,
              color: "A90707",
            },
          },
          options = parseJSON(node.attr("data-lightgallery"));

        node.lightGallery(Util.merge([defaults, options]));
      });
    }
  },
};

components.mailchimp = {
  selector: ".mailchimp-mailform",
  styles: "/components/rd-mailform/rd-mailform.css",
  script: "/components/jquery/jquery.min.js",
  init: function (nodes) {
    let $nodes = $(nodes);

    for (let i = 0; i < $nodes.length; i++) {
      let $mailchimpItem = $($nodes[i]),
        $email = $mailchimpItem.find('input[type="email"]');

      // Required by MailChimp
      $mailchimpItem.attr("novalidate", "true");
      $email.attr("name", "EMAIL");

      $mailchimpItem.on(
        "submit",
        $.proxy(
          function ($email, event) {
            event.preventDefault();

            let $this = this,
              data = {},
              url = $this
                .attr("action")
                .replace("/post?", "/post-json?")
                .concat("&c=?"),
              dataArray = $this.serializeArray(),
              $output = $("#" + $this.attr("data-form-output"));

            for (let i = 0; i < dataArray.length; i++) {
              data[dataArray[i].name] = dataArray[i].value;
            }

            $.ajax({
              data: data,
              url: url,
              dataType: "jsonp",
              error: function (resp, text) {
                $output.html("Server error: " + text);

                setTimeout(function () {
                  $output.removeClass("active");
                }, 4000);
              },
              success: function (resp) {
                $output.html(resp.msg).addClass("active");
                $email[0].value = "";
                var $label = $('[for="' + $email.attr("id") + '"]');
                if ($label.length) $label.removeClass("focus not-empty");

                setTimeout(function () {
                  $output.removeClass("active");
                }, 6000);
              },
              beforeSend: function (data) {
                var isValidated = (function () {
                  var results,
                    errors = 0;
                  var elements = $this.find("[data-constraints]");
                  var captcha = null;
                  if (elements.length) {
                    for (var j = 0; j < elements.length; j++) {
                      var $input = $(elements[j]);
                      if ((results = $input.regula("validate")).length) {
                        for (var k = 0; k < results.length; k++) {
                          errors++;
                          $input
                            .siblings(".form-validation")
                            .text(results[k].message)
                            .parent()
                            .addClass("has-error");
                        }
                      } else {
                        $input
                          .siblings(".form-validation")
                          .text("")
                          .parent()
                          .removeClass("has-error");
                      }
                    }

                    if (captcha) {
                      if (captcha.length) {
                        return validateReCaptcha(captcha) && errors === 0;
                      }
                    }

                    return errors === 0;
                  }
                  return true;
                })();

                // Stop request if builder or inputs are invalid
                if (window.xMode || !isValidated) return false;

                $output.html("Submitting...").addClass("active");
              },
            });

            return false;
          },
          $mailchimpItem,
          $email
        )
      );
    }
  },
};

components.multiswitch = {
  selector: "[data-multi-switch]",
  styles: "/components/multiswitch/multiswitch.css",
  script: [
    "/components/current-device/current-device.min.js",
    "/components/multiswitch/multiswitch.min.js",
  ],
  dependencies: "rdNavbar",
  init: function (nodes) {
    let click = device.ios() ? "touchstart" : "click";

    nodes.forEach(function (node) {
      if (node.tagName === "A") {
        node.addEventListener(click, function (event) {
          event.preventDefault();
        });
      }

      MultiswitchMin(
        Object.assign(
          {
            node: node,
            event: click,
          },
          parseJSON(node.getAttribute("data-multi-switch"))
        )
      );
    });
  },
};

components.nav = {
  selector: ".nav",
  styles: "/components/nav/nav.css",
  script: [
    "/components/jquery/jquery.min.js",
    "/components/bootstrap/js/popper.js",
    "/components/bootstrap/js/bootstrap.min.js",
  ],
  init: function (nodes) {
    nodes.forEach(function (node) {
      $(node)
        .find('a[data-bs-toggle="tab"]')
        .on("shown.bs.tab", function () {
          window.dispatchEvent(new Event("resize"));
        });
    });
  },
};

components.regula = {
  selector: "[data-constraints]",
  styles: "/components/regula/regula.css",
  script: [
    "/components/jquery/jquery.min.js",
    "/components/regula/regula.min.js",
  ],
  init: function (nodes) {
    let elements = $(nodes);

    // Custom validator - phone number
    regula.custom({
      name: "PhoneNumber",
      defaultMessage: "Invalid phone number format",
      validator: function () {
        if (this.value === "") return true;
        else return /^(\+\d)?[0-9\-\(\) ]{5,}$/i.test(this.value);
      },
    });

    for (let i = 0; i < elements.length; i++) {
      let o = $(elements[i]),
        v;
      o.addClass("form-control-has-validation").after(
        "<span class='form-validation'></span>"
      );
      v = o.parent().find(".form-validation");
      if (v.is(":last-child")) o.addClass("form-control-last-child");
    }

    elements
      .on("input change propertychange blur", function (e) {
        let $this = $(this),
          results;

        if (e.type !== "blur")
          if (!$this.parent().hasClass("has-error")) return;
        if ($this.parents(".rd-mailform").hasClass("success")) return;

        if ((results = $this.regula("validate")).length) {
          for (let i = 0; i < results.length; i++) {
            $this
              .siblings(".form-validation")
              .text(results[i].message)
              .parent()
              .addClass("has-error");
          }
        } else {
          $this
            .siblings(".form-validation")
            .text("")
            .parent()
            .removeClass("has-error");
        }
      })
      .regula("bind");

    let regularConstraintsMessages = [
      {
        type: regula.Constraint.Required,
        newMessage: "The text field is required.",
      },
      {
        type: regula.Constraint.Email,
        newMessage: "The email is not a valid email.",
      },
      {
        type: regula.Constraint.Numeric,
        newMessage: "Only numbers are required",
      },
      {
        type: regula.Constraint.Selected,
        newMessage: "Please choose an option.",
      },
    ];

    for (let i = 0; i < regularConstraintsMessages.length; i++) {
      let regularConstraint = regularConstraintsMessages[i];

      regula.override({
        constraintType: regularConstraint.type,
        defaultMessage: regularConstraint.newMessage,
      });
    }
  },
};

components.rdMailform = {
  selector: ".rd-mailform",
  styles: [
    "/components/rd-mailform/rd-mailform.css",
    "/components/font-awesome/font-awesome.css",
  ],
  script: [
    "/components/jquery/jquery.min.js",
    "/components/rd-mailform/rd-mailform.min.js",
  ],
  init: function (nodes) {
    let i,
      j,
      k,
      $captchas = $(nodes).find(".recaptcha"),
      msg = {
        MF000: "Successfully sent!",
        MF001: "Recipients are not set!",
        MF002: "Form will not work locally!",
        MF003: "Please, define email field in your form!",
        MF004: "Please, define type of your form!",
        MF254: "Something went wrong with PHPMailer!",
        MF255: "Aw, snap! Something went wrong.",
      };

    if ($captchas.length) {
      $.getScript(
        "//www.google.com/recaptcha/api.js?onload=onloadCaptchaCallback&render=explicit&hl=en"
      );
    }

    /**
     * @desc Check if all elements pass validation
     * @param {object} elements - object of items for validation
     * @param {object} captcha - captcha object for validation
     * @return {boolean}
     */
    function isValidated(elements, captcha) {
      let results,
        errors = 0;

      if (elements.length) {
        for (let j = 0; j < elements.length; j++) {
          let $input = $(elements[j]);
          if ((results = $input.regula("validate")).length) {
            for (k = 0; k < results.length; k++) {
              errors++;
              $input
                .siblings(".form-validation")
                .text(results[k].message)
                .parent()
                .addClass("has-error");
            }
          } else {
            $input
              .siblings(".form-validation")
              .text("")
              .parent()
              .removeClass("has-error");
          }
        }

        if (captcha) {
          if (captcha.length) {
            return validateReCaptcha(captcha) && errors === 0;
          }
        }

        return errors === 0;
      }
      return true;
    }

    /**
     * @desc Validate google reCaptcha
     * @param {object} captcha - captcha object for validation
     * @return {boolean}
     */
    function validateReCaptcha(captcha) {
      let captchaToken = captcha.find(".g-recaptcha-response").val();

      if (captchaToken.length === 0) {
        captcha
          .siblings(".form-validation")
          .html("Please, prove that you are not robot.")
          .addClass("active");
        captcha.closest(".form-wrap").addClass("has-error");

        captcha.on("propertychange", function () {
          let $this = $(this),
            captchaToken = $this.find(".g-recaptcha-response").val();

          if (captchaToken.length > 0) {
            $this.closest(".form-wrap").removeClass("has-error");
            $this.siblings(".form-validation").removeClass("active").html("");
            $this.off("propertychange");
          }
        });

        return false;
      }

      return true;
    }

    /**
     * @desc Initialize Google reCaptcha
     */
    window.onloadCaptchaCallback = function () {
      for (let i = 0; i < $captchas.length; i++) {
        let $captcha = $($captchas[i]),
          resizeHandler = function () {
            let frame = this.querySelector("iframe"),
              inner = this.firstElementChild,
              inner2 = inner.firstElementChild,
              containerRect = null,
              frameRect = null,
              scale = null;

            inner2.style.transform = "";
            inner.style.height = "auto";
            inner.style.width = "auto";

            containerRect = this.getBoundingClientRect();
            frameRect = frame.getBoundingClientRect();
            scale = containerRect.width / frameRect.width;

            if (scale < 1) {
              inner2.style.transform = "scale(" + scale + ")";
              inner2.style.transformOrigin = "top left";
              inner.style.height = frameRect.height * scale + "px";
              inner.style.width = frameRect.width * scale + "px";
            }
          }.bind($captchas[i]);

        grecaptcha.render($captcha.attr("id"), {
          sitekey: $captcha.attr("data-sitekey"),
          size: $captcha.attr("data-size")
            ? $captcha.attr("data-size")
            : "normal",
          theme: $captcha.attr("data-theme")
            ? $captcha.attr("data-theme")
            : "light",
          callback: function () {
            $(".recaptcha").trigger("propertychange");
          },
        });

        $captcha.after("<span class='form-validation'></span>");

        if ($captchas[i].hasAttribute("data-auto-size")) {
          resizeHandler();
          window.addEventListener("resize", resizeHandler);
        }
      }
    };

    for (i = 0; i < nodes.length; i++) {
      let $form = $(nodes[i]),
        formHasCaptcha = false;

      $form.attr("novalidate", "novalidate").ajaxForm({
        data: {
          "form-type": $form.attr("data-form-type") || "contact",
          counter: i,
        },
        beforeSubmit: function (arr, $form, options) {
          if (window.xMode) return;

          let form = $(nodes[this.extraData.counter]),
            inputs = form.find("[data-constraints]"),
            output = $("#" + form.attr("data-form-output")),
            captcha = form.find(".recaptcha"),
            captchaFlag = true;

          output.removeClass("active error success");

          if (isValidated(inputs, captcha)) {
            // veify reCaptcha
            if (captcha.length) {
              let captchaToken = captcha.find(".g-recaptcha-response").val(),
                captchaMsg = {
                  CPT001:
                    'Please, setup you "site key" and "secret key" of reCaptcha',
                  CPT002: "Something wrong with google reCaptcha",
                };

              formHasCaptcha = true;

              $.ajax({
                method: "POST",
                url: "components/rd-mailform/reCaptcha.php",
                data: { "g-recaptcha-response": captchaToken },
                async: false,
              }).done(function (responceCode) {
                if (responceCode !== "CPT000") {
                  if (output.hasClass("snackbar")) {
                    output.html(
                      '<div class="snackbar-inner"><div class="snackbar-title"><span class="icon snackbar-icon fa-check"></span>' +
                        captchaMsg[responceCode] +
                        "</div></div>"
                    );

                    setTimeout(function () {
                      output.removeClass("active");
                    }, 3500);

                    captchaFlag = false;
                  } else {
                    output.html(captchaMsg[responceCode]);
                  }

                  output.addClass("active");
                }
              });
            }

            if (!captchaFlag) {
              return false;
            }

            form.addClass("form-in-process");

            if (output.hasClass("snackbar")) {
              output.html(
                '<div class="snackbar-inner"><div class="snackbar-title"><span class="icon snackbar-icon fa-circle-o-notch fa-spin"></span>Sending</div></div>'
              );
              output.addClass("active");
            }
          } else {
            return false;
          }
        },
        error: function (result) {
          if (window.xMode) return;

          let output = $(
              "#" + $(nodes[this.extraData.counter]).attr("data-form-output")
            ),
            form = $(nodes[this.extraData.counter]);

          output.text(msg[result]);
          form.removeClass("form-in-process");

          if (formHasCaptcha) {
            grecaptcha.reset();
          }
        },
        success: function (result) {
          if (window.xMode) return;

          let form = $(nodes[this.extraData.counter]),
            output = $("#" + form.attr("data-form-output")),
            select = form.find("select");

          form.addClass("success").removeClass("form-in-process");

          if (formHasCaptcha) {
            grecaptcha.reset();
          }

          result = result.length === 5 ? result : "MF255";
          output.text(msg[result]);

          if (result === "MF000") {
            if (output.hasClass("snackbar")) {
              output.html(
                '<div class="snackbar-inner"><div class="snackbar-title"><span class="icon snackbar-icon fa-check"></span>' +
                  msg[result] +
                  "</div></div>"
              );
            } else {
              output.addClass("active success");
            }
          } else {
            if (output.hasClass("snackbar")) {
              output.html(
                '<div class="snackbar-inner"><div class="snackbar-title"><span class="icon snackbar-icon fa-exclamation-triangle"></span>' +
                  msg[result] +
                  "</div></div>"
              );
            } else {
              output.addClass("active error");
            }
          }

          form.clearForm();

          if (select.length) {
            select.select2("val", "");
          }

          form.find("input, textarea").trigger("blur");

          setTimeout(function () {
            output.removeClass("active error success");
            form.removeClass("success");
          }, 3500);
        },
      });
    }
  },
};

components.rdNavbar = {
  selector: ".rd-navbar",
  styles: ["/components/rd-navbar/rd-navbar.css", "/components/mdi/mdi.css"],
  script: [
    "/components/jquery/jquery.min.js",
    "/components/util/util.min.js",
    "/components/current-device/current-device.min.js",
    "/components/rd-navbar/rd-navbar.min.js",
  ],
  dependencies: "currentDevice",
  init: function (nodes) {
    nodes.forEach(function (node) {
      let backButtons = node.querySelectorAll(".navbar-navigation-back-btn"),
        params = parseJSON(node.getAttribute("data-rd-navbar")),
        defaults = {
          stickUpClone: false,
          anchorNav: false,
          autoHeight: false,
          stickUpOffset: "1px",
          responsive: {
            0: {
              layout: "rd-navbar-fixed",
              deviceLayout: "rd-navbar-fixed",
              focusOnHover: false,
              stickUp: false,
            },
            992: {
              layout: "rd-navbar-fixed",
              deviceLayout: "rd-navbar-fixed",
              focusOnHover: false,
              stickUp: false,
            },
            1200: {
              layout: "rd-navbar-fullwidth",
              deviceLayout: "rd-navbar-fullwidth",
              stickUp: true,
              stickUpOffset: "1px",
              autoHeight: true,
            },
          },
          callbacks: {
            onStuck: function () {
              document.documentElement.classList.add("rd-navbar-stuck");
            },
            onUnstuck: function () {
              document.documentElement.classList.remove("rd-navbar-stuck");
            },
            onDropdownToggle: function () {
              if (this.classList.contains("opened")) {
                this.parentElement.classList.add("overlaid");
              } else {
                this.parentElement.classList.remove("overlaid");
              }
            },
            onDropdownClose: function () {
              this.parentElement.classList.remove("overlaid");
            },
          },
        },
        xMode = {
          stickUpClone: false,
          anchorNav: false,
          responsive: {
            0: {
              stickUp: false,
              stickUpClone: false,
            },
            992: {
              stickUp: false,
              stickUpClone: false,
            },
            1200: {
              stickUp: false,
              stickUpClone: false,
            },
          },
          callbacks: {
            onDropdownOver: function () {
              return false;
            },
          },
        },
        navbar = (node.RDNavbar = new RDNavbar(
          node,
          Util.merge(
            window.xMode ? [defaults, params, xMode] : [defaults, params]
          )
        ));

      if (backButtons.length) {
        backButtons.forEach(function (btn) {
          btn.addEventListener("click", function () {
            let submenu = this.closest(".rd-navbar-submenu"),
              parentmenu = submenu.parentElement;

            navbar.dropdownToggle.call(submenu, navbar);
          });
        });
      }
    });
  },
};

components.tooltip = {
  selector: "[data-tooltip]",
  styles: "/components/tooltip/tooltip.css",
  script: [
    "/components/jquery/jquery.min.js",
    "/components/bootstrap/js/popper.js",
    "/components/bootstrap/js/bootstrap.min.js",
  ],
  init: function (nodes) {
    nodes.forEach(function (node) {
      let options = parseJSON(node.getAttribute("data-tooltip"));
      $(node).tooltip(options);
    });
  },
};

components.toTop = {
  selector: "html",
  styles: [
    "/components/to-top/to-top.css",
    "/components/font-awesome/font-awesome.css",
  ],
  script: "/components/jquery/jquery.min.js",
  init: function () {
    if (!window.xMode) {
      let node = document.createElement("div");
      node.className = "to-top fa-angle-up";
      document.body.appendChild(node);

      node.addEventListener("mousedown", function () {
        this.classList.add("active");

        $("html, body")
          .stop()
          .animate(
            { scrollTop: 0 },
            500,
            "swing",
            function () {
              this.classList.remove("active");
            }.bind(this)
          );
      });

      document.addEventListener("scroll", function () {
        if (window.scrollY > window.innerHeight) node.classList.add("show");
        else node.classList.remove("show");
      });
    }
  },
};

/**
 * Wrapper to eliminate json errors
 * @param {string} str - JSON string
 * @returns {object} - parsed or empty object
 */
function parseJSON(str) {
  try {
    if (str) return JSON.parse(str);
    else return {};
  } catch (error) {
    //{DEL LIVEDEMO BUILDER}
    console.warn(error);
    //{DEL}
    return {};
  }
}

/**
 * Get tag of passed data
 * @param {*} data
 * @return {string}
 */
function objectTag(data) {
  return Object.prototype.toString.call(data).slice(8, -1);
}

/**
 * Merging of two objects
 * @param {Object} source
 * @param {Object} merged
 * @return {Object}
 */
function merge(source, merged) {
  for (let key in merged) {
    let tag = objectTag(merged[key]);

    if (tag === "Object") {
      if (typeof source[key] !== "object") source[key] = {};
      source[key] = merge(source[key], merged[key]);
    } else if (tag !== "Null") {
      source[key] = merged[key];
    }
  }

  return source;
}

// Main
window.addEventListener("load", function () {
  new ZemezCore({
    //{DEL LIVEDEMO BUILDER}
    debug: true,
    //{DEL}
    components: components,
    observeDOM: window.xMode,
    IEPolyfill:
      "https://polyfill.io/v3/polyfill.min.js?features=Element.prototype.closest%2CArray.from%2CCustomEvent%2CNodeList.prototype.forEach%2CObject.assign%2CIntersectionObserver%2CPromise%2CElement.prototype.remove%2CURLSearchParams",
    IEHandler: function (version) {
      document.documentElement.classList.add("ie-" + version);
    },
  });
});
